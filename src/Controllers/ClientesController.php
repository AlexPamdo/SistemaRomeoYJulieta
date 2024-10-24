<?php


namespace src\Controllers;

use src\Model\ClientesModel;
use Interfaces\CrudController;


class ClientesController implements CrudController
{

    private $model;

    public function __construct()
    {
        $this->model = new ClientesModel();
    }

    public function show()
    {
        $clientesData = $this->model->viewAll();
        require_once("src/Views/Clientes.php");
    }

    public function create()
    {
        $this->model->setNombre($_POST["nombre"]);
        $this->model->setApellido($_POST["apellido"]);
        $this->model->setTelefono($_POST["telefono"]);
        $this->model->setEmail($_POST["email"]);
        $this->model->setContraseña($_POST["contraseña"]);
        $this->model->setCedula($_POST["cedula"]);


        if ($this->model->create()) {
            header("Location: index.php?page=clientes&succes=1");
        } else {
            header("Location: index.php?page=clientes&error=1");
        }
    }

    public function delete()
    {

        if ($this->model->delete($_POST["id"])) {
            header("Location: index.php?page=clientes&succes=2");
        } else {
            header("Location: index.php?page=clientes&error=2");
        }
    }
    public function edit()
    {


        $this->model->setNombre($_POST["nombre_edit"]);
        $this->model->setApellido($_POST["apellido_edit"]);
        $this->model->setTelefono($_POST["telefono_edit"]);
        $this->model->setEmail($_POST["email_edit"]);
        $this->model->setContraseña($_POST["contraseña_edit"]);
        $this->model->setCedula($_POST["cedula_edit"]);

        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=clientes&succes=3");
        } else {
            header("Location: index.php?page=clientes&error=3");
        }
    }
}
