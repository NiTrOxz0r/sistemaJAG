<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario();

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina();

if ( isset($_POST['tipo']) ) :
	if ($_POST['tipo'] === '1') :
		$query = "SELECT
			asume.codigo,
			curso.descripcion,
			periodo_academico.descripcion,
			asume.comentarios,
			persona.cedula,
			persona.p_apellido,
			persona.p_nombre
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
		$query = "SELECT
			asume.codigo,
			curso.descripcion,
			periodo_academico.descripcion,
			asume.comentarios
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
		if (isset($_POST['curso'])) :
			$conexion = conexion();
			$curso = mysqli_escape_string($conexion, trim($_POST['curso']) );
		else :
			header('Location: menucon.php?error=curso&valor='.$_POST['curso']);
		endif;
		$query = "SELECT
			asume.codigo,
			curso.descripcion,
			periodo_academico.descripcion,
			persona.p_apellido,
			persona.p_nombre,
			persona.cedula,
			COUNT(curso.descripcion) as total
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
				<p>
				<?php $datos = mysqli_fetch_assoc($resultado); ?>
					<?php foreach ($datos as $key => $value): ?>
						<p>
							<?php echo $key ?>
						</p>
						<p>
							<?php echo $value ?>
						</p>
					<?php endforeach ?>
				</p>
				<table>
					<thead>

					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
		</div>
	</div>
	<?php finalizarPagina(); ?>

<?php else :
	header('Location: menucon.php?error=vacio');
endif;
?>
