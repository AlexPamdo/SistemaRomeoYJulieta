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

    public function create(){}

    public function show()
    {
        $prendaDesabilitadosData = $this->model->viewPrendas(1,"eliminado");
        $prendaData = $this->model->viewPrendas(0,"eliminado");
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
    
        $this->model->setData(
            "si",
            $_POST["nombre_edit"],
            $_POST["id"],
            $_POST["categoria_edit"],
            $_POST["talla_edit"],
            $_POST["coleccion_edit"],
            $_POST["color_edit"],
            $_POST["cant_edit"],
            $_POST["genero_edit"],
            $_POST["precio_edit"]
        );


        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=edit");
            exit;
        } else {
            header("Location: index.php?page=prendas&succes=edit");
        }
    }
}
