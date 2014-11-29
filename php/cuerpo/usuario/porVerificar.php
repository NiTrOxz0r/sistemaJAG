<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 0, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CONTENIDO:?>
	<div id="contenido">
		<div id="blancoAjax">
			<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
			<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
			<div class="container">
				<div class="row">
					<div id="usuario" class="jumbotron">
						<h1>Bienvenido! <small><?php echo $_SESSION['seudonimo'] ?></small></h1>
						<p>Estimado Usuario:</p>
						<p class="bg-primary">
							En estos momentos Ud. no esta verificado en el sistema, por favor notifique a los administradores del mismo para que su cuenta pueda accesar a las funciones del sistema.
						</p>
					</div>
				</div>
			</div>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
