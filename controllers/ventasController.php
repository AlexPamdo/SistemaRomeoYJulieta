<?php

require_once("model/VentasModel.php");
require_once("model/OrdenVentaModel.php");

require_once("interfaces/interface.php");


class ventasController implements crudController
{

    private $ventasModel;
    private $ordenVentaModel;
    
    private $catalogoModel;
    private $conn;

    public function __construct()
    {
        $this->ventasModel = new VentasModel();
        $this->ordenVentaModel = new OrdenVenta();
        $this->catalogoModel = new CatalogoModel();
        $this->conn = $this->ventasModel->getDbConnection();
        
    }


    public function show()
    {
        require_once("views/ventas.php");
    }

    public function create()
    {

        try {

            $this->conn->beginTransaction();

            if (isset($_POST['prenda']) && is_array($_POST['prenda'])) {

                $pedido = $this->ventasModel->selectLastId() + 1 ?: 1; 

                $total = 0;
                foreach ($_POST['prenda'] as $prendas) {
                    if ($prendas['cantidad'] !== '' && $prendas['id_Prenda'] !== "none") {
                        //Vamos sumando el precio de los materiales ingresados
                        $total += $this->catalogoModel->getPrendaPrice($prendas['id_Prenda']) * $prendas['cantidad'];

                        if($total === 0){
                             throw new Exception("Fallo ocurrido al obtener precios");
                        }

                        //y vamos agregando el nuevo stock a dicho material
                        $stock = $this->catalogoModel->getPrendaStock($prendas['id_Prenda']);
                        if ($stock) {
                            $newStock = $prendas['cantidad'] + $stock;
                            $this->catalogoModel->updateStock($prendas['id_Prenda'], $newStock);

                            //Anotar el material en la tabla ordenPedido
                            $this->ordenVentaModel->setAtributes($pedido, $prendas['id_Prenda'], $prendas['cantidad']);
                            if($this->ordenVentaModel->create()){
                               
                            }else{
                                throw new Exception("Error al registrar el material");
                            }       
                        } else {
                            throw new Exception("No se ha encontrado ningun precio del material ingresado VALUES: " .$this->catalogoModel->getPrendaStock($prendas['id_Prenda']));
                        }
                    } else {
                        throw new Exception("No se han ingresado materiales validos para calcular el precio");
                    }
                }
            } else {
                throw new Exception("No se han proporcionado materiales válidos");
            }



            //Registrar la venta en su dicha tabla:
            $this->ventasModel->setCliente($_POST["cliente"]);
            $this->ventasModel->setTipoVenta($_POST["tipoVenta"]);
            $this->ventasModel->setFecha($_POST["fecha"]);
            $this->ventasModel->setTipoPago($_POST["tipoPago"]);
            $this->ventasModel->setMonto($_POST["monto"]);

            if ($this->ventasModel->create()) {
            } else {
                throw new Exception("Error al Registrar la venta");
            }
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo "Error:" . $e->getMessage();
        }
    }
    public function delete() {}
    public function edit() {}
}
