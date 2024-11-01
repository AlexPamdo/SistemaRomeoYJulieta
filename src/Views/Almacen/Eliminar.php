<!--Modal de eliminar -->
<div class="modal fade" id="eliminarM<?php echo ($material['id_material']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <!--Contenido del modal -->

                <div class="container d-flex text-center flex-column">

                    <h1><i class="fa-solid fa-circle-exclamation fs-1 " style="color: #da1010;"></i></h1>
                    <h3>¿Estas seguro?</h3>
                    <h5>no podras recuperarlo luego</h5>
                    <div class="d-flex justify-content-center modal-footer">
                        <form class="needs-validation" action="index.php?page=almacen&function=delete" method="post" novalidate>
                            <input type="hidden" name="id" value="<?php echo ($material['id_material']) ?>">
                            <button type="submit" class="btn btn-danger">Confirmar</button>
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