<!-- Modal Para Editar Usuario -->
<div class="modal fade" id="editar<?php echo ($usuario['id_usuario']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Editar usuario</h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data">
                    <div class="container p-3">
                        <input type="hidden" name="id" value="<?php echo ($usuario['id_usuario']) ?>">
                        <input type="hidden" name="page" value="usuarios">
                        <input type="hidden" name="fuction" value="edit">


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="fw-bold" for="nombre_usuario_edit">Nombres</label>
                                <input type="text" name="nombre_usuario_edit" class="form-control" id="nombre_usuario_edit" placeholder="Introduzca los nombres" value="<?php echo $usuario['nombre_usuario'] ?>" required />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" for="apellido_usuario_edit">Apellidos</label>
                                <input type="text" name="apellido_usuario_edit" class="form-control" id="apellido_usuario_edit" placeholder="Introduzca los apellidos" value="<?php echo $usuario['apellido_usuario'] ?>" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="fw-bold" for="gmail_usuario_edit">Correo electrónico</label>
                                <input type="email" name="gmail_usuario_edit" class="form-control" id="gmail_usuario_edit" placeholder="Introduzca el email" value="<?php echo $usuario['gmail_usuario'] ?>" required />
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" for="password_usuario_edit">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" name="password_usuario_edit" class="form-control" id="password_create"
                                        placeholder="Introduzca la contraseña" required minlength="8"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número." value="<?php echo $usuario['contraseña_usuario'] ?>" />

                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword_edit">Mostrar</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="fw-bold" for="id_roles_edit">Rol</label>
                                <select class="form-select" name="id_roles_edit" id="id_roles_edit" required>
                                    <option selected value="2">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold" for="imagen_usuario_edit">Imagen de perfil</label>
                                <input type="file" name="imagen_usuario_edit" class="form-control-file" id="imagen_usuario_edit" accept="image/*">
                                <small class="form-text text-muted">Opcional. Tamaño máximo: 2MB</small>
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

<!-- Script para Mostrar/Ocultar Contraseña -->
<script>
    const togglePassword_edit = document.querySelector('#togglePassword_edit');
    const password_edit = document.querySelector('#password_usuario_edit');

    togglePassword_edit.addEventListener('click', function(e) {
        const type = password_edit.getAttribute('type') === 'password' ? 'text' : 'password';
        password_edit.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Mostrar' : 'Ocultar';
    });
</script>