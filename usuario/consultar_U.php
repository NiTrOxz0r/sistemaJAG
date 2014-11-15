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
	and isset($_POST['tabla']) ) :
	if ($_POST['tabla'] === '1') :
		$valor = $_POST['informacion'];
		if ($_POST['tipo'] === '1') :
			$where = "WHERE docente.cedula = '$valor'";
		elseif ($_POST['tipo'] === '2') :
			$where = "WHERE docente.p_nombre LIKE '%$valor%' or docente.s_nombre LIKE '%$valor%' ";
		elseif ($_POST['tipo'] === '3') :
			$where = "WHERE docente.p_apellido LIKE '%$valor%' or docente.s_apellido LIKE '%$valor%'";
		elseif ($_POST['tipo'] === '4') :
			$where = "WHERE docente.cod_cargo = $valor";
		elseif ($_POST['tipo'] === '5') :
			$where = "where docente.status = 0 or docente.status = 1";
		else :
			header('Location: menucon.php?error=tipo&q='.$_POST['tipo']);
		endif;
		$query = "SELECT 
		docente.p_apellido,
		docente.p_nombre,
		docente.cedula,
		docente.celular,
		docente.telefono,
		docente.email,
		cargo.descripcion,
		curso.descripcion,
		usuario.seudonimo,
		tipo_usuario.descripcion,
		docente.status,
		usuario.status
		from docente
		inner join cargo
		on docente.cod_cargo = cargo.codigo
		inner join asume
		on docente.codigo = asume.cod_docente
		inner join curso
		on asume.codigo = curso.codigo
		inner join usuario
		on docente.cod_usr = usuario.codigo
		inner join tipo_usuario
		on usuario.cod_tipo_usr = tipo_usuario.codigo
		$where
		order by 
		docente.p_apellido, 
		usuario.seudonimo,
		tipo_usuario.descripcion;";
	else:
		$valor = $_POST['informacion'];
		$tabla = $_POST['tabla'];
		if ($_POST['tipo'] === '1') :
			$where = "WHERE $tabla.cedula = '$valor'";
		elseif ($_POST['tipo'] === '2') :
			$where = "WHERE $tabla.p_nombre LIKE '%$valor%' or $tabla.s_nombre LIKE '%$valor%' ";
		elseif ($_POST['tipo'] === '3') :
			$where = "WHERE $tabla.p_apellido LIKE '%$valor%' or $tabla.s_apellido LIKE '%$valor%'";
		elseif ($_POST['tipo'] === '4') :
			$where = "WHERE $tabla.cod_cargo = $valor";
		elseif ($_POST['tipo'] === '5') :
			$where = "where $tabla.status = 0 or $tabla.status = 1";
		else :
			header('Location: menucon.php?error=tipo&q='.$_POST['tipo']);
		endif;
		$query = "SELECT 
		$tabla.p_apellido,
		$tabla.p_nombre,
		$tabla.cedula,
		$tabla.celular,
		$tabla.telefono,
		$tabla.email,
		cargo.descripcion,
		usuario.seudonimo,
		tipo_usuario.descripcion,
		$tabla.status,
		usuario.status
		from $tabla
		inner join cargo
		on $tabla.cod_cargo = cargo.codigo
		inner join usuario
		on $tabla.cod_usr = usuario.codigo
		inner join tipo_usuario
		on usuario.cod_tipo_usr = tipo_usuario.codigo
		$where
		order by 
		$tabla.p_apellido, 
		usuario.seudonimo,
		tipo_usuario.descripcion;";
	endif;
	$resultado = conexion($query,1); ?>


	<div id="contenido">
		<div id="blancoAjax">
			<!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
			<!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
			<div class="contenido">


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

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
<?php else: ?>
	<?php header('Location: menucon.php?error=vacio'); ?>
<?php endif; ?>