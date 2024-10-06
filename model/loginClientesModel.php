<?php

// Incluir el archivo de conexión si es necesario
include_once("config/conexion.php");

// Clase para manejar las operaciones con clientes
class loginClientes
{
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;
    private $contraseña;
    private $cedula;

    private $conn; // Conexión a la base de datos
    private $tabla = "clientes"; // Nombre de la tabla en la base de datos

    // Constructor: inicializa la conexión a la base de datos
    public function __construct()
    {
        $database = new connection(); // Asumiendo que connection() es una clase válida para la conexión a la BD
        $this->conn = $database->getConnection();
    }

    // Método para insertar un nuevo cliente en la base de datos
    public function create()
    {
        $query = "INSERT INTO " . $this->tabla . " (nombre,apellido,telefono,email,contraseña,cedula) VALUES('" . $this->nombre . "','" . $this->apellido . "','" . $this->telefono . "','" .  $this->email . "','" . $this->contraseña . "','" . $this->cedula . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }


    // Métodos para establecer y obtener valores de los atributos privados
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
}