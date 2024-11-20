<?php

namespace src\Controllers;

use src\Model\PedidosPrendasModel;
use src\Model\PrendasModel;
use src\Model\OrdenEntregaModel;
use src\Controllers\ControllerBase;
use Exception;

class PedidosPrendasController extends ControllerBase
{
    private $model;
    private $prendasModel;
    private $ordenEntrega;

    public function __construct()
    {
        $this->model = new PedidosPrendasModel();
        $this->prendasModel = new PrendasModel();
        $this->ordenEntrega = new OrdenEntregaModel();
    }

    /**
     * Renderiza la vista principal de pedidos de prendas.
     */
    public function show()
    {
        include_once("src/Views/PedidosPrendas.php");
    }

    /**
     * Retorna todos los pedidos activos en formato JSON.
     */
    public function viewAll()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewAll(0, "estado");
        });
    }

    /**
     * Retorna todos los pedidos Inactivos en formato JSON.
     */
    public function viewDelete()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewAll(1, "estado");
        });
    }

    /**
     * Retorna todos los pedidos segun el id enviado en formato JSON.
     */
    public function viewID()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewPedidosDisponibles($_GET["id"],"id_pedido_prenda");
        });
    }

    /**
     * Retorna los detalles de un pedido por ID en formato JSON.
     */
    public function viewDetails()
    {
        $this->procesarRespuestaJson(function () {
            $id = $_GET['id'];
            return $this->ordenEntrega->viewPrendas($id, "id_entrega");
        });
    }

    /**
     * Genera un reporte PDF de los pedidos.
     */
    public function print()
    {
        $entregasData = $this->model->viewEntregas(0, "estado");
        include_once("src/Libraries/fpdf/PrendasPDF.php");
    }

    /**
     * Verifica el stock disponible para las prendas.
     */
    private function comprobarStock($prendasData)
    {
        foreach ($prendasData as $prenda) {
            $stock = $this->prendasModel->showColumn('stock', 'id_prenda', $prenda['id_prenda']);
            if ($prenda['cantidad_prenda'] > $stock) {
                return false;
            }
        }
        return true;
    }

    /**
     * Reduce el stock de las prendas.
     */
    private function bajarStock($prendasData)
    {
        foreach ($prendasData as $prenda) {
            $stock = $this->prendasModel->showColumn("stock", "id_prenda", $prenda['id_prenda']);
            if ($stock === false) {
                throw new Exception("Error al obtener el stock de la prenda: " . $prenda['id_prenda']);
            }

            $newStock = $stock - $prenda['cantidad_prenda'];
            if (!$this->prendasModel->updateColumn("stock", $newStock, "id_prenda", $prenda['id_prenda'])) {
                throw new Exception("Error al restar el stock de la prenda");
            }
        }
        return true;
    }

    /**
     * Registra los materiales de un pedido.
     */
    private function registrarMaterial($prendasData, $id_pedido_prenda)
    {
        foreach ($prendasData as $prenda) {
            $this->ordenEntrega->setData(
                $id_pedido_prenda,
                $prenda['id_prenda'],
                $prenda['cantidad']
            );

            if (!$this->ordenEntrega->create()) {
                throw new Exception("Error al registrar la prenda en la entrega");
            }
        }
        return true;
    }

    /**
     * Crea un nuevo pedido.
     */
    public function create()
    {
        $this->procesarRespuestaJson(function () {
            $this->model->setData(
                $_POST["desc_pedido_prenda"],
                date('Y-m-d H:i:s'),
                $_POST["fecha_estimada"]
            );

            $id_pedido_prenda = $this->model->create();
            if (!$id_pedido_prenda) {
                throw new Exception("Error al registrar el pedido");
            }


            if (!$this->registrarMaterial($_POST['prenda'], $id_pedido_prenda)) {
                throw new Exception("Error al registrar los materiales en la orden de pedido");
            }

            return ["success" => true, "message" => "Pedido creado correctamente"];
        });
    }

    /**
     * Actualiza el estado de un pedido y ajusta el stock.
     */
    public function update()
    {
        $this->procesarRespuestaJson(function () {
            $id_pedido_prenda = $_POST["id"];
            $pedido = $this->ordenEntrega->viewAll($id_pedido_prenda, "id_entrega");

            if (!$this->comprobarStock($pedido)) {
                throw new Exception("No hay suficientes prendas en el inventario para realizar el pedido");
            }

            $this->bajarStock($pedido);

            if (!$this->model->updateColumn("proceso", 3, "id_pedido_prenda", $id_pedido_prenda)) {
                throw new Exception("No se pudo actualizar el proceso del pedido");
            }

            return ["success" => true, "message" => "Pedido actualizado correctamente"];
        });
    }

    /**
     * Restaura un pedido eliminado.
     */
    public function restore()
    {
        $this->procesarRespuestaJson(function () {
            throw new Exception("No se puede restaurar un pedido eliminado");
        });
    }

    public function remove()
    {
        $this->procesarRespuestaJson(function () {
            throw new Exception("No se puede remover un pedido eliminado");

        });
    }

    /**
     * Cambia el estado de un pedido.
     */
    public function updateState()
    {
        $this->procesarRespuestaJson(function () {
            $estado = $this->model->showColumn("proceso", "id_pedido", $_POST["id"]);
            $newEstado = $estado ? 0 : 1;

            if (!$this->model->updateColumn("proceso", $newEstado, "id_pedido", $_POST["id"])) {
                throw new Exception("No se pudo actualizar el estado del pedido");
            }

            return ["success" => true, "message" => "Estado del pedido actualizado correctamente"];
        });
    }

    /**
     * Elimina un pedido de forma lógica.
     */
    public function delete()
    {
        $this->procesarRespuestaJson(function () {
            $id = $_POST["id"] ?? null;
            if (!$id) {
                throw new Exception("ID de pedido no especificado.");
            }

            if (!$this->model->updateColumn("estado", 1, "id_pedido_prenda", $id)) {
                throw new Exception("Error al actualizar el estado a eliminado del pedido.");
            }

            if (!$this->model->updateColumn("proceso", 4, "id_pedido_prenda", $id)) {
                throw new Exception("Error al actualizar el estado del pedido.");
            }

            return ["success" => true, "message" => "Pedido eliminado correctamente."];
        });
    }
}
