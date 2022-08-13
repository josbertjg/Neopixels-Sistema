<?php include "../PHP/db.php";?>
<?php include "../includes/head.php"; ?>

<div id="servicios_cliente">
            <?php 
                $correo=strtolower($_SESSION['correo']);
                $query = mysqli_query($conection,"SELECT * FROM servicios WHERE correo ='$correo' AND estado='ACTIVO' ORDER BY servicio ASC");
                if($query){ 
            ?>

        <table class="table table-bordered table-striped">
            <h3>Servicios Activos:</h3>
            <thead class="bg-success">
                <tr class="">
                    <th class="d-none d-lg-table-cell">MI CORREO</th>
                    <th>MI SERVICIO</th>
                    <th class="d-none d-lg-table-cell">FECHA DE VENC.</th>
                    <th>ESTADO</th>
                    <th>VER</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                                        

                while($row = mysqli_fetch_array($query)){ ?>

                <tr>
                    <td class="d-none d-lg-table-cell"><?php echo $row['correo'] ?></td>
                    <td><?php echo $row['servicio'] ?></td>
                    <td class="d-none d-lg-table-cell"><?php echo $row['fecha_venc'] ?></td>
                    <td><?php echo $row['estado'] ?></td>
                    <td>
                        <a href="<?php echo $row['url'] ?>" class="btn btn-success rounded-pill" target="_blank">VER</a>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
        <?php }else{

        ?>
            <h1>No ha adquirido servicios aún.</h1>
        <?php } ?>
    </div>
</div>