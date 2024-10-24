<?php


namespace src\Controllers;

use src\Model\LoginModel;
use src\Model\UsuariosModel;

class LoginController
{

    private $loginModel;
    private $usuariosModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->usuariosModel = new UsuariosModel();
    }

    public function show()
    {
        include_once("src/Views/Login.php");
    }

    public function showCambiarContraseña()
    {
        $usuarioData = $this->usuariosModel->searchEmail($_POST["correo"]);
        include_once("src/Views/login/cambiarContrasena.php");
    }

    public function login()
{

    // Sanitiza y asigna los datos del formulario
    $this->loginModel->setGmail(filter_input(INPUT_POST, 'gmail_usuario', FILTER_SANITIZE_EMAIL));
    $this->loginModel->setContraseña(filter_input(INPUT_POST, 'contraseña_usuario', FILTER_SANITIZE_STRING));

    $result = $this->loginModel->login();

    if ($result) {
        $_SESSION["username"] = $result["nombre_usuario"];
        $_SESSION["lastname"] = $result["apellido_usuario"];
        $_SESSION["email"] = $result["gmail_usuario"];
        $_SESSION["cedula"] = $result["cedula_usuario"];
        $_SESSION["id_user"] = $result["id_usuario"];
        $_SESSION["rol"] = $result["id_roles"];
        $_SESSION["img"] = $result["img_usuario"];

        header("Location: index.php?page=dashboard");
        exit(); // Detenemos la ejecución después de redirigir
    } else {
        echo "<script>alert('Credenciales incorrectas. Inténtalo de nuevo.');</script>";
    }
}

    public function verCorreo()
    {
        $usuario = $this->usuariosModel->revisarCorreo($_POST["correo"]);
        $id = $usuario["id_usuario"];

        if ($usuario) {
            header("location:index.php?page=login&function=forgotPassword&id=$id");
        } else {
            header("location:index.php?page=login&error");
        }
    }

    public function cambiarContraseña()
    {
        $usuario = $this->usuariosModel->viewOne($_POST["id"]);

        if ($_POST["answer"] === $usuario["respuesta"]) {

            $this->usuariosModel->setPassword($_POST["password"]);

            if ($this->usuariosModel->updatePassword($_POST["id"])) {
                header("location:index.php?page=login&succes=4");
            } else {
                header("location:index.php?page=login&error=4");
            }
        } else {
            header("location:index.php?page=login&error=5");
        }
    }
}
