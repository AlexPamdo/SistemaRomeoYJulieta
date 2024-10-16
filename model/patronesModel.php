<?php

include_once("config/conexion.php");

class patrones
{
    //atributos
    private $id;
    private $prenda;
    private $material;
    private $cantidad;
    private $costo;

    private $conn;
    private $table = "patrones";


    public function setAtribute($atribute, $valor)
    {
        switch ($atribute) {
            case "prenda":
                $this->prenda = $valor;
                break;
            case "material":
                $this->material = $valor;
                break;
            case "cantidad":
                $this->cantidad = $valor;
                break;
        }
    }




    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function getDbConnection(){
        $database = new connection;
        $this->conn = $database->getConnection();
        return $this->conn;
    }

    public function addMaterials($material, $cantidad){
        $this->material = $material;
    }


    public function viewAll()
    {
        $query = "SELECT 
        u.*,
        i.img_prenda AS img
        FROM " .  $this->table . " u
        INNER JOIN prendas i ON u.id_patron = i.id_prenda";

        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function selectLastId(){
        $query = "SELECT MAX(id_patron) as max_id FROM patrones";
        $consult = $this->conn->query($query);
        $result = $consult->fetch(PDO::FETCH_ASSOC);

        $lastId = $result['max_id'];

        if($lastId){
            return $lastId;
        }else{
            return false;
        }

    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nombre_patron, costo_unitario) VALUES (:prenda, :costo)";
    
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':prenda', $this->prenda);
        $stmt->bindParam(':costo', $this->costo);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function edit($id)
{
    $query = "UPDATE " . $this->table . " SET nombre_patron = :prenda, id_material = :material, cantidad_material = :cantidad, costo_unitario = :costo WHERE id_patron = :id";

    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':prenda', $this->prenda);
    $stmt->bindParam(':material', $this->material);
    $stmt->bindParam(':cantidad', $this->cantidad);
    $stmt->bindParam(':costo', $this->costo);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

    

    public function delete($id)
    {
        $query = "UPDATE $this->table SET eliminado = 1 WHERE id_patron = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }


    public function setPrecio($material, $cantidad)
    {
        // Utilizamos una consulta preparada para evitar la inyección SQL
        $query = "SELECT precio FROM almacen WHERE id_material = :material";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':material', $material, PDO::PARAM_INT);

        // Ejecutamos la consulta preparada
        if ($stmt->execute()) {
            // Obtener el precio del almacenamiento como un solo valor
            $precio = $stmt->fetchColumn();

            // Verificar si se obtuvo un precio válido
            if ($precio !== false) {
                // Calcular el costo total multiplicando el precio unitario por la cantidad
                $this->costo = $precio * $cantidad;
            } else {
                // Manejar el caso en el que no se encuentre el precio
                throw new Exception("No se encontró precio para el material con ID $material");
            }
        } else {
            // Manejar errores de ejecución de la consulta
            throw new Exception("Error al ejecutar la consulta");
        }
    }

    public function setCost($costo){
        $this->costo = $costo;
    }

    public function getPrecio($material, $cantidad)
    {
        // Utilizamos una consulta preparada para evitar la inyección SQL
        $query = "SELECT precio FROM almacen WHERE id_material = :material";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':material', $material, PDO::PARAM_INT);

        // Ejecutamos la consulta preparada
        if ($stmt->execute()) {
            // Obtener el precio del almacenamiento como un solo valor
            $precio = $stmt->fetchColumn();

            // Verificar si se obtuvo un precio válido
            if ($precio !== false) {
                // Calcular el costo total multiplicando el precio unitario por la cantidad
                return $precio * $cantidad;
            } else {
                // Manejar el caso en el que no se encuentre el precio
                throw new Exception("No se encontró precio para el material con ID $material");
            }
        } else {
            // Manejar errores de ejecución de la consulta
            throw new Exception("Error al ejecutar la consulta");
        }
    }
}

