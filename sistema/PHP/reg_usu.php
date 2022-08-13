<?php 
include ("db.php");
include "clases/Usuario.php";
include "clases/Bitacoras.php";
//REGISTRANDO AL USUARIO EN EL INDEX
if(isset($_POST['reg_usu'])){
    // REGISTRANDO AL USUARIO

    $usuario = new Usuario(strtolower($_POST['correo2']),$_POST['clave2'],$_POST['nombre']);

    // $correo = strtolower($_POST['correo2']);
    // $clave = $_POST['clave2'];
    // $nombre = $_POST['nombre'];
    
    //VALIDANDO QUE LOS DATOS NO ESTEN DUPLICADOS
    $query_valid=mysqli_query($conection,"SELECT * FROM usuario WHERE correo = '$usuario->correo'");
    $result = mysqli_num_rows($query_valid);
    if($result){
        $_SESSION['titulo'] = "¡Ups!";
        $_SESSION['mensaje'] = "¡EL USUARIO YA ESTA REGISTRADO!";
        header("location: ../../index.php");
    }else{
        //REGISTRANDO EL USUARIO EN LA BD
        $query_insert = mysqli_query($conection,"INSERT INTO usuario (nombre, correo, clave, tipo) VALUES ('$usuario->nombre', '$usuario->correo', '$usuario->clave','0')");

        //REGISTRANDO LAS BITACORAS
        $bitacoras = new Bitacoras($usuario->correo,"Se registró en el sistema");
        mysqli_query($conection,$bitacoras->query());

        if ($query_insert){
            $_SESSION['titulo'] = '¡EXCELENTE!';
            $_SESSION['mensaje'] = '¡EL USUARIO HA SIDO REGISTRADO!';
            header("location: ../../index.php");
        }else{
            echo "ERROR AL REGISTRAR AL USUARIO";
            $_SESSION['titulo'] = "¡Ups!";
            $_SESSION['mensaje'] = "¡ERORR: EL USUARIO NO HA PODIDO SER REGISTRADO!";
            header("location: ../../index.php");
        }                
    }
}
//CULMINANDO DE REGISTRAR AL USUARIO
if(!empty($_POST['telefono'] and $_POST['direccion'] and $_POST['cedula'])){
    // REGISTRANDO AL USUARIO
        $nombre = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

        //ACTUALIZANDO EL NOMBRE
        $actNombre=mysqli_query($conection,"UPDATE usuario SET nombre = '$nombre' WHERE correo = '$correo'");
        
        //INSERTANDO EN LA BD LOS DATOS DE CEDULA NUMERO DE TELEFONO Y DIRECCION
        $query_insert = mysqli_query($conection,"INSERT INTO extrausuario (correo,cedula,telefono,direccion) VALUES ('$correo','$cedula','$telefono','$direccion')");

        //REGISTRANDO LAS BITACORAS
        $bitacoras = new Bitacoras($correo,"Culminó su registro insertando sus datos en el sistema.");
        mysqli_query($conection,$bitacoras->query());

            if ($query_insert){
                $query = mysqli_query($conection,"SELECT * FROM extrausuario WHERE correo = '$correo'");
                $row = mysqli_fetch_array($query);

                $query2 = mysqli_query($conection,"SELECT nombre FROM usuario WHERE correo = '$correo'");
                $row2 = mysqli_fetch_array($query2);

                $_SESSION['nombre'] = $row2['nombre'];
                $_SESSION['cedula'] = $row['cedula'];
                $_SESSION['direccion'] = $row['direccion'];
                $_SESSION['telefono'] = $row['telefono'];
                $_SESSION['acceder'] = "true";
                $_SESSION['show'] = 'culminar_registro';
                header("location: ../cliente.php");
            }else{
                echo "ERROR AL REGISTRAR DATOS";
                $_SESSION['titulo'] = "¡Ups!";
                $_SESSION['mensaje'] = "¡ERROR: NO SE HAN PODIDO INTRODUCIR LOS DATOS!\n PARA MAS INFORMACION COMUNÍCATE AL: +58 414-5598216";
                header("location: ../cliente.php");
            } 
//-----------------------------------------------------
}
?>