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
			<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
			<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
			<div class="contenido">

				<div id="usuario">
					<h3>Estimado Usuario:</h3>
					<p>
						En estos momentos Ud. no esta verificado en el sistema, por favor notifique a los administradores del mismo para que su cuenta pueda accesar a las funciones del sistema.
					</p>
				</div>
			</div>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>