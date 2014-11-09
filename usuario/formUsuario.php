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

			<!-- http://www.w3schools.com/tags/ref_eventattributes.asp -->
			<form action="usuario/consultarUsuario.php" method="POST">

				Usuario:
				<input 
					type="text" 
					name="seudonimo" 
					id="seudonimo"
					autofocus="autofocus"
					required="required"
					placeholder="Instroduzca Usuario">
				</br>

				Clave: 
				<input 
					type="password" 
					name="clave" 
					id="clave"
					required="required"
					placeholder="Instroduzca Clave"></br>
				<input 
					type="submit" 
					value="enviar" 
					name="enviar" 
					onsubmit"return validarUsuario();"
					onclick="return validarUsuario();">

			</form>

			<a href="usuario/form_reg_U.php">Registrarse</a>
			<script type="text/javascript" src="java/validacionUsuario.js"></script>
		</div>
	</div>
<?php
	//FINALIZAMOS LA PAGINA:
	//trae footer.php y cola.php
	finalizarPagina();?>