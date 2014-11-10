<?php 

/**
* @author Granadillo Alejandro.
* @copyright MIT/GNU/Otro??? Octurbre 2014
* 
* @internal 
* 
* 
*  
*
* @see chequearGenericoEjemplo.php
* @example chequearGenericoEjemplo.php
* @todo ampliar segun sea necesario segun
* los objetivos necesarios:
* 
* @version 1.0
* 
* 
*/
class ChequearUsuario extends ChequearGenerico{

	public $seudonimo;
	public $clave;

	function __construct( $seudonimo, $clave ){

		$seudonimoSeguro = trim($seudonimo);
		$claveSeguro = trim($clave);

		$this->seudonimo = mysql_escape_string($seudonimoSeguro);
		$this->clave = mysql_escape_string($clave);

		self::chequeaForma();
		
	}

		/**
	*
	* @internal {chequea que los datos 
	* existan antes de enviarlos a la base de datos.
	* esta implementacion es diferente ya que
	*	es la iniciacion al sistema, esta pensado
	*	para ser usado una sola vez.}
	* @version 1.0
	*
	*
	* @return void
	* esta funcion no regresa nada.
	* se asume que die() sucede si algo esta mal
	* en las variables.
	*/
	protected function chequeaForma(){

		$clase = get_class($this);
		$togo = "Location: registro.php?seudonimo=false&clase=".$clase;
		if ($this->seudonimo == "") {
			die( header($togo) );
		}
		$togo = "Location: registro.php?clave=false&clase=".$clase;
		if ($this->clave == "") {
			die( header($togo) );
		}

	}

}

?>