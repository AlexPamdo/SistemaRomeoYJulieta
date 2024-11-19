<?php
require_once("Templates/Head.php");
?>

<title>Gestión de Usuarios</title>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        <h3 data-intro="Este es el modulo de usuarios, desde aca se gestiona todo lo relacionado con ellos" data-step="1" class="ms-3">Gestión de Usuarios</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear usuario -->
                <div class="d-flex justify-content-between mb-4">

                    <button data-intro="Con este boton podemos crear nuevos usuarios que podran acceder al sistema" data-step="2" type="button" class="btn btn-rj-blue crear" data-bs-toggle="modal" data-bs-target="#crear">
                        Crear Usuario <?php include './src/Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <!-- Incluimos el modal del formulario de crear -->
                    <?php include_once("src/Views/Usuarios/Crear.php"); ?>
                    <?php include_once("src/Views/Usuarios/Editar.php"); ?>
                </div>

                <!-- Tabla de usuarios -->
                <div data-intro="Desde aca podemos visualizar todos los usuarios que se hayan creado" data-step="3" class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover" id="myTable">
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
                       
                        </tbody>
                    </table>
                </div>

                <!-- Botón para ver usuarios deshabilitados -->
                <div class="d-flex justify-content-end mt-4">
                    <button data-intro="Con este boton podremos visualizar todos aquellos usuarios que se han estado" data-step="7" class="btn btn-rj-blue p-3" data-bs-toggle="modal" data-bs-target="#papelera">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Ver Usuarios Deshabilitados
                    </button>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once("src/Views/Templates/Log.php");
    include_once("src/Views/Templates/Footer.php"); ?>

</body>

</html>