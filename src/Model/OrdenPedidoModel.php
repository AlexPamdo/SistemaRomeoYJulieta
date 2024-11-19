<?php

namespace src\Model;

use PDO;
use PDOException;

class OrdenPedidoModel extends ModeloBase
{

    protected $data = [];
    protected $tabla = "orden_pedido";

    public function setData($pedido, $material, $cantidad)
    {
        $this->data = [
            'pedido' => (int)$pedido,
            'material' => (int)$material,
            'cantidad' => (int)$cantidad,
        ];
    }

    public function viewMaterials($value = "", $column = "")
    {
        $sql = "SELECT 
        u.*, 
        n.nombre_material AS material,
        t.tipo_material AS tipo,
        c.color AS color,
        n.stock AS cantidad_Stock
        FROM {$this->tabla} u
        INNER JOIN almacen n ON u.id_material = n.id_material
        INNER JOIN tipos_materiales t ON n.tipo_material = t.id_tipo_material
        INNER JOIN colores c ON n.color_material = c.id_color";

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
    $query = "INSERT INTO {$this->tabla} (id_pedido, id_material, cantidad_material) VALUES (:pedido, :material, :cantidad)";
    $stmt = $this->prepare($query);

    // Bind de parámetros con depuración
    $stmt->bindParam(":pedido", $this->data["pedido"],PDO::PARAM_INT);
    $stmt->bindParam(":material", $this->data["material"],PDO::PARAM_INT);
    $stmt->bindParam(":cantidad", $this->data["cantidad"],PDO::PARAM_INT);

    try {
        if ($stmt->execute()) {
            return true;
        } else {
            // Captura de errores específicos si falla el execute
            $errorInfo = $stmt->errorInfo();
            echo "Error en la ejecución de la consulta. SQLSTATE: {$errorInfo[0]}, Código de Error: {$errorInfo[1]}, Mensaje: {$errorInfo[2]}\n";
            return false;
        }
    } catch (PDOException $e) {
        // Manejo de excepciones
        echo "Excepción capturada: " . $e->getMessage() . "\n";
        return false;
    }
}

  public function edit($id){}
}
