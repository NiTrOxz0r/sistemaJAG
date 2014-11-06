<?php /*si el codigo es mandado como parametro hace esto:*/?>
<?php if ( isset($_GET['param_id']) && isset($_REQUEST['cod_mun']) ): ?>
	<?php require("../php/conexion.php");
	$query = "select * from municipio where cod_edo = ".$_REQUEST['param_id'].";";
	//$consulta = mysql_query($query)	or die( var_dump($query)."...error: ".mysqli_error() );
	$consulta = conexion($query);
	while( $fila = mysqli_fetch_array($consulta) ) : ?>
		<?php if ($fila['codigo'] == $_REQUEST['cod_mun']): ?>
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
	<?php //$consulta = mysql_query("select * from municipio where cod_edo = '$_GET[param_id]'");?>
	<?php $query = "select * from municipio where cod_edo = '$_GET[param_id]'"; ?>
	<?php $consulta = conexion($query); ?>
	<option value="">--Seleccionar--</option>
	<?php while ($fila = mysqli_fetch_array($consulta)) : ?>
    <option value="<?php echo $fila["codigo"] ?>">
     <?php echo utf8_encode($fila["descripcion"]); ?>
    </option>
	<?php endwhile ?>
<?php endif ?>