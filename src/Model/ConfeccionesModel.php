<?php

namespace src\Model;

use src\Config\Connection;
use PDO;

class ConfeccionesModel
{
    private $id;

    private $patron;
    private $cantidad;
    private $fechaFabricacion;
    private $empleado;

    private $conn;
    private $table = "confeccion";



    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function getDbConnection(){
        $database = new connection;
        $this->conn = $database->getConnection();
        return $this->conn;
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
        $query = "INSERT INTO " . $this->table . " (id_patron, cantidad, fecha_fabricacion, id_empleado) VALUES (:patron, :cantidad, :fecha_fabricacion, :empleado)";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':patron', $this->patron);
        $stmt->bindParam(':cantidad', $this->cantidad);

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

    public function remove($id){
        $query = "DELETE FROM " . $this->table . " WHERE id_confeccion = :id";
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
        $query = "UPDATE " . $this->table . " SET eliminado = FALSE WHERE id_pedido = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->rowCount() > 0; // Verifica si alguna fila fue afectada
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET id_patron = :patron, cantidad = :cantidad, fecha_fabricacion = :fecha_fabricacion, id_empleado = :empleado WHERE id_usuario = :id";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':patron', $this->patron);
        $stmt->bindParam(':cantidad', $this->cantidad);
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