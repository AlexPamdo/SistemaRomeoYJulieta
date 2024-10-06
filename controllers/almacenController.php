<?php

require_once("interfaces/interface.php");
include_once "model/almacenModel.php";


class almacenController implements crudController
{

    private $materialModel;

    public function __construct()
    {
        $this->materialModel = new material();

       
    }

    public function show()
    {
        $materialData = $this->materialModel->viewAll();
        include_once("views/almacen.php");
    }

    public function create()
    {

        $this->materialModel->setNombre($_POST["nombre_material"]);
        $this->materialModel->setTipo($_POST["tipo_material"]);
        $this->materialModel->setColor($_POST["color_material"]);
        $this->materialModel->setStock($_POST["stock"]);
        $this->materialModel->setPrecio($_POST["precio"]);

        if ($this->materialModel->create()) {
            //aqui falto poner el telas y materiales
            header("Location: index.php?page=almacen&succes=1");
        } else {
            echo "<div class='alert alert-warning'> Error al Crear cliente </div> ";
        }
    }



    public function delete()
    {
        if ($this->materialModel->delete($_POST["id"])) {
            header("Location: index.php?page=almacen&succes=2");
        } else {
            echo "<div class=' alert alert-danger'> Error al eliminar material</div> ";
        }
    }



    public function edit()
    {
        $this->materialModel->setNombre($_POST["nombre_material"]);
        $this->materialModel->setTipo($_POST["tipo_material"]);
        $this->materialModel->setColor($_POST["color_material"]);
        $this->materialModel->setStock($_POST["stock"]);
        $this->materialModel->setPrecio($_POST["precio"]);


        if ($this->materialModel->edit($_POST["id"] ?? null)) {
            header("Location: index.php?page=almacen&succes=3");
            exit;
        } else {
            echo "<div class='alert alert-warning'> Error al Editar Usuario </div>";
        }
       
    }
}
