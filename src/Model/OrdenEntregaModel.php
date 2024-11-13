<?php

namespace src\Model;

use PDO;

class OrdenEntregaModel extends ModeloBase
{

    protected $data = [];
    protected $tabla = "orden_entrega";

    public function setData($entrega, $prenda, $cantidad)
    {
        $this->data = [
            'entrega' => $entrega,
            'prenda' => $prenda,
            'cantidad' => $cantidad,
        ];
    }

    public function viewPrendas($value = "", $column = "")
    {

        $sql = "SELECT u.*, 
        p.nombre_prenda AS id_prenda,
        l.coleccion AS coleccion,
        t.cm AS talla
        FROM {$this->tabla} u
        INNER JOIN prendas p ON u.id_prenda = p.id_prenda
        INNER JOIN colecciones_prenda l ON p.id_coleccion = l.id_coleccion
        INNER JOIN tallas t ON p.id_talla = t.id_talla";


        // Agregar condición si se proporciona un valor y columna
        if ($value !== "" && $column !== "") {
            // Asegurarse de que la columna sea válida (esto es importante para prevenir SQL Injection)
            $sql .= " WHERE U.$column = :value";
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
        $query = "INSERT INTO {$this->tabla} (id_entrega, id_prenda, cantidad_prenda) VALUES (:entrega, :prenda, :cantidad)";
        $stmt = $this->prepare($query);

        $stmt->bindParam(":entrega", $this->data["entrega"]);
        $stmt->bindParam(":prenda", $this->data["prenda"]);
        $stmt->bindParam(":cantidad", $this->data["cantidad"]);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id) {}
}
