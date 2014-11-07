<?php
	session_start();
	require("php/conexion.php");		
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

//NAVBAR:
require "php/cuerpo/navbar.php";


//variable inicial que chequea el tipo de usuario:

if ( !isset($_SESSION['cod_tipo_usr']) ) {
	$_SESSION['cod_tipo_usr'] = 0;
}

switch ($_SESSION['cod_tipo_usr']) {
	case 0:
		require "php/usuario/formUsuario.php";
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
			echo "Validacion tipo de usuario: Super Usuario en desarrollo";
			break;

	default:
		require "php/usuario/formUsuario.php";
		break;
} 


//FOOTER:
require "php/cuerpo/footer.php";
?>

</body>
</html>