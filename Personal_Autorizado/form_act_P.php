<?php
if(!isset($_SESSION)){
	session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

if (isset($_GET['cedula_r'])) {
	if (trim($_GET['cedula_r']) == "" or strlen($_GET['cedula_r']) <> 8) {
		$enlace = enlaceDinamico("Personal_Autorizado/menucon.php");
		header("Location:".$enlace);
	}else{
		$con = conexion();
		$cedula = mysqli_escape_string($con, $_GET['cedula_r']);
	}
}else{
	$enlace = enlaceDinamico("Personal_Autorizado/menucon.php");
	header("Location:".$enlace);
}



$sql = "SELECT a.codigo, a.cedula, a.nacionalidad, a.p_nombre , a.s_nombre, a.p_apellido, a.s_apellido, a.fec_nac,
a.sexo, a.telefono, a.telefono_otro , cod_parroquia as cod_parro, cod_mun as cod_mun, cod_edo as cod_est,
	direccion_exacta as direccion, b.lugar_nac, b.email , b.relacion as cod_relacion, b.vive_con_alumno,
b.nivel_instruccion as cod_instruccion, b.profesion as cod_profesion, b.lugar_trabajo, b.direccion_trabajo,
b.telefono_trabajo FROM persona a
inner join personal_autorizado b on (a.codigo=b.cod_persona)
inner join direccion c on (a.codigo=c.cod_persona)
inner join parroquia d on (c.cod_parroquia=d.codigo)
inner join municipio e on (d.cod_mun=e.codigo)
inner join estado f on (e.cod_edo=f.codigo)
inner join sexo g on (a.sexo=g.codigo)
inner join relacion h on (b.relacion=h.codigo)
inner join profesion j on (b.profesion=j.codigo) WHERE cedula ='$cedula';";

$re = conexion($sql);

if($reg = mysqli_fetch_array($re)) :
//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php

empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>


<div id="contenido">
	<div id="blancoAjax">

		<div align="center">
			<!-- http://www.w3schools.com/html/html_forms.asp -->
			<form method="POST" action="actualizar_P.php" name="form_repre" id="form">

					<h1>ACTUALIZACION DE PADRES/REPRESENTANTE</h1>
						<table>
							<tr>
								<th>C&eacute;dula</th>
							</tr>
							<tr>
								<td align="left">
									<select name="nacionalidad" id="nacionalidad">
									<?php if ( $reg['nacionalidad'] == 'v' ): ?>
										<option value="v" selected="selected">V</option>
										<option value="e">E</option>
									<?php else: ?>
										<option value="v">V </option>
										<option value="e" selected="selected">E</option>
									<?php endif ?>
								</select>
									<input
										id="cedula"
										type="text"
										maxlength="8"
										size="12"
										name="cedula"
										value="<?php echo $reg['cedula'];?>">
								</td>
								<td colspan="2" class="chequeo" id="cedula_chequeo"></td>
							</tr>
							<tr>
								<td colspan="3" class="chequeo" id="cedula_chequeo_adicional"></td>
							</tr>
							<tr>
								<th>Primer Nombre</th>
								<th>Segundo Nombre</th>
							</tr>
							<tr>
								<td>
									<input type="text"
										maxlength="20"
										name="p_nombre"
										id="p_nombre"
										value="<?php echo $reg['p_nombre'];?>"/>
								</td>
								<td>
									<input type="text"
										maxlength="20"
										name="s_nombre"
										id="s_nombre"
										value="<?php echo $reg['s_nombre'];?>"/>
								</td>
							</tr>
							<tr>
								<th>Primer Apellido</th>
								<th>Segundo Apellido</th>
							</tr>
							<tr>
								<td>
									<input type="text"
										maxlength="20"
										name="p_apellido"
										id="p_apellido"
										value="<?php echo $reg['p_apellido'];?>"/>
								</td>
								<td>
									<input type="text"
										maxlength="20"
										name="s_apellido"
										id="s_apellido"
										value="<?php echo $reg['s_apellido'];?>"/>
								</td>
							</tr>
							<tr>
								<th>Sexo</th>
								<th>Fecha de Nacimiento</th>
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
							</tr>
							<tr colspan="2">
								<th>Lugar de Nacimiento</th>
							</tr>
							<tr>
								<td colspan="2">
									<textarea
										cols="65"
										rows="2"
										name="lugar_nac"
										id="lugar_nac"
										required="required"
										maxlength="50"
										><?php echo $reg['lugar_nac'];?></textarea>
								</td>
							</tr>
							<tr>
								<th>Tel&eacute;fono</th>
								<th>Tel&eacute;fono Celular/Otro</th>
								<th>E-mail</th>
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
								<td>
									<input type="text"
										maxlength="20"
										name="email"
										id="email"
									value="<?php echo $reg['email'];?>">
								</td>
							</tr>
							<tr>
								<th>Parentesco</th><th>Vive con el Alumno?</th>
							</tr>
							<tr>
								<td>
									<?php $sql="SELECT codigo, descripcion from relacion where status = 1;";
										$registros = conexion($sql);?>
									<select name="relacion" required id="relacion">
										<?php	while($fila = mysqli_fetch_array($registros)) :?>
										<?php if ($reg['cod_relacion']==$fila['codigo']) :?>
											<option selected="selected" value="<?php echo $fila['codigo']?>">
											<?php echo $fila['descripcion']?></option>
											<?php else: ?>
											<option value="<?php echo $fila['codigo']?>">
												<?php echo $fila['descripcion']?>
											</option>
										<?php endif ?>
										<?php endwhile; ?>
									</select><font color="#ff0000">*</font>
								</td>
								<td>
									<select name="vive_con_alumno" required id="vive_con_alumno">
										<?php if ( $reg['vive_con_alumno'] == 's' ): ?>
										<option value="s" selected="selected">Si</option>
										<option value="n">No</option>
									<?php else: ?>
										<option value="s">Si </option>
										<option value="e" selected="selected">No</option>
									<?php endif ?>
									</select><font color="#ff0000">*</font>
								</td>
							</tr>
							<tr>
								<th>Estado</th><th>Municipio</th><th>Parroquia</th>
							</tr>
							<tr>
								<td>
									<select name="cod_est" id="cod_est">
									</select><font color="#ff0000">*</font>
								</td>
								<td>
									<select name="cod_mun" id="cod_mun" >
									</select><font color="#ff0000">*</font>
								</td>
								<td>
									<select name="cod_parro" id="cod_parro">
									</select><font color="#ff0000">*</font>
								</td>
							</tr>
							<tr>
								<th>Direcci&oacute;n</th>
							</tr>
							<tr>
								<td colspan="2">
									<textarea
										maxlenght="150"
										cols="50"
										rows="4"
										name="direcc"
										id="direcc"><?php echo $reg['direccion'];?></textarea>
									<font color="#ff0000">*</font>
								</td>
							</tr>
							<tr>
								<th>Nivel Educativo</th><th>Profesi&oacute;n </th>
							</tr>
							<tr>
								<td>
								<?php $sql="SELECT codigo, descripcion from nivel_instruccion where status = 1;";
										$registros = conexion($sql);?>
									<select name="nivel_instruccion" required id="nivel_instruccion">
									<?php while($fila = mysqli_fetch_array($registros)) :	?>
									<?php if ($reg['cod_instruccion']==$fila['codigo']) :?>
										<option selected="selected" value="<?php echo $fila['codigo']?>">
										<?php echo $fila['descripcion']?></option>
										<?php else: ?>
											<option value="<?php echo $fila['codigo']?>">
												<?php echo $fila['descripcion']?>
											</option>
										<?php endif ?>
									<?php endwhile; ?>
									</select><font color="#ff0000">*</font>
								</td>
								<td>
									<?php $sql="SELECT codigo, descripcion from profesion where status = 1;";
										$registros = conexion($sql);?>
									<select name="profesion" id="profesion">
										<?php while($fila = mysqli_fetch_array($registros)) :	?>
										<?php if ($reg['cod_profesion']==$fila['codigo']) :?>
										<option selected="selected" value="<?php echo $fila['codigo']?>">
										<?php echo $fila['descripcion']?></option>
										<?php else: ?>
											<option value="<?php echo $fila['codigo']?>">
												<?php echo $fila['descripcion']?>
											</option>
										<?php endif ?>
									<?php endwhile; ?>
								</td>
							</tr>
							<tr>
								<th>Lugar de Trabajo</th><th>Direcci&oacute;n de Trabajo</th>
								<th>Tel&eacute;fono Laboral</th>
							</tr>
							<tr>
								<td>
									<input type="text"
										maxlength="50"
										name="lugar_trabajo"
										id="lugar_trabajo"
										value="<?php echo $reg['lugar_trabajo'];?>">
								</td>
								<td>
									<input type="text"
										maxlength="150"
										name="direccion_trabajo"
										id="direccion_trabajo"
										value="<?php echo $reg['direccion_trabajo'];?>">
								</td>
								<td>
									<input type="text"
										maxlength="11"
										name="telefono_trabajo"
										id="telefono_trabajo"
										value="<?php echo $reg['telefono_trabajo'];?>">
								</td>
							</tr>
							<tr>
								<td align="center">
									<input type="button" name="registrar" value="insertar">
								</td>
								<td align="center">
									<input type="button" name="limpiar" id="limpiar" value="reset">
								</td>
								<tr colspan="3">
									<td>
										<a class="" href="menucon.php">Volver</a>
									</td>
								</tr>
						</table>
				</form>
					<!-- validacion -->
	<?php $validacion = enlaceDinamico("java/validacionP.js"); ?>
	<script type="text/javascript" src="<?php echo $validacion ?>"></script>
	<!-- ajax de estado/mun/parr -->
	<?php $estadoenlace = "java/edo.php?cod_est=".$reg['cod_est']; ?>
	<?php $estado = enlaceDinamico($estadoenlace); ?>
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
	<!-- cedula -->
	<script type="text/javascript">
		$(function(){
			$.ajax({
				url: '../java/ajax/cedula.js',
				type: 'POST',
				dataType: 'script'
			});
		});
	</script>
</div>
<?php else : ?>
<div id="contenido">
	<div id="blancoAjax" align="center">
		<div class="contenido">
			<p align=center>
				No existe informacion referente a la cedula:
				<strong><?php echo $cedula ?></strong>
			</p>
		</div>
	</div>
</div>
<?php endif ; ?>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
