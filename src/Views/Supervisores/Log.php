<script>
      var succes = "<?php echo isset($_GET['succes']) ? $_GET['succes'] : ''; ?>"; // Asegúrate de que se maneje como una cadena
      var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>"; // Asegúrate de que se maneje como una cadena

    switch (succes) {
        case "create":
            alertify.success('Supervisor Creado');
            succes = "";
            break;

        case "edit":
            alertify.success('Supervisor Editado');
            succes = "";
            break;

        case "delete":
            alertify.success('Supervisor Eliminado');
            succes = "";
            break;

        case "restore":
            alertify.success('Supervisor Restaurado');
            succes = "";
            break;

        default:

        break;
    }

    switch (error) {
        case "create":
            alertify.success('Error al crear Supervisor');
            succes = "";
            break;

        case "edit":
            alertify.success('Error al editar Supervisor');
            succes = "";
            break;

        case "delete":
            alertify.success('Error al eliminar Supervisor');
            succes = "";
            break;

        case "restore":
            alertify.success('Error al restaurar Supervisor');
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
