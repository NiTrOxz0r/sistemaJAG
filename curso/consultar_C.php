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

if ( isset($_POST['tipo']) and isset($_POST['curso']) ) :
	if ($_POST['tipo'] === '1') :
		$queryDocentes = "SELECT
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
		$querySinDocentes = "SELECT
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
	else :
		//codigo...
	endif;
else :
	header('Location: menucon.php?error=vacio');
endif;
?>
