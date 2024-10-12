<?php
include_once("model/patronesModel.php");
include_once("model/prendasModel.php");
include_once("model/patronMaterialModel.php");
require_once("interfaces/interface.php");

class PatronesController implements crudController
{

    private $patronModel;
    private $prendaModel;
    private $patronMaterialModel;
    private $conn;

    public function __construct()
    {
        $this->patronModel = new patrones();
        $this->prendaModel = new Prenda();
       
        $this->conn = $this->patronModel->getDbConnection();
    }

    public function show()
    {
        $patronesData = $this->patronModel->viewAll();

        include_once("views/patrones.php");
    }

    public function create()
    {
        try {
            // Iniciar la transacción
            $this->conn->beginTransaction();

            // Obtener el ID del patrón recién insertado
            $ultimoId = $this->patronModel->selectLastId();
      

            // Sacamos el precio segun los materiales para calcular el precio total               
            if (isset($_POST['material']) && is_array($_POST['material'])) {
                $total = 0;

                foreach ($_POST['material'] as $materiales) {

                    // Comprovamos si se eligio una cantidad, sino el no se sumara con el precio
                    if ($materiales['cantidad'] !== '' && $materiales['id_Material'] !== "none") {

                        $this->patronMaterialModel = new patronMaterial();

                        // Vamos Sumando el precio segun los materiales ingresados
                        $total += $this->patronModel->getPrecio($materiales['id_Material'], $materiales['cantidad']);

                        $this->patronMaterialModel->setAtributes($ultimoId, $materiales['id_Material'], $materiales['cantidad']);

                        if (!$this->patronMaterialModel->create()) {
                            throw new Exception("Error al insertar los materiales del patrón");
                        }
                    } else {
                        throw new Exception("No se han proporcionado materiales válidos");
                    }
                }
            } else {
                throw new Exception("No se han proporcionado materiales válidos: No se pudo verificar si existe y es un array");
            }


            // Asignar los atributos del patrón
            $this->patronModel->setAtribute("prenda", $_POST["nombre"]);

            // Asignamos el costo total 
            $this->patronModel->setCost($total);


            // Crear el patrón en la base de datos
            if ($this->patronModel->create()) {

                // Asignar los atributos de la prenda con el ID del patrón recién creado
                $this->prendaModel->setId($ultimoId); //El id de la prenda ira en conjunto con el del patron
                $this->prendaModel->setNombre($_POST["nombre"]);
                $this->prendaModel->setPatron($ultimoId); //Ponemos el patron al cual esta asignado mediante su mismo id
                $this->prendaModel->setcategoria($_POST["id_categoria"]);
                $this->prendaModel->setcolor($_POST["id_color"]);
                $this->prendaModel->setcant($_POST["stock"]);
                $this->prendaModel->setcoleccion($_POST["id_coleccion"]);
                $this->prendaModel->settalla($_POST["id_talla"]);
                $this->prendaModel->setgenero($_POST["id_genero"]);
                $this->prendaModel->setprecio($total); // El precio de la prenda es el total de los materiales

                // Subir la imagen de la prenda
                if ($_FILES["file1"]["error"] === UPLOAD_ERR_OK) {
                    $nom_archivo = basename($_FILES['file1']['name']);
                    $ruta = "Assets/img/prendas/" . $nom_archivo;
                    $archivo = $_FILES['file1']['tmp_name'];

                    if (move_uploaded_file($archivo, $ruta)) {
                        $this->prendaModel->setImg($ruta);
                    } else {
                        throw new Exception("Error al subir la imagen");
                    }
                } else {
                    // Usar imagen predeterminada si no se sube ninguna
                    $this->prendaModel->setImg("Assets/img/prendas/prendaDefault.png");
                }


                // Crear la prenda
                if ($this->prendaModel->create()) {
                    // Confirmar la transacción si todo salió bien
                    $this->conn->commit();
                    header("location:index.php?page=patrones&succes=1");
                    exit(); // Asegurarse de que el script no continúe ejecutándose
                } else {
                    throw new Exception("Error al crear la prenda");
                }
            } else {
                throw new Exception("Error al crear el patrón");
            }
        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();

            exit(); // Detener el script después del redireccionamiento
        }
    }


    public function delete()
    {

        if ($this->patronModel->delete($_POST["id"])) {
            header("location:index.php?page=patrones&succes=3");
        } else {
            header("location:index.php?page=patrones&error=3");
        }
    }

    public function edit()
    {

        $this->patronModel->setAtribute("prenda", $_POST["prenda"]);
        $this->patronModel->setAtribute("material", $_POST["material"]);
        $this->patronModel->setAtribute("cantidad", $_POST["cantidad"]);
        $this->patronModel->setPrecio($_POST["material"], $_POST["cantidad"]);

        if ($this->patronModel->edit($_POST["id"])) {
            header("location:index.php?page=patrones&succes=2");
        } else {
            header("location:index.php?page=patrones&error=2");
        }
    }
}
