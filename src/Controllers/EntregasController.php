<?php

namespace src\Controllers;

use src\Model\EntregasModel;
use src\Model\PrendasModel;
use src\Model\OrdenEntregaModel;

use Interfaces\CrudController;

use Exception;

class EntregasController
{

    private $model;
    private $prendasModel;
    private $ordenEntrega;

    public function __construct()
    {
        $this->model = new EntregasModel();
        $this->prendasModel = new PrendasModel();
        $this->ordenEntrega = new OrdenEntregaModel();
    }

    public function show()
    {
        if ($_SESSION['rol'] == 2 ) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $entregasDeleteData = $this->model->viewEntregas(1, "estado");
        $entregasData = $this->model->viewEntregas(0, "estado");
        include_once("src/Views/Entregas.php");
    }

    public function print()
    {
        $pedidosData = $this->model->viewEntregas(0, "estado");
        include_once("src/Libraries/fpdf/PedidosPDF.php");
    }


    public function calcularPrecio($prendasData)
    {
        $total = 0;

        foreach ($prendasData as $prenda) {
            if (!empty($prenda['cantidad']) && $prenda['id_prenda'] !== "none") {
                // Verifica que getPrecio esté funcionando correctamente
                $precio = $this->prendasModel->showColumn("precio_unitario", "id_prenda", $prenda['id_prenda']);
                if ($precio === false) {
                    throw new Exception("Error al obtener el precio del material con ID: " . $prenda['id_prenda']);
                }

                $total += $precio;
            } else {
                return null; // Retornar null si hay un material no válido
            }
        }

        return $total > 0 ? $total : null; // Retornar null si no hay materiales válidos
    }


    //Accion sera la operacion "subir" para aumentar el stock y "bajar" para quitar
    public function uptdateStock($accion,$prendasData, $id_entrega)
    {
        foreach ($prendasData as $prenda) {
            if ($prenda['cantidad'] !== '' && $prenda['id_prenda'] !== "none") {

                $stock = $this->prendasModel->showColumn("stock", "id_prenda", $prenda['id_prenda']);

                $newStock = ($accion === 'subir') 
                ? $stock + $prenda['cantidad'] 
                : $stock - $prenda['cantidad'];

                if (!$this->prendasModel->updateColumn(
                    "stock",
                    $newStock,
                    "id_prenda",
                    $prenda['id_prenda']
                )) {
                    throw new Exception("Error al restar el stock de la prenda");
                }

                //Anotar el material en la tabla ordenPedido
                $this->ordenEntrega->setData(
                    $id_entrega,
                    $prenda['id_prenda'],
                    $prenda['cantidad'],
                );

                if (!$this->ordenEntrega->create()) {
                    throw new Exception("Error al registrar la prenda en la entrega");
                }
            } else {
                throw new Exception("No se han ingresado prendas validas");
            }
        }
    }


    public function create()
    {
        try {

            if (isset($_POST['prenda']) && is_array($_POST['prenda'])) {

                $total = $this->calcularPrecio($_POST['prenda']);

                $this->model->setData(  
                    date('Y-m-d H:i:s'),
                    $total
                );

                $id_entrega = $this->model->create();

                if (!$id_entrega) {
                    throw new Exception("Error al registrar el pedido");
                }

                $this->model->beginTransaction();

                $this->uptdateStock("bajar",$_POST['prenda'], $id_entrega);

                $this->model->commit();
                header("Location: index.php?page=entregas&succes=create");

            } else {
                throw new Exception("No se han proporcionado materiales válidos");
            }
        } catch (Exception $e) {
            $this->model->rollback();
            header("Location: index.php?page=entregas&error=other&errorDesc=" . $e->getMessage());
           
        }
        exit();  
    }



   /*  public function delete()
    {
        try {
            $this->model->beginTransaction();

            // Vamos a obtener la lista de materiales para saber cuanto quitar a que material en el stock
            $ordenPedidoData = $this->ordenPedido->viewMaterials($_POST["id"]);

            //Una vez obtenida la lista, vamos a ir iterando entre los materiales para conocer la cantidad y asi quitarla del stock
            foreach ($ordenPedidoData as $material) {
                $cantidadMaterialDelPedido = $material["cantidad_material"];
                $cantidadMaterialEnStock = $this->almacenModel->showColumn("stock", "id_material", $material["id_material"]);

                if (!$cantidadMaterialDelPedido) {
                    throw new Exception("Error al obtener uno de los datos del material");
                }

                // Vamos actualizando la cantidad del stock de cada materia
                $cantidadActualStock = $cantidadMaterialEnStock["stock"] - $cantidadMaterialDelPedido;

                if (!$this->almacenModel->updateColumn("stock", $cantidadActualStock, "id_material", $material["id_material"],)) {
                    throw new Exception("Ha ocurrido un error al modificar el stock de los materiales");
                }
            }

            if ($this->model->delete($_POST["id"])) {
                $this->model->commit();
                header("Location: index.php?page=entregas&succes=delete");
            } else {
                header("Location: index.php?page=entregas&error=delete");
            }
        } catch (Exception $e) {
            $this->model->rollBack();
            header("Location: index.php?page=entregas&error=other&errorDesc=" . $e->getMessage());
            exit();
        }
    } */


    public function restore()
    {
        if ($this->model->active($_POST["id"])) {
            header("Location: index.php?page=entregas&succes=restore");
        } else {
            header("Location: index.php?page=entregas&error=restore");
        }
    }

    public function edit() {}


    public function update()
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
                    header("Location: index.php?page=entregas&success=4");
                    exit;
                } else {
                    header("Location: index.php?page=entregas&error=4");
                }
            } else {
                throw new Exception("No se pudo obtener el estado del pedido");
            }
        } catch (Exception $e) {
            header("Location: index.php?page=entregas&error=other&errorDesc=" . $e->getMessage());
        }
    }

    
}
