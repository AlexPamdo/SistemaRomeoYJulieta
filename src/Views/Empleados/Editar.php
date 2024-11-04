<?php use src\Model\OcupacionesModel; ?>

<!-- Modal Para Crear -->
<div class="modal fade" id="editar" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar empleado
                </h1>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="needs-validation bg-body-secondary formEdit" action="index.php?page=empleados&function=edit" method="post">

                        <div class="container container-form d-flex flex-column p-3">

                            <input type="text" name="id" id="id_edit">

                            <div>
                                <label class="fw-bold" for="validationCustom01">Nombres</label>
                                <div class="form-label input-group flex-nowrap m-2">
                                    <input type="text" name="nombre_empleado_edit" class="form-control campoEdit nameEmpleadoEdit"
                                         placeholder="Nombre" aria-label="Username" id="nombre_edit" require
                                        aria-describedby="addon-wrapping"
                                         />
                                    <div class="valid-feedback"></div>

                                </div>
                                <span class="error nameEmpleadoEditError"></span>
                            </div>

                            <div>
                                <labe class="fw-bold" for="">Apellidos</label>
                                    <div class="input-group flex-nowrap m-2">
                                        <input type="text" name="apellido_empleado_edit" class="form-control campoEdit apellidoEmpleadoEdit"
                                            placeholder="Apellido" aria-label="Username" aria-describedby="addon-wrapping" id="apellido_edit" require
                                             />

                                    </div>
                                    <span class="error apellidoEmpleadoEditError"></span>
                            </div>

                            <div>
                                <label class="fw-bold" for="">Email</label>
                                <div class="input-group flex-nowrap m-2">
                                    <input type="" name="email_empleado_edit" class="form-control campoEdit emailEmpleadoEdit"
                                        placeholder="example@gmail.com" aria-label="Username"
                                        aria-describedby="addon-wrapping" id="email_edit" require
                                        />
                                </div>
                                <span class="error emailEmpleadoEditError"></span>
                            </div>

                            <div>
                                <label class="fw-bold" for="">Telefono</label>
                                <div class="input-group flex-nowrap m-2">
                                    <input type="tel" name="telefono_empleado_edit" class="form-control campoEdit telfEmpleadoEdit"
                                        placeholder="Introduzca el numero de telefono" aria-label="Username"
                                        aria-describedby="addon-wrapping" id="telefono_edit"
                                        />
                                </div>
                                <span class="error telfEmpleadoEditError"></span>
                            </div>

                          
                            <label class="fw-bold" for="">Ocupacion</label>
                            <div class="input-group flex-nowrap m-2">
                                <select name="id_ocupacion_edit" class="form-control" aria-label="Username" id="ocupacion_edit" require
                                    aria-describedby="addon-wrapping">
                                    <option selected >Seleccione una ocupacion</option>

                                    <?php $ocupacionesModel = new OcupacionesModel();
                                    $ocupacionesData = $ocupacionesModel->viewAll(); ?>
        
                                    <?php foreach($ocupacionesData as $ocupacion):?>
                                        <option value="<?php echo $ocupacion["id_ocupacion"]?>"><?php echo $ocupacion["ocupacion"]?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                            <label class="fw-bold" for="password_create">Cedula</label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="text" name="cedula_empleado_edit" class="form-control campoEdit cedulaEmpleadoEdit" placeholder="V-"
                                    aria-label="Username" aria-describedby="addon-wrapping" id="cedula_edit" require
                                     />
                            </div>
                            <span class="error cedulaEmpleadoEditError"></span>
                            </div>




                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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