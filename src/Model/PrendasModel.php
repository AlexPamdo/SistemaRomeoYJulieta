<?php

namespace src\Model;

use src\Config\Connection;
use PDO;

class PrendasModel extends ModeloBase

{


    protected $data = [];
    protected $tabla = "prendas";


    public function viewPrendas($value = "", $column = "")
    {

        $sql = "SELECT 
        u.*, 
        p.nombre AS id_categoria, 
        c.color AS id_color,
        l.coleccion AS id_coleccion,
        t.cm AS id_talla,
        g.genero AS id_genero
    FROM {$this->tabla} u
    INNER JOIN 
        categorias_prenda p ON u.id_categoria = p.id_categoria
    INNER JOIN 
        colores c ON u.id_color = c.id_color
    INNER JOIN 
        colecciones_prenda l ON u.id_coleccion = l.id_coleccion
    INNER JOIN 
        tallas t ON u.id_talla = t.id_talla
    INNER JOIN
        generos_prenda g on u.id_genero = g.id_genero";

        // Agregar condición si se proporciona un valor y columna
        if ($value !== "" && $column !== "") {
            // Asegurarse de que la columna sea válida (esto es importante para prevenir SQL Injection)
            $sql .= " WHERE u.$column = :value";
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
    public function setData($img, $nombre, $patron, $categoria, $talla, $coleccion, $color, $cant, $genero, $precio)
    {
        $this->data = [
            'imagen' => $img,
            'nombre' => $nombre,
            'patron' => $patron,
            'categoria' => $categoria,
            'color' => $color,
            'stock' => $cant,
            'coleccion' => $coleccion,
            'talla' => $talla,
            'genero' => $genero,
            'precio' => $precio
        ];
    }

    public function create()
    {
        $query = "INSERT INTO {$this->tabla} (img_prenda, nombre_prenda, patron_prenda, id_categoria, id_color, stock, id_coleccion, id_talla, id_genero, precio_unitario) VALUES (:img, :nombre, :patron, :categoria, :color, :stock, :coleccion, :talla, :genero, :precio)";

        $stmt = $this->prepare($query);

        foreach($this->data as $param => $value){
            $stmt->bindParam(":$param", $value);
        }

        return $stmt->execute();
    }




    public function edit($id)
    {
        $query = "UPDATE {$this->tabla} SET nombre_prenda = :nombre, id_categoria = :categoria, id_color = :color, stock = :stock, id_coleccion = :coleccion, id_talla = :talla, id_genero = :genero, precio_unitario = :precio WHERE id_prenda = :id";

        $stmt = $this->prepare($query);

        foreach($this->data as $param => $value){
            $stmt->bindParam(":$param", $value);
        }
       
        return $stmt->execute();
    }


    public function softDelete($id)
    {
        return $this->toggleStatus(1,"id_prenda",$id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0,"id_prenda",$id);
    }

    public function remove($id)
    {
        return $this->hardDelete("id_prenda",$id);
    }

}
