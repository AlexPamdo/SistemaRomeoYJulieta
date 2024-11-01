<?php

namespace src\Controllers;

use src\Model\EmpleadosModel;
use Interfaces\CrudController;

class EmpleadosController implements CrudController
{

    private $model;

    public function __construct()
    {
        $this->model = new EmpleadosModel();
    }

    public function show()
    {
        $empleadosDesabilitadosData = $this->model->viewAll(true);
        $empleadosData = $this->model->viewAll(false);
        require_once("src/Views/Empleados.php");
    }

    public function create()
    {
        $this->model->setNombre($_POST["nombre_empleado"]);
        $this->model->setApellido($_POST["apellido_empleado"]);
        $this->model->setEmail($_POST["email_empleado"]);
        $this->model->setTelefono($_POST["telefono_empleado"]);
        $this->model->setOcupacion($_POST["id_ocupacion"]);

        $this->model->setCedula($_POST["cedula_empleado"]);

        if ($this->model->create()) {
            header("Location: index.php?page=empleados&succes=create");
        } else {
            header("Location: index.php?page=empleados&error=create");
        }
    }
    public function delete()
    {
        if ($this->model->delete($_POST["id"])) {
            header("Location: index.php?page=empleados&succes=delete");
        } else {
            echo "<div class=' alert alert-danger'> Erro al eliminar Empleado</div> ";
        }
    }

    public function remove()
    {
        if ($this->model->remove($_POST["id"])) {
            header("Location: index.php?page=empleados&succes=remove");
        } else {
            header("Location: index.php?page=empleados&error=remove");
        }
    }

    public function restore()
    {
        if ($this->model->active($_POST["id"])) {
            header("Location: index.php?page=empleados&succes=restore");
        } else {
            header("Location: index.php?page=empleados&error=restore");
        }
    }
    public function edit()
    {

        $this->model->setNombre($_POST["nombre_empleado_edit"]);
        $this->model->setApellido($_POST["apellido_empleado_edit"]);
        $this->model->setEmail($_POST["email_empleado_edit"]);
        $this->model->setTelefono($_POST["telefono_empleado_edit"]);
        $this->model->setOcupacion($_POST["id_ocupacion_edit"]);

        $this->model->setCedula($_POST["cedula_empleado_edit"]);

        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=empleados&succes=edit");
            exit;
        } else {
            header("Location: index.php?page=empleados&error=edit");
        }
    }
}
