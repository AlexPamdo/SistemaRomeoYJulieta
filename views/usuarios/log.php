<?php
if (isset($_GET['succes'])) {
    switch ($_GET['succes']) {
        case 1:
            echo "<script>
Swal.fire({
    icon: 'success',
    title: 'Usuario creado',
    showConfirmButton: false,
    timer: 1500
});
</script>";

            break;
        case 2:
            echo "<script>
Swal.fire({
    icon: 'success',
    title: 'Usuario eliminado',
    showConfirmButton: false,
    timer: 1500
});
</script>";
            break;
        case 3:
            echo "<script>
Swal.fire({
    icon: 'success',
    title: 'Usuario editado',
    showConfirmButton: false,
    timer: 1500
});
</script>";

            break;
        case 4:
            echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Usuario Restaurado',
        showConfirmButton: false,
        timer: 1500
    });
    </script>";
            break;
    }
}

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 3:
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error al crear usuario',
                showConfirmButton: false,
                timer: 1500
            });
            </script>";
            break;

        case 4:
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'El Email ya esta en uso',
                    showConfirmButton: false,
                    timer: 1500
                });
                </script>";
            break;
    }
}
