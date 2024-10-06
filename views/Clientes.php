<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
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
                        <i class="fa-solid fa-users-gear fs-1 me-3"></i>
                        <h3 class="m-0">Gestión de Clientes</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear cliente -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                        Crear Cliente <i class="fa-solid fa-plus ms-2"></i>
                    </button>

                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Cliente" aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>

                <?php
                // Incluye el modelo y controlador de clientes
                include_once("model/clientesModel.php");
                $cliente = new clientes();
                $clientesData = $cliente->viewAll();
                
                include_once("controllers/clientesController.php");
                $crearCliente = new crearCliente();
                $crearCliente->create();
                ?>

                <!-- Tabla de clientes -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientesData as $cliente) : ?>
                                <tr class="table-custom-row">
                                    <td><?php echo htmlspecialchars($cliente['id_cliente']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['apellido']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
                                    <td><?php echo htmlspecialchars($cliente['email']); ?></td>
                                    <td>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" id="passwordInput<?php echo htmlspecialchars($cliente['id_cliente']); ?>" value="<?php echo htmlspecialchars($cliente['contraseña']); ?>" readonly>
                                            <i class="fas fa-eye position-absolute end-0 top-50 translate-middle-y pe-3 password-toggle-icon" id="togglePasswordIcon<?php echo htmlspecialchars($cliente['id_cliente']); ?>" onclick="togglePasswordVisibility(<?php echo htmlspecialchars($cliente['id_cliente']); ?>)"></i>
                                        </div>
                                    </td>
                                    <td><?php echo htmlspecialchars($cliente['cedula']); ?></td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo htmlspecialchars($cliente['id_cliente']); ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo htmlspecialchars($cliente['id_cliente']); ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </td>
                                    <?php include("views/clientes/editar.php"); ?>
                                    <?php include("views/clientes/eliminar.php"); ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php
                // Funciones para editar y eliminar clientes
                $editarCliente = new editCliente();
                $editarCliente->edit();

                $eliminarCliente = new eliminarClientes();
                $eliminarCliente->eliminar();

                // Mensajes de éxito y error
                if (isset($_GET['succes'])) {
                    switch ($_GET['succes']) {
                        case 1:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Cliente creado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                        case 2:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Cliente eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                        case 3:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Cliente editado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                    }
                } elseif (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case 3:
                            echo "<script> alertify.error('Error al editar cliente'); </script>";
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

    <!-- Script para mostrar/ocultar contraseñas -->
    <script>
        function togglePasswordVisibility(clienteId) {
            const passwordInput = document.getElementById(`passwordInput${clienteId}`);
            const togglePasswordIcon = document.getElementById(`togglePasswordIcon${clienteId}`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordIcon.classList.remove('fa-eye');
                togglePasswordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                togglePasswordIcon.classList.remove('fa-eye-slash');
                togglePasswordIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
