<?php

include_once "model/usuariosModel.php";
require_once ("interfaces/interface.php");

class usuariosController implements crudController
{

    private $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new usuarios();
    }

    public function show()
    {
        $usuariosData = !empty($_POST["busqueda"]) ? $this->usuariosModel->viewSearch($_POST["busqueda"]) : $this->usuariosModel->viewAll(false);

        // Código para obtener usuarios deshabilitados o buscar usuarios
        // $usuariosData = !empty($_POST["busqueda"]) ? $usuarios->viewSearch($_POST["busqueda"]) : $usuarios->viewAll(true);
        $usuariosDesabilitadosData = $this->usuariosModel->viewAll(true);

        include_once("views/usuarios.php");
    }

    public function create()
    {
            $emailExist = $this->usuariosModel->searchEmail($_POST["gmail_usuario"]);

            if (!$emailExist) {

                $this->usuariosModel->setNombre($_POST["nombre_usuario"]);
                $this->usuariosModel->setApellido($_POST["apellido_usuario"]);
                $this->usuariosModel->setGmail($_POST["gmail_usuario"]);
                $this->usuariosModel->setPassword($_POST["password_usuario"]);
                $this->usuariosModel->setPermisos($_POST["id_roles"]);
                $this->usuariosModel->setpregunta($_POST["pregunta"]);
                $this->usuariosModel->setres($_POST["respuesta"]);

                if ($_FILES["file1"]["error"] === UPLOAD_ERR_OK) {
                    $nom_archivo = basename($_FILES['file1']['name']);
                    $ruta = "Assets/img/users/" . $nom_archivo;
                    $archivo = $_FILES['file1']['tmp_name'];

                    if (move_uploaded_file($archivo, $ruta)) {
                        $this->usuariosModel->setImg($ruta);
                    } else {
                        echo "<div class='alert alert-warning'> Error al subir la imagen </div>";
                        return;
                    }
                } else {
                    // Podrías asignar una imagen predeterminada o dejar la imagen vacía
                    $this->usuariosModel->setImg("Assets/img/users/User_default_icon.png");
                }

                if ($this->usuariosModel->create()) {
                    header("Location: index.php?page=usuarios&succes=1");
                } else {
                    header("Location: index.php?page=usuarios&error=1");
                }
            } else {
                header("Location: index.php?page=usuarios&error=4");
            }
    }

    public function delete()
    {
        if ($this->usuariosModel->delete($_GET["id"])) {
            header("Location: index.php?page=usuarios&succes=2");
        } else {
             header("Location: index.php?page=usuarios&error=2");
        }
    }

    public function restore()
    {
        if ($this->usuariosModel->active($_GET["id"])) {
            header("Location: index.php?page=usuarios&succes=4");
        } else {
            header("Location: index.php?page=usuarios&error=4");
        }
    }

    public function edit()
    {
        $this->usuariosModel->setNombre($_POST["nombre_usuario_edit"]);
        $this->usuariosModel->setApellido($_POST["apellido_usuario_edit"]);
        $this->usuariosModel->setGmail($_POST["gmail_usuario_edit"]);
        $this->usuariosModel->setPassword($_POST["password_usuario_edit"]);
        $this->usuariosModel->setPermisos($_POST["id_roles_edit"]);

        if ($this->usuariosModel->edit($_POST["id"] ?? null)) {
            header("Location: index.php?page=usuarios&succes=3");
            exit;
        } else {
            header("Location: index.php?page=usuarios&error=3");
        }
    }
}
