<?php

include_once("config/conexion.php");

class CatalogoModel
{
    private $descripcion;
    private $precio;
    private $grupo;
    private $detalles;

    private $table = "catalogo";
    private $conn;


    public function __construct()
    {

        $db = new connection();
        $this->conn = $db->getConnection();
    }

    public function setAtributes($descripcion, $precio, $grupo, $detalles)
    {
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->grupo = $grupo;
        $this->detalles = $detalles;
    }


    public function viewAll()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE eliminado = 0";
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO $this->table (desc_catalogo,precio_catalogo,grupo_catalogo,detalles_catalogo,eliminado) VALUES (:descr,:precio,:grupo,:detalles,0)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":descr", $this->descripcion);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":detalles", $this->detalles);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "UPDATE $this->table SET eliminado = 1 WHERE id_catalogo = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function selectLastId()
    {
        $query = "SELECT MAX(id_catalogo) as max_id FROM $this->table";
        $consult = $this->conn->query($query);
        $result = $consult->fetch(PDO::FETCH_ASSOC);

        $lastId = $result['max_id'];

        if ($lastId) {
            return $lastId;
        } else {
            return false;
        }
    }


    public function insertImg($idCatalogo, $ruta)
    {
        $query = "INSERT INTO imagenes_catalogo (id_catalogo,img_ruta) VALUES (:catalogo, :ruta)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":catalogo", $idCatalogo);
        $stmt->bindParam(":ruta", $ruta);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
