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
        INNER JOIN ocupaciones r ON u.id_ocupacion = r.id_ocupacion
        WHERE eliminado = 0";
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_empleado = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ( $stmt->execute() ) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nombre_empleado, apellido_empleado, telefono_empleado, email_empleado, id_ocupacion, cedula_empleado) VALUES (:nombre, :apellido, :telefono, :email, :ocupacion, :cedula)";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':ocupacion', $this->ocupacion);
        $stmt->bindParam(':cedula', $this->cedula);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    
    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET nombre_empleado = :nombre, apellido_empleado = :apellido, telefono_empleado = :telefono, email_empleado = :email, id_ocupacion = :ocupacion, cedula_empleado = :cedula WHERE id_empleado = :id";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':ocupacion', $this->ocupacion);
        $stmt->bindParam(':cedula', $this->cedula);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($id)
    {
        $query = "UPDATE $this->table SET eliminado = 1 WHERE id_empleado = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ( $stmt->execute() ) {
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