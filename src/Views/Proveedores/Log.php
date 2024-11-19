<script>
      var succes = "<?php echo isset($_GET['succes']) ? $_GET['succes'] : ''; ?>"; // Asegúrate de que se maneje como una cadena
      var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>"; // Asegúrate de que se maneje como una cadena

    switch (succes) {
        case "create":
            alertify.success('Registro Exitosa');
            succes = "";
            break;

        case "edit":
            alertify.success('Edicion Exitosa');
            succes = "";
            break;

        case "delete":
            alertify.success('Eliminacion Exitosa');
            succes = "";
            break;

        case "restore":
            alertify.success('Restauracion Exitosa');
            succes = "";
            break;

        default:

        break;
    }

    switch (error) {
        case "create":
            alertify.success('Error al Crear');
            succes = "";
            break;

        case "edit":
            alertify.success('Error al Crear');
            succes = "";
            break;

        case "delete":
            alertify.success('Error al Eliminar');
            succes = "";
            break;

        case "restore":
            alertify.success('Error al Restaurar');
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
