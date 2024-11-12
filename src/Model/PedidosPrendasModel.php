<?php

namespace src\Model;

use PDO;
use Exception;

class PedidosPrendasModel extends ModeloBase
{
    protected $data = [];
    protected $tabla = "Pedidos_prendas";

    public function setData($desc, $fecha, $total)
    {
        $this->data = [
            'desc_pedido_prenda' => $desc,
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
        try {
            $query = "INSERT INTO {$this->tabla} (desc_pedido_prenda, fecha_pedido_prenda, total_pedido_prenda) VALUES (:desc_pedido_prenda, :fecha, :total)";

            $stmt = $this->prepare($query);

            $stmt->bindParam(":desc_pedido_prenda", $this->data["desc_pedido_prenda"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $this->data["fecha"], PDO::PARAM_STR);
            $stmt->bindParam(":total", $this->data["total"], PDO::PARAM_LOB);

            // Ejecuta la consulta
            if ($stmt->execute()) {
                return (int) $this->lastInsertId();
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
        $query = "UPDATE {$this->tabla} SET fecha_pedido_prenda = :fecha, total_pedido_prenda = :total WHERE id_pedido_prenda = :id";

        $stmt = $this->prepare($query);

        $stmt->bindParam(":fecha", $this->data["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":total", $this->data["total"], PDO::PARAM_LOB);

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
