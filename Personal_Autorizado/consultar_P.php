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
				<?php if ( preg_match( "/[0-9]{8}/", $_REQUEST['cedula_r']) ):
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
								<p>
									Alumnos relacionados con:
									<?php echo $datos['p_apellido_r']; ?>,
									<?php echo $datos['p_nombre_r']; ?>
									<a href="../Personal_Autorizado/consultar_reg_P.php?cedula_r=<?php echo $datos['cedula_r'];?>">
										<button>
											Ver informacion detallada
										</button>
									</a>
								</p>
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
										<a href="../alumno/form_act_A.php?cedula=<?php echo $datos['cedula'];?>">
											<button>
												Editar
											</button>
										</a>
									</td>
								</tbody>
							</table>
						<?php endwhile;?>
						<div>
							<p>
								<a href="../alumno/form_reg_A.php?cedula_r=<?php echo $cedula_r;?>">
									<button>
										Agregar a un Alumno Relacionado con este representante.
									</button>
								</a>
							</p>
							<p>
								<a href="#">
									<button>
										Agregar un familiar o personal autorizado que pueda retirar al alumno.
									</button>
								</a>
							</p>
							<p>
								<button disabled>
									Culminar el proceso de inscripcion (GENERACION DE REPORTE; ETC!!)
								</button>
							</p>
						</div>
					<?php	else:?>
						<?php $query = "SELECT
						persona.p_apellido,
						persona.p_nombre,
						persona.cedula
						from persona
						inner join personal_autorizado
						on personal_autorizado.cod_persona = persona.codigo
						where persona.cedula = $cedula_r";
						$resultado = conexion($query); ?>
						<?php if ($resultado->num_rows <> 0): ?>
							<p>
								La cedula <strong><?php echo $cedula_r ?></strong>
								no tiene ninguna relacion con ningun alumno!
							</p>
							<p>
								<a href="form_act_P.php?cedula_r=<?php echo $cedula_r ?>">
									Actualizar datos referentes a esta cedula
								</a>
							</p>
						<?php else: ?>
							<p>
								La cedula <strong><?php echo $cedula_r ?></strong>
								no se encuentra registrada en el sistema!
							</p>
							<p>
								Por favor realice el proceso de inscripcion para esta persona.
							</p>
						<?php endif ?>
					<?php	endif;?>
				<?php else: ?>
					<span>
						Error, cedula Incorrecta!
					</span>
					<p>
						<a href="menucon.php">Intente nuevamente.</a>
					</p>
				<?php endif ?>
			<?php else: ?>
				<span>
					Error, cedula Incorrecta!
				</span>
				<p>
					<a href="menucon.php">Intente nuevamente.</a>
				</p>
			<?php endif ?>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
