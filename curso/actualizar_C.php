<?php
/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 *
 * {@internal [EN DESARROLLO]}
 *
 * @version [1.0]
 */
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 2, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
if ( isset($_GET['codigo']) ) :
  $conexion = conexion();
  // EN DESARROLLO
  echo "<h1>EN DESARROLLO.</h1>";
  mysqli_close($conexion);
else :
  //codigo...
endif;
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
