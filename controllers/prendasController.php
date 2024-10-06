<?php
function render()
{
    include_once("views/prendas.php");
}


include_once("model/prendasModel.php");

class crearPrenda
{
    public function create()
    {
        $prenda = new Prenda();

        if (!empty($_POST["btnCrear"])) {
            if (!empty($_POST["nombre"]) and !empty($_POST["id_categoria"]) and !empty($_POST["id_color"]) and !empty($_POST["stock"]) and !empty($_POST["id_coleccion"]) and !empty($_POST["id_talla"]) and !empty($_POST["id_genero"]) and !empty($_POST["precio"])) {


                $prenda->setNombre($_POST["nombre"]);
                $prenda->setcategoria($_POST["id_categoria"]);
                $prenda->setcolor($_POST["id_color"]);
                $prenda->setcant($_POST["stock"]);
                $prenda->setcoleccion($_POST["id_coleccion"]);
                $prenda->settalla($_POST["id_talla"]);
                $prenda->setgenero($_POST["id_genero"]);
                $prenda->setprecio($_POST["precio"]);


                if ($prenda->create()) {
                    header("Location: index.php?page=prendas&succes=1");
                } else {
                    echo "<div class='alert alert-warning'> Error al registrar prenda </div> ";
                }
            } else {
                echo "<div class='alert alert-warning'> Complete todos los campos </div> ";
            }
        }
        include_once "views/prendas/registrar.php";
    }
}

class editPrenda
{
    public function edit()
    {
        $prenda = new Prenda();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            switch ($_POST["btnUpdate"]) {
                case "edit":
                    $prenda->setNombre($_POST["nombre_edit"]);
                    $prenda->setcategoria($_POST["categoria_edit"]);
                    $prenda->settalla($_POST["talla_edit"]);
                    $prenda->setcoleccion($_POST["coleccion_edit"]);
                    $prenda->setcolor($_POST["color_edit"]);
                    $prenda->setcant($_POST["cant_edit"]);
                    $prenda->setgenero($_POST["genero_edit"]);
                    $prenda->setprecio($_POST["precio_edit"]);


                    if ($prenda->edit($id)) {
                        header("Location: index.php?page=prendas&succes=3");
                        exit;
                    } else {
                        echo "<div class='alert alert-warning'> Error al Editar proveedor </div>";
                    }
                    break;

                case "close":
                    header("Location: index.php?page=prendas");
                    exit;
            }
        }
        include_once "views/prendas/editar.php";
    }
}

class eliminarPrenda
{
    public function eliminar()
    {
        $prenda = new Prenda();

        if (!empty($_GET["btnDelete"])) {

            $id = ($_GET["id"]);

            if ($prenda->delete($id)) {
                header("Location: index.php?page=prendas&succes=2");
            } else {
                echo "<div class=' alert alert-danger'> Error al eliminar proveedor</div> ";
            }
        }
    }
}
