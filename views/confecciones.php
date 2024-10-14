<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

<title>Confecciones</title>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
  <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0m7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
</svg>
                        <h3 class="ms-3">Confecciones</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botones -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#crearConfeccion">
                        Crear <?php include './Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                        require_once("views/confecciones/crear.php")
                    ?>

                    <button href="index.php?page=patrones" class="btn btn-rj-blue d-flex">
                        Patrones <i class="fa-solid fa-palette ms-2"></i>
                    </button>
                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Elemento" aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>
                <!-- Tabla de confecciones -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Prenda</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Tiempo de fabricación</th>
                                <th scope="col">Fecha de fabricación</th>
                                <th scope="col">Empleado encargado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($confeccionesData as $confeccion) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($confeccion['id_confeccion']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['id_prenda']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['cantidad']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['tiempo_fabricacion']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['fecha_fabricacion']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['id_empleado']); ?></td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo htmlspecialchars($confeccion['id_confeccion']); ?>">
                                        <?php include './Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo htmlspecialchars($confeccion['id_confeccion']); ?>">                                          
                                        <?php include './Assets/bootstrap-icons-1.11.3/pencil-fill.svg'; ?>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                include("views/confecciones/editar.php");
                                include("views/confecciones/eliminar.php");
                                ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <?php
    include_once("views/confecciones/log.php");
    include_once("views/templates/footer.php"); ?>


</body>

</html>