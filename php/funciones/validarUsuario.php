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
* @see php/cuerpo/usuario/desactivado.php
* @see php/cuerpo/usuario/usuario.php
*
* @param  integer $tipo chequea si necesita o no validacion.
* @param  integer $nivelMinimo  el nivel minimo para acceder a alguna pagina.
* @param  integer $nivelUsuario el nivel del usuario para comparar
* @return void        no regresa nada.
*
* @version 1.3
*/
function validarUsuario($tipo = 0, $nivelMinimo = 1, $nivelUsuario = null){
	$index = enlaceDinamico();
	// usuario por verificar
	// se considera igual que desactivado
	// para efectos de validacion.
	if ($nivelUsuario === 5) :
		$nivelUsuario = 0;
	endif;
	// para implementacion futura:
	if ($nivelUsuario === 6) :
		$nivelUsuario = 1;
	endif;
	switch ($tipo) :
		case 1:
			//variable inicial que chequea el tipo de usuario:
			if ( !isset($_SESSION['cod_tipo_usr']) ) :
				session_destroy();
				session_unset();
				session_start();
				$_SESSION['cod_tipo_usr'] = null;
				header("Location:".$index);
			elseif ( !isset($_SESSION['codUsrMod']) ) :
				session_destroy();
				session_unset();
				session_start();
				header("Location:".$index);
			endif;
			// se chequea si el usuario tiene nivel suficiente
			// si no, lo manda para index.
			if ( $nivelMinimo > $nivelUsuario ) :
				header("Location:".$index."?error=1&validacionUsuario=1");
			endif;
			break;
		default:
			//variable inicial que chequea el tipo de usuario:
			if ( !isset($_SESSION['cod_tipo_usr']) ) :
				session_destroy();
				session_unset();
				session_start();
				$_SESSION['cod_tipo_usr'] = null;
			endif;
			break;
		case 0:
			//variable inicial que chequea el tipo de usuario:
			if ( !isset($_SESSION['cod_tipo_usr']) ) :
				session_destroy();
				session_unset();
				session_start();
				$_SESSION['cod_tipo_usr'] = null;
			endif;
			break;
	endswitch;
}


?>
