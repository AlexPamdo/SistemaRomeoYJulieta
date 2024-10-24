<?php
// Protege el acceso a la página solo para usuarios autorizados
require("src/Controllers/ProtectedUser.php");

require_once("Templates/Head.php");
?>

<title>Catalogo</title>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg>
                        <h3 class="ms-3">Catálogo</h3>
                    </div>
                    <!-- Menú desplegable -->
                    <?php include("src/Views/Templates/MenuDesplegable.php"); ?>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear elemento -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#crearModal">
                        Crear <?php include './src/Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                    require_once("src/Views/Catalogo/Registrar.php")
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
                                <th scope="col">ID</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Imagenes</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($catalogoData as $catalogo): ?>
                                <tr class="table-custom-row">
                                    <td><?php echo htmlspecialchars($catalogo['id_catalogo']) ?></td>
                                    <td><?php echo htmlspecialchars($catalogo['desc_catalogo']) ?></td>
                                    <td><?php echo htmlspecialchars($catalogo['precio_catalogo']) ?></td>
                                    <td><?php echo htmlspecialchars($catalogo['grupo_catalogo']) ?></td>
                                    <td><?php echo htmlspecialchars($catalogo['detalles_catalogo']) ?></td>
                                    <td>
                                        <img src="Assets/conjunto2.png" class="img-thumbnail" height="70" width="70" alt="...">
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#EditarModal<?php echo htmlspecialchars($catalogo['id_catalogo']) ?>">
                                                <?php include './src/Assets/bootstrap-icons-1.11.3/pencil-fill.svg'; ?>
                                            </button>
                                            <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#EliminarModal<?php echo htmlspecialchars($catalogo['id_catalogo']) ?>">
                                                <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?>
                                            </button>
                                        </div>
                                    </td>
                                    <?php
                                  include('Views/Catalogo/Eliminar.php');
                                  include('Views/Catalogo/Editar.php');
                                    ?>
                                </tr>
                            <?php
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once("src/Views/Templates/Footer.php");
    ?>

    <!-- Scripts de Bootstrap y FontAwesome -->

</body>

</html>