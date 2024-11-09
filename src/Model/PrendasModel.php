<?php

namespace src\Model;

use PDO;

class PrendasModel extends ModeloBase

{


    protected $data = [];
    protected $tabla = "prendas";


    public function viewPrendas($value = "", $column = "", $stock = "")
    {

        $sql = "SELECT 
        u.*, 
        p.nombre AS categoria, 
        l.coleccion AS coleccion,
        t.cm AS talla
    FROM {$this->tabla} u
    INNER JOIN 
        categorias_prenda p ON u.id_categoria = p.id_categoria
    INNER JOIN 
        colecciones_prenda l ON u.id_coleccion = l.id_coleccion
    INNER JOIN 
        tallas t ON u.id_talla = t.id_talla";

        // Agregar condición si se proporciona un valor y columna
        if ($value !== "" && $column !== "") {
            // Asegurarse de que la columna sea válida (esto es importante para prevenir SQL Injection)
            $sql .= " WHERE u.$column = :value";

            // Agregar condición si se proporciona stock
            if ($stock === "") {
                $sql.= " AND stock > 0";
            }if( $stock === 0) {
                $sql.= " AND stock <= 0";
            }
        }

        // Preparar la consulta
        $stmt = $this->prepare($sql);

        // Bindea el parámetro solo si se proporciona un valor
        if ($value !== "") {
            $stmt->bindParam(":value", $value);
        }

        // Ejecutar la consulta
        $stmt->execute();

        // Retornar los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function setData($img, $nombre, $genero, $categoria, $talla, $coleccion, $cant,  $precio)
    {
        $this->data = [
            'imagen' => $img,
            'nombre' => trim($nombre),
            'genero' => $genero,
            'categoria' => (int)$categoria,
            'stock' => (int)$cant,
            'coleccion' => (int)$coleccion,
            'talla' => (int)$talla,
            'precio' => (int)$precio
        ];
    }

    public function create()
    {
        $query = "INSERT INTO {$this->tabla} (img_prenda, nombre_prenda, genero, id_categoria, stock, id_coleccion, id_talla, precio_unitario) VALUES (:img, :nombre, :genero, :categoria, :stock, :coleccion, :talla, :precio)";

        $stmt = $this->prepare($query);

        $stmt->bindParam(":img", $this->data["imagen"]);
        $stmt->bindParam(":nombre", $this->data["nombre"]);
        $stmt->bindParam(":genero", $this->data["genero"]);
        $stmt->bindParam(":categoria", $this->data["categoria"]);
        $stmt->bindParam(":stock", $this->data["stock"]);
        $stmt->bindParam(":coleccion", $this->data["coleccion"]);
        $stmt->bindParam(":talla", $this->data["talla"]);
        $stmt->bindParam(":precio", $this->data["precio"]);


       if($stmt->execute()){
        return $this->lastInsertId();
       }else{
        return false;
       }
    }




    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET nombre_prenda = :nombre, id_categoria = :categoria, stock = :stock, id_coleccion = :coleccion, id_talla = :talla, id_genero = :genero, precio_unitario = :precio WHERE id_prenda = :id";

        $stmt = $this->prepare($query);

        foreach ($this->data as $param => $value) {
            $stmt->bindParam(":$param", $value);
        }

        return $stmt->execute();
    }


    public function softDelete($id)
    {
        return $this->toggleStatus(1, "id_prenda", $id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0, "id_prenda", $id);
    }

    public function remove($id)
    {
        return $this->hardDelete("id_prenda", $id);
    }
}
