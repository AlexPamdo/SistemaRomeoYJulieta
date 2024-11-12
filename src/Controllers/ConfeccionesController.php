<?php


namespace src\Controllers;

// Inclusión de los modelos necesarios para manejar los datos de confecciones, almacén, patrones, prendas y patron-material.
use src\Model\ConfeccionesModel;
use src\Model\AlmacenModel;
use src\Model\PrendasModel;
use src\Model\PrendaPatronModel;
use src\Model\EmpleadosModel;
use Interfaces\CrudController;
use Exception;


class ConfeccionesController implements CrudController
{

    // Explicacion general de las instacias que necesitaremos


    private $model; // La instancia del modelo de confecciones (Para Accededer a y editar dicha tabla)
    private $almacenModel; //La instacia del modelo de almacen para bajar el stock al momento de crear una prenda
    private $prendasModel; //La instacia del modelo de prendas para subir el stock al momento de crear una prenda
    private $prendaPatronModel; //la instancia del modelo de patron materiales, este es para saber que materiales y que cantidad se va a usar para la confeccion de dicha prenda

    private $empleadosModel;

    public function __construct()
    {
        $this->model = new ConfeccionesModel();
        $this->almacenModel = new AlmacenModel();
        $this->prendasModel = new PrendasModel();
        $this->prendaPatronModel = new PrendaPatronModel();
        $this->empleadosModel = new EmpleadosModel();
    }

    // Función que se encarga de renderizar la vista de confecciones.
    public function show()
    {
        if ($_SESSION['rol'] == 2) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $confeccionesData = $this->model->viewConfecciones(0, "estado");

        // Incluye la vista de confecciones para su visualización.
        include_once("src/Views/Confecciones.php");
    }

    public function print()
    {
        $confeccionesData = $this->model->viewAll();
        include_once("src/Libraries/fpdf/ConfeccionesPDF.php");
    }




    public function create()
    {

        try {

            // Asignación de los datos del formulario a los atributos del objeto confección.
            $this->model->setData(
                $_POST["prenda"],
                $_POST["cantidad"],
                date('Y-m-d H:i:s'),
                $_POST["empleado"],
            );

            // Obtención de los datos del patrón y los materiales asociados al patrón.
            $dataPatron =  $this->prendaPatronModel->viewMaterials($_POST["prenda"]);

            if (!$this->comprobarStock($dataPatron, $_POST["cantidad"])) {
                throw new Exception("Insuficientes Materiales en el inventario para realizar la accion");
            }

            //Cambiamos el estado a "ocupado" del empleado seleccionado
            $this->empleadosModel->updateColumn("ocupado", 1, "id_empleado", $_POST["empleado"]);

            // Comprobamos si las funciones para crear la confeccion 
            if ($this->model->create()) {

                // Redirecciona a la página con mensaje de éxito.
                header("Location: index.php?page=confecciones&succes=create");
            } else {
                // Redirecciona a la página con mensaje de error.
                header("Location: index.php?page=confecciones&error=create");
            }
        } catch (Exception $e) {

            header("Location: index.php?page=confecciones&error=other&errorDesc=" . $e->getMessage());
        }
    }



    public function comprobarStock($dataPatron, $cantidadPrenda)
    {
        // Iteración para obtener la cantidad total de material necesaria para la confección.
        foreach ($dataPatron as $material):

            // Extracción del id del material y la cantidad necesaria para el patrón.
            $idMaterial = $material["id_material"];
            $cantidad = $material["cantidad"];


            // Cálculo de la cantidad total de material necesaria.
            $cantidaTotal = $cantidad * $cantidadPrenda;

            // Obtención del stock disponible para el material.
            $stock = $this->almacenModel->showColumn("stock", "id_material", $idMaterial);

            // Comprobación de que hay suficiente stock para crear la confección.
            if ($cantidaTotal > $stock) {
                return false;
            }
        endforeach;

        return true;
    }

    public function bajarStock($dataPatron, $cantidadPrenda)
    {
        foreach ($dataPatron as $material):
            // Extracción del id del material y la cantidad necesaria para el patrón.
            $idMaterial = $material["id_material"];
            $cantidad = $material["cantidad"];

            // Obtención del stock disponible para el material.
            $stockActual = $this->almacenModel->showColumn("stock", "id_material", $idMaterial);

            // Cálculo de la cantidad total de material necesaria.
            $cantidaTotal = $cantidad * $cantidadPrenda;

            //Calculamos cuanto stock queda
            $nuevoStock = $stockActual - $cantidaTotal;

            // Actualización del stock en el almacén y en las prendas.
            if (!$this->almacenModel->updateColumn("stock", $nuevoStock, "id_material", $idMaterial,)) {
                return false;
            };
        endforeach;
        return true;
    }

    public function update()
    {
        $idConfeccion = $_POST["id"];
        try {
            $this->model->beginTransaction();
            //Buscamos que prenda fue la que se mando a confeccionar
            $prenda = $this->model->showColumn("id_prenda", "id_confeccion", $idConfeccion);
            $cantidad = $this->model->showColumn("cantidad", "id_confeccion", $idConfeccion);
            $empleado = $this->model->showColumn("id_empleado", "id_confeccion", $idConfeccion);

            if (!$prenda) {
                throw new Exception("No se pudo obtener la prenda a confeccionar");
            }

            // Obtención de los datos de la prenda y sus dichos materiales
            $dataPatron =  $this->prendaPatronModel->viewMaterials($prenda);
            if (!$dataPatron) {
                throw new Exception("No se pudieron obtener los detalles de la prenda a confeccionar");
            }

            if (!$this->comprobarStock($dataPatron, $cantidad)) {
                throw new Exception("Insuficientes Materiales en el inventario para realizar la accion");
            }

            // Si hay stock suficiente se actualiza el stock.
            if (!$this->bajarStock($dataPatron, $cantidad)) {
                throw new Exception("No se pudo bajar el stock");
            }

            // obtenemos el stock de prendas actual
            $actualStockPrenda = $this->prendasModel->showColumn("stock", "id_prenda", $prenda);
            $nuevoStockPrenda = $actualStockPrenda + $cantidad;

            if (!$this->prendasModel->updateColumn("stock", $nuevoStockPrenda, "id_prenda", $prenda)) {
                throw new Exception("No se pudo actualiza el stock de la prenda");
            }

            //cambiamos la confeccion a completada
            if (!$this->model->updateColumn("proceso", 1, "id_confeccion", $idConfeccion)) {
                throw new Exception("No se pudo actualizar el estado de la confeccion");
            }

            //Cambiamos el estado a "libre" del empleado seleccionado
            if (!$this->empleadosModel->updateColumn("ocupado", 0, "id_empleado", $empleado)) {
                throw new Exception("No se pudo actualizar el estado del empleado");
            }


            // Redirecciona a la página con mensaje de éxito.
            $this->model->commit();
            header("Location: index.php?page=confecciones&succes=update");
        } catch (Exception $e) {
            $this->model->rollBack();
            header("Location: index.php?page=confecciones&error=other&errorDesc=" . $e->getMessage());
        }
        exit();
    }

    public function delete()
    {
        $confeccion = $_POST["id"];
        $empleado = $this->model->showColumn("id_empleado", "id_confeccion", $_POST["id"]);

        try {
            // Si se elimina correctamente la confección, redirecciona con mensaje de éxito.
            if (!$this->model->softDelete($confeccion)) {
                throw new Exception("Error al anular la confeccion");
            }

            //Actualizamos el estado de la confeccion a cancelado
            if(!$this->model->updateColumn("proceso",3,"id_confeccion",$confeccion)) {
                throw new Exception("Error al marcar la confeccion como anulada");
            }

            //y el empleado pasara a estar libre
            if(!$this->empleadosModel->updateColumn("ocupado",0,"id_empleado",$empleado)) {
                throw new Exception("Error al marcar la confeccion como anulada");
            }

            header("Location: index.php?page=confecciones&succes=delete");
           
        } catch (Exception $e) {
            header("Location: index.php?page=confecciones&error=other&errorDesc=" . $e->getMessage());
        }
    }

    public function remove()
    {
        if ($this->model->remove($_POST["id"])) {
            header("Location: index.php?page=confecciones&succes=remove");
        } else {
            header("Location: index.php?page=confecciones&error=remove");
        }
    }

    public function restore()
    {
        if ($this->model->active($_POST["id"])) {
            header("Location: index.php?page=confecciones&succes=restore");
        } else {
            header("Location: index.php?page=confecciones&error=restore");
        }
    }

    public function edit()
    {
        // Asignación de los datos del formulario a los atributos del objeto confección.
        $this->model->setData(
            $_POST["patron"],
            $_POST["cantidad"],
            date('Y-m-d H:i:s'),
            $_POST["empleado"],
        );

        // Si la edición es exitosa, redirecciona con mensaje de éxito.
        if ($this->model->edit($_POST["id"])) {
            header("Location: index.php?page=confecciones&succes=3");
            exit;
        } else {
            // Redirecciona con mensaje de error si no se puede editar.
            header("Location: index.php?page=confecciones&error=3");
        }
    }
}
