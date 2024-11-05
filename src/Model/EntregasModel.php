<?php

namespace src\Model;

use PDO;

class EntregasModel extends ModeloBase
{
    protected $data = [];
    protected $tabla = "entregas";

    public function setData($fecha,$total)
    {
        $this->data = [
            'fecha' => $fecha,
            'total' => $total,
        ];
    }


    public function viewEntregas($value = "", $column = "")
    {
        return $this->viewAll($value, $column);
    }


    public function create()
    {
        $query = "INSERT INTO {$this->tabla} (fecha_entrega, total_entrega) VALUES (:fecha, :total)";

        $stmt = $this->prepare($query);

        $stmt->bindParam(":fecha", $this->data["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $this->data["total"], PDO::PARAM_LOB);

        // Ejecuta la consulta
       $stmt->execute();

        return $this->lastInsertId();
   
    }


    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET fecha_entrega = :fecha, total_entrega = :total WHERE id_entrega = :id";

        $stmt = $this->prepare($query);

        $stmt->bindParam(":fecha", $this->data["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $this->data["total"], PDO::PARAM_LOB);

        // Ejecuta la consulta
        return $stmt->execute();
   
    }


    public function softDelete($id)
    {
      return $this->toggleStatus(1,"id_entrega",$id);
    }

    public function remove($id)
    {
       return $this->hardDelete("id_entrega",$id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0,"id_entrega",$id);
    }


}
