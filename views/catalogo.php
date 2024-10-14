<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

    <title>Catalogo</title>    
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
  <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
</svg>
                        <h3 class="ms-3">Catálogo</h3>
                    </div>
                <!-- Menú desplegable -->
                <?php include("views/templates/menuDesplegable.php"); ?>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear elemento -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#crearModal">
                        Crear <?php include './Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                        require_once("views/catalogo/registrar.php")
                    ?>

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
                                        <?php include './Assets/bootstrap-icons-1.11.3/pencil-fill.svg'; ?>
                                        </button>
                                        <button class="btn btn-danger m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#BorrarModal">
                                        <?php include './Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?>
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
