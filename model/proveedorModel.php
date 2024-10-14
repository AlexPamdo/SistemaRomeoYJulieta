<?php
include_once("config/conexion.php");

class Proveedores
{
    private $id;

    private $nombre;
    private $telefono;
    private $gmail;
    private $tipo;
   
    private $notas;

    private $conn;
    private $table = "proveedores";



    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll()
    {
        $query = "SELECT 
        u.*, 
        r.tipo AS id_tipo_proveedor
    FROM 
        " . $this->table . " u
    INNER JOIN 
        tipo_proveedor r ON u.id_tipo_proveedor = r.id_tipo_proveedor";

        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        }
    }
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_proveedor = " . $id;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nombre_proveedor,telefono_proveedor,gmail_proveedor,id_tipo_proveedor,notas_proveedor) VALUES('" . $this->nombre . "','" . $this->telefono . "','" . $this->gmail . "','" .  $this->tipo . "','" . $this->notas . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_proveedor = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET nombre_proveedor = '" . $this->nombre . "', telefono_proveedor = '" . $this->telefono . "',  gmail_proveedor = '" . $this->gmail . "', id_tipo_proveedor = '" . $this->tipo .  "', notas_proveedor = '" . $this->notas . "' WHERE id_proveedor = " . $id;

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
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function getTipo()
    {
        return $this->tipo;
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