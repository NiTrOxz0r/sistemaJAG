<?php
	session_start();
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
	require_once($enlace);
	// invocamos validarUsuario desde master.php
	validarUsuario();
	//HEAD:
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/head.php";
	require_once($enlace);
	//NAVBAR
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/navbar.php";
	require_once($enlace);

	//CONTENIDO:?>
	
	<div id="nombreDelModuloOarchivo">
		
	</div>
	
<?php
	//FOOTER:
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/footer.php";
	require_once($enlace);
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/cuerpo/cola.php";
	require_once($enlace);
?>