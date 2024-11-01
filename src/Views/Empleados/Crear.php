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

                 <form class="needs-validation form" action="index.php?page=empleados&function=create" method="post">
                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="empleados">
                         <label class="fw-bold" for="nameEmpleado">Nombres</label>
                         <div class="form-label input-group flex-nowrap m-2">
                             <input type="text" pattern="[A-Za-z\s]+" name="nombre_empleado" class="form-control campo"
                                 id="nameEmpleado" placeholder="Nombre" aria-label="Username"
                                 aria-describedby="addon-wrapping"
                                 title="No se permiten números. Solo letras y espacios." />

                             <div class="valid-feedback"></div>
                         </div>
                         <span class="error" id="nameEmpleadoError"></span>

                         <label class="fw-bold" for="apellidoEmpleado">Apellidos</label>
                         <div class="input-group flex-nowrap m-2 campo">
                             <input type="text" pattern="[A-Za-z\s]+" name="apellido_empleado" class="form-control campo"
                                 id="apellidoEmpleado" placeholder="Nombre" aria-label="Username"
                                 aria-describedby="addon-wrapping"
                                 title="No se permiten números. Solo letras y espacios." />
                         </div>
                         <span class="error" id="apellidoEmpleadoError"></span>
                         <label class="fw-bold" for="emailEmpleado">Email</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="email" name="email_empleado" class="form-control campo" id="emailEmpleado"
                                 placeholder="Introduzca el Email" aria-label="Username"
                                 aria-describedby="addon-wrapping" />
                         </div>
                         <span class="error" id="emailEmpleadoError"></span>
                         <label class="fw-bold" for="">Telefono</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="telefono_empleado" class="form-control campo" id="telfEmpleado"
                                 placeholder="Introduzca el numero de telefono" aria-label="Username"
                                 aria-describedby="addon-wrapping" pattern="\d{11}" minlength="11" maxlength="11"
                                 inputmode="numeric" />
                         </div>
                         <span class="error" id="telfEmpleadoError"></span>
                         <label class="fw-bold" for="">Ocupacion</label>
                         <div class="input-group flex-nowrap m-2">
                             <select name="id_ocupacion" id="" class="form-control" aria-label="Username"
                                 aria-describedby="addon-wrapping">
                                 <option selected>Ocupacion</option>

                                 <?php

                                    use src\Model\OcupacionesModel;

                                    $ocupacionesModel = new OcupacionesModel();
                                    $ocupacionesData = $ocupacionesModel->viewAll(); ?>

                                 <?php foreach ($ocupacionesData as $ocupacion): ?>
                                     <option value="<?php echo $ocupacion["id_ocupacion"] ?>"><?php echo $ocupacion["ocupacion"] ?></option>

                                 <?php endforeach; ?>
                             </select>
                         </div>

                         <div class="">
                             <div class="form-group col">
                                 <label for="tipoCedula" class="fw-bold">Tipo de Cédula</label>
                                 <div>
                                     <input type="radio" id="ciudadania" name="tipo_cedula" value="ciudadania" />
                                     <label for="ciudadania">Cédula de Ciudadanía</label>
                                 </div>
                                 <div>
                                     <input type="radio" id="extranjera" name="tipo_cedula" value="extranjera" />
                                     <label for="extranjera">Cédula de Extranjería</label>
                                 </div>
                                 <div>
                                     <input type="radio" id="pasaporte" name="tipo_cedula" value="pasaporte" />
                                     <label for="pasaporte">Pasaporte</label>
                                 </div>
                             </div>
                             <div class="form-group col">
                                 <label class="fw-bold" for="cedulaEmpleado">Cedula</label>
                                 <div class="input-group flex-nowrap m-2">
                                     <input type="number" name="cedula_empleado" class="form-control campo" id="cedulaEmpleado"
                                         placeholder="Introduzca la cedula" aria-label="Username"
                                         aria-describedby="addon-wrapping" pattern="\d{8}" minlength="8" maxlength="8" />
                                 </div>
                                 <span class="error" id="cedulaEmpleadoError"></span>
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