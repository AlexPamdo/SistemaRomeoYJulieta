 <!-- Modal Para Crear -->
 <div class="modal fade" id="actualizar<?php echo ($pedido['id_pedido']) ?>" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Actualizar Factura
                 </h1>
             </div>
             <div class="modal-body">

                 <form class="needs-validation" action="index.php?page=pedidos" method="post">
                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="pedidos">
                         <input type="hidden" name="id" value="<?php echo ($pedido['id_pedido']) ?>">


                         <label class="fw-bold" for="">Metodo de pago</label>
                         <div class="input-group pt-3 pb-3 ">
                             <select class="form-select" name="id_metodo_pago" id="inputGroupSelect02" required>
                                 <option selected value="1">Efectivo</option>
                                 <option value="2">Transferencia</option>
                             </select>
                         </div>

                         <input type="hidden" name="total_pedido" class="form-control"
                             placeholder="Ingrese la cantidad a pagar" aria-label="Username"
                             aria-describedby="addon-wrapping" value="<?php echo ($pedido['total_pedido']) ?>"
                             required />

                         <label class="fw-bold" for="">Cantidad</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="number" name="pago" class="form-control"
                                 placeholder="Ingrese la cantidad a pagar" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                         </div>
                     </div>


                     <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                             Cerrar
                         </button>
                         <button type="submit" name="btnUpdate" value="actualizar" class="btn btn-rj-blue">
                             Registrar
                         </button>

                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>