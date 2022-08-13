<?php
    class Usuario{
        function __construct($correo,$clave,$nombre){
            $this -> correo =$correo;
            $this -> clave =$clave;
            $this -> nombre =$nombre;
        }
    }
?>