<?php

namespace src\Model;

use PDO;

class ConfeccionesModel extends ModeloBase
{

    protected $data = [];
    protected $tabla = "confeccion";


    public function setData($pedido, $fechaFabricacion, $supervisor)
    {
        $this->data = [
            "pedido" => $pedido,
            "fecha_fabricacion" => $fechaFabricacion,
            "supervisor" => $supervisor,
        ];
    }

    public function viewConfecciones($value = "", $column = "")
    {

        $sql = "SELECT 
    u.*,
    e.nombre_supervisor AS id_supervisor,
    p.desc_pedido_prenda AS desc_pedido
FROM
    confeccion u
INNER JOIN
    supervisores e ON u.id_supervisor = e.id_supervisor
    INNER JOIN
    pedidos_prendas p on u.id_pedido = p.id_pedido_prenda ";

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
        $query = "INSERT INTO {$this->tabla} (id_pedido, fecha_fabricacion, id_supervisor) VALUES (:pedido, :fecha_fabricacion, :supervisor)";

        $stmt = $this->prepare($query);

        $stmt->bindParam(":pedido", $this->data["pedido"]);
        $stmt->bindParam(":fecha_fabricacion", $this->data["fecha_fabricacion"]);
        $stmt->bindParam(":supervisor", $this->data["supervisor"]);

        if ($stmt->execute()) {
            return $this->lastInsertId();
        } else {
            return false;
        }
    }


    public function softDelete($id)
    {
        return $this->toggleStatus(1, "id_confeccion", $id);
    }

    public function remove($id)
    {
        return $this->hardDelete("id_confeccion", $id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0, "id_confeccion", $id);
    }

    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET id_prenda = :prenda, cantidad = :cantidad, fecha_fabricacion = :fecha_fabricacion, id_supervisor = :supervisor WHERE id_usuario = :id";

        $stmt = $this->prepare($query);

        $stmt->bindParam(":prenda", $this->data["prenda"]);
        $stmt->bindParam(":cantidad", $this->data["cantidad"]);
        $stmt->bindParam(":fecha_fabricacion", $this->data["fecha_fabricacion"]);
        $stmt->bindParam(":supervisor", $this->data["supervisor"]);
        $stmt->bindParam(":id", $id);


        return $stmt->execute();
    }
}
