<?php

namespace src\Controllers;

use src\Controllers\ControllerBase;
use src\Model\AlmacenModel;
use Exception;

class AlmacenController extends ControllerBase
{
    private $materialModel;

    public function __construct()
    {
        $this->materialModel = new AlmacenModel();
    }

    /**
     * Renderiza la vista principal del almacén.
     */
    public function show()
    {
        include_once("src/Views/Almacen.php");
    }

    /**
     * Retorna datos de materiales en formato JSON.
     */
    public function viewDelete()
    {
        $this->procesarRespuestaJson(function () {
            return $this->materialModel->viewAll(1, "estado");
        });
    }

    /**
     * Retorna todos los materiales activos en formato JSON.
     */
    public function viewAll()
    {
        $this->procesarRespuestaJson(function () {
            return $this->materialModel->viewAll(0, "estado");
        });
    }

    /**
     * Genera un reporte PDF de los materiales.
     */
    public function print()
    {
        $materialData = $this->materialModel->viewAll(false);
        include_once("src/Libraries/fpdf/AlmacenPDF.php");
    }

    /**
     * Crea un nuevo material.
     */
    public function create()
    {
        $this->procesarRespuestaJson(function () {
            $this->materialModel->setData(
                $_POST["nombre_material"],
                $_POST["tipo_material"],
                $_POST["color_material"],
                $_POST["stock"],
                $_POST["medida_material"],
            );
            return $this->materialModel->create()
                ? ["success" => true, "message" => "Material creado correctamente"]
                : ["success" => false, "message" => "No se pudo crear el material"];
        });
    }

    /**
     * Realiza un borrado lógico del material.
     */
    public function delete()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->materialModel->softDelete($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Material eliminado correctamente" : "No se pudo eliminar el material"
            ];
        });
    }

    /**
     * Elimina permanentemente un material.
     */
    public function remove()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->materialModel->remove($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Material removido correctamente" : "No se pudo remover el material"
            ];
        });
    }

    /**
     * Restaura un material eliminado.
     */
    public function restore()
    {
        $this->procesarRespuestaJson(function () {
            $result = $this->materialModel->active($_POST["id"]);
            return [
                "success" => $result,
                "message" => $result ? "Material restaurado correctamente" : "No se pudo restaurar el material"
            ];
        });
    }

    /**
     * Edita los datos de un material existente.
     */
    public function edit()
    {
        $this->procesarRespuestaJson(function () {
            $this->materialModel->setData(
                $_POST["nombre_material"],
                $_POST["tipo_material"],
                $_POST["color_material"],
                $_POST["stock"],
                $_POST["medida_material"],
            );
            $result = $this->materialModel->edit($_POST["id"] ?? null);
            return [
                "success" => $result,
                "message" => $result ? "Material editado correctamente" : "No se pudo editar el material"
            ];
        });
    }
}
