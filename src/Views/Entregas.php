<?php
require_once("Templates/Head.php");
?>

<title>Entregas</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">
    <main class="container-fluid p-0 row m-0">
        <!-- Barra lateral -->
        <?php include("src/Views/Templates/Header.php"); ?>

        <div class="col bg-custom-content p-0">
            <!-- Header de la página -->
            <header class="bg-dark">
                <div class="p-3 d-flex justify-content-between align-items-center border-bottom">
                    <div class="d-flex align-items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
                            <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                            <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                        </svg>
                        <h3 class="ms-3" data-intro="Este es el modulo de los pedidos, desde aqui se pueden crear pedidos en el sistema" data-step="1">Entregas</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear pedido -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal" data-intro="Desde este boton podemos registrar un nuevo pedido en el sistema" data-step="2">
                        Crear <?php include './src/Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                    require_once("src/Views/Entregas/Crear.php")
                    ?>

                    <a href="index.php?page=pedidos&function=print" target="_blank" class="btn btn-warning ms-1">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/printer-fill.svg'; ?>
                    </a>

                </div>

                <!-- Tabla de pedidos -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover table-borderless" id="myTable">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($entregasData as $entrega) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($entrega['id_entrega']); ?></td>
                                    <td><?php echo htmlspecialchars($entrega['desc_entrega']); ?></td>
                                    <td><?php echo htmlspecialchars($entrega['fecha_entrega']); ?></td>
                                    <td><?php echo htmlspecialchars($entrega['total_entrega']); ?></td>
                                    <td class="d-flex">
                                        <!-- Boton de eliminar -->
                                        <form class="d-flex" action="index.php" method="get">
                                            <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal"
                                                data-bs-target="#orden<?php echo $entrega['id_entrega'] ?>">
                                                <?php include './src/Assets/bootstrap-icons-1.11.3/eye-fill.svg'; ?>
                                            </button>
                                            <button type="button" class="btn btn-danger m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo htmlspecialchars($pedido['id_pedido']); ?>">
                                            <?php include './src/Assets/bootstrap-icons-1.11.3/ban.svg'; ?>
                                            </button>
                                            <button type="button" class="btn btn-success m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#actualizar<?php echo htmlspecialchars($pedido['id_pedido']); ?>">
                                                <?php include './src/Assets/bootstrap-icons-1.11.3/currency-dollar.svg'; ?>
                                            </button>
                                        </form>
                                    </td>
                                    <?php
                                    include("src/Views/Entregas/Eliminar.php");

                                    ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php foreach ($entregasData as $entrega) :
                        include("src/Views/Entregas/Orden.php");
                    endforeach; ?>
                </div>

                <!-- Botón para ver usuarios items deshabilitados -->
                <div class="d-flex justify-content-end mt-4">
                    <button data-intro="Con este boton podremos visualizar todos aquellos usuarios que se han estado" data-step="7" class="btn btn-rj-blue p-3" data-bs-toggle="modal" data-bs-target="#elementosDesabilitados">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Elementos Deshabilitados
                    </button>
                </div>

                <?php
                // Restaurar
                include_once("src/Views/Entregas/Papelera.php");
                ?>
            </div>
        </div>
    </main>

    <?php
    include_once("src/Views/Templates/Log.php");
    include_once("src/Views/Templates/Footer.php"); ?>

</body>

</html>