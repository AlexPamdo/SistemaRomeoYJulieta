<?php

namespace src\Model;

use PDO;
use PDOException;

class OrdenConfeccionModel extends ModeloBase
{

    protected $data = [];
    protected $tabla = "orden_confeccion";

    public function setData($confeccion, $prenda, $cantidad)
    {
        $this->data = [
            'confeccion' => (int)$confeccion,
            'prenda' => (int)$prenda,
            'cantidad' => (int)$cantidad,
        ];
    }

    public function viewPrendas($value = "", $column = "")
    {

        $sql = "SELECT u.*, 
        p.nombre_prenda AS prenda,
        l.coleccion AS coleccion,
        t.cm AS talla
        FROM {$this->tabla} u
        INNER JOIN prendas p ON u.id_prenda = p.id_prenda
        INNER JOIN colecciones_prenda l ON p.id_coleccion = l.id_coleccion
        INNER JOIN tallas t ON p.id_talla = t.id_talla";


        // Agregar condición si se proporciona un valor y columna
        if ($value !== "" && $column !== "") {
            // Asegurarse de que la columna sea válida (esto es importante para prevenir SQL Injection)
            $sql .= " WHERE U.$column = :value";
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
    $query = "INSERT INTO {$this->tabla} (id_confeccion, id_prenda, cantidad) VALUES (:confeccion, :prenda, :cantidad)";
    $stmt = $this->prepare($query);

    // Bind de parámetros con depuración
    $stmt->bindParam(":confeccion", $this->data["confeccion"],PDO::PARAM_INT);
    $stmt->bindParam(":prenda", $this->data["prenda"],PDO::PARAM_INT);
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
