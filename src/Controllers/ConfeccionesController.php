<?php

namespace src\Controllers;

use src\Model\ConfeccionesModel;
use src\Model\AlmacenModel;
use src\Model\PrendasModel;
use src\Model\PrendaPatronModel;
use src\Model\SupervisoresModel;
use src\Controllers\ControllerBase;
use Exception;
use src\Model\OrdenConfeccionModel;
use src\Model\PedidosPrendasModel;


class ConfeccionesController extends ControllerBase
{
    private $model;
    private $almacenModel;
    private $prendasModel;
    private $prendaPatronModel;
    private $supervisoresModel;
    private $ordenConfeccion;
    private $pedidosPrendas;
    public function __construct()
    {
        $this->model = new ConfeccionesModel();
        $this->almacenModel = new AlmacenModel();
        $this->prendasModel = new PrendasModel();
        $this->prendaPatronModel = new PrendaPatronModel();
        $this->supervisoresModel = new SupervisoresModel();
        $this->ordenConfeccion = new OrdenConfeccionModel();
        $this->pedidosPrendas = new PedidosPrendasModel();
    }

    public function show()
    {
        if ($_SESSION['rol'] == 2) {
            $this->redirect('dashboard');
        }

        $confeccionesData = $this->model->viewConfecciones(0, "estado");
        include_once("src/Views/Confecciones.php");
    }

    public function viewAll()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewConfecciones(0, "estado");
        });
    }

    /**
     * Retorna los detalles de una prenda específica en formato JSON.
     */
    public function viewDetails()
    {
        $this->procesarRespuestaJson(function () {
            $id = $_GET['id'] ?? null;
            if (!$id) {
                throw new Exception("ID de prenda no especificado.");
            }
            return $this->ordenConfeccion->viewPrendas($id, 'id_confeccion');
        });
    }

    /**
     * Retorna todos los pedidos activos en formato JSON.
     */
    public function viewDelete()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewConfecciones(1, "estado");
        });
    }

    public function print()
    {
        $confeccionesData = $this->model->viewAll();
        include_once("src/Libraries/fpdf/ConfeccionesPDF.php");
    }


    /**
     * Registra los materiales de un pedido.
     */
    private function registrarPrenda($prendasData, $id_confeccion)
    {
        foreach ($prendasData as $prenda) {
            $this->ordenConfeccion->setData(
                $id_confeccion,
                $prenda['id_prenda'],
                $prenda['cantidad']
            );

            if (!$this->ordenConfeccion->create()) {
                throw new Exception("Error al registrar la prenda en la entrega");
            }
        }
        return true;
    }

    public function comprobarStock($ordenConfeccion)
    {

        foreach ($ordenConfeccion as $prenda) {

            $dataPatron = $this->prendaPatronModel->viewMaterials($prenda["id_prenda"]);

            foreach ($dataPatron as $material) {
                $idMaterial = $material["id_material"];
                $cantidadRequerida = $material["cantidad"] * $prenda["cantidad"];
                $stockDisponible = $this->almacenModel->showColumn("stock", "id_material", $idMaterial);

                if ($cantidadRequerida > $stockDisponible) {
                    return false;
                }
            }
        }
        return true;
    }

    public function bajarStockMateriales($ordenConfeccion)
    {

        foreach ($ordenConfeccion as $prenda) {

            $dataPatron = $this->prendaPatronModel->viewMaterials($prenda["id_prenda"]);

            foreach ($dataPatron as $material) {
                $idMaterial = $material["id_material"];
                $cantidadRequerida = $material["cantidad"] * $prenda["cantidad"];
                $nuevoStock = $this->almacenModel->showColumn("stock", "id_material", $idMaterial) - $cantidadRequerida;

                if (!$this->almacenModel->updateColumn("stock", $nuevoStock, "id_material", $idMaterial)) {
                    return false;
                }
            }
        }

        return true;
    }

    public function subirStockPrendas($ordenConfeccion)
    {

        foreach ($ordenConfeccion as $prenda) {

            $idPrenda = $prenda["id_prenda"];
            $cantidadSumar = $prenda["cantidad"];

            $nuevoStock = $this->prendasModel->showColumn("stock", "id_prenda", $idPrenda) + $cantidadSumar;

            if (!$this->prendasModel->updateColumn("stock", $nuevoStock, "id_prenda", $idPrenda)) {
                return false;
            }
        }

        return true;
    }


    public function create()
    {
        $this->procesarRespuestaJson(function () {

            $ordenConfeccion = $_POST["prenda"]; //Array con las prendas y su cantidad

            if (!$ordenConfeccion || !is_array($ordenConfeccion)) {
                throw new Exception("No se pudo obtener el objeto de prendas con los datos");
            }

            if (!$this->comprobarStock($ordenConfeccion)) {
                throw new Exception("Insuficientes materiales en inventario para realizar la confección");
            }

            $this->model->setData(
            $_POST['pedido'],
            date('Y-m-d H:i:s'),
            $_POST["supervisor"],
            );

            $id_confeccion = $this->model->create();
            if (!$id_confeccion) {
                throw new Exception("No se pudo registrar la confección");
            }

            if (!$this->registrarPrenda($ordenConfeccion, $id_confeccion)) {
                throw new Exception("Error al registrar las prendas en la entrega");
            }

            if (!$this->bajarStockMateriales($ordenConfeccion)) {
                throw new Exception("Error al bajar el stock de los materiales");
            }

            $cantTrabajos = $this->supervisoresModel->showColumn("trabajando", "id_supervisor", $_POST["supervisor"]);
            $newCantTrabajos = $cantTrabajos + 1;
            if (!$this->supervisoresModel->updateColumn("trabajando", $newCantTrabajos, "id_supervisor", $_POST["supervisor"])) {
                throw new Exception("No se pudo actualizar la cantidad de trabajos en el supervisor");
            }

            if (!$this->pedidosPrendas->updateColumn("proceso", 1, "id_pedido_prenda", $_POST["pedido"])) {
                throw new Exception("No se pudo actualizar el estado del pedido");
            }

            return [
                "success" => true,
                "message" => "Confeccion registrada correctamente"
            ];
        });
    }





    public function update()
    {
        $this->procesarRespuestaJson(function () {

            $idConfeccion = $_POST["id"];
            $idPedido = $this->model->showColumn("id_pedido", "id_confeccion", $idConfeccion);
            $supervisor = $this->model->showColumn("id_supervisor", "id_confeccion", $idConfeccion);

            $this->model->beginTransaction();

            $ordenConfeccion = $this->ordenConfeccion->viewAll($idConfeccion, "id_confeccion");

            if (!$this->subirStockPrendas($ordenConfeccion)) {
                throw new Exception("No se pudo subir el stock de alguna prenda");
            }

            if (!$this->model->updateColumn("proceso", 1,"id_confeccion", $idConfeccion )) {
                throw new Exception("No se pudo cambiar el estado de la confeccion");
            }

            if(!$this->pedidosPrendas->updateColumn("proceso",2,"id_pedido_prenda", $idPedido)){
                throw new Exception("No se pudo cambiar el estado del pedido");
            };

            $cantTrabajos = $this->supervisoresModel->showColumn("trabajando", "id_supervisor", $supervisor);
            $newCantTrabajos = $cantTrabajos - 1;
            if (!$this->supervisoresModel->updateColumn("trabajando", $newCantTrabajos, "id_supervisor", $supervisor)) {
                throw new Exception("No se pudo actualizar la cantidad de trabajos en el supervisor");
            }

            $this->model->commit();

            return ["success" => true, "message" => "Confección actualizada correctamente"];
        });
    }

    public function delete()
    {
        $this->procesarRespuestaJson(function () {
            $confeccion = $_POST["id"];
            $supervisor = $this->model->showColumn("id_supervisor", "id_confeccion", $confeccion);

            if (
                !$this->model->softDelete($confeccion) ||
                !$this->model->updateColumn("proceso", 3, "id_confeccion", $confeccion) ||
                !$this->supervisoresModel->updateColumn("ocupado", 0, "id_supervisor", $supervisor)
            ) {
                throw new Exception("Error al anular la confección");
            }

            return ["success" => true, "message" => "Confección anulada correctamente"];
        });
    }

    public function remove()
    {
        $this->procesarRespuestaJson(function () {
            if (!$this->model->remove($_POST["id"])) {
                throw new Exception("No se pudo remover la confección");
            }
            return ["success" => true, "message" => "Confección removida correctamente"];
        });
    }

    public function restore()
    {
        $this->procesarRespuestaJson(function () {
            if (!$this->model->active($_POST["id"])) {
                throw new Exception("No se pudo restaurar la confección");
            }
            return ["success" => true, "message" => "Confección restaurada correctamente"];
        });
    }
}
