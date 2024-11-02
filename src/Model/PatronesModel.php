<?php

namespace src\Model;

use PDO;

class PatronesModel extends ModeloBase
{
    //atributos

    protected $data = [];
    protected $tabla = "patrones";


    public function viewPatrones($value = "", $column = "")
    {
        $sql = "SELECT 
        u.*,
        i.img_prenda AS img
        FROM {$this->tabla} u
        INNER JOIN prendas i ON u.id_patron = i.id_prenda
        ";

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


    public function setData($patron)
    {
        $this->data = ["n_patron" => $patron];
    }



    public function create()
    {
        $query = "INSERT INTO patrones (nombre_patron) VALUES (:n_patron)";
        $stmt = $this->prepare($query);
        $stmt->bindParam(":n_patron", $this->data["n_patron"]);
        $stmt->execute();

        return $this->lastInsertId();
    }


    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET nombre_patron = :n_patron WHERE id_patron = :id";

        $stmt = $this->prepare($query);

        $stmt->bindParam(':n_patron', $this->data["n_patron"]);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }



    public function softDelete($id)
    {
      $this->toggleStatus(1,"id_patron",$id);
    }

    public function remove($id)
    {
        $this->hardDelete("id_patron",$id);
    }

    public function active($id)
    {
      $this->toggleStatus(0,"id_patron",$id);
    }

}
