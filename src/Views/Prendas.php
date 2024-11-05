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
                        data-bs-target="#registrar">
                        Crear Prenda/Patron <?php include './src/Assets/bootstrap-icons-1.11.3/plus-lg.svg'; ?>
                    </button>

                    <?php
                    require_once("src/Views/Prendas/Registrar.php");
                    ?>

                    <a href="index.php?page=prendas&function=print" target="_blank" class="btn btn-warning ms-1">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/printer-fill.svg'; ?>
                    </a>


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
                                <th scope="col">Color</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Género</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prendaData as $prenda) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($prenda['id_prenda']); ?></td>
                                    <td><img class="img-prenda" src="<?php echo htmlspecialchars($prenda['img_prenda']); ?>" alt="" height="60px" width="60px"></td>
                                    <input type="hidden" name="img" id="img_edit" value="<?php echo htmlspecialchars($prenda['img_prenda']); ?>">
                                    <td class="desc"><?php echo htmlspecialchars($prenda['nombre_prenda']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['categoria']); ?></td>
                                    <input type="hidden" class="categoria" value="<?php echo htmlspecialchars($prenda['id_categoria']); ?>">
                                    <td><?php echo htmlspecialchars($prenda['talla']); ?>cm</td>
                                    <input type="hidden" class="talla" value="<?php echo htmlspecialchars($prenda['id_talla']); ?>">
                                    <td><?php echo htmlspecialchars($prenda['coleccion']); ?></td>
                                    <input type="hidden" class="coleccion" value="<?php echo htmlspecialchars($prenda['id_coleccion']); ?>">
                                    <td><?php echo htmlspecialchars($prenda['color']); ?></td>
                                    <input type="hidden" class="color" value="<?php echo htmlspecialchars($prenda['id_color']); ?>">
                                    <td class="cantidad"><?php echo htmlspecialchars($prenda['stock']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['genero']); ?></td>
                                    <input type="hidden" class="genero" value="<?php echo htmlspecialchars($prenda['genero']); ?>">
                                    <td class="precio"><?php echo htmlspecialchars($prenda['precio_unitario']); ?> <span>bs</span></td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal"
                                            data-bs-target="#materialesPatron<?php echo $prenda['id_prenda']; ?>">
                                            <?php include './src/Assets/bootstrap-icons-1.11.3/eye-fill.svg'; ?>
                                        </button>
                                        <button type="button" class="btn btn-danger me-1 eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-success me-1 editar" data-bs-toggle="modal" data-bs-target="#editar">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <!-- Botón para ver prendas sin stocl -->
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-rj-blue p-3" data-bs-toggle="modal" data-bs-target="#ningunStock" data-intro="Aqui se ven las prendas que no tienen stock" data-step="2">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Prendas sin stock
                    </button>
                </div>

                <?php
                include("src/Views/Prendas/Editar.php");
                include_once("src/Views/Prendas/SinStock.php");
                ?>

                <!-- Botón para ver usuarios items deshabilitados -->
                <div class="d-flex justify-content-end mt-4">
                    <button data-intro="Con este boton podremos visualizar todos aquellos usuarios que se han estado" data-step="7" class="btn btn-rj-blue p-3" data-bs-toggle="modal" data-bs-target="#elementosDesabilitados" data-intro="Desde este se puede ver las prendas deshabilitadas" data-step="2">
                        <?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?> Ver Elementos Deshabilitados
                    </button>
                </div>

                <?php
                // Restaurar
                include_once("src/Views/Prendas/Papelera.php");
                foreach ($prendaData as $prenda) :
                        include("src/Views/Prendas/Editar.php");
                        include("src/Views/Prendas/MaterialesPrenda.php");
                endforeach; ?>
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