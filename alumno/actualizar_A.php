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



if (isset($_POST['cedula'])) {
	if ($_POST['cedula'] <> "" and strlen($_POST['cedula']) == 8) {
		$con = conexion();
		$cedula = mysqli_escape_string($con, $_POST['cedula']);
	}
}else{
	$enlace = enlaceDinamico("menucom.php?cedulaError=unset");
	header("Location:".$enlace);
}


	$sql = "SELECT a.codigo, cedula, cedula_escolar, nacionalidad, p_nombre, s_nombre, p_apellido, s_apellido, sexo,
	fec_nac, lugar_nac, telefono, telefono_otro, cod_parroquia as cod_parro, cod_mun as cod_mun, cod_edo as cod_est,
	direccion_exacta as direccion, acta_num_part_nac, acta_folio_num_part_nac, plantel_procedencia, repitiente,
	altura, peso, camisa, pantalon, zapato, cod_curso, certificado_vacuna, cod_discapacidad FROM persona a
	inner join alumno b on (a.codigo=b.cod_persona)
	inner join direccion c on (a.codigo=c.cod_persona)
	inner join parroquia d on (c.cod_parroquia=d.codigo)
	inner join municipio e on (d.cod_mun=e.codigo)
	inner join estado f on (e.cod_edo=f.codigo) where cedula='$cedula';";

	$re = conexion($sql);
	if($reg = mysqli_fetch_array($re)) :?>

<div id="blancoAjax" align="center">
	<form action="actualizar_1.php" method="POST" name="form_alu" id="form">

			<h1>REGISTRO DE ALUMNO</h1>

				<h2  align="center"> DATOS PERSONALES</h2>
					<table>
						<tr>
							<th>C&eacute;dula</th><th>C&eacute;dula Escolar</th>
						</tr>
						<tr>
							<td align="left">
								<!--http://www.w3schools.com/tags/tag_select.asp-->
								<select name="nacionalidad" id="nacionalidad">
									<?php if ( $reg['nacionalidad'] == 'v' ): ?>
										<option  value="v" selected="selected">V</option>
										<option  value="e">E</option>
									<?php else: ?>
										<option  value="v">V </option>
										<option  value="e" selected="selected">E</option>
									<?php endif ?>
								</select>
								<!-- HACER AJAX PARA CEDULA!!! -->
								<input
								type="text"
								required
								maxlength="8"
								size="12"
								name="cedula"
								id="cedula"
								value="<?php echo $reg['cedula'];?>">
							<font color="#ff0000">*</font>
							</td>
							<td>
							<!-- HACER AJAX PARA CEDULA!!! -->
							<input
								type="text"
								required
								maxlength="10"
								name="cedula_escolar"
								id="cedula_escolar"
								value="<?php echo $reg['cedula_escolar'];?>"/>
							</td>
						</tr>
						<tr>
							<th>Primer Nombre</th><th>Segundo Nombre</th>
							<th>Primer Apellido</th><th>Segundo Apellido</th>
						</tr>
						<tr>
							<td>
								<input type="text"
								maxlength="20"
								name="p_nombre"
								id="p_nombre"
								value="<?php echo $reg['p_nombre'];?>"/>
								<font color="#ff0000">*</font></td>
								<td><input type="text"
								maxlength="20"
								name="s_nombre"
								id="s_nombre" value="<?php echo $reg['s_nombre'];?>"/>
							</td>
							<td>
								<input type="text"
								maxlength="20"
								name="p_apellido"
								id="p_apellido"
								value="<?php echo $reg['p_apellido'];?>"/>
								<font color="#ff0000">*</font></td>
								<td><input type="text"
								maxlength="20"
								name="s_apellido"
								id="s_apellido"
								value="<?php echo $reg['s_apellido'];?>"/>
							</td>
						</tr>
						<tr>
							<th>Sexo</th>
							<th>Fecha de Nacimiento</th>
							<th>Lugar de Nacimiento</th>
						</tr>
						<tr>
							<td>
								<?php
									$sql="select codigo, descripcion from sexo where status = 1;";
									$registros = conexion($sql); ?>
								<select name="sexo" id="sexo" required="required">
								<?php while($fila = mysqli_fetch_array($registros)) : ?>
								<?php if ( $reg['sexo'] == $fila['codigo']): ?>
									<option
										selected="selected"
										value="<?php echo $fila['codigo']?>">
											<?php echo $fila['descripcion']?>
									</option>
								<?php else: ?>
									<option value="<?php echo $fila['codigo']?>">
										<?php echo $fila['descripcion']?>
									</option>
								<?php endif ?>
								<?php endwhile; ?>
								</select><font color="#ff0000">*</font>
							</td>
							<td>
								<input
									type="date"
									name="fec_nac"
									id="fec_nac"
									required="required"
									value="<?php echo $reg['fec_nac'];?>"/>
							</td>
							<td colspan="2">
								<textarea
									name="lugar_nac"
									id="lugar_nac"
									cols="40"
									rows="4"
									maxlength="50"
									><?php echo $reg['lugar_nac'] ?></textarea>
							</td>
						</tr>
						<tr>
							<th>Tel&eacute;fono</th><th> Tel&eacute;no Celular</th>
						</tr>
						<tr>
							<td>
								<input
									type="text"
									maxlength="11"
									name="telefono"
									id="telefono"
									value="<?php echo $reg['telefono'];?>"/>
							</td>
							<td>
								<input
									type="text"
									maxlength="11"
									name="telefono_otro"
									id="telefono_otro"
									value="<?php echo $reg['telefono_otro'];?>"/>
							</td>
						</tr>
					</table>

				<h2 align="center">DIRECCI&Oacute;N</h2>
					<table>
						<tr>
							<th>Estado</th>
							<th>Municipio</th>
							<th>Parroquia</th>
						</tr>
						<tr>
							<td>
								<select name="cod_est" id="cod_est">
								</select><font color="#ff0000">*</font>
							</td>
							<td>
								<select name="cod_mun" id="cod_mun" >
									<option value="">--Seleccionar--</option>
								</select><font color="#ff0000">*</font></td>
							<td>
								<select name="cod_parro" id="cod_parro">
									<option value="">--Seleccionar--</option>
								</select><font color="#ff0000">*</font></td>
						</tr>
						<tr>
							<th>Direcci&oacute;n</th>
							<td colspan="3">
								<textarea
									maxlenght="150"
									cols="50"
									rows="4"
									name="direcc"
									id="direcc"><?php echo $reg['direccion'];?></textarea>
								<font color="#ff0000">*</font>
							</td>
						<tr/>
					</table>

				<h2 align="center"> PARTIDA DE NACIMIENTO</h2>
					<table >
						<tr align="cr">
							<th colspan="2">Act. N&uacute;m Partida de Nac.</th><td></td>
							<th colspan="3">Act. Folio N&uacute;m.</th><td></td><td></td>
							<th>Plantel de Procedencia</th>
							<th>Repitiente</th>
						</tr>
						<tr align="center">
							<td colspan="2" >
								<input
									type="text"
									maxlength="8"
									size ="8"
									name="acta_num_part_nac"
									id="acta_num_part_nac"
									value="<?php echo $reg['acta_num_part_nac'];?>"/>
							</td>
							<td></td><td></td>
							<td></td>
							<td colspan="3">
								<input
									type="text"
									maxlength="8"
									size ="8"
									name="acta_folio_num_part_nac"
									id="acta_folio_num_part_nac"
									value="<?php echo $reg['acta_folio_num_part_nac'];?>" />
							</td>
							<td>
								<input
									type="text"
									maxlength="20"
									name="plantel_procedencia"
									id="plantel_procedencia"
									value="<?php echo $reg['plantel_procedencia'];?>"/>
							</td>
							<td>
								<select name="repitiente" id="repitiente" required="required">
									<?php if ( $reg['repitiente'] == 'n' ): ?>
										<option name="repitinte" value="n" selected="selected">NO</option>
										<option name="repitiente" value="s">SI</option>
									<?php else: ?>
										<option name="repitiente" value="s" selected="selected">SI</option>
										<option name="repitiente" value="n">NO</option>
									<?php endif ?>
								</select>
								</select><font color="#ff0000">*</font>
							</td>
						</tr>

					</table>

				<h2 align="center"> DATOS ANTROPOL&Oacute;GICO</h2>

					<table>
						<tr>
								<th>Discapacidad</th><th>Vacunaci&oacute;n</th>
						</tr>
						<tr>
								<td>
									<?php
										$query = "SELECT codigo, descripcion from discapacidad WHERE status ='1';";
										$res = conexion($query);
									?>
									<select name="discapacidad" id="discapacidad">
										<option>Seleccionar</option>
										<? while($fila= mysqli_fetch_array($res)) : ?>
										<?php if ($reg['cod_discapacidad']==$fila['codigo']):?>
											<option selected="selected" value="<?=$fila['codigo'];?>"><?=$fila['descripcion'];?></option>
											<?php else:?>
											<? endif;?>
											<option value="<?=$fila['codigo'];?>"><?=$fila['descripcion'];?></option>
										<?php endwhile;?>
								</select>
							</td>
							<td>
								<select name="vacuna" id="vacuna">
									<?php if ( $reg['certificado_vacuna'] == 's' ): ?>
										<option  value="s" selected="selected">SI</option>
										<option  value="n">NO</option>
									<?php else: ?>
										<option  value="s">SI</option>
										<option  value="n" selected="selected">NO</option>
									<?php endif ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Altura</th><th>Peso</th>
						</tr>
						<tr align="center">
						<!-- http://www.w3schools.com/tags/tag_input.asp -->
							<td>
								<input
									type="number"
									maxlength="3"
									size ="3"
									max="250"
									min="30"
									name="altura"
									id="altura"
									value="<?php echo $reg['altura'];?>"/><font color="#ff0000">cm</font>
							</td>
							<td>
								<input
									type="number"
									maxlength="3"
									size ="3"
									max="250"
									min="10"
									name="peso"
									id="peso"
									value="<?php echo $reg['peso'];?>"/><font color="#ff0000">kg</font>
							</td>
						</tr>
						<tr>
							<th>Talla de Camisa</th>
							<th>Talla de Pantal&oacute;n</th>
							<th>N&uacute;m. de Calzado</th>
						</tr>
						<tr align="center">
							<td>
								<?php	$query = "SELECT codigo, descripcion from talla where status = 1 order by codigo;";
											$registros = conexion($query);	?>
								<select name="camisa" id="camisa">
									<?php while ( $camisa = mysqli_fetch_array($registros) ): ?>
									<?php if ( $reg['camisa'] == $camisa['codigo'] ) : ?>
										<option value="<?=$camisa['codigo']?>" selected="selected"><?=$camisa['descripcion']?></option>
									<?php else: ?>
										<option value="<?=$camisa['codigo']?>"><?=$camisa['descripcion']?></option>
									<?php endif; ?>
									<?php endwhile; ?>
								</select>
							</td>
							<td>
								<?php	$query = "SELECT codigo, descripcion from talla where status = 1 order by codigo;";
											$registros = conexion($query);	?>
								<select name="pantalon" id="pantalon">
									<?php while ( $pantalon = mysqli_fetch_array($registros) ): ?>
									<?php if ( $reg['pantalon'] == $pantalon['codigo'] ) : ?>
										<option value="<?=$pantalon['codigo']?>" selected="selected"><?=$pantalon['descripcion']?></option>
									<?php else: ?>
										<option value="<?=$pantalon['codigo']?>"><?=$pantalon['descripcion']?></option>
									<?php endif; ?>
									<?php endwhile; ?>
								</select>
							</td>
							<td>
								<input
									type="number"
									maxlength="2"
									min="4"
									max="50"
									size ="2"
									name="zapato"
									id="zapato"
									value="<?php echo $reg['zapato'];?>"/>
							</td>
						</tr>
					</table>

				<h2 align="center">DATOS EDUCATIVOS</h2>
				<br><b>&nbsp;Nivel a Cursar.&nbsp;&nbsp;</b>
				<?php
					$sql="select codigo, descripcion from curso where status = 1;";
					$registros = conexion($sql); ?>
				<select name="curso" id="curso">
				<?php while($fila = mysqli_fetch_array($registros)) : ?>
					<?php if ($reg['cod_curso'] == $fila['codigo']): ?>
				<option selected="selected" value="<?php echo $fila['codigo']?>">
				<?php echo $fila['descripcion']?></option>
				<?php else: ?>
					<option value="<?php echo $fila['codigo']?>">
						<?php echo $fila['descripcion']?></option>
				<?php endif ?>
				<?php endwhile; ?>
				</select>

			<input type="button" name="enviar_btn" value="Enviar" id="enviar"/>
			<input type="button" name="limpiar_btn" value="Enviar" hidden disabled id="limpiar"/>
	</form>
	<!-- validacion -->
	<?php $validacion = enlaceDinamico("java/validacion.js"); ?>
	<script type="text/javascript" src="<?php echo $validacion ?>"></script>
	<!-- ajax de estado/mun/parr -->
	<?php $estadoEnlace = "java/edo.php?cod_est=".$reg['cod_est']; ?>
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
				var id = "<?php echo $reg['cod_est'] ?>";
				var cod_mun = "<?php echo $reg['cod_mun'] ?>";
				var id2 = "<?php echo $reg['cod_parro'] ?>";
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
	<?php $cssDatepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.css"); ?>
	<link href="<?php echo $cssDatepick ?>" rel="stylesheet">
	<?php $plugin = enlaceDinamico("java/jqDatePicker/jquery.plugin.js"); ?>
	<?php $datepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.js"); ?>
	<script type="text/javascript" src="<?php echo $plugin ?>"></script>
	<script type="text/javascript" src="<?php echo $datepick ?>"></script>
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
</div>

	<?php else : ?>
			<p align=center>
				No existe Datos con cedula: <?=$cedula ?>
			</p>
			<p align=center>
				<a href="menucon.php">Volver</a>
			</p>
	<?php endif; ?>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
