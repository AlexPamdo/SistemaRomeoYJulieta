<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confecciones</title>
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
                        <i class="fa-solid fa-pencil fs-1 me-3"></i>
                        <h3 class="m-0">Confecciones</h3>
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
                        Crear <i class="fa-solid fa-plus ms-2"></i>
                    </button>
                    <button  href="index.php?page=patrones" class="btn btn-rj-blue d-flex">
                        Patrones <i class="fa-solid fa-palette ms-2"></i>
                    </button>
                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Elemento" aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>

                <?php
                // Incluimos el modelo
                include_once("model/confeccionesModel.php");
                $confeccion = new confecciones();
                $confeccionesData = $confeccion->viewAll();
                // Funciones de crear y eliminar
                include_once("controllers/confeccionesController.php");
                $creaConfeccion = new crearConfeccion();
                $creaConfeccion->create();
                $eliminarConfeccion = new eliminarConfeccion();
                $eliminarConfeccion->eliminar();
                // Incluimos los logs
                include_once("views/confecciones/log.php");
                ?>

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
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo htmlspecialchars($confeccion['id_confeccion']); ?>">
                                            <i class="fa-solid fa-pencil"></i>
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
    

    <?php include_once("views/templates/footer.php"); ?>
    

</body>

</html>
