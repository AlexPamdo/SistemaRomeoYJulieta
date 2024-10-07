<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

<title>Pedidos</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">
    <main class="container-fluid p-0 d-flex">
        <!-- Barra lateral -->
        <?php include("views/templates/Header.php"); ?>

        <div class="col bg-custom-content p-0">
            <!-- Header de la página -->
            <header class="bg-custom-header">
                <div class="p-3 d-flex justify-content-between align-items-center border-bottom">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-truck-fast fs-1 me-3"></i>
                        <h3 class="m-0">Pedidos</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear pedido -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                        Crear <i class="fa-solid fa-plus ms-2"></i>
                    </button>

                    <?php
                        require_once("views/pedidos/crear.php")
                    ?>

                    <form class="d-flex" role="search" method="get">
                        <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search">
                        <button class="btn btn-success" type="submit">Buscar</button>
                        <a href="index.php?page=pedidos&function=print" target="_blank" class="btn btn-warning ms-1">
                            <i class="fa-solid fa-print"></i>
                        </a>
                    </form>
                </div>

                <!-- Tabla de pedidos -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover table-borderless">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Fecha estimada</th>
                                <th scope="col">Fecha real</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Orden</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Método de pago</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Total a pagar</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedidosData as $pedido) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pedido['id_pedido']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['id_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['fecha_pedido']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['fecha_estimada']); ?></td>
                                    <td>
                                        <?php echo $pedido['fecha_real'] == "0000-00-00" ? "<div class='no-Entregado'></div>" : htmlspecialchars($pedido['fecha_real']); ?>
                                    </td>
                                    <td>
                                        <?php echo $pedido['estado_pedido'] ? "<div class='Entregado'>completo</div>" : "<div class='no-Entregado'>incompleto</div>"; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($pedido['id_orden_pedido']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['cantidad_pedido']); ?></td>
                                    <td>
                                        <?php echo $pedido['id_metodo_pago'] == "ninguno" ? "<div class='no-Entregado'></div>" : htmlspecialchars($pedido['id_metodo_pago']); ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($pedido['id_usuario']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['total_pedido']); ?> bs</td>
                                    <td class="d-flex">
                                        <!-- Boton de eliminar -->
                                        <form class="d-flex" action="index.php" method="get">
                                            <button type="button" class="btn btn-danger m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo htmlspecialchars($pedido['id_pedido']); ?>">
                                                <i class="fa-solid fa-ban"></i>
                                            </button>

                                            <!-- Botón para abrir el modal de actualización -->
                                            <button type="button" class="btn btn-success m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#actualizar<?php echo htmlspecialchars($pedido['id_pedido']); ?>">
                                                <i class="fa-solid fa-hand-holding-dollar"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <?php
                                    include("views/pedidos/editar.php");
                                    include("views/pedidos/eliminar.php");
                                    include("views/pedidos/actualizar.php");
                                    ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include_once("views/templates/footer.php"); ?>

</body>

</html>