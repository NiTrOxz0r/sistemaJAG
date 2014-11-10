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

			<!-- http://www.w3schools.com/tags/ref_eventattributes.asp -->
			<form action="usuario/consultarUsuario.php" method="POST">
				<table>
					<tbody>
						<tr>
							<td id="seudonimo_titulo">
								Seudonimo:
							</td>
							<td>
								<input 
									type="text" 
									name="seudonimo" 
									id="seudonimo"
									autofocus="autofocus"
									required="required"
									placeholder="Instroduzca Usuario">
							</td>
							<td id="seudonimo_chequeo"></td>
						</tr>
						<tr>
							<td id="clave_titulo">
								Contrase&ntilde;a:
							</td>
							<td>
								<input 
									type="password" 
									name="clave" 
									id="clave"
									required="required"
									placeholder="Instroduzca Clave">
							</td>
							<td id="clave_chequeo"></td>
						</tr>
						<tr>
							<td>
								<input 
									type="submit" 
									value="enviar" 
									name="enviar" 
									onsubmit"return validacionUsuario();"
									onclick="return validacionUsuario();">
							</td>
						</tr>
					</tbody>
						
				</table>
			</form>

			<a href="usuario/form_reg_U.php">Registrarse</a>
			<script type="text/javascript" src="java/validacionUsuario.js"></script>
			<script type="text/javascript">
			$(function(){
				$("#seudonimo").change(function(){
					validacionUsuario();
				});

				$("#clave").change(function(){
					validacionUsuario();
				});

			});
			</script>
		</div>
	</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>