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

if ( isset($_POST['informacion'])
	and isset($_POST['tipo'])
	and isset($_POST['tipo_personal']) ) :
	$conexion = conexion();
	//tipo = tipo de consulta
	//tipo_personal = docente, administrador, directivo
	$valor = mysqli_escape_string($conexion, trim($_POST['informacion']));
	if ($_POST['tipo'] === '1') :
		$where = "WHERE persona.cedula = '$valor'";
	elseif ($_POST['tipo'] === '2') :
		$where = "WHERE persona.p_nombre LIKE '%$valor%' or persona.s_nombre LIKE '%$valor%' ";
	elseif ($_POST['tipo'] === '3') :
		$where = "WHERE persona.p_apellido LIKE '%$valor%' or persona.s_apellido LIKE '%$valor%'";
	elseif ($_POST['tipo'] === '4') :
		$where = "WHERE personal.cod_cargo = $valor";
	elseif ($_POST['tipo'] === '5') :
		$where = "where (persona.status = 0 or persona.status = 1) ";
		$where = $where."AND (personal.status = 0 or personal.status = 1)";
	else:
		header('Location: menucon.php?error=tipo&q='.$_POST['tipo']);
	endif;
	if ($_POST['tipo_personal'] === '1') :
		$where = $where." AND personal.tipo_personal = 1";
	elseif ($_POST['tipo_personal'] === '2') :
		$where = $where." AND personal.tipo_personal = 2";
	elseif ($_POST['tipo_personal'] === '3') :
		$where = $where." AND personal.tipo_personal = 3";
	elseif ($_POST['tipo_personal'] === '4') :
		$where = $where." AND personal.tipo_personal = 4";
	elseif ($_POST['tipo_personal'] === '5') :
		$where = $where." AND personal.tipo_personal = 5";
	endif;
	if ($_POST['tipo_personal'] === '3') :
		$query = "SELECT
			persona.p_apellido as p_apellido,
			persona.p_nombre as p_nombre,
			persona.cedula as cedula,
			personal.celular as celular,
			persona.telefono as telefono,
			personal.email as email,
			cargo.descripcion as cargo,
			curso.descripcion as curso,
			usuario.seudonimo as seudonimo,
			tipo_usuario.descripcion as tipo_usuario,
			personal.status as status_d,
			usuario.status as status_u
			from persona
			inner join personal
			on personal.cod_persona = persona.codigo
			inner join cargo
			on personal.cod_cargo = cargo.codigo
			inner join asume
			on personal.codigo = asume.cod_docente
			inner join curso
			on asume.cod_curso = curso.codigo
			inner join usuario
			on personal.cod_usr = usuario.codigo
			inner join tipo_usuario
			on usuario.cod_tipo_usr = tipo_usuario.codigo
			$where
			order by
			persona.p_apellido,
			usuario.seudonimo,
			tipo_usuario.descripcion;";
	elseif ($_POST['tipo_personal'] === '1' or $_POST['tipo_personal'] === '2'
		or $_POST['tipo_personal'] === '4' or $_POST['tipo_personal'] === '5'):
		$query = "SELECT
			persona.p_apellido as p_apellido,
			persona.p_nombre as p_nombre,
			persona.cedula as cedula,
			personal.celular as celular,
			persona.telefono as telefono,
			persona.telefono_otro as telefono_otro,
			personal.email as email,
			cargo.descripcion as cargo,
			usuario.seudonimo as seudonimo,
			tipo_usuario.descripcion as tipo_usuario,
			personal.status as status_d,
			usuario.status as status_u
			from persona
			inner join personal
			on personal.cod_persona = persona.codigo
			inner join cargo
			on personal.cod_cargo = cargo.codigo
			inner join usuario
			on personal.cod_usr = usuario.codigo
			inner join tipo_usuario
			on usuario.cod_tipo_usr = tipo_usuario.codigo
			$where
			order by
			persona.p_apellido,
			usuario.seudonimo,
			tipo_usuario.descripcion;";
	else:
		header('Location: menucon.php?error=tipo&q='.$_POST['tipo_personal']);
	endif;
	$resultado = conexion($query); ?>
	<?php if ($resultado): ?>
		<div id="contenido">
			<div id="blancoAjax">
				<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
				<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
				<div class="contenido">
					<table>
						<?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
							<thead>
								<th>Primer Apellido</th>
								<th>Primer Nombre</th>
								<th>Cedula</th>
							</thead>
							<tbody>
								<td>
									<?php echo $datos['p_apellido'] ?>
								</td>
								<td>
									<?php echo $datos['p_nombre'] ?>
								</td>
								<td>
									<?php echo $datos['cedula'] ?>
								</td>
							</tbody>
							<thead>
								<th>Celular</th>
								<th>Telefono</th>
								<th>Correo electronico</th>
							</thead>
							<tbody>
								<td>
									<?php echo $datos['celular'] ?>
								</td>
								<td>
									<?php echo $datos['telefono'] ?>
								</td>
								<td>
									<?php echo $datos['email'] ?>
								</td>
							</tbody>
							<?php if (isset($datos['curso'])): ?>
								<thead>
									<th>Cargo</th>
									<th>Curso Asociado</th>
								</thead>
								<tbody>
									<td>
										<?php echo $datos['cargo'] ?>
									</td>
									<td>
										<?php echo $datos['curso'] ?>
									</td>
								</tbody>
							<?php else: ?>
								<thead>
									<th>Curso Asociado</th>
									<th>Cargo</th>
									<th>Seudonimo</th>
								</thead>
								<tbody>
									<td>
										<?php echo $datos['telefono_otro'] ?>
									</td>
									<td>
										<?php echo $datos['cargo'] ?>
									</td>
									<td>
										<?php echo $datos['seudonimo'] ?>
									</td>
								</tbody>
							<?php endif ?>
							<thead>
								<th>Tipo usuario</th>
								<th>Estatus personal</th>
								<th>Estatus en sistema</th>
							</thead>
							<tbody>
								<td>
									<?php echo $datos['tipo_usuario'] ?>
								</td>
								<td>
									<?php echo $datos['status_d'] == ('1') ? 'Activo' : 'Inactivo'; ?>
								</td>
								<td>
									<?php echo $datos['status_u'] == ('1') ? 'Activo' : 'Inactivo'; ?>
								</td>
							</tbody>
							<thead>
								<th></th>
							</thead>
							<tbody>
								<td>
									<a href="form_act_PI.php?cedula=<?php echo $datos['cedula'] ?>">
										<button>Actualizar</button>
									</a>
								</td>
							</tbody>
						<?php endwhile; ?>
					</table>
					<div>
						<p>
							para hacer otra consulta
							<a href="menucon.php">presione aqui</a>
						</p>
					</div>
				</div>
				<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
			</div>
		</div>
	<?php endif ?>


<?php
mysqli_close($conexion);
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
<?php else: ?>
	<?php header('Location: menucon.php?error=vacio'); ?>
<?php endif; ?>
