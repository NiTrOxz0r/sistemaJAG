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
			<div id="bienvenida">
				<div>
					<h4>Bienvenido al sistema de Inscripcion de la E.B.N.B "Jose Antonio Gonzalez"</h4>
					<p>
						Para Utilizar este sistema debe estar registrado como usuario.
					</p>
					<p>
						Puede hacerlo dandole click <a href="usuario/form_reg_U.php">a este enlace.</a>
					</p>
					<p>
						Si ya poseee su cuenta, por favor introduzca los datos necesarios:
					</p>
				</div>
			</div>
			<!-- http://www.w3schools.com/tags/ref_eventattributes.asp -->
			<form action="usuario/validar_U.php" method="POST">
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
							<td class="chequeo" id="seudonimo_chequeo">

							</td>
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
									maxlength="15"
									placeholder="Instroduzca Clave">
							</td>
							<td class="chequeo"  id="clave_chequeo">

							</td>
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
				<div id="error" class="chequeo">
					<?php if (isset($_SESSION['error_login'])): ?>
						<p>
							Los datos ingresados no concuerdan,
							por favor cheque nuevamente los
							datos e intente ingresar de nuevo.
						</p>
					<?php endif ?>
				</div>
			</form>
			<!-- validacion -->
			<script type="text/javascript" src="java/validacionUsuario.js"></script>
			<script type="text/javascript">
			$(function(){
				$("#seudonimo").change(function(){
					validacionUsuario();
					$('#error').html('');
				});

				$("#clave").change(function(){
					validacionUsuario();
					$('#error').html('');
				});

			});
			</script>
		</div>
	</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
