<?php 
session_start();
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario desde master.php
validarUsuario();
	
if ( isset($_POST['seudonimo']) && isset($_POST['clave']) ): 

	$seudonimo = $_POST['seudonimo'];
	$clave = $_POST['clave'];
	$validarForma = new ChequearUsuario($seudonimo,	$clave);

	$query = "INSERT INTO usuario	
	VALUES
	(null, '$seudonimo', '$clave', 
		5, 1, 1, null, 1, null );";
	$resultado = conexion($query);
	$query = "SELECT codigo, seudonimo, cod_tipo_usr 
	from usuario 
	where seudonimo = '$seudonimo'
	and clave = '$clave'";
	$resultado = conexion($query);
	if ( $resultado->num_rows == 1 ) {
		$datos = mysqli_fetch_assoc($resultado);
		$_SESSION['codUsrMod'] = $datos['codigo'];
		$_SESSION['codigo'] = $datos['codigo'];
		$_SESSION['seudonimo'] = $datos['seudonimo'];
		$_SESSION['cod_tipo_usr'] = $datos['cod_tipo_usr'];
	}else{
		echo "error en la base de datos!";
	}
	?>
	<div>
		<h3>
			Bienvenido al sistema <?php echo $seudonimo ?>!
		</h3>
		<p>
			Ud. ya es miembro de este sistema, por favor contacte a un administrador para empezar a usar las diferentes actividades.
		</p>
		<p>
			<a href="../index.php">Regresar al sistema</a>
		</p>
	</div>
	
<?php else: ?>
	<?php echo 'Problemas en registro de usuario, por favor contacte a un administrador del sistema.' ?>
<?php endif ?>