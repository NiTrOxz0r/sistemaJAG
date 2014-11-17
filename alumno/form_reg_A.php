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
<div id="blancoAjax">
	<div align="center">
		<form action="insertar_A.php" method="POST" name="form_alu" id="form">
		
				<h1 align="center">REGISTRO DE ALUMNO</h1>
				
					<h2 align="center">DATOS PERSONALES</h2>
						<table>
							<tr>
								<td colspan=2>Entre la informaci&oacute;n:<br>
								<sup>(<font color="#ff0000">*</font> indica campo obligatorio).</sup></td>
							</tr>
							<tr>
								<th>C&eacute;dula</th>
								<th>C&eacute;dula Escolar</th>
								<th>Representante (cedula):</th>
							</tr>
							<tr>
								<td align="left">
									<!--http://www.w3schools.com/tags/tag_select.asp-->
									<select name="nacionalidad" id="nacionalidad" required>
										<option value="v">V</option>
										<option value="e">E</option>
									</select>
									<input type="text"  maxlength="8" name="cedula" id="cedula" required>
									<font color="#ff0000">*</font>
								</td>
								<td>
									<input 
										type="text" 
										maxlength="10" 
										name="cedula_escolar" 
										id="cedula_escolar"/>
								</td>
								<td>
									<input 
										type="text"  
										maxlength="8" 
										name="codigo_r" 
										id="codigo_r"
										required
										disabled
										hidden>
									<input 
										type="text"  
										maxlength="8" 
										name="cedula_r" 
										id="cedula_r"
										required
										disabled>
								</td>
							</tr>
							<tr>
								<th>Primer Nombre</th>
								<th>Segundo Nombre</th>
								<th>Apellido, Nombre:</th>
							</tr>
							<tr>
								<td>
									<input 
										type="text" 
										maxlength="20" 
										name="p_nombre" 
										id="p_nombre" 
										required/>
									<font color="#ff0000">*</font>
								</td>
								<td>
									<input type="text" maxlength="20" name="s_nombre" id="s_nombre"/>
								</td>
								<td>
									<input 
										type="text" 
										maxlength="20" 
										disabled 
										name="p_nombre_r" 
										id="p_nombre_r"/>
								</td>
							</tr>
							<tr>
								<th>Primer Apellido</th>
								<th>Segundo Apellido</th>
								<th>Relacion (Representante)</th>
							</tr>
							<tr>
								<td>
									<input 
										type="text" 
										maxlength="20" 
										name="p_apellido" 
										id="p_apellido" 
										required/>
									<font color="#ff0000">*</font>
								</td>
								<td>
									<input type="text" maxlength="20" name="s_apellido" id="s_apellido"/>
								</td>
								<td>
									<select required disabled name="parentesco_r" id="parentesco_r">
										<option selected="selected">
											Seleccione
										</option>
									</select>
								</td>
							</tr>
							<tr>
								<th>Sexo</th><th>Fecha de Nacimiento</th><th>Lugar de Nacimiento</th>
							</tr>
							<tr>
								<td>
									<?php
										// este query puede mejorar:
										// $sql="select * from sexo";
										// $registros=mysql_query($sql,$conn) or die("Problemas en el select:".mysql_error());
										$query = "SELECT codigo, descripcion from sexo where status = 1;";
										$registros = conexion($query);
									?>
									<select name="sexo" id="sexo" required>
										<option value="">Seleccione una opci&oacute;n </option>
										<?php	while($fila = mysqli_fetch_array($registros)) : ?>
											<option value="<?php echo $fila['codigo']; ?>"><?php echo $fila['descripcion']; ?></option>
										<?php endwhile; ?>
									</select><font color="#ff0000">*</font>
								</td>
									<td>
										<input
											type="date"
											name="fec_nac"
											id="fec_nac"
											required/>
									</td>
								<td colspan="2">
									<?php

										// ESTO ES INNECESARIO PORQUE LUG_NAC NO ESTA EN ESTADO
										// ESTA EN LA TABLA ALUMNO:

										// este query puede mejorar:
										// $sql="select * from estado order by descripcion";
										// $registros=mysql_query($sql,$conn) or die("Problemas en el select:".mysql_error());
										// $query = "SELECT codigo, descripcion from estado where status = 1 order by descripcion;";
										// $registros = conexion($query);
									?>
									<!--http://www.w3schools.com/tags/tag_textarea.asp-->
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
								<th>Tel&eacute;fono</th><th> Tel&eacute;no Celular</th>
							</tr>
							<tr>
								<td>
									<input
										type="text"
										maxlength="11"
										name="telefono"
										id="telefono"/>
								</td>
								<td>
									<input
										type="text"
										maxlength="11"
										name="telefono_otro"
										id="telefono_otro"/>
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
									</select><font color="#ff0000">*</font>
								</td>
								<td>
									<select name="cod_parro" id="cod_parro">
										<option value="">--Seleccionar--</option>
										</select><font color="#ff0000">*</font>
								</td>
							</tr>
							<tr>
								<th>Direcci&oacute;n<font color="#ff0000">*</font></th>
							</tr>
							<tr>
								<td colspan="3">
									<!--maxlenght = "150" porque es el numero maximo del varchar dentro de direccion alumno-->
									<textarea
										maxlenght="150"
										cols="50"
										rows="4"
										name="direcc"
										id="direcc"></textarea>
									<!--<input type="text" maxlength="150" size ="50%" name="direcc" id="direcc" />-->
								</td>
							</tr>
						</table>

					<h2 align="center"> Partida de Nacimiento</h2>
						<table>
							<tr align="cr">
								<th colspan="2">Act. N&uacute;m Partida de Nac.</th><td></td>
								<th colspan="3">Act. Folio N&uacute;m.</th><td></td><td></td><th>Plantel de Procedencia</th><th>Repitiente</th>
							</tr>
							<tr align="center">
								<td colspan="2" >
									<input type="text"
									maxlength="8"
									size ="8"
									name="acta_num_part_nac"
									id="acta_num_part_nac"/>
								</td>
								<td></td><td></td>
								<td></td>
								<td colspan="3">
									<input type="text"
									maxlength="8"
									size ="8"
									name="acta_folio_num_part_nac"
									id="acta_folio_num_part_nac"/>
								</td>
								<td>
									<input
									type="text"
									maxlength="20"
									id="plantel_procedencia"
									name="plantel_procedencia"/>
								</td>
								<td><select name="repitiente" id="repitiente" required="required">
										<option value="">Seleccionar</option>
										<option value="n">NO</option>
										<option value="s">SI</option>
										</select><font color="#ff0000">*</font>
								</td>
							</tr>
						</table>

					<h2 align="center"> DATOS ANTROPOL&Oacute;GICO</h2>
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
										id="altura"/>
									<font color="#ff0000">cm</font></td>
								<td>
									<input
										type="number"
										maxlength="3"
										size ="3"
										max="250"
										min="10"
										name="peso"
										id="peso"/>
									<font color="#ff0000">kg</font>
								</td>
							</tr>
							<tr>
								<th>Talla de Camisa</th>
								<th>Talla de Pantal&oacute;n</th>
								<th>N&uacute;m. de Calzado</th>
							</tr>
							<tr align="center">

								<?php
									$query = "SELECT codigo, descripcion from talla where status = 1 order by codigo;";
									$registros = conexion($query);
								?>
								<td>
									<select name="camisa" id="camisa">
										<option selected="selected">
											Seleccionar
										</option>
										<?php while ( $camisa = mysqli_fetch_array($registros) ): ?>
											<option value="<?=$camisa['codigo']; ?>"> <?=$camisa['descripcion']; ?> </option>
										<?php endwhile; ?>
									</select>
								</td>

								<td>
									<?php
										$query = "SELECT codigo, descripcion from talla where status = 1 order by codigo;";
										$registros = conexion($query);
									?>
									<select name="pantalon" id="pantalon">
										<option selected="selected">
											Seleccionar
										</option>
										<?php while ( $pantalon = mysqli_fetch_array($registros) ): ?>
											<option value="<?=$pantalon['codigo']; ?>"> <?=$pantalon['descripcion']; ?> </option>
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
										id="zapato"/>
								</td>
								<!--<td><input type="text" maxlength="2"  size ="4" name="camisa" id="camisa"/></td>
								<td><input type="text" maxlength="2" size ="4" name="pantalon" id="pantalon"/></td>
								<td><input type="text" maxlength="2" size ="4" name="zapato" id="zapato"/></td>-->
							</tr>
						</table>
				
				<br>
		
					<h2><i>Datos Educativos.</i></h2>
					<b>&nbsp;Nivel a Cursar.&nbsp;&nbsp;</b>
					<?php
						// esto puede mejorar:
						// $sql="select * from curso";
						// $registros=mysqli_query($sql,$conn) or die("Problemas en el select:".mysql_error());

						$query = "SELECT codigo, descripcion from curso where status = 1;";
						$registros = conexion($query);
					?>
					<select name="curso" id="curso">
						<option value="">Seleccione una opci&oacute;n</option>
					<?php	while($fila = mysqli_fetch_array($registros)) : ?>
						<option value="<?php echo $fila['codigo']; ?>"><?php echo $fila['descripcion']; ?></option>
					<?php endwhile; ?>
					</select>
					<b>ignorar:</b>
					<select disabled name="" id="">
						<option value="">Seleccione una opci&oacute;n</option>
					</select>
					<b>ignorar:</b>
					<select disabled name="" id="">
						<option value="">Seleccione una opci&oacute;n</option>
					</select>

				<input type="button" name="enviar_btn" value="Enviar" id="enviar"/>
				<input type="button" name="limpiar_btn" value="Reset" id="limpiar"/>
		</form>
	</div>

	<div>
		<p>
			<center>
				<a class="" href="body.php">Volver</a>
			</center>
		</p>
		<p>
			<center>
				<a href="../index.php">Volver al menu</a>
			</center>
		</p>
	</div>
	<!-- calendario -->
	<?php $cssDatepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.css"); ?>
	<link href="<?php echo $cssDatepick ?>" rel="stylesheet">
	<?php $plugin = enlaceDinamico("java/jqDatePicker/jquery.plugin.js"); ?>
	<?php $datepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.js"); ?>
	<script type="text/javascript" src="<?php echo $plugin ?>"></script>
	<script type="text/javascript" src="<?php echo $datepick ?>"></script>
	<!-- validacion -->
	<?php $validacion = enlaceDinamico("java/validacion.js"); ?>
	<script type="text/javascript" src="<?php echo $validacion ?>"></script>
	<!-- ajax de estado -->
	<?php $estado = enlaceDinamico("java/edo.php"); ?>
	<?php $municipio = enlaceDinamico("java/mun.php"); ?>
	<?php $parroquia = enlaceDinamico("java/parro.php"); ?>
	<!-- ajax de estado/mun/par -->
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
</div>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>