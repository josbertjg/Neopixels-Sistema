<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php 
include "../../includes/head.php"; 

?>
<body>
    <header>

        <div>
            <h1>Reporte de Usuarios</h1>
        </div>
    </header>
    <main>
        <table class="table table-bordered">
            <thead class="bg-success">
                <tr class="">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>CLAVE</th>
                    <th>CEDULA</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th>FECHA DE REGISTRO</th>
                    <th>TIPO</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "../../PHP/db.php";
                    $query = "SELECT * FROM usuario ORDER BY id ASC";
                    $result = mysqli_query($conection,$query);

                    while($row = mysqli_fetch_array($result)){ ?>
                        <?php
                        $correo=$row['correo'];
                        $query2=mysqli_query($conection,"SELECT * FROM extrausuario WHERE correo='$correo'");
                        $row2=mysqli_fetch_array($query2);
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['clave'] ?></td>
                            <td><?php 
                                if(isset($row2['correo']))
                                    echo $row2['cedula'];
                                else
                                    echo "Sin registrar aún.";
                            ?></td>
                            <td><?php
                                if(isset($row2['correo']))
                                    echo $row2['telefono'];
                                else
                                    echo "Sin registrar aún.";
                            ?></td>
                            <td><?php
                                if(isset($row2['correo']))
                                    echo $row2['direccion'];
                                else
                                    echo "Sin registrar aún.";
                            ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td><?php 
                                if($row['tipo']==0)
                                    echo "Usuario";
                                else
                                    if($row['tipo']==1)
                                        echo "Admin";
                            ?></td>
                        </tr>

                <?php } ?>
            </tbody>
        </table>
    </main>                
</body>
</html>
<?php
$html = ob_get_clean();
//echo $html;

require_once '../../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

// AL APLICAR EL VALOR TRUE EN LA SIGUIENTES LINEAS DE CODIGO EL PDF SE ROMPE POR COMPLETO Y NO SE PUEDEN APLICAR LOS ESTILOS E IMAGENES

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => false));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

//$dompdf->setPaper('letter');
$dompdf->setPaper('A4','landscape');

$dompdf->render();

$dompdf->stream("reporte_compras.pdf",array("Attachment" => false));

//REGISTRANDO LAS BITACORAS
include "../../PHP/clases/Bitacoras.php";
$bitacoras = new Bitacoras($_SESSION['correo'],"Abrió el reporte de Usuarios.");
mysqli_query($conection,$bitacoras->query());

?>