<?php


/**
* @author Granadillo Alejandro.
*
* @internal Genera la conexion requerida a la base de datos por medio
* de las funciones basicas de php y automaticamente cierra la conexion.
*
* @example conexionEjemplo.php (viejo).
*
* @param  string        $query      el argumento es el query que se
*                                   desea ejecutar.
* @param  int           $condicion  tipo de evento que se desea imprimir
*                                   1 para var_dump, 2 para die(var_dump).
* @return mysqli_object             regresa el objeto del resultado o tambien
*                                   puede regresar un objeto mysqli_connect.
*
* @version 1.4
*/

function conexion($query = 0, $condicion = 0){
  // datos de la base de datos
  // no tocar nada de lo de abajo al menos que sea absolutamente necesario
  $servidor  =  'localhost';
  $usuario   = 'php1';
  $clave     = 'clavephp';
  $bd      = "JAG_REPO";

  //se inicializa la variable conexion
  $conexion  = mysqli_connect($servidor,$usuario,$clave,$bd)
  or die('error de conexion: '.mysqli_connect_error());


  // no tocar nada de lo de abajo al menos que sea absolutamente necesario
  if ( $query === 0 and $condicion == 0) {

    return $conexion;

  }elseif($condicion == 0){

    $resultado = mysqli_query($conexion,$query)
    or die('Error del query: '.$query.
      '<br />'.mysqli_errno($conexion).
      '<br /> 1062: campo unico o primario repetido.'.
      '<br /> 1048: campo no nulo insertardo como nulo.'
      );

    // de una vez se cierra la conexion
    // a la base de datos para evitar errores.
    mysqli_close($conexion);
    return $resultado;

  }elseif($condicion == 1){
    var_dump($query);
  }elseif($condicion == 2){
    die(var_dump($query));
  }
}

?>
