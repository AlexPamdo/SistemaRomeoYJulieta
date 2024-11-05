<?php

namespace src\Model;

use PDO;

class LoginModel extends ModeloBase
{

    protected $tabla = "usuarios";
    protected $data = [];

    public function setData($gmail, $contrasena)
    {
        $this->data = [
            "gmail" => $gmail,
            "contrasena" => $contrasena,
        ];
    }

    public function login()
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE gmail_usuario = :gmail AND contrasena_usuario = :contrasena";
        $stmt = $this->prepare($sql);

        $stmt->bindParam(':gmail', $this->data["gmail"]);
        $stmt->bindParam(':contrasena', $this->data["contrasena"]);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                // Usuario autenticado correctamente
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                // No se encontró ningún usuario con las credenciales proporcionadas
                return false;
            }
        } else {
            return false;
        }
    }

    public function create(){}
    public function edit($id){}
}
