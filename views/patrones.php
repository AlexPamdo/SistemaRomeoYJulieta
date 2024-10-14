<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");
require_once("templates/head.php");
?>

<title>Prendas</title>

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
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-rulers" viewBox="0 0 16 16">
  <path d="M1 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h5v-1H2v-1h4v-1H4v-1h2v-1H2v-1h4V9H4V8h2V7H2V6h4V2h1v4h1V4h1v2h1V2h1v4h1V4h1v2h1V2h1v4h1V1a1 1 0 0 0-1-1z"/>
</svg>
                        <h3 class="ms-3">Patrones</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear patrón -->
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal"
                        data-bs-target="#crearPatrones">
                        Crear Prenda/Patron <?php include './Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                    require_once("views/patrones/crear.php");
                    ?>

                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Elemento"
                            aria-label="Search">
                        <button class="btn btn-custom-success" type="submit">Buscar</button>
                    </form>
                </div>

                <!-- Tabla de patrones -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col"></th>
                                <th scope="col">Prenda</th>
                                <th scope="col">Materiales</th>
                                <th scope="col">Costo Total</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patronesData as $patron) : ?>
                                <tr class="table-custom-row">
                                    <td><?php echo htmlspecialchars($patron['id_patron']); ?></td>
                                    <td><img class="img-prenda" src="<?php echo htmlspecialchars($patron['img']); ?>" alt="" height="60px" width="60px"></td>
                                    <td><?php echo htmlspecialchars($patron['nombre_patron']); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal"
                                            data-bs-target="#materialesPatron<?php echo $patron['id_patron']; ?>">
                                            <?php include './Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?>
                                        </button>
                                    </td>
                                    <td><?php echo htmlspecialchars($patron['costo_unitario']); ?> bs</td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal"
                                            data-bs-target="#eliminar<?php echo $patron['id_patron']; ?>">
                                            <?php include './Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal"
                                            data-bs-target="#editarPatron<?php echo $patron['id_patron']; ?>">
                                            <?php include './Assets/bootstrap-icons-1.11.3/pencil-fill.svg'; ?>
                                        </button>
                                    </td>
                                </tr>

                                <?php
                                // Incluimos los modales para editar, eliminar y visualizar patrones

                                include("views/patrones/eliminar.php");

                                ?>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                    <!-- Modal para visualizar materiales de patrones
                     NOTA: lo puse aqui afuera pq se buggeaba si lo ponia dentro de otra tabla :u-->
                    <?php foreach ($patronesData as $patron) :
                
                        include("views/patrones/editar.php");
                        include("views/patrones/materialesPatron.php");
                    endforeach; ?>
                </div>
            </div>
    </main>

    <?php
    include_once("views/patrones/log.php");
    include_once("views/templates/footer.php");
    ?>
    <script src="Assets/js/patrones.js"></script>

</body>

</html>