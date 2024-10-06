<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <!-- Enlace a Bootstrap y FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="Assets/style/index.css">
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
                        <i class="fa-solid fa-cart-shopping fs-1 me-3"></i>
                        <h3 class="m-0">Gestor de Ventas</h3>
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
                        Registrar Venta <i class="fa-solid fa-plus ms-2"></i>
                    </button>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search">
                        <button class="btn btn-custom-success me-2" type="submit">Buscar</button>
                        <button class="btn btn-warning" type="submit">
                            <i class="fa-solid fa-print"></i>
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
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="btn btn-custom-success m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#editar">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-custom-danger m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#eliminar">
                                        <i class="fa-solid fa-ban"></i>
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
