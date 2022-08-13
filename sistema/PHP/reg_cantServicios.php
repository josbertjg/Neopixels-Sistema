<?php 
include ("db.php");
//LLENANDO EL REPORTE DE SERVICIOS COMPRADOS
$servicio = $_SESSION['servicio'];
$query=mysqli_query($conection,"SELECT * FROM servicios_comprados WHERE nombre='$servicio'");
$row=mysqli_fetch_array($query);
$cantidad=$row['cantidad'];
$cantidad=intval($cantidad)+1;
$query_updte=mysqli_query($conection,"UPDATE servicios_comprados SET cantidad='$cantidad' WHERE nombre='$servicio'");
header("location: reg_cantClientes.php");
?>