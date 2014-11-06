
<?php
	
	require("../php/conexion.php");
	
	if ( isset($_POST['cedula']) ) {
		$cedula = $_POST['cedula'];
	}else{
		header("Location: menucom.html?cedulaError=unset");
	}

	
	$sql = "SELECT a.codigo, a.cedula, a.cedula_escolar, nacionalidad, p_nombre, s_nombre, p_apellido, 
		s_apellido, sexo, fec_nac, lugar_nac, telefono, telefono_otro, b.direccion_exacta as direccion, 
		c.descripcion as parroquia, c.codigo as cod_parro, d.descripcion as municipio, d.codigo as cod_mun, e.descripcion as estado, 
		e.codigo as cod_est, acta_num_part_nac, acta_folio_num_part_nac, plantel_procedencia, repitiente, altura, peso, camisa, pantalon, 
		zapato, a.cod_curso FROM alumno a, direccion_alumno b, parroquia c, municipio d, estado e, sexo f, curso g WHERE a.cod_direccion=b.codigo and 
		b.cod_parroquia=c.codigo and c.cod_mun=d.codigo and e.codigo=d.cod_edo and a.cod_curso=g.codigo and cedula ='$cedula';";
	//$re = mysql_query($sql) or die ("Error al Conectar a la Base". mysql_error());
	$re = conexion($sql);
	if($reg = mysqli_fetch_array($re)) :?>	

<html>
	<head>
		<title>Actualizaci&oacute;n</title>
		<script language="javascript" src="../java/validacion.js"></script> 
		<script type="text/javascript" src="../java/jquery-1.11.0.min.js"></script>
		<script type="text/javascript">
			$("document").ready(function(){
				$("#cod_est").load('../java/<?php echo "edo.php?cod_est=".$reg['cod_est']; ?>');
				$("#cod_est").change(function(){
					var id = $("#cod_est").val();
					$.get("../java/mun.php",{param_id:id})
					.done(function(data){
						$("#cod_mun").html(data);
						
						$("#cod_mun").change(function(){
							var id2 = $("#cod_mun").val();
							$.get("../java/parro.php",{param_id2:id2})
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
	</head>
<body>


<div align="center">
	<form action="actualizar1.php" method="POST" name="form_alu" id="form">
		<fieldset style="width:80%">
			<legend>REGISTRO DE ALUMNO</legend>
			<fieldset>
				<legend  align="left"> DATOS PERSONALES</legend>
					<table>
						<tr>
							<th>C&eacute;dula</th><th>C&eacute;dula Escolar</th>
						</tr>
						<tr>
							<td align="left">
								<!--http://www.w3schools.com/tags/tag_select.asp-->
								<select name="nacionalidad" id="nacionalidad">
									<?php if ( $reg['nacionalidad'] == 'v' ): ?>
										<option name="nacionalidad" value="v" selected="selected">V</option>
										<option name="nacionalidad" value="e">E</option>
									<?php else: ?>
										<option name="nacionalidad" value="v">V </option>
										<option name="nacionalidad" value="e" selected="selected">E</option>
									<?php endif ?>
								</select>
								<!-- HACER AJAX PARA CEDULA!!! -->
								<input 
								type="text" 
								readonly 
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
								readonly 
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
									id="lug_nac"
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
			</fieldset>
			<fieldset>
				<legend align="left">DIRECCI&Oacute;N</legend>
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
			</fieldset>
			<fieldset>
				<legend align="left"> Partida de Nacimiento</legend>
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
		
			</fieldset>

			<fieldset>
		
				<legend align="left"> DATOS ANTROPOL&Oacute;GICO</legend>

					<table>
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
			</fieldset>
			<fieldset>
				<legend><i>Datos Educativos.</i></legend>
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
			</fieldset>
		</fieldset>
			<input type="button" name="enviar_btn" value="Enviar" Id="enviar"/>
	</form>
</div>
		
	<?php else : ?>
			<p align=center>No existe Datos con cedula: <?=$cedula ?></p>
			<p align=center><a href=menucon.html>Volver</a></p>
	<?php endif; ?>

	</body>

</html>