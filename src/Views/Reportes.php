<?php
require_once("Templates/Head.php");
?>

<title>Reportes</title>
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
                    <div class="d-flex align-items-center">
                        <h3 class="ms-3">Reportes</h3>
                    </div>
                </div>
                <!-- Menú desplegable del perfil -->
                <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
            </header>

            <!-- Contenido principal -->
            <div class="container mt-4 p-4">

                <div class="row">
                    <!-- Reporte de Almacén -->
                    <div class="col-md-4">
                        <div class="card" style="min-height: 200px; margin-top: 40px">
                            <div class="card-header" style="background-color: #212529; color: white;">
                                Reporte de Almacén
                            </div>
                            <div class="card-body">
                                <a class="btn btn-success mb-2" href="index.php?page=almacen&function=print" target="_blank">Generar Reporte</a>

                                <!-- Formulario para reportes parametrizados -->

                            </div>
                        </div>
                    </div>

                    <!-- Reporte de Pedidos de Prenda (debajo de Almacén) -->
                    <div class="col-md-4">
                        <div class="card" style="min-height: 200px; margin-top: 40px">
                            <div class="card-header" style="background-color: #212529; color: white;">
                                Reporte de Pedidos de Prenda
                            </div>
                            <div class="card-body">
                                <a class="btn btn-success mb-2" href="index.php?page=PedidosPrendas&function=print" target="_blank">
                                    Generar Reporte
                                </a>
                                <button class="btn btn-warning mb-2" id="btn-reporte-pedidos-prenda-fechas">Generar Reporte Parametrizado</button>

                                <!-- Formulario para reportes parametrizados -->
                                <div id="form-fechas-pedidos-prenda" class="mt-3" style="display: none;">
                                    <form id="form-pedidos-prenda">
                                        <div class="mb-2">
                                            <label for="fecha-inicio-pedidos-prenda" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fecha-inicio-pedidos-prenda" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="fecha-fin-pedidos-prenda" class="form-label">Fecha Fin</label>
                                            <input type="date" class="form-control" id="fecha-fin-pedidos-prenda" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Generar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte de Confecciones -->
                    <div class="col-md-4">
                        <div class="card" style="min-height: 200px; margin-top: 40px">
                            <div class="card-header" style="background-color: #212529; color: white;">
                                Reporte de Confecciones
                            </div>
                            <div class="card-body">
                                <a class="btn btn-success mb-2" href="index.php?page=confecciones&function=print" target="_blank" class="btn btn-warning ms-1">
                                  Generar Reporte
                                </a>

                                <button class="btn btn-warning mb-2" id="btn-reporte-confecciones-fechas">Generar Reporte Parametrizado</button>

                                <!-- Formulario para reportes parametrizados -->
                                <div id="form-fechas-confecciones" class="mt-3" style="display: none;">
                                    <form id="form-confecciones">
                                        <div class="mb-2">
                                            <label for="fecha-inicio-confecciones" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fecha-inicio-confecciones" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="fecha-fin-confecciones" class="form-label">Fecha Fin</label>
                                            <input type="date" class="form-control" id="fecha-fin-confecciones" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Generar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte de Pedidos -->
                    <div class="col-md-4">
                        <div class="card" style="min-height: 200px; margin-top: 40px">
                            <div class="card-header" style="background-color: #212529; color: white;">
                                Reporte de Pedidos
                            </div>
                            <div class="card-body">
                                <a class="btn btn-success mb-2" href="index.php?page=PedidosProveedores&function=print" target="_blank" class="btn btn-warning ms-1">
                                    Generar Reporte
                                </a>
                                <button class="btn btn-warning mb-2" id="btn-reporte-pedidos-fechas">Generar Reporte Parametrizado</button>

                                <!-- Formulario para reportes parametrizados -->
                                <div id="form-fechas-pedidos" class="mt-3" style="display: none;">
                                    <form id="form-pedidos">
                                        <div class="mb-2">
                                            <label for="fecha-inicio-pedidos" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fecha-inicio-pedidos" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="fecha-fin-pedidos" class="form-label">Fecha Fin</label>
                                            <input type="date" class="form-control" id="fecha-fin-pedidos" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Generar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'src/Views/Templates/Footer.php'; ?>
    
</body>
</html>
