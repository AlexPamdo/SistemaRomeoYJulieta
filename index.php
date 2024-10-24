<?php

require_once __DIR__ . '/vendor/autoload.php';

// Iniciar una sesión solo si no hay una ya iniciada
session_start();

ob_start();

// Función para incluir los controladores
function includeController($controller)
{
    require_once "src/Controllers/$controller.php"; // Aquí solo se pasa el nombre del controlador
}

// Obtener la información de la página a navegar mediante un GET
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING) ?? "login";
$function = filter_input(INPUT_GET, 'function', FILTER_SANITIZE_STRING) ?? "show";
$controller = ucfirst($page) . "Controller"; // Solo el nombre del controlador

$controllerPath = "src/Controllers/$controller.php"; // Ruta correcta del controlador

// Verificar si el controlador existe
if (file_exists($controllerPath)) {
    includeController($controller);

    // Si la sesión no está iniciada, redirigir al login
    if (!isset($_SESSION['username']) && $page != "login") {
        header('Location: index.php?page=login');
        exit;
    }

    if (class_exists("src\\Controllers\\" . $controller)) { // Asegúrate de usar el namespace correcto al verificar la clase
        $instance = new ("src\\Controllers\\" . $controller)(); // Crear una instancia del controlador

        // Preguntar si existe la función dada
        if (method_exists($instance, $function)) {
            $instance->$function(); // Activar la función dada
        } else {
            http_response_code(404);
            echo 'Método no encontrado en el controlador.';
        }
    } else {
        http_response_code(404);
        echo 'Clase del controlador no encontrada.';
    }
} else {
    http_response_code(404);
    echo 'Controlador no encontrado';
}


ob_end_flush();


?>
