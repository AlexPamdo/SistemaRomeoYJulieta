<?php
// Protege el acceso a la página solo para usuarios autorizados
require("controllers/protectedUser.php");

require_once("templates/head.php");
?>

    <title>Proveedores</title>    
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
                        <h3 class="ms-3">Gestion de Proveedores</h3>
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
                        Crear Proveedor <?php include './Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                        require_once("views/proveedores/registrar.php")
                    ?>

                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="busqueda" type="search" placeholder="Buscar Proveedor" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>

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
                             
                                <th scope="col">Notas</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                             foreach ($proveedoresData as $proveedor) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($proveedor['id_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['nombre_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['telefono_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['gmail_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['id_tipo_proveedor']); ?></td>
                                    
                                    <td><?php echo htmlspecialchars($proveedor['notas_proveedor']); ?></td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo $proveedor['id_proveedor']; ?>">
                                        <?php include './Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo $proveedor['id_proveedor']; ?>">
                                        <?php include './Assets/bootstrap-icons-1.11.3/pencil-fill.svg'; ?>
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
            </div>
        </div>
    </main>

    <?php 
    include_once("views/proveedores/log.php");
    include_once("views/templates/footer.php"); ?>

  
</body>

</html>
