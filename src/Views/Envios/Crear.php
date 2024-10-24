<!-- Modal Para Crear -->
<div class="modal fade" id="crearEnvio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Crear empleado</h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="index.php?page=empleados" method="post">
                    <div class="container container-form d-flex flex-column p-3">
                        <input type="hidden" name="page" value="empleados">
                        <label class="fw-bold" for="validationCustom01">Nombres</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="text" name="nombre_empleado" class="form-control" id="validationCustom01"
                                placeholder="Nombre" aria-label="Username" aria-describedby="addon-wrapping" required />
                            <div class="valid-feedback"></div>
                        </div>
                        <label class="fw-bold" for="">Apellidos</label>
                        <div class="input-group flex-nowrap m-2">
                            <input type="text" name="apellido_empleado" class="form-control" placeholder="Apellido"
                                aria-label="Username" aria-describedby="addon-wrapping" required />
                        </div>
                        <label class="fw-bold" for="">Email</label>
                        <div class="input-group flex-nowrap m-2">
                            <input type="email" name="email_empleado" class="form-control"
                                placeholder="example@gmail.com" aria-label="Username" aria-describedby="addon-wrapping"
                                required />
                        </div>
                        <label class="fw-bold" for="">Ocupacion</label>
                        <div class="input-group flex-nowrap m-2">
                            <select name="id_ocupacion" id="" class="form-control" aria-label="Username"
                                aria-describedby="addon-wrapping" required>
                                <option selected value="1">Costurero</option>
                            </select>
                        </div>

                        <label class="fw-bold" for="password_create">Sueldo</label>
                        <div class="input-group flex-nowrap m-2">
                            <input type="number" name="sueldo" class="form-control" placeholder="$$$"
                                aria-label="Username" aria-describedby="addon-wrapping" required />
                        </div>

                        <label class="fw-bold" for="password_create">Cedula</label>
                        <div class="input-group flex-nowrap m-2">
                            <input type="number" name="cedula_empleado" class="form-control" placeholder="V-"
                                aria-label="Username" aria-describedby="addon-wrapping" required />
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