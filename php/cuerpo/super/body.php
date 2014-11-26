<?php
if(!isset($_SESSION)){
	session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 4, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CONTENIDO:?>
<div id="contenido">
	<div id="blancoAjax">
		<center>
			<h1>Sistema JAG.</h1>
			<h2>opciones</h2>
		</center>

		<table align="center">
			<tr>
				<td  colspan="2" align="center">
					&nbsp;&nbsp;
					<a
						class="no-click"
						data-titulo="Registro"
						href="Personal_Autorizado/form_reg_P.php">
						<h2>PROCESO DE REGISTRO 2014-2015</h2>
					</a>
					&nbsp;&nbsp;
				</td>
			</tr>
		</table>
		<table border="1" align="center">
			<tr>
				<td>
					&nbsp;&nbsp;
					<a
						class="no-click"
						data-titulo="GestionarAlumno"
						href="alumno/menucon.php">
						<h2>Gestionar Alumno</h2>
					</a>
					&nbsp;&nbsp;
				</td>
				<td>
					&nbsp;&nbsp;
					<a
						class="no-click"
						data-titulo="personalAutorizado"
						href="Personal_Autorizado/menucon.php">
						<h2>Gestionar Padres y Representante</h2>
					</a>
					&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;&nbsp;
					<a class="no-click" data-titulo="gestionarProfesor" href="curso/menucon.php">
						<h2>Gestionar Cursos</h2>
					</a>
					&nbsp;&nbsp;
				</td>
				<td>
					&nbsp;&nbsp;
					<a class="no-click" href="usuario/menucon.php">
						<h2>Gestionar Usuarios del sistema</h2>
					</a>
					&nbsp;&nbsp;
				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript" src="java/ajax/cargadorOnClick.js"></script>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
