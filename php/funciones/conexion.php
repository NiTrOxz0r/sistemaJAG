<?php


/**
* @author Granadillo Alejandro.
*	Junio 2014.
*
*	se puede ver un ejemplo de esta 
* funcion en uso en:
*	@example conexionEjemplo.php
*
* @param string $query
* el argumento es el query que se
* desea ejecutar
*
* @return mysqli_object
* regresa el objeto del resultado
*
* @version 1.3
*/

function conexion($query = 0, $condicion = 0){
	/**
	* Genera la conexion requerida a
	* la base de datos por medio
	* de las funciones basicas de php
	* y automaticamente cierra la conexion
	*
	*/

	// datos de la base de datos
	// modificar segun los datos de tu pc:
	$servidor  =  'localhost';
	$usuario   = 'php1';
	$clave 	   = 'clavephp';
	$bd 	   = "JAG_REPO";

	//se inicializa la variable conexion
	$conexion  = mysqli_connect($servidor,$usuario,$clave,$bd) 
	or die('error de conexion: '.mysqli_connect_error());
	

	// no tocar nada de lo de abajo al menos que sea absolutamente necesario
	if ( $query === 0 and $condicion == 0) {

		return $conexion;
	
	}elseif($condicion == 0){
		
		/**
		* Con la cadena de texto $query se accesa a la base de datos
		* @param string $query
		*/
		$resultado = mysqli_query($conexion,$query) 
		or die('Error del query: '.$query.
			'<br />'.mysqli_errno($conexion).
			'<br /> es 1062? cedula repetida, otro numero? A REZAR
			<br /><a href="index.php">volver</a>');
		
	
		// de una vez se cierra la conexion
		// a la base de datos para evitar errores.
		mysqli_close($conexion);
	
		/**
		* @return mysqli_object
		* regresa el objeto del resultado
		*/
		
		return $resultado;
	}elseif($condicion == 1){
		die( var_dump($query) );
	}

}

?>
