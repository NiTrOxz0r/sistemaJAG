<?php

function finalizarPagina (
	$tipo_footer = 0,
	$tipo_cola = 0
	){

	//FOOTER:
	switch ($tipo_footer) {
		case 0:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer/desactivado.php";
			require_once($enlace);
			break;

		case 1:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer/usuario.php";
			require_once($enlace);
			break;

		case 2:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer/usuarioPrivilegiado.php";
			require_once($enlace);
			break;

		case 3:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer/administrador.php";
			require_once($enlace);
			break;

		case 4:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer/superUsuario.php";
			require_once($enlace);
			break;

		case 5:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer/porVerificar.php";
			require_once($enlace);
			break;

		default:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer/desactivado.php";
			require_once($enlace);
			break;
	}
	//COLA
	switch ($tipo_cola) {
		case 0:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/cola/cola.php";
			require_once($enlace);
			break;

		default:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/cola/cola.php";
			require_once($enlace);
			break;
	}

}


?>
