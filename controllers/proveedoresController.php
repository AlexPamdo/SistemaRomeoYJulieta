<?php
function render()
{
    include_once("views/proveedores.php");
}


include_once("model/proveedorModel.php");

class crearProveedor
{
    public function create()
    {
        $proveedores = new Proveedores();

        if (!empty($_POST["btnCrear"])) {
            if (!empty($_POST["nombre_proveedor"]) and !empty($_POST["telefono_proveedor"]) and !empty($_POST["gmail_proveedor"]) and !empty($_POST["id_tipo_proveedor"]) and !empty($_POST["id_estado"]) and !empty($_POST["notas_proveedor"])) {


                $proveedores->setNombre($_POST["nombre_proveedor"]);
                $proveedores->setTelefono($_POST["telefono_proveedor"]);
                $proveedores->setGmail($_POST["gmail_proveedor"]);
                $proveedores->setTipo($_POST["id_tipo_proveedor"]);
                $proveedores->setEstado($_POST["id_estado"]);
                $proveedores->setNotas($_POST["notas_proveedor"]);


                if ($proveedores->create()) {
                    header("Location: index.php?page=proveedores&succes=1");
                } else {
                    echo "<div class='alert alert-warning'> Error al registrar proveedor </div> ";
                }
            } else {
                echo "<div class='alert alert-warning'> Complete todos los campos </div> ";
            }
        }
        include_once "views/proveedores/registrar.php";
    }
}

class eliminarProveedor
{
    public function eliminar()
    {
        $proveedores = new Proveedores();

        if (!empty($_GET["btnDelete"])) {

            $id = ($_GET["id"]);

            if ($proveedores->delete($id)) {
                header("Location: index.php?page=proveedores&succes=2");
            } else {
                echo "<div class=' alert alert-danger'> Erro al eliminar proveedor</div> ";
            }
        }
    }
}


class editProveedor
{
    public function edit()
    {
        $proveedores = new Proveedores();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            switch ($_POST["btnUpdate"]) {
                case "edit":
                    $proveedores->setNombre($_POST["nombre_proveedor_edit"]);
                    $proveedores->setTelefono($_POST["telefono_proveedor_edit"]);
                    $proveedores->setGmail($_POST["gmail_proveedor_edit"]);
                    $proveedores->setTipo($_POST["id_tipo_proveedor_edit"]);
                    $proveedores->setEstado($_POST["id_estado_edit"]);
                    $proveedores->setNotas($_POST["notas_proveedor_edit"]);

                    if ($proveedores->edit($id)) {
                        header("Location: index.php?page=proveedores&succes=3");
                        exit;
                    } else {
                        echo "<div class='alert alert-warning'> Error al Editar proveedor </div>";
                    }
                    break;

                case "close":
                    header("Location: index.php?page=proveedores");
                    exit;
            }
        }
        include_once "views/proveedores/editar.php";
    }
}
