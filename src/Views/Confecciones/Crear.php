<?php

use src\Model\EmpleadosModel;
use src\Model\PrendasModel;

?>

<!-- Modal Para Crear -->
<div class="modal fade" id="CrearModal" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Registrar confeccion
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" action="index.php?page=confecciones&function=create" method="post" id="confeccionForm">

                    <div class="container container-form d-flex flex-column p-3">
                        <input type="hidden" name="page" value="confecciones">
                        <div class="">

                            <!-- Buscador de Receta -->
                            <label class="fw-bold" for="validationCustom01">Patrones</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <select class="custom-select" name="prenda" id="">
                                    <?php
                                    //incluimos el controlador para acceder a la funcion ver todo
                                    $prendas = new PrendasModel();
                                    $prendasData = $prendas->viewAll(0,"estado");

                                    foreach ($prendasData as $prenda) : ?>

                                        <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                        <option value="<?php echo $prenda['id_prenda'] ?>">
                                            <?php echo $prenda['nombre_prenda'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="valid-feedback"></div>
                            </div>

                            <!-- cantidad de prendas a ingresar -->
                            <div class=" flex-nowrap p-4">
                                <label class="fw-bold" for="">Cantidad</label>
                                <input class="form-control-input campo cant" type="text" name="cantidad"
                                    placeholder="Cantidad de prendas a confeccionar" id="cantidadConfeccion">
                                <span class="error" id="cantidadConfeccionError"></span>
                            </div>

                        </div>

                        <div class="">
                            <!-- Buscador de Empleado -->
                            <label class="fw-bold" for="validationCustom01">Empleado encargado</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <select class="custom-select" name="empleado" id="">
                                    <?php
                                    //incluimos el controlador para acceder a la funcion ver todo

                                    $empleados = new EmpleadosModel();
                                    $empleadosData = $empleados->viewAll(0,"ocupado");

                                    foreach ($empleadosData as $empleado) : ?>

                                        <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                        <option value="<?php echo $empleado['id_empleado'] ?>">
                                            <?php echo $empleado['nombre_empleado'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="valid-feedback"></div>
                            </div>

                            <!-- Carta para ver la prenda seleccionada -->


                            <!-- tiempo de creacion -->


                        </div>


                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" name="btnCrear" value="crear" class="btn btn-rj-blue">
                            Registrar
                        </button>

                    </div>
                </form>


            </div>
        </div>
    </div>
</div>