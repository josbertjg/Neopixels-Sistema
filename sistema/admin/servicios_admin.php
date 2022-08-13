<?php include "../PHP/db.php";?>
<?php include "../includes/head.php"; ?>

<div id="servicios_admin">
    <h4>Gestion de Servicios</h4>
    <table id="tabla-servicios" class="table table-bordered table-striped">
            <thead class="bg-success">
                <tr class="">
                    <th class="d-none d-lg-table-cell">ID</th>
                    <th>CORREO</th>
                    <th>SERVICIO</th>
                    <th class="d-none d-lg-table-cell">DESCRIPCION</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = mysqli_query($conection,"SELECT * FROM servicios");

                    while($row = mysqli_fetch_array($query)){ ?>

                        <tr>
                            <td class="d-none d-lg-table-cell"><?php echo $row['id'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['servicio'] ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['estado'] ?></td>
                            <td hidden><?php echo $row['imagen'] ?></td>
                            <td>BTN...</td>
                        </tr>

                <?php } ?>
            </tbody>
        </table>
        <!-- Button trigger modal -->
    <button id="btn-modal-servicios" type="button" hidden class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-servicios">
    MODAL DE SERVICIOS
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal-servicios" tabindex="-1" aria-labelledby="id-servicios" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="id-servicios"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form id="form-servicios" action="PHP/reg_compras.php" method="POST">
                    <!-- COLLAPSE 1 -->
                    <section id="btn-gestion" class="d-flex justify-content-center my-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-gestion" aria-expanded="false" aria-controls="collapse-gestion">
                            Información del Servicio
                        </button>
                    </section>
                    
                    <!-- CONTENIDO COLLAPSE 1 -->
                    <div class="collapse" id="collapse-gestion">
                        <div class="card card-body">
                            <label for="" class="form-label">Correo:</label>
                            <input type="text" class="form-control" name="correo-servicios" readonly>
    
                            <label for="" class="form-label">Servicio:</label>
                            <input type="text" class="form-control" name="servicio-servicios" readonly>
    
                            <label for="" class="form-label">Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion-servicios" readonly>
    
                            <label for="" class="form-label">Imagen del Negocio:</label>
                            <a href="" class="btn btn-success rounded-pill" id="imagen-servicios" download>Descargar</a>

                        </div>
                    </div>
    
                    <!-- CONTENIDO COLLAPSE 2 -->
                    <div class="collapse" id="collapse-accion">
                        <div class="card card-body">
                            <label for="" class="form-label">Fecha de Vencimiento:</label>
                            <input type="date" class="form-control" name="fecha-venc-servicios">
    
                            <label for="" class="form-label">Url del servicio:</label>
                            <input type="text" class="form-control" name="url-servicios">
                        </div>
                    </div>
                    
                    <input type="text" hidden name="id-servicios">
                    <input type="text" name="estado-servicios" hidden>

                    <section class="d-flex justify-content-center my-3">
                        <input id="btn-aceptar" type="button" class="btn btn-success me-3" value="Aceptar">
                        <input type="button" class="btn btn-danger" value="Salir" data-bs-dismiss="modal" aria-label="Close">
                    </section>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>