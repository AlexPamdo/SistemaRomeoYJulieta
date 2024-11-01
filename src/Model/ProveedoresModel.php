<?php
namespace src\Model;

use src\Config\Connection;
use PDO;

class ProveedoresModel
{
    private $id;

    private $nombre;
    private $rif;
    private $telefono;
    private $gmail;
   
   
    private $notas;

    private $conn;
    private $table = "proveedores";



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

        $query = "SELECT * FROM $this->table WHERE eliminado = :delete";

        $stmt = $this->conn->prepare($query);

    // Asignar el valor booleano de $delete a un parámetro
    $stmt->bindValue(':delete', $delete, PDO::PARAM_BOOL);

    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
    }
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_proveedor = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    
    }
    
    public function totalCount($status)
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE eliminado = :status";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status",$status);

        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row[0]['total'];
        } else {
            return false;
        }
    }



    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nombre_proveedor, rif_proveedor, telefono_proveedor, gmail_proveedor, notas_proveedor) VALUES (:nombre, :rif, :telefono, :gmail, :notas)";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':rif', $this->rif);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':gmail', $this->gmail);
        $stmt->bindParam(':notas', $this->notas);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET nombre_proveedor = :nombre, rif_proveedor = :rif, telefono_proveedor = :telefono, gmail_proveedor = :gmail, notas_proveedor = :notas WHERE id_proveedor = :id";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':rif', $this->rif);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':gmail', $this->gmail);
        $stmt->bindParam(':notas', $this->notas);
        $stmt->bindParam(':id', $id);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    

    public function delete($id)
    {
        $query = "UPDATE $this->table SET eliminado = 1 WHERE id_proveedor = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function remove($id){
        $query = "DELETE FROM " . $this->table . " WHERE id_proveedor = :id";
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
        $query = "UPDATE " . $this->table . " SET eliminado = FALSE WHERE id_proveedor = :id";
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
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setGmail($gmail)
    {
        $this->gmail = $gmail;
    }
    public function getGmail()
    {
        return $this->gmail;
    }
    public function setRif($rif)
    {
       $this->rif = $rif;
    }

    public function setNotas($notas)
    {
        $this->notas = $notas;
    }
    public function getNotas()
    {
        return $this->notas;
    }
}