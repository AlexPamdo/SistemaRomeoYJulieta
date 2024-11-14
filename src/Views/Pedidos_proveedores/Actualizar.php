 <!-- Modal Para Crear -->
 <div class="modal fade" id="actualizar" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <!--Contenido del modal -->

                <div class="container d-flex text-center flex-column">

                <h1><i class="fa-solid fa-sync fs-1" style="color: #28a745;"></i></h1>

                    <h3>Actualizar estado</h3>
                    <p>Actualizar solo si la factura del pedido se ha pagado</p>
                    <div class="d-flex justify-content-center modal-footer">
                        <form class="needs-validation"  action="index.php?page=pedidosProveedores&function=update" method="post" novalidate>                  
                            <input type="text" name="id" id="idPedidoProveedor" value="">
                            <button type="submit" class="btn btn-custom-success">Confirmar</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>