<?php

include_once "model/pedidosModel.php";
include_once "model/almacenModel.php";


require_once("interfaces/interface.php");

class pedidosController implements crudController
{

    private $model;
    private $almacenModel;
    private $conn;

    public function __construct()
    {
        $this->model = new pedidos;
        $this->almacenModel = new Material();
        $this->conn = $this->model->getDbConnection();
    }

    public function show()
    {
        $pedidosData = $this->model->viewAll();
        include_once("views/pedidos.php");
    }


    public function create()
    {
        try {

            $this->conn->beginTransaction();

            if (isset($_POST['material']) && is_array($_POST['material'])) {
                $total = 0;
                foreach ($_POST['material'] as $materiales) {
                    if ($materiales['cantidad'] !== '' && $materiales['id_Material'] !== "none") {
                        //Vamos sumando el precio de los materiales ingresados
                        $total += $this->almacenModel->getMaterialPrice($materiales['id_Material']) * $materiales['cantidad'];

                        //y vamos agregando el nuevo stock a dicho material
                        $stock = $this->almacenModel->getMaterialStock('id_Material');
                        if ($stock) {
                            $newStock = $materiales['cantidad'] + $stock;
                            $this->almacenModel->updateStock('id_Material', $newStock);
                        }else{
                            throw new Exception("No se ha encontrado ningun precio del material ingresado");
                        }

                    } else {
                        throw new Exception("No se han ingresado materiales validos para calcular el precio");
                    }
                }
            } else {
                throw new Exception("No se han proporcionado materiales válidos");
            }

            $this->model->setProveedor($_POST["id_proveedor"]);
            $this->model->setFecha_pedido(date('Y-m-d H:i:s'));
            $this->model->setFecha_estimada($_POST["fecha_estimada"]);
            $this->model->setFecha_real(null);
            $this->model->setEstado(false);
            $this->model->setUsuario($_SESSION["id_user"]);
            $this->model->setTotal($newStock);

            if ($this->model->create()){
                header("Location: index.php?page=pedidos&succes=1");
            } else {
                throw new Exception("Error al ejecutar las funciones del modelo");
            }

        } catch (Exception $e) {
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
            exit();
        }
    }


    public function delete()
    {
        if ($this->model->delete($_POST["id"])) {
            header("Location: index.php?page=pedidos&succes=2");
        } else {
            echo "<div class=' alert alert-danger'> Erro al eliminar Empleado</div> ";
        }
    }

    public function edit()
    {

        $this->model->setProveedor($_POST["id_proveedor"]);
        $this->model->setFecha_pedido($_POST["fecha_pedido"]);
        $this->model->setFecha_estimada($_POST["fecha_estimada"]);
        $this->model->setFecha_real($_POST["fecha_real"]);
        $this->model->setEstado($_POST["estado_pedido"]);
        $this->model->setOrden($_POST["id_orden_pedido"]);
        $this->model->setCantidad($_POST["cantidad_pedido"]);
        $this->model->setPago($_POST["id_metodo_pago"]);
        $this->model->setUsuario($_POST["id_usuario"]);
        $this->model->setTotal($_POST["total_pedido"]);


        if ($this->model->edit($_POST["id"]) && $this->almacenModel->updateStock(7, 10)) {
            header("Location: index.php?page=pedidos&succes=3");
            exit;
        } else {
            header("Location: index.php?page=pedidos&error=3");
        }
    }


    public function update()
    {
        $pago = ($_POST["pago"]);

        if ($pago >= $_POST["total_pedido"]) {

            $this->model->setEstado(true);

            $this->model->setFecha_real(date('Y-m-d H:i:s'));

            $this->model->setPago($_POST["id_metodo_pago"]);

            $this->model->setTotal($_POST["total_pedido"]);

            if ($this->model->update($_POST["id"])) {
                header("Location: index.php?page=pedidos&succes=4");
                exit;
            } else {
                header("Location: index.php?page=pedidos&error=4");
            }
        } else {
            header("Location: index.php?page=pedidos&error=montoInsuficiente");
        }
    }
}
