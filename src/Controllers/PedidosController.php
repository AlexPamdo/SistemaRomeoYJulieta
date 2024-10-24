<?php

namespace src\Controllers;

use src\Model\PedidosModel;
use src\Model\AlmacenModel;
use src\Model\OrdenPedidoModel;
use Interfaces\CrudController;

use Exception;

class PedidosController implements CrudController
{

    private $model;
    private $almacenModel;
    private $ordenPedido;
    private $conn;

    public function __construct()
    {
        $this->model = new PedidosModel;
        $this->almacenModel = new AlmacenModel();
        $this->ordenPedido = new OrdenPedidoModel();
        $this->conn = $this->model->getDbConnection();
    }

    public function show()
    {
        $pedidosData = $this->model->viewAll();
        include_once("src/Views/Pedidos.php");
    }


    public function create()
    {
        try {

            $this->conn->beginTransaction();

            if (isset($_POST['material']) && is_array($_POST['material'])) {

                $pedido = $this->model->selectLastId() + 1 ?: 1; 
                $total = 0;
                foreach ($_POST['material'] as $materiales) {
                    if ($materiales['cantidad'] !== '' && $materiales['id_Material'] !== "none") {
                        //Vamos sumando el precio de los materiales ingresados
                        $total += $this->almacenModel->getMaterialPrice($materiales['id_Material']) * $materiales['cantidad'];

                        if($total === 0){
                             throw new Exception("Fallo ocurrido al obtener precios");
                        }

                        //y vamos agregando el nuevo stock a dicho material
                        $stock = $this->almacenModel->getMaterialStock($materiales['id_Material']);
                        if ($stock) {
                            $newStock = $materiales['cantidad'] + $stock;
                            $this->almacenModel->updateStock($materiales['id_Material'], $newStock);

                            //Anotar el material en la tabla ordenPedido
                            $this->ordenPedido->setAtributes($pedido, $materiales['id_Material'], $materiales['cantidad']);
                            if($this->ordenPedido->create()){
                               
                            }else{
                                throw new Exception("Error al registrar el material");
                            }       
                        } else {
                            throw new Exception("No se ha encontrado ningun precio del material ingresado VALUES: " .$this->almacenModel->getMaterialStock($materiales['id_Material']));
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
            $this->model->setEstado(false);
            $this->model->setUsuario($_SESSION["id_user"]);
            $this->model->setTotal($total);

            if ($this->model->create()) {

                $this->conn->commit();
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
        $this->model->setEstado($_POST["estado_pedido"]);
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
        $data = $this->model->viewOne($_POST["id"]);
    
        if ($data) {
            // Verifica el estado del pedido
            if ($data['estado_pedido'] == 0) {
                $this->model->setEstado(1); // Cambia a "pagado"
            } else{
                $this->model->setEstado(0); // Cambia a "no pagado"
            }
    
            // Intenta actualizar
            if ($this->model->update($_POST["id"])) {
                header("Location: index.php?page=pedidos&success=4");
                exit;
            } else {
                // Agrega depuración aquí si es necesario
                header("Location: index.php?page=pedidos&error=4");
            }
        } else {
            header("Location: index.php?page=pedidos&error=la_variable_data_no_se_lleno");
        }
    }

}