<!-- Modal Para Crear -->
<div class="modal fade" id="editar<?php echo ($cliente['id_cliente']) ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="bg-rj-blue modal-header">
        <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar Cliente
                </h1>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="needs-validation bg-body-secondary " method="post">

                        <div class="container container-form d-flex flex-column p-3">

                            <input type="hidden" name="id" value="<?php echo ($cliente['id_cliente']) ?>">
                            <input type="hidden" name="page" value="clientes">

                            <label class="fw-bold" for="validationCustom01">Nombres</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" name="nombre_edit" class="form-control" id="validationCustom01"
                                    placeholder="Nombre" aria-label="Username" aria-describedby="addon-wrapping"
                                    value="<?php echo $cliente['nombre'] ?>" required />
                                <div class="valid-feedback"></div>
                            </div>
                            <label class="fw-bold" for="">Apellidos</label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="text" name="apellido_edit" class="form-control" placeholder="Apellido"
                                    aria-label="Username" aria-describedby="addon-wrapping"
                                    value="<?php echo $cliente['apellido'] ?>" required />
                            </div>
                            <label class="fw-bold" for="">Telefono</label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="number" name="telefono_edit" class="form-control" placeholder="Apellido"
                                    aria-label="Username" aria-describedby="addon-wrapping"
                                    value="<?php echo $cliente['telefono'] ?>" required />
                            </div>
                            <label class="fw-bold" for="">Correo electrónico</label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="text" name="email_edit" class="form-control"
                                    placeholder="Example@gmail.com" aria-label="Username"
                                    aria-describedby="addon-wrapping" value="<?php echo $cliente['email'] ?>"
                                    required />
                            </div>

                            <label class="fw-bold" for="password_create">Contraseña </label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="password" name="contraseña_edit" class="form-control" id="password_create"
                                    placeholder="Contraseña" aria-label="Username" aria-describedby="addon-wrapping"
                                    value="<?php echo $cliente['contraseña'] ?>" required />

                            </div>


                            <label class="fw-bold" for="">Cedula</label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="text" name="cedula_edit" class="form-control"
                                    placeholder="Example@gmail.com" aria-label="Username"
                                    aria-describedby="addon-wrapping" value="<?php echo $cliente['cedula'] ?>"
                                    required />
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