<?php if ( isset($_POST['seudonimo']) ) :?>
	<?php require("../php/conexion.php");?>
	<?php $query = "SELECT * FROM usuario 
	WHERE seudonimo = '$_POST[seudonimo]' AND status = 1;";?>
	<?php $consulta = conexion($query);?>
	<?php if ($consulta->num_rows == 0): ?>
		<span style="color:green;">
			Seudonimo disponible!
		</span>
	<?php else: ?>
		<span style="color:red;">
			Seudonimo no disponible.
		</span>
	<?php endif ?>
<?php else: ?>
	<?php echo 'error' ?>
<?php endif; ?>