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

        if ($_SESSION['rol'] == 2) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $usuariosDesabilitadosData = $this->usuariosModel->showUsers(1, "estado");
        $usuariosData = $this->usuariosModel->showUsers(0, "estado");

        include_once("src/Views/Usuarios.php");
    }

    public function viewAll()
     {
         try {
             $usuariosData = $this->usuariosModel->viewAll(0, "estado");
             echo json_encode($usuariosData);
         } catch (Exception $e) {
             echo json_encode([
                 "success" => false,
                 "message" => $e->getMessage()
             ]);
         }
     }

    public function create()
    {
        try {

            if ($this->usuariosModel->viewAll($_POST["gmail_usuario"], "email_usuario")) {
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
                $_POST["password_usuario"],
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
        // Antes de llamar al softDelete
        error_log("ID recibido: " . $_POST["id"]);

        if ($this->usuariosModel->softDelete($_POST["id"])) {
            echo json_encode([
                "success" => true,
                "message" => "Usuario eliminado correctamente"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "No se pudo eliminar el usuario"
            ]);
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
            $this->usuariosModel->setData(
                $_POST["nombre_usuario"],
                $_POST["apellido_usuario"],
                $_POST["gmail_usuario"],
                $_POST["password_usuario"],
                $_POST["rol_usuario"],
                "none",
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
