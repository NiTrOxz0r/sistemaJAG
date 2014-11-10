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
				$resultado = conexion($query);:?>

				<?php if ($resultado->num_rows <> 0) :?>

					<span>
						Alumnos relacionados con:
					</span>

					<?php	while ($datos = mysqli_fetch_array($resultado)) : ?>

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
							</tbody>
						</table>
						
					<?php endwhile;
				else:
					echo "if rows";
				endif;?>
			<?php else: ?>
				cedula no 8
			<?php endif ?>
			
		<?php else: ?>
			cedula not set
		<?php endif ?>
		<!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
	</div>
</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>