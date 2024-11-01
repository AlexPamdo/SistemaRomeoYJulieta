 <!-- Modal Para Crear -->


 <!-- Modal Para Crear Usuario -->
 <div class="modal fade" id="crearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="tituloModal">Crear usuario</h1>
             </div>
             <div class="modal-body">
                 <form class="needs-validation form" id="formCreateUser" action="index.php?page=usuarios&function=create" method="post" enctype="multipart/form-data">
                
                 <input type="hidden" name="id" id="id">

                     <div class="container  p-3">
                         <div class="row mb-3">
                             <div class="col-md-6">
                                 <label class="fw-bold" for="nameUser">Nombres</label>
                                 <input type="text" name="nombre_usuario" class="form-control campo" id="nameUser" placeholder="Introduzca los nombres" />
                                 <span id="nameUserError" class="error"></span>
                             </div>
                             <div class="col-md-6">
                                 <label class="fw-bold" for="apellidoUser">Apellidos</label>
                                 <input type="text" name="apellido_usuario" class="form-control campo" id="apellidoUser" placeholder="Introduzca los apellidos"  />
                                 <span id="apellidoUserError" class="error"></span>
                             </div>
                         </div>

                         <div class="row mb-3">
                             <div class="col-md-6">
                                 <label class="fw-bold" for="gmail_usuario">Correo electrónico</label>
                                 <input type="email" name="gmail_usuario" class="form-control campo" id="gmail_usuario" placeholder="Introduzca el email"/>
                                  <span id="gmail_usuarioError" class="error"></span>
                             </div>
                             <div class="col-md-6">
                                 <label class="fw-bold" for="password_create">Contraseña</label>
                                 <div class="input-group">
                                     <input type="password" name="password_usuario" class="form-control campo" id="password_create"
                                         placeholder="Introduzca la contraseña"  minlength="8"
                                         pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                         title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número." />

                                     <button class="btn btn-outline-secondary" type="button" id="togglePassword_create">Mostrar</button>
                                 </div>
                                 <span class="error" id="password_createError"></span>
                             </div>
                         </div>

                         <div class="row mb-3">
                             <div class="col-md-6">
                                 <label class="fw-bold" for="rol_usuario">Rol</label>
                                 <select class="form-select" name="rol_usuario" id="id_roles" required>
                                     <option value="2">User</option>
                                     <option value="1">Admin</option>
                                 </select>
                             </div>
                             <div class="col-md-6">
                                 <label class="fw-bold" for="pregunta">Pregunta de seguridad</label>
                                 <select class="form-select" name="pregunta" id="pregunta" required>
                                     <option selected value="¿Cúal es su hobby?">¿Cúal es su hobby?</option>
                                     <option value="¿Cúal es el nombre de su mascota?">¿Cúal es el nombre de su mascota?</option>
                                     <option value="¿Cúal es su cantante favorito?">¿Cúal es su cantante favorito?</option>
                                     <option value="¿Cúal es su deporte favorito?">¿Cúal es su deporte favorito?</option>
                                 </select>
                             </div>
                         </div>

                         <div class="row mb-3">
                             <div class="col-md-12">
                                 <label class="fw-bold" for="respuesta">Respuesta a la pregunta de seguridad</label>
                                 <input type="text" name="respuesta" class="form-control campo" id="respuesta" placeholder="Introduzca la respuesta"  />
                                 <span class="error" id="respuestaError"></span>
                             </div>
                         </div>

                         <div class="row mb-3">
                             <div class="col-md-12 text-center">
                                 <label class="fw-bold" for="imagen_usuario">Imagen de perfil</label>
                                 <input type="file" name="file1" class="form-control-file" id="file1" accept="image/*">
                                 <small class="form-text text-muted">Opcional. Tamaño máximo: 2MB</small>
                             </div>
                         </div>

                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                         <button type="submit" name="btnCrear" value="crear" class="btn btn-rj-blue">Registrar</button>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>

 <!-- Script para Mostrar/Ocultar Contraseña -->
 <script>
     const togglePassword_create = document.querySelector('#togglePassword_create');
     const password_create = document.querySelector('#password_create');

     togglePassword_create.addEventListener('click', function(e) {
         const type = password_create.getAttribute('type') === 'password' ? 'text' : 'password';
         password_create.setAttribute('type', type);
         this.textContent = type === 'password' ? 'Mostrar' : 'Ocultar';
     });
 </script>


