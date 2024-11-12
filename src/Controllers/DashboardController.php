<?php

namespace Src\Controllers;

class DashboardController
{
    private $dashboardData = [];    

    public function __construct()
    {

        $modelos = [
            "almacen" => \src\Model\AlmacenModel::class,
            "pedidos" => \src\Model\PedidosProveedoresModel::class,
            "proveedores" => \src\Model\ProveedoresModel::class,
            "prendas" => \src\Model\PrendasModel::class,
            "confecciones" => \src\Model\ConfeccionesModel::class,
            // "patrones" => \src\Model\PatronesModel::class,
            "empleados" => \src\Model\EmpleadosModel::class,
            "usuarios" => \src\Model\UsuariosModel::class
        ];
        

        $data = [];

        foreach ($modelos as $key => $modelClass) {
            $data[$key] = new $modelClass;
        }

        $this->dashboardData = [
            "almacen" => ["active" => 0, "inactive" => 0],
            "pedidos" => ["active" => 0, "inactive" => 0, "pending" => 0, "completed" => 0],
            "proveedores" => ["active" => 0, "inactive" => 0],
            "prendas" => ["active" => 0, "inactive" => 0, "outOfStock" => 0,],
            "confecciones" => ["active" => 0, "inactive" => 0],
            "patrones" => ["active" => 0, "inactive" => 0],
            "empleados" => ["active" => 0, "inactive" => 0],
            "usuarios" => ["active" => 0, "inactive" => 0]
        ];

        // Llenar los valores de `dashboardData` con métodos de cada modelo
        foreach ($this->dashboardData as $key => &$metrics) {
            if (isset($data[$key])) {

                $metrics["active"] = $data[$key]->viewAll(0, "estado");
                $metrics["inactive"] = $data[$key]->viewAll(1, "estado");

                switch ($key) {

                    case "pedidos":
                        $metrics["pending"] = $data[$key]->viewAll(0, "estado_pedido");
                        $metrics["completed"] = $data[$key]->viewAll(1, "estado_pedido");
                        break;
                    case "prendas":
                        $metrics["outOfStock"] = $data[$key]->viewAll(0, "stock");
                        break;
                }
            }
        }
        unset($metrics); // Rompe la referencia

    }


    public function show()
    {
        $dashboardData = $this->dashboardData;
        include_once("src/Views/Dashboard.php");
    }
}
