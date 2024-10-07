<?php
 if (isset($_GET['succes'])) {
    switch ($_GET['succes']) {
        case 1:
            echo "<script> Swal.fire({
                icon: 'success',
                title: 'Proveedor registrado',
                showConfirmButton: false,
                timer: 1500
                }); </script>";
            break;
        case 2:
            echo "<script> Swal.fire({
                icon: 'success',
                title: 'Proveedor eliminado',
                showConfirmButton: false,
                timer: 1500
                }); </script>";
            break;
        case 3:
            echo "<script> Swal.fire({
                icon: 'success',
                title: 'Proveedor editado',
                showConfirmButton: false,
                timer: 1500
                }); </script>";
            break;
    }
}