<?php 

function empezarPagina (
	$tipo_head = 0,
	$tipo_navbar = 0
	){

	//HEAD:
	switch ($tipo_head) {
		case 0:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head.php";
			require_once($enlace);
			break;
		
		default:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head.php";
			require_once($enlace);
			break;
	}
	//NAVBAR
	switch ($tipo_navbar) {
		case 0:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar.php";
			require_once($enlace);
			break;
		
		default:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar.php";
			require_once($enlace);
			break;
	}


}


?>