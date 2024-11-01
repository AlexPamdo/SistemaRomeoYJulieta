<?php

namespace src\Model;

use PDO;

class PedidosModel extends ModeloBase
{
    private $proveedor;
    private $fecha_pedido;
    private $estado;
    private $usuario;
    private $total;

    private $conn;
    private $table = "pedidos";


    public function viewAll($value = "", $column = "")
    {
        $sql = "SELECT 
        u.*, 
        p.nombre_proveedor AS id_proveedor, 
        s.nombre_usuario AS id_usuario
    FROM 
        " . $this->table . " u
    INNER JOIN 
        proveedores p ON u.id_proveedor = p.id_proveedor
    INNER JOIN 
        usuarios s ON u.id_usuario = s.id_usuario";

        // Agregar condición si se proporciona un valor y columna
        if ($value !== "" && $column !== "") {
            // Asegurarse de que la columna sea válida (esto es importante para prevenir SQL Injection)
            $sql .= " WHERE u.$column = :value";
        }

        // Preparar la consulta
        $stmt = $this->prepare($sql);

        // Bindea el parámetro solo si se proporciona un valor
        if ($value !== "") {
            $stmt->bindParam(":value", $value);
        }

        // Ejecutar la consulta
        $stmt->execute();

        // Retornar los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalCount($estado)
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE estado_pedido = :estado";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":estado",$estado);
        $stmt->execute();

        if ($stmt) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row[0]['total'];
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
        $query = "UPDATE $this->table SET eliminado = 1 WHERE id_pedido = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ( $stmt->execute() ) {
            return true;
        } else {
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

    public function remove($id){
        $query = "DELETE FROM " . $this->table . " WHERE id_pedido = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id);

        if($stmt->execute()){
            return true;
        }else{
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
