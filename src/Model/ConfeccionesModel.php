<?php

namespace src\Model;

use PDO;

class ConfeccionesModel extends ModeloBase
{

    protected $data = [];
    protected $tabla = "confeccion";


    public function setData($patron, $cantidad, $fechaFabricacion, $empleado)
    {
        $this->data = [
            "patron" => $patron,
            "cantidad" => $cantidad,
            "fecha_fabricacion" => $fechaFabricacion,
            "empleado" => $empleado,
        ];
    }

    public function viewConfecciones($value = "", $column = "")
    {

        $sql = "SELECT 
    u.*,
    e.nombre_empleado AS id_empleado,
    p.nombre_patron as id_prenda
FROM
    confeccion u
INNER JOIN
    empleados e ON u.id_empleado = e.id_empleado
INNER JOIN
    patrones p ON u.id_patron = p.id_patron";

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
        $query = "INSERT INTO {$this->tabla} (id_patron, cantidad, fecha_fabricacion, id_empleado) VALUES (:patron, :cantidad, :fecha_fabricacion, :empleado)";

        $stmt = $this->prepare($query);

        // Bindea los parámetros usando los datos del array $data
        foreach ($this->data as $param => $value) {
            $stmt->bindParam(":$param", $value);
        }

        return $stmt->execute();
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
        $query = "UPDATE {$this->tabla} SET id_patron = :patron, cantidad = :cantidad, fecha_fabricacion = :fecha_fabricacion, id_empleado = :empleado WHERE id_usuario = :id";

        $stmt = $this->prepare($query);

        // Bindea los parámetros usando los datos del array $data
        foreach ($this->data as $param => $value) {
            $stmt->bindParam(":$param", $value);
        }

        return $stmt->execute();
    }

}
