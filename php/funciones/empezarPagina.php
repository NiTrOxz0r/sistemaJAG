<?php
/**
 * @author Alejandro Granadillo
 * [empezarPagina sirve para generar escuetamente el encabezado
 * de alguna pagina y su respectivo menu de navegacion superior.]
 * {@internal [verifiquen como esta estructurada esta funcion, no tiene ciencia,
 * solo vean que por cada tipo de usuario, hace algo diferente.]}
 * @see index.php
 * @see php/cuerpo/super/body.php
 * @todo [completar para todos los tipos de usuario:
 *       1.
 *       2.
 *       3.
 *       4.
 *       5.]
 * @param  integer $tipo_head   el tipo de encabezado segun codigo tipo_usuario
 * @param  integer $tipo_navbar el tipo de navegacion segun codigo tipo_usuario
 * @return [void] [esta funcion no regresa nada,
 * se asume que carga algo a alguna pagina.
 * por defecto trae la estructura de un usuario desactivado.]
 */
function empezarPagina (
	$tipo_head = 0,
	$tipo_navbar = 0
	){

	//HEAD:
	switch ($tipo_head) {
		case 0:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head/desactivado.php";
			require_once($enlace);
			break;

		case 1:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head/usuario.php";
			require_once($enlace);
			break;

		case 2:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head/usuarioPrivilegiado.php";
			require_once($enlace);
			break;

		case 3:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head/administrador.php";
			require_once($enlace);
			break;

		case 4:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head/superUsuario.php";
			require_once($enlace);
			break;

		case 5:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head/porVerificar.php";
			require_once($enlace);
			break;

		default:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head/desactivado.php";
			require_once($enlace);
			break;
	}
	//NAVBAR
	switch ($tipo_navbar) {
		case 0:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar/desactivado.php";
			require_once($enlace);
			break;

		case 1:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar/usuario.php";
			require_once($enlace);
			break;

		case 2:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar/usuarioPrivilegiado.php";
			require_once($enlace);
			break;

		case 3:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar/administrador.php";
			require_once($enlace);
			break;

		case 4:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar/superUsuario.php";
			require_once($enlace);
			break;

		case 5:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar/porVerificar.php";
			require_once($enlace);
			break;

		default:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar/desactivado.php";
			require_once($enlace);
			break;
	}


}


?>
