<?php

namespace src\Controllers;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use src\Model\PatronesModel;
use src\Model\PrendasModel;
use src\Model\PatronMaterialModel;
use src\Model\AlmacenModel;
use Interfaces\CrudController;

use Exception;

class PatronesController implements CrudController
{

    private $patronModel;
    private $prendaModel;
    private $patronMaterialModel;
    private $almacenModel;

    public function __construct()
    {
        $this->patronModel = new PatronesModel();
        $this->prendaModel = new PrendasModel();
        $this->patronMaterialModel = new PatronMaterialModel();
        $this->almacenModel = new AlmacenModel();
    }

    public function show()
    {
        if ($_SESSION['rol'] == 2 ) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $patronesData = $this->patronModel->viewPatrones(0,"eliminado");
        include_once("src/Views/Patrones.php");
    }

    public function calcularPrecio($materialesData)
    {
        $total = 0;

        foreach ($materialesData as $materiales) {
            if (!empty($materiales['cantidad']) && $materiales['id_Material'] !== "none") {
                // Verifica que getPrecio esté funcionando correctamente
                $precio = $this->almacenModel->showColumn("precio","id_Material",$materiales['id_Material']);
                if ($precio === false) {
                    throw new Exception("Error al obtener el precio del material con ID: " . $materiales['id_Material']);
                }

                $total += $precio;
            } else {
                return null; // Retornar null si hay un material no válido
            }
        }

        return $total > 0 ? $total : null; // Retornar null si no hay materiales válidos
    }

    public function create()
    {
        try {

            // $this->patronModel->beginTransaction();


            // Asignar los atributos del patrón
            $this->patronModel->setData($_POST["nombre"]);
        
            // Obtener el ID del patrón recién creado
            $ultimoId = $this->patronModel->create();
    
            if (!$ultimoId) {
                throw new Exception("Error al crear Patron");
            }
       

            if (isset($_POST['material']) && is_array($_POST['material'])) {
                foreach ($_POST['material'] as $materiales) {
                    if ($materiales['cantidad'] !== '' && $materiales['id_Material'] !== "none") {

                        $this->patronMaterialModel->setData(
                            $ultimoId,
                            $materiales['id_Material'],
                            $materiales['cantidad']
                        );
                       
                        if (!$this->patronMaterialModel->create()) {
                            throw new Exception("Error al insertar los materiales del patrón");
                        }
                        error_log("Material agregado: ID " . $materiales['id_Material'] . ", Cantidad " . $materiales['cantidad']);
                    } else {
                        throw new Exception("No se han proporcionado materiales válidos");
                    }
                }

                $total = $this->calcularPrecio($_POST['material']);
            } else {
                throw new Exception("No se han proporcionado materiales válidos: No se pudo verificar si existe y es un array");
            }

             // Subir la imagen de la prenda
             if ($_FILES["file1"]["error"] === UPLOAD_ERR_OK) {
                $nom_archivo = basename($_FILES['file1']['name']);
                $ruta = "src/Assets/img/prendas/" . $nom_archivo;
                $archivo = $_FILES['file1']['tmp_name'];

                if (!move_uploaded_file($archivo, $ruta)) {
                    throw new Exception("Error al subir la imagen");
                } 
            } else {
               $ruta = "src/Assets/img/prendas/prendaDefault.png";
            }

            // Asignar los atributos de la prenda con el ID del patrón recién creado
            $this->prendaModel->setData(
                $ruta,
                $_POST["nombre"],
                $ultimoId,
                $_POST["stock"],
                $_POST["id_talla"],
                $_POST["id_coleccion"],
                $_POST["id_color"],
                $_POST["stock"],
                $_POST["id_genero"], 
                $total
            );

            // Crear la prenda
            if ($this->prendaModel->create()) {
                //    $this->patronModel->commit();
             
                header("location:index.php?page=patrones&succes=create");
                exit();
            } else {
                header("location:index.php?page=patrones&error=create");
            }
        } catch (Exception $e) {
            // $this->patronModel->rollback();
           
            header("location:index.php?page=patrones&error=other&errorDesc=" . urlencode($e->getMessage()));
            exit();
        }
    }


    public function delete()
    {

        if ($this->patronModel->softDelete($_POST["id"]) && $this->prendaModel->softDelete($_POST["id"])) {
            header("location:index.php?page=patrones&succes=delete");
        } else {
            header("location:index.php?page=patrones&error=delete");
        }
    }

    public function remove()
    {
        if ($this->patronModel->remove($_POST["id"])) {
            header("Location: index.php?page=patrones&succes=remove");
        } else {
            header("Location: index.php?page=patrones&error=remove");
        }
    }

    public function restore()
    {
        if ($this->patronModel->active($_POST["id"])) {
            header("Location: index.php?page=patrones&succes=restore");
        } else {
            header("Location: index.php?page=patrones&error=restore");
        }
    }

    public function edit()
    {
        try {
            // Verificación inicial de los datos de entrada
            if (!isset($_POST['material']) || !is_array($_POST['material'])) {
                throw new Exception("No se han proporcionado materiales válidos: No es un array");
            }

            // Iniciamos la transacción
            $this->patronModel->beginTransaction();

            // Limpiamos los datos del antiguo patron
            if (!$this->patronMaterialModel->delete($_POST["id"])) {
                throw new Exception("No pudo limpiar la lista de materiales");
            }

            // Registramos los nuevos materiales a dicho patron
            foreach ($_POST['material'] as $materiales) {
                if (!empty($materiales['cantidad']) && isset($materiales['id_Material']) && $materiales['id_Material'] !== "none") {
                  
                    $this->patronMaterialModel->setData(
                        $_POST["id"],
                        $materiales['id_Material'],
                        $materiales['cantidad']
                    );
                   

                    if (!$this->patronMaterialModel->create()) {
                        throw new Exception("Error al insertar los materiales del patrón");
                    }
                    error_log("Material agregado: ID " . $materiales['id_Material'] . ", Cantidad " . $materiales['cantidad']);
                } else {
                    throw new Exception("No se han proporcionado materiales válidos o cantidad no puede ser nulo");
                }
            }

            // Aplicamos el nuevo precio de la prenda
            $total = $this->calcularPrecio($_POST['material']);

            if (!$this->prendaModel->updateColumn("precio_unitario",$total,"id_prenda",$_POST["id"])) {
                throw new Exception("No se pudo actualizar el precio de la prenda");
            }

            // Commit de la transacción y redirección exitosa
            $this->patronModel->commit();
            header("location:index.php?page=patrones&succes=edit");
        } catch (Exception $e) {
            $this->patronModel->rollBack();

            // Mensaje de error limpio y seguro
            $errorDesc = htmlspecialchars($e->getMessage());
            header("location:index.php?page=patrones&error=other&errorDesc=" . $errorDesc);
            exit();
        }
    }

    
}
