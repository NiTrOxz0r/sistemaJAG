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
		<div class="navbar-contenido">
		  <div class="container">
		    <div class="row">
		      <div class="col-ms-12 text-left">
		        <h1>
		          Sistema de Inscripcion
		          <small>trabajo en progreso!</small>
		        </h1>
		        <h1>
		          E.B.N.B. Jose Antonio Gonzalez
		        </h1>
		        <?php include_once($version); ?>
		        <p>
		        mensaje de bienvenida, info del sistema, informacion relevante de algun proceso.
		        alguna otra cosa que sea necesario.
		        </p>
		      </div>
		    </div>
		  </div>
		</div>
		<?php $inscripcion = enlaceDinamico('php/cuerpo/inscripcion.php'); ?>
		<?php require_once($inscripcion) ?>
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
		<?php $enlace = enlaceDinamico('php/cuerpo/explorador.php');
		require_once($enlace); ?>
	</div>
</div>
<script type="text/javascript" src="java/ajax/cargadorOnClick.js"></script>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
