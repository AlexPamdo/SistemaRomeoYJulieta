<?php
require_once("Templates/Head.php");
?>

<title>Prendas</title>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                        </svg>
                        <h3 class="ms-3" data-intro="Este es el modulo de prendas, desde aqui se pueden visualizar todas las prendas en el sistema" data-step="1">Gestor de Prendas Terminadas</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="p-4">
                <!-- Barra de búsqueda y botón de crear -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-intro="Desde este boton podemos registrar un nuevo patron en el sistema" data-step="2"
                        data-bs-target="#crear">
                        Crear Prenda/Patron <?php include './src/Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>
                    <?php
                    require_once("src/Views/Prendas/Registrar.php");
                    include("src/Views/Prendas/Editar.php");
                    ?>
                </div>


                <!-- Tabla de prendas -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover" id="myTable">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">Identificador</th>
                                <th scope="col"></th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Colección</th>
                        
                                <th scope="col">Cantidad</th>
                                <th scope="col">Género</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                    </table>
                </div>

                <!-- Botón para ver usuarios items deshabilitados -->
                <div class="d-flex justify-content-end mt-4">
                    <button data-intro="Con este boton podremos visualizar todos aquellos usuarios que se han estado" data-step="7" class="btn btn-rj-blue p-3" data-bs-toggle="modal" data-bs-target="#papelera" data-intro="Desde este se puede ver las prendas deshabilitadas" data-step="2">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Ver Elementos Deshabilitados
                    </button>
                </div>


            </div>
        </div>
    </main>

    <?php
    include_once("src/Views/Templates/Log.php");
    include_once("src/Views/Templates/Footer.php");
    ?>
 <script src="src/Assets/js/patrones.js"></script>


</body>

</html>