<!--Modal de eliminar -->
<div class="modal fade" id="eliminar<?php echo ($supervisor['id_supervisor']) ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <!--Contenido del modal -->

                <div class="container d-flex text-center flex-column">

                    <h1><i class="fa-solid fa-circle-exclamation fs-1 " style="color: #da1010;"></i></h1>
                    <h3>¿Esta seguro?</h3>
                    <h5>no podras recuperarlo luego</h5>
                    <div class="modal-footer">
                        <form class="needs-validation" action="index.php?page=supervisores&function=delete" method="post" novalidate>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <input type="hidden" name="id" value="<?php echo ($supervisor['id_supervisor']) ?>">
                            <button class="btn btn-danger">eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>