<?php

namespace src\Controllers;

use src\Model\PatronesModel;
use src\Model\PrendasModel;
use src\Model\PrendaPatronModel;
use src\Model\AlmacenModel;
use Interfaces\CrudController;
use Exception;

class PrendasController implements CrudController
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

    public function show()

    {

        if ($_SESSION['rol'] == 2) {
            header('Location: index.php?page=dashboard');
            exit;
        }
        //Recordatorio QUe me quede imprimiendo el stock
        $prendaDesabilitadosData = $this->prendaModel->viewPrendas(1, "estado", "");
        $prendaData = $this->prendaModel->viewPrendas(0, "estado", "");
        $prendasNoStockData = $this->prendaModel->viewPrendas(0, "estado", 0);

        $patronesData = $this->prendaPatronModel->viewAll();

        require_once("src/Views/Prendas.php");
    }

    public function viewAll()
     {
         try {
             $prendasData = $this->prendaModel->viewPrendas(0, "estado");
             echo json_encode($prendasData);
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
             $ordenPedidoData = $this->prendaPatronModel->viewMaterials($id);
             echo json_encode($ordenPedidoData);
         } catch (Exception $e) {
             echo json_encode([
                 "success" => false,
                 "message" => $e->getMessage()
             ]);
         }
     }

    public function agregarMaterial($material, $ultimoId)
    {

        if ($material['cantidad'] !== '' && $material['id_Material'] !== "none") {

            $this->prendaPatronModel->setData(
                $ultimoId,
                $material['id_Material'],
                $material['cantidad']
            );

            if (!$this->prendaPatronModel->create()) {
                throw new Exception("Error al insertar los materiales del patrón");
            }
            return true;
        } else {
            throw new Exception("No se han proporcionado materiales válidos");
        }
    }

    public function subirImagen($file)
    {
        if ($_FILES["file1"]["error"] === UPLOAD_ERR_OK) {
            $nom_archivo = basename($_FILES['file1']['name']);
            $ruta = "src/Assets/img/prendas/" . $nom_archivo;
            $archivo = $_FILES['file1']['tmp_name'];

            if (!move_uploaded_file($archivo, $ruta)) {
                throw new Exception("Error al subir la imagen");
            }

            return $ruta;
        } else {
            return "src/Assets/img/prendas/prendaDefault.png";
        }
    }

    public function create()
    {
        try {
            // $this->prendaModel->beginTransaction();

            if (!isset($_POST['material']) && !is_array($_POST['material'])) {
                throw new Exception("No se han proporcionado materiales válidos: No se pudo verificar si existe y es un array");
            }

            // Subir la imagen de la prenda
            $ruta = $this->subirImagen($_FILES["file1"]);

            // Asignar los atributos de la prenda con el ID del patrón recién creado
            $this->prendaModel->setData(
                $ruta,
                $_POST["nombre"],
                $_POST["id_genero"],
                $_POST["id_categoria"],
                $_POST["id_talla"],
                $_POST["id_coleccion"],
                $_POST["stock"],
            );


            // Obtener el ID del patrón recién creado
            $ultimoId = $this->prendaModel->create();

            if (!$ultimoId) {
                throw new Exception("Error al crear la prenda");
            }

            //Asignamos los datos de materiales necesarios para crear la prenda
            foreach ($_POST['material'] as $material) {
                if (!$this->agregarMaterial($material, $ultimoId)) {
                    throw new Exception('No se pudo agregar algun material al patron');
                }
            }

            // $this->prendaModel->commit();
            header("location:index.php?page=prendas&succes=create");
            exit();
        } catch (Exception $e) {
            // $this->prendaModel->rollback();
            header("location:index.php?page=prendas&error=other&errorDesc=" . urlencode($e->getMessage()));
            exit();
        }
    }


    public function print()
    {
        $prendaData = $this->prendaModel->viewAll(false);
        include_once("src/Libraries/fpdf/PrendasPDF.php");
    }


    public function delete()
    {
        // Antes de llamar al softDelete
        error_log("ID recibido: " . $_POST["id"]);

        if ($this->prendaModel->softDelete($_POST["id"])) {
            echo json_encode([
                "success" => true,
                "message" => "Prenda eliminada correctamente"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "No se pudo eliminar la prenda"
            ]);
        }
    }

    public function remove()
    {
        if ($this->prendaModel->remove($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=remove");
        } else {
            header("Location: index.php?page=prendas&error=remove");
        }
    }

    public function restore()
    {
        if ($this->prendaModel->active($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=restore");
        } else {
            header("Location: index.php?page=prendas&error=restore");
        }
    }


    public function edit()
    {
        $prenda = $_POST["id"];
        $materialesPrenda = $_POST['material'];
        try {

            $this->prendaModel->setData(
                "",
                $_POST["nombre"],
                $_POST["id_genero_edit"],
                $_POST["id_categoria"],
                $_POST["id_talla"],
                $_POST["id_coleccion"],
                $_POST["stock"]
            );

            // Iniciamos la transacción
            $this->prendaModel->beginTransaction();

            if(!$this->prendaModel->edit($prenda)){
                throw new Exception("No pudo editar la prenda");
            }

            // Verificación inicial de los datos de entrada
            if (!isset($materialesPrenda) || !is_array($materialesPrenda)) {
                throw new Exception("No se han proporcionado materiales válidos: No es un array");
            }

            // Limpiamos los datos del antiguo patron
            if (!$this->prendaPatronModel->delete($prenda)) {
                throw new Exception("No pudo limpiar la lista de materiales");
            }

            // Registramos los nuevos materiales a dicho patron
            $this->agregarMaterial($materialesPrenda, $prenda);

            // Commit de la transacción y redirección exitosa
            $this->prendaModel->commit();
            header("location:index.php?page=prendas&succes=edit");
        } catch (Exception $e) {
            $this->prendaModel->rollBack();

            // Mensaje de error limpio y seguro
            $errorDesc = htmlspecialchars($e->getMessage());
            header("location:index.php?page=prendas&error=other&errorDesc=" . $errorDesc);
            exit();
        }
    }
}
