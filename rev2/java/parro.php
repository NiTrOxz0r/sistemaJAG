<?php /*si el codigo es mandado como parametro hace esto:*/?>
<?php if ( isset($_GET['param_id2']) && isset($_REQUEST['cod_parro']) ): ?>
	<?php require("../php/conexion.php");
	$query = "select * from parroquia where cod_mun = ".$_REQUEST['param_id2'].";";
	//$consulta = mysql_query($query) or die( var_dump($query)."...error: ".mysqli_error() );
	$consulta = conexion($query);
	while( $fila = mysqli_fetch_array($consulta) ) : ?>
		<?php if ($fila['codigo'] == $_REQUEST['cod_parro']): ?>
			<option
				selected="selected"
				value="<?php echo $fila['codigo'] ?>">
				<?php echo utf8_encode($fila["descripcion"]) ?>
			</option>
		<?php else: ?>
			<option value="<?php echo $fila['codigo'] ?>">
				<?php echo utf8_encode($fila["descripcion"]) ?>
			</option>
		<?php endif ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php /*sino entonces es como si no paso nada:*/ ?>
	<?php require("../php/conexion.php");?>
	<?php //$consulta = mysql_query("select * from parroquia where cod_mun=".$_REQUEST['param_id2']);?>
	<?php $query = "select * from parroquia where cod_mun=".$_REQUEST['param_id2'].";"; ?>
	<?php $consulta = conexion($query); ?>
	<option value="">--Seleccionar--</option>
	<?php while ($fila = mysqli_fetch_array($consulta)) : ?>
    <option value="<?php echo $fila["codigo"] ?>">
     <?php echo utf8_encode($fila["descripcion"]); ?>
    </option>
	<?php endwhile ?>
<?php endif ?>