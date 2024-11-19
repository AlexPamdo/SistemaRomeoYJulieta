<?php

namespace src\Model;

use PDO;

class SupervisoresModel extends ModeloBase
{
    protected $data = [];
    protected $tabla = "supervisores";

    public function setData($nombre, $apellido, $telefono, $email, $cedula)
    {
        $this->data = [
            "nombre" => trim($nombre), // Remueve espacios extra
            "apellido" => trim($apellido),
            "telefono" => preg_replace('/[^0-9]/', '', $telefono), // Asegura que solo haya números
            "email" => filter_var($email, FILTER_SANITIZE_EMAIL), // Limpia el correo
            "cedula" => trim($cedula),
        ];
    }


    public function viewSupervisores($value = "", $column = "")
    {

        $sql = "SELECT * FROM " . $this->tabla;
        // Preparar la declaración
        $stmt = $this->prepare($sql);

        // Agregar condición si se propor ciona un valor y columna
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
        $query = "INSERT INTO {$this->tabla} (nombre_supervisor, apellido_supervisor, telefono_supervisor, email_supervisor, cedula_supervisor) VALUES (:nombre, :apellido, :telefono, :email, :cedula)";

        $stmt = $this->prepare($query);

        // Bindea los parámetros usando los datos del array $data
        foreach ($this->data as $param => $value) {
            $stmt->bindValue(":$param", $value);
        }

        // Ejecuta la consulta
        return $stmt->execute();
    }



    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET nombre_supervisor = :nombre, apellido_supervisor = :apellido, telefono_supervisor = :telefono, email_supervisor = :email, cedula_supervisor = :cedula WHERE id_supervisor = :id";

        $stmt = $this->prepare($query);

        // Bindea los parámetros usando los datos del array $data
        foreach ($this->data as $param => $value) {
            $stmt->bindValue(":$param", $value);
        }
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        // Ejecuta la consulta
        return $stmt->execute();
    }

    public function softDelete($id)
    {
        return $this->toggleStatus(1, "id_supervisor", $id);
    }
    public function remove($id)
    {
        return $this->hardDelete("id_supervisor", $id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0, "id_supervisor", $id);
    }
}
