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

			<form 
				id="consulta_singular_U" 
				name="consulta_singular_U"
				action="consultar_U.php"
				method="post">

				<table>
					<thead>
						<th>Busqueda especifica</th>
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
									<option value="1">Por cedula:</option>
									<option value="2">Por Nombre:</option>
									<option value="3">Por Apellido:</option>
									<option value="4">Por Cargo:</option>
									<option value="5">Por Estatus:</option>
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

			<form 
				id="consulta_listado_U" 
				name="consulta_listado_U"
				action="consultar_listado_U.php"
				method="post">
				<table>
					<thead>
						<th>Consulta General</th>
					</thead>
					<tbody>
						<td>
							<input type="submit" value="Consultar">
						</td>
					</tbody>
				</table>
			</form>

			<div id="error" class="chequeo">
				<!-- chequeo por medio de ajax: -->
				<span class="error" id="error">
					
				</span>
			</div>
		
		</div>
		<!-- validacion -->
		<script type="text/javascript">
			$(function(){
				$('#informacion_titulo').css('color', '#888');
				$('#informacion').prop('disabled', true);
				$('#submit').prop('disabled', true);
				//el select:
				$('#tipo').on('change', function(){
					var tipo = $(this).val();
					if (tipo === '0') {
						$('#informacion_titulo').css('color', '#888');
						$('#informacion').prop('disabled', true);
						$('#submit').prop('disabled', true);
					}else{
						$('#informacion_titulo').css('color', '#000');
						$('#informacion').prop('disabled', false);
					};
				});
				$('#informacion').on('change', function(){
					var campo = $(this).val().replace(/^\s+|\s+$/g, '');
					if (campo === "") {
						$('#submit').prop('disabled', true);
						$(this).focus();
						$("#informacion_chequeo").html('este campo no puede </br> estar vacio.');
						$("#informacion_titulo").css('color', 'red');
					};
					
					var tipo = $('#tipo').val();
					var numerosChequeo = /[^\d+]/g;
					var	nombresChequeo = /[^A-Za-záéíóúÁÉÍÓÚ-]/g;
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

					}else if( tipo === '2' || tipo === '3' ) {

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
							estatus = true;
						}

					}else if(tipo === '4' || tipo === '5') {
						$('#submit').prop('disabled', true);
						$(this).prop('disabled', false);
						$('#informacion').prop('hidden', true);
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