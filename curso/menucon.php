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

			<div class="info">
				<p>
					Para hacer una consulta por favor seleccione el tipo de consulta que Ud. desee:
				</p>
			</div>

			<form
				id="consulta_singular_U"
				name="consulta_singular_U"
				action="consultar_C.php"
				method="post">
				<table>
					<thead>
						<th>Seleccione una opcion</th>
					</thead>
					<tbody>
						<tr>
							<td id="tipo_titulo">Tipo de consulta:</td>
							<td>
								<select
									name="tipo"
									id="tipo"
									autofocus="autofocus"
									required>
									<option selected="selected" value="0">--Seleccione--</option>
									<option value="1">Cursos Existentes</option>
									<option value="2">Alumnos por curso</option>
								</select>
							</td>
							<td class="chequeo" id="tipo_chequeo">

							</td>
						</tr>
						<tr>
							<td id="informacion_titulo">
								Favor especifique:
							</td>
							<td>
								<input
									type="text"
									name="informacion"
									id="informacion">
								<?php $query = "SELECT codigo, descripcion from cargo where status = 1;";
									$resultado = conexion($query);?>
								<select name="informacion" id="informacion_lista" hidden>
									<option value="" selected="selected">--Seleccione--</option>
									<?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
										<option value="<?php echo $datos['codigo']; ?>">
											<?php echo $datos['descripcion']; ?>
										</option>
									<?php endwhile; ?>
								</select>
							</td>
							<td class="chequeo" id="informacion_chequeo">

							</td>
						</tr>
						<tr>
							<td id="tipo_personal_titulo">
								Seleccione:
							</td>
							<td>
								<?php $query = "SELECT codigo, descripcion from tipo_personal where status = 1;";
									$resultado = conexion($query);?>
								<select name="tipo_personal" id="tipo_personal" required>
									<option value="" selected="selected">--Seleccione--</option>
									<?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
										<option value="<?php echo $datos['codigo']; ?>">
											<?php echo $datos['descripcion']; ?>
										</option>
									<?php endwhile; ?>
								</select>
							</td>
							<td class="chequeo" id="tipo_personal_chequeo">

							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" id="submit" value="Consultar">
							</td>
						</tr>
					</tbody>
				</table>
				<div id="error" class="chequeo">
					<!-- chequeo por medio de ajax: -->
					<span class="error" id="error">

					</span>
				</div>

			</form>
			<div id="error" class="chequeo">
				<!-- chequeo por medio de ajax: -->
				<span class="error" id="error">

				</span>
			</div>
		</div>
		<!-- validacion -->
		<script type="text/javascript">
			/*hecho por slayerfat, consultas o sugerencias, saben donde estoy.*/
			//iniciamos jQuery:
			$(function(){
				//cambiamos de una vez
				//estructura del formulario:
				$('#informacion_titulo').css('color', '#888');
				$('#informacion').prop('disabled', true);
				$('#tipo_personal_titulo').css('color', '#888');
				$('#tipo_personal').prop('disabled', true);
				$('#submit').prop('disabled', true);
				//se cambia la estructura del formulario
				//dependiendo de lo que el usuario escoja en el primer select
				//(tipo) = por cedula, por cargo, etc.
				$('#tipo').on('change', function(){
					var tipo = $(this).val();
					if (tipo === '0') {
						$('#informacion_titulo').show();
						$('#informacion_titulo').css('color', '#888');
						$('#informacion').prop('disabled', true);
						$('#informacion').prop('readonly', false);
						$('#informacion_lista').prop('disabled', true);
						$('#informacion_lista').prop('hidden', true);
						$('#tipo_personal_titulo').css('color', '#888');
						$('#tipo_personal').prop('disabled', true);
						$('#submit').prop('disabled', true);
					}else if (tipo === '2'){
						$('#informacion').prop('value', '');
						$('#informacion_titulo').css('color', '#000');
						$('#informacion_titulo').show();
						$('#informacion').prop('readonly', true);
						$('#informacion').prop('hidden', true);
						$('#informacion_lista').prop('disabled', false);
						$('#informacion_lista').prop('hidden', false);
						$('#tipo_personal_titulo').css('color', '#000');
						$('#tipo_personal').prop('disabled', false);
						$('#submit').prop('disabled', true);
					}else{
						$('#informacion').prop('value', '');
						$('#informacion_titulo').show();
						$('#informacion_titulo').css('color', '#000');
						$('#informacion').prop('disabled', false);
						$('#informacion').prop('hidden', false);
						$('#informacion').prop('readonly', false);
						$('#informacion_lista').prop('disabled', true);
						$('#informacion_lista').prop('hidden', true);
						$('#tipo_personal_titulo').css('color', '#000');
						$('#tipo_personal').prop('disabled', false);
					};
				});
				//debido a que las validaciones hechas por
				//este script solo es usado en este archivo,
				//se considero no pasar este script a un
				//archivo aparte como otros archivos.
				$('#informacion').on('change', function(){
					var campo = $(this).val().replace(/^\s+|\s+$/g, '');
					if (campo === "") {
						$('#submit').prop('disabled', true);
						$(this).focus();
						$("#informacion_chequeo").html('este campo no puede </br> estar vacio.');
						$("#informacion_titulo").css('color', 'red');
					};
					//valores de expresiones regulares:
					var tipo = $('#tipo').val();
					var numerosChequeo = /[^\d+]/g;
					var	nombresChequeo = /[^A-Za-záéíóúÁÉÍÓÚ-]/g;
					//comprobacion de campos dentro del formulario:
					if (tipo === '1') {
						if(campo.length < 6){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('cedula no puede ser menor a 6 caracteres');
							$("#informacion_titulo").css('color', 'red');
						}else if(campo.length > 8){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('cedula no puede ser mayor a 8 caracteres');
							$("#informacion_titulo").css('color', 'red');
						}else if( numerosChequeo.exec(campo) ){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
							$("#informacion_titulo").css('color', 'red');
						}else{
							$("#informacion_chequeo").html('');
							$("#informacion_titulo").css('color', 'green');
							$('#submit').prop('disabled', false);
						}
					}else if( tipo === '1' ) {
						if(campo.length > 20){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('este campo no puede ser mayor a 20 caracteres');
							$("#informacion_titulo").css('color', 'red');
						}else if( nombresChequeo.test(campo) ){
							$('#submit').prop('disabled', true);
							$(this).focus();
							$("#informacion_chequeo").html('Favor introduzca en este campo Letras sin numeros o caracteres especiales EJ: 19?=;@*');
							$("#informacion_titulo").css('color', 'red');
						}else{
							$("#informacion_chequeo").html('');
							$("#informacion_titulo").css('color', 'green');
							$('#submit').prop('disabled', false);
						}
					};
				});
				//comprobacion del select de cargo:
				$('#informacion_lista').on('change', function(){
					var campo = $(this).val();
					console.log(campo);
					if (campo === '0') {
						$('#submit').prop('disabled', true);
					}else{
						$('#submit').prop('disabled', false);
					};
				});
			});
		</script>
		<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
	</div>
</div>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
