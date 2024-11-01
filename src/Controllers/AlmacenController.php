<?php

namespace src\Controllers;

use src\Model\AlmacenModel;
use Interfaces\CrudController;


class AlmacenController implements CrudController
{

    private $materialModel;

    public function __construct()
    {
        $this->materialModel = new AlmacenModel();


    }

    public function show()
    {
        $materialesDesabilitados = $this->materialModel->viewAll(1,"eliminado");
        $materialData = $this->materialModel->viewAll();

        include_once("src/Views/Almacen.php");
    }

    public function print()
    {
        $materialData = $this->materialModel->viewAll(false);
        include_once("src/Libraries/fpdf/AlmacenPDF.php");
    }


    public function create()
    {

        $this->materialModel->setData(
            $_POST["nombre_material"],
            $_POST["tipo_material"],
            $_POST["color_material"],
            $_POST["stock"],
            $_POST["precio"]
        );

        if ($this->materialModel->create()) {
            header("Location: index.php?page=almacen&succes=create");
        } else {
            header("Location: index.php?page=almacen&error=create");
        }
    }



    public function delete()
    {
        if ($this->materialModel->softDelete($_POST["id"])) {
            header("Location: index.php?page=almacen&succes=delete");
        } else {
            header("Location: index.php?page=almacen&error=delete");
        }
    }

    public function remove()
    {
        if ($this->materialModel->remove($_POST["id"])) {
            header("Location: index.php?page=almacen&succes=remove");
        } else {
            header("Location: index.php?page=almacen&error=remove");
        }
    }

    public function restore()
    {
        if ($this->materialModel->active($_POST["id"])) {
            header("Location: index.php?page=almacen&succes=restore");
        } else {
            header("Location: index.php?page=almacen&error=restore");
        }
    }


    public function edit()
    {
        $this->materialModel->setData(
            $_POST["nombre_material"],
            $_POST["tipo_material"],
            $_POST["color_material"],
            $_POST["stock"],
            $_POST["precio"]
        );
        if ($this->materialModel->edit($_POST["id"] ?? null)) {
            header("Location: index.php?page=almacen&succes=edit");
            exit;
        } else {
            header("Location: index.php?page=almacen&error=edit");
        }

    }
}
