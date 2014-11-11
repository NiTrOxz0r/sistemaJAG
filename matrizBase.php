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


			<!-- EJEMPLO DE FORMULARIOS: -->
			<form>

				<!-- chequeo por medio de ajax: -->
				<span class="chequeo" id="campoX_chequeo">
					
				</span>

				<td class="chequeo" id"campo_Y_chequeo">
					
				</td>

				<input type="text" class="chequeo" id="campoZ_chequeo">

			</form>

			<!-- EJEMPLO DE MENUS -->
			
			<td>...</td>
			<div>...</div>
			<span>...</span>
			<legend>...</legend>

			<!-- EJEMPLO DE X.. -->
			
				
			</div>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
