<?php
if(!isset($_SESSION)){ 
	session_start(); 
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1);
if (isset($_GET['cedula_r'])): ?>
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
		alumno.p_apellido as p_apellido_a,
		alumno.s_apellido as s_apellido_a,
		alumno.p_nombre as p_nombre_a,
		alumno.s_nombre as s_nombre_a
		from obtiene
		inner join personal_autorizado
		on obtiene.cod_p_a = personal_autorizado.codigo
		inner join alumno
		on obtiene.cod_alu = alumno.codigo
		where personal_autorizado.cedula = $cedula_r
		order by alumno.codigo;";
		$resultado = conexion($query);

		if ($resultado->num_rows <> 0) :
			$datos = mysqli_fetch_assoc($resultado);
			var_dump($datos);
			// while ($datos = mysqli_fetch_array($resultado)) {
				
			// }
		else:
			echo "if rows";
		endif;?>
	<?php else: ?>
		cedula no 8
	<?php endif ?>
	
<?php else: ?>
	cedula not set
<?php endif ?>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>