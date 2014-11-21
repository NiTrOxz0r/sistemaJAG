<?php
	if(!isset($_SESSION)){
    session_start();
  }
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
	require_once($enlace);
	// invocamos validarUsuario.php desde master.php
	validarUsuario(1);

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
					<h2> Gestionar Alumnos. </h2>
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
					href="Personal_Autorizado/menucon.php">
					<h2>Gestionar Padres, Representantes y Allegados.</h2>
				</a>
				&nbsp;&nbsp;
			</td>
		</table>
		<br>
		<table border="1" align="center">
			<tr>
			<td>
				&nbsp;&nbsp;
				<a class="no-click" data-titulo="gestionarDocente" href="docente/menucon.php">
					<h2>Gestionar Docentes.</h2>
				</a>
				&nbsp;&nbsp;
			</td>
		</table>
		<br>
		<table border="1" align="center">
			<tr>
			<td>
				&nbsp;&nbsp;
				<a class="no-click" href="usuario/menucon.php">
					<h2>Gestionar Usuarios del sistema.</h2>
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
