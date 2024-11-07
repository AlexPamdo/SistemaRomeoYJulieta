<?php

use src\Model\OcupacionesModel;

$ocupacionesModel = new OcupacionesModel();
$ocupacionesData = $ocupacionesModel->viewAll(); ?>

<!-- Modal Para Crear -->
<div class="modal fade" id="editar" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-black modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar empleado
                </h1>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="needs-validation form" action="index.php?page=empleados&function=edit" method="post">

                        <div class="container container-form d-flex flex-column p-3">

                            <input type="hidden" name="id" id="id_edit">

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold form-label" for="nombre_empleado_edit">Nombres</label>
                                <input type="text" name="nombre_empleado_edit" class="form-control-input campo name w-100"
                                    placeholder="Nombre" aria-label="Username" id="nombre_edit" require
                                    aria-describedby="addon-wrapping" />
                                <div class="valid-feedback"></div>

                            </div>

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <labe class="fw-bold" for="">Apellidos</label>
                                    <input type="text" name="apellido_empleado_edit" class="form-control-input campo name w-100"
                                        placeholder="Apellido" aria-label="Username" aria-describedby="addon-wrapping" id="apellido_edit" require />
                            </div>

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold" for="password_create">Cedula</label>

                                <input type="text" name="cedula_empleado_edit" class="form-control-input campo cedula w-100" placeholder="V-"
                                    aria-label="Username" aria-describedby="addon-wrapping" id="cedula_edit" require />
                            </div>

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold" for="">Email</label>

                                <input type="" name="email_empleado_edit" class="form-control-input campo email w-100"
                                    placeholder="example@gmail.com" aria-label="Username"
                                    aria-describedby="addon-wrapping" id="email_edit" require />
                            </div>

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold" for="">Telefono</label>

                                <input type="tel" name="telefono_empleado_edit" class="form-control-input campo telf w-100"
                                    placeholder="Introduzca el numero de telefono" aria-label="Username"
                                    aria-describedby="addon-wrapping" id="telefono_edit" />
                            </div>

                            <div class=" flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold" for="">Ocupacion</label>
                                <select name="id_ocupacion_edit" class="custom-select-edit" aria-label="Username" id="ocupacion_edit" require
                                    aria-describedby="addon-wrapping">
                                    <option selected>Seleccione una ocupacion</option>
                                    <?php foreach ($ocupacionesData as $ocupacion): ?>
                                        <option value="<?php echo $ocupacion["id_ocupacion"] ?>"><?php echo $ocupacion["ocupacion"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <button type="submit" name="btnUpdate" value="edit" class="btn btn-rj-blue">
                                Registrar
                            </button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>