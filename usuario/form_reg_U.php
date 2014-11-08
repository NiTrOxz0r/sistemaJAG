<?php
	session_start();
	require_once("../php/master.php");
	// invocamos validarUsuario desde master.php
	validarUsuario();
//NAVBAR:
require_once("../php/cuerpo/head.php");
require_once("../php/cuerpo/navbar.php");?>
<?php

//FOOTER:
require_once("../php/cuerpo/footer.php");
require_once("../php/cuerpo/cola.php");
?>