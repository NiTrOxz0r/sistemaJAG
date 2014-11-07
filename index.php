<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php 

//variable inicial que chequea el tipo de usuario:

if ( !isset($_SESSION['cod_tipo_usr']) ) {
	$_SESSION['cod_tipo_usr'] = 0;
}

switch ($_SESSION['cod_tipo_usr']) {
	case 0:
		require "php/validacion/form_usr.php";
		break;
	
	case 1:

		break;

	case 2:

		break;

	case 3:

			break;

	case 4:

			break;

	default:
		require "php/validacion/form_usr.php";
		break;
} 

?>

</body>
</html>