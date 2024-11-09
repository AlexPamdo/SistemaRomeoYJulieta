<?php

namespace src\Model;

use src\Model\ModeloBase;
use PDO;


class AlmacenModel extends ModeloBase
{
    protected $data = [];
    protected $tabla = "almacen";

    public function setData($nombre, $tipo, $color, $stock, $medida, $precio)
    {
        $this->data = [
            'nombre' => $nombre,
            'tipo' => $tipo,
            'color' => $color,
            'stock' => $stock,
            'medida' => $medida,
            'precio' => $precio
        ];
    }

    public function showMaterials($value = "", $column = "")
    {
        // Comenzar la consulta SQL
        $sql = "SELECT 
                    u.*, 
                    r.tipo_material AS tipo, 
                    c.color AS color_name
                FROM 
                    almacen u
                INNER JOIN 
                    tipos_materiales r ON u.tipo_material = r.id_tipo_material
                INNER JOIN 
                    colores c ON u.color_material = c.id_color";

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




    public function create()
    {
        // Prepara la consulta SQL
        $query = "INSERT INTO {$this->tabla} (nombre_material, tipo_material, color_material, stock, unidad_medida, precio) 
              VALUES (:nombre, :tipo, :color, :stock, :medida, :precio)";

        $stmt = $this->prepare($query);

        $stmt->bindParam(":nombre", $this->data["nombre"]);
        $stmt->bindParam(":tipo", $this->data["tipo"]);
        $stmt->bindParam(":color", $this->data["color"]);
        $stmt->bindParam(":stock", $this->data["stock"]);
        $stmt->bindParam(":medida", $this->data["medida"]);
        $stmt->bindParam(":precio", $this->data["precio"]);


        // Ejecuta la consulta
        return $stmt->execute();
    }

    public function softDelete($id)
    {
        return $this->toggleStatus(1, "id_material", $id);
    }

    public function active($id)
    {
        return $this->toggleStatus(0, "id_material", $id);
    }

    public function remove($id)
    {
        return $this->hardDelete("id_material", $id);
    }

    public function edit($id)
    {
        $query = "UPDATE {$this->tabla}
                  SET nombre_material = :nombre, tipo_material = :tipo, color_material = :color, stock = :stock, unidad_medida = :medida, precio = :precio 
                  WHERE id_material = :id";
        $stmt = $this->prepare($query);
        // Bindea los parámetros usando los datos del array $data
        $stmt->bindParam(':nombre', $this->data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $this->data['tipo'], PDO::PARAM_INT);
        $stmt->bindParam(':color', $this->data['color'], PDO::PARAM_INT);
        $stmt->bindParam(':stock', $this->data['stock'], PDO::PARAM_INT);
        $stmt->bindParam(":medida", $this->data["medida"]);
        $stmt->bindParam(':precio', $this->data['precio'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
