<?php

namespace src\Controllers;

use src\Controllers\ControllerBase;
use src\Model\SupervisoresModel;
use Exception;

class SupervisoresController extends ControllerBase
{
    private $model;

    public function __construct()
    {
        $this->model = new SupervisoresModel();
    }

    /**
     * Renderiza la vista principal de supervisores.
     */
    public function show()
    {
        include_once("src/Views/Supervisores.php");
    }

    /**
     * Retorna todos los supervisores deshabilitados en formato JSON.
     */
    public function viewDelete()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewAll(1, "estado");
        });
    }

    /**
     * Retorna todos los supervisores activos en formato JSON.
     */
    public function viewAll()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewAll(0, "estado");
        });
    }

      /**
     * Retorna un elemento especifico mediante su ID en formato JSON.
     */
    public function viewElement()
    {
        $this->procesarRespuestaJson(function () {
            return $this->model->viewAll($_GET["id"], "id_supervisor");
        });
    }

    /**
     * Crea un nuevo supervisor.
     */
    public function create()
    {
        $this->procesarRespuestaJson(function () {
            $this->model->setData(
                $_POST["nombre_supervisor"],
                $_POST["apellido_supervisor"],
                $_POST["telefono_supervisor"],
                $_POST["email_supervisor"],
                $_POST["cedula_supervisor"]
            );
            $result = $this->model->create();
            return [
                "success" => $result,
                "message" => $result ? "Supervisor creado correctamente" : "No se pudo crear el Supervisor"
            ];
        });
    }

    /**
     * Realiza un borrado lógico de un supervisor.
     */
    public function delete()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->model->softDelete($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Supervisor deshabilitado correctamente" : "No se pudo deshabilitar el Supervisor"
            ];
        });
    }

    /**
     * Elimina permanentemente un supervisor.
     */
    public function remove()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->model->remove($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Supervisor eliminado correctamente" : "No se pudo eliminar el Supervisor"
            ];
        });
    }

    /**
     * Restaura un supervisor eliminado.
     */
    public function restore()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->model->active($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Supervisor restaurado correctamente" : "No se pudo restaurar el Supervisor"
            ];
        });
    }

    /**
     * Edita los datos de un supervisor existente.
     */
    public function edit()
    {
        $this->procesarRespuestaJson(function () {
            $this->model->setData(
                $_POST["nombre_supervisor_edit"],
                $_POST["apellido_supervisor_edit"],
                $_POST["telefono_supervisor_edit"],
                $_POST["email_supervisor_edit"],
                $_POST["cedula_supervisor_edit"]
            );
            $result = $this->model->edit($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Supervisor editado correctamente" : "No se pudo editar el Supervisor"
            ];
        });
    }
}
