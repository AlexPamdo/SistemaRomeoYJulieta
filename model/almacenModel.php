<?php

include_once("config/conexion.php");

class Material
{
    private $id;
    private $nombre;
    private $tipo;
    private $color;
    private $stock;
    private $precio;
    private $conn;
    private $table = "almacen";

    public function __construct()
    {
        $database = new Connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll()
    {
        $query = "SELECT 
                    u.*, 
                    r.tipo_material AS tipo_material, 
                    c.color AS color_material
                  FROM 
                    almacen u
                  INNER JOIN 
                    tipos_materiales r ON u.tipo_material = r.id_tipo_material
                  INNER JOIN 
                    colores_materiales c ON u.color_material = c.id_color";

        $stmt = $this->conn->query($query);

        if ($stmt) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_material = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nombre_material, tipo_material, color_material, stock, precio) 
                  VALUES (:nombre, :tipo, :color, :stock, :precio)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_INT);
        $stmt->bindParam(':color', $this->color, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $this->stock, PDO::PARAM_INT);
        $stmt->bindParam(':precio', $this->precio, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_material = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " 
                  SET nombre_material = :nombre, tipo_material = :tipo, color_material = :color, stock = :stock, precio = :precio 
                  WHERE id_material = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_INT);
        $stmt->bindParam(':color', $this->color, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $this->stock, PDO::PARAM_INT);
        $stmt->bindParam(':precio', $this->precio, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStock($id, $stock)
    {
        $query = "UPDATE " . $this->table . " SET stock = stock + :stock WHERE id_material = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStockPatron($id, $stock)
    {
        $query = "UPDATE " . $this->table . " SET stock = stock - :stock WHERE id_material = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMaterialStock($idMaterial)
    {
        $query = "SELECT stock FROM " . $this->table . " WHERE id_material = :idMaterial";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idMaterial', $idMaterial, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt) {
            $data = $stmt->fetch(PDO::FETCH_COLUMN);
            return $data ?: null; // Devolver null si no se encuentra ningún registro
        } else {
            return null; // Manejar el caso cuando la consulta falla
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

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
}