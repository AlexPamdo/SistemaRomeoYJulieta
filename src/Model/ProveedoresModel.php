<?php

namespace src\Model;

use PDO;

class ProveedoresModel extends ModeloBase
{
    protected $data = [];
    protected $tabla = "proveedores";

    public function setData($nombre, $rif, $telefono, $gmail, $notas)
    {
        $this->data = [
            'nombre' => $nombre,
            'rif' => $rif,
            'telefono' => $telefono,
            'gmail' => $gmail,
        ];
    }


    public function viewProveedores($value = "", $column = "")
    {
        return $this->viewAll($value, $column);
    }


    public function create()
    {
        $query = "INSERT INTO {$this->tabla} (nombre_proveedor, rif_proveedor, telefono_proveedor, gmail_proveedor, notas_proveedor) VALUES (:nombre, :rif, :telefono, :gmail, :notas)";

        $stmt = $this->prepare($query);

         // Bindea los parámetros usando los datos del array $data
         foreach($this->data as $param => $value){
            $stmt->bindParam(":$param", $value);
        }

        // Ejecuta la consulta
        return $stmt->execute();
   
    }


    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET nombre_proveedor = :nombre, rif_proveedor = :rif, telefono_proveedor = :telefono, gmail_proveedor = :gmail, notas_proveedor = :notas WHERE id_proveedor = :id";

        $stmt = $this->prepare($query);

        // Bindea los parámetros usando los datos del array $data
        foreach($this->data as $param => $value){
            $stmt->bindParam(":$param", $value);
        }

        // Ejecuta la consulta
        return $stmt->execute();
   
    }


    public function softDelete($id)
    {
      return $this->toggleStatus(1,"id_proveedor",$id);
    }

    public function remove($id)
    {
       return $this->hardDelete("id_proveedor",$id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0,"id_proveedor",$id);
    }


}
