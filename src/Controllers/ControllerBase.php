<?php

namespace src\Controllers;

use Exception;

abstract class ControllerBase
{
    /**
     * Maneja la respuesta JSON, reduciendo duplicación en los métodos.
     *
     * @param callable $llamada Función que contiene la lógica a ejecutar.
     */
    public function procesarRespuestaJson(callable $llamada)
    {
        try {
            $response = $llamada();
            echo json_encode([
                "success" => true,
                "data" => $response
            ]);
        } catch (Exception $e) {
            // Registrar errores para depuración
            error_log("Error en procesarRespuestaJson: " . $e->getMessage());
    
            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
        exit();
    }

    /**
     * Realiza una redirección a una página específica.
     *
     * @param string $page Página a redirigir.
     * @throws Exception Si el parámetro $page no es válido.
     */
    public function redirect($page)
    {
        if (!is_string($page) || empty($page)) {
            throw new Exception("Página inválida para redirección");
        }
        header("Location: index.php?page=" . urlencode($page));
        exit;
    }

  
}