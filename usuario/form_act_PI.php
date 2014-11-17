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

if ( isset($_GET['cedula']) && isset($_GET['tabla']) ):
	$con = conexion();
	$cedula = mysqli_escape_string($con, $_GET['cedula']);
	if ($_GET['tabla'] == '1') :
		$tablaOriginal = '1';
		$tabla = 'docente';
		$tablaDir = 'direccion_docente';
	elseif ($_GET['tabla'] == '2'):
		$tablaOriginal = '2';
		$tabla = 'administrativo';
	$tablaDir = 'direccion_administrativo';
	elseif ($_GET['tabla'] == '3'):
		$tablaOriginal = '3';
		$tabla = 'directivo';
	$tablaDir = 'direccion_directivo';
	endif;
	$query = "SELECT
	$tabla.nacionalidad,
	$tabla.cedula,
	$tabla.p_nombre,
	$tabla.s_nombre,
	$tabla.p_apellido,
	$tabla.s_apellido,
	$tabla.fec_nac,
	$tabla.sexo,
	$tabla.email,
	$tabla.titulo,
	$tabla.nivel_instruccion,
	$tabla.telefono,
	$tabla.telefono_otro,
	$tabla.celular,
	$tabla.cod_cargo,
	$tablaDir.direccion_exacta as direcc,
	$tablaDir.codigo as codigo_dir,
	parroquia.codigo as cod_parro,
	municipio.codigo as cod_mun,
	estado.codigo as cod_est,
	usuario.codigo as cod_usr,
	usuario.seudonimo as seudonimo,
	usuario.cod_tipo_usr as cod_tipo_usr
	from $tabla
	inner join usuario
	on $tabla.cod_usr = usuario.codigo
	inner join $tablaDir
	on $tabla.cod_direccion = $tablaDir.codigo
	inner join parroquia
	on $tablaDir.cod_parroquia = parroquia.codigo
	inner join municipio
	on parroquia.cod_mun = municipio.codigo
	inner join estado
	on municipio.cod_edo = estado.codigo
	where $tabla.cedula = '$cedula';";
	$resultado = conexion($query);
	if ($resultado->num_rows == 1) :
		$datos = mysqli_fetch_assoc($resultado);
		//CONTENIDO:?>
		<div id="contenido">
			<div id="blancoAjax">
				<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
				<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
				<div class="contenido">
					<form method="POST" name="form_PI" id="form_PI" action="actualizar_U.php">
						<table>
							<thead>
								<th id="nacionalidad_titulo">Nacionalidad</th>
								<th id="cedula_titulo">C&eacute;dula</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<select
											name="nacionalidad"
											id="nacionalidad"
											required>
											<?php if ($datos['nacionaliad'] == 'v'): ?>
												<option selected="selected" value="v">V</option>
												<option value="e">E</option>
											<?php else: ?>
												<option value="v">V</option>
												<option selected="selected" value="e">E</option>
											<?php endif ?>
										</select>
									</td>
									<td>
										<input
											type="text"
											maxlength="8"
											name="cedula"
											id="cedula"
											required
											value="<?php echo $datos['cedula'] ?>">
									</td>
								</tr>
								<tr>
									<td class="chequeo" id="nacionalidad_chequeo">

									</td>
									<td class="chequeo" id="cedula_chequeo">

									</td>
								</tr>
							</tbody>
							<thead>
								<th id="p_nombre_titulo">Primer Nombre</th>
								<th id="s_nombre_titulo">Segundo Nombre</th>
								<th id="p_apellido_titulo">Primer Apellido</th>
								<th id="s_apellido_titulo">Segundo Apellido</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<input
											type="text"
											name="p_nombre"
											id="p_nombre"
											required
											maxlength="20"
											value="<?php echo $datos['p_nombre'] ?>">
									</td>
									<td>
										<input
											type="text"
											name="s_nombre"
											id="s_nombre"
											maxlength="20"
											value="<?php echo $datos['s_nombre'] ?>">
									</td>
									<td>
										<input
											type="text"
											name="p_apellido"
											id="p_apellido"
											required
											maxlength="20"
											value="<?php echo $datos['p_apellido'] ?>">
									</td>
									<td>
										<input
											type="text"
											name="s_apellido"
											id="s_apellido"
											maxlength="20"
											value="<?php echo $datos['s_apellido'] ?>">
									</td>
								</tr>
								<tr>
									<td class="chequeo" id="p_nombre_chequeo"></td>
									<td class="chequeo" id="s_nombre_chequeo"></td>
									<td class="chequeo" id="p_apellido_chequeo"></td>
									<td class="chequeo" id="s_apellido_chequeo"></td>
								</tr>
							</tbody>
							<thead>
								<th id="fec_nac_titulo">Fecha de nacimiento</th>
								<th id="sexo_titulo">Sexo</th>
								<th id="email_titulo">Email</th>
								<th id="titulo_titulo">Titulos y/o Certificados</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<input
											type="text"
											name="fec_nac"
											id="fec_nac"
											required
											value="<?php echo $datos['fec_nac'] ?>">
									</td>
									<td>
										<?php
											$query = "SELECT codigo, descripcion from sexo where status = 1;";
											$registros = conexion($query);
										?>
										<select name="sexo" id="sexo" required>
											<?php	while($fila = mysqli_fetch_array($registros)) : ?>
												<?php if ($datos['sexo'] == $fila['codigo']): ?>
													<option selected="selected" value="<?php echo $fila['codigo']; ?>">
														<?php echo $fila['descripcion']; ?>
													</option>
												<?php else: ?>
													<option value="<?php echo $fila['codigo']; ?>">
														<?php echo $fila['descripcion']; ?>
													</option>
												<?php endif ?>
											<?php endwhile; ?>
										</select>
									</td>
									<td>
										<input
											type="text"
											name="email"
											id="email"
											maxlength="40"
											value="<?php echo $datos['email'] ?>">
									</td>
									<td>
										<input
											type="text"
											name="titulo"
											id="titulo"
											maxlength="80"
											value="<?php echo $datos['titulo'] ?>">
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td class="chequeo" id="email_chequeo">

									</td>
									<td class="chequeo" id="titulo_chequeo">

									</td>
								</tr>
							</tbody>
							<thead>
								<th id="nivel_instruccion_titulo">Nivel Educativo</th>
								<th id="telefono_titulo">Telefono</th>
								<th id="telefono_otro_titulo">Telefono Adicional</th>
								<th id="celular_titulo">Telefono Celular</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<?php $sql="SELECT codigo, descripcion from nivel_instruccion where status = 1;";
											$registros = conexion($sql);?>
										<select name="nivel_instruccion" required id="nivel_instruccion">
										<?php while($fila = mysqli_fetch_array($registros)) :	?>
											<?php if ($datos['nivel_instruccion'] == $fila['codigo']): ?>
												<option selected="selected" value="<?php echo $fila['codigo']?>">
												<?php echo $fila['descripcion']?></option>
											<?php else: ?>
												<option value="<?php echo $fila['codigo']?>">
												<?php echo $fila['descripcion']?></option>
											<?php endif ?>
										<?php endwhile; ?>
										</select>
									</td>
									<td>
										<input
											type="text"
											maxlength="11"
											name="telefono"
											id="telefono"
											value="<?php echo $datos['telefono'] ?>">
									</td>
									<td>
										<input
											type="text"
											maxlength="11"
											name="telefono_otro"
											id="telefono_otro"
											value="<?php echo $datos['telefono_otro'] ?>">
									</td>
									<td>
										<input
											type="text"
											maxlength="11"
											name="celular"
											id="celular"
											value="<?php echo $datos['celular'] ?>">
									</td>
								</tr>
								<tr>
									<td></td>
									<td class="chequeo" id="telefono_chequeo">

									</td>
									<td class="chequeo" id="telefono_otro_chequeo">

									</td>
									<td class="chequeo" id="celular_chequeo">

									</td>
								</tr>
							</tbody>
							<thead>
								<th id="cargo_titulo">Cargo</th>
								<th id="tipo_titulo">Perfil de Usuario</th>
								<th id="direcc_titulo">Direccion (Av/Calle/Edf.)</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<?php $sql="SELECT codigo, descripcion from cargo where status = 1;";
											$registros = conexion($sql);?>
										<select name="cod_cargo" required id="cargo">
										<?php while($fila = mysqli_fetch_array($registros)) :	?>
											<?php if ($datos['cod_cargo'] == $fila['codigo']): ?>
												<option selected="selected" value="<?php echo $fila['codigo']?>">
												<?php echo $fila['descripcion']?></option>
											<?php else: ?>
												<option value="<?php echo $fila['codigo']?>">
												<?php echo $fila['descripcion']?></option>
											<?php endif ?>
										<?php endwhile; ?>
										</select>
									</td>
									<td>
										<select name="tipo" id="tipo" required>
											<option
												<?php if ($tabla == 'administrativo'): ?>
													<?php echo 'selected="selected"' ?>
												<?php endif ?>
												value="1">
												Administrativo
											</option>
											<option
												<?php if ($tabla == 'docente'): ?>
													<?php echo 'selected="selected"' ?>
												<?php endif ?>
												value="2">
												Docente
											</option>
											<option
												<?php if ($tabla == 'directivo'): ?>
													<?php echo 'selected="selected"' ?>
												<?php endif ?>
												value="3">
												Directivo
											</option>
										</select>
									</td>
									<td colspan="3">
										<textarea
												maxlenght="150"
												cols="70"
												rows="3"
												name="direcc"
												id="direcc"><?php echo $datos['direcc'] ?></textarea>
									</td>
								</tr>
								<tr>
									<td></td>
								</tr>
							</tbody>
							<thead>
								<th id="estado_titulo">Estado</th>
								<th id="municipio_titulo">Municipio</th>
								<th id="parroquia_titulo">Parroquia</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<select name="cod_est" id="cod_est"></select>
									</td>
									<td>
										<select name="cod_mun" id="cod_mun" >
										<option value="">--Seleccionar--</option></select>
									</td>
									<td>
										<select name="cod_parro" id="cod_parro">
										<option value="">--Seleccionar--</option></select>
									</td>
								</tr>
								<tr>

								</tr>
							</tbody>
							<thead>
								<th id="seudonimo_titulo">Seudonimo</th>
								<th id="cod_tipo_usr_titulo">Tipo de usuario</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<input
											type="text"
											name="seudonimo"
											required
											id="seudonimo"
											value="<?php echo $datos['seudonimo'] ?>">
									</td>
									<td>
										<?php $query = "SELECT codigo, descripcion from tipo_usuario where status = 1 and codigo != 255;";
											$resultado = conexion($query);?>
										<select name="cod_tipo_usr" id="cod_tipo_usr" required>
											<?php while ( $tipoUsr = mysqli_fetch_array($resultado) ) : ?>
												<?php if ($datos['cod_tipo_usr'] === $tipoUsr['codigo']): ?>
													<option selected="selected"
													value="<?php echo $tipoUsr['codigo'] ?>">
														<?php echo $tipoUsr['descripcion'] ?>
													</option>
												<?php endif ?>
												<option	value="<?php echo $tipoUsr['codigo'] ?>">
													<?php echo $tipoUsr['descripcion'] ?>
												</option>
											<?php endwhile; ?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="chequeo" id="seudonimo_chequeo">

									</td>
									<td class="chequeo" id="tipo_usuario_chequeo">

									</td>
									<td>
										<input type="submit" name="registrar" value="Insertar">
									</td>
								</tr>
							</tbody>

						</table>
					</form>
				</div>
				<!-- calendario -->
				<?php $cssDatepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.css"); ?>
				<link href="<?php echo $cssDatepick ?>" rel="stylesheet">
				<?php $plugin = enlaceDinamico("java/jqDatePicker/jquery.plugin.js"); ?>
				<?php $datepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.js"); ?>
				<script type="text/javascript" src="<?php echo $plugin ?>"></script>
				<script type="text/javascript" src="<?php echo $datepick ?>"></script>
				<!-- validacion -->
				<?php $validacion = enlaceDinamico("java/validacionPI.js"); ?>
				<script type="text/javascript" src="<?php echo $validacion ?>"></script>
				<?php $validacion = enlaceDinamico("java/validacionUsuario.js"); ?>
				<script type="text/javascript" src="<?php echo $validacion ?>"></script>
				<script type="text/javascript">
					$(function(){
						$('#form_PI').on('submit', function (evento){
							evento.preventDefault();
							if ( validacionPI() && validacionUsuario() ) {
								var nacionalidad = $('#nacionalidad').val();
								var cedula = $('#cedula').val();
								var p_nombre = $('#p_nombre').val();
								var s_nombre = $('#s_nombre').val();
								var p_apellido = $('#p_apellido').val();
								var s_apellido = $('#s_apellido').val();
								var fec_nac = $('#fec_nac').val();
								var sexo = $('#sexo').val();
								var email = $('#email').val();
								var nivel_instruccion = $('#nivel_instruccion').val();
								var titulo = $('#titulo').val();
								var telefono = $('#telefono').val();
								var telefono_otro = $('#telefono_otro').val();
								var celular = $('#celular').val();
								var cargo = $('#cargo').val();
								var tipo = $('#tipo').val();
								var tipoOriginal = <?php echo $tablaOriginal; ?>;
								var direcc = $('#direcc').val();
								var cod_parroquia = $('#cod_parro').val();
								var cod_usr = <?php echo $datos['cod_usr'] ?>;
								var seudonimo = $('#seudonimo').val();
								var cod_tipo_usr = $('#cod_tipo_usr').val();
								console.log("exitos totales");
								// $.ajax({
								// 	url: 'actualizar_U.php',
								// 	type: 'POST',
								// 	data: {
								// 		nacionalidad:nacionalidad,
								// 		cedula:cedula,
								// 		p_nombre:p_nombre,
								// 		s_nombre:s_nombre,
								// 		p_apellido:p_apellido,
								// 		s_apellido:s_apellido,
								// 		fec_nac:fec_nac,
								// 		sexo:sexo,
								// 		email:email,
								// 		nivel_instruccion:nivel_instruccion,
								// 		titulo:titulo,
								// 		telefono:telefono,
								// 		telefono_otro:telefono_otro,
								// 		celular:celular,
								// 		cod_cargo:cargo,
								// 		tipo:tipo,
								// 		direcc:direcc,
								// 		cod_parroquia:cod_parroquia
								// 	},
								// 	success: function (datos){
								// 		$('#contenido').html('');
								// 		$("#contenido").load().html(datos);
								// 	},
								// });
							};
						});
						$('#form_PI').on('change', function(){

						});
					});
				</script>
				<!-- ajax de estado/mun/parr -->
				<?php $estadoEnlace = "java/edo.php?cod_est=".$datos['cod_est']; ?>
				<?php $estado = enlaceDinamico($estadoEnlace); ?>
				<?php $municipio = enlaceDinamico("java/mun.php"); ?>
				<?php $parroquia = enlaceDinamico("java/parro.php"); ?>
				<script type="text/javascript">
					$("document").ready(function(){
						$("#cod_est").load("<?php echo $estado ?>");
						$("#cod_est").change(function(){
							var id = $("#cod_est").val();
							$.get("<?php echo $municipio ?>",{param_id:id})
							.done(function(data){
								$("#cod_mun").html(data);
								$("#cod_mun").change(function(){
									var id2 = $("#cod_mun").val();
									$.get("<?php echo $parroquia ?>",{param_id2:id2})
									.done(function(data){

										$("#cod_parro").html(data);
									});
								});
							});
						});

						$("#cod_est").ready(function(){
							var id = "<?php echo $datos['cod_est'] ?>";
							var cod_mun = "<?php echo $datos['cod_mun'] ?>";
							var id2 = "<?php echo $datos['cod_parro'] ?>";
							$.ajax({

								url:'../java/mun.php',
								data: {
									'param_id': id,
									'cod_mun': cod_mun
								},
								success: function(datos){
									$("#cod_mun").html(datos);
								}
							});
							$.ajax({

								url:'../java/parro.php',
								data: {
									'param_id2': cod_mun,
									'cod_parro': id2
								},
								success: function(datos){
									$("#cod_parro").html(datos);
								}
							});
						});

					});
				</script>
				<!-- calendario -->
				<script type="text/javascript">
					<?php $imagen = enlaceDinamico("java/jqDatePicker/calendar-blue.gif"); ?>
					$(function(){
						$('#fec_nac').datepick({
							maxDate:'-h',
							showOn: "button",
							buttonImage: "<?php echo $imagen ?>",
							buttonImageOnly: true,
							dateFormat: "yyyy-mm-dd"
						});
					});
				</script>
				<!-- submit -->
				<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
			</div>
		</div>
	<?php else: ?>
		<div id="blancoAjax">
			Error en el proceso de actualizacion.
			</br>
			La cedula: <strong><?php echo $cedula ?></strong> no esta asociada a ningun registro de la tabla: <strong><?php echo $tabla ?></strong>
	</div>
<?php endif; ?>
<?php else: ?>
	<div id="blancoAjax">
		Error en el proceso de actualizacion.
		</br>
		Ups! parece ser que trato de ingresar a esta pagina incorrectamente!
	</div>
<?php endif; ?>
