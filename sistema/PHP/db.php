<?php 

	session_start();

	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'tesis';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection)
	{
		echo "Error en la conexion";
	}else{
		// echo "Conexion exitosa";
	}
?>