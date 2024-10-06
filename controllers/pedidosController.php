<?php

function render()
{
    include_once("views/pedidos.php");
}

include_once "model/pedidosModel.php";
include_once "model/almacenModel.php";

class crearPedido
{
    public function create()
    {
        $pedido = new pedidos();
        $almacen = new material();

        if (!empty($_POST["btnCrear"])) {



            $pedido->setProveedor($_POST["id_proveedor"]);

            $pedido->setFecha_pedido(date('Y-m-d H:i:s'));
            $pedido->setFecha_estimada($_POST["fecha_estimada"]);
            $pedido->setFecha_real(null);

            $pedido->setEstado(false);

            $pedido->setOrden($_POST["id_orden_pedido"]);
            $pedido->setCantidad($_POST["cantidad_pedido"]);

            $pedido->setPago(3);

            $pedido->setUsuario($_SESSION["id_user"]);
            $pedido->setTotal($_POST["total_pedido"]);



            if ($pedido->create() && $almacen->updateStock($_POST["id_orden_pedido"], $_POST["cantidad_pedido"])) {
                header("Location: index.php?page=pedidos&succes=1");
            } else {
                header("Location: index.php?page=pedidos&error=1");
            }
        }
        include_once "views/pedidos/crear.php";
    }
}

class eliminarpedido
{
    public function eliminar()
    {
        $pedido = new pedidos();

        if (!empty($_GET["btnDelete"])) {

            $id = ($_GET["id"]);

            if ($pedido->delete($id)) {
                header("Location: index.php?page=pedidos&succes=2");
            } else {
                echo "<div class=' alert alert-danger'> Erro al eliminar Empleado</div> ";
            }
        }
    }
}


class editpedido
{
    public function edit()
    {
        $pedido = new pedidos();
        $almacen = new material();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            switch ($_POST["btnUpdate"]) {
                case "edit":
                    $pedido->setProveedor($_POST["id_proveedor"]);
                    $pedido->setFecha_pedido($_POST["fecha_pedido"]);
                    $pedido->setFecha_estimada($_POST["fecha_estimada"]);
                    $pedido->setFecha_real($_POST["fecha_real"]);
                    $pedido->setEstado($_POST["estado_pedido"]);
                    $pedido->setOrden($_POST["id_orden_pedido"]);
                    $pedido->setCantidad($_POST["cantidad_pedido"]);
                    $pedido->setPago($_POST["id_metodo_pago"]);
                    $pedido->setUsuario($_POST["id_usuario"]);
                    $pedido->setTotal($_POST["total_pedido"]);


                    if ($pedido->edit($id) && $almacen->updateStock(7, 10)) {
                        header("Location: index.php?page=pedidos&succes=3");
                        exit;
                    } else {
                        header("Location: index.php?page=pedidos&error=3");
                    }
                    break;

                case "close":
                    header("Location: index.php?page=pedidos");
                    exit;
            }
        }
        include_once "views/pedidos/editar.php";
    }
}

class updatePedido
{
    public function update()
    {

        $pedido = new pedidos();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            if ($_POST["btnUpdate"] == "actualizar") {

                $pago = ($_POST["pago"]);

                if ($pago >= $_POST["total_pedido"]) {

                    $pedido->setEstado(true);

                    $pedido->setFecha_real(date('Y-m-d H:i:s'));

                    $pedido->setPago($_POST["id_metodo_pago"]);

                    $pedido->setTotal($_POST["total_pedido"]);

                    if ($pedido->update($id)) {
                        header("Location: index.php?page=pedidos&succes=4");
                        exit;
                    } else {
                        header("Location: index.php?page=pedidos&error=4");
                    }
                } else {
                    header("Location: index.php?page=pedidos&error=montoInsuficiente");
                }
            } else {
                header("Location: index.php?page=pedidos&error=errorAlLeerBoton");
            }
        }
        include_once "views/pedidos/actualizar.php";
    }
}