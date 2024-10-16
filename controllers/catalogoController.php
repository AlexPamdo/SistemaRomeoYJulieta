<?php

require_once("interfaces/interface.php");
require_once("model/CatalogoModel.php");
require_once("model/prendasModel.php");

class catalogoController implements crudController
{
    private $catalogoModel;
    public function __construct()

    {
        $this->catalogoModel = new CatalogoModel();
    }

    public function show()
    {
        $catalogoData = $this->catalogoModel->viewAll();
        require_once("views/catalogo.php");
    }

    public function create()
    {
        try {

            $idCatalogo = $this->catalogoModel->selectLastId() + 1 ?: 1;

            if (isset($_FILES['images'])) {
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $file_name = $_FILES['images']['name'][$key];
                    $file_tmp = $_FILES['images']['tmp_name'][$key];

                    // Aquí puedes mover el archivo a un directorio o procesarlo como necesites
                    if (move_uploaded_file($file_tmp, "Assets/img/Catalogo/" . $file_name)) {
                        if ($this->catalogoModel->insertImg($idCatalogo, $file_name)) {
                        } else {
                            throw new Exception("Error Al Insertar la ruta en la tabla");
                        }
                    } else {
                        throw new Exception("Error al mover el archivo a la ruta indicada");
                    }
                }
            }

            $this->catalogoModel->setAtributes(
                $_POST["desc"],
                $_POST["precio"],
                $_POST["grupo"] ?: 1,
                $_POST["detalles"]
            );

            if ($this->catalogoModel->create()) {
                header("location:index.php?page=catalogo&succes");
            } else {
                throw new Exception("Error al registrar en el catalogo");
            }
        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();
            exit();
        }
    }
    public function delete()
    {
        try {

            if ($this->catalogoModel->delete($_POST["id"])) {
                header("location:index.php?page=catalogo&succes");
            } else {
                throw new Exception("Error al eliminar elemento");
            }
        } catch (Exception $e) {
            echo "" . $e->getMessage();
        }
    }

    public function edit() {}
}
