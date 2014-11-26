<?php

/**
* @author Granadillo Alejandro.
*
* [validarUsuario chequea al usuario en el sistema
* y genera si no esta con sesion una variable nula.]
*
* @internal chequea si session esta creada
* sino pone por defecto 0
* que es igual a desactivado o nulo.
*
* @param  integer $tipo chequea si necesita o no validacion
* @return void        no regresa nada.
*
* @version 1.2
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
				$_SESSION['cod_tipo_usr'] = null;
			}
			break;
	endswitch;
}


?>
