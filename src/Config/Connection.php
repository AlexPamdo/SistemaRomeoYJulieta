<?php

namespace src\Config;

use PDO;
use PDOException;

class Connection
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "romeoyjulieta";

    private $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->database,
                $this->user,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Mejora en la configuración de errores
        } catch (PDOException $e) {
            // Log del error a un archivo en lugar de mostrarlo
            error_log("Connection error: " . $e->getMessage(), 3, "/path/to/your/logfile.log");
            echo "No se pudo conectar a la base de datos."; // Mensaje genérico
            $this->conn = null;
        }
        
        return $this->conn;
    }
}
