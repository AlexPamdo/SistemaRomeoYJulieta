<?php

namespace src\Model;

use PDO;

class OrdenPedidoModel extends ModeloBase
{

    protected $data = [];
    protected $tabla = "orden_pedido";

    public function setData($pedido, $material, $cantidad)
    {
        $data = [
            'pedido' => $pedido,
            'material' => $material,
            'cantidad' => $cantidad,
        ];
    }

    public function viewMaterials($value = "", $column = "")
    {
        $sql = "SELECT 
        u.*, 
        n.nombre_material AS material,
        t.tipo_material AS tipo,
        c.color AS color,
        n.stock AS cantidad_Stock
        FROM {$this->tabla} u
        INNER JOIN almacen n ON u.id_material = n.id_material
        INNER JOIN tipos_materiales t ON n.tipo_material = t.id_tipo_material
        INNER JOIN colores c ON n.color_material = c.id_color";

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
        $query = "INSERT INTO {$this->tabla} (id_pedido, id_material, cantidad_material) VALUES (:pedido, :material, :cantidad)";
        $stmt = $this->prepare($query);

        foreach($this->data as $param => $value){
            $stmt->bindParam(":$param", $value);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

  public function edit($id){}
}
