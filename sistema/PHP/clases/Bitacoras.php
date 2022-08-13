<?php
    include "../db.php";

    class Bitacoras{
        function __construct($correo,$accion){
            $this -> correo =$correo;
            $this -> accion =$accion;
        }
        function query(){
            return "INSERT INTO bitacoras (correo, accion) VALUES ('".$this->correo."', '".$this->accion."')";
        }
    }
?>