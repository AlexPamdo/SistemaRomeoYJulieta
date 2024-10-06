 <!-- Modal Para Crear -->
 <div class="modal fade" id="CrearModalM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Crear Material
                 </h1>
             </div>
             <div class="modal-body">

                 <form class="needs-validation" action="index.php?page=almacen&function=create" method="post">
                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="materia_prima">

                         <label class="fw-bold" for="validationCustom01">Descripcion del material</label>
                         <div class="form-label input-group flex-nowrap m-2">
                             <input type="text" name="nombre_material" class="form-control" id="validationCustom01" placeholder="descripcion" aria-label="Username" aria-describedby="addon-wrapping" required />
                             <div class="valid-feedback"></div>
                         </div>
                         <label class="fw-bold" for="">Tipo de material</label>
                         <div class="input-group pt-3 pb-3 ">
                             <select class="form-select" name="tipo_material" id="inputGroupSelect02" required>


                                 <option selected value="1">Tela</option>
                                 <option value="2">Botones</option>


                             </select>
                         </div>
                         <label class="fw-bold" for="">Color</label>
                         <div class="input-group pt-3 pb-3 ">
                             <select class="form-select" name="color_material" id="inputGroupSelect02" required>


                                 <option selected value="1">rojo</option>
                                 <option value="2">azul</option>


                             </select>
                         </div>
                         <label class="fw-bold" for="">Stock</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="stock" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" required />
                         </div>

                         <label class="fw-bold" for="password_create">Precio</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="precio" class="form-control" id="password_create" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" required />

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