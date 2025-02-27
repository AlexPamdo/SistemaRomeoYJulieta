
<!-- Modal Para Crear -->
<div class="modal fade" id="crear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-black modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Registrar Supervisor
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" id="createForm" method="post">
                    <div class="container container-form d-flex flex-column p-3">
                        <input type="hidden" name="page" value="supervisores">

                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="nameSupervisor">Nombres</label>

                            <input type="text" name="nombre_supervisor" class="form-control-input campo nameSupervisor w-100"
                                id="nameSupervisor" placeholder="Nombre" aria-label="Username"
                                aria-describedby="addon-wrapping"
                                title="No se permiten números. Solo letras y espacios." />

                            <div class="valid-feedback"></div>
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="apellidoSupervisor">Apellidos</label>
                            <input type="text" n="[A-Za-z\s]+" name="apellido_supervisor" class="form-control-input apellidoSupervisor w-100"
                                id="apellidoSupervisor" placeholder="Nombre" aria-label="Username"
                                aria-describedby="addon-wrapping"
                                title="No se permiten números. Solo letras y espacios." />
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="cedulaSupervisor">Cédula</label>

                            <input type="text" name="cedula_supervisor" class="form-control-input w-100 cedulaSupervisor" id="cedulaSupervisor"
                                placeholder="Introduzca la cedula" aria-label="Username"
                                aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="emailSupervisor">Email</label>
                            <input type="text" name="email_supervisor" class="form-control-input emailSupervisor w-100" id="emailSupervisor"
                                placeholder="Introduzca el Email" aria-label="Username"
                                aria-describedby="addon-wrapping" />
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="">Teléfono</label>
                            <input type="text" name="telefono_supervisor" class="form-control-input telefonoSupervisor w-100" id="telfSupervisor"
                                placeholder="Introduzca el numero de telefono" aria-label="Username"
                                aria-describedby="addon-wrapping" />
                        </div>

                    


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