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
                        <div class="card shadow-sm border-0" style="min-height: 250px; margin-top: 40px; border-radius: 15px; overflow: hidden;">
                            <div class="card-header text-white" style="background: #212529; font-size: 1.25rem; font-weight: bold;">
                                <?php include './src/Assets/bootstrap-icons-1.11.3/box-seam.svg'; ?>
                                Reporte de Almacén
                            </div>
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <a class="btn btn-success w-75 mb-2" href="index.php?page=almacen&function=print" target="_blank" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/clipboard2-data-fill.svg'; ?>   
                                    Generar Reporte
                                </a>
                                <button class="btn btn-warning w-75 mb-2 btnReporte" id="btn-reporte-almacen-fechas" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/wrench-adjustable.svg'; ?>
                                    Filtros
                                </button>
                                <div id="form-fechas-almacen" class="mt-3 formFiltros" style="display: none;">
                              
                                    <form id="form-almacen">
                                        <div class="mb-2">
                                        <label class="form-label">Medidas</label>
                                        <select class="form-control" id="almacen-medidas" required>
                                        <option value="" disabled selected>Selecciona una medida</option>
                                        <option value="Metros">Metros</option>
                                        <option value="Unidades">Unidades</option>
                                        </select>
                                    
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Generar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte de Prendas Terminadas -->
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0" style="min-height: 250px; margin-top: 40px; border-radius: 15px; overflow: hidden;">
                            <div class="card-header text-white" style="background: #212529; font-size: 1.25rem; font-weight: bold;">
                                <?php include './src/Assets/bootstrap-icons-1.11.3/patch-check.svg'; ?>
                                Reporte de Prendas Terminadas
                            </div>
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <a class="btn btn-success w-75 mb-2" href="index.php?page=prendas&function=print" target="_blank" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/clipboard2-data-fill.svg'; ?>     
                                    Generar Reporte
                                </a>
                                <button class="btn btn-warning w-75 mb-2 btnReporte" id="btn-reporte-prendas-fechas" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/wrench-adjustable.svg'; ?>
                                    Filtros
                                </button>
                                <div id="form-fechas-prendas" class="mt-3 formFiltros" style="display: none;">
                                    <form id="form-prendas">
                                    <div class="mb-2">
                                        <label class="form-label">Coleccion</label>
                                        <select class="form-control" id="almacen-medidas" required>
                                        <option value="" disabled selected>Selecciona una medida</option>
                                        <option value="lima limón">lima limón</option>
                                        <option value="Verano 2024">Verano 2024</option>
                                        <option value="Otoño 2024">Otoño 2024</option>
                                        <option value="Invierno 2024">Invierno 2024</option>
                                        <option value="Colección Nupcial">Colección Nupcial</option>
                                        <option value="Ropa Casual">Ropa Casual</option>
                                        <option value="Deportes y Aventura">Deportes y Aventura</option>
                                        <option value="Moda Sostenible">Moda Sostenible</option>
                                        <option value="Ropa de Trabajo">Ropa de Trabajo</option>
                                        <option value="Estilo Urbano">Estilo Urbano</option>
                                        </select>

                                        </div>
                                        <div class="mb-2">

                                        <label class="form-label">Genero</label>
                                        <select class="form-control" id="genero-prendas" required>
                                        <option value="" disabled selected>Selecciona un genero</option>
                                        <option value="niño">Niño</option>
                                        <option value="niña">Niña</option>
                                        <option value="unisex">Unisex</option>
                                        </select>
                                        
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Generar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte de Pedidos de Prenda -->
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0" style="min-height: 250px; margin-top: 40px; border-radius: 15px; overflow: hidden;">
                            <div class="card-header text-white" style="background: #212529; font-size: 1.25rem; font-weight: bold;">
                                <?php include './src/Assets/bootstrap-icons-1.11.3/clipboard2-check.svg'; ?>
                                Reporte de Pedidos de Prenda
                            </div>
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <a class="btn btn-success w-75 mb-2" href="index.php?page=PedidosPrendas&function=print" target="_blank" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/clipboard2-data-fill.svg'; ?>   
                                    Generar Reporte
                                </a>
                                <button class="btn btn-warning w-75 mb-2 btnReporte" id="btn-reporte-pedidos-prenda-fechas" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/wrench-adjustable.svg'; ?>
                                    Filtros
                                </button>
                                <div id="form-fechas-pedidos-prenda" class="mt-3 formFiltros" style="display: none;">
                                    <form id="form-pedidosPrendas">
                                        <div class="mb-2">
                                            <label for="fecha-inicio-pedidos-prenda" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fecha-inicio-pedidos-prenda" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="fecha-fin-pedidos-prenda" class="form-label">Fecha Fin</label>
                                            <input type="date" class="form-control" id="fecha-fin-pedidos-prenda" required>
                                        </div>
                                        <div class="mb-2">
                                        <label class="form-label">Estado</label>
                                        <select class="form-control" id="almacen-medidas" required>
                                        <option value="" disabled selected>Selecciona el estado</option>
                                        <option value="completado">Completado</option>
                                        <option value="en curso">En curso</option>
                                        <option value="cancelado">Cancelado</option>
                                        </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Generar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte de Confecciones -->
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0" style="min-height: 250px; margin-top: 40px; border-radius: 15px; overflow: hidden;">
                            <div class="card-header text-white" style="background: #212529; font-size: 1.25rem; font-weight: bold;">
                                <?php include './src/Assets/bootstrap-icons-1.11.3/scissors2.svg'; ?>
                                Reporte de Confecciones
                            </div>
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <a class="btn btn-success w-75 mb-2" href="index.php?page=confecciones&function=print" target="_blank" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/clipboard2-data-fill.svg'; ?>   
                                    Generar Reporte
                                </a>
                                <button class="btn btn-warning w-75 mb-2 btnReporte" id="btn-reporte-confecciones-fechas" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/wrench-adjustable.svg'; ?>
                                    Filtros
                                </button>
                                <div id="form-fechas-confecciones" class="mt-3 formFiltros" style="display: none;">
                                    <form id="form-confecciones">
                                        <div class="mb-2">
                                            <label for="fecha-inicio-confecciones" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fecha-inicio-confecciones" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="fecha-fin-confecciones" class="form-label">Fecha Fin</label>
                                            <input type="date" class="form-control" id="fecha-fin-confecciones" required>
                                        </div>

                                        <label class="form-label">Estado</label>
                                        <select class="form-control" id="almacen-medidas" required>
                                        <option value="" disabled selected>Selecciona el estado</option>
                                        <option value="completado">Completado</option>
                                        <option value="en curso">En curso</option>
                                        <option value="anulado">Anulado</option>
                                        </select>

                                        <button type="submit" class="btn btn-primary mt-2">Generar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reporte de Pedidos Proveedores -->
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0" style="min-height: 250px; margin-top: 40px; border-radius: 15px; overflow: hidden;">
                            <div class="card-header text-white" style="background: #212529; font-size: 1.25rem; font-weight: bold;">
                                <?php include './src/Assets/bootstrap-icons-1.11.3/person-check.svg'; ?>
                                Reporte de Pedidos Proveedores
                            </div>
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <a class="btn btn-success w-75 mb-2" href="index.php?page=PedidosProveedores&function=print" target="_blank" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/clipboard2-data-fill.svg'; ?>     
                                    Generar Reporte
                                </a>
                                <button class="btn btn-warning w-75 mb-2 btnReporte" id="btn-reporte-pedidos-fechas" style="border-radius: 20px;">
                                    <?php include './src/Assets/bootstrap-icons-1.11.3/wrench-adjustable.svg'; ?>
                                    Filtros
                                </button>
                                <div id="form-fechas-pedidos" class="mt-3 formFiltros" style="display: none;">
                                    <form id="form-pedidosProveedores">
                                        <div class="mb-2">
                                            <label for="fecha-inicio-pedidos" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fecha-inicio-pedidos" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="fecha-fin-pedidos" class="form-label">Fecha Fin</label>
                                            <input type="date" class="form-control" id="fecha-fin-pedidos" required>
                                        </div>
                                        <div class="mb-2">
                                              <label class="form-label">Estado</label>
                                        <select class="form-control" id="almacen-medidas" required>
                                        <option value="" disabled selected>Selecciona el estado</option>
                                        <option value="pago`">Pago</option>
                                        <option value="no pago">No pago</option>
                                        <button type="submit" class="btn btn-primary mt-2">Generar</button>
                                        </div>
    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer -->
    
    </main>

    <?php include 'src/Views/Templates/Footer.php'; ?>
    
</body>
</html>
