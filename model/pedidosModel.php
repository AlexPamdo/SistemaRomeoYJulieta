<?php

include_once("config/conexion.php");

class pedidos
{
    private $proveedor;
    private $fecha_pedido;
    private $estado;
    private $usuario;
    private $total;

    private $conn;
    private $table = "pedidos";



    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function getDbConnection()
    {
        return $this->conn;
    }

    public function viewAll()
    {
        $query = "SELECT 
        u.*, 
        p.nombre_proveedor AS id_proveedor, 
        s.nombre_usuario AS id_usuario
    FROM 
        " . $this->table . " u
    INNER JOIN 
        proveedores p ON u.id_proveedor = p.id_proveedor
    INNER JOIN 
        usuarios s ON u.id_usuario = s.id_usuario;";

        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function viewOne($id)
{
    $query = "SELECT * FROM " . $this->table . " WHERE id_pedido = :id"; 
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    } else {
        return false;
    }
}

    public function selectLastId()
    {
        $query = "SELECT MAX(id_pedido) as max_id FROM $this->table";
        $consult = $this->conn->query($query);
        $result = $consult->fetch(PDO::FETCH_ASSOC);

        $lastId = $result['max_id'];

        if ($lastId) {
            return $lastId;
        } else {
            return false;
        }
    }

    //Recordatorio que sustituimos el campo de id_orden_pedido temporalmente para la mañana, 
    //Recordatorio 2: agregue la parte de cantidad para subir el stock, hay q quitarlo luego

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (id_proveedor, fecha_pedido, estado_pedido, id_usuario, total_pedido) 
        VALUES (:proveedor, :fecha_pedido, :estado, :usuario, :total)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':proveedor', $this->proveedor);
        $stmt->bindParam(':fecha_pedido', $this->fecha_pedido);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':total', $this->total);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_pedido = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET id_proveedor = :proveedor, fecha_pedido = :fecha_pedido, estado_pedido = :estado, id_usuario = :usuario, total_pedido = :total WHERE id_pedido = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':proveedor', $this->proveedor);
        $stmt->bindParam(':fecha_pedido', $this->fecha_pedido);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':total', $this->total);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $query = "UPDATE " . $this->table . " SET estado_pedido = :estado WHERE id_pedido = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':estado', $this->estado);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }
    public function getProveedor()
    {
        return $this->proveedor;
    }
    public function setFecha_pedido($fecha_pedido)
    {
        $this->fecha_pedido = $fecha_pedido;
    }
    public function getFecha_pedido()
    {
        return $this->fecha_pedido;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function getTotal()
    {
        return $this->total;
    }
}
