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
		<div class="container">
			<div class="row">
				<div class="col-ms-12 text-center">
					<h2>
						Sistema de Inscripcion
					</h2>
					<h1>
						E.B.N.B. Jose Antonio Gonzalez
					</h1>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="sm-12">
					<div class="jumbotron">
					  <h1>Inscripcion!</h1>
					  <p>Proceso de Registro 2014-2015</p>
					  <p>
					  	<h5>Recaudos necesarios:</h5>
				  		<ul>
				  			<li>...</li>
				  			<li>...</li>
				  			<li>...</li>
				  			<li>...</li>
				  			<li>...</li>
				  		</ul>
					  </p>
					  <p>
					  	<a
					  	class="btn btn-primary btn-lg"
					  	href="personalAutorizado/form_reg_P.php"
					  	role="button">
					  		Empezar nuevo registro
					  	</a>
					  </p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-6 text-center well well-lg">
					<a
					href="alumno/menucon.php"
					class="btn btn-default btn-lg btn-block"
					role="button">
						Gestionar Alumno
					</a>
					<a
					href="personalAutorizado/menucon.php"
					class="btn btn-default btn-lg btn-block"
					role="button">
						Gestionar Padres y Representante
					</a>
				</div>
				<div class="col-xs-6 text-center well well-lg">
					<a
					href="curso/menucon.php"
					class="btn btn-default btn-lg btn-block"
					role="button">
						Gestionar Cursos
					</a>
					<a
					href="usuario/menucon.php"
					class="btn btn-default btn-lg btn-block"
					role="button">
						Gestionar Usuarios del sistema
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="java/ajax/cargadorOnClick.js"></script>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
