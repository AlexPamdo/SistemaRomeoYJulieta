 <!-- Modal Para Crear -->
 <div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Crear pedido
                 </h1>
             </div>
             <div class="modal-body">

                 <form class="needs-validation" action="index.php?page=pedidos" method="post">
                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="pedidos">

                         <label class="fw-bold" for="validationCustom01">proveedor</label>
                         <div class="form-label input-group flex-nowrap m-2">
                             <select class="form-select" name="id_proveedor" id="">
                                 <?php
                                    //incluimos el controlador para acceder a la funcion ver todo
                                    include_once("model/proveedorModel.php");
                                    $proveedores = new Proveedores();
                                    $proveedoresData = $proveedores->viewAll();
                                    foreach ($proveedoresData as $proveedor) : ?>

                                 <!-- usamos el foreach para mostrar todos los proveedores disponibles -->
                                 <option value="<?php echo $proveedor['id_proveedor'] ?>">
                                     <?php echo $proveedor['nombre_proveedor'] ?></option>
                                 <?php endforeach; ?>
                             </select>
                             <div class="valid-feedback"></div>

                         </div>


                         <label class="fw-bold" for="validationCustom01">Orden</label>
                         <div class="form-label input-group flex-nowrap m-2">
                             <select class="form-select" name="id_orden_pedido" id="">
                                 <?php
                                    //incluimos el controlador para acceder a la funcion ver todo
                                    include_once("model/almacenmodel.php");
                                    $materiales = new material();
                                    $materialesData = $materiales->viewAll();
                                    foreach ($materialesData as $material) : ?>

                                 <!-- usamos el foreach para mostrar todos los proveedores disponibles -->
                                 <option value="<?php echo $material['id_material'] ?>">
                                     <?php echo $material['nombre_material'] ?></option>
                                 <?php endforeach; ?>
                             </select>
                             <div class="valid-feedback"></div>
                         </div>


                         <label class="fw-bold" for="">Cantidad</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="cantidad_pedido" class="form-control"
                                 placeholder="Introduzca la cantidad a pedir" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                         </div>




                         <label class="fw-bold" for="">Fecha estimada</label>
                         <div class="input-group pt-3 pb-3 ">
                             <input type="date" name="fecha_estimada" class="form-control" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                         </div>

                         <label class="fw-bold" for="">Cantidad a pagar</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="total_pedido" class="form-control"
                                 placeholder="Introduzca la cantidad a pagar" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
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