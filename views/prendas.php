<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendas</title>

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
                        <i class="fa-solid fa-users-gear fs-1 me-3"></i>
                        <h3 class="m-0">Gestor de Prendas Terminadas</h3>
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

                <?php
                // Incluimos el modelo de prendas
                include_once("model/prendasModel.php");
                $prenda = new Prenda();
                $prendaData = $prenda->viewAll("stock");

                // Incluimos el controlador para crear prendas
                include_once("controllers/prendasController.php");
                $crearPrenda = new crearPrenda();
                $crearPrenda->create();
                ?>

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
                        <i class="fas fa-trash-alt"></i> Prendas sin stock
                    </button>
                </div>

                <?php
                include_once("views/prendas/sinStock.php");
                ?>

                <?php
                // Incluimos las funciones de edición y eliminación de prendas
                $editarPrenda = new editPrenda();
                $editarPrenda->edit();

                $eliminarPrenda = new eliminarPrenda();
                $eliminarPrenda->eliminar();

                if (isset($_GET['success'])) {
                    switch ($_GET['success']) {
                        case 1:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Prenda creada',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                        case 2:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Prenda eliminada',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                        case 3:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Prenda editada',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                    }
                } elseif (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case 3:
                            echo "<script> alertify.error('Error al editar la prenda'); </script>";
                            break;
                    }
                }
                ?>
            </div>
        </div>
    </main>

    <?php include_once("views/templates/footer.php"); ?>
    <?php include("views/prendas/registrar.php"); ?>


</body>

</html>