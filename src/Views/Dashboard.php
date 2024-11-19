<?php
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


                    <!-- Dashboard Card 2 -->
                    <div class="col">
                        <div class="card card-dashboard-rj mb-3">
                            <div class="card-body">
                                <a href="index.php?page=almacen" class="text-decoration-none text-blue-rj ">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16" class="bi bi-box">
                                            <path d="M2.49 6.617l5.392-3.78 5.393 3.78-.665.517H3.154l-.665-.517z" />
                                            <path d="M6.055 1.772a1 1 0 0 1 1.42-.337l5.392 3.78a1 1 0 0 1 .38 1.04l-1.484 5.936A1 1 0 0 1 10.856 13H5.144a1 1 0 0 1-.907-.75L2.753 6.635a1 1 0 0 1 .38-1.04l5.392-3.78 1.53-1.083zM4 6.24v6.7l6 .002V6.24L8 4.458 4 6.24z" />
                                        </svg>
                                        <h5 class="ms-3">Inventario</h5>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0 p-1">Total de Items Registrados</p>
                                            <h4 class="mb-0"><?php echo (count($dashboardData["almacen"]["active"]) + count($dashboardData["almacen"]["inactive"]))  ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0 p-1">Total de Items Activos</p>
                                            <h4 class="mb-0"><?php echo count($dashboardData["almacen"]["active"]) ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0 p-1">Total de Items Inactivos</p>
                                            <h4 class="mb-0"><?php echo count($dashboardData["almacen"]["inactive"]) ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Card 4 -->
                    <div class="col">
                        <div class="card card-dashboard-rj mb-3">
                            <div class="card-body">
                                <a href="index.php?page=ventas" class="text-decoration-none text-blue-rj">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bxs-file-archive bx-lg'></i>
                                        <h3 class="ms-3">Pedidos</h3>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0 p-1">Pedidos Totales</p>
                                            <h4 class="mb-0"><?php echo (count($dashboardData["pedidos"]["active"]) + count($dashboardData["pedidos"]["inactive"])) ?></h4>
                                        </div>

                                        <div>
                                            <p class="mb-0 p-1">Pedidos por Pagar</p>
                                            <h4 class="mb-0"><?php echo count($dashboardData["pedidos"]["pending"]) ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0 p-1">Pedidos Pagados</p>
                                            <h4 class="mb-0"><?php echo count($dashboardData["pedidos"]["completed"]) ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Card 6 -->
                    <div class="col-lg-12 col-md-6 ">
                        <div class="card card-dashboard-rj mb-3">
                            <div class="card-body">
                                <a href="index.php?page=proveedores" class="text-decoration-none text-blue-rj">
                                    <div class="d-flex align-items-center">
                                        <i class='bx bxs-truck bx-lg'></i>
                                        <h5 class="ms-3">Proveedores</h5>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-around">
                                        <div>
                                            <p class="mb-0 p-1">Proveedores Totales</p>
                                            <h4 class="mb-0"><?php echo (count($dashboardData["proveedores"]["active"]) + count($dashboardData["proveedores"]["inactive"]))  ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0 p-1">Proveedores Activos</p>
                                            <h4 class="mb-0"><?php echo count($dashboardData["proveedores"]["active"]) ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0 p-1">Proveedores Inactivos</p>
                                            <h4 class="mb-0"><?php echo count($dashboardData["proveedores"]["inactive"]) ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjetas adicionales para administradores -->
                    <?php if ($_SESSION['rol'] == 1) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card card-dashboard-rj mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=prendas" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-tshirt bx-lg'></i>
                                            <h5 class="ms-3">Prendas Terminadas</h5>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-around">
                                            <div>
                                                <p class="mb-0 p-1">Prendas Registradas</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["prendas"]["inactive"]) ?></h4>
                                            </div>
                                            <div>
                                                <p class="mb-0 p-1">Prendas Inactivas</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["prendas"]["active"]) ?></h4>
                                            </div>
                                            <div>
                                                <p class="mb-0 p-1">Prendas sin Stock</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["prendas"]["outOfStock"]) ?></h4>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card card-dashboard-rj mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=confecciones" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-cut bx-lg'></i>
                                            <h5 class="ms-3">Confecciones</h5>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-around">
                                            <div>
                                                <p class="mb-0 p-1">Confecciones Realizadas</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["prendas"]["active"]) ?></h4>
                                            </div>
                                            <div>
                                                <p class="mb-0 p-1">Confecciones Anuladas</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["prendas"]["inactive"]) ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card card-dashboard-rj mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=supervisores" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-user bx-lg'></i>
                                            <h5 class="ms-3">Supervisors</h5>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-around">
                                            <div>
                                                <p class="mb-0 p-1">Supervisors Registrados</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["supervisores"]["active"]) ?></h4>
                                            </div>
                                            <div>
                                                <p class="mb-0 p-1">Supervisors Inactivos</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["supervisores"]["inactive"]) ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="card card-dashboard-rj mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=usuarios" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-user-circle bx-lg'></i>
                                            <h5 class="ms-3">Usuarios</h5>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-around">
                                            <div>
                                                <p class="mb-0 p-1">Usuarios Creados</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["usuarios"]["active"]) ?></h4>
                                            </div>
                                            <div>
                                                <p class="mb-0 p-1">Usuarios Desactivados</p>
                                                <h4 class="mb-0"><?php echo count($dashboardData["usuarios"]["inactive"]) ?></h4>
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