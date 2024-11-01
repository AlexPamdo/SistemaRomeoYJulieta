<?php

use src\Model\AlmacenModel;
use src\Model\CatalogoModel;
use src\Model\ClientesModel;
use src\Model\ConfeccionesModel;
use src\Model\EmpleadosModel;
use src\Model\PatronesModel;
use src\Model\PedidosModel;
use src\Model\PrendasModel;
use src\Model\ProveedoresModel;
use src\Model\UsuariosModel;

require_once("Templates/Head.php");
?>

<title>Dashboard</title>
</head>

<body class="bg-light">

    <main class="d-flex">

        <!-- Barra lateral -->
        <?php
        include("src/Views/Templates/Header.php");
        ?>

        <div id="main-content" class="flex-grow-1">
            <!-- Header de la página -->
            <header class="bg-dark p-3 d-flex justify-content-between align-items-center border-bottom text-white">

                <div>

                    <h1 class="h4">Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                        </svg>
                        <h3 class="ms-3">Dashboard</h3>
                    </div>
                </div>

                <!-- Menú desplegable del perfil -->
                <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
            </header>

            <!-- Contenido principal -->
            <div class="container mt-4 p-4">

                <!-- Primer Contenedor -->
                <div class="row g-3">

                    <div class="row p-3 m-2">
                        <!-- Dashboard Card 1 -->
                        <div class="col-lg-4 col-md-6 ">
                            <div class="card card-dashboard-rj mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=catalogo" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16" class="bi bi-book">
                        <path d="M1 2.828c.885-.37 2.094-.708 3.5-.708 1.406 0 2.615.338 3.5.708C8.385 2.458 9.594 2.12 11 2.12c1.406 0 2.615.338 3.5.708V13.88c-.885.37-2.094.708-3.5.708-1.406 0-2.615-.338-3.5-.708-1.385.37-2.594.708-4 .708-1.406 0-2.615-.338-3.5-.708V2.828zM2 3.6v9.4c.805.345 1.934.6 3.5.6s2.695-.255 3.5-.6V3.6c-.805-.345-1.934-.6-3.5-.6s-2.695.255-3.5.6zm8 0v9.4c.805.345 1.934.6 3.5.6s2.695-.255 3.5-.6V3.6c-.805-.345-1.934-.6-3.5-.6s-2.695.255-3.5.6z"/>
                    </svg>
                                            <h5 class="ms-3">Catálogo</h5>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0">Total de Productos Registrados</p>

                                            <?php
                                            $catalogoModel = new CatalogoModel();
                                            ?>
                                            <h4 class="mb-0"><?php echo $catalogoModel->totalCount() ?></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Dashboard Card 2 -->
                        <div class="col-lg-4 col-md-6 ">
                            <div class="card card-dashboard-rj mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=almacen" class="text-decoration-none text-blue-rj ">
                                        <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16" class="bi bi-box">
                        <path d="M2.49 6.617l5.392-3.78 5.393 3.78-.665.517H3.154l-.665-.517z"/>
                        <path d="M6.055 1.772a1 1 0 0 1 1.42-.337l5.392 3.78a1 1 0 0 1 .38 1.04l-1.484 5.936A1 1 0 0 1 10.856 13H5.144a1 1 0 0 1-.907-.75L2.753 6.635a1 1 0 0 1 .38-1.04l5.392-3.78 1.53-1.083zM4 6.24v6.7l6 .002V6.24L8 4.458 4 6.24z"/>
                    </svg>
                                            <h5 class="ms-3">Inventario</h5>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0">Total de Items Registrados</p>

                                            <?php
                                            $almacenModel = new AlmacenModel();
                                            ?>
                                            <h4 class="mb-0"><?php echo $almacenModel->totalCount() ?></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Dashboard Card Clientes -->
                        <div class="col-lg-4 col-md-6 ">
                            <div class="card card-dashboard-rj mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=clientes" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-laughing-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5c0 .501-.164.396-.415.235C6.42 6.629 6.218 6.5 6 6.5s-.42.13-.585.235C5.164 6.896 5 7 5 6.5 5 5.672 5.448 5 6 5s1 .672 1 1.5m5.331 3a1 1 0 0 1 0 1A5 5 0 0 1 8 13a5 5 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5m-1.746-2.765C10.42 6.629 10.218 6.5 10 6.5s-.42.13-.585.235C9.164 6.896 9 7 9 6.5c0-.828.448-1.5 1-1.5s1 .672 1 1.5c0 .501-.164.396-.415.235"/>
</svg>

                                            <h5 class="ms-3">Clientes</h5>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0">Total de Clientes Registrados</p>
                                            <?php
                                            // Carga del modelo de clientes y llamada a la función totalCount() para obtener el total de clientes activos

                                            $clientesModel = new ClientesModel();
                                            ?>
                                            <h4 class="mb-0"><?php echo $clientesModel->totalCount() ?></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Card 4 -->
                    <div class="col-lg-6 col-md-6 ">
                        <div class="card  mb-3">
                            <div class="card-body">
                                <a href="index.php?page=ventas" class="text-decoration-none text-blue-rj">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bxs-file-archive bx-lg'></i>
                                        <h3 class="ms-3">Pedidos</h3>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-between">
                                        <?php
                                        $pedidosModel = new PedidosModel();
                                        $pedidosSinPagar = $pedidosModel->totalCount(0);
                                        $pedidosPagos = $pedidosModel->totalCount(1);
                                        $totalPedidos = $pedidosPagos + $pedidosSinPagar;

                                        ?>

                                        <div>
                                            <p class="mb-0 p-1">Pedidos Totales</p>
                                            <h4 class="mb-0"><?php echo $totalPedidos ?></h4>
                                        </div>

                                        <div>
                                            <p class="mb-0 p-1">Pedidos por Pagar</p>
                                            <h4 class="mb-0"><?php echo $pedidosSinPagar ?></h4>

                                        </div>
                                        <div>
                                            <p class="mb-0 p-1">Pedidos Pagados</p>
                                            <h4 class="mb-0"><?php echo $pedidosPagos ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Card 5 -->
                    <div class="col-lg-6 col-md-6 ">
                        <div class="card  mb-3">
                            <div class="card-body">
                                <a href="index.php?page=envios" class="text-decoration-none text-blue-rj">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bxs-truck bx-lg'></i>
                                        <h3 class="ms-3">Envios</h3>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Envios Programados</p>
                                        <h4 class="mb-0">5</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Card 6 -->
                    <div class="col-lg-12 col-md-6 ">
                        <div class="card mb-3">
                            <div class="card-body">
                                <a href="index.php?page=proveedores" class="text-decoration-none text-blue-rj">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bxs-truck bx-lg'></i>
                                        <h5 class="ms-3">Proveedores</h5>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-around">
                                        <?php
                                        $proveedoresModel = new ProveedoresModel();
                                        $proveedoresActivos = $proveedoresModel->totalCount(0);
                                        $proveedoresInactivos = $proveedoresModel->totalCount(1);
                                        $proveedoresTotales = $proveedoresActivos + $proveedoresInactivos;
                                        ?>
                                        <div>
                                            <p class="mb-0 p-1">Proveedores Totales</p>
                                            <h4 class="mb-0"><?php echo $proveedoresTotales ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0 p-1">Proveedores Activos</p>
                                            <h4 class="mb-0"><?php echo $proveedoresActivos ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0 p-1">Proveedores Inactivos</p>
                                            <h4 class="mb-0"><?php echo $proveedoresInactivos ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjetas adicionales para administradores -->
                    <?php if ($_SESSION['rol'] == 1) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=prendas" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-tshirt bx-lg'></i>
                                            <h5 class="ms-3">Prendas Terminadas</h5>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-around">
                                            <?php
                                            $prendasModel = new PrendasModel();
                                            ?>
                                            <div>
                                                <p class="mb-0 p-1">Prendas Registradas</p>
                                                <h4 class="mb-0"><?php echo $prendasModel->totalCount() ?></h4>
                                            </div>
                                            <div>
                                                <p class="mb-0 p-1">Prendas sin Stock</p>
                                                <h4 class="mb-0"><?php echo $prendasModel->totalNoStock() ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=confecciones" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-cut bx-lg'></i>
                                            <h5 class="ms-3">Confecciones</h5>
                                        </div>
                                        <div class="mt-3">
                                            <?php $confeccionesModel = new ConfeccionesModel() ?>
                                            <div>
                                                <p class="mb-0 p-1">Confecciones Realizadas</p>
                                                <h4 class="mb-0"><?php echo $confeccionesModel->totalCount() ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=patrones" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-ruler bx-lg'></i>
                                            <h5 class="ms-3">Patrones</h5>
                                        </div>
                                        <div class="mt-3">
                                            <?php $patronesModel = new PatronesModel(); ?>
                                            <div>
                                                <p class="mb-0 p-1">Patrones Registrados</p>
                                                <h4 class="mb-0"><?php echo $patronesModel->totalCount() ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=pedidos" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-list-check bx-lg'></i>
                                            <h5 class="ms-3">Pedidos</h5>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0">Pedidos en Proceso</p>
                                            <h4 class="mb-0">8</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=empleados" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-user bx-lg'></i>
                                            <h5 class="ms-3">Empleados</h5>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-around">
                                            <?php $empleadosModel = new EmpleadosModel() ?>
                                            <div>
                                                <p class="mb-0 p-1">Empleados Registrados</p>
                                                <h4 class="mb-0"><?php echo $empleadosModel->totalCount() ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=usuarios" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-user-circle bx-lg'></i>
                                            <h5 class="ms-3">Usuarios</h5>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-around">
                                            <?php $usuariosModel = new UsuariosModel() ?>
                                            <div>
                                                <p class="mb-0 p-1">Usuarios Creados</p>
                                                <h4 class="mb-0"><?php echo ($usuariosModel->totalCountUser(1) + $usuariosModel->totalCountUser(2) ) ?></h4>
                                            </div>
                                            <div>
                                                <p class="mb-0 p-1">Usuarios</p>
                                                <h4 class="mb-0"><?php echo $usuariosModel->totalCountUser(1) ?></h4>
                                            </div>
                                            <div>
                                                <p class="mb-0 p-1">Administradores</p>
                                                <h4 class="mb-0"><?php echo $usuariosModel->totalCountUser(2) ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <!-- Footer -->
            <?php include 'src/Views/Templates/Footer.php'; ?>
        </div>
    </main>


</body>

</html>