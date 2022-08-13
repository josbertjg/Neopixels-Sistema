<?php
include './Connet.php';
include "../PHP/db.php";
include "../PHP/clases/Bitacoras.php";
 
$restorePoint=SGBD::limpiarCadena($_POST['restorePoint']);
$sql=explode(";",file_get_contents($restorePoint));
$totalErrors=0;
set_time_limit (60);
$con=mysqli_connect(SERVER, USER, PASS, BD);
$con->query("SET FOREIGN_KEY_CHECKS=0");
for($i = 0; $i < (count($sql)-1); $i++){
    if($con->query($sql[$i].";")){  }else{ $totalErrors++; }
}
$con->query("SET FOREIGN_KEY_CHECKS=1");
$con->close();
if($totalErrors<=0){
	echo "Restauración completada con éxito";

	$nombreArray = explode("/",$restorePoint);

	//REGISTRANDO LAS BITACORAS
	$bitacoras = new Bitacoras($_SESSION['correo'],"Restauró la base de datos con ".$nombreArray[2]);
	mysqli_query($conection,$bitacoras->query());
	
	header("location: ../admin.php");
}else{
	echo "Ocurrio un error inesperado, no se pudo hacer la restauración completamente";
}