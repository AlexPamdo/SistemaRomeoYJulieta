<?php

// Función que se encarga de renderizar la vista de confecciones.
function render()
{
    // Incluye la vista de confecciones para su visualización.
    include_once("views/confecciones.php");
}

// Inclusión de los modelos necesarios para manejar los datos de confecciones, almacén, patrones, prendas y patron-material.
include_once "model/confeccionesModel.php";
include_once "model/almacenModel.php";
include_once "model/patronesModel.php";
include_once "model/prendasModel.php";
include_once "model/patronMaterialModel.php";

// Clase crearConfeccion que se encarga de la lógica para crear una nueva confección.
class crearConfeccion
{
    public function create()
    {
        // Instancias de los modelos necesarios para manipular los datos.
        $confeccion = new confecciones();
        $materiales = new material();
        $patrones = new patrones();
        $prendas = new Prenda();
        $patronMateriales = new patronMaterial();

        // Verificación de que se ha enviado el formulario mediante el botón "Crear".
        if (!empty($_POST["btnCrear"])) {

            // Asignación de los datos del formulario a los atributos del objeto confección.
            $confeccion->setPatron($_POST["patron"]);
            $confeccion->setCantidad($_POST["cantidad"]);
            $confeccion->setFechaFabricacion(date('Y-m-d H:i:s')); // Fecha y hora actuales.
            $confeccion->setTiempoFabricacion($_POST["tiempo"]);
            $confeccion->setempleado($_POST["empleado"]);

            // Obtención de los datos del patrón y los materiales asociados al patrón.
            $dataPatron = $patronMateriales->viewMaterials($_POST["patron"]);

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
                $stock = $materiales->getMaterialStock($idMaterial);

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
                    $stock = $materiales->getMaterialStock($idMaterial);

                    // Actualización del stock en el almacén y en las prendas.
                    $materiales->updateStockPatron($idMaterial, $cantidaTotal);
                    
                endforeach;

                // Comprobamos si las funciones para crear la confeccion y actualizar el stock de prendas se ejecutaron 
                if (
                    $confeccion->create() &&
                    $prendas->updateStockPrendas($idPrenda, $_POST["cantidad"])
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
        // Incluye la vista del formulario para crear la confección.
        include_once "views/confecciones/crear.php";
    }
}

// Clase eliminarConfeccion que se encarga de la lógica para eliminar una confección.
class eliminarConfeccion
{
    public function eliminar()
    {
        // Instancia del modelo confecciones.
        $confeccion = new confecciones();

        // Verificación de que se ha enviado la solicitud de eliminación mediante el botón "Eliminar".
        if (!empty($_GET["btnDelete"])) {

            // Obtención del ID de la confección a eliminar.
            $id = ($_GET["id"]);

            // Si se elimina correctamente la confección, redirecciona con mensaje de éxito.
            if ($confeccion->delete($id)) {
                header("Location: index.php?page=confecciones&succes=2");
            } else {
                // Muestra un mensaje de error si no se puede eliminar.
                echo "<div class='alert alert-danger'> Error al eliminar Confección</div> ";
            }
        }
    }
}

// Clase editConfeccion que se encarga de la lógica para editar una confección existente.
class editConfeccion
{
    public function edit()
    {
        // Instancia del modelo confecciones.
        $confeccion = new confecciones();
        $id = $_POST["id"] ?? null; // Obtención del ID de la confección a editar.

        // Verificación de que se ha enviado el formulario mediante el botón "Actualizar".
        if (!empty($_POST["btnUpdate"])) {
            if ($_POST["btnUpdate"] == "edit") {

                // Asignación de los datos del formulario a los atributos del objeto confección.
                $confeccion->setPatron($_POST["patron"]);
                $confeccion->setCantidad($_POST["cantidad"]);
                $confeccion->setFechaFabricacion($_POST["fecha"]);
                $confeccion->setTiempoFabricacion($_POST["tiempo"]);
                $confeccion->setempleado($_POST["empleado"]);

                // Si la edición es exitosa, redirecciona con mensaje de éxito.
                if ($confeccion->edit($id)) {
                    header("Location: index.php?page=confecciones&succes=3");
                    exit;
                } else {
                    // Redirecciona con mensaje de error si no se puede editar.
                    header("Location: index.php?page=confecciones&error=3");
                }
            }
        }
        // Incluye la vista del formulario para editar la confección.
        include_once "views/confecciones/editar.php";
    }
}
