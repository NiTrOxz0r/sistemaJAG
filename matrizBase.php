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

	//CONTENIDO:?>
	
	<div id="blancoAjax">
		<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->


		<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
	</div>
	
<?php
	//FINALIZAMOS LA PAGINA:
	//trae footer.php y cola.php
	finalizarPagina();?>