<?php
session_start();
require_once("../php/conexion.php");?>

<div align="center">
	<!-- http://www.w3schools.com/html/html_forms.asp -->
	<form method="post" action="Personal_Autorizado/insertar_P.php" name="form_repre" id="form">
		<fieldset>
			<legend style="width:80%">REGISTRO DE PADRES/REPRESENTANTE</legend>
				<table>
					<tr>
						<td colspan=2>Entre la informaci&oacute;n:<br>
						<sup>(<font color="#ff0000">*</font> indica campo obligatorio).</sup></td>
					</tr>
					<tr> 
						<th>C&eacute;dula</th>
						<th>representante</th>
					</tr>
					<tr>  
						<td align="left">
							<select name="nacionalidad" id="nacionalidad">
								<option value="v">V</option>
								<option value="e">E</option>
							</select>
							<input type="text"
							maxlength="8"
							size="12"
							name="cedula"
							id="cedula">
							<font color="#ff0000">*</font>
						</td>
						<td>
							<select name="representante" id="representante" required>
								<option selected="selected" value="">Seleccione</option>
								<option value="1">Si</option>
								<option value="0">No</option>
							</select><font color="#ff0000">*</font>
						</td>
					</tr>
					<tr>
						<th>Primer Nombre</th><th>Segundo Nombre</th>
						<th>Primer Apellido</th><th>Segundo Apellido</th>
					</tr>
					<tr>
						<td><input 
						type="text" 
						name="p_nombre" 
						id="p_nombre">
						<font color="#ff0000">*</font></td>
						<td><input type="text" name="s_nombre" id="s_nombre"></td>
						<td><input type="text" name="p_apellido" id="p_apellido" >
							<font color="#ff0000">*</font>
						</td>
						<td><input type="text" name="s_apellido" id="s_apellido"></td>
					</tr>
					<tr>
						<th>Sexo</th><th>Fecha de Nacimiento</th><th>Lugar de Nacimiento</th>
					</tr>
					<tr>
						<td>		
							<?php
								$sql = "SELECT codigo, descripcion from sexo where status = 1;";
								$registros = conexion($sql);
							?>
								<select name="sexo" id="sexo">
								<option value="">Seleccione una opci&oacute;n </option>
							<?php
								while($fila = mysql_fetch_array($registros)){
							?>
								<option value="<?php echo "" .$fila['codigo']?>"><?php echo "" .$fila['descripcion']?></option>
							<?php
								}
							?>
								</select><font color="#ff0000">*</font>
						</td>
						<td><input type="date" maxlength="10" name="fec_nac" id="fec_nac"></td>
						<td>							
							<textarea
								name="lugar_nac"
								id="lugar_nac"
								cols="40"
								rows="4"
								maxlength="50"
								></textarea>
						</td>
					</tr>
					<tr>
						<th>Tel&eacute;fono Local</th><th>Tel&eacute;fono Celular</th><th>E-mail</th>
					</tr>
					<tr>	
						<td><input type="text"  
							maxlength="11" 
							name="telefono" 
							id="telefono">
							<font color="#ff0000">*</font></td>
						<td><input type="text" 
							maxlength="11" 
							name="telefono_otro" 
							id="telefono_otro"></td>
						<td><input type="text" name="email" id="email"></td>
					</tr>
					<tr>
						<th>Parentesco</th><th>Vive con el Alumno?</th>
					</tr>
					<tr>
						<td>
							<?php $sql="SELECT codigo, descripcion from relacion where status = 1;";
								$registros = conexion($sql);?>
							<select name="relacion" id="relacion">
								<option value="">Seleccione una opci&oacute;n</option>
								<?php	while($fila = mysql_fetch_array($registros)) :?>
									<option value="<?php echo $fila['codigo']?>">
									<?php echo $fila['descripcion']?></option>
								<?php endwhile; ?>
							</select><font color="#ff0000">*</font>
						</td>
						<td>	
							<select name="vive_con_alumno" id="vive_con_alumno">
								<option value="">Seleccionar</option>
								<option value="s">SI</option>
								<option value="n">NO</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Estado</th><th>Municipio</th><th>Parroquia</th>
					</tr>
					<tr>
						<td>									
							<select name="cod_est" id="cod_est"></select>
							<font color="#ff0000">*</font>
						</td>
						<td>
							<select name="cod_mun" id="cod_mun" >
							<option value="">--Seleccionar--</option></select>
							<font color="#ff0000">*</font>
						</td>
						<td>				
							<select name="cod_parro" id="cod_parro">
							<option value="">--Seleccionar--</option></select
							><font color="#ff0000">*</font>
						</td>
					</tr>
					<tr>
						<th>Direcci&oacute;n</th>
					</tr>
						<tr>
							<td colspan="3">
								<input type="text" 
								maxlength="20" 
								size ="50%" 
								name="direcc" 
								id="direcc" />
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
							<select name="nivel_instruccion" id="nivel_instruccion">
							<?php while($fila = mysql_fetch_array($registros)) :	?>
									<option value="<?php echo $fila['codigo']?>">
									<?php echo $fila['descripcion']?></option>
							<?php endwhile; ?>
							</select><font color="#ff0000">*</font>
						</td>	
						<td>
							<select name="profesion" id="profesion">
								<option value="">En Construccion</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Lugar de Trabajo</th><th>Direcci&oacute;n de Trabajo</th>
						<th>Tel&eacute;fono Laboral</th>
					</tr>
					<tr>
						<td><input type="text" 
						name="lugar_trabajo" 
						id="lugar_trabajo">
					</td>
						<td><input type="text" 
						name="direccion_trabajo" 
						id="direccion_trabajo">
					</td>
						<td><input type="text" 
						maxlength="11" 
						name="telefono_trabajo"
						id="telefono_trabajo">
					</td>
					</tr>
					<tr>
						<td align="center"><input type="button" name="limpiar" id="limpiar" value="reset"></td>
						<td align="center"><input type="button" name="registrar" value="insertar"></td>
					</tr>
				</table>
		</fieldset>
	</form>
</div>
<script type="text/javascript" src="java/ajax/cargadorOnClick.js"></script>
<script language="javascript" src="java/validacionP.js"></script>
<script type="text/javascript">
	$("document").ready(function(){
		$("#cod_est").load("java/edo.php");
			$("#cod_est").change(function(){
			var id = $("#cod_est").val();
			$.get("java/mun.php",{param_id:id})
			.done(function(data){
				$("#cod_mun").html(data);
					$("#cod_mun").change(function(){
					var id2 = $("#cod_mun").val();
					$.get("java/parro.php",{param_id2:id2})
					.done(function(data){
						$("#cod_parro").html(data);
					});
				});
			});
		});
	});
</script>