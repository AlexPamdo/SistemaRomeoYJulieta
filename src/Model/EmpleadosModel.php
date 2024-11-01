<?php
namespace src\Model;

use src\Config\Connection;
use PDO;

class EmpleadosModel
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

    public function viewAll($delete)
    {

        // Validar que $delete sea un booleano
        if (!is_bool($delete)) {
            return false; // O manejar el error de manera adecuada
        }

        $query = $query = "SELECT u.*, r.ocupacion AS id_ocupacion
        FROM empleados u 
        INNER JOIN ocupaciones r ON u.id_ocupacion = r.id_ocupacion
        WHERE eliminado = :delete";
       // Preparar la declaración
       $stmt = $this->conn->prepare($query);

       // Asignar el valor booleano de $delete a un parámetro
       $stmt->bindValue(':delete', $delete, PDO::PARAM_BOOL);

       // Ejecutar la declaración
       if ($stmt->execute()) {
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function totalCount()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        $result = $this->conn->query($query);

        if ($result) {
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row[0]['total'];
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
    public function remove($id){
        $query = "DELETE FROM " . $this->table . " WHERE id_empleado = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function active($id)
    {
        // Validar que $id sea un número entero
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            return false; // O manejar el error de manera adecuada
        }
    
        $query = "UPDATE $this->table SET eliminado = 0 WHERE id_empleado = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return $stmt->rowCount() > 0; // Verifica si alguna fila fue afectada
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