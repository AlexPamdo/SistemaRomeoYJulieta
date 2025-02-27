<?php

use src\Model\PrendasModel;
use src\Model\PedidosPrendasModel;
use src\Model\SupervisoresModel;

?>

<!-- Modal Para Crear -->
<div class="modal fade" id="crear" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Registrar confección
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" id="createForm" method="post">

                    <div class="container d-flex flex-column p-3">


                        <div class="container-form">
                            <div class="">
                                <!-- Buscador de Supervisor -->
                                <label class="fw-bold" for="validationCustom01">Supervisor encargado</label>
                                <div class="form-label input-group flex-nowrap m-2">
                                    <select class="custom-select" name="supervisor" id="">
                                        <?php
                                        //incluimos el controlador para acceder a la funcion ver todo

                                        $supervisores = new SupervisoresModel();
                                        $supervisoresData = $supervisores->viewAll(0, "estado");

                                        foreach ($supervisoresData as $supervisor) : ?>

                                            <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                            <option value="<?php echo $supervisor['id_supervisor'] ?>">
                                                <?php echo $supervisor['nombre_supervisor'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>

                            <div class="">
                                <!-- Buscador de Pedido -->
                                <label class="fw-bold" for="validationCustom01">Pedidos disponibles</label>
                                <div class="form-label input-group flex-nowrap m-2">
                                    <select class="custom-select pedidos" name="pedido" id="selectPedido">
                                        <option value="">Seleccionar un pedido</option>
                                        <?php
                                        //incluimos el controlador para acceder a la funcion ver todo

                                        $pedidosModel = new PedidosPrendasModel();
                                        $pedidosData = $pedidosModel->viewPedidosDisponibles();

                                        foreach ($pedidosData as $pedido) : ?>
                                            <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                            <option value="<?php echo $pedido['id_pedido_prenda'] ?>">
                                                <?php echo $pedido['desc_pedido_prenda'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback"></div>
                                </div>
                                <span class="errorPedidos error"></span>
                            </div>
                        </div>

                        <!-- Tabla de Prendas agregados -->
                        <div class="card shadow-sm mt-4 overflow-auto" style="max-height: 300px;">
                            <table class="table table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody class="tablaPrendas">

                                </tbody>
                            </table>
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