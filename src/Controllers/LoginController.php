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

    public function showCambiarContraseña()
    {
        try {
            $usuarioData = $this->usuariosModel->searchEmail($_POST["correo"]);
            if ($usuarioData && is_array($usuarioData)) {
                include_once("src/Views/login/cambiarContrasena.php");
            } else {
                throw new Exception("Email no registrado en el sistema 1");
            }
        } catch (Exception $e) {
            header("location:index.php?error=other&errorDesc=" . $e->getMessage());
        }
    }

    public function login()
    {

        try {
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

    public function verCorreo()
    {
        try {
            $usuario = $this->usuariosModel->revisarCorreo($_POST["correo"]);

            // Asegúrate de que $usuario no es false antes de acceder a él
            if ($usuario && is_array($usuario)) {
                $id = $usuario["id_usuario"]; // Ahora es seguro acceder a este índice
                header("location:index.php?page=login&function=forgotPassword&id=$id");
            } else {
                throw new Exception("Email no registrado en el sistema");
            }
        } catch (Exception $e) {
            header("location:index.php?error=other&errorDesc=" . urlencode($e->getMessage()));
            exit();
        }
    }



    public function cambiarContraseña()
    {
        try {
            $usuario = $this->usuariosModel->viewOne($_POST["id"]);

            if ($_POST["answer"] === $usuario["respuesta"]) {

                $this->usuariosModel->setPassword($_POST["password"]);

                if ($this->usuariosModel->updatePassword($_POST["id"])) {
                    header("location:index.php?page=login&succes=changePassword");
                } else {
                    throw new Exception("La contraseña no pudo ser cambiada");
                }
            } else {
                throw new Exception("La respuesta de seguridad es incorrecta");
            }
        } catch (Exception $e) {
            header("location:index.php?error=other&errorDesc=" . $e->getMessage());
        }
    }
}
