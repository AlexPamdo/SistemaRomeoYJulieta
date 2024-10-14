<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

    <title>Prendas</title>    
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
</svg>
                        <h3 class="ms-3">Gestor de Prendas Terminadas</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>


            </header>

            <!-- Contenido principal -->
            <div class="p-4">
                <!-- Barra de búsqueda y botón de crear -->
                <div class="d-flex justify-content-end mb-4">

                    <!-- <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                        Registrar Prenda <i class="fa-solid fa-plus ms-2"></i>
                    </button> -->


                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Elemento" aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>

           
                <!-- Tabla de prendas -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">Identificador</th>
                                <th scope="col"></th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Colección</th>
                                <th scope="col">Color</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Género</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prendaData as $prenda) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($prenda['id_prenda']); ?></td>
                                    <td><img class="img-prenda" src="<?php echo htmlspecialchars($prenda['img_prenda']); ?>" alt="" height="60px" width="60px"></td>
                                    <td><?php echo htmlspecialchars($prenda['nombre_prenda']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_categoria']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_talla']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_coleccion']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_color']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['stock']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_genero']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['precio_unitario']); ?> bs</td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo htmlspecialchars($prenda['id_prenda']); ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo htmlspecialchars($prenda['id_prenda']); ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>

                                <?php
                                // Incluimos los modales para editar y eliminar prendas
                                include("views/prendas/editar.php");
                                include("views/prendas/eliminar.php");
                                ?>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <!-- Botón para ver prendas sin stocl -->
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-rj-blue p-3" data-bs-toggle="modal" data-bs-target="#ningunStock">
                    <?php include './Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Prendas sin stock
                    </button>
                </div>

                <?php
                include_once("views/prendas/sinStock.php");
                ?>
            </div>
        </div>
    </main>

    <?php 
    include_once("views/prendas/log.php");
    include_once("views/templates/footer.php"); 
    ?>
   


</body>

</html>