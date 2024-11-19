<!-- Modal Para Editar Usuario -->
<div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="bg-dark modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Editar usuario</h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation form" method="post" id="updateForm" enctype="multipart/form-data">

                    <input type="hidden" name="id" id="id_edit">

                    <div class="col-md-10 mx-auto">
                        <div class="p-3">
                            <label class="fw-bold" for="nameUser">Nombres</label>
                            <input type="text" name="nombre_usuario" class="form-control-input campo name" id="nameUser_edit" placeholder="Introduzca los nombres" />

                        </div>

                        <div class="p-3">
                            <label class="fw-bold" for="apellidoUser">Apellidos</label>
                            <input type="text" name="apellido_usuario" class="form-control-input campo name" id="apellidoUser_edit" placeholder="Introduzca los apellidos" />

                        </div>

                        <div class="p-3">
                            <label class="fw-bold" for="gmail_usuario">Correo electrónico</label>
                            <input type="email" name="gmail_usuario" class="form-control-input campo email" id="gmail_usuario_edit" placeholder="Introduzca el email" />

                        </div>

                        <div class="p-3">
                            <label class="fw-bold" for="password_create">Contraseña</label>
                            <div class="input-group after">
                                <input type="password" name="password_usuario" class="form-control-input campo pass" id="password_create_edit"
                                    placeholder="Introduzca la contraseña" minlength="8"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número." />
                            </div>
                        </div>

                        <div class="p-3 text-center">
                            <label class="fw-bold">Rol</label>

                            <div class="d-flex justify-content-around">

                                <input type="hidden" name="rol_usuario" value="">

                                <div class="d-flex flex-column align-items-center">
                                    <input type="radio" id="id_roles1_edit" class="rol_edit" name="rol_usuario" value="1" >
                                    <label for="rol1">Admin</label>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <input type="radio" id="id_roles2_edit" class="rol_edit" name="rol_usuario" value="2" >
                                    <label for="rol2">User</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="btnUpdate" value="edit" class="btn btn-rj-blue">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>