<?php
require_once("Templates/Head.php");
?>

<title>Reportes</title>
</head>

<body class="bg-light">

    <main class="d-flex">

        <!-- Barra lateral -->
        <?php
        include("src/Views/Templates/Header.php");
        ?>

        <div id="main-content" class="flex-grow-1">
            <!-- Header de la página -->
            <header class="bg-dark p-3 d-flex justify-content-between align-items-center border-bottom text-white">
                <div>
                    <div class="d-flex align-items-center">
                        <!-- le vas a poner un icono tambien -->
                        <h3 class="ms-3">Reportes</h3>
                    </div>
                </div>
                <!-- Menú desplegable del perfil -->
                <?php include_once("src/Views/Templates/MenuDesplegable.php"); ?>
            </header>

            <!-- Contenido principal -->
            <div class="container mt-4 p-4">

                <!-- Aqui vas a meter los reportes pire tqm -->

            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'src/Views/Templates/Footer.php'; ?>
</body>

</html>