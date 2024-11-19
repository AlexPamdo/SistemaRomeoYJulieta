<?php

namespace src\Controllers;

use src\Controllers\ControllerBase;
use src\Model\UsuariosModel;
use Exception;

class UsuariosController extends ControllerBase
{
    private $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
    }

    /**
     * Renderiza la vista principal de usuarios.
     */
    public function show()
    {
        if ($_SESSION['rol'] == 2) {
            $this->redirect('dashboard');
        }

        include_once("src/Views/Usuarios.php");
    }

    /**
     * Retorna todos los usuarios activos en formato JSON.
     */
    public function viewAll()
    {
        $this->procesarRespuestaJson(function () {
            return $this->usuariosModel->viewAll(0, "estado");
        });
    }

     /**
     * Retorna datos de materiales en formato JSON.
     */
    public function viewDelete()
    {
        $this->procesarRespuestaJson(function () {
            return $this->usuariosModel->viewAll(1, "estado");
        });
    }

    /**
     * Crea un nuevo usuario.
     */
    public function create()
    {
        $this->procesarRespuestaJson(function () {
            // Validar email único
            if ($this->usuariosModel->viewAll($_POST["gmail_usuario"], "email_usuario")) {
                throw new Exception("El email ya existe");
            }

            // Manejo de imagen
            if ($_FILES["file1"]["error"] === UPLOAD_ERR_OK) {
                $nomArchivo = basename($_FILES['file1']['name']);
                $ruta = "src/Assets/img/users/" . $nomArchivo;
                $archivoTmp = $_FILES['file1']['tmp_name'];

                if (!move_uploaded_file($archivoTmp, $ruta)) {
                    throw new Exception("Error al subir la imagen");
                }
            } else {
                $ruta = "src/Assets/img/users/User_default_icon.png";
            }

            // Configurar datos y guardar usuario
            $this->usuariosModel->setData(
                $_POST["nombre_usuario"],
                $_POST["apellido_usuario"],
                $_POST["gmail_usuario"],
                $_POST["password_usuario"],
                $_POST["rol_usuario"],
                $ruta
            );

            $resultado = $this->usuariosModel->create();
            return [
                "success" => $resultado,
                "message" => $resultado ? "Usuario creado correctamente" : "No se pudo crear el usuario"
            ];
        });
    }

    /**
     * Edita los datos de un usuario existente.
     */
    public function edit()
    {
        $this->procesarRespuestaJson(function () {
            $this->usuariosModel->setData(
                $_POST["nombre_usuario"],
                $_POST["apellido_usuario"],
                $_POST["gmail_usuario"],
                $_POST["password_usuario"],
                $_POST["rol_usuario"],
                "none"
            );
            $resultado = $this->usuariosModel->edit($_POST["id"] ?? null);
            return [
                "success" => $resultado,
                "message" => $resultado ? "Usuario editado correctamente" : "No se pudo editar el usuario"
            ];
        });
    }

    /**
     * Realiza un borrado lógico del usuario.
     */
    public function delete()
    {
        $this->procesarRespuestaJson(function () {
            $resultado = $this->usuariosModel->softDelete($_POST["id"]);
            return [
                "success" => $resultado,
                "message" => $resultado ? "Usuario eliminado correctamente" : "No se pudo eliminar el usuario"
            ];
        });
    }

    /**
     * Restaura un usuario eliminado.
     */
    public function restore()
    {
        $this->procesarRespuestaJson(function () {
            $resultado = $this->usuariosModel->active($_POST["id"]);
            return [
                "success" => $resultado,
                "message" => $resultado ? "Usuario restaurado correctamente" : "No se pudo restaurar el usuario"
            ];
        });
    }

    /**
     * Elimina permanentemente un usuario.
     */
    public function remove()
    {
        $this->procesarRespuestaJson(function () {
            $resultado = $this->usuariosModel->remove($_POST["id"]);
            return [
                "success" => $resultado,
                "message" => $resultado ? "Usuario eliminado permanentemente" : "No se pudo eliminar el usuario permanentemente"
            ];
        });
    }
}
