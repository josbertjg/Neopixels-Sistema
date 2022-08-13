<?php 
include ("db.php");

//LLENANDO EL REPORTE DE LA CANTIDAD DE CLIENTES

//GUARDANDO LA CANTIDAD DE USUARIOS
mysqli_query($conection,"DELETE FROM clientes WHERE cantidad>=1");
$usuarios = mysqli_query($conection,"SELECT * FROM usuario");
while($rowUsu = mysqli_fetch_array($usuarios)){ 
    $correo=$rowUsu['correo'];
    $query=mysqli_query($conection,"SELECT correo FROM servicios WHERE correo='$correo'");
    $cantidad=0;
    while($array = mysqli_fetch_array($query)){
        $cantidad++;
    }
    if($cantidad>=1){
        mysqli_query($conection,"INSERT INTO clientes (correo,cantidad) VALUES ('$correo','$cantidad')");
    }
}
header("location: ../admin.php");
?>