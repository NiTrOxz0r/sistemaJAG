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
* @version 1.0
*/

function validarUsuario(){
	//variable inicial que chequea el tipo de usuario:

	if ( !isset($_SESSION['cod_tipo_usr']) ) {
		$_SESSION['cod_tipo_usr'] = 0;
	}
}


?>