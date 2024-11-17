<?php

use src\Model\EmpleadosModel;
use src\Model\PrendasModel;
use src\Model\PedidosPrendasModel;

?>

<!-- Modal Para Crear -->
<div class="modal fade" id="CrearModal" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Registrar confeccion
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" action="index.php?page=confecciones&function=create" method="post" id="confeccionForm">

                    <div class="container container-form d-flex flex-column p-3">
                        <input type="hidden" name="page" value="confecciones">
                        <div class="">

                            <!-- Buscador de Receta -->
                            <label class="fw-bold" for="validationCustom01">Patrones</label>

                            <div class="form-label input-group flex-nowrap m-2">
                                <select class="custom-select" name="prenda" id="">
                                    <?php
                                    //incluimos el controlador para acceder a la funcion ver todo
                                    $prendas = new PrendasModel();
                                    $prendasData = $prendas->viewAll(0, "estado");

                                    foreach ($prendasData as $prenda) : ?>

                                        <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                        <option value="<?php echo $prenda['id_prenda'] ?>">
                                            <?php echo $prenda['nombre_prenda'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="valid-feedback"></div>
                            </div>

                            <!-- cantidad de prendas a ingresar -->
                            <div class=" flex-nowrap p-4">
                                <label class="fw-bold" for="">Cantidad</label>
                                <input class="form-control-input campo cant" type="text" name="cantidad"
                                    placeholder="Cantidad de prendas a confeccionar" id="cantidadConfeccion">
                                <span class="error" id="cantidadConfeccionError"></span>
                            </div>

                        </div>

                        <div class="">
                            <!-- Buscador de Empleado -->
                            <label class="fw-bold" for="validationCustom01">Supervisor encargado</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <select class="custom-select" name="empleado" id="">
                                    <?php
                                    //incluimos el controlador para acceder a la funcion ver todo

                                    $empleados = new EmpleadosModel();
                                    $empleadosData = $empleados->viewAll(0, "ocupado");

                                    foreach ($empleadosData as $empleado) : ?>

                                        <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                        <option value="<?php echo $empleado['id_empleado'] ?>">
                                            <?php echo $empleado['nombre_empleado'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="">
                            <!-- Buscador de Pedido -->
                            <label class="fw-bold" for="validationCustom01">Pedidos disponibles</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <select class="custom-select" name="pedido" id="selectPedido">
                                    <?php
                                    //incluimos el controlador para acceder a la funcion ver todo

                                    $pedidosModel = new PedidosPrendasModel();
                                    $pedidosData = $pedidosModel->viewAll(0, "proceso");

                                    foreach ($pedidosData as $pedidos) : ?>

                                        <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                        <option value="<?php echo $pedido['id_pedido_prenda'] ?>">
                                            <?php echo $pedido['desc_pedido_prenda	'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="valid-feedback"></div>
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
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="tablaPrendas">
                                    <tr id="filaPrenda">
                                        <td id="numberPrenda">1</td>
                                        <td>
                                            <div class="input-group">
                                                <select class="form-select" name="prenda[0][id_prenda]" id="prenda" required>
                                                    <option value="none">Ninguno</option>
                                                    <?php
                                                    $prendasModel = new PrendasModel();
                                                    $prendasData = $prendasModel->viewAll(0, "estado");
                                                    foreach ($prendasData as $prenda) : ?>
                                                        <option value="<?php echo $prenda['id_prenda'] ?>">
                                                            <?php echo $prenda['nombre_prenda'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">Por favor, selecciona un material.</div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="prenda[0][cantidad]" id="cantidadPrenda" placeholder="Cantidad de Prendas">
                                            <div class="invalid-feedback">Por favor, introduce la cantidad.</div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></button>
                                        </td>
                                    </tr>
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