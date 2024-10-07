<?php
function render() {}

include_once("model/prendasModel.php");
require_once("interfaces/interface.php");

class prendasController implements crudController
{
    private $model;

    public function __construct()
    {
        $this->model = new Prenda();
    }

    public function show()
    {
        $prendaData = $this->model->viewAll("stock");
        require_once("views/prendas.php");
    }

    public function create()
    {
        $this->model->setNombre($_POST["nombre"]);
        $this->model->setcategoria($_POST["id_categoria"]);
        $this->model->setcolor($_POST["id_color"]);
        $this->model->setcant($_POST["stock"]);
        $this->model->setcoleccion($_POST["id_coleccion"]);
        $this->model->settalla($_POST["id_talla"]);
        $this->model->setgenero($_POST["id_genero"]);
        $this->model->setprecio($_POST["precio"]);

        if ($this->model->create()) {
            header("Location: index.php?page=prendas&succes=1");
        } else {
            echo "<div class='alert alert-warning'> Error al registrar prenda </div> ";
        }
    }

    public function delete()
    {
        if ($this->model->delete($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=2");
        } else {
            echo "<div class=' alert alert-danger'> Error al eliminar proveedor</div> ";
        }
    }

    public function edit()
    {
        $this->model->setNombre($_POST["nombre_edit"]);
        $this->model->setcategoria($_POST["categoria_edit"]);
        $this->model->settalla($_POST["talla_edit"]);
        $this->model->setcoleccion($_POST["coleccion_edit"]);
        $this->model->setcolor($_POST["color_edit"]);
        $this->model->setcant($_POST["cant_edit"]);
        $this->model->setgenero($_POST["genero_edit"]);
        $this->model->setprecio($_POST["precio_edit"]);


        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=prendas&succes=3");
            exit;
        } else {
            echo "<div class='alert alert-warning'> Error al Editar proveedor </div>";
        }
    }
}
