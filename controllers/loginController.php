<?php


include_once("model/loginModel.php");


class loginController
{

    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new login();
    }

    public function show()
    {
        include_once("views/login.php");
    }

    public function login()
    {
     
        $this->loginModel->setGmail($_POST["gmail_usuario"]);
        $this->loginModel->setContraseña($_POST["contraseña_usuario"]);

        $result = $this->loginModel->login();

        if ($result) {

            $_SESSION["username"] = $result["nombre_usuario"];
            $_SESSION["lastname"] = $result["apellido_usuario"];
            $_SESSION["email"] = $result["gmail_usuario"];
            $_SESSION["cedula"] = $result["cedula_usuario"];

            $_SESSION["id_user"] = $result["id_usuario"];
            $_SESSION["rol"] = $result["id_roles"];
            $_SESSION["img"] = $result["img_usuario"];

            header("location:index.php?page=dashboard");
        } else {
            echo "<script>alert('Error al obtener el nombre del usuario');</script>";
        }
    }
}



include_once "model/usuariosModel.php";

class olvideContraseña
{

    public function verCorreo()
    {

        if (!empty($_POST["btnOlvide"])) {
            $usuarios = new usuarios();

            $correo = $_POST["correo"];

            $usuario = $usuarios->revisarCorreo($correo);
            $id = $usuario["id_usuario"];

            if ($usuario) {
                header("location:index.php?page=login&function=forgotPassword&id=$id");
            } else {
                header("location:index.php?page=login&error");
            }
        }
    }

    public function cambiarContraseña()
    {




        if (!empty($_POST["btnSwichPassword"])) {

            $usuarios = new usuarios();

            $id = $_GET["id"];

            $usuario = $usuarios->viewOne($id);

            $respuestaSeguridad = $usuario["respuesta"];

            if ($_POST["answer"] === $respuestaSeguridad) {

                if ($_POST["password"] === $_POST["c_password"]) {

                    $usuarios->setPassword($_POST["password"]);

                    if ($usuarios->updatePassword($id)) {
                        header("location:index.php?page=login&succes=4");
                    } else {
                        header("location:index.php?page=login&function=forgotPassword&id=$id&error=4");
                    }
                } else {
                    header("location:index.php?page=login&function=forgotPassword&id=$id&error=5");
                }
            } else {
                header("location:index.php?page=login&function=forgotPassword&id=$id&error=3");
            }
        }
    }
}
