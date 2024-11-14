<?php

namespace src\Model;
use PDO;
use PDOException;
require_once ("src/Config/ConnAtributes.php");


class Database extends PDO
{
    public function __construct(){
        // Usa las constantes definidas en config/constants.php
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

        try {
            // Llama al constructor de PDO usando las constantes
            parent::__construct($dsn, DB_USER, DB_PASSWORD);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }
}
