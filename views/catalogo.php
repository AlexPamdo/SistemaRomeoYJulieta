<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
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
            <header class="bg-custom-header p-3 d-flex justify-content-between align-items-center border-bottom">
                <h3 class="m-0">Catálogo</h3>
                <!-- Menú desplegable -->
                <?php include("views/templates/menuDesplegable.php"); ?>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear elemento -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#crearModal">
                        Crear <i class="fa-solid fa-plus ms-2"></i>
                    </button>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">
                            Buscar
                        </button>
                    </form>
                </div>

                <!-- Tabla de catálogo -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover align-middle table-borderless">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Género</th>
                                <th scope="col">Colección</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-custom-row">
                                <td>001</td>
                                <td>Prenda</td>
                                <td>L</td>
                                <td>Niña</td>
                                <td>Lima Limón</td>
                                <td>
                                    <img src="Assets/conjunto2.png" class="img-thumbnail" height="70" width="70" alt="...">
                                </td>
                                <td>Esta prenda es un ejemplo</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-success m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#EditarModal">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#BorrarModal">
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

    <?php
    include_once("views/templates/footer.php");
    include("views/catalogo/registrar.php");
    include("views/proveedores/editar.php");
    ?>

    <!-- Scripts de Bootstrap y FontAwesome -->
   
</body>

</html>
