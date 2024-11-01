<?php

namespace src\Model;

use src\Config\Database;
use Exception;
use PDO;

abstract class ModeloBase extends Database
{
    protected  $tabla;
    protected $data;

    public function viewAll($value = "", $column = "")
    {
        try {
            $sql = "SELECT * FROM {$this->tabla}";
            if ($value) {
                $sql .= " WHERE $column = $value";
            }
            $stmt = $this->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Error:" . $e->getMessage();
            return [];
        }
    }
    public function updateColumn($column, $value, $columnCondition, $condition)
    {
        $stmt = $this->prepare("UPDATE {$this->tabla} SET $column = $value WHERE $columnCondition = :condition");
        $stmt->bindParam(':condition', $condition);

        if ($stmt->execute()) {
            return true;
        } else {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Error al eliminar: " . $errorInfo[2]);
        }
    }

    public function showColumn($column, $condition, $id)
    {
        $stmt = $this->prepare("SELECT $column FROM {$this->tabla} WHERE $condition = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function hardDelete($condition,$id){
        $stmt = $this->prepare("DELETE FROM {$this->tabla} WHERE $condition = :id");
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Error al eliminar: " . $errorInfo[2]);
        }
    }
    public function toggleStatus($status,$condition, $id)
    {
        $stmt = $this->prepare("UPDATE {$this->tabla} SET eliminado = $status WHERE $condition = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->rowCount() > 0; // Verifica si alguna fila fue afectada
        } else {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Error al eliminar: " . $errorInfo[2]);
        }
    }

    abstract public function create();
    abstract public function edit($id);
}
