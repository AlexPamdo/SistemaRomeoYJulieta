<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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
                        <i class="fa-solid fa-address-card fs-1 me-3"></i>
                        <h3 class="m-0">Gestion de Proveedores</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear proveedor -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                        Crear Proveedor <i class="fa-solid fa-plus ms-2"></i>
                    </button>

                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Proveedor" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>

                <?php
                // Incluimos el modelo de proveedores
                include_once("model/proveedorModel.php");
                $proveedores = new Proveedores();

                // Incluimos el controlador para crear proveedores
                include_once("controllers/ProveedoresController.php");
                $crearProveedor = new crearProveedor();
                $crearProveedor->create();
                ?>

                <!-- Tabla de proveedores -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Notas</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $proveedoresData = $proveedores->viewAll();
                             foreach ($proveedoresData as $proveedor) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($proveedor['id_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['nombre_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['telefono_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['gmail_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['id_tipo_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['id_estado']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['notas_proveedor']); ?></td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo $proveedor['id_proveedor']; ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo $proveedor['id_proveedor']; ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>

                                <?php
                                // Incluimos los modales para editar y eliminar proveedores
                                include("views/proveedores/editar.php");
                                include("views/proveedores/eliminar.php");
                                ?>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php
                // Incluimos las funciones de edición y eliminación de proveedores
                $editarProveedor = new editProveedor();
                $editarProveedor->edit();

                $eliminarProveedor = new eliminarProveedor();
                $eliminarProveedor->eliminar();

                if (isset($_GET['succes'])) {
                    switch ($_GET['succes']) {
                        case 1:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Proveedor registrado',
                                showConfirmButton: false,
                                timer: 1500
                                }); </script>";
                            break;
                        case 2:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Proveedor eliminado',
                                showConfirmButton: false,
                                timer: 1500
                                }); </script>";
                            break;
                        case 3:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Proveedor editado',
                                showConfirmButton: false,
                                timer: 1500
                                }); </script>";
                            break;
                    }
                }
                ?>
            </div>
        </div>
    </main>

    <?php include_once("views/templates/footer.php"); ?>

  
</body>

</html>
