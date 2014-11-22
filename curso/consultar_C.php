<?php
/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 *
 * {@internal [si tienen dudas sobre este archivo
 * pregunten, no es tan dificil, solo sigan el flujo del
 * mismo, esta tabla trae tanto a los cursos con y sis docentes
 * y a los alumnos de cursos.]}
 *
 * @version [1.1]
 */
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

if ( isset($_POST['tipo']) ) :
	if ($_POST['tipo'] === '1') :
		// cursos existentes por docente
		$query = "SELECT
			asume.codigo as Codigo,
			curso.descripcion as 'Descripcion de curso',
			periodo_academico.descripcion 'Periodo Academico',
			asume.comentarios as 'Comentarios',
			persona.p_apellido as 'Primer Apellido',
			persona.p_nombre as 'Primer Nombre',
			persona.cedula as 'Cedula'
			from asume
			inner join periodo_academico
			on asume.periodo_academico = periodo_academico.codigo
			inner join curso
			on asume.cod_curso = curso.codigo
			inner join personal
			on asume.cod_docente = personal.codigo
			inner join persona
			on personal.cod_persona = persona.codigo
			where asume.status = 1
			order by
			periodo_academico.codigo,
			curso.codigo,
			persona.p_apellido;";
	elseif ($_POST['tipo'] === '2') :
		// cursos existentes sin docentes
		$query = "SELECT
			asume.codigo as 'Codigo',
			curso.descripcion as 'Descripcion de curso',
			periodo_academico.descripcion as 'Periodo Academico',
			asume.comentarios as 'Comentarios'
			from asume
			inner join periodo_academico
			on asume.periodo_academico = periodo_academico.codigo
			inner join curso
			on asume.cod_curso = curso.codigo
			where asume.status = 1
			order by
			periodo_academico.codigo,
			curso.codigo;";
	elseif ($_POST['tipo'] === '3') :
		// alumnos existentes por curso
		if (isset($_POST['curso'])) :
			$conexion = conexion();
			$curso = mysqli_escape_string($conexion, trim($_POST['curso']) );
		else :
			header('Location: menucon.php?error=curso&valor='.$_POST['curso']);
		endif;
		$query = "SELECT
			asume.codigo as 'Codigo',
			curso.descripcion as 'Descripcion de curso',
			periodo_academico.descripcion as 'Periodo Academico',
			persona.p_apellido as 'Primer Apellido',
			persona.p_nombre as 'Primer Nombre',
			persona.cedula as 'Cedula',
			COUNT(curso.descripcion) as 'Total de alumnos'
			from asume
			inner join periodo_academico
			on asume.periodo_academico = periodo_academico.codigo
			inner join curso
			on asume.cod_curso = curso.codigo
			inner join alumno
			on alumno.cod_curso = curso.codigo
			inner join persona
			on alumno.cod_persona = persona.codigo
			where asume.status = 1 and asume.cod_curso = $curso
			group by
			3,2,1,4,5,6;";
	else:
		header('Location: menucon.php?error=tipo&valor='.$_POST['tipo']);
	endif;
	$resultado = conexion($query);?>
	<div id="contenido">
		<div id="blancoAjax">
			<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
			<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
			<div class="contenido">
				<div class="info">
					<p>
						Consulta exitosa! para actualizar un registro,
						 puede darle a los botones que aparece al lado de los registros.
					</p>
				</div>
				<table>
					<?php $titulo = mysqli_fetch_assoc($resultado); ?>
					<thead>
						<?php if ($titulo): ?>
							<?php foreach ($titulo as $campo => $valor): ?>
								<th>
									<?php echo $campo ?>
								</th>
							<?php endforeach ?>
						<?php else: ?>
							<th>Sin resultados</th>
						<?php endif ?>
					</thead>
					<tbody>
						<?php $resultado = conexion($query); ?>
						<?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
							<?php if ($_POST['tipo'] === '1'): // cursos con docente?>
								<tr>
									<td>
										<?php echo $datos['Codigo'] ?>
									</td>
									<td>
										<?php echo $datos['Descripcion de curso'] ?>
									</td>
									<td>
										<?php echo $datos['Periodo Academico'] ?>
									</td>
									<td>
										<?php echo $datos['Comentarios'] ?>
									</td>
									<td>
										<?php echo $datos['Primer Apellido'] ?>
									</td>
									<td>
										<?php echo $datos['Primer Nombre'] ?>
									</td>
									<td>
										<?php echo $datos['Cedula'] ?>
									</td>
									<td>
										<a href="../usuario/actualizar_U.php?informacion=<?php echo $datos['Cedula'] ?>">
											<button>Actualizar Docente</button>
										</a>
									</td>
									<td>
										<a href="actualizar_C.php?codigo=<?php echo $datos['Codigo'] ?>">
											<button>Actualizar Curso</button>
										</a>
									</td>
								</tr>
							<?php elseif ($_POST['tipo'] === '2'): //curso sin docente ?>
								<tr>
									<td>
										<?php echo $datos['Codigo'] ?>
									</td>
									<td>
										<?php echo $datos['Descripcion de curso'] ?>
									</td>
									<td>
										<?php echo $datos['Periodo Academico'] ?>
									</td>
									<td>
										<?php echo $datos['Comentarios'] ?>
									</td>
									<td>
										<a href="actualizar_C.php?codigo=<?php echo $datos['Codigo'] ?>">
											<button>Actualizar Curso</button>
										</a>
									</td>
								</tr>
							<?php elseif ($_POST['tipo'] === '3'): //alumnos por curso ?>
								<tr>
									<td>
										<?php echo $datos['Codigo'] ?>
									</td>
									<td>
										<?php echo $datos['Descripcion de curso'] ?>
									</td>
									<td>
										<?php echo $datos['Periodo Academico'] ?>
									</td>
									<td>
										<?php echo $datos['Primer Apellido'] ?>
									</td>
									<td>
										<?php echo $datos['Primer Nombre'] ?>
									</td>
									<td>
										<?php echo $datos['Cedula'] ?>
									</td>
									<td>
										<?php echo $datos['Total de alumnos'] ?>
									</td>
									<td>
										<a href="../alumno/actualizar_A.php?cedula=<?php echo $datos['Cedula'] ?>">
											<button>Actualizar Alumno</button>
										</a>
									</td>
									<td>
										<a href="actualizar_C.php?codigo=<?php echo $datos['Codigo'] ?>">
											<button>Actualizar Curso</button>
										</a>
									</td>
								</tr>
							<?php endif ?>
						<?php endwhile; ?>
					</tbody>
				</table>
				<div class="info">
					<p>
						Realizar <a href="menucon.php">otra consulta.</a>
					</p>
					<p>
						Regresar al <a href="../index.php">menu principal.</a>
					</p>
				</div>
			</div>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
	<?php finalizarPagina(); ?>

<?php else :
	header('Location: menucon.php?error=vacio');
endif;
?>
