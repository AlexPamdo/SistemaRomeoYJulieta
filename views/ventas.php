<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

    <title>Ventas</title>    
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">
    <main class="container-fluid p-0 row m-0">
        <!-- Barra lateral -->
        <?php include("views/templates/Header.php"); ?>

        <div class="col bg-custom-content p-0">
            <!-- Header de la página -->
            <header class="bg-dark">
                <div class="p-3 d-flex justify-content-between align-items-center border-bottom">
                    <div class="d-flex align-items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-file-earmark-bar-graph-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5m-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5z"/>
</svg>
                        <h3 class="ms-3">Gestor de Ventas</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear -->
                <div class="d-flex justify-content-between mb-4">
                <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                        Registrar Venta <?php include './Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                        require_once("views/ventas/crear.php")
                    ?>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search">
                        <button class="btn btn-custom-success me-2" type="submit">Buscar</button>
                        <button class="btn btn-warning" type="submit">
                        <?php include './Assets/bootstrap-icons-1.11.3/printer-fill.svg'; ?>
                        </button>
                    </form>
                </div>

                <!-- Tabla de ventas -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Tipo de Venta</th>
                                <th scope="col">Tipo de Pago</th>
                                <th scope="col">Monto Total</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>00/00/0000</td>
                                <td>Example Nombre</td>
                                <td>Envio</td>
                                <td>Efectivo</td>
                                <td>100bs</td>
                                <td class="d-flex">
                                    <button class="btn btn-rj-blue m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#visualizar">
                                    <?php include './Assets/bootstrap-icons-1.11.3/eye-fill.svg'; ?>
                                    </button>
                                    <button class="btn btn-custom-success m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#editar">
                                    <?php include './Assets/bootstrap-icons-1.11.3/pencil-fill.svg'; ?>
                                    </button>
                                    <button class="btn btn-custom-danger m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#eliminar">
                                    <?php include './Assets/bootstrap-icons-1.11.3/ban.svg'; ?>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once("views/templates/footer.php");
    include("views/ventas/crear.php");
    include("views/ventas/editar.php");
    include("views/ventas/eliminar.php");
    include("views/ventas/visualizar.php");
    ?>

    <!-- Scripts de Bootstrap y FontAwesome -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>
