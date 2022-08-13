<?php include "../PHP/db.php";?>
<?php include "../includes/head.php"; ?>

<section id="mantenimiento" class="d-flex flex-column">
	<h1>Mantenimiento de la base de Datos</h1>
	<div class="d-flex align-center">
		<a id="btnCopia" href="#" class="btn btn-success d-flex jutify-content-center align-center me-4">Realizar copia de seguridad</a>
		<form id="form_restaurar" action="./mantenimiento/Restore.php" method="POST">
			<label>Selecciona un punto de restauración</label><br>
			<select name="restorePoint">
				<option value="0" hidden selected>Selecciona un punto de restauración</option>
				<?php
					include_once './Connet.php';
					$ruta=BACKUP_PATH;
					if(is_dir($ruta)){
						if($aux=opendir($ruta)){
							while(($archivo = readdir($aux)) !== false){
								if($archivo!="."&&$archivo!=".."){
									$nombrearchivo=str_replace(".sql", "", $archivo);
									$nombrearchivo=str_replace("-", ":", $nombrearchivo);
									$ruta_completa=$ruta.$archivo;
									if(is_dir($ruta_completa)){
									}else{
										echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
									}
								}
							}
							closedir($aux);
						}
					}else{
						echo $ruta." No es ruta válida";
					}
				?>
			</select>
			<button type="submit" id="restaurar" class="btn btn-primary">Restaurar</button>
		</form>
	</div>
</section>
