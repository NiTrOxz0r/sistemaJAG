<?php
/**
 * @author [Alejandro Granadillo]
 *
 * @internal esto es usado para saber
 * cuantos alumnos hay en un determinado curso.
 *
 * @internal transformado a json para ajax.
 *
 * @see
 * alumno/form_act_A.php
 * @example
 * alumno/form_act_A.php
 */
if ( isset($_POST['codigo']) ) :
  if (preg_match( "/[0-9]+/", $_POST['codigo'])):
    $enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
    require_once($enlace);
    $con = conexion();
    $codigo = mysqli_escape_string($con, $_POST['codigo']);
    // para la fecha de periodo_academico
    $fecha = date('Y');
    $query = "SELECT count(alumno.codigo) as total FROM alumno
    inner join asume
    on alumno.cod_curso = asume.codigo
    inner join periodo_academico
    on asume.periodo_academico = periodo_academico.codigo
    where asume.cod_curso = $codigo
    and periodo_academico.descripcion like '$fecha-%';";
    $consulta = conexion($query);
    $datos = mysqli_fetch_assoc($consulta);
    // http://nz.php.net/json_encode
    // regresa datos en forma de json
    // ej: {total:x}
    echo json_encode($datos);
    mysqli_close($con);
  else:
    $datos = array('error' => 'Ups! algo inesperado ha ocurrido.');
    echo json_encode($datos);
  endif;
else:
  $datos = array('error' => 'Ups! algo inesperado ha ocurrido.');
  echo json_encode($datos);
endif;
