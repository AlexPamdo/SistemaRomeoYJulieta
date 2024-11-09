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

        if ($_SESSION['rol'] == 2 ) {
            header('Location: index.php?page=dashboard');
            exit;
        }
        //Recordatorio QUe me quede imprimiendo el stock
        $prendaDesabilitadosData = $this->prendaModel->viewPrendas(1,"estado","");
        $prendaData = $this->prendaModel->viewPrendas(0,"estado","");
        $prendasNoStockData = $this->prendaModel->viewPrendas(0,"estado",0);

        $patronesData = $this->prendaPatronModel->viewAll();
        
        require_once("src/Views/Prendas.php");
    }


    public function calcularPrecio($materialData)
    {
        $total = 0;

        foreach ($materialData as $material) {
            if (!empty($material['cantidad']) && $material['id_Material'] !== "none") {
                // Verifica que getPrecio esté funcionando correctamente
                $precio = $this->almacenModel->showColumn("precio", "id_Material", $material['id_Material']);
                if ($precio === false) {
                    throw new Exception("Error al obtener el precio del material con ID: " . $material['id_Material']);
                }

                $total += $precio;
            } else {
                return null; // Retornar null si hay un material no válido
            }
        }

        return $total > 0 ? $total : null; // Retornar null si no hay materiales válidos
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

            $total = $this->calcularPrecio($_POST['material']);

            if (!$total) {
                throw new Exception('No se pudo calcular ningun precio');
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
                $total
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
        if ($this->prendaModel->softDelete($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=delete");
        } else {
            header("Location: index.php?page=prendas&succes=delete");
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
    
        $this->prendaModel->setData(
            $_POST["img"],
            $_POST["nombre_edit"],
            $_POST["categoria_edit"],
            $_POST["talla_edit"],
            $_POST["coleccion_edit"],
            $_POST["cant_edit"],
            $_POST["genero_edit"],
            $_POST["precio_edit"]
        );


        if ($this->prendaModel->edit($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=edit");
            exit;
        } else {
            header("Location: index.php?page=prendas&succes=edit");
        }
    }

    public function edit2()
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

            if (!$this->prendaModel->updateColumn("precio_unitario", $total, "id_prenda", $_POST["id"])) {
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
