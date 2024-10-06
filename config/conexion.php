<?php

class connection
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
        } catch (PDOException $e) {
            echo "fallo en la conexion" . $e->getMessage();
            $this->conn = null;
        }
        return $this->conn;
    }
}