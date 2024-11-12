<?php

use src\Model\AlmacenModel;

$materiales = new AlmacenModel();
$materialesData = $materiales->viewAll(0, "estado");
?>
<!-- Modal Para Crear -->
<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <!-- Encabezado del Modal -->
            <div class="bg-dark modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Registrar Pedido</h1>
            </div>

            <!-- Cuerpo del Modal -->
            <div class="container modal-body">
                <form class="needs-validation" action="index.php?page=pedidosProveedores&function=create" method="post">
                    <div class="col-md-10 mx-auto container d-flex align-items-center flex-column m-3">
                        <!-- Sección del Proveedor -->
                        <div class="col-5 m-4 ">
                            <h4 class="text-center text-body fw-bold">Información del Proveedor</h4>
                            <div class="input-group flex-nowrap">
                                <select class="custom-select" name="proveedor" id="proveedorSelect" required>
                                    <option value="none" selected disabled>Seleccione un proveedor</option>
                                    <?php

                                    use src\Model\ProveedoresModel;

                                    $proveedores = new ProveedoresModel();
                                    $proveedoresData = $proveedores->viewProveedores(0, "estado");
                                    foreach ($proveedoresData as $proveedor) : ?>
                                        <option value="<?php echo $proveedor['id_proveedor'] ?>">
                                            <?php echo $proveedor['nombre_proveedor'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Por favor, seleccione un proveedor.</div>
                            </div>
                        </div>

                        <!-- Sección de Materiales a Agregar -->
                        <div class="">
                            <h4 class="text-center text-body fw-bold">Materiales a agregar</h4>

                            <!-- Botón para agregar materiales -->
                            <div class="text-center my-3">
                                <button type="button" onclick="añadirMaterial()" class="btn btn-rj-blue w-50">Añadir Material +</button>
                                <small class="form-text text-muted d-block">Mínimo 1 Material, Máximo: 10 Materiales</small>
                            </div>

                            <!-- Tabla de Materiales Agregados -->
                            <div class="card">
                                <table class="table table-striped m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col" class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tablaMateriales">
                                        <tr id="filaMaterial">
                                            <td id="numberMaterial" class="text-center">1</td>
                                            <td>
                                                <select class="form-select" name="material[0][id_Material]" id="material" required>
                                                    <option value="none">Ninguno</option>
                                                    <?php
                                                    foreach ($materialesData as $material) : ?>
                                                        <option value="<?php echo $material['id_material'] ?>">
                                                            <?php echo $material['nombre_material'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">Seleccione un material.</div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="material[0][cantidad]" id="cantidadMaterial" placeholder="Cantidad" required>
                                                <div class="invalid-feedback">Ingrese la cantidad.</div>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>

                    <!-- Pie del Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="btnCrear" value="crear" class="btn btn-rj-blue">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>