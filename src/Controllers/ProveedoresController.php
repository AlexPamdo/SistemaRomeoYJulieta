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
        $proveedoresDesabilitados = $this->model->viewProveedores(1, "estado");
        $proveedoresData = $this->model->viewProveedores(0, "estado");
        require_once("src/Views/Proveedores.php");
    }

    // Funcion para mostrar en datatable
    public function viewAll()
    {
        try {
            $proveedoresData = $this->model->viewProveedores(0, "estado");
            echo json_encode($proveedoresData);
        } catch (Exception $e) {
            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function delete()
    {
        // Antes de llamar al softDelete
        error_log("ID recibido: " . $_POST["id"]);

        if ($this->model->softDelete($_POST["id"])) {
            echo json_encode([
                "success" => true,
                "message" => "Proveedor eliminado correctamente"
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "No se pudo eliminar el proveedor"
            ]);
        }
    }

    public function create()
    {
        try {
            // Validar entrada
            if (
                empty($_POST["nombre_proveedor"]) || empty($_POST["rif_proveedor"]) ||
                empty($_POST["telefono_proveedor"]) || empty($_POST["gmail_proveedor"])
            ) {
                throw new Exception("Faltan valores necesarios.");
            }

            // Asignar datos al modelo
            $this->model->setData(
                $_POST["nombre_proveedor"],
                $_POST["rif_proveedor"],
                $_POST["telefono_proveedor"],
                $_POST["gmail_proveedor"],
                $_POST["notas_proveedor"]
            );

            // Intentar guardar
            if ($this->model->create()) {
                echo json_encode([
                    "success" => true,
                    "message" => "Proveedor creado correctamente"
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "No se pudo crear el proveedor"
                ]);
            }
        } catch (Exception $e) {
            // Responder con error
            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }



    /*  public function create()
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
            $this->model->setData(
                $_POST["nombre_proveedor"],
                $_POST["rif_proveedor"],
                $_POST["telefono_proveedor"],
                $_POST["gmail_proveedor"],
                $_POST["notas_proveedor"],
            );

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
 */
    public function restore()
    {
        if ($this->model->active($_POST["id"])) {
            header("Location: index.php?page=proveedores&succes=restore");
        } else {
            header("Location: index.php?page=proveedores&error=restore");
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
        $this->model->setData(
            $_POST["nombre_proveedor"],
            $_POST["rif_proveedor"],
            $_POST["telefono_proveedor"],
            $_POST["gmail_proveedor"],
            $_POST["notas_proveedor"],
        );

        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=proveedores&succes=edit");
            exit;
        } else {
            header("Location: index.php?page=proveedores&error=edit");
        }
    }
}
