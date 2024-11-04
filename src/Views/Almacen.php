<?php
require_once("Templates/Head.php");
?>

<title>Almacen</title>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                        </svg>
                        <h3 class="ms-3"  data-intro="Este es el modulo de Almacen, desde aca se gestiona todo lo relacionado con la materia prima" data-step="1">Gestion de Almacen</h3>
                    </div>
                    <!-- Menú desplegable del perfil -->
                    <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido principal -->
            <div class="ms-sm-auto p-4 bg-custom-content">
                <!-- Barra de búsqueda y botón de crear material -->
                <div class="d-flex justify-content-between mb-4">

                <?php if ($_SESSION['rol'] == 1) { ?>
                    <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModalM"  data-intro="Desde este boton podemos registrar materiales en el sistema" data-step="2">
                        Registrar Elemento <?php include './src/Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>
                    <?php } ?>

                    <?php require_once("src/Views/Almacen/Crear.php");
                             require_once("src/Views/Almacen/Editar.php");
                             require_once("src/Views/Templates/Eliminar.php") ?>
                    

                    <a href="index.php?page=almacen&function=print" target="_blank" class="btn btn-warning ms-1">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/printer-fill.svg'; ?>
                        </a>
                    
                </div>
                <!-- Tabla de materiales -->
                <div class="table-responsive bg-white rounded shadow-sm p-4">
                    <table class="table table-hover" id="myTable">
                        <thead class="table-custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Color</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Precio</th>
                                <?php if ($_SESSION['rol'] == 1) { ?>
                                <th scope="col">Acciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materialData as $material) : ?>
                               
                                <tr class="table-custom-row">
                                    <td><?php echo htmlspecialchars($material['id_material']); ?></td>
                                    <td class="desc"><?php echo htmlspecialchars($material['nombre_material']); ?></td>
                                    <td><?php echo htmlspecialchars($material['tipo']); ?></td>
                                    <input type="hidden" class="tipo" value="<?php echo htmlspecialchars($material['tipo_material']); ?>">
                                    <td class="color"><?php echo htmlspecialchars($material['color_name']); ?></td>
                                    <input type="hidden" class="color" value="<?php echo htmlspecialchars($material['color_material']); ?>">
                                    <td class="stock"><?php echo htmlspecialchars($material['stock']); ?></td>
                                    <td class="precio"><?php echo htmlspecialchars($material['precio']); ?> bs</td>

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
                    <button  data-intro="Con este boton podremos visualizar todos aquellos usuarios que se han eliminado" data-step="7" class="btn btn-rj-blue p-3 " data-bs-toggle="modal" data-bs-target="#elementosDesabilitados">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Ver Elementos Deshabilitados
                    </button>
                </div>

                <?php
                // Restaurar
                include_once("src/Views/Almacen/Papelera.php");
                ?>
            </div>
        </div>
    </main>

    <?php
    include_once("src/Views/Templates/Log.php");
    include_once("src/Views/Templates/Footer.php"); ?>






</body>

</html>