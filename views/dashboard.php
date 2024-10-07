<?php
require_once("templates/head.php");
?>

    <title>Dashboard</title>    
</head>

<body class="bg-light">

    <main  class="d-flex">

        <!-- Barra lateral -->
        <?php
        include("views/templates/Header.php");
        ?>

        <div id="main-content" class="flex-grow-1">
            <!-- Header de la página -->
            <header class="bg-dark p-3 d-flex justify-content-between align-items-center border-bottom text-white">
                
                <div>

                    <h1 class="h4">Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
                    <div class="d-flex align-items-center">
                        <i class="fs-3 fas fa-tachometer-alt"></i>
                        <h3 class="ms-3">Dashboard</h3>
                    </div>
                </div>

                <!-- Menú desplegable del perfil -->
                <?php include_once("views/templates/menuDesplegable.php"); ?>
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
                                        <i class='bx bxs-book bx-lg'></i>
                                        <h5 class="ms-3">Catálogo</h5>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Total de Productos</p>
                                        <h4 class="mb-0">123</h4>
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
                                        <i class='bx bxs-book bx-lg'></i>
                                        <h5 class="ms-3">Inventario</h5>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Total en Stock</p>
                                        <h4 class="mb-0">456</h4>
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
                                        <i class='bx bxs-user-account bx-lg'></i>
                                        <h5 class="ms-3">Clientes</h5>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Clientes Activos</p>
                                        <?php
                                        // Carga del modelo de clientes y llamada a la función totalCount() para obtener el total de clientes activos
                                        require_once ("model/clientesModel.php");
                                        $clientes = new clientes(); 
                                        ?>
                                        <h4 class="mb-0"><?php echo $clientes->totalCount()?></h4>
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
                                        <h3 class="ms-3">Facturas</h3>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-0">Facturas Pendientes</p>
                                        <h4 class="mb-0">10</h4>
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
                                    <div class="mt-3">
                                        <p class="mb-0">Total Proveedores</p>
                                        <h4 class="mb-0">20</h4>
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
                                        <div class="mt-3">
                                            <p class="mb-0">Total Prendas</p>
                                            <h4 class="mb-0">300</h4>
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
                                            <p class="mb-0">Confecciones en Curso</p>
                                            <h4 class="mb-0">15</h4>
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
                                            <p class="mb-0">Total Patrones</p>
                                            <h4 class="mb-0">50</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
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
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="index.php?page=empleados" class="text-decoration-none text-blue-rj">
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-user bx-lg'></i>
                                            <h5 class="ms-3">Empleados</h5>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0">Total Empleados</p>
                                            <h4 class="mb-0">25</h4>
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
                                        <div class="mt-3">
                                            <p class="mb-0">Total Usuarios</p>
                                            <h4 class="mb-0">12</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <!-- Footer -->
        <?php include 'views/templates/footer.php';?>
        </div>
    </main>

  
</body>

</html>
