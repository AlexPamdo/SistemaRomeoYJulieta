<?php

include_once("config/conexion.php");

class patronMaterial
{

    private $patron;
    private $material;
    private $cantidad;

    private $conn;
    private $table = "patron_material";

    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function setAtributes($patron, $material, $cantiadad)
    {
        $this->patron = $patron;
        $this->material = $material;
        $this->cantidad = $cantiadad;
    }

    /**
     * Busca materiales por id del patron.
     *
     * @param string $busqueda El término de búsqueda para filtrar los usuarios.
     * @return array|false Un array asociativo con los datos de los usuarios y sus roles que coinciden con la búsqueda, false en caso contrario.
     */
    public function viewMaterials($idPatron)
    {
        $query = "SELECT 
        u.*, 
        n.nombre_material AS material,
        t.tipo_material AS tipo,
        c.color AS color,
        n.stock AS cantidad_Stock
        FROM " . $this->table . " u
        INNER JOIN almacen n ON u.id_material = n.id_material
        INNER JOIN tipos_materiales t ON n.tipo_material = t.id_tipo_material
        INNER JOIN colores_materiales c ON n.color_material = c.id_color
        WHERE u.id_patron = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $idPatron);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function getDatosPatron($idPatron)
    {
        // Sanitizar el input para prevenir inyecciones SQL
        $idPatron = intval($idPatron);
        $query = "SELECT * FROM " . $this->table . " WHERE id_patron = " . $idPatron;
        $result = $this->conn->query($query);

        if ($result) {
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data ?: null; // Devolver null si no se encuentra ningún registro
        } else {
            return null; // Manejar el caso cuando la consulta falla
        }
    }



    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (id_patron, id_material, cantidad) VALUES (:patron, :material, :cantidad)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':patron', $this->patron);
        $stmt->bindParam(':material', $this->material);
        $stmt->bindParam(':cantidad', $this->cantidad);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
}
