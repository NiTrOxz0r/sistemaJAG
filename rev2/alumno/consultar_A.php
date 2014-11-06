<html>
	<head>
		<title>Consultar</title>
	</head>
	<script language="javascript" src="../java/validacionCA.js"></script> 

	<body>

	<?php
	

		require("../php/conexion.php");

		$cedula = $_POST['cedula'];
	
		$sql = "SELECT a.codigo, a.cedula, a.cedula_escolar, nacionalidad, p_nombre, s_nombre, p_apellido, 
		s_apellido, f.descripcion as sexo, fec_nac, lugar_nac, telefono, telefono_otro, b.direccion_exacta as direccion, 
		c.descripcion as parroquia, d.descripcion as municipio, e.descripcion as estado, acta_num_part_nac, 
		acta_folio_num_part_nac, plantel_procedencia, repitiente, altura, peso, camisa, pantalon, zapato FROM alumno a, 
		direccion_alumno b, parroquia c, municipio d, estado e, sexo f WHERE a.cod_direccion=b.codigo and 
		b.cod_parroquia=c.codigo and c.cod_mun=d.codigo and e.codigo=d.cod_edo and cedula ='$cedula';";
		
		$re = conexion($sql);
	
	if($reg = mysqli_fetch_array($re)) : ?>	
	<div align="center">
		<form action="actualizar_A.php" method="POST" name="form_alu" id="form">
				<fieldset style="width:80%">
					<legend>  CONSULTA DE ALUMNO</legend>
					<fieldset>
						<legend  align="left"> DATOS PERSONALES</legend>
							<table>
								<tr>
									<th>C&eacute;dula</th><th>C&eacute;dula Escolar</th>
								</tr>
								<td>
									<input type="text" readonly size="1" value="<?php echo $reg['nacionalidad'];?>">
									<input id="cedula" type="text" readonly maxlength="8" size="12" name="cedula"  value="<?php echo $reg['cedula'];?>">
								</td>
									<td><input type="text" readonly maxlength="10" value="<?php echo $reg['cedula_escolar'];?>"/></td>
								</tr>
								
								<tr>
									<th>Primer Nombre</th><th>Segundo Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th>
								</tr>			
								<tr>
									<td><input type="text" readonly maxlength="20"  value="<?php echo $reg['p_nombre'];?>"/></td>
									<td><input type="text" maxlength="20" readonly value="<?php echo $reg['s_nombre'];?>"/></td>
									<td><input type="text" readonly maxlength="20" value="<?php echo $reg['p_apellido'];?>"/>
									</td><td><input type="text" maxlength="20" readonly value="<?php echo $reg['s_apellido'];?>"/></td>
								</tr>			
								<tr>
									<th>Sexo</th><th>Fecha de Nacimiento</th><th>Lugar de Nacimiento</th>
								</tr>
								<tr>
									<td>		
										<input type="text" readonly value="<?php echo $reg['sexo'];?>"/>
									</td>
									<td>
										<input type="date" readonly value="<?php echo $reg['fec_nac'];?>"/></td>
									<td>							
										<input type="text" readonly value="<?php echo $reg['lugar_nac'];?>"/>
									<td>
								</tr>
								<tr>
									<th>Tel&eacute;fono</th><th> Tel&eacute;no Celular</th>
								</tr>
								<tr>
									<td><input type="text" readonly maxlength="11" value="<?php echo $reg['telefono'];?>"/>
									</td><td><input type="text" readonly maxlength="11" value="<?php echo $reg['telefono_otro'];?>"/></td>
								</tr>
							</table>				
					</fieldset>
				</fieldset>
					<fieldset>
						<legend align="left">DIRECCI&Oacute;N</legend>
							<table>
								<tr>
									<th>Estado</th><th>Municipio</th><th>Parroquia</th>
								</tr>
								<tr>
									<td>									
										<input type="text" readonly value="<?php echo $reg['estado'];?>"/>
									</td>
									<td>
										<input type="text" readonly value="<?php echo $reg['municipio'];?>"/>
									<td>	
										<input type="text" readonly value="<?php echo $reg['parroquia'];?>"/>
								</tr>
								<tr>
									<th>Direcci&oacute;n</th>
								</tr>
								<tr>
									<td colspan="3">
										<input type="text" readonly maxlength="20" size ="50%"  value="<?php echo $reg['direccion'];?>"/>
									</td>
								</tr>
							</table>
					</fieldset>
					<fieldset>	
						<legend align="left"> Partida de Nacimiento</legend>
							<table >
								<tr>
									<th colspan="2">Act. N&uacute;m Partida de Nac.</th><td></td>
									<th colspan="3">Act. Folio N&uacute;m.</th><td></td><td></td>
									<th>Plantel de Procedencia</th><th>Repitiente</th>
								</tr>
								<tr align="center">
									<td colspan="2" >
										<input type="text" 
										readonly maxlength="8" 
										size ="8" value="<?php echo $reg['acta_num_part_nac'];?>"/></td><td></td><td></td>
									<td></td>
									<td colspan="3">
										<input type="text" 
										readonly 
										maxlength="8" 
										size ="8"  value="<?php echo $reg['acta_folio_num_part_nac'];?>" />
									</td>
									<td>
										<input type="text" 
										readonly 
										maxlength="20" 
										value="<?php echo $reg['plantel_procedencia'];?>"/>
									</td>
									<td>
										<input type="text" 
										readonly 
										maxlength="20" value="<?php echo $reg['repitiente'];?>"/>
									</td>
								</tr>
							</table>
					</fieldset>
					<fieldset>
						<legend align="l</fieldset>eft"> DATOS ANTROPOL&Oacute;GICO</legend>
							<table>			
								<tr>
									<th>Altura</th><th>Peso</th>
								</tr>			
								<tr align="center">
									<td><input type="text" readonly maxlength="5" size ="5" value="<?php echo $reg['altura'];?>"/>
									<font color="#ff0000">cm</font></td>
									<td><input type="text" readonly maxlength="5" size ="5" value="<?php echo $reg['peso'];?>"/>
									<font color="#ff0000">kg</font></td>
								</tr>
								<tr>
									<th>Talla de Camisa</th><th>Talla de Pantal&oacute;n</th><th>N&uacute;m. de Calzado</th>
								</tr>			
								<tr align="center">
									<td><input type="text" readonly maxlength="2"  size ="4" value="<?php echo $reg['camisa'];?>"/></td>
									<td><input type="text" readonly maxlength="2" size ="4" n value="<?php echo $reg['pantalon'];?>"/></td>
									<td><input type="text" readonly maxlength="2" size ="4" value="<?php echo $reg['zapato'];?>"/></td>
								</tr>
								<tr>
								</tr>
								<tr  align="center">
									<td>
										<input type="button" name="enviar_btn" value="Enviar" Id="enviar"/>
									</td>
								</tr>	
							</table>
						</fieldset>
		</form>
	</div>
		
	<?php else : ?>
		<p align=center>No existe Datos con esa Cedula</p>
	<?php endif ; ?>

	</body>

</html>