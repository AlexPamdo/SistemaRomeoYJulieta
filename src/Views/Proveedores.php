<?php
require_once("Templates/Head.php");
?>

    <title>Proveedores</title>    
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        <h3 class="ms-3" data-intro="Este es el modulo de Proveedores, desde aqui se pueden visualizar todos los proovedores en el sistema" data-step="1">Gestion de Proveedores</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear proveedor -->
                <div class="d-flex justify-content-between mb-4">

                <?php if ($_SESSION['rol'] == 1) { ?>
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal" data-intro="Desde este boton podemos registrar un nuevo proveedor en el sistema" data-step="2">
                        Crear Proveedor <?php include './src/Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>
                    <?php } ?>

                    <?php
                        require_once("src/Views/Proveedores/Registrar.php");  
                    ?>        
                </div>

                <!-- Tabla de proveedores -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover" id="myTable">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">RIF</th>

                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>                
                                <th scope="col">Notas</th>
                                <?php if ($_SESSION['rol'] == 1) { ?>
                                <th scope="col">Acciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                             foreach ($proveedoresData as $proveedor) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($proveedor['id_proveedor']); ?></td>
                                    <td class="nombre"><?php echo htmlspecialchars($proveedor['nombre_proveedor']); ?></td>
                                    <td class="rif"><?php echo htmlspecialchars($proveedor['rif_proveedor']); ?></td>
                                    <td class="telefono"><?php echo htmlspecialchars($proveedor['telefono_proveedor']); ?></td>
                                    <td class="correo"><?php echo htmlspecialchars($proveedor['gmail_proveedor']); ?></td>
                                  
                                    
                                    <td class="notas"><?php echo htmlspecialchars($proveedor['notas_proveedor']); ?></td>

                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-custom-danger m-1 eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">
                                        <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?>
                                        </button>
                                        <button type="button" class="btn btn-custom-success m-1 editar" data-bs-toggle="modal" data-bs-target="#editar">
                                        <?php include './src/Assets/bootstrap-icons-1.11.3/pencil-fill.svg'; ?>
                                        </button>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botón para ver usuarios items deshabilitados -->
                <div class="d-flex justify-content-end mt-4">
                    <button  data-intro="Con este boton podremos visualizar todos aquellos usuarios que se han estado" data-step="7" class="btn btn-rj-blue p-3" data-bs-toggle="modal" data-bs-target="#elementosDesabilitados">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Ver Proveedores Deshabilitados
                    </button>
                </div>

                <?php
                    include_once("src/Views/Proveedores/Papelera.php");
                    require_once("src/Views/Proveedores/Editar.php");
       
                ?>
            </div>
        </div>
    </main>

    <?php 
       include_once("src/Views/Templates/Log.php");
    include_once("src/Views/Templates/Footer.php"); ?>

  
</body>

</html>
