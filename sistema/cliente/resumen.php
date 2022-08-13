<?php include "../PHP/db.php";?>
<?php include "../includes/head.php"; ?>
            <div id="contenido_resumen" class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <span>Mis Datos</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label class="form-label">Usuario:</label>
                                    <div class="d-flex">
                                        <input type="text" id="usuario" class="form-control" readonly placeholder="Nombre de Usuario:" value="<?php 
                                            if(isset($_SESSION['correo'])) 
                                                echo strtolower($_SESSION['correo']); 
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label">Contraseña:</label>
                                    <form class="d-flex">
                                        <input name="clave" type="password" id="clave" class="form-control" placeholder="Contraseña:" value="<?php 
                                        if(isset($_SESSION['clave'])) 
                                            echo strtoupper($_SESSION['clave']); 
                                        ?>">
                                        <input type="button" class="btn btn-success btn-editar" value="Editar">
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label class="form-label">Fecha de Registro:</label>
                                    <div class="d-flex">
                                        <input type="text" id="fecha" class="form-control" placeholder="Fecha de registro:" readonly value="<?php 
                                            if(isset($_SESSION['fecha'])) 
                                                echo strtoupper($_SESSION['fecha']); 
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label">Cédula:</label>
                                    <form class="d-flex">
                                        <input name="cedula" type="text" id="cedula" class="form-control" placeholder="¡CULMINA EL REGISTRO Y OBTEN BENEFICIOS!" value="<?php 
                                            if(isset($_SESSION['cedula'])) 
                                                echo $_SESSION['cedula']; 
                                        ?>">
                                        <input type="button" class="btn btn-success btn-editar" value="Editar">
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label class="form-label" id="label-nombre">Nombre Completo:</label>
                                    <form class="d-flex">
                                        <input name="nombre" type="text" id="nombre" class="form-control" placeholder="¡CULMINA EL REGISTRO Y OBTEN BENEFICIOS!" value="<?php 
                                            if(isset($_SESSION['nombre'])) 
                                                echo strtoupper($_SESSION['nombre']); 
                                        ?>">
                                        <input type="button" class="btn btn-success btn-editar" value="Editar">
                                    </form>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label">Número de Teléfono:</label>
                                    <form class="d-flex">
                                        <input name="telefono" type="text" id="telefono" class="form-control" placeholder="¡CULMINA EL REGISTRO Y OBTEN BENEFICIOS!" value="<?php 
                                            if(isset($_SESSION['telefono'])) 
                                                echo strtoupper($_SESSION['telefono']); 
                                        ?>">
                                        <input type="button" class="btn btn-success btn-editar" value="Editar">
                                    </form>
                                </div>
                            </div>
                            <label class="form-label">Dirección:</label>
                            <form class="d-flex">
                                <textarea name="direccion" class="form-control text-start" id="direccion" cols="30" rows="2" placeholder="¡CULMINA EL REGISTRO Y OBTEN BENEFICIOS!"><?php 
                                    if(isset($_SESSION['direccion'])) 
                                        echo strtoupper($_SESSION['direccion']); 
                                ?></textarea>
                                <input type="button" class="btn btn-success btn-editar" value="Editar">
                            </form>
                            <!-- ABRIR COLLAPSE PARA CULMINAR REGISTRO -->
                            <section id="btnCollapse">
                                <div class="d-flex justify-content-center mt-4">
                                    <a id="aCollapse" class="btn btn-success rounded-pill" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            ¡CULMINAR REGISTRO!
                                    </a>
                                </div>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <form action="PHP/reg_usu.php" name="form_collapse" method="POST">
                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo:">
                                            <input type="text" name="cedula" class="form-control mt-2" placeholder="Cédula:">
                                            <textarea name="direccion" class="form-control mt-2" id="" cols="30" rows="3" placeholder="Dirección:"></textarea>
                                            <input type="text" name="telefono" class="form-control mt-2" placeholder="Número de Teléfono:">
                                            <p class="form-control mt-3 text-center" id="error"></p>
                                            <section class="d-flex justify-content-center mt-2">
                                            <input type="button" class="btn btn-success rounded-pill" name="culminar" value="¡CULMINAR!">
                                            </section>
                                            <input type="text" name="correo" hidden value="<?php echo $_SESSION['correo'];?>">
                                        </form>
                                    </div>
                                </div>
                            </section>
                                <!-- FIN COLLAPSE -->
                        </div>
                    </div>                    
                    <div class="card">
                        <div class="card-header">
                            <span>Mis Servicios</span>
                        </div>
                        <div class="card-body">
                            <?php 
                                $correo=strtolower($_SESSION['correo']);
                                $query = mysqli_query($conection,"SELECT * FROM pagos WHERE correo ='$correo' ORDER BY estado ASC");
                                if($query){ 
                            ?>

                            <table class="table table-bordered table-striped">
                                <thead class="bg-success">
                                    <tr class="">
                                        <th>MI CORREO</th>
                                        <th class="d-none d-lg-table-cell">NOMBRE DEL TITULAR</th>
                                        <th class="d-none d-lg-table-cell">CEDULA DEL TITULAR</th>
                                        <th class="d-none d-lg-table-cell">NRO. REFERENCIA</th>
                                        <th class="d-none d-lg-table-cell">BANCO</th>
                                        <th>SERVICIO</th>
                                        <th>ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        

                                        while($row = mysqli_fetch_array($query)){ ?>

                                            <tr>
                                                <td><?php echo $row['correo'] ?></td>
                                                <td class="d-none d-lg-table-cell"><?php echo $row['nombre'] ?></td>
                                                <td class="d-none d-lg-table-cell"><?php echo $row['cedula'] ?></td>
                                                <td class="d-none d-lg-table-cell"><?php echo $row['referencia'] ?></td>
                                                <td class="d-none d-lg-table-cell"><?php echo $row['banco'] ?></td>
                                                <td><?php echo $row['servicio'] ?></td>
                                                <td><?php echo $row['estado'] ?></td>
                                            </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php }else{

                            ?>
                            No ha adquirido servicios aún.
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <aside class="col-3">
                    <div id="estado">
                        <span class="fs-5 fw-bold mb-2">¿Desea cerrar la sesión?</span>
                        <input class="btn btn-danger rounded-pill" id="cerrar" type="button" value="Cerrar Sesion">
                    </div>
                </aside>
            </div>
