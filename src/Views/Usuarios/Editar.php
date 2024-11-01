<!-- Modal Para Editar Usuario -->
<div class="modal fade" id="editar<?php echo ($usuario['id_usuario']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Editar usuario</h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation formEdit" method="post" action="index.php?page=usuarios&function=edit" enctype="multipart/form-data">
                    <div class="container p-3">
                        <input type="hidden" name="id" value="<?php echo ($usuario['id_usuario']) ?>">

                        <div class="row mb-3 container">
                            <div class="d-flex">
                                <div class="m-4">
                                    <div class="m-2">
                                        <label class="fw-bold" for="nombre_usuario_edit">Nombres</label>
                                        <input type="text" name="nombre_usuario_edit" class="form-control nameUserEdit campoEdit"  placeholder="Introduzca los nombres" value="<?php echo $usuario['nombre_usuario'] ?>" />
                                        <span class="error nameUserEditError"></span>
                                    </div>

                                    <div class="m-2">
                                        <label class="fw-bold" for="apellido_usuario_edit">Apellidos</label>
                                        <input type="text" name="apellido_usuario_edit" class="form-control campoEdit apellidoUserEdit" placeholder="Introduzca los apellidos" value="<?php echo $usuario['apellido_usuario'] ?>" />
                                        <span class="apellidoUserEditError"></span>
                                    </div>

                                    <div class="m-2">
                                        <label class="fw-bold" for="id_roles_edit">Rol</label>
                                        <select class="form-select" name="id_roles_edit" >
                                            <option selected value="1">Admin</option>
                                            <option value="2">User</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="m-4">
                                    <div class="m-2">
                                        <label class="fw-bold" for="gmail_usuario_edit">Correo electrónico</label>
                                        <input type="email" name="gmail_usuario_edit" class="form-control campoEdit gmail_usuarioEdit" placeholder="Introduzca el email" value="<?php echo $usuario['gmail_usuario'] ?>" />
                                        <span class="error gmail_usuarioEditError"></span>
                                    </div>

                                    <div class="m-2">
                                        <label class="fw-bold" for="password_usuario_edit">Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" name="password_usuario_edit" class="form-control campoEdit  password_createEdit"
                                                placeholder="Introduzca la contraseña" minlength="8"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número." value="<?php echo $usuario['contraseña_usuario'] ?>" />

                                         
                                        </div>
                                        <span class="error password_createEditError"></span>
                                    </div>

                                </div>


                            </div>
                        </div>






                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="btnUpdate" value="edit" class="btn btn-rj-blue">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
