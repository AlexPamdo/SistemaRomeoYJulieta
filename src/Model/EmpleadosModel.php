<?php

namespace src\Model;

use src\Config\Connection;
use PDO;

class EmpleadosModel extends ModeloBase
{
    protected $data = [];
    protected $tabla = "empleados";

    public function setData($nombre, $apellido, $telefono, $email, $ocupacion, $cedula)
    {
        $this->data = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "telefono" => $telefono,
            "email" => $email,
            "ocupacion" => $ocupacion,
            "cedula" => $cedula,
        ];
    }


    public function viewEmpleados($value = "", $column = "")
    {

        $sql = "SELECT u.*, r.ocupacion AS id_ocupacion
        FROM empleados u 
        INNER JOIN ocupaciones r ON u.id_ocupacion = r.id_ocupacion";
        // Preparar la declaración
        $stmt = $this->prepare($sql);

        // Agregar condición si se proporciona un valor y columna
        if ($value !== "" && $column !== "") {
            // Asegurarse de que la columna sea válida (esto es importante para prevenir SQL Injection)
            $sql .= " WHERE $column = :value";
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
        $query = "INSERT INTO {$this->tabla} (nombre_empleado, apellido_empleado, telefono_empleado, email_empleado, id_ocupacion, cedula_empleado) VALUES (:nombre, :apellido, :telefono, :email, :ocupacion, :cedula)";

        $stmt = $this->prepare($query);

        // Bindea los parámetros usando los datos del array $data
        foreach ($this->data as $param => $value) {
            $stmt->bindParam(":$param", $value);
        }

        // Ejecuta la consulta
        return $stmt->execute();
    }



    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET nombre_empleado = :nombre, apellido_empleado = :apellido, telefono_empleado = :telefono, email_empleado = :email, id_ocupacion = :ocupacion, cedula_empleado = :cedula WHERE id_empleado = :id";

        $stmt = $this->prepare($query);

        // Bindea los parámetros usando los datos del array $data
        foreach ($this->data as $param => $value) {
            $stmt->bindParam(":$param", $value);
        }

        // Ejecuta la consulta
        return $stmt->execute();
    }

    public function softDelete($id)
    {
        return $this->toggleStatus(1, "id_empleado", $id);
    }
    public function remove($id)
    {
       return $this->hardDelete("id_empleado", $id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0, "id_empleado", $id);
    }
}
