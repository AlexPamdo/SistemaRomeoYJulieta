<?php

if (isset($_GET['succes'])) {
    switch ($_GET['succes']) {
        case 1:
            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Patrón creado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
            break;
        case 2:
            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Patrón editado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
            break;
        case 3:
            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Patrón eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
            break;
    }
}elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 1:
            echo "<script> Swal.fire({
                                icon: 'error',
                                title: 'Error al crear patron',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
            break;
            case 4:
                echo "<script> Swal.fire({
                                    icon: 'error',
                                    title: 'Ingrese un material valido',
                                    showConfirmButton: false,
                                    timer: 1500
                                }); </script>";
                break;
    }
}
