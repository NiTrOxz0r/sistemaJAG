<?php

/**
* @author Granadillo Alejandro.
* @copyright MIT/GNU/Otro??? Octurbre 2014
*
* @internal mejorada la logica dentro de la clase
* para estar adaptada a las definiciones
* de las tablas docente, administrativo, directivo.
*
* {@internal clase modificada para que
* de una vez haga un mysqli_escape_string}
*
* @see chequearGenericoEjemplo.php
* @example chequearGenericoEjemplo.php
* @todo ampliar segun sea necesario segun
* los objetivos necesarios
*
* @version 1.4
*
*/
class ChequearDireccion extends ChequearGenerico{

	function __construct(
		$codUsrMod,
		$codParroquia,
		$direccionExacta,
		$tabla = null,
		$claveUnica
		){
		//metodos internos:

		//para mysqli_escape_string();
		self::escapeString();
		//para poner variables nulas si es necesario:
		self::setNull();
		//chequeaomos la forma (el objeto como tal):
		self::chequeaForma();
		self::chequeame(); //heredado de ChequearGenerico
	}

	/**
	*
	* @internal {chequea que los datos
	* existan antes de enviarlos a la base de datos.
	* @version 1.0
	*
	*
	* @return void
	* esta funcion no regresa nada.
	* se asume que die() sucede si algo esta mal
	* en las variables.
	*/
	private function chequeame(){
		if ( !is_numeric($this->codParroquia) ) {
			die(header("Location: registro.php?cedulaNumeric=false"));
		}
		if (strlen($this->direccionExacta) > 150) {
			die(header("Location: registro.php?dirExacta=false&largo=".strlen($this->direccionExacta)));
		}elseif (strlen($this->direccionExacta) < 5){
			$this->direccionExacta = 'Sin Registro, favor Actualizar-$seudonimo-$tabla';
		}
	}

	/**
	 * @author [slayerfat]
	 *
	 * {@internal esto es para que
	 * automaticamente convierta las variables del objeto
	 * a variables limpias para mysql}
	 *
	 * @return void [solo genera las variables internas del objeto]
	 */

	private function escapeString(){
		$con = conexion();//desde master.php > conexion.php
		$this->codUsrMod = mysqli_escape_string($con, trim($codUsrMod));
		$this->codParroquia = mysqli_escape_string($con, trim($codParroquia));
		$this->direccionExacta = mysqli_escape_string($con, trim($direccionExacta));
		$this->tabla = mysqli_escape_string($con, trim($tabla));
		$this->claveUnica = mysqli_escape_string($con, trim($claveUnica));
	}
	/**
	* @author [slayerfat]
	*
	* {@internal esto es para autogenerar el null
	* para los campos que acepten null en la base de datos.}
	*
	* @return void [solo genera las variables internas del objeto]
	*/
	private function setNull(){
		if ($this->direccionExacta == "") {
			$this->direccionExacta = 'Sin Registro, favor Actualizar-$this->claveUnica-$this->tabla';
		}elseif (strlen($this->direccionExacta) < 5){
			$this->direccionExacta = 'Sin Registro, favor Actualizar-$this->claveUnica-$this->tabla';
		}
	}

}

?>
