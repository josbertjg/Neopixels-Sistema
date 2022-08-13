<?php include "../PHP/db.php";?>
<?php include "../includes/head.php"; ?>

<div id="pagos">
    <h4>Pagos pendientes por Procesar</h4>
    <table id="tabla-pagos" class="table table-bordered table-striped">
            <thead class="bg-success">
                <tr class="">
                    <th class="d-none d-lg-table-cell">ID</th>
                    <th>CORREO</th>
                    <th class="d-none d-lg-table-cell">NOMBRE TITULAR</th>
                    <th class="d-none d-lg-table-cell">CEDULA TITULAR</th>
                    <th class="d-none d-lg-table-cell">NRO. REFERENCIA</th>
                    <th class="d-none d-lg-table-cell">BANCO</th>
                    <th>SERVICIO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = mysqli_query($conection,"SELECT * FROM pagos WHERE estado='SIN PROCESAR'");

                    while($row = mysqli_fetch_array($query)){ ?>

                        <tr>
                            <td class="d-none d-lg-table-cell"><?php echo $row['id'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['nombre'] ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['cedula'] ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['referencia'] ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['banco'] ?></td>
                            <td><?php echo $row['servicio'] ?></td>
                            <td hidden><?php echo $row['pago_img_ruta'] ?></td>
                            <td hidden><?php echo $row['descripcion_negocio'] ?></td>
                            <td hidden><?php echo $row['img_negocio'] ?></td>
                            <td> btn... </td>
                        </tr>

                <?php } ?>
            </tbody>
        </table>
        <!-- Button trigger modal -->
        <button hidden id="btn-modal-pagos" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="label-pagos" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label-pagos"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-pagos" action="PHP/reg_compras.php" method="POST">

                            <!-- ACTIVADOR DEL COLLAPSE -->
                            <section class="d-flex justify-content-center mt-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    Información del Pago
                                </button>
                            </section><br>
                            
                            <!-- CONTAINER DEL COLLAPSE -->
                            <div class="collapse" id="collapse1">
                                <label for="" class="form-label">Correo del Usuario</label>
                                <input type="text" name="correo-pagos" class="form-control" readonly value="">

                                <label for="" class="form-label">Nombre del Titular</label>
                                <input type="text" name="nombre-pagos" class="form-control" readonly value="">

                                <label for="" class="form-label"> Cedula del Titular</label>
                                <input type="text" name="cedula-pagos" class="form-control" readonly value="">

                                <label for="" class="form-label">Nro de Referencia</label>
                                <input type="text" name="referencia-pagos" class="form-control" readonly value="">

                                <label for="" class="form-label">Banco</label>
                                <input type="text" name="banco-pagos" class="form-control" readonly value="">

                                <label for="" class="form-label">Servicio Solicitado</label>
                                <input type="text" name="servicio-pagos" class="form-control mb-3" readonly value="">

                                <label for="" class="form-label">Monto Cancelado</label>
                                <input type="text" name="monto-pago" class="form-control" readonly>

                                <label for="" class="form-label">Soporte de Pago</label>
                                <a href="" name="soporte-pagos" class="btn btn-success rounded-pill" download>Descargar</a><br>

                                <input type="text" name="id-pagos" hidden>
                            </div>                           
                            <!-- FIN COLLAPSE 1 -->
                            <!-- COLLAPSE 2 -->
                            <section class="d-flex justify-content-center mt-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Información del Negocio
                                </button>
                            </section><br>
                            
                            <!-- CONTAINER DEL COLLAPSE 2 -->
                            <div class="collapse" id="collapse2">
                                <label for="" class="form-label">Descripcion del Negocio</label>
                                <textarea name="descripcion-negocio-pagos" id="" cols="30" rows="3" class="form-control mb-3" readonly></textarea>

                                <label for="" class="form-label">Referencia Visual del Negocio</label>
                                <a href="" id="img_negocio_pagos" class="btn btn-success rounded-pill mb-3" download>Descargar</a>
                                <input name="img-negocio-pagos" type="text" hidden>
                            </div>     
                            <!-- FIN COLLAPSE 2   -->

                            <section class="d-flex justify-content-center mb-3">
                                <input id="btnProcesar-pago" type="button" value="Procesar" class="btn btn-success me-5">
                                <input type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" value="Cerrar">
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>                
</div>
