<?php


namespace src\Controllers;

// Inclusión de los modelos necesarios para manejar los datos de confecciones, almacén, patrones, prendas y patron-material.
use src\Model\ConfeccionesModel;
use src\Model\AlmacenModel;
use src\Model\PrendasModel;
use src\Model\PatronesModel;
use src\Model\PatronMaterialModel;
use Interfaces\CrudController;
use Exception;


class ConfeccionesController implements CrudController
{

    // Explicacion general de las instacias que necesitaremos


    private $model; // La instancia del modelo de confecciones (Para Accededer a y editar dicha tabla)
    private $almacenModel; //La instacia del modelo de almacen para bajar el stock al momento de crear una prenda
    private $prendasModel; //La instacia del modelo de prendas para subir el stock al momento de crear una prenda
    private $patroMaterialModel; //la instancia del modelo de patron materiales, este es para saber que materiales y que cantidad se va a usar para la confeccion de dicha prenda


    public function __construct()
    {
        $this->model = new ConfeccionesModel();
        $this->almacenModel = new AlmacenModel();
        $this->prendasModel = new PrendasModel();
        $this->patroMaterialModel = new PatronMaterialModel();
    }

    // Función que se encarga de renderizar la vista de confecciones.
    public function show()
    {
        if ($_SESSION['rol'] == 2 ) {
            header('Location: index.php?page=dashboard');
            exit;
        }

        $confeccionesData = $this->model->viewConfecciones(0,"eliminado");

        // Incluye la vista de confecciones para su visualización.
        include_once("src/Views/Confecciones.php");
    }

    public function print()
    {
        $confeccionesData = $this->model->viewAll();
        include_once("src/Libraries/fpdf/ConfeccionesPDF.php");
    }


    public function comprobarStock($dataPatron)
    {

        // Iteración para obtener la cantidad total de material necesaria para la confección.
        foreach ($dataPatron as $material):

            // Extracción del id del material y la cantidad necesaria para el patrón.
            $idMaterial = $material["id_material"];
            $cantidad = $material["cantidad"];


            // Cálculo de la cantidad total de material necesaria.
            $cantidaTotal = $cantidad * $_POST["cantidad"];

            // Obtención del stock disponible para el material.
            $stock = $this->almacenModel->showColumn("stock", "id_material", $idMaterial);

            // Comprobación de que hay suficiente stock para crear la confección.
            if ($cantidaTotal > $stock) {
                return false;
            }
        endforeach;

        return true;
    }

    public function bajarStock($dataPatron)
    {
        foreach ($dataPatron as $material):
            // Extracción del id del material y la cantidad necesaria para el patrón.
            $idMaterial = $material["id_material"];
            $cantidad = $material["cantidad"];

            // Cálculo de la cantidad total de material necesaria.
            $cantidaTotal = $cantidad * $_POST["cantidad"];

            // Actualización del stock en el almacén y en las prendas.
            if (!$this->almacenModel->updateColumn("stock", $cantidaTotal, "id_material", $idMaterial,)) {
                return false;
            };
        endforeach;
        return true;
    }


    public function create()
    {

        try {
            $this->model->beginTransaction();

            // Asignación de los datos del formulario a los atributos del objeto confección.
            $this->model->setData(
                $_POST["patron"],
                $_POST["cantidad"],
                date('Y-m-d H:i:s'),
                $_POST["empleado"],
            );

            // Obtención de los datos del patrón y los materiales asociados al patrón.
            $dataPatron =  $this->patroMaterialModel->viewMaterials($_POST["patron"]);

            if (!$this->comprobarStock($dataPatron)) {
                throw new Exception("Insuficientes Materiales en el inventario para realizar la accion");
            }

            // Si hay stock suficiente, se crean los registros y se actualiza el stock.
            if (!$this->bajarStock($dataPatron)) {
                throw new Exception("No se pudo bajar el stock");
            }

            // Comprobamos si las funciones para crear la confeccion y actualizar el stock de prendas se ejecutaron 
            if (
                $this->model->create() &&
                $this->prendasModel->updateColumn("stock", $_POST["cantidad"], "id_prenda", $_POST["patron"])
            ) {
                $this->model->commit();
                // Redirecciona a la página con mensaje de éxito.
                header("Location: index.php?page=confecciones&succes=create");
            } else {
                // Redirecciona a la página con mensaje de error.
                header("Location: index.php?page=confecciones&error=create");
            }
        } catch (Exception $e) {
            $this->model->rollBack();
            header("Location: index.php?page=confecciones&error=other&errorDesc=" . $e->getMessage());
        }
    }



    /*   public function create()
    {

        try {

            // Asignación de los datos del formulario a los atributos del objeto confección.
            $this->model->setPatron($_POST["patron"]);
            $this->model->setCantidad($_POST["cantidad"]);
            $this->model->setFechaFabricacion(date('Y-m-d H:i:s')); // Fecha y hora actuales.
            $this->model->setempleado($_POST["empleado"]);

            // Obtención de los datos del patrón y los materiales asociados al patrón.
            $dataPatron =  $this->patroMaterialModel->viewMaterials($_POST["patron"]);

            // Inicialización de la variable para verificar el stock disponible para todos los materiales.
            $comprobarStock = true;

            if ($dataPatron) {
                // Iteración para obtener la cantidad total de material necesaria para la confección.
                foreach ($dataPatron as $material):

                    // Extracción del id del material y la cantidad necesaria para el patrón.
                    $idMaterial = $material["id_material"];
                    $cantidad = $material["cantidad"];

                    // Obtención del id del patrón.
                    $idPrenda = $material["id_patron"];

                    // Cálculo de la cantidad total de material necesaria.
                    $cantidaTotal = $cantidad * $_POST["cantidad"];

                    // Obtención del stock disponible para el material.
                    $stock = $this->almacenModel->getMaterialStock($idMaterial);

                    // Comprobación de que hay suficiente stock para crear la confección.
                    if ($cantidaTotal > $stock) {
                        $comprobarStock = false;
                        break; // Si no hay suficiente stock, no es necesario seguir iterando.
                    }

                endforeach;
            } else {
                throw new Exception("Error al obtener la lista de materiales");
            }

            // Comprobación de que hay suficiente stock para crear la confección.
            if ($comprobarStock) {

                // Si hay stock suficiente, se crean los registros y se actualiza el stock.
                foreach ($dataPatron as $material):

                    // Extracción del id del material y la cantidad necesaria para el patrón.
                    $idMaterial = $material["id_material"];
                    $cantidad = $material["cantidad"];

                    // Obtención del id del patrón.
                    $idPrenda = $material["id_patron"];

                    // Cálculo de la cantidad total de material necesaria.
                    $cantidaTotal = $cantidad * $_POST["cantidad"];

                    // Obtención del stock disponible para el material.
                    $stock = $this->almacenModel->getMaterialStock($idMaterial);

                    // Actualización del stock en el almacén y en las prendas.
                    $this->almacenModel->updateStockPatron($idMaterial, $cantidaTotal);

                endforeach;

                // Comprobamos si las funciones para crear la confeccion y actualizar el stock de prendas se ejecutaron 
                if (
                    $this->model->create() &&
                    $this->prendasModel->updateStockPrendas($idPrenda, $_POST["cantidad"])
                ) {
                    // Redirecciona a la página con mensaje de éxito.
                    header("Location: index.php?page=confecciones&succes=create");
                } else {
                    // Redirecciona a la página con mensaje de error.
                    header("Location: index.php?page=confecciones&error=create");
                }
            } else {
                // Redirecciona si no hay suficiente stock disponible.
                throw new Exception("No hay sufuciente material para realizar esta operacion");
            }
        } catch (Exception $e) {
            header("Location: index.php?page=confecciones&error=other&errorDesc=" . $e->getMessage());
        }
    }
 */


    public function delete()
    {
        // Si se elimina correctamente la confección, redirecciona con mensaje de éxito.
        if ($this->model->softDelete($_POST["id"])) {
            header("Location: index.php?page=confecciones&succes=2");
        } else {
            // Muestra un mensaje de error si no se puede eliminar.
            echo "<div class='alert alert-danger'> Error al eliminar Confección</div> ";
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