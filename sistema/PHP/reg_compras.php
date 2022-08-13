<?php 
include "db.php";
include "clases/Bitacoras.php";
//-----------------------REGISTRANDO LA SOLICITUD DE COMPRA DEL USUARIO--------------------
if(!empty($_POST['comprar_nombre'] and $_POST['comprar_cedula'] and $_POST['comprar_referencia'] and $_POST['comprar_correo'] and $_POST['comprar_banco'])){
    // CREAMOS LAS VARIABLES PARA SUBIR A LA DB
        $nombre = $_POST['comprar_nombre'];
        $cedula = $_POST['comprar_cedula'];
        $referencia = $_POST['comprar_referencia'];
        $banco = $_POST['comprar_banco'];
        $servicio = $_POST['comprar_servicio'];
        $correo = $_POST['comprar_correo'];
        $descripcion_negocio = $_POST['descripcion_negocio'];

        // VARIABLES DEL SOPORTE DE PAGO
        $ruta = "../upload/soportes_pagos/"; 
        $nombrefinal= trim ($_FILES['img_pago']['name']); //Eliminamos los espacios en blanco
        $nombrefinal= str_replace (" ", "", $nombrefinal);//Sustituye una expresión regular
        $upload= $ruta . $nombrefinal; 

        //MOVIENDO EL SOPORTE DE PAGO A LA RUTA
        move_uploaded_file($_FILES['img_pago']['tmp_name'], $upload);
        $upload = "../sistema/upload/soportes_pagos/".$nombrefinal;
        //PREGUNTANDO SI SE CARGO LA IMAGEN DEL NEGOCIO
        if(is_uploaded_file($_FILES['img_negocio']['tmp_name'])){
            
            // VARIABLES DE LA IMAGEN DEL NEGOCIO
            $ruta2 = "../upload/img_negocios/"; 
            $nombrefinal2= trim ($_FILES['img_negocio']['name']); //Eliminamos los espacios en blanco
            $nombrefinal2= str_replace (" ", "", $nombrefinal2);//Sustituye una expresión regular
            $upload2= $ruta2 . $nombrefinal2; 

            //MOVIENDO LA IMAGEN DEL NEGOCIO A LA RUTA
            move_uploaded_file($_FILES['img_negocio']['tmp_name'], $upload2);
            $upload2 = "../sistema/upload/img_negocios/" . $nombrefinal2;
        }

        if(!$upload2){
            $upload2="No subida.";
        }

        //INSERTANDO LOS DATOS EN LA BD
        $query_insert = mysqli_query($conection,"INSERT INTO pagos (correo, nombre, cedula, referencia, banco, servicio, pago_img_ruta, descripcion_negocio, img_negocio, estado) VALUES ('$correo', '$nombre', '$cedula','$referencia','$banco', '$servicio','$upload','$descripcion_negocio', '$upload2', 'SIN PROCESAR')");
     
        if ($query_insert){
            //REGISTRANDO LAS BITACORAS
            $bitacoras = new Bitacoras($correo,"Pagó el servicio de ".$servicio.".");
            mysqli_query($conection,$bitacoras->query());

            header("location: ../cliente.php");
        }else{
            echo "ERROR AL REGISTRAR AL LA SOLICITUD";
            $_SESSION['titulo'] = "¡Ups!";
            $_SESSION['mensaje'] = "¡ERROR: LA COMPRA NO HA PODIDO SER REALIZADA!";
            header("location: ../cliente.php");
        }                     
}

//-----------------PROCESANDO LA SOLICITUD DE COMPRA DEL USUARIO--------------
if(!empty($_POST['correo-pagos'] and $_POST['servicio-pagos'] and $_POST['descripcion-negocio-pagos'] and $_POST['img-negocio-pagos'])){
    // CREAMOS LAS VARIABLES PARA SUBIR A LA DB
        $correo = $_POST['correo-pagos'];
        $servicio = $_POST['servicio-pagos'];
        $descripcion = $_POST['descripcion-negocio-pagos'];
        $imagen_negocio = $_POST['img-negocio-pagos'];
        $id = $_POST['id-pagos'];

        //ACTUALIZANDO EL ESTADO DEL PAGO
        $query_act = mysqli_query($conection,"UPDATE pagos SET estado='PROCESADO' WHERE id='$id'");

        //INSERTANDO LOS DATOS EN LA BD
        $query_insert = mysqli_query($conection,"INSERT INTO servicios (correo, servicio, descripcion, imagen, estado) VALUES ('$correo', '$servicio', '$descripcion','$imagen_negocio','INACTIVO')");

        //INSERTANDO DATOS EN LA TABLA DE servicios_inactivos Y servicios_activos
        mysqli_query($conection,"DELETE FROM servicios_inactivos WHERE estado='INACTIVO'");
        mysqli_query($conection,"DELETE FROM servicios_activos WHERE estado='ACTIVO'");

        //INSERTANDO EN LA BD LOS SERVICIOS INACTIVOS

        $query_select_inactivos=mysqli_query($conection,"SELECT * FROM servicios WHERE estado='INACTIVO'");

        while($row = mysqli_fetch_array($query_select_inactivos)){ 
            $correo2=$row['correo'];
            $servicio2=$row['servicio'];
            $descripcion=$row['descripcion'];

            mysqli_query($conection,"INSERT INTO servicios_inactivos (correo,servicio,descripcion,estado) VALUES ('$correo','$servicio','$descripcion','INACTIVO')");
        }       
        
        //INSERTANDO EN LA BD LOS SERVICIOS ACTIVOS

        $query_select_activos=mysqli_query($conection,"SELECT * FROM servicios WHERE estado='ACTIVO'");

        while($row = mysqli_fetch_array($query_select_activos)){ 
            $correo2=$row['correo'];
            $servicio2=$row['servicio'];
            $descripcion=$row['descripcion'];
            mysqli_query($conection,"INSERT INTO servicios_activos (correo,servicio,descripcion,estado) VALUES ('$correo','$servicio','$descripcion','ACTIVO')");
        } 


        if ($query_insert){
            $_SESSION['titulo'] = '¡EXCELENTE!';
            $_SESSION['mensaje'] = 'El pago ha sido procesado';
            $_SESSION['servicio'] = $servicio;

            //REGISTRANDO LAS BITACORAS
            $bitacoras = new Bitacoras($_SESSION['correo'],"Procesó el pago de ".$correo." de ".$servicio.".");
            mysqli_query($conection,$bitacoras->query());

            header("location: reg_cantServicios.php");
        }else{
            echo "ERROR AL REGISTRAR AL LA SOLICITUD";
            $_SESSION['titulo'] = "¡Ups!";
            $_SESSION['mensaje'] = "¡ERROR: EL PAGO NO SE HA PROCESADO!";
            header("location: ../admin.php");
        }                     
}

//-----------------ACTIVANDO O DESACTIVANDO EL SERVICIO DEL USUARIO--------------
if(!empty($_POST['correo-servicios'] and $_POST['id-servicios'] and $_POST['estado-servicios'])){
    // CREAMOS LAS VARIABLES PARA SUBIR A LA DB

        $correo = $_POST['correo-servicios'];
        $id = $_POST['id-servicios'];
        $estado = $_POST['estado-servicios'];
        $fecha_venc = $_POST['fecha-venc-servicios'];
        $url = $_POST['url-servicios'];

        //ACTUALIZANDO LOS DATOS
        $query_act = mysqli_query($conection,"UPDATE servicios SET estado='$estado', url='$url', fecha_venc='$fecha_venc' WHERE id='$id'");

        
        //REGISTRANDO LAS BITACORAS
        $query_select = mysqli_query($conection,"SELECT * FROM servicios WHERE id='$id'");
        $row_select = mysqli_fetch_array($query_select);
        if($row_select['estado']=="ACTIVO"){
            $bitacoras = new Bitacoras($_SESSION['correo'],"Activó el servicio de ".$correo." de ".$row_select['servicio'].".");
            mysqli_query($conection,$bitacoras->query());
        }else{
            $bitacoras = new Bitacoras($_SESSION['correo'],"Desactivó el servicio de ".$correo." de ".$row_select['servicio'].".");
            mysqli_query($conection,$bitacoras->query());
        }

    //ELIMINANDO TODOS LOS SERVICIOS DE LA TABLA DE servicios_inactivos Y servicios_activos
    mysqli_query($conection,"DELETE FROM servicios_inactivos WHERE estado='INACTIVO'");
    mysqli_query($conection,"DELETE FROM servicios_activos WHERE estado='ACTIVO'");

    //INSERTANDO EN LA BD LOS SERVICIOS INACTIVOS

    $query_select_inactivos=mysqli_query($conection,"SELECT * FROM servicios WHERE estado='INACTIVO'");

    while($row = mysqli_fetch_array($query_select_inactivos)){ 
        $correo=$row['correo'];
        $servicio=$row['servicio'];
        $descripcion=$row['descripcion'];

        mysqli_query($conection,"INSERT INTO servicios_inactivos (correo,servicio,descripcion,estado) VALUES ('$correo','$servicio','$descripcion','INACTIVO')");
    }       
    
    //INSERTANDO EN LA BD LOS SERVICIOS ACTIVOS

    $query_select_activos=mysqli_query($conection,"SELECT * FROM servicios WHERE estado='ACTIVO'");

    while($row = mysqli_fetch_array($query_select_activos)){ 
        $correo=$row['correo'];
        $servicio=$row['servicio'];
        $descripcion=$row['descripcion'];
        mysqli_query($conection,"INSERT INTO servicios_activos (correo,servicio,descripcion,estado) VALUES ('$correo','$servicio','$descripcion','ACTIVO')");
    } 


        if ($query_act){
            $_SESSION['titulo'] = '¡EXCELENTE!';
            $_SESSION['mensaje'] = 'El pago ha sido procesado';
            header("location: ../admin.php");
        }else{
            echo "ERROR AL REGISTRAR AL LA SOLICITUD";
            $_SESSION['titulo'] = "¡Ups!";
            $_SESSION['mensaje'] = "¡ERROR: EL PAGO NO SE HA PROCESADO!";
            header("location: ../admin.php");
        }                     
}

//-----------------DANDO O QUITANDO PERMISOS DE ADMINISTRADOR AL USUARIO--------------
if(!empty($_POST['id-usuario'])){
    // CREAMOS LAS VARIABLES PARA SUBIR A LA DB

        $tipo = $_POST['tipo-usuario'];
        $id = $_POST['id-usuario'];

        //ACTUALIZANDO LOS DATOS
        $query_act = mysqli_query($conection,"UPDATE usuario SET tipo='$tipo' WHERE id='$id'");

        if ($query_act){
            $_SESSION['titulo'] = '¡EXCELENTE!';
            $_SESSION['mensaje'] = 'SE HAN CAMBIADO LOS PERMISOS DEL USUARIO';

            //REGISTRANDO LAS BITACORAS
            $query_select = mysqli_query($conection,"SELECT * FROM usuario WHERE id='$id'");
            $row_select= mysqli_fetch_array($query_select);

            if($tipo==0){
                $bitacoras = new Bitacoras($_SESSION['correo'],"Le quitó los permisos de administrador a ".$row_select['correo'].".");
                mysqli_query($conection,$bitacoras->query());
            }else{
                $bitacoras = new Bitacoras($_SESSION['correo'],"Le otorgó permisos de administrador a ".$row_select['correo'].".");
                mysqli_query($conection,$bitacoras->query());
            }

            header("location: ../admin.php");
        }else{
            echo "ERROR AL REGISTRAR AL LA SOLICITUD";
            $_SESSION['titulo'] = "¡Ups!";
            $_SESSION['mensaje'] = "¡ERROR: LOS CAMBIOS NO HAN SIDO EFECTUADOS!";
            header("location: ../admin.php");
        }                     
}

?>