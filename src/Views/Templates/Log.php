<script>
    var succes = "<?php echo isset($_GET['succes']) ? $_GET['succes'] : ''; ?>"; // Asegúrate de que se maneje como una cadena
    var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>"; // Asegúrate de que se maneje como una cadena
    var errorDesc = "<?php echo isset($_GET['errorDesc']) ? $_GET['errorDesc'] : '';?>"


    switch (succes) {
        case "create":
            alertify.success('Creacion Exitosa');
            succes = "";
            break;

        case "edit":
            alertify.success('Edicion Exitosa');
            succes = "";
            break;

        case "delete":
            alertify.success('Elemento deshabilitado');
            succes = "";
            break;

        case "restore":
            alertify.success('Restauracion Exitosa');
            succes = "";
            break;

            case "remove":
            alertify.success('Elemento Removido');
            succes = "";
            break;

            case "changePassword":
                alertify.success('Contraseña cambiada con exito');
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
            alertify.success('Error al Editar');
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

        case "other":
            Swal.fire({
                icon: "error",
                title: "Error",
                text: errorDesc,
            });

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