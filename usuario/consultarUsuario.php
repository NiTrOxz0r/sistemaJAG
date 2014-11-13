<?php
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
	if(isset($_POST['enviar'])) {
	
		if (empty($_POST['seudonimo']) || empty($_POST['clave'])) {
			echo "El seudonimo o la Contrase&ntilde;a no han sido ingresada.<a href='index.php'>Reintentar</a>";
		}else {
			$conexion = conexion(); // esto es una funcion, no una clase
			$seudonimo = mysqli_real_escape_string($conexion, $_POST['seudonimo']); 
			$clave = mysqli_real_escape_string($conexion, $_POST['clave']); 
			//aplicamos encriptamiento:
			//con salt para el hash
			//lean sobre BCRYPT si quieren saber mas.
			$hash = password_hash($clave, PASSWORD_BCRYPT, ['cost' => 12]);
			$validarForma = new ChequearUsuario($seudonimo,	$hash);
			$query = "SELECT codigo, cod_tipo_usr 
			from usuario 
			where seudonimo  ='".$seudonimo."' and clave='".$hash."';";
			$sql = conexion($query);
			// si hay errores raros descomentar y comentar la linea anterior:
			//   $sql = conexion($query, 1);
			if ( $sql->num_rows == 1 ) {
				$resultado = mysqli_fetch_assoc($sql);
				session_start();
				$_SESSION['codUsrMod'] = $resultado['codigo'];
				$_SESSION['cod_tipo_usr'] = $resultado['cod_tipo_usr'];
				$_SESSION['seudonimo'] = $seudonimo;
				header("Location: ../index.php");
			}else{?>
				Usuario no existe <a href='../index.php'>Reintentar</a>
			<?php
			}
		}
	}else {
		header("location: ../index.php");
	}

?>