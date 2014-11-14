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
		<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
		<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
		<div class="contenido">

			<form id="consulta_U">

				<table>
					<thead>
						<th>Desea colsultar por cedula?</th>
						<th>o desea consultar los registros generales?</th>
					</thead>
					<tbody>
						
					</tbody>
				</table>

				<div id="error" class="chequeo">
					<!-- chequeo por medio de ajax: -->
					<span class="chequeo" id="campoX_chequeo">
						
					</span>
				</div>

			</form>
		
		</div>
		<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
	</div>
</div>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>