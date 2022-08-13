<?php 

include "db.php";
include "clases/Bitacoras.php";
if(isset($_POST['log_usu'])){
    // LOGUEO DEL USUARIO

        $correo = mysqli_real_escape_string($conection, $_POST['correo1']);
        $clave = mysqli_real_escape_string($conection, $_POST['clave1']);

        $query = mysqli_query($conection,"SELECT nombre, correo, clave, DATE_FORMAT(fecha,'%d-%m-%Y') as fecha, tipo FROM usuario WHERE correo = '$correo' AND clave = '$clave'");
        $result = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

        if($result){
            $query_select = mysqli_query($conection,"SELECT * FROM extrausuario WHERE correo = '$correo'");
            $row2 = mysqli_fetch_array($query_select);
            $_SESSION['acceder'] = "false";
            $_SESSION['show'] = "bienvenida";
            if($row2['cedula']!="" && $row2['direccion']!="" && $row2['telefono']!=""){
                $_SESSION['cedula'] = $row2['cedula'];
                $_SESSION['direccion'] = $row2['direccion'];
                $_SESSION['telefono'] = $row2['telefono'];
                $_SESSION['acceder'] = "true";
                $_SESSION['show'] = "none";
            }
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['clave'] = $row['clave'];
            $_SESSION['fecha'] = $row['fecha'];
            $_SESSION['tipo'] = $row['tipo'];

            //REGISTRANDO LAS BITACORAS
            $bitacoras = new Bitacoras($correo,"Inició sesión en el sistema");
            mysqli_query($conection,$bitacoras->query());

            if($row['tipo']==0)
                header("location: ./../cliente.php");
            else
                if($row['tipo']==1)
                    header("location: ./../admin.php");
        }else{
            echo "ERROR USUARIO O CONTRASEÑA INVALIDOS";
            $_SESSION['titulo'] = "¡Ups!";
            $_SESSION['mensaje'] = "¡USUARIO O CONTRASEÑA INVALIDOS!";
            header("location: ../../index.php");
        }                
}

?>
