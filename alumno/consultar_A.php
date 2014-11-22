<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1);

if (isset($_POST['cedula'])) {
	if (trim($_POST['cedula']) == "" or strlen($_POST['cedula']) <> 8) {
		$enlace = enlaceDinamico("alumno/menucon.php");
		header("Location:".$enlace);
	}else{
		$con = conexion();
		$cedula = mysqli_escape_string($con, $_POST['cedula']);
	}
}else{
	$enlace = enlaceDinamico("alumno/menucon.php");
	header("Location:".$enlace);
}

$sql = "SELECT a.codigo, cedula, cedula_escolar, nacionalidad, p_nombre, s_nombre, p_apellido, s_apellido, g.descripcion as sexo,
fec_nac, lugar_nac, telefono, telefono_otro, d.descripcion as parroquia, e.descripcion as municipio, f.descripcion as estado,
direccion_exacta as direccion, acta_num_part_nac, acta_folio_num_part_nac, plantel_procedencia, repitiente, altura, peso, camisa,
 pantalon, zapato, certificado_vacuna, h.descripcion as discapacidad, cod_representante FROM persona a
 inner join alumno b on (a.codigo=b.cod_persona)
 inner join direccion c on (a.codigo=c.cod_persona)
 inner join parroquia d on (c.cod_parroquia=d.codigo)
 inner join municipio e on (d.cod_mun=e.codigo)
 inner join estado f on (e.cod_edo=f.codigo)
 inner join sexo g on (a.sexo=g.codigo)
 inner join discapacidad h on (b.cod_discapacidad = h.codigo)
 WHERE cedula = '$cedula';";

$re = conexion($sql);

if($reg = mysqli_fetch_array($re)) :
//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina();?>
<div id="contenido">
	<div id="blancoAjax" align="center">
		<div class="contenido">
			<form action="actualizar_A.php" method="POST" name="form_alu" id="form">

					<h1>CONSULTA DE ALUMNO </h1>

						<h2  align="center">DATOS PERSONALES</h2>
							<table class="tabla-consulta" id="tabla-consulta-alumno">
								<tr>
									<th>Datos de alumno</th>
								</tr>
								<tr>
									<th>C&eacute;dula</th><th>C&eacute;dula Escolar</th>
								</tr>
								<td>
									<input
										type="text"
										readonly size="1"
										value="<?php echo $reg['nacionalidad'] == 'v' ? 'V':'E';?>">
									<input
										id="cedula"
										type="text"
										readonly
										maxlength="8"
										size="12"
										name="cedula"
										value="<?php echo $reg['cedula'];?>">
								</td>
									<td>
										<input
											type="text"
											readonly
											maxlength="10"
											value="<?php echo $reg['cedula_escolar'];?>"/>
									</td>
								</tr>

								<tr>
									<th>Primer Nombre</th>
									<th>Segundo Nombre</th>
								</tr>
								<tr>
									<td>
										<input type="text" readonly maxlength="20"  value="<?php echo $reg['p_nombre'];?>"/>
									</td>
									<td>
										<input type="text" maxlength="20" readonly value="<?php echo $reg['s_nombre'];?>"/>
									</td>
								</tr>
								<tr>
								<tr>
									<th>Primer Apellido</th>
									<th>Segundo Apellido</th>
								</tr>
								<tr>
									<td>
										<input type="text" readonly maxlength="20" value="<?php echo $reg['p_apellido'];?>"/>
									</td>
									<td>
										<input type="text" maxlength="20" readonly value="<?php echo $reg['s_apellido'];?>"/>
									</td>
								</tr>
									<th>Sexo</th>
									<th>Fecha de Nacimiento</th>
								</tr>
								<tr>
									<td>
										<input type="text" readonly value="<?php echo $reg['sexo'];?>"/>
									</td>
									<td>
										<input type="date" readonly value="<?php echo $reg['fec_nac'];?>"/>
									</td>
								</tr>
								<tr colspan="2">
									<th>Lugar de Nacimiento</th>
								</tr>
								<tr>
									<td colspan="2">
										<textarea
											name="lugar_nac"
											id="lugar_nac"
											cols="65"
											rows="2"
											readonly
											maxlength="50"
											><?php echo $reg['lugar_nac'];?></textarea>
									</td>
								</tr>
								<tr>
									<th>Tel&eacute;fono</th><th> Tel&eacute;no Celular</th>
								</tr>
								<tr>
									<td><input type="text" readonly maxlength="11" value="<?php echo $reg['telefono'];?>"/>
									</td><td><input type="text" readonly maxlength="11" value="<?php echo $reg['telefono_otro'];?>"/></td>
								</tr>
							</table>
							<?php if (isset($reg['cod_representante'])): ?>
								<?php
									$query = "SELECT
										a.cedula as cedula_r,
										a.nacionalidad as nacionalidad_r,
										a.p_nombre as p_nombre_r,
										a.s_nombre as s_nombre_r,
										a.p_apellido as p_apellido_r,
										a.s_apellido as s_apellido_r,
										a.telefono as telefono_r,
										a.telefono_otro as telefono_otro_r,
										b.email as email_r,
										c.descripcion as relacion_r,
										b.vive_con_alumno as vive_con_alumno_r,
										b.lugar_trabajo as lugar_trabajo_r,
										b.direccion_trabajo as direccion_trabajo_r,
										b.telefono_trabajo  as  telefono_trabajo_r
										FROM persona a
										inner join personal_autorizado b on (a.codigo=b.cod_persona)
										inner join relacion c on (relacion=c.codigo) WHERE b.codigo = $reg[cod_representante];";
									$resultado = conexion($query);
									$datos = mysqli_fetch_assoc($resultado);
								?>
								<table class="tabla-consulta" id="tabla-consulta-representante">
									<tr>
										<th>Datos del representante</th>
										<th>(resumen)</th>
									</tr>
									<tr>
										<th>C&eacute;dula</th><th>Relacion</th>
									</tr>
									<td>
										<input
											type="text"
											readonly size="1"
											value="<?php echo $datos['nacionalidad_r'] == 'v' ? 'V':'E';?>">
										<input
											id="cedula_r"
											type="text"
											readonly
											maxlength="8"
											size="12"
											name="cedula_r"
											value="<?php echo $datos['cedula_r'];?>">
									</td>
										<td>
											<input
												type="text"
												readonly
												maxlength="10"
												value="<?php echo $datos['relacion_r'];?>"/>
										</td>
									</tr>

									<tr>
										<th>Primer Nombre</th>
										<th>Segundo Nombre</th>
									</tr>
									<tr>
										<td>
											<input
												type="text"
												readonly
												maxlength="20"
												value="<?php echo $datos['p_nombre_r'];?>"/>
										</td>
										<td>
											<input
												type="text"
												maxlength="20"
												readonly
												value="<?php echo $datos['s_nombre_r'];?>"/>
										</td>
									</tr>
									<tr>
									<tr>
										<th>Primer Apellido</th>
										<th>Segundo Apellido</th>
									</tr>
									<tr>
										<td>
											<input2004482420044824
												type="text"
												readonly
												maxlength="20"
												value="<?php echo $datos['p_apellido_r'];?>"/>
										</td>
										<td>
											<input
												type="text"
												maxlength="20"
												readonly
												value="<?php echo $datos['s_apellido_r'];?>"/>
										</td>
									</tr>
										<th>Vive con alumno</th>
										<th>Correo Electronico</th>
									</tr>
									<tr>
										<td>
											<input
												type="text"
												readonly
												value="<?php echo $datos['vive_con_alumno_r'] == 'S' ? 'Si':'No';?>"/>
										</td>
										<td>
											<input
												type="text"
												readonly
												value="<?php echo $datos['email_r'];?>"/>
										</td>
									</tr>
									<tr>
										<th>Tel&eacute;fono</th>
										<th>Tel&eacute;fono Celular</th>
									</tr>
									<tr>
										<td>
											<input
												type="text"
												readonly
												value="<?php echo $datos['telefono_r'];?>"/>
										</td>
										<td>
											<input
												type="text"
												readonly
												value="<?php echo $datos['telefono_otro_r'];?>"/>
										</td>
									</tr>
									<tr>
										<th>Lugar de trabajo</th>
										<th>Tel&eacute;no Laboral</th>
									</tr>
									<tr>
										<td>
											<input
												type="text"
												readonly
												maxlength="11"
												value="<?php echo $datos['lugar_trabajo_r'];?>"/>
										</td>
										<td>
											<input
												type="text"
												readonly
												maxlength="11"
												value="<?php echo $datos['telefono_trabajo_r'];?>"/>
										</td>
									</tr>
									<tr colspan="2">
										<th colspan="2">
											<a href="../Personal_Autorizado/consultar_reg_P.php?cedula_r=<?php echo $datos['cedula_r'];?>">
												VER MAS
											</a>
										</th>
									</tr>
								</form>
								</table>
							<?php else: ?>
								<table class="tabla-consulta" id="tabla-consulta-representante">
									<tr>
										ADVERTENCIA
									</tr>
									<tr>
										ESTE ALUMNO NO POSEE REPRESENTANTE ASOCIADO, FAVOR ACTUALIZAR
									</tr>
									<tr>
										<a href="#">ACTUALIZAR</a>
									</tr>
								</table>
							<?php endif ?>

				<div>
					<span>
						<a href="#">Informacion completa de la madre.</a>
					</span>
					|
					<span>
						<?php
							if (isset($reg['cedula'])) {
								$cedula_a = $reg['cedula'];
							} else {
								$cedula_a = $reg['cedula_escolar'];
							}

						?>
						<a href="../Personal_Autorizado/consultar_P.php?cedula_a=<?php echo $cedula_a ?>">Informacion de todos los allegados de este alumno.</a>
					</span>
				</div>

					<h2 align="center">DIRECCI&Oacute;N</h2>
						<table>
							<tr>
								<th>Estado</th>
								<th>Municipio</th>
								<th>Parroquia</th>
							</tr>
							<tr>
								<td>
									<input type="text" size="10" readonly value="<?php echo $reg['estado'];?>"/>
								</td>
								<td>
									<input type="text" size="25" readonly value="<?php echo $reg['municipio'];?>"/>
								<td>
									<input type="text" size="30" readonly value="<?php echo $reg['parroquia'];?>"/>
							</tr>
							<tr>
								<th>Direcci&oacute;n</th>
							</tr>
							<tr>
								<td colspan="3">
									<textarea
										maxlenght="150"
										cols="105"
										rows="4"
										readonly
										id="direcc"><?php echo $reg['direccion'];?></textarea>
								</td>
							</tr>
						</table>

					<h2 align="center">PARTIDA DE NACIMIENTO</h2>
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
									maxlength="20" value="<?php echo $reg['repitiente'] == 'n' ? 'No' : 'Si';?>"/>
								</td>
							</tr>
						</table>

					<h2 align="center"> DATOS ANTROPOL&Oacute;GICO</h2>
						<table>
							<tr>
								<th>Discapacidad</th><th>Vacunaci&oacute;n</th>
							</tr>
							<tr>
								<td><input type="text"
											readonly
											maxlength="5"
											size ="5"
											value="<?php echo $reg['discapacidad'];?>"/>
								</td>
								<td>
									<input type="text"
											readonly
											maxlength="5"
											size ="5"
											value="<?php echo $reg['certificado_vacuna'];?>"/>
								</td>
							</tr>
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
								<td>
									<?php
										$query = "SELECT descripcion from talla where codigo = $reg[camisa];";
										$resultado = conexion($query);
										$datos = mysqli_fetch_assoc($resultado);
									?>
									<input
										type="text"
										readonly
										size ="4"
										value="<?php echo $datos['descripcion'];?>"/>
								</td>
								<td>
									<?php
										$query = "SELECT descripcion from talla where codigo = $reg[pantalon];";
										$resultado = conexion($query);
										$datos = mysqli_fetch_assoc($resultado);
									 ?>
									<input
										type="text"
										readonly
										size ="4"
										value="<?php echo $datos['descripcion'];?>"/>
								</td>
								<td>
									<input
										type="text"
										readonly
										maxlength="2"
										size ="4"
										value="<?php echo $reg['zapato'];?>"/>
								</td>
							</tr>
							<tr>
							</tr>
							<tr align="center">
								<td>
									<input type="button" name="enviar_btn" value="Editar" Id="enviar"/>
								</td>
							</tr>
						</table>

			</form>
			<?php $validacionCA = enlaceDinamico("java/validacionCA.js"); ?>
			<script type="text/javascript" src="<?php echo $validacionCA ?>"></script>
		</div>
	</div>
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
finalizarPagina();
