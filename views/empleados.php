<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>
    <!-- Enlace a Bootstrap y FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                        <i class="fa-solid fa-users fs-1 me-3"></i>
                        <h3 class="m-0">Empleados</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear empleado -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                        Crear Empleado <i class="fa-solid fa-plus ms-2"></i>
                    </button>

                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Empleado" aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>

                <?php
                // Incluimos el modelo de empleados
                include_once("model/empleadosModel.php");
                $empleados = new empleados();


                // Incluimos el controlador para crear empleados
                include_once("controllers/empleadosController.php");
                $crearEmpleado = new crearEmpleado();
                $crearEmpleado->create();
                ?>

                <!-- Tabla de empleados -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Ocupación</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $empleadosData = $empleados ->viewAll();
                             foreach ($empleadosData as $empleado) : ?>
                                <tr class="table-custom-row">
                                    <td><?php echo htmlspecialchars($empleado['id_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['nombre_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['apellido_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['email_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['telefono_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['id_ocupacion']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['cedula_empleado']); ?></td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo $empleado['id_empleado']; ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo $empleado['id_empleado']; ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>

                                <?php
                                // Incluimos los modales para editar y eliminar empleados
                                include("views/empleados/editar.php");
                                include("views/empleados/eliminar.php");
                                ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php
                // Incluimos las funciones de edición y eliminación de empleados
                $editarEmpleado = new editEmpleado();
                $editarEmpleado->edit();

                $eliminarEmpleado = new eliminarEmpleado();
                $eliminarEmpleado->eliminar();

                // Mensajes de éxito y error
                if (isset($_GET['succes'])) {
                    switch ($_GET['succes']) {
                        case 1:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Empleado creado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                        case 2:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Empleado eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                        case 3:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Empleado editado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                    }
                } elseif (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case 3:
                            echo "<script> alertify.error('Error al editar empleado'); </script>";
                            break;
                    }
                }
                ?>
            </div>
        </div>
    </main>

    <?php include_once("views/templates/footer.php"); ?>

    <!-- Scripts de Bootstrap y FontAwesome -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>
