<?php
namespace src\Controllers;

use src\Model\ProveedoresModel;
use Interfaces\CrudController;

class ProveedoresController implements CrudController
{

    private $model;

    public function __construct()
    {
        $this->model = new ProveedoresModel();
    }

    public function show()
    {
        $proveedoresData = $this->model->viewAll();
        require_once("src/Views/Proveedores.php");
    }
    public function create()
    {
        $this->model->setNombre($_POST["nombre_proveedor"]);
        $this->model->setTelefono($_POST["telefono_proveedor"]);
        $this->model->setGmail($_POST["gmail_proveedor"]);
        $this->model->setTipo($_POST["id_tipo_proveedor"]);
        $this->model->setNotas($_POST["notas_proveedor"]);

        if ($this->model->create()) {
            header("Location: index.php?page=proveedores&succes=1");
        } else {
            echo "<div class='alert alert-warning'> Error al registrar proveedor </div> ";
        }
    }
    public function delete()
    {

        if ($this->model->delete($_POST["id"])) {
            header("Location: index.php?page=proveedores&succes=2");
        } else {
            echo "<div class=' alert alert-danger'> Erro al eliminar proveedor</div> ";
        }
    }
    public function edit()
    {
        $this->model->setNombre($_POST["nombre_proveedor_edit"]);
        $this->model->setTelefono($_POST["telefono_proveedor_edit"]);
        $this->model->setGmail($_POST["gmail_proveedor_edit"]);
        $this->model->setTipo($_POST["id_tipo_proveedor_edit"]);
        $this->model->setNotas($_POST["notas_proveedor_edit"]);

        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=proveedores&succes=3");
            exit;
        } else {
            echo "<div class='alert alert-warning'> Error al Editar proveedor </div>";
        }
    }
}
