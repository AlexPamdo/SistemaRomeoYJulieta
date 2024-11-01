 <?php use src\Model\ColoresModel;
use src\Model\TiposMaterialModel;

 ?>
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

                 <form class="needs-validation form" action="index.php?page=almacen&function=create" method="post">
                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="materia_prima">

                         <label class="fw-bold" for="descripcionMaterial">Descripcion del material</label>
                         <div class="form-label input-group flex-nowrap m-2">
                             <input type="text" name="nombre_material" class="form-control campo" id="descripcionMaterial" placeholder="descripcion" aria-label="Username" aria-describedby="addon-wrapping" minlength="5" title="Descripcion minimo 5 caracteres" />
                             <div class="valid-feedback"></div>
                         </div>
                         <span class="error" id="descripcionMaterialError"></span>
                         <label class="fw-bold" for="">Tipo de material</label>
                         <div class="input-group pt-3 pb-3 ">
                             <select class="form-select campo" name="tipo_material" id="tipoMaterial" required >
                             <option value="" selected>Seleccione un Tipo</option>
                                 <?php 
                                 $tiposMateialModel = new TiposMaterialModel;
                                 $tiposData = $tiposMateialModel->viewAll();
                                 foreach ($tiposData as $tipo): ?>
                                     <option value="<?php echo $tipo["id_tipo_material"] ?>"><?php echo $tipo["tipo_material"] ?></option>
                                 <?php endforeach; ?>

                             </select>
                         </div>
                         <span class="error" id="tipoMaterialError"></span>

                         <label class="fw-bold" for="">Color</label>
                         <div class="input-group pt-3 pb-3 ">
                             <select class="form-select campo" name="color_material" name="color_material" id="colorMaterial" required>
                             <option value="" selected>Seleccione un Color</option>
                                 <?php 
                                 $coloresModel = new ColoresModel();
                                 $coloresData = $coloresModel->viewAll();
                                 foreach ($coloresData as $color): ?>
                                     <option value="<?php echo $color["id_color"] ?>"><?php echo $color["color"] ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <span class="error" id="colorMaterialError"></span>

                         <label class="fw-bold" for="stockMaterial">Stock</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="stock" class="form-control campo" placeholder="Stock del material" aria-label="Username" aria-describedby="addon-wrapping" id="stockMaterial" required />
                         </div>
                         <span class="error" id="stockMaterialError"></span>

                         <label class="fw-bold" for="precioMaterial">Precio</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="text" name="precio" class="form-control campo" id="precioMaterial" placeholder="00.00Bs" aria-label="Username" aria-describedby="addon-wrapping" required />

                         </div>
                         <span class="error" id="precioMaterialError"></span>


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