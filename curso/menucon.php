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
					Para hacer una consulta por favor seleccione el tipo de consulta que Ud. desea:
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
									<option selected="selected" value="0">Por favor seleccione:</option>
									<option value="1">Cursos Existentes con docentes</option>
									<option value="2">Cursos Existentes sin docentes</option>
									<option value="3">Alumnos Existentes por curso</option>
								</select>
							</td>
							<td class="chequeo" id="tipo_chequeo">

							</td>
						</tr>
						<tr>
							<td id="curso_titulo">
								Seleccione:
							</td>
							<td>
								<?php $query = "SELECT
									asume.codigo, curso.descripcion
									from asume
									inner join curso
									on asume.cod_curso = curso.codigo
									where asume.status = 1;";
									$resultado = conexion($query);?>
								<select name="curso" id="curso" required>
									<option value="" selected="selected">--Seleccione--</option>
									<?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
										<option value="<?php echo $datos['codigo']; ?>">
											<?php echo $datos['descripcion']; ?>
										</option>
									<?php endwhile; ?>
								</select>
							</td>
							<td class="chequeo" id="curso_chequeo">

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
				$('#curso_titulo').css('color', '#888');
				$('#curso').prop('disabled', true);
				$('#submit').prop('disabled', true);
				//se cambia la estructura del formulario
				//dependiendo de lo que el usuario escoja en el primer select
				//(tipo) = por cedula, por cargo, etc.
				$('#tipo').on('change', function(){
					var tipo = $(this).val();
					if (tipo === '0') {
						$('#curso_titulo').css('color', '#888');
						$('#curso').prop('disabled', true);
						$('#submit').prop('disabled', true);
					}else if (tipo === '1' || tipo === '2'){
						$('#curso_titulo').css('color', '#000');
						$('#curso').prop('disabled', true);
						$('#curso').prop('value', '');
						$('#submit').prop('disabled', false);
					}else if (tipo === '3'){
						$('#curso_titulo').css('color', '#000');
						$('#curso').prop('disabled', false);
						$('#submit').prop('disabled', true);
					}else{
						$('#curso_titulo').css('color', '#000');
						$('#curso').prop('disabled', false);
					};
				});
				//comprobacion del select de curso:
				$('#curso').on('change', function(){
					var campo = $(this).val();
					if (campo === '') {
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
