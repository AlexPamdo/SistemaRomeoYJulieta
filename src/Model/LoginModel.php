<?php



namespace src\Model;

use src\Config\Connection;

use PDO;
use PDOException;
use Exception;

class LoginModel
{

    private $gmail;
    private $contrasena;
    private $tabla = "usuarios";

    private $conn;

    public function __construct()
    {
        $database = new Connection();
        $this->conn = $database->getConnection();
    }

    public function login()
    {
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE gmail_usuario = :gmail AND contraseña_usuario = :contrasena";
    
            $stmt = $this->conn->prepare($sql);
    
            $stmt->bindParam(':gmail', $this->gmail);
            // Cambiar ':contraseña' por ':contrasena' para que coincidan
            $stmt->bindParam(':contrasena', $this->contrasena);
    
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    // Usuario autenticado correctamente
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    // No se encontró ningún usuario con las credenciales proporcionadas
                    return false;
                }
            } else {
                throw new Exception('Error al Verificar el correo' . $this->gmail . " " . $this->contrasena);
            }
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
    




    public function setGmail($gmail)
    {
        $this->gmail = $gmail;
    }
    public function setContraseña($contraseña)
    {
        $this->contrasena = $contraseña;
    }
}
