<?php

include_once("config/conexion.php");

class pedidos
{
    private $id;


    private $proveedor;
    private $fecha_pedido;
    private $fecha_estimada;
    private $fecha_real;
    private $estado;
    private $orden;
    private $cantidad;
    private $pago;
    private $usuario;
    private $total;

    private $conn;
    private $table = "pedidos";



    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll()
    {
        $query = "SELECT 
        u.*, 
        p.nombre_proveedor AS id_proveedor, 
        m.nombre_material AS id_orden_pedido,
        t.metodo_pago AS id_metodo_pago,
        s.nombre_usuario AS id_usuario
    FROM 
        " . $this->table . " u
    INNER JOIN 
        proveedores p ON u.id_proveedor = p.id_proveedor
    INNER JOIN 
        almacen m ON u.id_orden_pedido = m.id_material
    INNER JOIN 
        metodo_pago t ON u.id_metodo_pago = t.id_metodo_pago
    INNER JOIN 
        usuarios s ON u.id_usuario = s.id_usuario;";

        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_pedido = " . $id;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    //Recordatorio que sustituimos el campo de id_orden_pedido temporalmente para la mañana, 
    //Recordatorio 2: agregue la parte de cantidad para subir el stock, hay q quitarlo luego

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (id_proveedor,fecha_pedido,fecha_estimada,fecha_real,estado_pedido,id_orden_pedido,cantidad_pedido,id_metodo_pago,id_usuario,total_pedido) VALUES('" . $this->proveedor . "','" . $this->fecha_pedido . "','" . $this->fecha_estimada . "','" .  $this->fecha_real . "','" . $this->estado . "','" . $this->orden . "','" . $this->cantidad . "','" . $this->pago . "','" . $this->usuario . "','" . $this->total . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_pedido = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET id_proveedor = '" . $this->proveedor . "', fecha_pedido = '" . $this->fecha_pedido . "',  fecha_estimada = '" . $this->fecha_estimada . "',  fecha_real = '" . $this->fecha_real . "', estado_pedido = '" . $this->estado . "', id_orden_pedido = '" . $this->orden . "', cantidad_pedido = '" . $this->cantidad . "', id_metodo_pago = '"  . $this->pago .  "', id_usuario = '"  . $this->usuario . "', total_pedido = '"  . $this->total . "' WHERE id_pedido = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $query = "UPDATE " . $this->table . " SET fecha_real = '" . $this->fecha_real . "', estado_pedido = '" . $this->estado . "', id_metodo_pago = '" . $this->pago . "' WHERE id_pedido = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }
    public function getProveedor()
    {
        return $this->proveedor;
    }
    public function setFecha_pedido($fecha_pedido)
    {
        $this->fecha_pedido = $fecha_pedido;
    }
    public function getFecha_pedido()
    {
        return $this->fecha_pedido;
    }
    public function setFecha_estimada($fecha_estimada)
    {
        $this->fecha_estimada = $fecha_estimada;
    }
    public function getFecha_estimada()
    {
        return $this->fecha_estimada;
    }
    public function setFecha_real($fecha_real)
    {
        $this->fecha_real = $fecha_real;
    }
    public function getFecha_real()
    {
        return $this->fecha_real;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setOrden($orden)
    {
        $this->orden = $orden;
    }
    public function getOrden()
    {
        return $this->orden;
    }

    public function setcantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function getcantidad()
    {
        return $this->cantidad;
    }

    public function setpago($pago)
    {
        $this->pago = $pago;
    }
    public function getpago()
    {
        return $this->pago;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function getTotal()
    {
        return $this->total;
    }
}