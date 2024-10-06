<?php

//Iniciar una session solo si no hay una ya iniciada
session_start();


ob_start();

//funcion la cual nos ayudara a incluir los controladores
//Dependiendo que pagina se encuentre activa
function includeController($controller)
{
    require_once "controllers/$controller.php";
}

//obtenemos la informacion de la pagina a navegar mediante un get
$page = $_GET["page"] ?? "login"; //establecemos la pagina determinada como '/' si no se proporciona nada
$function = $_GET["function"] ?? "show"; //Establecemos la funcion determinada como show si no se proporciona nada
$controller = $page . "Controller"; //Añadimos la cadena "Controller" para invocar las funciones


$controllerPath = "controllers/$controller.php";

//if para verificar si el controlador existe
if (file_exists($controllerPath)) {

    //incluimos el controlador selecionado con la funcion hecha previamente
    includeController($controller);

    //si la seccion no esta iniciada redirigimos al login (el unico al que no le afecta es al login)
    if (!isset($_SESSION['username']) && $page != "login") {
        header('Location: index.php?page=login');
        exit;
    }

    $instance = new $controller(); //Creamos una instancia del controlador dado

    //preguntamos si existe la funcion dada
    if (method_exists($instance, $function)) {
        $instance->$function(); //Activamos la funcion dada
    } else {
        http_response_code(404);
        echo 'Método no encontrado en el controlador.';
    }
} else {
    http_response_code(404);
    echo 'Controlador no encontrado';
}

ob_end_flush();
?>
