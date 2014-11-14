<?php
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
	if(isset($_POST['enviar'])) :
	
		if (empty($_POST['seudonimo']) || empty($_POST['clave'])) :?>
			<p>
				El seudonimo o la Contrase&ntilde;a no han sido ingresada correctamente.
			</p>
			<a href='index.php'>Reintentar</a>
		<?php else :
			//iniciamos conexion para 
			//establecer el escape_string,
			//detallese que la variable entra en la funcion
			//mysqli_real_escape_string:
			$conexion = conexion(); // esto es una funcion, no una clase
			$seudonimo = mysqli_real_escape_string($conexion, $_POST['seudonimo']); 
			$clave = mysqli_real_escape_string($conexion, $_POST['clave']);
			//hacemos el query para determinar entre otras cosas
			//la clave del usuario en hash:
			$query = "SELECT codigo, cod_tipo_usr, clave 
			from usuario 
			where seudonimo  ='".$seudonimo."';";
			$sql = conexion($query);
			//si el usuario esta en la base de datos:
			if ( $sql->num_rows == 1 ) :
				$resultado = mysqli_fetch_assoc($sql);
				//verificamos encriptamiento:
				//con salt para el hash
				//verifica la clave segun la clave encriptada en BD:
				$hash = password_verify($clave, $resultado['clave']);
				//password_verify regresa falso si la clave no concuerda:
				if ($hash) :
					session_start();
					$_SESSION['codUsrMod'] = $resultado['codigo'];
					$_SESSION['cod_tipo_usr'] = $resultado['cod_tipo_usr'];
					$_SESSION['seudonimo'] = $seudonimo;
					header("Location: ../index.php");
				//clave no coindice:
				else : 
					header("location: ../index.php?error=error&q=1");
				endif;
			//usuario no exixte:
			else : 
				header("location: ../index.php?error=error&q=2");
			endif;
		endif;
	//el usuario entra directamente a validar_U.php:
	else : 
		header("location: ../index.php");
	endif;

?>