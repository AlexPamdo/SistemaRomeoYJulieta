<?php

namespace src\Model;

use src\Config\Connection;
use PDO;
use Exception;

class UsuariosModel extends ModeloBase
{
    protected $tabla = "usuarios";

    public function setData($nombre, $apellido, $email, $password, $rol, $img)
    {
        $this->data["nombre"] = $nombre;
        $this->data["apellido"] = $apellido;
        $this->data["email"] = $email;
        $this->data["password"] = $password;
        $this->data["rol"] = $rol;
        $this->data["img"] = $img;
    }

    public function showUsers($value = "", $column = "")
    {
        // Comenzar la consulta SQL
        $sql = "SELECT * FROM $this->tabla";

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
        $query = "INSERT INTO  {$this->tabla} (nombre_usuario, apellido_usuario, gmail_usuario, contraseña_usuario, rol, img_usuario) VALUES (:nombre, :apellido, :gmail, :contrasena, :roles, :img)";

        $stmt = $this->prepare($query);

        $stmt->bindParam(':nombre', $this->data['nombre']);
        $stmt->bindParam(':apellido', $this->data['apellido']);
        $stmt->bindParam(':gmail', $this->data['email']);
        $stmt->bindParam(':contrasena', $this->data['password']);
        $stmt->bindParam(':roles', $this->data['rol']);
        $stmt->bindParam(':img', $this->data['img']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function softDelete($id)
    {
        return $this->toggleStatus(1, "id_usuario", $id);
    }

    public function remove($id)
    {
        return $this->hardDelete("id_usuario", $id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0, "id_usuario", $id);
    }

    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET nombre_usuario = :nombre, apellido_usuario = :apellido, gmail_usuario = :gmail, contraseña_usuario = :contrasena, rol = :roles WHERE id_usuario = :id";

        $stmt = $this->prepare($query);

        $stmt->bindParam(':nombre', $this->data['nombre']);
        $stmt->bindParam(':apellido', $this->data['apellido']);
        $stmt->bindParam(':gmail', $this->data['email']);
        $stmt->bindParam(':contrasena', $this->data['password']);
        $stmt->bindParam(':roles', $this->data['rol']);;
        $stmt->bindParam(':id', $id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function subirImg($id)
    {
        return $this->updateColumn(
            "img_usuario",
            $this->data['img'],
            "id_usuario",
            $id
        );
    }
}
