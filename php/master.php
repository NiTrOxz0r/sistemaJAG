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
require "funciones/conexion.php";

// libreria de password_hash para
// compatibilidad con php < 5.5
require "funciones/password.php";
// aqui esta la funcion que trae head y navbar:
require "funciones/empezarPagina.php";

// aqui esta la funcion que trae footer y cola:
require "funciones/finalizarPagina.php";

// usado para ver variables de session nada mas:
require "funciones/debugUsuario.php";

// funcion validar usuario en pagina web:
require "funciones/validarUsuario.php";

// clase conexion, por ahora ignorar.
require "clases/claseConexion.php";

// clase tabla primara ej:
// alumno, docente, direccion, usuario etc.
// por ahora ignorar.
require "clases/claseTablaPrimaria.php";

//generico para situaciones especificas varias
require "clases/claseChequearGenerico.php";

//direccion para todas las entidades:
require "clases/claseChequearDireccion.php";

// alumno
require "clases/claseChequearAlumno.php";

// personal autorizado ej:
// madres, representantes,
// personas autorizadas a retirar el alumno
require "clases/claseChequearPA.php";
// crea nombres diferentes para la misma clase
class_alias('ChequearPA', 'ChequearPersonalAutorizado');
class_alias('ChequearPA', 'ChequearPadres');
class_alias('ChequearPA', 'ChequearMadres');
class_alias('ChequearPA', 'ChequearPadres_Representantes');
class_alias('ChequearPA', 'ChequearRepresentante');


//personal interno ej: docentes, directoras etc
require "clases/claseChequearPI.php";
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
require "clases/claseChequearUsuario.php";
// crea nombres diferentes para la misma clase
class_alias('ChequearUsuario', 'ChequearLogin');
class_alias('ChequearUsuario', 'ChequearLogeo');
class_alias('ChequearUsuario', 'ChequearValidarUsuario');

//enlace dinamico:
require "funciones/enlaceDinamico.php";
?>
