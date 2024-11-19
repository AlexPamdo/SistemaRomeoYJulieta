<script>
      var succes = "<?php echo isset($_GET['succes']) ? $_GET['succes'] : ''; ?>"; // Asegúrate de que se maneje como una cadena
      var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>"; // Asegúrate de que se maneje como una cadena

    switch (succes) {
        case "create":
            alertify.success('Prenda Creada');
            succes = "";
            break;

        case "edit":
            alertify.success('Prenda Editada');
            succes = "";
            break;

        case "delete":
            alertify.success('Prenda Eliminada');
            succes = "";
            break;

        case "restore":
            alertify.success('Prenda Restaurada');
            succes = "";
            break;

        default:

        break;
    }

    switch (error) {
        case "create":
            alertify.success('Error al crear Prenda');
            succes = "";
            break;

        case "edit":
            alertify.success('Error al editar Prenda');
            succes = "";
            break;

        case "delete":
            alertify.success('Error al eliminar Prenda');
            succes = "";
            break;

        case "restore":
            alertify.success('Error al restaurar Prenda');
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
