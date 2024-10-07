<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

    <title>Envios</title>    
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
                        <i class="fa-solid fa-plane fs-1 me-3"></i>
                        <h3 class="m-0">Gestor de Envios</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear envio -->
                <div class="d-flex justify-content-between mb-4">
                <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                        Registrar Envio <i class="fa-solid fa-plus ms-2"></i>
                    </button>

                    <?php
                        require_once("views/envios/crear.php")
                    ?>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>

                <!-- Tabla de envíos -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Venta</th>
                                <th scope="col">Entrega</th>
                                <th scope="col">Agencia</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha de llegada</th>
                                <th scope="col">StarkenID</th>
                                <th scope="col text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>Local</td>
                                <td>MotoYummi</td>
                                <td>El bosque</td>
                                <td>Entregado</td>
                                <td class="text-center">17/06/24</td>
                                <td class="text-center">00534</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editar">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include_once("views/templates/footer.php"); ?>
</body>

</html>
