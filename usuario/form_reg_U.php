<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario desde master.php
validarUsuario();
//HEAD:
//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina();

//CONTENIDO:?>
<div id="contenido">
	<div id="blancoAjax">
	<!-- http://www.w3schools.com/html/html_forms.asp -->
		<form
			name="form_U"
			id="form_U"
			action="<?php echo $_SERVER['DOCUMENT_ROOT'].'/github/sistemaJAG/usuario/form_reg_PI.php' ?>"
			method="POST">
			<table>
				<thead>
					<th>Datos basicos:</th>
				</thead>
				<tbody>
					<tr>
						<td id="seudonimo_titulo">Seudonimo</td>
						<td>
							<input
								type="text"
								name="seudonimo"
								id="seudonimo"
								autofocus="autofocus"
								required
								maxlength="20"
								placeholder="Instroduzca Seudonimo">
						</td>
						<td id="clave_titulo">Contrase&ntilde;a</td>
						<td>
							<input
								type="password"
								name="clave"
								id="clave"
								required="required"
								maxlength="15"
								placeholder="Instroduzca Clave">
						</td>
					</tr>
					<tr>
						<td>

						</td>
						<td class="chequeo" id="seudonimo_chequeo">

						</td>
						<td>

						</td>
						<td class="chequeo"  id="clave_chequeo">

						</td>
					</tr>
					<tr colspan="6">
						<td>
							<input
								type="submit"
								value="enviar"
								name="enviar"
								onsubmit="return validacionUsuario();"
								onclick="return validacionUsuario();">
						</td>
					</tr>
				</tbody>

			</table>
		</form>
		<!-- validacion -->
		<script type="text/javascript">
			/*hecho por slayerfat, consultas o sugerencias, saben donde estoy.*/
			//empezamos jQuery:
			$(function(){
				//hacemos una consulta ajax
				//para traernos el script validacionUsuario
				$.ajax({
					url: '../java/validacionUsuario.js',
					type: 'GET',
					dataType: "script",
				});
				//cuando cambie algo de seudonimo
				//se activa esta funcion:
				$("#seudonimo").change(function(){
					//iniciamos la variable:
					var info = $(this).val();
					//validamos datos de usuario:
					validacionUsuario();
					//hacemos una consulta por ajax
					//para saber si el seudonimo esta disponible:
					$.ajax({
						url: '../java/ajax/usuario/usuario.php',
						type: 'POST',
						data: {seudonimo:info},
						dataType: "html",
						success: function(datos){
							//si todo sale bien entre del ajax al php
							$("#seudonimo_chequeo").html(datos);
							//se comprueba si es valido o no por
							//medio del data-disponible
							//true si esta disponible, falso sino.
							var disponible = $(datos+'#disponible').data('disponible');
							if (disponible === true) {
								//se desactiva el boton de enviar
								$(':submit').prop('disabled', false);
							} else{
								//se activa el boton de enviar
								$(':submit').prop('disabled', true);
							};
						},
					});
				});
				//comprobacion de la clave:
				$("#clave").change(function(){
					validacionUsuario();
				});
				//apenas se pretenda enviar el formulario:
				$('#form_U').on('submit', function (evento){
					//se comprueba que los datos esten en orden:
					if ( validacionUsuario() === true ) {
						//se previene el envio:
						evento.preventDefault();
						//se inician variables:
						var seudonimo = $('#seudonimo').val();
						var clave = $('#clave').val();
						//se mandan los datos al archivo
						//por medio de ajax:
						$.ajax({
							url: 'form_reg_PI.php',
							type: 'POST',
							data: {
								seudonimo:seudonimo,
								clave:clave
							},
							success: function (datos){
								$('#contenido').html('');
								$("#contenido").load().html(datos);
							},
						});
						//return true;
					}else{
						return false;
					};
				});
			});
		</script>
	</div>

<?php
	//FINALIZAMOS LA PAGINA:
	//trae footer.php y cola.php
	finalizarPagina();?>
