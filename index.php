<?php
	session_start();
	require("php/master.php");
	// invocamos validarUsuario desde master.php
	validarUsuario();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema JAG</title>
	<script type="text/javascript" src="java/jquery-1.11.0.min.js"></script>
</head>
<body>
<?php 

//NAVBAR:
require "php/cuerpo/navbar.php";
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

//FOOTER:
require "php/cuerpo/footer.php";
?>

</body>
</html>