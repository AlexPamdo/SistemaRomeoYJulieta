<?php
namespace src\Controllers;

use src\Model\PrendasModel;
use Interfaces\CrudController;

use Exception;
use src\Model\PatronesModel;

class PrendasController implements CrudController
{
    private $model;
    private $patronesModel;

    public function __construct()
    {
        $this->model = new PrendasModel();
        $this
        ->patronesModel = new PatronesModel();
    }

    public function show()
    {
        $prendaDesabilitadosData = $this->model->viewAll(true);
        $prendaData = $this->model->viewAll(false);
        require_once("src/Views/Prendas.php");
    }

    public function print()
    {
        $prendaData = $this->model->viewAll(false);
        include_once("src/Libraries/fpdf/PrendasPDF.php");
    }

   
    public function delete()
    {
        if ($this->model->softDelete($_POST["id"]) && $this->patronesModel->softDelete($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=delete");
        } else {
            header("Location: index.php?page=prendas&succes=delete");
        }
    }

    public function remove()
    {
        if ($this->model->remove($_POST["id"]) && $this->patronesModel->active($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=remove");
        } else {
            header("Location: index.php?page=prendas&error=remove");
        }
    }

    public function restore()
    {
        if ($this->model->active($_POST["id"]) && $this->patronesModel->active($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=restore");
        } else {
            header("Location: index.php?page=prendas&error=restore");
        }
    }

    public function edit()
    {
        $this->model->setNombre($_POST["nombre_edit"]);
        $this->model->setcategoria($_POST["categoria_edit"]);
        $this->model->settalla($_POST["talla_edit"]);
        $this->model->setcoleccion($_POST["coleccion_edit"]);
        $this->model->setcolor($_POST["color_edit"]);
        $this->model->setcant($_POST["cant_edit"]);
        $this->model->setgenero($_POST["genero_edit"]);
        $this->model->setprecio($_POST["precio_edit"]);


        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=edit");
            exit;
        } else {
            header("Location: index.php?page=prendas&succes=edit");
        }
    }
}
