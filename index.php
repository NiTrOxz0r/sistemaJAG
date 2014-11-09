<?php
	if(!isset($_SESSION)){ 
    session_start(); 
  }
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
	require_once($enlace);
	// invocamos validarUsuario.php desde master.php
	validarUsuario();

	//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
	//DESDE empezarPagina.php
	empezarPagina();

	//CUERPO:
	echo '<div class="contenido" id="contenido">';
	switch ($_SESSION['cod_tipo_usr']) {
		case 0:
			require "usuario/formUsuario.php";
			echo '<script type="text/javascript" src="java/validacionUsuario.js"></script>';
			break;
		
		case 1:
			echo "Validacion tipo de usuario: usuario en desarrollo";
			break;

		case 2:
			echo "Validacion tipo de usuario: Usuario Privilegiado en desarrollo";
			break;

		case 3:
				require "php/cuerpo/admin/body.php";
				break;

		case 4:
				//usando admin mientras tanto:
				require "php/cuerpo/admin/body.php";
				break;

		default:
			require "usuario/formUsuario.php";
			break;
	} 
	echo '</div>';

	//FINALIZAMOS LA PAGINA:
	//trae footer.php y cola.php
	finalizarPagina();
	
?>
