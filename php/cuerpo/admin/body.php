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
<div id="contenido">
	<div id="blancoAjax">
		<center>
			<h1>Sistema JAG.</h1>
			<h2>opciones</h2>
		</center>

		<table border="1" align="center">
			<tr>
			<td>
				&nbsp;&nbsp;
				<a 
					class="no-click"
					data-titulo="GestionarAlumno"
					href="alumno/body.php">
					<h2> Gestionar Alumno. </h2>
				</a>
				&nbsp;&nbsp;
			</td>
		</table>
		<br>
		<table border="1" align="center">
			<tr>
			<td>
				&nbsp;&nbsp;
				<a 
					class="no-click"
					data-titulo="personalAutorizado"
					href="Personal_Autorizado/form_reg_P.php"> 
					<h2>Gestionar Padres y Representante.</h2> 
				</a>
				&nbsp;&nbsp;
			</td>
		</table>
		<br>	
		<table border="1" align="center">
			<tr>
			<td>
				&nbsp;&nbsp;
				<a class="no-click" data-titulo="gestionarProfesor" href="profesor/body.php"> 
					<h2>Gestionar Profesor.</h2> 
				</a>
				&nbsp;&nbsp;
			</td>
		</table>
		<br>	
		<table border="1" align="center">
			<tr>
			<td>
				&nbsp;&nbsp;
				<a class="no-click" href="usuario/body.php">
					<h2>Gestionar Personal Autorizado.</h2> 
				</a>
				&nbsp;&nbsp;
			</td>
		</table>
	</div>
</div>
<script type="text/javascript" src="java/ajax/cargadorOnClick.js"></script>

<?php
	//FINALIZAMOS LA PAGINA:
	//trae footer.php y cola.php
	finalizarPagina();?>