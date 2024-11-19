<script>
      var succes = "<?php echo isset($_GET['succes']) ? $_GET['succes'] : ''; ?>"; // Asegúrate de que se maneje como una cadena
      var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>"; // Asegúrate de que se maneje como una cadena

    switch (succes) {
        case "create":
            alertify.success('Confeccion Creada');
            succes = "";
            break;

        case "edit":
            alertify.success('Confeccion Editada');
            succes = "";
            break;

        case "delete":
            alertify.success('Confeccion Eliminada');
            succes = "";
            break;

        case "restore":
            alertify.success('Confeccion Restaurada');
            succes = "";
            break;

        default:

        break;
    }

    switch (error) {
        case "create":
            alertify.success('Error al crear Confeccion');
            succes = "";
            break;

        case "edit":
            alertify.success('Error al editar Confeccion');
            succes = "";
            break;

        case "delete":
            alertify.success('Error al eliminar Confeccion');
            succes = "";
            break;

        case "restore":
            alertify.success('Error al restaurar Confeccion');
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
