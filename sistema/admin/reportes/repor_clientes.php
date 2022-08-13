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
            <h1>Reporte de pagos</h1>
        </div>
    </header>
    <main>
        <table class="table table-bordered">
            <thead class="bg-success">
                <tr class="">
                    <th>ID</th>
                    <th>CORREO</th>
                    <th>CANTIDAD DE COMPRAS</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "../../PHP/db.php";
                    $query = "SELECT * FROM clientes ORDER BY cantidad ASC";
                    $result = mysqli_query($conection,$query);

                    while($row = mysqli_fetch_array($result)){ ?>

                        
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['cantidad'] ?></td>
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

$dompdf->stream("reporte_pagos.pdf",array("Attachment" => false));

//REGISTRANDO LAS BITACORAS
include "../../PHP/clases/Bitacoras.php";
$bitacoras = new Bitacoras($_SESSION['correo'],"Abrió el reporte de Clientes.");
mysqli_query($conection,$bitacoras->query());

?>