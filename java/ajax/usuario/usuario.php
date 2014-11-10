<?php 
if ( isset($_POST['seudonimo']) ) :
	if (strlen($_POST['seudonimo']) >= 3 
		and strlen($_POST['seudonimo']) <= 20): 
		$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
		require_once($enlace);
		$con = conexion();
		$seudonimo = mysqli_escape_string($con,$_POST['seudonimo']);
		$query = "SELECT * FROM usuario 
		WHERE seudonimo = '$seudonimo';";
		$consulta = conexion($query);
		if ($consulta->num_rows == 0): ?>
			<span style="color:green;">
				Seudonimo disponible!
			</span>
		<?php else: ?>
			<span style="color:red;">
				Seudonimo no disponible.
			</span>
		<?php endif ?>
	<?php else: ?>
		<span style="color:red;">
			Seudonimo no puede ser </br>mayor a 20 digitos ni menor a 3.
		</span>
	<?php endif ?>
	
<?php else: ?>
	<?php echo 'error' ?>
<?php endif; ?>