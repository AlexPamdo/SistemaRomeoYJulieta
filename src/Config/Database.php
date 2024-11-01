<?php

namespace src\Config;

use PDO;
use PDOException;

class Database extends PDO
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "romeoyjulieta";

    private $conn;

    public function __construct(){
        $dsn = "mysql:host=$this->host;dbname=$this->database;charset=utf8";

        try{
            parent::__construct($dsn, $this->user, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            die("Error en la conexion a la base de datos". $e->getMessage());
        }
    }
}
