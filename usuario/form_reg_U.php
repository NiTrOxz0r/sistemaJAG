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
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CONTENIDO:?>
<div id="contenido_registro_usuario">
	<div id="blancoAjax" class="container">
		<div class="row">
			<div id="info" class="col-xs-12">
				<h2>
					Por favor instroduzca el seudonimo que desea en el sistema y una clave.
					<small>
						Es recomendable usar una clave entre 6 a 15 caracteres de largo por seguridad.
					</small>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 well">
				<!-- http://www.w3schools.com/tags/ref_eventattributes.asp -->
				<form
				role="form"
				name="form_U"
				id="form_U"
				action="<?php echo $_SERVER['DOCUMENT_ROOT'].
				'/github/sistemaJAG/usuario/form_reg_PI.php' ?>"
				method="POST">
					<fieldset>
						<legend class="text-center">
							Datos basicos del usuario
						</legend>
						<div class="form-group">
							<label for="seudonimo" class="control-label">Seudonimo</label>
							<input
								type="text"
								name="seudonimo"
								id="seudonimo"
								class="form-control"
								autofocus="autofocus"
								required
								maxlength="20"
								placeholder="Instroduzca Usuario">
								<p class="help-block" id="seudonimo_chequeo">
									Instroduzca el seudonimo que desea en el sistemaJAG
								</p>
						</div>
						<div class="form-group">
							<label for="clave" class="control-label">Contrase&ntilde;a:</label>
							<input
								class="form-control"
								type="password"
								name="clave"
								id="clave"
								required="required"
								maxlength="15"
								placeholder="Instroduzca Clave">
								<p class="help-block" id="clave_chequeo">
									Especifique su contrase&ntilde;a
								</p>
						</div>
						<input
							class="btn btn-default"
							type="submit"
							value="Entrar en el SistemaJAG"
							name="enviar"
							onsubmit"return validacionUsuario();"
							onclick="return validacionUsuario();">
					</fieldset>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<!-- validacion -->
		<script type="text/javascript">
			/*hecho por slayerfat, consultas o sugerencias, saben donde estoy.*/
			// empezamos jQuery:
			$(function(){
				// hacemos una consulta ajax
				// para traernos el script validacionUsuario
				$.ajax({
					url: '../java/validacionUsuario.js',
					type: 'GET',
					dataType: "script",
				});
				// cuando cambie algo de seudonimo
				// se activa esta funcion:
				$("#seudonimo").change(function(){
					// iniciamos la variable:
					var info = $(this).val();
					// validamos datos de usuario:
					validacionUsuario();
					// hacemos una consulta por ajax
					// para saber si el seudonimo esta disponible:
					$.ajax({
						url: '../java/ajax/usuario/seudonimo.php',
						type: 'POST',
						data: {seudonimo:info},
						dataType: "html",
						success: function(datos){
							// si todo sale bien entre del ajax al php
							$("#seudonimo_chequeo").html(datos);
							// se comprueba si es valido o no por
							// medio del data-disponible
							// true si esta disponible, falso si no.
							var disponible = $(datos+'#disponible').data('disponible');
							if (disponible === true) {
								// se activa el boton de enviar
								$(':submit').prop('disabled', false);
								// se cambia el estilo del
								// formulario por medio de bootstrap y jQuery
								$('#clave').prop('disabled', false);
								$('#seudonimo').parent().removeClass('has-error').addClass('has-success');
							}else{
								//se desactiva el boton de enviar
								$(':submit').prop('disabled', true);
								//se desactiva el campo clave
								$('#clave').prop('disabled', true);
								$('#clave').parent().removeClass('has-error');
								$("#clave_chequeo").html('');
								// se cambia el estilo del
								// formulario por medio de bootstrap y jQuery
								$('#seudonimo').parent().removeClass('has-success').addClass('has-error');
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
								$('#contenido_registro_usuario').empty();
								$("#contenido_registro_usuario").load().html(datos);
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
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
