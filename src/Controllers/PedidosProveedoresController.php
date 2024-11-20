<?php

namespace src\Controllers;

use src\Model\PedidosProveedoresModel;
use src\Model\AlmacenModel;
use src\Model\OrdenPedidoModel;
use Exception;

class PedidosProveedoresController extends ControllerBase
{
    private $model;
    private $almacenModel;
    private $ordenPedido;

    public function __construct()
    {
        $this->model = new PedidosProveedoresModel();
        $this->almacenModel = new AlmacenModel();
        $this->ordenPedido = new OrdenPedidoModel();
    }

    /**
     * Renderiza la vista de pedidos de proveedores.
     */
    public function show()
    {
        include "src/Views/PedidosProveedores.php";
    }

    /**
     * Obtiene todos los pedidos activos en formato JSON.
     */
    public function viewAll()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewPedidos(0, "estado");
        });
    }
 
    public function print()
    {
        $pedidosData = $this->model->viewPedidos(0, "estado");
        include_once("src/Libraries/fpdf/PedidosPDF.php");
    }

     /**
     * Obtiene todos los pedidos activos en formato JSON.
     */
    public function viewDelete()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewPedidos(1, "estado");
        });
    }

    /**
     * Obtiene los detalles de un pedido específico en formato JSON.
     */
    public function viewDetails()
    {
        $this->procesarRespuestaJson(function () {
            $id = $_GET['id'] ?? null;
            if (!$id) {
                throw new Exception("ID de pedido no especificado.");
            }
            return $this->ordenPedido->viewMaterials($id, "id_pedido");
        });
    }

    /**
     * Crea un nuevo pedido.
     */
    public function create()
{
    $this->procesarRespuestaJson(function () {
        // Validar materiales
        if (!isset($_POST['material']) || !is_array($_POST['material'])) {
            throw new Exception("No se encontraron materiales válidos.");
        }

        // Iniciar la transacción antes de cualquier operación de base de datos
        $this->model->beginTransaction();

        // Establecer datos del pedido
        $this->model->setData(
            $_POST["proveedor"],
            date('Y-m-d H:i:s'),
            false,
            $_SESSION["id_user"]
        );

        // Crear el pedido
        $id_pedido = $this->model->create();
        if (!$id_pedido) {
            $this->model->rollBack(); // Realizar rollback si no se pudo crear el pedido
            throw new Exception("Error al registrar el pedido.");
        }

        // Registrar materiales
        if (!$this->registrarMateriales($_POST['material'], $id_pedido)) {
            $this->model->rollBack(); // Realizar rollback si no se pudieron registrar los materiales
            throw new Exception("Error al registrar los materiales en la orden de pedido.");
        }

        // Si todo ha ido bien, hacer commit
        if ($this->model->commit()) {
            return ["success" => true, "message" => "Pedido creado correctamente."];
        } else {
            $this->model->rollBack(); // Si commit falla, hacer rollback
            throw new Exception("No se pudo finalizar la transacción.");
        }
    });
}


    /**
     * Actualiza el estado de un pedido y el stock.
     */
    public function update()
    {
        $this->procesarRespuestaJson(function () {
            $pedido = $_POST['id'] ?? null;
            if (!$pedido) {
                throw new Exception("ID de pedido no especificado.");
            }

            $this->model->beginTransaction();

            $ordenPedido = $this->ordenPedido->viewAll($pedido, "id_pedido");
            if (!$ordenPedido) {
                throw new Exception("No se ha encontrado el pedido con ID: " . $pedido);
            }

            if (!$this->subirStock($ordenPedido)) {
                throw new Exception("Error al actualizar el stock de los materiales.");
            }

            if (!$this->model->updateColumn("proceso", 1, "id_pedido", $pedido)) {
                throw new Exception("Error al actualizar el estado del pedido.");
            }

            $this->model->commit();

            return ["success" => true, "message" => "Pedido actualizado correctamente."];
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

            if (!$this->model->updateColumn("proceso", 4, "id_pedido", $id)) {
                throw new Exception("Error al actualizar el estado del pedido.");
            }

            return ["success" => true, "message" => "Pedido eliminado correctamente."];
        });
    }

    /**
     * Registra materiales en la orden de pedido.
     */
    private function registrarMateriales($materialesData, $id_pedido)
    {
        foreach ($materialesData as $material) {
            $this->ordenPedido->setData(
                $id_pedido,
                $material['id_Material'],
                $material['cantidad']
            );

            if (!$this->ordenPedido->create()) {
                throw new Exception("Error al registrar el material con ID: " . $material['id_material']);
            }
        }
        return true;
    }

    /**
     * Actualiza el stock de materiales en el almacén.
     */
    private function subirStock($materialesData)
    {
        foreach ($materialesData as $material) {
            $stock = $this->almacenModel->showColumn("stock", "id_material", $material['id_material']);
            if (!$stock) {
                throw new Exception("Error al obtener el stock actual del material con ID: " . $material['id_material']);
            }

            $newStock = $material['cantidad_material'] + $stock;

            if (!$this->almacenModel->updateColumn("stock", $newStock, "id_material", $material['id_material'])) {
                throw new Exception("Error al actualizar el stock del material con ID: " . $material['id_material']);
            }
        }
        return true;
    }
}
