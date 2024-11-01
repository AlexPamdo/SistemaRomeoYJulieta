<?php

namespace src\Model;

use PDO;

class PedidosModel extends ModeloBase
{

    protected $data = [];

    protected $table = "pedidos";


    public function setData($proveedor, $fecha_pedido, $estado, $usuario, $total)
    {

        $this->data = [
            'proveedor' => $proveedor,
            'fecha_pedido' => $fecha_pedido,
            'estado' => $estado,
            'usuario' => $usuario,
            'total' => $total,
        ];
    }


    public function viewPedidos($value = "", $column = "")
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



    public function create()
    {
        $stmt = $this->prepare("INSERT INTO " . $this->table . " (id_proveedor, fecha_pedido, estado_pedido, id_usuario, total_pedido) 
        VALUES (:proveedor, :fecha_pedido, :estado, :usuario, :total)");

        foreach($this->data as $param => $value){
            $stmt->bindParam(":$param", $value);
        }

        $stmt->execute();

        return $this->lastInsertId();
    }

    public function delete($id)
    {
       return $this->toggleStatus(1,"id_pedido",$id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0,"id_pedido",$id);
    }

    public function remove($id)
    {
        return $this->hardDelete("id_pedido",$id);
    }
    public function edit($id)
    {
        $stmt = $this->prepare("UPDATE " . $this->table . " SET id_proveedor = :proveedor, fecha_pedido = :fecha_pedido, estado_pedido = :estado, id_usuario = :usuario, total_pedido = :total WHERE id_pedido = :id");

        foreach($this->data as $param => $value){
            $stmt->bindParam(":$param", $value);
        }

        return $stmt->execute();
    }

}
