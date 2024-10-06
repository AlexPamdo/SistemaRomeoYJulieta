<?php
include_once("config/conexion.php");

class Proveedores
{
    private $id;

    private $nombre;
    private $telefono;
    private $gmail;
    private $tipo;
    private $estado;
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
        //Falto una pequeña separacion luego de FROM
        /* $query = "SELECT 
        u.*, 
        r.tipo_material AS tipo_material, 
        c.color AS color_material
    FROM 
        " . $this->table . " u
    INNER JOIN 
        tipos_materiales r ON u.tipo_material = r.id_tipo_material
    INNER JOIN 
        colores_materiales c ON u.color_material = c.id_color;"; */

        $query = "SELECT 
        u.*, 
        r.tipo AS id_tipo_proveedor, 
        c.estado AS id_estado
    FROM 
        " . $this->table . " u
    INNER JOIN 
        tipo_proveedor r ON u.id_tipo_proveedor = r.id_tipo_proveedor
    INNER JOIN 
        estado_proveedor c ON u.id_estado = c.id_estado;";

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
        $query = "INSERT INTO " . $this->table . " (nombre_proveedor,telefono_proveedor,gmail_proveedor,id_tipo_proveedor,id_estado,notas_proveedor) VALUES('" . $this->nombre . "','" . $this->telefono . "','" . $this->gmail . "','" .  $this->tipo . "','" . $this->estado . "','" . $this->notas . "');";

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
        $query = "UPDATE " . $this->table . " SET nombre_proveedor = '" . $this->nombre . "', telefono_proveedor = '" . $this->telefono . "',  gmail_proveedor = '" . $this->gmail . "', id_tipo_proveedor = '" . $this->tipo . "', id_estado = '" . $this->estado . "', notas_proveedor = '" . $this->notas . "' WHERE id_proveedor = " . $id;

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
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
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