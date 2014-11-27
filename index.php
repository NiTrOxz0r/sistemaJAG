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
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CUERPO:
echo '<div class="contenido" id="contenido">';
switch ($_SESSION['cod_tipo_usr']) {
	//SIN TIPO:
	case null:
		require "usuario/formUsuario.php";
		echo '<script type="text/javascript" src="java/validacionUsuario.js"></script>';
		break;
	//desactivado:
	case 0:
		require "php/cuerpo/usuario/desactivado.php";
		break;
	//USUARIO:
	case 1:
		require "php/cuerpo/usuario/usuario.php";
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
		require "php/cuerpo/usuario/porVerificar.php";
		break;
	//USUARIO EXTERNO O VENEFICIADO:
	//recomendacion para futuras mejoras o implementaciones de tipo de usuario
	case 6:
		// require "php/cuerpo/usuario/usuarioExterno.php";
		break;
	case 255:
		//usando admin mientras tanto:
		require "php/cuerpo/admin/body.php";
		break;
	//TIPO DESCONOCIDO:
	default:
		require "usuario/formUsuario.php";
		echo '<script type="text/javascript" src="java/validacionUsuario.js"></script>';
		break;
}
echo '</div>';

//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

?>
