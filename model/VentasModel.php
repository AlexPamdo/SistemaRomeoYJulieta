<?php

class VentasModel{
    private $fecha;
    private $cliente;
    private $tipoVenta;
    private $tipoPago;
    private $monto;

    private $table = "orden_venta";
    
    private $conn;

    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }


    public function getDbConnection()
    {
        return $this->conn;
    }

    
    public function selectLastId()
    {
        $query = "SELECT MAX(id_venta) as max_id FROM $this->table";
        $consult = $this->conn->query($query);
        $result = $consult->fetch(PDO::FETCH_ASSOC);

        $lastId = $result['max_id'];

        if ($lastId) {
            return $lastId;
        } else {
            return false;
        }
    }

    public function create(){

    }


    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function setTipoVenta($tipoVenta){   
        $this->tipoVenta = $tipoVenta;
    }
    public function getTipoVenta(){
        return $this->tipoVenta;
    }
    public function setTipoPago($tipoPago){
            $this->tipoPago = $tipoPago;
    }
    public function getTipoPago(){
        return $this->tipoPago;
    }
    public function setMonto($monto){
        $this->monto = $monto;  
    }
    public function getMonto(){
        return $this->monto;
    }
     

}

