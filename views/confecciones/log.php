<?php
if (isset($_GET['succes'])) {
    switch ($_GET['succes']) {
        case 1:
            echo "<script> Swal.fire({
  icon: 'success',
  title: 'Usuario creado',
  showConfirmButton: false,
  timer: 1500
}); </script>";

            break;
        case 2:
            echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Usuario eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";
            break;
        case 3:
            echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Usuario editado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";

            break;
    }
} elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 3:
            echo "<script> alertify.error('error al editar usuario'); </script>";
        case 5:
            echo "<script> Swal.fire({
                                        icon: 'error',
                                        title: 'Cantidad de material insuficiente',
                                        showConfirmButton: false,
                                        timer: 1500
                                      }); </script>";

            break;
    }
}