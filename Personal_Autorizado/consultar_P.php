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
<div id="contenido">
	<div id="blancoAjax">
		<div class="contenido">
			<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->

			<?php if (isset($_GET['cedula_r'])): ?>
				<?php $cedula_r = trim($_GET['cedula_r'])?>
				<?php if (strlen($cedula_r) == 8):
					$con = conexion();
					$cedula_r = mysqli_escape_string($con, $cedula_r);

					//buscamos los alumnos que esten relacionados
					//con este representante
					$query = "SELECT persona.nacionalidad as nacionalidad_a,
					persona.cedula as cedula,
					alumno.cedula_escolar as cedula_escolar_a,
					persona.p_nombre as p_nombre_a,
					persona.s_nombre as s_nombre_a,
					persona.p_apellido as p_apellido_a,
					persona.s_apellido as s_apellido_a,
					representante.cedula as cedula_r,
					representante.p_nombre as p_apellido_r,
					representante.p_apellido as p_nombre_r  from alumno
					inner join persona on (alumno.cod_persona = persona.codigo),
					personal_autorizado inner join persona as representante on
					(personal_autorizado.cod_persona = representante.codigo)
					where personal_autorizado.codigo=alumno.cod_representante
					and representante.cedula = '$cedula_r';";

					$resultado = conexion($query);?>

					<?php if ($resultado->num_rows <> 0) :?>
						<?php $unaVez = true; ?>
						<?php	while ($datos = mysqli_fetch_array($resultado)) : ?>

							<?php if ($unaVez): ?>
								<span>
									Alumnos relacionados con:
									<?php echo $datos['p_apellido_r']; ?>,
									<?php echo $datos['p_nombre_r']; ?>
									<a href="../Personal_Autorizado/consultar_reg_P.php?cedula_r=<?php echo $datos['cedula_r'];?>">
												Editar
											</a>
								</span>
							<?php endif; $unaVez = false; ?>
							<table>
								<thead>
									<th>
										Primer Apellido
									</th>
									<th>
										Segundo Apellido
									</th>
									<th>
										Primer Nombre
									</th>
									<th>
										Segundo Nombre
									</th>
									<th>
										Cedula
									</th>
									<th>
										Cedula Escolar
									</th>
								</thead>
								<tbody>
									<td>
										<?php echo $datos['p_apellido_a']; ?>
									</td>
									<td>
										<?php echo $datos['s_apellido_a']; ?>
									</td>
									<td>
										<?php echo $datos['p_nombre_a']; ?>
									</td>
									<td>
										<?php echo $datos['s_nombre_a']; ?>
									</td>
									<td>
										<?php echo $datos['nacionalidad_a']."-".$datos['cedula']; ?>
									</td>
									<td>
										<?php echo $datos['cedula_escolar_a']; ?>
									</td>
									<td>
										<a href="../alumno/actualizar_A.php?cedula=<?php echo $datos['cedula'];?>">
											Editar
										</a>
									</td>
								</tbody>
							</table>
						<?php endwhile;?>
						<div>
							<p>
								Agregar otro alumno relacionado con este representante.
							</p>
							<p>
								Agregar un familiar o personal autorizado que pueda retirar al alumno.
							</p>
							<p>
								Culminar el proceso de inscripcion (GENERACION DE REPORTE; ETC!!)
							</p>
						</div>
					<?php	else:?>
							<span>
								La cedula <strong><?php echo $cedula_r ?></strong>
								no tiene ninguna relacion con ningun alumno!
							</span>
							<p>
								<a href="#">Actualizar datos referentes a esta cedula</a>
								</br>
								<a href="#">ver relaciones de esta cedula</a>
							</p>
					<?php	endif;?>
				<?php else: ?>
					<span>
						Error, cedula Incorrecta, intente nuevamente
					</span>
					<p>
						<a href="#">A DONDE TIENE QUE IR...</a>
					</p>
				<?php endif ?>
			<?php else: ?>
				<span>
						Error, cedula Incorrecta, intente nuevamente
					</span>

			<?php endif ?>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
