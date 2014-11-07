<html>
	<head>
		<title>Consultar</title>
	</head>
	

<body>

<?php
	

	include("../conexion/conex.php");

	$cedula = '17639604';//$_POST['ced1'];
	
	$sql = "select a.cod_alu, a. nac, a.ced, a.ced_esc, a.pnom as nom_alu, a.papelli as apelli_alu, b.nac as nac_r, b.ced_repre, b.pnom as nom_re, 
	b.papelli as apelli_re, b.tlf, b.tlfo from alumno a, padres_representante b where a.cod_repre = b.cod_repre and b.ced_repre='$cedula'";
	$re = mysql_query($sql) or die ("Error al Conectar a la Base". mysql_error());
	
	if($reg = mysql_fetch_array($re)){
?>	
<div align="center">
		<form action="actualizar1.php" method="POST" name="form_alu" id="form">
				<fieldset style="width:80%">
					<legend>  CONSULTA DE ALUMNO REPRESENTANTE</legend>
					<fieldset>
				
						<legend  align="left"> DATOS PERSONALES DEL ALUMNO</legend>

							<table>
								<tr>
									<th>Nacionalidad</><th>C&eacute;dula</th><th>C&eacute;dula Escolar</th>
								</tr>
			
								<tr>
									<td align="left">
									<input type="text" readonly value="<? echo $reg['nac'];?>">
								</td>
								<td>
									<input type="text" readonly maxlength="8" size="12"  value="<? echo $reg['ced'];?>">
								</td>
									<td><input type="text" readonly maxlength="10" value="<? echo $reg['ced_esc'];?>"/></td>
								</tr>
								
								<tr>
									<th>Primer Nombre</th><th>Segundo Nombre</th>
								</tr>			
								<tr>
									<td><input type="text" readonly maxlength="20"  value="<?php echo $reg['nom_alu'];?>"/></td>
									<td><input type="text" readonly maxlength="20" value="<?php echo $reg['apelli_alu'];?>"/></td>
								</tr>
							</table>				
					</fieldset>
						
						
					<fieldset>
						
						<legend align="left">DATOS DEL REPRESENTANTE</legend>
							
							<table>
								<tr>
									<th>Nacionalidad</><th>C&eacute;dula</th>
								</tr>
			
								<tr>
									<td align="left">
										<input type="text" readonly value="<? echo $reg['nac_r'];?>">
									</td>
									<td>
										<input type="text" readonly maxlength="8" size="12"  value="<? echo $reg['ced_repre'];?>">
									</td>
								</tr>
								<tr>
									<th>Primer Nombre</th><th>Segundo Nombre</th>
								</tr>			
								<tr>
									<td><input type="text" readonly maxlength="20"  value="<?php echo $reg['nom_re'];?>"/></td>
									<td><input type="text" readonly maxlength="20" value="<?php echo $reg['apelli_re'];?>"/></td>
								</tr>
								<tr>
									<td><a href="menucon.html">Menu</a></td>
								</tr>
							</table>				
					</fieldset>
				</form>
		</div>
		
	<?php
		mysql_close($conn);  
	       }
	       else {  
				echo "<p align=center>"."No existe Datos con esa Cedula"."</p>"."</br>"."</br>";
		   	
		}
  	 ?>

	</body>

</html>