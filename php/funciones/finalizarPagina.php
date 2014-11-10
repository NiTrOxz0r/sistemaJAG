<?php 

function finalizarPagina (
	$tipo_footer = 0,
	$tipo_cola = 0
	){

	//FOOTER:
	switch ($tipo_footer) {
		case 0:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer.php";
			require_once($enlace);
			break;
		
		default:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head.php";
			require_once($enlace);
			break;
	}
	//COLA
	switch ($tipo_cola) {
		case 0:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/cola.php";
			require_once($enlace);
			break;
		
		default:
			$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/cola.php";
			require_once($enlace);
			break;
	}

}


?>