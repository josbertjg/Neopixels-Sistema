<?php 
include ("db.php");
$correo = $_SESSION['correo'];

//PROCESANDO SOLICITUDES DE FETCH API

//ACTUALIZANDO LA CONTRASEÑA
if(isset($_POST['clave'])){

    $clave = $_POST['clave'];

    $query_update=mysqli_query($conection,"UPDATE usuario SET clave='$clave' WHERE correo = '$correo'");

    if($query_update){
        echo "true";
    }else{
        echo "false";
    }
}
//ACTUALIZANDO LA CEDULA
if(isset($_POST['cedula'])){

    $cedula = $_POST['cedula'];

    $query_update=mysqli_query($conection,"UPDATE extrausuario SET cedula='$cedula' WHERE correo = '$correo'");

    if($query_update){
        echo "true";
    }else{
        echo "false";
    }
}
//ACTUALIZANDO EL NOMBRE
if(isset($_POST['nombre'])){

    $nombre = $_POST['nombre'];

    $query_update=mysqli_query($conection,"UPDATE usuario SET nombre='$nombre' WHERE correo = '$correo'");

    if($query_update){
        echo "true";
    }else{
        echo "false";
    }
}
//ACTUALIZANDO EL TELEFONO
if(isset($_POST['telefono'])){

    $telefono = $_POST['telefono'];

    $query_update=mysqli_query($conection,"UPDATE extrausuario SET telefono='$telefono' WHERE correo = '$correo'");

    if($query_update){
        echo "true";
    }else{
        echo "false";
    }
}
//ACTUALIZANDO LA DIRECCION
if(isset($_POST['direccion'])){

    $direccion = $_POST['direccion'];

    $query_update=mysqli_query($conection,"UPDATE extrausuario SET direccion='$direccion' WHERE correo = '$correo'");

    if($query_update){
        echo "true";
    }else{
        echo "false";
    }
}