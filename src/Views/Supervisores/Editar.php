
<!-- Modal Para Crear -->
<div class="modal fade" id="editar" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-black modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar supervisor
                </h1>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="needs-validation form" id="editForm" method="post">

                        <div class="container container-form d-flex flex-column p-3">

                            <input type="hidden" name="id" data-field="id_supervisor" id="id_edit">

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold form-label" for="nombre_supervisor_edit">Nombres</label>
                                <input type="text" name="nombre_supervisor_edit" class="form-control-input campo name w-100"
                                    placeholder="Nombre" aria-label="Username" id="nombre_edit" data-field="nombre_supervisor" require
                                    aria-describedby="addon-wrapping" />
                                <div class="valid-feedback"></div>

                            </div>

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <labe class="fw-bold" for="">Apellidos</label>
                                    <input type="text" name="apellido_supervisor_edit" class="form-control-input campo name w-100"
                                        placeholder="Apellido" aria-label="Username" aria-describedby="addon-wrapping" id="apellido_edit" data-field="apellido_supervisor" require />
                            </div>

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold" for="password_create">Cédula</label>

                                <input type="text" name="cedula_supervisor_edit" class="form-control-input campo cedula w-100" placeholder="V-"
                                    aria-label="Username" aria-describedby="addon-wrapping" id="cedula_edit" data-field="cedula_supervisor" require />
                            </div>

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold" for="">Email</label>

                                <input type="" name="email_supervisor_edit" class="form-control-input campo email w-100"
                                    placeholder="example@gmail.com" aria-label="Username"
                                    aria-describedby="addon-wrapping" id="email_edit" data-field="email_supervisor" require />
                            </div>

                            <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold" for="">Teléfono</label>

                                <input type="tel" name="telefono_supervisor_edit" class="form-control-input campo telf w-100"
                                    placeholder="Introduzca el numero de telefono" aria-label="Username"
                                    aria-describedby="addon-wrapping" id="telefono_edit" data-field="telefono_supervisor" />
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