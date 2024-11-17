<?php

namespace src\Controllers;

use src\Model\PedidosPrendasModel;
use src\Model\PrendasModel;
use src\Model\OrdenEntregaModel;

use Interfaces\CrudController;

use Exception;

class PedidosPrendasController
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

    public function show()
    {
        if ($_SESSION['rol'] == 2) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $entregasDeleteData = $this->model->viewEntregas(1, "estado");
        $entregasData = $this->model->viewEntregas(0, "estado");
        include_once("src/Views/PedidosPrendas.php");
    }

    public function viewAll()
     {
         try {
             $pedidosPrendasData = $this->model->viewEntregas(0, "estado");
             echo json_encode($pedidosPrendasData);
         } catch (Exception $e) {
             echo json_encode([
                 "success" => false,
                 "message" => $e->getMessage()
             ]);
         }
     }

     public function viewDetails()
     {
         $id = $_GET['id'];
         try {
             $ordenPedidoData = $this->ordenEntrega->viewPrendas($id, "id_entrega");
             echo json_encode($ordenPedidoData);
         } catch (Exception $e) {
             echo json_encode([
                 "success" => false,
                 "message" => $e->getMessage()
             ]);
         }
     }

    public function print()
    {
        $entregasData = $this->model->viewEntregas(0, "estado");
        include_once("src/Libraries/fpdf/PrendasPDF.php");
    }


    public function comprobarStock($prendasData)
    {
        foreach ($prendasData as $prenda) {
            $stock = $this->prendasModel->showColumn('stock', 'id_prenda', $prenda['id_prenda']);

            if ($prenda['cantidad_prenda'] > $stock) {

                return false;
            }
        }
    
        return true;
    }

    //Accion sera la operacion "subir" para aumentar el stock y "bajar" para quitar
    public function bajarStock($prendasData)
    {
        foreach ($prendasData as $prenda) {
            if ($prenda['cantidad_prenda'] == '' && $prenda['id_prenda'] == "none") {
                throw new Exception("No se han ingresado prendas validas");
            }

            $stock = $this->prendasModel->showColumn("stock", "id_prenda", $prenda['id_prenda']);
            if (!$stock) {
                throw new Exception("No error al obtener el stock de la prenda: " . $prenda['id_prenda']);
            }

            $newStock = $stock - $prenda['cantidad_prenda'];

            if (!$this->prendasModel->updateColumn(
                "stock",
                $newStock,
                "id_prenda",
                $prenda['id_prenda']
            )) {
                throw new Exception("Error al restar el stock de la prenda");
            }
        }
        return true;
    }

    public function registrarMaterial($prendasData, $id_pedido_prenda)
    {

        foreach ($prendasData as $prenda) {

            if ($prenda['cantidad'] == '' && $prenda['id_prenda'] == "none") {
                throw new Exception("No se han ingresado prendas validas");
            }

            //Anotar el material en la tabla ordenPedido
            $this->ordenEntrega->setData(
                $id_pedido_prenda,
                $prenda['id_prenda'],
                $prenda['cantidad'],
            );

            if (!$this->ordenEntrega->create()) {
                throw new Exception("Error al registrar la prenda en la entrega");
            }
        }
        return true;
    }

    public function create()
    {
        try {

            // Comprobamos si las prendas ingresadas son válidas
            if (!isset($_POST['prenda']) || !is_array($_POST['prenda'])) {
                throw new Exception("No se han proporcionado prendas válidos");
            }

            // Llenamos los atributos con los datos del pedido
            $this->model->setData(
                $_POST["desc_pedido_prenda"],
                date('Y-m-d H:i:s'),
                $_POST["fecha_estimada"]
            );

            // Registramos el pedido
            $id_pedido_prenda = $this->model->create();
            if (!$id_pedido_prenda) {
                throw new Exception("Error al registrar el pedido");
            }

            $this->model->beginTransaction();

            // Registrar los materiales en orden de pedido
            if (!$this->registrarMaterial($_POST['prenda'], $id_pedido_prenda)) {
                throw new Exception("Error al registrar los materiales en la orden de pedido");
            }

            // Commit si todo fue exitoso
            $this->model->commit();
            header("Location: index.php?page=pedidosPrendas&success=create");
        } catch (Exception $e) {
            $this->model->rollBack();
            header("Location: index.php?page=pedidosPrendas&error=other&errorDesc=" . urlencode($e->getMessage()));
        }
        exit();
    }

    public function update()
    {

        $id_pedido_prenda = $_POST["id"];
        $pedido = $this->ordenEntrega->viewAll($id_pedido_prenda, "id_entrega");

        try {

            //Comprovamos si hay suficiente stock de prendas para actulizar el pedido
            if (!$this->comprobarStock($pedido)) {
                throw new Exception("No hay suficientes prendas en el inventario para realizar el pedido");
            }

            //Bajamos el stock de las prendas
            if (!$this->bajarStock($pedido)) {
                throw new Exception("No se pudo bajar el stock");
            }

            //Actualizamos el estado del pedido
            if (!$this->model->updateColumn("proceso", 1, "id_pedido_prenda", $id_pedido_prenda)) {
                throw new Exception("No se pudo actualizar el proceso del pedido");
            }

            header("Location: index.php?page=pedidosPrendas&succes=update");
        } catch (Exception $e) {
            header("Location: index.php?page=pedidosPrendas&error=other&errorDesc=" . $e->getMessage());
        }
    }



    public function restore()
    {
        if ($this->model->active($_POST["id"])) {
            header("Location: index.php?page=pedidosPrendas&succes=restore");
        } else {
            header("Location: index.php?page=pedidosPrendas&error=restore");
        }
    }

    public function edit() {}


    public function updatee()
    {
        try {
            $estado = $this->model->showColumn("estado_pedido", "id_pedido", $_POST["id"]);

            if ($estado) {
                // Verifica el estado del pedido
                if ($estado == 0) {
                    $newEstado = 1;
                } else {
                    $newEstado = 0;
                }

                // Intenta actualizar
                if ($this->model->updateColumn("estado_pedido", $newEstado, "id_pedido", $_POST["id"])) {
                    header("Location: index.php?page=pedidosPrendas&success=4");
                    exit;
                } else {
                    header("Location: index.php?page=entregas&error=4");
                }
            } else {
                throw new Exception("No se pudo obtener el estado del pedido");
            }
        } catch (Exception $e) {
            header("Location: index.php?page=pedidosPrendas&error=other&errorDesc=" . $e->getMessage());
        }
    }
}
