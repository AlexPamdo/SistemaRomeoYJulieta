<!--Modal de eliminar -->
<div class="modal fade" id="eliminar<?php echo ($confeccion['id_confeccion']) ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <!--Contenido del modal -->

                <div class="container d-flex text-center flex-column">

                    <h1><i class="fa-solid fa-circle-exclamation fs-1 " style="color: #da1010;"></i></h1>
                    <h3>¿Estas seguro?</h3>
                    <h5>no podras recuperarla luego</h5>
                    <div class="d-flex justify-content-center modal-footer">
                        <form class="needs-validation" action="index.php" method="get" novalidate>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <input type="hidden" name="page" value="confecciones">
                            <input type="hidden" name="id" value="<?php echo ($confeccion['id_confeccion']) ?>">
                            <button class="btn btn-danger" name="btnDelete" value="delete">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>