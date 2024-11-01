<?php

namespace src\Controllers;

use src\Model\ProveedoresModel;
use Interfaces\CrudController;
use Exception;

class ProveedoresController implements CrudController
{

    private $model;

    public function __construct()
    {
        $this->model = new ProveedoresModel();
    }

    public function show()
    {
        $proveedoresDesabilitados = $this->model->viewAll(true);
        $proveedoresData = $this->model->viewAll(false);
        require_once("src/Views/Proveedores.php");
    }
    public function create()
    {


        try {
            // Validar que todos los campos necesarios están presentes y no están vacíos
            if (
                empty($_POST["nombre_proveedor"]) || empty($_POST["rif_proveedor"]) ||
                empty($_POST["telefono_proveedor"]) || empty($_POST["gmail_proveedor"])
            ) {
                throw new Exception("Algun Valor de un input es invalido: " . $_POST["rif_proveedor"]);
            }

            // Asignar valores a través del modelo
            $this->model->setNombre(trim($_POST["nombre_proveedor"]));
            $this->model->setRif(ucfirst(trim($_POST["rif_proveedor"])));
            $this->model->setTelefono(trim($_POST["telefono_proveedor"]));
            $this->model->setGmail(trim($_POST["gmail_proveedor"]));
            $this->model->setNotas(trim($_POST["notas_proveedor"])); // Nota: Notas puede ser opcional

            // Intentar crear el proveedor
            if ($this->model->create()) {
                header("Location: index.php?page=proveedores&success=create");
            } else {
                header("Location: index.php?page=proveedores&error=create");
            }
        } catch (Exception $e) {
            // Manejar cualquier excepción durante la creación
            header("Location: index.php?page=proveedores&error=other&errorDesc=" . urlencode($e->getMessage()));
        }

        exit(); // Asegurarse de detener la ejecución después de redirigir
    }

    public function restore()
    {
        if ($this->model->active($_POST["id"])) {
            header("Location: index.php?page=proveedores&succes=restore");
        } else {
            header("Location: index.php?page=proveedores&error=restore");
        }
    }

    public function delete()
    {
        if ($this->model->delete($_POST["id"])) {
            header("Location: index.php?page=proveedores&succes=delete");
        } else {
            header("Location: index.php?page=proveedores&error=delete");
        }
    }



    public function remove()
    {
        if ($this->model->remove($_POST["id"])) {
            header("Location: index.php?page=proveedores&succes=remove");
        } else {
            header("Location: index.php?page=proveedores&error=remove");
        }
    }
    public function edit()
    {
        $this->model->setNombre($_POST["nombre_proveedor_edit"]);
        $this->model->setRif(ucfirst($_POST["rif_proveedor_edit"]));
        $this->model->setTelefono($_POST["telefono_proveedor_edit"]);
        $this->model->setGmail($_POST["gmail_proveedor_edit"]);
        $this->model->setNotas($_POST["notas_proveedor_edit"]);

        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=proveedores&succes=edit");
            exit;
        } else {
            header("Location: index.php?page=proveedores&error=edit");
        }
    }
}
