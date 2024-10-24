<?php
                if (isset($_GET['succes'])) {
                    switch ($_GET['succes']) {
                        case 1:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Pedido creado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                        case 2:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Pedido eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                        case 3:
                            echo "<script> Swal.fire({
                                icon: 'success',
                                title: 'Pedido editado',
                                showConfirmButton: false,
                                timer: 1500
                            }); </script>";
                            break;
                    }
                } elseif (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case 3:
                            echo "<script> alertify.error('Error al editar pedido'); </script>";
                            break;
                    }
                }