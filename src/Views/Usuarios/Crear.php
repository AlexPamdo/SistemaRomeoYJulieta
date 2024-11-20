<!-- Modal Para Crear Usuario -->
<div class="modal fade" id="crear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="bg-dark modal-header">
                <h1 class="modal-title text-white fs-5" id="tituloModal">Crear usuario</h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation form" id="createForm" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" id="id">

                    <div class="col-md-10 mx-auto">

                        <div class="p-3">
                            <label class="fw-bold" for="nameUser">Nombres</label>
                            <input type="text" name="nombre_usuario" class="form-control-input campo name nombreUsuario" id="nameUser" placeholder="Introduzca los nombres" />
                            <span id="nameUserError" class="error"></span>
                        </div>

                        <div class="p-3">
                            <label class="fw-bold" for="apellidoUser">Apellidos</label>
                            <input type="text" name="apellido_usuario" class="form-control-input campo name apellidoUsuario" id="apellidoUser" placeholder="Introduzca los apellidos" />
                            <span id="apellidoUserError" class="error"></span>
                        </div>

                        <div class="p-3">
                            <label class="fw-bold" for="gmail_usuario">Correo electrónico</label>
                            <input type="text" name="gmail_usuario" class="form-control-input campo emailUsuario" id="gmail_usuario" autocomplete="new-email" placeholder="Introduzca el email" />
                            <span id="gmail_usuarioError" class="error"></span>
                        </div>

                        <div class="p-3">
                            <label class="fw-bold" for="password_create">Contraseña</label>

                            <input type="password" name="password_usuario" class="form-control-input campo pass passwordUsuario" id="password_create" autocomplete="off"
                                
                                title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número." / placeholder="Introduzca la contraseña">

                        </div>

                        <div class="p-3 text-center">
                            <label class="fw-bold">Rol</label>

                            <div class="d-flex justify-content-around">

                                <input type="hidden" name="rol_usuario" value="" class="rolUsuario">

                                <div class="d-flex flex-column align-items-center">
                                    <input type="radio" id="rol1" name="rol_usuario" value="1" class="rolUsuario">
                                    <label for="rol1">Admin</label>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <input type="radio" id="rol2" name="rol_usuario" value="2"  class="rolUsuario">
                                    <label for="rol2">User</label>
                                </div>
                            
                            </div>
                          
                        </div>
                            <span class="errorRol error d-block text-center"></span>
                    </div>
                   

                    <div class="row mb-3 p-3">
                        <div class="col-md-12 text-center">
                            <label class="fw-bold" for="imagen_usuario">Imagen de perfil</label>
                            <input type="file" name="file1" class="form-control-file" id="file1" accept="image/*">
                            <small class="form-text text-muted">Opcional. Tamaño máximo: 2MB</small>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="btnCrear" value="crear" class="btn btn-rj-blue btn-registrar">Registrar</button>
            </div>
            </form>
        </div>

    </div>
</div>
</div>
