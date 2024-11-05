<?php

namespace src\Model;

use PDO;

class OrdenEntregaModel extends ModeloBase
{

    protected $data = [];
    protected $tabla = "orden_entrega";

    public function setData($entrega, $prenda, $cantidad)
    {
        $data = [
            'entrega' => $entrega,
            'prenda' => $prenda,
            'cantidad' => $cantidad,
        ];
    }

    public function viewPrendas($value = "", $column = "")
    {
        $sql = "SELECT 
        u.*, 
        p.nombre AS categoria, 
        c.color AS color,
        l.coleccion AS coleccion,
        t.cm AS talla
    FROM {$this->tabla} u
    INNER JOIN categorias_prenda p ON u.id_categoria = p.id_categoria
    INNER JOIN colores c ON u.id_color = c.id_color
    INNER JOIN colecciones_prenda l ON u.id_coleccion = l.id_coleccion
    INNER JOIN tallas t ON u.id_talla = t.id_talla";

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
        $query = "INSERT INTO {$this->tabla} (id_entrega, id_prenda, cantidad_prenda) VALUES (:pedido, :material, :cantidad)";
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
