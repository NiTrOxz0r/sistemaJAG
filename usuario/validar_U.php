<?php

/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 *
 * {@internal [si tienen dudas sobre este archivo
 * pregunten, no es tan dificil, solo sigan el flujo del
 * mismo, para registrar a un personal que desee ser usuario:
 *
 * 1. se chequea variables de entrada.
 * 2. se validan variables de entrada por medio de ChequearUsuario.
 * 3. se comprueba clave de BD con la de entrada.
 * 4. se chequea usuario en BD.
 * 5. se incia variable de sesion en sistemaJAG.
 *
 * y listo.
 *
 * este archivo fue cambiado para ajustarse a la nueva base de datos.]}
 *
 * @version [1.1]
 */

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
			$clave = array('simple' => $_POST['clave']);
			$validarForma = new ChequearUsuario ($_POST['seudonimo'], $clave);
			//hacemos el query para determinar entre otras cosas
			//la clave del usuario en hash:
			$query = "SELECT codigo, cod_tipo_usr, seudonimo, clave
			from usuario
			where seudonimo = $validarForma->seudonimo;";
			$sql = conexion($query);
			//si el usuario esta en la base de datos:
			if ( $sql->num_rows == 1 ) :
				$resultado = mysqli_fetch_assoc($sql);
				//verificamos encriptamiento:
				//con salt para el hash
				//verifica la clave segun la clave encriptada en BD:
				//ver clase ChequearUsuario si no entieden esto.
				$clave = $validarForma->clave($validarForma->clave['simple']);
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
					$query = "SELECT
					p_nombre, p_apellido,
					usuario.codigo as codigo,
					seudonimo, cod_tipo_usr
					from persona
					inner join personal
					on persona.codigo = personal.cod_persona
					inner join usuario
					on personal.cod_usr = usuario.codigo
					where
					usuario.codigo = $resultado[codigo];";
					$rs = conexion($query);
					//si no hay PI asociado internamente
					//o hay mas de uno.
					//en caso de haber mas de uno hay que revisar codigo
					//PORQUE ESO NO DEBERIA PASAR NUNCA.
					if ($rs->num_rows <> 1) :
						mysqli_close($conexion);
					 	$_SESSION['error_login'] = "Multiples Usuarios con el mismo codigo, revisar registro de usuarios.";
						header("location: ../index.php");
					endif;
					//culminado todo se inician las variables de sesion:
					$datosPersonales = mysqli_fetch_assoc($rs);
					$_SESSION['codUsrMod'] = $datosPersonales['codigo'];
					$_SESSION['cod_tipo_usr'] = $datosPersonales['cod_tipo_usr'];
					$_SESSION['seudonimo'] = $datosPersonales['seudonimo'];
					$_SESSION['p_apellido'] = $datosPersonales['p_apellido'];
					$_SESSION['p_nombre'] = $datosPersonales['p_nombre'];
					//cerramos $conexion:
					mysqli_close($conexion);
					header("Location: ../index.php");
				//clave no coindice:
				else :
					mysqli_close($conexion);
					session_start();
					$_SESSION['error_login'] = "clave no coincide";
					header("location: ../index.php");
				endif;
			//usuario no exixte:
			else :
				mysqli_close($conexion);
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
