<?php
require_once("Templates/Head.php");
?>

<title>Confecciones</title>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
                            <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0m7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                        </svg>
                        <h3 class="ms-3" data-intro="Este es el modulo de confecciones, desde aqui se pueden ver todas las prendas confeccionadas en el sistema" data-step="1">Confecciones</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botones -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal" data-intro="Desde este boton podemos crear una nueva confeccion en el sistema" data-step="2">
                        Crear <?php include './src/Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                    require_once("src/Views/Confecciones/Crear.php");
                    require_once("src/Views/Confecciones/Actualizar.php");
                    require_once("src/Views/Confecciones/Eliminar.php")
                    ?>

                    <a href="index.php?page=confecciones&function=print" target="_blank" class="btn btn-warning ms-1">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/printer-fill.svg'; ?>
                    </a>

                </div>
                <!-- Tabla de confecciones -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover" id="myTable">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Prenda</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha de fabricación</th>
                                <th scope="col">Empleado encargado</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($confeccionesData as $confeccion) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($confeccion['id_confeccion']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['id_prenda']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['cantidad']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['fecha_fabricacion']); ?></td>
                                    <td><?php echo htmlspecialchars($confeccion['id_empleado']); ?></td>
                                    <td><span class="
                                    <?= $confeccion['proceso'] == 0 ? 'en_curso' : ($confeccion['proceso'] == 1 ? 'completado' : 'anulado') ?>">
                                    <?php echo $confeccion['proceso'] == 0 ? 'En proceso' : ($confeccion['proceso'] == 1 ? 'completada' : 'Cancelada'); ?></span></td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <!-- El boton de actualizar sera removido si la confeccion ya esta actualizada -->

                                        <button type="button" class="btn btn-custom-danger m-1 anularConfeccion"
                                            <?= $confeccion['proceso'] == 1 ? 'disabled' : ""; ?>
                                            data-bs-toggle="modal" data-bs-target="#anularConfeccion">
                                            <?php include './src/Assets/bootstrap-icons-1.11.3/ban.svg'; ?>
                                        </button>

                                        <button type="button" class="btn btn-custom-success m-1 actualizarConfeccion"
                                            <?= $confeccion['proceso'] == 1 ? 'disabled' : ""; ?>
                                            data-bs-toggle="modal" data-bs-target="#actualizarConfeccion">
                                            <i class="fa-solid fa-sync"></i>
                                        </button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <?php
    include_once("src/Views/Templates/Log.php");
    include_once("src/Views/Templates/Footer.php"); ?>


</body>

</html>