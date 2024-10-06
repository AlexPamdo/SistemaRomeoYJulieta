<?php

function render()
{
    include_once("views/Clientes.php");
}



include_once "model/clientesModel.php";

class crearCliente
{
    public function create()
    {
        $cliente = new clientes();

        if (!empty($_POST["btnCrear"])) {
            if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"]) and !empty($_POST["email"]) and !empty($_POST["contraseña"]) and !empty($_POST["cedula"])) {


                $cliente->setNombre($_POST["nombre"]);
                $cliente->setApellido($_POST["apellido"]);
                $cliente->setTelefono($_POST["telefono"]);
                $cliente->setEmail($_POST["email"]);
                $cliente->setContraseña($_POST["contraseña"]);
                $cliente->setCedula($_POST["cedula"]);


                if ($cliente->create()) {
                    header("Location: index.php?page=clientes&succes=1");
                } else {
                    header("Location: index.php?page=clientes&error=1");
                }
            } else {
                echo "<div class='alert alert-warning'> Complete todos los campos </div> ";
            }
        }
        include_once "views/clientes/crear.php";
    }
}

class eliminarClientes
{
    public function eliminar()
    {
        $cliente = new clientes();

        if (!empty($_GET["btnDelete"])) {

            $id = ($_GET["id"]);

            if ($cliente->delete($id)) {
                header("Location: index.php?page=clientes&succes=2");
            } else {
                header("Location: index.php?page=clientes&error=2");
            }
        }
    }
}


class editCliente
{
    public function edit()
    {
        $cliente = new clientes();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            switch ($_POST["btnUpdate"]) {
                case "edit":
                    $cliente->setNombre($_POST["nombre_edit"]);
                    $cliente->setApellido($_POST["apellido_edit"]);
                    $cliente->setTelefono($_POST["telefono_edit"]);
                    $cliente->setEmail($_POST["email_edit"]);
                    $cliente->setContraseña($_POST["contraseña_edit"]);
                    $cliente->setCedula($_POST["cedula_edit"]);

                    if ($cliente->edit($id)) {
                        header("Location: index.php?page=clientes&succes=3");
                    } else {
                        header("Location: index.php?page=clientes&error=3");
                    }
                    break;

                case "close":
                    header("Location: index.php?page=clientes");
                    exit;
            }
        }
        include_once "views/clientes/editar.php";
    }
}


/* class editUsuario
{
    public function edit()
    {
        $usuario = new usuarios();
        $id = $_GET["id"] ?? null;

        if ($id !== null && isset($_GET["btnEditar"]) && ($_GET["btnEditar"] === "ok")) {

            $dataOne = $usuario->viewOne($id);

            if (!empty($_POST["btnUpdate"])) {
                switch ($_POST["btnUpdate"]) {
                    case "edit":
                        $usuario->setNombre($_POST["nombre_usuario_edit"]);
                        $usuario->setApellido($_POST["apellido_usuario_edit"]);
                        $usuario->setCedula($_POST["cedula_usuario_edit"]);
                        $usuario->setGmail($_POST["gmail_usuario_edit"]);
                        $usuario->setPassword($_POST["password_usuario_edit"]);
                        $usuario->setPermisos($_POST["id_roles_edit"]);

                        if ($usuario->edit($id)) {
                            header("Location: index.php?page=usuarios");
                            exit;
                        } else {
                            echo "<div class='alert alert-warning'> Error al Editar Usuario </div>";
                        }
                        break;

                    case "close":
                        header("Location: index.php?page=usuarios");
                        exit;
                }
            }
        }
        include_once "views/usuarios/editar.php";
    }
} */