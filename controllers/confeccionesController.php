<?php


function render() {}

// Inclusión de los modelos necesarios para manejar los datos de confecciones, almacén, patrones, prendas y patron-material.
include_once "model/confeccionesModel.php";
include_once "model/almacenModel.php";
include_once "model/patronesModel.php";
include_once "model/prendasModel.php";
include_once "model/patronMaterialModel.php";
require_once("interfaces/interface.php");

class confeccionesController implements crudController
{

    // Explicacion general de las instacias que necesitaremos


    private $model; // La instancia del modelo de confecciones (Para Accededer a y editar dicha tabla)
    private $almacenModel; //La instacia del modelo de almacen para bajar el stock al momento de crear una prenda
    private $prendasModel; //La instacia del modelo de prendas para subir el stock al momento de crear una prenda
    private $patroMaterialModel; //la instancia del modelo de patron materiales, este es para saber que materiales y que cantidad se va a usar para la confeccion de dicha prenda

    public function __construct()
    {
        $this->model = new confecciones();
        $this->almacenModel = new material();
        $this->prendasModel = new Prenda();
        $this->patroMaterialModel = new patronMaterial();
    }

    // Función que se encarga de renderizar la vista de confecciones.
    public function show()
    {

        $confeccionesData = $this->model->viewAll();

        // Incluye la vista de confecciones para su visualización.
        include_once("views/confecciones.php");
    }


    public function create()
    {

        // Asignación de los datos del formulario a los atributos del objeto confección.
        $this->model->setPatron($_POST["patron"]);
        $this->model->setCantidad($_POST["cantidad"]);
        $this->model->setFechaFabricacion(date('Y-m-d H:i:s')); // Fecha y hora actuales.
        $this->model->setTiempoFabricacion($_POST["tiempo"]);
        $this->model->setempleado($_POST["empleado"]);

        // Obtención de los datos del patrón y los materiales asociados al patrón.
        $dataPatron =  $this->patroMaterialModel->viewMaterials($_POST["patron"]);

        // Inicialización de la variable para verificar el stock disponible para todos los materiales.
        $comprobarStock = true;

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
                header("Location: index.php?page=confecciones&succes=1");
            } else {
                // Redirecciona a la página con mensaje de error.
                header("Location: index.php?page=confecciones&error=1");
            }
        } else {
            // Redirecciona si no hay suficiente stock disponible.
            header("Location: index.php?page=confecciones&error=5");
        }
    }



    public function delete()
    {
        // Si se elimina correctamente la confección, redirecciona con mensaje de éxito.
        if ($this->model->delete($_POST["id"])) {
            header("Location: index.php?page=confecciones&succes=2");
        } else {
            // Muestra un mensaje de error si no se puede eliminar.
            echo "<div class='alert alert-danger'> Error al eliminar Confección</div> ";
        }
    }

    public function edit() {
        // Asignación de los datos del formulario a los atributos del objeto confección.
        $this->model->setPatron($_POST["patron"]);
        $this->model->setCantidad($_POST["cantidad"]);
        $this->model->setFechaFabricacion($_POST["fecha"]);
        $this->model->setTiempoFabricacion($_POST["tiempo"]);
        $this->model->setempleado($_POST["empleado"]);

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



