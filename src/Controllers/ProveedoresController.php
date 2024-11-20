<?php

namespace src\Controllers;

use src\Controllers\ControllerBase;
use src\Model\ProveedoresModel;
use Exception;

class ProveedoresController extends ControllerBase
{
    private $model;

    public function __construct()
    {
        $this->model = new ProveedoresModel();
    }

    /**
     * Renderiza la vista principal de proveedores.
     */
    public function show()
    {
        include_once("src/Views/Proveedores.php");
    }

    /**
     * Retorna todos los proveedores activos en formato JSON.
     */
    public function viewAll()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewProveedores(0, "estado");
        });
    }

    
      /**
     * Retorna un elemento especifico mediante su ID en formato JSON.
     */
    public function viewElement()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewAll($_GET["id"], "id_proveedor");
        });
    }


    /**
     * Retorna todos los proveedores deshabilitados en formato JSON.
     */
    public function viewDelete()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewAll(1, "estado");
        });
    }

    /**
     * Crea un nuevo proveedor.
     */
    public function create()
    {
    
        $this->procesarRespuestaJson(function () {
            $this->model->setData(
                $_POST["nombre_proveedor"],
                $_POST["rif_proveedor"],
                $_POST["telefono_proveedor"],
                $_POST["gmail_proveedor"],
                $_POST["notas_proveedor"] ?? null
            );
            return $this->model->create()
                ? ["success" => true, "message" => "Proveedor creado correctamente"]
                : ["success" => false, "message" => "No se pudo crear el proveedor"];
        });
    }

    /**
     * Edita los datos de un proveedor existente.
     */
    public function edit()
    {
        $this->procesarRespuestaJson(function () {
            $this->model->setData(
                $_POST["nombre_proveedor"],
                $_POST["rif_proveedor"],
                $_POST["telefono_proveedor"],
                $_POST["gmail_proveedor"],
                $_POST["notas_proveedor"] ?? null
            );
            $result = $this->model->edit($_POST["id"] ?? null);
            return [
                "success" => $result,
                "message" => $result ? "Proveedor editado correctamente" : "No se pudo editar el proveedor"
            ];
        });
    }

    /**
     * Realiza un borrado lógico del proveedor.
     */
    public function delete()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->model->softDelete($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Proveedor eliminado correctamente" : "No se pudo eliminar el proveedor"
            ];
        });
    }

    /**
     * Elimina permanentemente un proveedor.
     */
    public function remove()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->model->remove($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Proveedor eliminado permanentemente" : "No se pudo eliminar el proveedor permanentemente"
            ];
        });
    }

    /**
     * Restaura un proveedor eliminado.
     */
    public function restore()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->model->active($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Proveedor restaurado correctamente" : "No se pudo restaurar el proveedor"
            ];
        });
    }
}
