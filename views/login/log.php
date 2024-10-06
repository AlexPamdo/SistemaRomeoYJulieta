<?php
if (isset($_GET['succes'])) {
    switch ($_GET['succes']) {
        case 4:
            echo "<script>
Swal.fire({
    icon: 'success',
    title: 'Contraseña Cambiada exitosamente',
    showConfirmButton: false,
    timer: 1500
});
</script>";

            break;
    }
} elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 3:
            echo "<script>
alertify.error('Respuesta incorrecta');
</script>";
            break;
        case 4:
            echo "<script>
alertify.error('error al cambiar la contraseña / contraseña anterior');
</script>";
            break;
        case 5:
            echo "<script>
alertify.error('Las contraseñas no coinciden');
</script>";
            break;
    }
}