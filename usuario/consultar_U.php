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
		if ($_POST['tipo'] === '1') :
			
			$tabla = $_POST['tabla'];
			$campo = 'cedula';
			$valor = $_POST['informacion'];
			$where = "where docente.status = 0 or docente.status = 1";
		else :
			header('Location: consultar_P?error=tipo&q=undefined');
		endif;
	endif;
	

	if ($_POST['informacion'] == 'status') :
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
		where docente.status = 0 or docente.status = 1
		order by 
		docente.p_apellido, 
		usuario.seudonimo,
		tipo_usuario.descripcion;";
		$resultado = conexion($query);
	else if ($_POST['tipo'] == '1') :
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
		where docente.status = 1 or docente.status = 0
		order by 
		docente.p_apellido, 
		usuario.seudonimo,
		tipo_usuario.descripcion;";
		$resultado = conexion($query);
	else:

	endif;?>

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

<?php elseif( isset($_POST['informacion_lista']) ) : ?>

<?php else: ?>

<?php endif; ?>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
