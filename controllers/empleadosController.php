<?php

function render()
{
    include_once("views/empleados.php");
}

class crearEmpleado
{
    public function create()
    {
        $empleado = new empleados();

        if (!empty($_POST["btnCrear"])) {

            $empleado->setNombre($_POST["nombre_empleado"]);
            $empleado->setApellido($_POST["apellido_empleado"]);
            $empleado->setEmail($_POST["email_empleado"]);
            $empleado->setTelefono($_POST["telefono_empleado"]);
            $empleado->setOcupacion($_POST["id_ocupacion"]);

            $empleado->setCedula($_POST["cedula_empleado"]);

            if ($empleado->create()) {
                header("Location: index.php?page=empleados&succes=1");
            } else {
                header("Location: index.php?page=empleados&error=1");
            }
        }
        include_once "views/empleados/crear.php";
    }
}

class eliminarEmpleado
{
    public function eliminar()
    {
        $empleado = new empleados();

        if (!empty($_GET["btnDelete"])) {

            $id = ($_GET["id"]);

            if ($empleado->delete($id)) {
                header("Location: index.php?page=empleados&succes=2");
            } else {
                echo "<div class=' alert alert-danger'> Erro al eliminar Empleado</div> ";
            }
        }
    }
}


class editEmpleado
{
    public function edit()
    {
        $empleado = new empleados();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            switch ($_POST["btnUpdate"]) {
                case "edit":
                    $empleado->setNombre($_POST["nombre_empleado_edit"]);
                    $empleado->setApellido($_POST["apellido_empleado_edit"]);
                    $empleado->setEmail($_POST["email_empleado_edit"]);
                    $empleado->setTelefono($_POST["telefono_empleado_edit"]);
                    $empleado->setOcupacion($_POST["id_ocupacion_edit"]);

                    $empleado->setCedula($_POST["cedula_empleado_edit"]);

                    if ($empleado->edit($id)) {
                        header("Location: index.php?page=empleados&succes=3");
                        exit;
                    } else {
                        header("Location: index.php?page=empleados&error=3");
                    }
                    break;

                case "close":
                    header("Location: index.php?page=empleados");
                    exit;
            }
        }
        include_once "views/empleados/editar.php";
    }
}