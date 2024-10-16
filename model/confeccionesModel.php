<?php

include_once("config/conexion.php");

class confecciones
{
    private $id;

    private $patron;
    private $cantidad;
    private $tiempoFabricacion;
    private $fechaFabricacion;
    private $empleado;

    private $conn;
    private $table = "confeccion";



    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll()
    {
        $query = "SELECT 
    u.*,
    e.nombre_empleado AS id_empleado,
    p.nombre_patron as id_prenda
FROM
    confeccion u
INNER JOIN
    empleados e ON u.id_empleado = e.id_empleado
INNER JOIN
    patrones p ON u.id_patron = p.id_patron";

        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_confeccion = :id";
        $stmmt = $this->conn->prepare($query);
        $stmmt->bindParam(":id", $id);

        if ($stmmt->execute()) {
            return $stmmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (id_patron, cantidad, tiempo_fabricacion, fecha_fabricacion, id_empleado) VALUES (:patron, :cantidad, :tiempo_fabricacion, :fecha_fabricacion, :empleado)";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':patron', $this->patron);
        $stmt->bindParam(':cantidad', $this->cantidad);
        $stmt->bindParam(':tiempo_fabricacion', $this->tiempoFabricacion);
        $stmt->bindParam(':fecha_fabricacion', $this->fechaFabricacion);
        $stmt->bindParam(':empleado', $this->empleado);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function delete($id)
    {
        $query = "UPDATE $this->table SET eliminado = 1 WHERE id_confeccion = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET id_patron = :patron, cantidad = :cantidad, tiempo_fabricacion = :tiempo_fabricacion, fecha_fabricacion = :fecha_fabricacion, id_empleado = :empleado WHERE id_usuario = :id";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':patron', $this->patron);
        $stmt->bindParam(':cantidad', $this->cantidad);
        $stmt->bindParam(':tiempo_fabricacion', $this->tiempoFabricacion);
        $stmt->bindParam(':fecha_fabricacion', $this->fechaFabricacion);
        $stmt->bindParam(':empleado', $this->empleado);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function setPatron($patron)
    {
        $this->patron = $patron;
    }
    public function getPatron()
    {
        return $this->patron;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setTiempoFabricacion($tiempoFabricacion)
    {
        $this->tiempoFabricacion = $tiempoFabricacion;
    }
    public function getTiempoFabricacion()
    {
        return $this->tiempoFabricacion;
    }
    public function setFechaFabricacion($fechaFabricacion)
    {
        $this->fechaFabricacion = $fechaFabricacion;
    }
    public function getfechaFabricacion()
    {
        return $this->fechaFabricacion;
    }
    public function setempleado($empleado)
    {
        $this->empleado = $empleado;
    }
    public function getempleado()
    {
        return $this->empleado;
    }
}