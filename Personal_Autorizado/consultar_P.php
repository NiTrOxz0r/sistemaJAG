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
		<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
		<?php if (isset($_GET['cedula_r'])): ?>
			<?php $cedula_r = trim($_GET['cedula_r']) ?>
			<?php if (strlen($cedula_r) == 8):
				$con = conexion();
				$cedula_r = mysqli_escape_string($con, $cedula_r);

				//buscamos los alumnos que esten relacionados
				//con este representante
				$query = "SELECT 
				personal_autorizado.codigo as codigo_r,
				personal_autorizado.p_apellido as p_apellido_r,
				personal_autorizado.s_apellido as s_apellido_r,
				personal_autorizado.p_nombre as p_nombre_r,
				personal_autorizado.s_nombre as s_nombre_r,
				alumno.codigo as codigo_a,
				alumno.cedula as cedula_a,
				alumno.cedula_escolar as cedula_escolar_a,
				curso.descripcion as curso_a,
				alumno.p_apellido as p_apellido_a,
				alumno.s_apellido as s_apellido_a,
				alumno.p_nombre as p_nombre_a,
				alumno.s_nombre as s_nombre_a
				from obtiene
				inner join personal_autorizado
				on obtiene.cod_p_a = personal_autorizado.codigo
				inner join alumno
				on obtiene.cod_alu = alumno.codigo
				inner join curso
				on alumno.cod_curso = curso.codigo
				where personal_autorizado.cedula = $cedula_r
				order by alumno.codigo;";
				$resultado = conexion($query);?>

				<?php if ($resultado->num_rows <> 0) :?>
					
					<?php $unaVez = true; ?>
					<?php	while ($datos = mysqli_fetch_array($resultado)) : ?>

						<?php if ($unaVez): ?>						
							<span>
								Alumnos relacionados con: 
								<?php echo $datos['p_apellido_r']; ?>,
								<?php echo $datos['p_nombre_r']; ?>
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
									Primer Apellido
								</th>
								<th>
									Segundo Apellido
								</th>
								<th>
									Cedula
								</th>
								<th>
									Cedula Escolar
								</th>
								<th>
									Curso Asignado
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
									<?php echo $datos['cedula_a']; ?>
								</td>
								<td>
									<?php echo $datos['cedula_escolar_a']; ?>
								</td>
								<td>
									<?php echo $datos['curso_a']; ?>
								</td>
								<td>
									<a href="#">
										<button>Editar</button>
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
						No existe(n) Alumno(s) relacionado(s) con: 
						<?php echo $datos['p_apellido_r']; ?>,
						<?php echo $datos['p_nombre_r']; ?>
					</span>
			<?php	endif;?>
			<?php else: ?>
				<span>
					Error, cedula Incorrecta, intente nuevamente
				</span>
				<p>
					<a href="#">A DONDE TIENE QUE IR...</a>
				</p>
			<?php endif ?>
			
		<?php elseif(isset($_GET['cedula_a'] or isset($_GET['cedula_escolar_a'])): ?>
			<?php if (isset($_GET['cedula_a']): ?>
				<?php $cedula_a = trim($_GET['cedula_a']); ?>
			<?php else: ?>
				<?php $cedula_a = trim($_GET['cedula_escolar_a']); ?>
			<?php endif ?>
			<?php if (strlen($cedula_a) == 8):
				$con = conexion();
				$cedula_a = mysqli_escape_string($con, $cedula_a);?>
				continuar...
		<?php else: ?>
			<span>
					Error, cedula Incorrecta, intente nuevamente
				</span>
				<p>
					<a href="#">A DONDE TIENE QUE IR...</a>
				</p>
		<?php endif ?>
		<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
	</div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>