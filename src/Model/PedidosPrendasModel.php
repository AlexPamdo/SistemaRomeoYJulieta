<?php

namespace src\Model;

use PDO;
use Exception;

class PedidosPrendasModel extends ModeloBase
{
    protected $data = [];
    protected $tabla = "Pedidos_prendas";

    public function setData($desc, $fecha, $fecha_estimada)
    {
        $this->data = [
            'desc_pedido_prenda' => $desc,
            'fecha' => $fecha,
            'fecha_estimada' => $fecha_estimada,
        ];
    }


    public function viewEntregas($value = "", $column = "")
    {
        return $this->viewAll($value, $column);
    }


    public function create()
    {
        try {
            $query = "INSERT INTO {$this->tabla} (desc_pedido_prenda, fecha_pedido_prenda, fecha_estimada) VALUES (:desc_pedido_prenda, :fecha, :fecha_estimada)";

            $stmt = $this->prepare($query);

            $stmt->bindParam(":desc_pedido_prenda", $this->data["desc_pedido_prenda"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $this->data["fecha"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_estimada", $this->data["fecha_estimada"], PDO::PARAM_LOB);

            // Ejecuta la consulta
            if ($stmt->execute()) {
                return $this->lastInsertId();
            } else {
                $errorInfo = $stmt->errorInfo();
                throw new Exception("Error en la ejecución: {$errorInfo[2]}");
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET fecha_pedido_prenda = :fecha, fecha_estimada = :fecha_estimada WHERE id_pedido_prenda = :id";

        $stmt = $this->prepare($query);

        $stmt->bindParam(":fecha", $this->data["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_estimada", $this->data["fecha_estimada"], PDO::PARAM_LOB);

        // Ejecuta la consulta
        return $stmt->execute();
    }


    public function softDelete($id)
    {
        return $this->toggleStatus(1, "id_pedido_prenda", $id);
    }

    public function remove($id)
    {
        return $this->hardDelete("id_pedido_prenda", $id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0, "id_pedido_prenda", $id);
    }
}
