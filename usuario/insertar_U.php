<?php 
session_start();
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario desde master.php
validarUsuario();

if ($_SESSION['cod_tipo_usr'] == 0) {
	header($_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/index.php?error=cod_tip_usr");
}
	
if ( isset($_POST['seudonimo']) && isset($_POST['clave']) ): 

	$seudonimo = $_POST['seudonimo'];
	$clave = $_POST['clave'];
	$validarForma = new ChequearUsuario($seudonimo,	$clave);

	$query = "INSERT INTO usuario	
	VALUES
	(null, $seudonimo, $clave, 
		1, 1, $_SESSION[cod_tipo_usr], 4294967295,
		null, 4294967295, null );";
	$resultado = conexion($query, 1);
else: ?>
	<?php echo 'if s y c fallo' ?>
<?php endif ?>