<?php


namespace src\Controllers;

use src\Model\LoginModel;
use src\Model\UsuariosModel;
use Exception;

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

    public function login()
    {

        try {
            // Sanitiza y asigna los datos del formulario
            $this->loginModel->setData(
                filter_input(INPUT_POST, 'gmail_usuario', FILTER_SANITIZE_EMAIL),
                filter_input(INPUT_POST, 'contraseña_usuario', FILTER_SANITIZE_STRING),
            );

            $result = $this->loginModel->login();

            if ($result) {
                $_SESSION["username"] = $result["nombre_usuario"];
                $_SESSION["lastname"] = $result["apellido_usuario"];
                $_SESSION["email"] = $result["gmail_usuario"];
                $_SESSION["cedula"] = $result["cedula_usuario"];
                $_SESSION["id_user"] = $result["id_usuario"];
                $_SESSION["rol"] = $result["rol"];
                $_SESSION["img"] = $result["img_usuario"];

                header("Location: index.php?page=dashboard");
                exit(); // Detenemos la ejecución después de redirigir
            } else {
                throw new Exception("Credenciales invalidas");
            }
        } catch (Exception $e) {
            header("location:index.php?error=other&errorDesc=" . $e->getMessage());
        }
    }
}
