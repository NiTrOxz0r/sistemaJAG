<?php
/**
 * @author [Alejandro Granadillo]
 *
 * @internal esto es utilizado para
 * hacer los queries por medio
 * de ajax para saber si la
 * cedula esta disponible
 *
 * @see
 * usuario/menucon.php
 * @example
 * usuario/menucon.php
 */
if ( isset($_POST['cedula']) ) :
	if (strlen($_POST['cedula']) == 8):
		$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
		require_once($enlace);
		$con = conexion();
		$cedula = mysqli_escape_string($con,$_POST['cedula']);
		$query = "SELECT codigo FROM persona
		WHERE cedula = '$cedula';";
		$consulta = conexion($query);
		if ($consulta->num_rows == 0): ?>
			<span id="disponible" data-disponible="true">
			</span>
		<?php else: ?>
			<span id="disponible" data-disponible="false">
			</span>
		<?php endif ?>
	<?php else: ?>
		<span style="color:red;">
			cedula no puede ser </br>mayor a 20 digitos ni menor a 3.
		</span>
	<?php endif ?>
<?php else: ?>
	<?php echo 'error' ?>
<?php endif; ?>
