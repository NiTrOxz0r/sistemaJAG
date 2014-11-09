<?php 

/**
* @author Granadillo Alejandro.
*	noviembre 2014.
*
* @internal chequea si session esta creada
* sino pone por defecto 0
* que es igual a desactivado o nulo.
*
* @return void
*
* @version 1.1
*/

function validarUsuario($tipo = 0){
	$index = enlaceDinamico();
	switch ($tipo) :
		case 1:
			//variable inicial que chequea el tipo de usuario:

			if ( !isset($_SESSION['cod_tipo_usr']) ) {
				session_destroy();
				session_unset();
				session_start();
				$_SESSION['cod_tipo_usr'] = 0;
				header("Location:".$index);
			}elseif ( !isset($_SESSION['codUsrMod']) ) {
				session_destroy();
				session_unset();
				session_start();
				header("Location:".$index);
			}
			break;
		
		default:
			//variable inicial que chequea el tipo de usuario:

			if ( !isset($_SESSION['cod_tipo_usr']) ) {
				session_destroy();
				session_unset();
				session_start();
				$_SESSION['cod_tipo_usr'] = 0;
			}
			break;
	endswitch;
}


?>