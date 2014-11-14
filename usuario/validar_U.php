<?php
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
	//se chequea si el boton enviar fue iniciado:
	//esto es lo mismo que decir
	//algo como: isset(seudonimo && clave)
	if(isset($_POST['enviar'])) :
		//se chequea si alguna variable viene vacia:
		if (empty($_POST['seudonimo']) || empty($_POST['clave'])) :
			session_start();
			$_SESSION['error_login'] = "campos vacios (seudonimo o clave)";
			header("location: ../index.php");
		else :
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
					//inciamos sesion:
					session_start();
					//chequeamos si existen errores
					//en el momento de logueo:
					if (isset($_SESSION['error_login'])) :
						//los eliminamos:
						unset($_SESSION['error_login']);
					endif;
					//se chequea los datos personales del usuario:
					$query = "SELECT p_nombre, p_apellido 
					from docente
					where cod_usr = $resultado[codigo]
					UNION
					SELECT p_nombre, p_apellido 
					from administrativo
					where cod_usr = $resultado[codigo]
					UNION
					SELECT p_nombre, p_apellido 
					from directivo
					where cod_usr = $resultado[codigo];";
					$rs = conexion($query);
					//si no hay PI asociado internamente
					//o hay mas de uno.
					//en caso de haber mas de uno hay que revisar codigo
					//PORQUE ESO NO DEBERIA PASAR NUNCA.
					if ($rs->num_rows <> 1) :
					 	$_SESSION['error_login'] = "Multiples Usuarios con el mismo codigo, revisar registro de usuarios.";
						header("location: ../index.php");
					endif;
					//culminado todo se inician las variables de sesion:
					$datosPersonales = mysqli_fetch_assoc($rs);
					$_SESSION['codUsrMod'] = $resultado['codigo'];
					$_SESSION['cod_tipo_usr'] = $resultado['cod_tipo_usr'];
					$_SESSION['seudonimo'] = $seudonimo;
					$_SESSION['p_apellido'] = $datosPersonales['p_apellido'];
					$_SESSION['p_nombre'] = $datosPersonales['p_nombre'];
					header("Location: ../index.php");
				//clave no coindice:
				else :
					session_start();
					$_SESSION['error_login'] = "clave no coincide";
					header("location: ../index.php");
				endif;
			//usuario no exixte:
			else :
				session_start();
				$_SESSION['error_login'] = "Usuario no existe";
				header("location: ../index.php");
			endif;
		endif;
	//el usuario entra directamente a validar_U.php:
	else : 
		header("location: ../index.php");
	endif;

?>