<!-- Modal Para Crear -->
<div class="modal fade" id="editar<?php echo ($confeccion['id_confeccion']) ?>" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar confeccion
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation" action="index.php?page=confecciones" method="post">

                    <div class="d-flex justify-content-around align-items-center p-3">
                        <input type="hidden" name="page" value="confecciones">


                        <!-- campos para selecionar la receta y el empleado -->
                        <div class="">
                            <div class="">

                                <!-- Buscador de Receta -->
                                <label class="fw-bold" for="validationCustom01">Patrones</label>
                                <div class="form-label input-group flex-nowrap m-2">
                                    <select class="form-select" name="patron" id="">

                                        <?php
                                        //incluimos el controlador para acceder a la funcion ver todo
                                        include_once("model/patronesModel.php");

                                        $patrones = new patrones();
                                        $patronesData = $patrones->viewAll();

                                        foreach ($patronesData as $patron) : ?>

                                        <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                        <option value="<?php echo $patron['id_patron'] ?>">
                                            <?php echo $patron['id_prenda'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback"></div>
                                </div>


                                <!-- Carta para ver la receta seleccionada -->
                                <div class="card btn btn-light">
                                    <div class="card-body p-0 d-flex justify-content-evenly align-items-center">
                                        <i class="fa-solid fa-receipt fs-1"></i>
                                        <div class="text-center">
                                            <h4 class="m-0 f-4 fw-bold">Camisa Roja</h4>
                                            <p class="m-0">id 1</p>
                                        </div>
                                        <i class="fa-solid fa-plus fs-2"></i>
                                    </div>
                                </div>
                                <div class=" d-flex justify-content-evenly">
                                    <p class="">¿no se encuentra creado? </p>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#recetas"> Nueva receta</a>
                                </div>

                                <!-- cantidad de prendas a ingresar -->
                                <div class=" flex-nowrap p-4">
                                    <label class="fw-bold" for="">Cantidad</label>
                                    <input class="form-control" type="numbre" name="cantidad"
                                        placeholder="Cantidad de prendas a confeccionar">
                                </div>

                            </div>

                            <div class="">
                                <!-- Buscador de Empleado -->
                                <label class="fw-bold" for="validationCustom01">Empleado encargado</label>
                                <div class="form-label input-group flex-nowrap m-2">
                                    <select class="form-select" name="empleado" id="">
                                        <?php
                                        //incluimos el controlador para acceder a la funcion ver todo
                                        include_once("model/empleadosModel.php");

                                        $empleados = new empleados();
                                        $empleadosData = $empleados->viewAll();

                                        foreach ($empleadosData as $empleado) : ?>

                                        <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                        <option value="<?php echo $empleado['id_empleado'] ?>">
                                            <?php echo $empleado['nombre_empleado'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback"></div>
                                </div>

                                <!-- Carta para ver la prenda seleccionada -->
                                <div class="card btn btn-light">
                                    <div class="card-body p-0 d-flex justify-content-evenly align-items-center">
                                        <i class="fa-solid fa-circle-user fs-1 "></i>
                                        <div class="text-center">
                                            <h4 class="m-0 f-4 fw-bold">Alex</h4>
                                            <p class="m-0">costurero</p>
                                        </div>
                                        <i class="fa-solid fa-plus fs-2"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <p class="">¿no se encuentra creado? </p>
                                    <a href="index.php?page=empleados"> registrar empleado</a>
                                </div>
                            </div>
                        </div>


                        <!-- campos de hora y fecha -->
                        <div class="">
                            <!-- fecha de creacion -->
                            <div class=" flex-nowrap p-4">
                                <label class="fw-bold" for="">Fecha en la cual se realizo</label>
                                <input class="form-control" name="fecha" type="date"
                                    value="<?php echo ($confeccion['fecha_fabricacion']) ?>" required>
                            </div>

                            <!-- tiempo de creacion -->
                            <div class=" flex-nowrap p-4">
                                <label class="fw-bold" for="">Tiempo en realizar</label>
                                <input class="form-control" name="tiempo" type="time"
                                    value="<?php echo ($confeccion['tiempo_fabricacion']) ?>" required>
                            </div>
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