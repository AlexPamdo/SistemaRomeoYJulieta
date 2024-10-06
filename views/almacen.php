<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

    <title>Almacen</title>
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
                        <i class="fa-solid fa-boxes-stacked fs-1 me-3"></i>
                        <h3 class="m-0">Gestion de Almacen</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear material -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModalM">
                        Registrar Elemento <i class="fa-solid fa-plus ms-2"></i>
                    </button>

                    <?php require_once("views/almacen/crear.php") ?>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>
                <!-- Tabla de materiales -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Color</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materialData as $material) : ?>
                                <tr class="table-custom-row">
                                    <td><?php echo htmlspecialchars($material['id_material']); ?></td>
                                    <td><?php echo htmlspecialchars($material['nombre_material']); ?></td>
                                    <td><?php echo htmlspecialchars($material['tipo_material']); ?></td>
                                    <td><?php echo htmlspecialchars($material['color_material']); ?></td>
                                    <td><?php echo htmlspecialchars($material['stock']); ?></td>
                                    <td><?php echo htmlspecialchars($material['precio']); ?> bs</td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminarM<?php echo $material['id_material']; ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editarM<?php echo $material['id_material']; ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>

                                <?php
                                // Incluimos los modales para editar y eliminar materiales
                                include("views/almacen/editar.php");
                                include("views/almacen/eliminar.php");
                                ?>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
     include_once("views/almacen/log.php");
     include_once("views/templates/footer.php"); ?>

</body>

</html>
