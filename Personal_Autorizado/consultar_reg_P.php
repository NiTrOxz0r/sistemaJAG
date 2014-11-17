<?php
if(!isset($_SESSION)){ 
	session_start(); 
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1);

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



$sql = "SELECT a.codigo, a.cedula, nacionalidad, p_nombre, s_nombre, p_apellido, s_apellido, f.descripcion as sexo, 
fec_nac, lugar_nac, telefono, telefono_otro, email,  g.descripcion as relacion, vive_con_alumno,b.direccion_exacta as direccion, 
c.descripcion as parroquia, d.descripcion as municipio, e.descripcion as estado, h.descripcion nivel_instruccion, 
i.descripcion as profesion, lugar_trabajo, direccion_trabajo, telefono_trabajo FROM personal_autorizado a, direccion_p_a b, parroquia c, municipio d, estado e, sexo f, 
relacion g, nivel_instruccion h, profesion i WHERE a.cod_direccion=b.codigo and b.cod_parroquia=c.codigo and c.cod_mun=d.codigo 
and e.codigo=d.cod_edo and a.sexo=f.codigo and a.relacion=g.codigo and a.nivel_instruccion=h.codigo and a.profesion=i.codigo 
and cedula ='$cedula';";

$re = conexion($sql);

if($reg = mysqli_fetch_array($re)) : 
//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php

empezarPagina();?>


<div id="contenido">	
	<div id="blancoAjax">

		<div align="center">
			<!-- http://www.w3schools.com/html/html_forms.asp -->
			<form method="GET" action="actualizar_P.php" name="form_repre" id="form">

					<h1>REGISTRO DE PADRES/REPRESENTANTE</h1>
						<table>
							<tr> 
								<th>C&eacute;dula</th>
							</tr>
							<tr>  
								<td align="left">
									<input 
										type="text" 
										readonly size="1" 
										value="<?php echo $reg['nacionalidad'] == 'v' ? 'V':'E';?>">
									<input 
										id="cedula_r" 
										type="text" 
										readonly 
										maxlength="8" 
										size="12" 
										name="cedula_r"  
										value="<?php echo $reg['cedula'];?>">
								</td>
							</tr>
							<tr>
								<th>Primer Nombre</th>
								<th>Segundo Nombre</th>
							</tr>			
							<tr>
								<td>
									<input type="text" 
									readonly 
									maxlength="20"  
									value="<?php echo $reg['p_nombre'];?>"/>
								</td>
								<td>
									<input type="text" 
									maxlength="20" 
									readonly 
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
									readonly 
									maxlength="20" 
									value="<?php echo $reg['p_apellido'];?>"/>
								</td>
								<td>
									<input type="text" 
									maxlength="20" 
									readonly 
									value="<?php echo $reg['s_apellido'];?>"/>
								</td>
							</tr>
							<tr>
								<th>Sexo</th>
								<th>Fecha de Nacimiento</th>
							</tr>
							<tr>
								<td>		
									<input type="text" 
									readonly 
									value="<?php echo $reg['sexo'];?>"/>
								</td>
								<td>
									<input type="date" 
									readonly 
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
										readonly
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
										readonly
										value="<?php echo $reg['telefono'];?>">
								</td>
								<td>
									<input 
										type="text"  
										maxlength="11" 
										readonly
										value="<?php echo $reg['telefono_otro'];?>">
								</td>
								<td>
									<input type="text" 
									maxlength="20"
									readonly 
									value="<?php echo $reg['email'];?>">
								</td>
							</tr>
							<tr>
								<th>Parentesco</th><th>Vive con el Alumno?</th>
							</tr>
							<tr>
								<td>
									<input type="text" 
									readonly 
									value="<?php echo $reg['relacion'];?>">
								</td>
								<td>	
									<input type="text" 
									readonly 
									value="<?php echo $reg['vive_con_alumno'];?>">
								</td>
							</tr>
							<tr>
								<th>Estado</th><th>Municipio</th><th>Parroquia</th>
							</tr>
							<tr>
								<td>
									<input type="text" 
										readonly 
										value="<?php echo $reg['estado'];?>">
								</td>
								<td>
									<input type="text" 
									readonly 
									value="<?php echo $reg['municipio'];?>">
								</td>
								<td>
									<input type="text" 
									readonly 
									value="<?php echo $reg['parroquia'];?>">
								</td>
							</tr>
							<tr>
								<th>Direcci&oacute;n</th>
							</tr>
							<tr>
								<td colspan="2">
									<textarea
										cols="65"
										rows="2"
										readonly
										maxlength="50"
										><?php echo $reg['direccion'];?></textarea>
								</td>
							</tr>
							<tr>
								<th>Nivel Educativo</th><th>Profesi&oacute;n </th>
							</tr>
							<tr>
								<td>
									<input type="text" 
									readonly 
									value="<?php echo $reg['nivel_instruccion'];?>">
								</td>	
								<td>
									<input type="text" 
									readonly 
									value="<?php echo $reg['profesion'];?>">
								</td>
							</tr>
							<tr>
								<th>Lugar de Trabajo</th><th>Direcci&oacute;n de Trabajo</th>
								<th>Tel&eacute;fono Laboral</th>
							</tr>
							<tr>
								<td>
									<input type="text" 
										readonly 
										value="<?php echo $reg['lugar_trabajo'];?>">
								</td>
								<td>
									<input type="text" 
										readonly 
										value="<?php echo $reg['direccion_trabajo'];?>">
								</td>
								<td>
									<input type="text" 
										readonly 
										value="<?php echo $reg['telefono_trabajo'];?>">
								</td>
							</tr>
							<tr>
									<td>
											<input type="button" name="registrar" value="Editar">
											<input type="button" name="limpiar_btn" value="Enviar" hidden disabled id="limpiar"/>
									</td>
							</tr>
						</table>
				</form>
			</div>
			<?php $validacion = enlaceDinamico("java/validarPA.js"); ?>
			<script type="text/javascript" src="<?php echo $validacion ?>"></script>

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
finalizarPagina();