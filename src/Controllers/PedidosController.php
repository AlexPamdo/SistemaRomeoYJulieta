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

    public function __construct()
    {
        $this->model = new PedidosModel;
        $this->almacenModel = new AlmacenModel();
        $this->ordenPedido = new OrdenPedidoModel();
    }

    public function show()
    {
        if ($_SESSION['rol'] == 2 ) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $pedidosDeleteData = $this->model->viewPedidos(1, "estado");
        $pedidosData = $this->model->viewPedidos(0, "estado");
        include_once("src/Views/Pedidos.php");
    }

    public function print()
    {
        $pedidosData = $this->model->viewPedidos(0, "estado");
        include_once("src/Libraries/fpdf/PedidosPDF.php");
    }


    public function calcularPrecio($materialesData)
    {
        $total = 0;
    
        foreach ($materialesData as $materiales) {
            if (!empty($materiales['cantidad']) && $materiales['id_Material'] !== "none") {
                // Verifica que getPrecio esté funcionando correctamente
                $precio = $this->almacenModel->showColumn("precio", "id_Material", $materiales['id_Material']);
                if ($precio === false) {
                    throw new Exception("Error al obtener el precio del material con ID: " . $materiales['id_Material']);
                }
    
                // Multiplica el precio por la cantidad
                $total += $precio * $materiales['cantidad'];
            } else {
                return null; // Retornar null si hay un material no válido
            }
        }
    
        return $total > 0 ? $total : null; // Retornar null si no hay materiales válidos
    }


    public function subirStock($materialesData, $id_pedido)
{
    // Verificación previa de id_pedido antes de iterar
    if (!$id_pedido) {
        throw new Exception("Error: id de pedido no válido");
    }

    foreach ($materialesData as $materiales) {
        if (!empty($materiales['cantidad']) && $materiales['id_Material'] !== "none") {

            // Obtener el stock actual y calcular el nuevo stock
            $stock = $this->almacenModel->showColumn("stock", "id_material", $materiales['id_Material']);
            if ($stock === false) {
                throw new Exception("Error al obtener el stock actual del material con ID: " . $materiales['id_Material']);
            }

            $newStock = $materiales['cantidad'] + $stock;

            // Actualizar el stock
            if (!$this->almacenModel->updateColumn(
                "stock",
                $newStock,
                "id_material",
                $materiales['id_Material']
            )) {
                throw new Exception("Error al actualizar el stock del material con ID: " . $materiales['id_Material']);
            }

            // Registrar el material en la tabla ordenPedido
            $this->ordenPedido->setData(
                $id_pedido,
                $materiales['id_Material'],
                $materiales['cantidad']
            );

            if (!$this->ordenPedido->create()) {
                throw new Exception("Error al registrar el material con ID: " . $materiales['id_Material'] . " en la orden de pedido");
            }
        } else {
            // Opcional: podrías usar continue si quieres ignorar los materiales inválidos
            throw new Exception("Material inválido detectado, verifique los datos ingresados.");
        }
    }
}


    public function create()
{
    try {
       

        if (isset($_POST['material']) && is_array($_POST['material'])) {
            $total = $this->calcularPrecio($_POST['material']);

            // Asignar el ID y otros datos
            $this->model->setData(
                $_POST["proveedor"],
                date('Y-m-d H:i:s'),
                false,
                $_SESSION["id_user"],
                $total
            );


            $id_pedido = $this->model->create();

            if (!$id_pedido) {
                throw new Exception("Error al registrar el pedido");
            }

            $this->subirStock($_POST['material'], $id_pedido);

        
            header("Location: index.php?page=pedidos&succes=create");
        } else {
            throw new Exception("No se han proporcionado materiales válidos");
        }
    } catch (Exception $e) {
       
        header("Location: index.php?page=pedidos&error=other&errorDesc=" . $e->getMessage());
    }
    exit();
}



   /*  public function create()
    {
        try {

            $this->model->beginTransaction();

            if (isset($_POST['material']) && is_array($_POST['material'])) {

                $total = $this->calcularPrecio($_POST['material']);

                $this->model->setData(
                    $_POST["id_proveedor"],
                    date('Y-m-d H:i:s'),
                    false,
                    $_SESSION["id_user"],
                    $total
                );

                $id_pedido = $this->model->create();

                if (!$id_pedido) {
                    throw new Exception("Error al registrar el pedido");
                }


                foreach ($_POST['material'] as $materiales) {
                    if ($materiales['cantidad'] !== '' && $materiales['id_Material'] !== "none") {
                        //y vamos agregando el nuevo stock a dicho material
                        $stock = $this->almacenModel->showColumn("stock", "id_material", $materiales['id_Material']);
                        $newStock = $materiales['cantidad'] + $stock;

                        if (!$this->almacenModel->updateColumn(
                            "stock",
                            $newStock,
                            "id_material",
                            $materiales['id_Material']
                        )) {
                            throw new Exception("Error al Actualizar el stock del material");
                        }

                        //Anotar el material en la tabla ordenPedido
                        $this->ordenPedido->setData(
                            $id_pedido,
                            $materiales['id_Material'],
                            $materiales['cantidad'],
                        );

                        if (!$this->ordenPedido->create()) {
                            throw new Exception("Error al registrar el material");
                        }
                    } else {
                        throw new Exception("No se han ingresado materiales validos para calcular el precio");
                    }
                }

                $this->model->commit();
                header("Location: index.php?page=pedidos&succes=create");
            } else {
                throw new Exception("No se han proporcionado materiales válidos");
            }
        } catch (Exception $e) {
            $this->model->rollback();
            header("Location: index.php?page=pedidos&error=other&errorDesc=" . $e->getMessage());
            exit();
        }
    }
 */

    public function delete()
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
                header("Location: index.php?page=pedidos&succes=delete");
            } else {
                header("Location: index.php?page=pedidos&error=delete");
            }
        } catch (Exception $e) {
            $this->model->rollBack();
            header("Location: index.php?page=pedidos&error=other&errorDesc=" . $e->getMessage());
            exit();
        }
    }


    public function restore()
    {
        if ($this->model->active($_POST["id"])) {
            header("Location: index.php?page=pedidos&succes=restore");
        } else {
            header("Location: index.php?page=pedidos&error=restore");
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
                    header("Location: index.php?page=pedidos&success=4");
                    exit;
                } else {
                    header("Location: index.php?page=pedidos&error=4");
                }
            } else {
                throw new Exception("No se pudo obtener el estado del pedido");
            }
        } catch (Exception $e) {
            header("Location: index.php?page=pedidos&error=other&errorDesc=" . $e->getMessage());
        }
    }

    
}
