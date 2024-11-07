<?php

use src\Model\OcupacionesModel;

$ocupacionesModel = new OcupacionesModel();
$ocupacionesData = $ocupacionesModel->viewAll(); ?>

<!-- Modal Para Crear -->
<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-black modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Crear empleado
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" action="index.php?page=empleados&function=create" method="post">
                    <div class="container container-form d-flex flex-column p-3">
                        <input type="hidden" name="page" value="empleados">

                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="nameEmpleado">Nombres</label>

                            <input type="text" pattern="[A-Za-z\s]+" name="nombre_empleado" class="form-control-input campo name w-100"
                                id="nameEmpleado" placeholder="Nombre" aria-label="Username"
                                aria-describedby="addon-wrapping"
                                title="No se permiten números. Solo letras y espacios." />

                            <div class="valid-feedback"></div>
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="apellidoEmpleado">Apellidos</label>
                            <input type="text" pattern="[A-Za-z\s]+" name="apellido_empleado" class="form-control-input campo name w-100"
                                id="apellidoEmpleado" placeholder="Nombre" aria-label="Username"
                                aria-describedby="addon-wrapping"
                                title="No se permiten números. Solo letras y espacios." />
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="cedulaEmpleado">Cedula</label>

                            <input type="text" name="cedula_empleado" class="form-control-input campo cedula w-100" id="cedulaEmpleado"
                                placeholder="Introduzca la cedula" aria-label="Username"
                                aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="emailEmpleado">Email</label>
                            <input type="email" name="email_empleado" class="form-control-input campo email w-100" id="emailEmpleado"
                                placeholder="Introduzca el Email" aria-label="Username"
                                aria-describedby="addon-wrapping" />
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="">Telefono</label>
                            <input type="text" name="telefono_empleado" class="form-control-input campo telf w-100" id="telfEmpleado"
                                placeholder="Introduzca el numero de telefono" aria-label="Username"
                                aria-describedby="addon-wrapping" />
                        </div>

                        <label class="fw-bold" for="">Ocupacion</label>
                        <div class="input-group flex-nowrap m-2">
                            <select name="id_ocupacion" class="custom-select" required>
                                <option selected value="">Seleccione una ocupacion</option>
                                <?php foreach ($ocupacionesData as $ocupacion): ?>
                                    <option value="<?php echo $ocupacion["id_ocupacion"] ?>" ><?php echo $ocupacion["ocupacion"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <script>
                           
                        </script>



                    </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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