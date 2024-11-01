<?php

namespace src\Model;

use src\Config\Connection;
use PDO;

class TiposMaterialModel{

    private $table = "tipos_materiales";
    private $conn;

    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll(){
        $query = "SELECT * FROM $this->table";
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }

    }
}