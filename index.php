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
	//SIN TIPO:
	case 0:
		require "usuario/formUsuario.php";
		echo '<script type="text/javascript" src="java/validacionUsuario.js"></script>';
		break;
	//USUARIO:
	case 1:
		require "php/cuerpo/usuario/body.php";
		break;
	//USUARIO PRIV:
	case 2:
		echo "Validacion tipo de usuario: Usuario Privilegiado en desarrollo";
		break;
	//ADMIN:
	case 3:
			require "php/cuerpo/admin/body.php";
			break;
	//SUPER USUARIO:
	case 4:
			//usando admin mientras tanto:
			require "php/cuerpo/admin/body.php";
			break;
	//USUARIO POR VERIFICAR:
	case 5:
		//usando admin mientras tanto:
		require "php/cuerpo/usuario/porVerificar.php";
		break;
	case 255:
		//usando admin mientras tanto:
		require "php/cuerpo/admin/body.php";
		break;
	//TIPO DESCONOCIDO:
	default:
		require "usuario/formUsuario.php";
		break;
}
echo '</div>';

//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();

?>
