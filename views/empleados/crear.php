 <!-- Modal Para Crear -->
 <div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Crear empleado
                 </h1>
             </div>
             <div class="modal-body">

                 <form class="needs-validation" action="index.php?page=empleados" method="post">
                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="empleados">
                         <label class="fw-bold" for="validationCustom01">Nombres</label>
                         <div class="form-label input-group flex-nowrap m-2">
                             <input type="text" pattern="[A-Za-z\s]+" name="nombre_empleado" class="form-control"
                                 id="validationCustom01" placeholder="Nombre" aria-label="Username"
                                 aria-describedby="addon-wrapping"
                                 title="No se permiten números. Solo letras y espacios." required />
                             <div class="valid-feedback"></div>
                         </div>
                         <label class="fw-bold" for="">Apellidos</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="text" pattern="[A-Za-z\s]+" name="apellido_empleado" class="form-control"
                                 id="validationCustom01" placeholder="Nombre" aria-label="Username"
                                 aria-describedby="addon-wrapping"
                                 title="No se permiten números. Solo letras y espacios." required />
                         </div>
                         <label class="fw-bold" for="">Email</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="email" name="email_empleado" class="form-control"
                                 placeholder="Introduzca el Email" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                         </div>
                         <label class="fw-bold" for="">Telefono</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="telefono_empleado" class="form-control"
                                 placeholder="Introduzca el numero de telefono" aria-label="Username"
                                 aria-describedby="addon-wrapping" pattern="\d{11}" minlength="11" maxlength="11"
                                 inputmode="numeric" required />
                         </div>
                         <label class="fw-bold" for="">Ocupacion</label>
                         <div class="input-group flex-nowrap m-2">
                             <select name="id_ocupacion" id="" class="form-control" aria-label="Username"
                                 aria-describedby="addon-wrapping" required>
                                 <option selected value="1">Costurero</option>
                             </select>
                         </div>

                         <label for="">Cedula</label>
                         <div class="input-group ">
                             <select class="form-select form-select-sm">
                                 <option value="">1</option>
                                 <option value="">2</option>
                             </select>
                             <input type="text" class="form-control"
                                 oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                         </div>

                         <div class="">
                             <div class="form-group col">
                                 <label for="tipoCedula">Tipo de Cédula</label>
                                 <select class="form-control" id="tipoCedula">
                                     <option value="ciudadania">Cédula de Ciudadanía</option>
                                     <option value="extranjera">Cédula de Extranjería</option>
                                     <option value="pasaporte">Pasaporte</option>
                                 </select>
                             </div>
                             <div class="form-group col">
                                 <label class="fw-bold" for="password_create">Cedula</label>
                                 <div class="input-group flex-nowrap m-2">
                                     <input type="number" name="cedula_empleado" class="form-control"
                                         placeholder="Introduzca la cedula" aria-label="Username"
                                         aria-describedby="addon-wrapping" pattern="\d{8}" minlength="8" maxlength="8"
                                         required />
                                 </div>
                             </div>
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