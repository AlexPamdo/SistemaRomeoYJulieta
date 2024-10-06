<?php

include_once("config/conexion.php");

class login
{

    private $gmail;
    private $contraseña;
    private $tabla = "usuarios";

    private $conn;

    public function __construct()
    {
        $database = new connection();
        $this->conn = $database->getConnection();
    }


    public function login()
    {
        $sql = "SELECT * FROM " . $this->tabla .  " WHERE gmail_usuario= '" . $this->gmail . "' and contraseña_usuario= '" . $this->contraseña . "';";

        $result = $this->conn->query($sql);

        if ($result) {
            // Usuario autenticado correctamente
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            // No se encontró ningún usuario con las credenciales proporcionadas
            return false;
        }
    }




    public function setGmail($gmail)
    {
        $this->gmail = $gmail;
    }
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }
}