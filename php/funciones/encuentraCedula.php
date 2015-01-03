<?php
/**
 * @author Alejandro Granadillo <[Papaito candal.]>
 *
 * [encuentraCedula esta funcion sirve para encontrar un enlace
 * que sirva para consultar a un registro (usuario/alumno/personalAutoriza)]
 *
 * {@internal esta funcion creada a partir de java/cedula.php}
 *
 * @see alumno/form_act_A.php
 *
 * @param  mixed $cedula_x cedula a consultar
 * @return mixed           regresa un enlace o nulo si no existe en sistema.
 *
 * @version 1.1
 */
function encuentraCedula($cedula_x = 0){
  // chequeo basico
  if ( $cedula_x and preg_match( "/[0-9]{6,8}/", $cedula_x) ) :
    $enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
    require_once($enlace);
    $cedula = ChequearGenerico::cedula($cedula_x);
    // empieza:
    $query = "SELECT persona.cedula
    from persona
    inner join personal_autorizado
    on personal_autorizado.cod_persona = persona.codigo
    where persona.cedula = $cedula;";
    $resultado = conexion($query);
    // si consigue algo, bota el resultado como un enlace a consultar PA
    if ($resultado->num_rows <> 0):
      $cedula = ChequearGenerico::cedula($cedula_x, 1);
      $consultar_P = enlaceDinamico("personalAutorizado/consultar_P.php?tipo=1&informacion=$cedula");
      return $consultar_P;
    endif;
    // si no entonces sigue y repite para los otros tipos:
    $query = "SELECT persona.cedula
    from persona
    inner join alumno
    on alumno.cod_persona = persona.codigo
    where persona.cedula = $cedula;";
    $resultado = conexion($query);
    if ($resultado->num_rows <> 0):
      $cedula = ChequearGenerico::cedula($cedula_x, 1);
      $consultar_A = enlaceDinamico("alumno/consultar_A.php?tipo=1&informacion=$cedula");
      return $consultar_A;
    endif;
    $query = "SELECT persona.cedula, personal.tipo_personal
    from persona
    inner join personal
    on personal.cod_persona = persona.codigo
    where persona.cedula = $cedula;";
    $resultado = conexion($query);
    if ($resultado->num_rows <> 0):
      $datos = mysqli_fetch_assoc($resultado);
      $enlace = "usuario/consultar_U.php?tipo=1&informacion=$datos[cedula]&tipo_personal=$datos[tipo_personal]";
      $consultar_PI = enlaceDinamico("$enlace");
      return $consultar_PI;
    endif;
  // si la cédula es invalida:
  else :
    return false;
  endif;
}
