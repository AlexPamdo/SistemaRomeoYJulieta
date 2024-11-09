<?php

namespace src\Model;

use PDO;

class PrendaPatronModel extends ModeloBase
{
    protected $data = [];
    protected $tabla = "prenda_patron";

    public function setData($prenda,$material,$cantiad){
        $this->data = [
            'prenda' => $prenda,
            'material' => $material,
            'cantidad' => $cantiad
        ];
    }

    
    public function viewMaterials($idPrenda)
    {
        $query = "SELECT 
        u.*, 
        n.nombre_material AS material,
        t.tipo_material AS tipo,
        n.stock AS cantidad_Stock
        FROM {$this->tabla} u
        INNER JOIN almacen n ON u.id_material = n.id_material
        INNER JOIN tipos_materiales t ON n.tipo_material = t.id_tipo_material
        WHERE u.id_prenda = :id";

        $stmt = $this->prepare($query);
        $stmt->bindParam(":id", $idPrenda);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO {$this->tabla} (id_prenda, id_material, cantidad) VALUES (:prenda, :material, :cantidad)";
        $stmt = $this->prepare($query);

        $stmt->bindParam(":prenda", $this->data["prenda"]);
        $stmt->bindParam(":material", $this->data["material"]);
        $stmt->bindParam(":cantidad", $this->data["cantidad"]);

        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM {$this->tabla} WHERE id_prenda = :id";
        $stmt = $this->prepare($query);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function edit($id){}
}
