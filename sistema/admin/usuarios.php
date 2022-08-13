<?php include "../PHP/db.php";?>
<?php include "../includes/head.php"; ?>

<div id="usuarios">
    <h4>Usuarios del Sistema:</h4>
    <table id="tabla-usuarios" class="table table-bordered table-striped">
            <thead class="bg-success">
                <tr class="">
                    <th>ID</th>
                    <th class="d-none d-lg-table-cell">NOMBRE</th>
                    <th>CORREO</th>
                    <th class="d-none d-lg-table-cell">CLAVE</th>
                    <th class="d-none d-lg-table-cell">FECHA DE REGISTRO</th>
                    <th>TIPO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = mysqli_query($conection,"SELECT * FROM usuario");

                    while($row = mysqli_fetch_array($query)){ ?>

                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['clave'] ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['fecha'] ?></td>
                            <td><?php if($row['tipo']==0)
                                        echo "Usuario";
                                      else
                                        if($row['tipo']==1)
                                            echo "Admin"
                            ?></td>
                            <td>Btn...</td>
                        </tr>

                <?php } ?>
            </tbody>
        </table>
        <form id="form-usuarios" action="PHP/reg_compras.php" method="POST">
            <input type="text" hidden name="tipo-usuario">
            <input type="text" hidden name="id-usuario">
        </form>                
</div>