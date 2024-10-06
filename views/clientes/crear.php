 <!-- Modal Para Crear -->
 <div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
         <div class="bg-rj-blue modal-header">
         <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Crear Cliente
                 </h1>
             </div>
             <div class="modal-body">

                 <form class="needs-validation" action="index.php?page=clientes" method="post">
                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="clientes">
                         <label class="fw-bold" for="validationCustom01">Nombre</label>
                         <div class="form-label input-group flex-nowrap m-2">
                         <input type="text" pattern="[A-Za-z\s]+" name="nombre" class="form-control" id="validationCustom01"
               placeholder="Nombre" aria-label="Username" aria-describedby="addon-wrapping"
               title="No se permiten números. Solo letras y espacios." required />
                             <div class="valid-feedback"></div>
                         </div>
                         <label class="fw-bold" for="">Apellido</label>
                         <div class="input-group flex-nowrap m-2">
                         <input type="text" pattern="[A-Za-z\s]+" name="apellido" class="form-control" id="validationCustom01"
               placeholder="Nombre" aria-label="Username" aria-describedby="addon-wrapping"
               title="No se permiten números. Solo letras y espacios." required />

                         </div>
                         <label class="fw-bold" for="">Telefono</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" pattern="[a-z]+" name="telefono" class="form-control" placeholder="04##-####"
                                 aria-label="Username" aria-describedby="addon-wrapping" required />
                         </div>
                         <label class="fw-bold" for="">Correo electrónico</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="Email" name="email" class="form-control" placeholder="Example@gmail.com"
                                 aria-label="Username" aria-describedby="addon-wrapping" required />
                         </div>

                         <label class="fw-bold" for="password_create">Contraseña </label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="password" name="contraseña" class="form-control" id="password_create"
                                 placeholder="Contraseña" aria-label="Username" aria-describedby="addon-wrapping"
                                 required />
                             <div class="input-group-append">
                                 <button class=" btn btn-outline-secondary" type="button"
                                     id="togglePassword_create">Mostrar</button>
                             </div>
                         </div>

                         <!--mostrar la contraseña del Cliente-->

                         <script>
                         const togglePassword_create = document.querySelector('#togglePassword_create');
                         const password_create = document.querySelector('#password_create');

                         togglePassword_create.addEventListener('click', function(e) {
                             // Cambiar el tipo de input entre password y text
                             const type = password_create.getAttribute('type') === 'password' ?
                                 'text' : 'password';
                             password_create.setAttribute('type', type);
                             // Cambiar el texto del botón
                             this.textContent = type === 'password' ? 'Mostrarasd' : 'asdasd';
                         });
                         </script>


                         <label class="fw-bold" for="">Cedula</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="cedula" class="form-control" placeholder="V-"
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