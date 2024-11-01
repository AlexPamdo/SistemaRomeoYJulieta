<?php

namespace src\Model;

use src\Config\Connection;
use PDO;

class PatronMaterialModel extends ModeloBase
{
    protected $data = [];
    private $table = "patron_material";

    public function setData($patron,$material,$cantiad){
        $this->data = [
            'patron' => $patron,
            'material' => $material,
            'cantidad' => $cantiad
        ];
    }

    
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
        INNER JOIN colores c ON n.color_material = c.id_color
        WHERE u.id_patron = :id";

        $stmt = $this->prepare($query);
        $stmt->bindParam(":id", $idPatron);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (id_patron, id_material, cantidad) VALUES (:patron, :material, :cantidad)";
        $stmt = $this->prepare($query);

        foreach($this->data as $param => $value){
            $stmt->bindParam(":$param", $value);
        }

        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM $this->table WHERE id_patron = :id";
        $stmt = $this->prepare($query);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function edit($id){}
}
