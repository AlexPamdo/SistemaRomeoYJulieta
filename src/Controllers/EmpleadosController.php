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
        if ($_SESSION['rol'] == 2 ) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $empleadosDesabilitadosData = $this->model->viewEmpleados(1,"eliminado");
        $empleadosData = $this->model->viewEmpleados(0,"eliminado");
        require_once("src/Views/Empleados.php");
    }

    public function create()    
    {
    
        $this->model->setData(
            $_POST["nombre_empleado"],
            $_POST["apellido_empleado"],
            $_POST["telefono_empleado"],
            $_POST["email_empleado"],
            $_POST["id_ocupacion"],
            $_POST["cedula_empleado"]
        );

        if ($this->model->create()) {
            header("Location: index.php?page=empleados&succes=create");
        } else {
            header("Location: index.php?page=empleados&error=create");
        }
    }

    public function delete()
    {
        if ($this->model->softDelete($_POST["id"])) {
            header("Location: index.php?page=empleados&succes=delete");
        } else {
            header("Location: index.php?page=empleados&error=delete");
           
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
        $this->model->setData(
            $_POST["nombre_empleado"],
            $_POST["apellido_empleado"],
            $_POST["telefono_empleado"],
            $_POST["email_empleado"],
            $_POST["id_ocupacion"],
            $_POST["cedula_empleado"]
        );

        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=empleados&succes=edit");
            exit;
        } else {
            header("Location: index.php?page=empleados&error=edit");
        }
    }

    
}
