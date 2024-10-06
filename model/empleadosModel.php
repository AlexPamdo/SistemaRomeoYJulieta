<?php

include_once("config/conexion.php");

class empleados
{
    private $id;

    private $nombre;
    private $apellido;
    private $telefono;
    private $email;
    private $ocupacion;

    private $cedula;

    private $conn;
    private $table = "empleados";



    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll()
    {
        $query = $query = "SELECT u.*, r.ocupacion AS id_ocupacion
        FROM empleados u 
        INNER JOIN ocupaciones r ON u.id_ocupacion = r.id_ocupacion";
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_empleado = " . $id;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nombre_empleado,apellido_empleado,telefono_empleado,email_empleado,id_ocupacion,cedula_empleado) VALUES('" . $this->nombre . "','" . $this->apellido . "','" . $this->telefono . "','" . $this->email . "','" .  $this->ocupacion . "','" . $this->cedula . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_empleado = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET nombre_empleado = '" . $this->nombre . "', apellido_empleado = '" . $this->apellido . "',  telefono_empleado = '" . $this->telefono . "',  email_empleado = '" . $this->email . "', id_ocupacion = '" . $this->ocupacion  . "', cedula_empleado = '" . $this->cedula . "' WHERE id_empleado = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    }
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    public function getCedula()
    {
        return $this->cedula;
    }
}