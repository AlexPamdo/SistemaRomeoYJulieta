<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

    <title>Gestión de Usuarios</title>    
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">
    <main class="container-fluid p-0 row m-0">
        <!-- Barra lateral -->
        <?php include("views/templates/Header.php"); ?>

        <div  id="main-content" class="col bg-custom-content p-0">
            <!-- Header de la página -->
            <header class="bg-dark">
                <div class="p-3 d-flex justify-content-between align-items-center border-bottom">
                    <div class="d-flex align-items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg>
                        <h3 class="ms-3">Gestión de Usuarios</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear usuario -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                        Crear Usuario <?php include './Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <!-- Incluimos el modal del formulario de crear -->
                    <?php include_once("views/usuarios/crear.php"); ?>

                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Usuario" aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>

                <!-- Tabla de usuarios -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Perfil</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Permisos</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Buscador de usuarios
                            foreach ($usuariosData as $usuario) :
                            ?>
                                <tr class="table-custom-row">
                                    <td><?php echo htmlspecialchars($usuario['id_usuario']); ?></td>
                                    <td>
                                        <?php
                                        // Verifica si el usuario tiene una imagen de perfil
                                        $imgUser = empty($usuario['img_usuario']) ? "Assets/img/users/User_default_icon.png" : $usuario['img_usuario'];
                                        ?>
                                        <img class="img-perfil" src="<?php echo htmlspecialchars($imgUser); ?>" width="50px">
                                    </td>
                                    <td><?php echo htmlspecialchars($usuario['nombre_usuario']); ?></td>
                                    <td><?php echo htmlspecialchars($usuario['apellido_usuario']); ?></td>
                                    <td><?php echo htmlspecialchars($usuario['gmail_usuario']); ?></td>
                                    <td>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" id="passwordInput<?php echo $usuario['id_usuario']; ?>" value="<?php echo htmlspecialchars($usuario['contraseña_usuario']); ?>" readonly>
                                            <i class="fas fa-eye position-absolute end-0 top-50 translate-middle-y pe-3 password-toggle-icon" id="togglePasswordIcon<?php echo $usuario['id_usuario']; ?>" onclick="togglePasswordVisibility(<?php echo $usuario['id_usuario']; ?>)"></i>
                                        </div>
                                    </td>
                                    <td><?php echo htmlspecialchars($usuario['nombre_rol']); ?></td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo $usuario['id_usuario']; ?>">
                                        <?php include './Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo $usuario['id_usuario']; ?>">
                                        <?php include './Assets/bootstrap-icons-1.11.3/pencil-fill.svg'; ?>
                                        </button>
                                    </td>
                                </tr>

                                <?php
                                // Incluimos los modales para editar y eliminar usuarios
                                include("views/usuarios/editar.php");
                                include("views/usuarios/eliminar.php");
                                ?>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php
                include_once("views/usuarios/log.php");
                ?>

                <!-- Botón para ver usuarios deshabilitados -->
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-rj-blue p-3" data-bs-toggle="modal" data-bs-target="#UsuariosDesabilitados">
                    <?php include './Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Ver Usuarios Deshabilitados
                    </button>
                </div>

                <?php
                // Restaurar usuarios deshabilitados
                include_once("views/usuarios/papelera.php");
                ?>
            </div>
        </div>
    </main>

    <?php include_once("views/templates/footer.php"); ?>



    <!-- Script para mostrar/ocultar contraseñas -->
    <script>
        function togglePasswordVisibility(userId) {
            const passwordInput = document.getElementById(`passwordInput${userId}`);
            const togglePasswordIcon = document.getElementById(`togglePasswordIcon${userId}`);

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
