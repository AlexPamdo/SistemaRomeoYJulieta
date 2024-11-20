<?php

namespace src\Controllers;

use src\Model\PatronesModel;
use src\Model\PrendasModel;
use src\Model\PrendaPatronModel;
use src\Model\AlmacenModel;
use Exception;

class PrendasController extends ControllerBase
{
    private $patronModel;
    private $prendaModel;
    private $prendaPatronModel;
    private $almacenModel;

    public function __construct()
    {
        $this->prendaModel = new PrendasModel();
        $this->prendaPatronModel = new PrendaPatronModel();
        $this->almacenModel = new AlmacenModel();
    }

    /**
     * Renderiza la vista principal de prendas.
     */
    public function show()
    {
        include_once("src/Views/Prendas.php");
    }

    /**
     * Retorna todas las prendas activas en formato JSON.
     */
    public function viewAll()
    {
        $this->procesarRespuestaJson(function () {
            return $this->prendaModel->viewPrendas(0, "estado");
        });
    }

    /**
     * Retorna todas las prendas inactivas en formato JSON.
     */
    public function viewDelete()
    {
        $this->procesarRespuestaJson(function () {
            return $this->prendaModel->viewPrendas(1, "estado");
        });
    }

    /**
     * Retorna los detalles de una prenda específica en formato JSON.
     */
    public function viewDetails()
    {
        $this->procesarRespuestaJson(function () {
            $id = $_GET['id'] ?? null;
            if (!$id) {
                throw new Exception("ID de prenda no especificado.");
            }
            return $this->prendaPatronModel->viewMaterials($id);
        });
    }

    public function viewElement()
    {
        $this->procesarRespuestaJson(function () {
            return $this->prendaModel->viewAll($_GET["id"], "id_prenda");
        });
    }

    /**
     * Agrega materiales a una prenda.
     */
    private function agregarMaterial($material, $ultimoId)
    {
        if (!empty($material['cantidad']) && $material['id_Material'] !== "none") {
            $this->prendaPatronModel->setData(
                $ultimoId,
                $material['id_Material'],
                $material['cantidad']
            );

            if (!$this->prendaPatronModel->create()) {
                throw new Exception("Error al insertar los materiales de la prenda.");
            }
            return true;
        } else {
            throw new Exception("No se han proporcionado materiales válidos.");
        }
    }

    /**
     * Maneja la subida de imágenes para las prendas.
     */
    private function subirImagen($file)
    {

        if (isset($file) && $file["error"] === UPLOAD_ERR_OK) {
            $nom_archivo = basename($file['name']);
            $ruta = "src/Assets/img/prendas/" . $nom_archivo;
            $archivo = $file['tmp_name'];

            if (!move_uploaded_file($archivo, $ruta)) {
                throw new Exception("Error al subir la imagen.");
            }

            return $ruta;
        }
        return "src/Assets/img/prendas/prendaDefault.png";
    }

    /**
     * Crea una nueva prenda.
     */
    public function create()
    {
        $this->procesarRespuestaJson(function () {
            if (!isset($_POST['material']) || !is_array($_POST['material'])) {
                throw new Exception("No se han proporcionado materiales válidos.");
            }

            if (isset($_FILES["file1"])) {
                $ruta = $this->subirImagen($_FILES["file1"]);
            } else {
                $ruta = "src/Assets/img/prendas/prendaDefault.png";
            }

            $this->prendaModel->setData(
                $ruta,
                $_POST["nombre"],
                $_POST["id_genero"],
                $_POST["id_categoria"],
                $_POST["id_talla"],
                $_POST["id_coleccion"],
                $_POST["stock"]
            );

            $ultimoId = $this->prendaModel->create();
            if (!$ultimoId) {
                throw new Exception("Error al crear la prenda.");
            }

            foreach ($_POST['material'] as $material) {
                $this->agregarMaterial($material, $ultimoId);
            }

            return ["success" => true, "message" => "Prenda creada correctamente."];
        });
    }

    /**
     * Genera un reporte PDF de las prendas.
     */
    public function print()
    {
        $prendaData = $this->prendaModel->viewAll(false);
        include_once("src/Libraries/fpdf/PrendasTerminadasPDF.php");
    }

    /**
     * Realiza un borrado lógico de una prenda.
     */
    public function delete()
    {
        $this->procesarRespuestaJson(function () {
            $id = $_POST["id"] ?? null;
            if (!$id) {
                throw new Exception("ID de prenda no especificado.");
            }

            if (!$this->prendaModel->softDelete($id)) {
                throw new Exception("No se pudo eliminar la prenda.");
            }

            return ["success" => true, "message" => "Prenda eliminada correctamente."];
        });
    }

    /**
     * Restaura una prenda eliminada.
     */
    public function restore()
    {
        $this->procesarRespuestaJson(function () {
            $id = $_POST["id"] ?? null;
            if (!$id) {
                throw new Exception("ID de prenda no especificado.");
            }

            if (!$this->prendaModel->active($id)) {
                throw new Exception("No se pudo restaurar la prenda.");
            }

            return ["success" => true, "message" => "Prenda restaurada correctamente."];
        });
    }

    /**
     * Edita una prenda existente.
     */
    public function edit()
    {
        $this->procesarRespuestaJson(function () {
            $prendaId = $_POST["id"] ?? null;
            $materialesPrenda = $_POST['material'] ?? null;

            if (!$prendaId || !is_array($materialesPrenda)) {
                throw new Exception("Datos de entrada inválidos.");
            }

            $this->prendaModel->setData(
                "",
                $_POST["nombre"],
                $_POST["id_genero_edit"],
                $_POST["id_categoria"],
                $_POST["id_talla"],
                $_POST["id_coleccion"],
                $_POST["stock"]
            );

            $this->prendaModel->beginTransaction();

            if (!$this->prendaModel->edit($prendaId)) {
                throw new Exception("No se pudo editar la prenda.");
            }

            if (!$this->prendaPatronModel->delete($prendaId)) {
                throw new Exception("No se pudo limpiar los materiales de la prenda.");
            }

            foreach ($materialesPrenda as $material) {
                $this->agregarMaterial($material, $prendaId);
            }

            $this->prendaModel->commit();

            return ["success" => true, "message" => "Prenda editada correctamente."];
        });
    }
}
