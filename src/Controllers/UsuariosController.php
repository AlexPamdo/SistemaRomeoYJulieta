<?php

namespace src\Controllers;

use src\Model\UsuariosModel;
use Interfaces\CrudController;
use Exception;

class UsuariosController implements CrudController
{

    private $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
    }

    public function show()
    {
   
        $usuariosDesabilitadosData = $this->usuariosModel->showUsers(1,"eliminado");
        $usuariosData = $this->usuariosModel->showUsers(0,"eliminado");

        include_once("src/Views/Usuarios.php");
    }

    public function create()
    {
        try {

            if (!$this->usuariosModel->viewAll($_POST["gmail_usuario"], "email_usuario")) {
                throw new Exception("Email ya existe");
            }

            if ($_FILES["file1"]["error"] === UPLOAD_ERR_OK) {
                $nom_archivo = basename($_FILES['file1']['name']);
                $ruta = "src/Assets/img/users/" . $nom_archivo;
                $archivo = $_FILES['file1']['tmp_name'];

                if (!move_uploaded_file($archivo, $ruta)) {
                    throw new Exception("Error al subir la imagen");
                }
            } else {
                // Podrías asignar una imagen predeterminada o dejar la imagen vacía
                $ruta = "src/Assets/img/users/User_default_icon.png";
            }

            $this->usuariosModel->setData(
                $_POST["nombre_usuario"],
                $_POST["apellido_usuario"],
                $_POST["gmail_usuario"],
                password_hash($_POST["password_usuario"], PASSWORD_DEFAULT),
                $_POST["rol_usuario"],
                $ruta,
            );

            if ($this->usuariosModel->create()) {
                header("Location: index.php?page=usuarios&succes=create");
            } else {
                header("Location: index.php?page=usuarios&error=create");
            }
        } catch (Exception $e) {
            header("Location: index.php?page=usuarios&error=other&errorDesc=" . $e->getMessage());
        };
    }

    public function delete()
    {
        if ($this->usuariosModel->softDelete($_POST["id"])) {
            header("Location: index.php?page=usuarios&succes=delete");
        } else {
            header("Location: index.php?page=usuarios&error=delete");
        }
    }

    public function restore()
    {
        if ($this->usuariosModel->active($_POST["id"])) {
            header("Location: index.php?page=usuarios&succes=restore");
        } else {
            header("Location: index.php?page=usuarios&error=restore");
        }
    }

    public function remove()
    {
        if ($this->usuariosModel->remove($_POST["id"])) {
            header("Location: index.php?page=usuarios&succes=remove");
        } else {
            header("Location: index.php?page=usuarios&error=remove");
        }
    }

    public function edit()
    {
        try {

            if (!$this->usuariosModel->viewAll($_POST["gmail_usuario"], "email_usuario")) {
                throw new Exception("Email ya existe");
            }

            if ($_FILES["file1"]["error"] === UPLOAD_ERR_OK) {
                $nom_archivo = basename($_FILES['file1']['name']);
                $ruta = "src/Assets/img/users/" . $nom_archivo;
                $archivo = $_FILES['file1']['tmp_name'];

                if (!move_uploaded_file($archivo, $ruta)) {
                    throw new Exception("Error al subir la imagen");
                }
            } else {
                // Podrías asignar una imagen predeterminada o dejar la imagen vacía
                $ruta = "src/Assets/img/users/User_default_icon.png";
            }

            $this->usuariosModel->setData(
                $_POST["nombre_usuario"],
                $_POST["apellido_usuario"],
                $_POST["gmail_usuario"],
                password_hash($_POST["password_usuario"], PASSWORD_DEFAULT),
                $_POST["rol_usuario"],
                $ruta,
            );

            if ($this->usuariosModel->edit($_POST["id"])) {
                header("Location: index.php?page=usuarios&succes=edit");
            } else {
                header("Location: index.php?page=usuarios&error=edit");
            }
        } catch (Exception $e) {
            header("Location: index.php?page=usuarios&error=other&errorDesc=" . $e->getMessage());
        };
    }
}
