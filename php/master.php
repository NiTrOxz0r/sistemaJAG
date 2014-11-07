<?php 

/**
* @author Granadillo Alejandro.
* @copyright MIT/GNU/Otro??? Octurbre 2014
* 
* @internal este archivo esta echo para ser
* un repositorio de todos los posibles archivos *.php
* que el sistema requiera al momento de ejecucion.
* tambien es necesario discutir
* sobre el tipo de licencia, al ser codigo libre.
* 
* 
* @deprecated considerado el archivo
* o libreria principal que todas las paginas
* y archivos o librerias adicionales, hagan referencia de.
*
* @see indexMaster.php
* @example indexMaster.php
* @todo ampliar segun sea necesario segun
* los objetivos necesarios:
* 
* @version 1.0
* 
* 
*/
// aqui esta la funcion basica mysqli_connect y mysqli_query
require "conexion.php";

// clase conexion, por ahora ignorar.
require "claseConexion.php";

// clase tabla primara ej:
// alumno, docente, direccion, usuario etc.
// por ahora ignorar.
require "claseTablaPrimaria.php";

//generico para situaciones especificas varias
require "claseChequearGenerico.php";

// alumno
require "claseChequearAlumno.php";

// personal autorizado ej: 
// madres, representantes, 
// personas autorizadas a retirar el alumno
require "claseChequearPA.php";
// crea nombres diferentes para la misma clase
class_alias('ChequearPA', 'ChequearPersonalAutorizado');
class_alias('ChequearPA', 'ChequearPadres');
class_alias('ChequearPA', 'ChequearMadres');
class_alias('ChequearPA', 'ChequearPadres_Representantes');
class_alias('ChequearPA', 'ChequearRepresentante');


//personal interno ej: docentes, directoras etc
require "claseChequearPI.php"; 
// crea nombres diferentes para la misma clase
class_alias('ChequearPI', 'ChequearDocente');
class_alias('ChequearPI', 'ChequearProfesor');
class_alias('ChequearPI', 'ChequearDirectivo');
class_alias('ChequearPI', 'ChequearDirectiva');
class_alias('ChequearPI', 'ChequearDirectora');
class_alias('ChequearPI', 'ChequearSubDirectora');
class_alias('ChequearPI', 'ChequearAdministrativo');
class_alias('ChequearPI', 'ChequearSecretaria');
//usuario del sistema:
require "claseChequearUsuario.php";
// crea nombres diferentes para la misma clase
class_alias('ChequearUsuario', 'ChequearLogin');
class_alias('ChequearUsuario', 'ChequearLogeo');
class_alias('ChequearUsuario', 'ChequearValidarUsuario');
?>