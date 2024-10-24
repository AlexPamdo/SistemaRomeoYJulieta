<?php
    
      if (isset($_GET['success'])) {
          switch ($_GET['success']) {
              case 1:
                  echo "<script> Swal.fire({
                      icon: 'success',
                      title: 'Prenda creada',
                      showConfirmButton: false,
                      timer: 1500
                  }); </script>";
                  break;
              case 2:
                  echo "<script> Swal.fire({
                      icon: 'success',
                      title: 'Prenda eliminada',
                      showConfirmButton: false,
                      timer: 1500
                  }); </script>";
                  break;
              case 3:
                  echo "<script> Swal.fire({
                      icon: 'success',
                      title: 'Prenda editada',
                      showConfirmButton: false,
                      timer: 1500
                  }); </script>";
                  break;
          }
      } elseif (isset($_GET['error'])) {
          switch ($_GET['error']) {
              case 3:
                  echo "<script> alertify.error('Error al editar la prenda'); </script>";
                  break;
          }
      }