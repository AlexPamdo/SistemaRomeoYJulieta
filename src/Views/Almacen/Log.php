<script>
    var succes = "<?php echo isset($_GET['succes']) ? $_GET['succes'] : ''; ?>"; // Asegúrate de que se maneje como una cadena
    var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>"; // Asegúrate de que se maneje como una cadena

    
    switch (succes) {
        case "create":
            alertify.success('Item Creado');
            succes = "";
            break;

        case "edit":
            alertify.success('Item Editado');
            succes = "";
            break;

        case "delete":
            alertify.success('Item Eliminado');
            succes = "";
            break;

        case "restore":
            alertify.success('Item Restaurado');
            succes = "";
            break;

        default:

            break;
    }

    switch (error) {
        case "create":
            alertify.success('Error al crear Item');
            succes = "";
            break;

        case "edit":
            alertify.success('Error al editar Item');
            succes = "";
            break;

        case "delete":
            alertify.success('Error al eliminar Item');
            succes = "";
            break;

        case "restore":
            alertify.success('Error al restaurar Item');
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