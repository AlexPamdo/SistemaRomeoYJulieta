<script>
      var succes = "<?php echo isset($_GET['succes']) ? $_GET['succes'] : ''; ?>"; // Asegúrate de que se maneje como una cadena
      var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>"; // Asegúrate de que se maneje como una cadena

    switch (succes) {
        case "create":
            alertify.success('Usuario Creado');
            succes = "";
            break;

        case "edit":
            alertify.success('Usuario Editado');
            succes = "";
            break;

        case "delete":
            alertify.success('Usuario Eliminado');
            succes = "";
            break;

        case "restore":
            alertify.success('Usuario Restaurado');
            succes = "";
            break;

        default:

        break;
    }

    switch (error) {
        case "create":
            alertify.success('Error al crear usuario');
            succes = "";
            break;

        case "edit":
            alertify.success('Error al editar usuario');
            succes = "";
            break;

        case "delete":
            alertify.success('Error al eliminar usuario');
            succes = "";
            break;

        case "restore":
            alertify.success('Error al restaurar usuario');
            succes = "";
            break;

        default:

        break;

    }

    function removeURLParameter(param) {
        const url = new URL(window.location.href);
        url.searchParams.delete(param); // Elimina el parámetro específico
        window.history.replaceState({}, document.title, url);
    }


    removeURLParameter("succes");
    removeURLParameter("error");


</script>

