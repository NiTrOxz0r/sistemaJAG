<?php 
/*importante*/
/*chequea que los datos existan antes de 
enviarlos a la base de datos*/

/*chequea que el codigo de la base de datos exista
para hacer el query: */



/**
* @author Granadillo Alejandro.
* @copyright MIT/GNU/Otro??? Octurbre 2014
* 
* @internal 
* 
* 
* @deprecated 
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
class ChequearGenerico extends TablaPrimaria{

	var $p_apellido;
	var $s_apellido;
	var $p_nombre;
	var $s_nombre;
	var $nacionalidad;
	var $cedula;
	var $telefono;
	var $telefonoOtro;
	var $fecNac;
	var $sexo;
	var $codigoDireccion;

	function __construct(
		$codUsrMod,
		$p_apellido,
		$s_apellido = 'null',
		$p_nombre,
		$s_nombre = 'null',
		$nacionalidad,
		$cedula,
		$telefono = 'null',
		$telefonoOtro = 'null',
		$fecNac,
		$sexo,
		$codigoDireccion = 'null'
	){
		
		$this->p_apellido = $p_apellido;

		if ($s_apellido == "") {
			$this->s_apellido = "null";
		}else{
			$this->s_apellido = $s_apellido;
		}

		$this->p_nombre = $p_nombre;

		if ($s_nombre == "") {
			$this->s_nombre = "null";
		}else{
			$this->s_nombre = $s_nombre;
		}

		$this->nacionalidad = $nacionalidad;
		$this->cedula = $cedula;

		if ($telefono == "") {
			$this->telefono = "null";
		}else{
			$this->telefono = $telefono;
		}
		if ($telefonoOtro == "") {
			$this->telefonoOtro = "null";
		}else{
			$this->telefonoOtro = $telefonoOtro;
		}

		$this->fecNac = $fecNac;
		$this->sexo = $sexo;

		if ($codigoDireccion == "") {
			$this->codigoDireccion = "null";
		}else{
			$this->codigoDireccion = $codigoDireccion;
		}
		$this->fecMod = "current_timestamp";
		self::chequeaForma();
		self::chequeame();
	}

	/**
	*
	* @internal {chequea que los datos 
	* existan antes de enviarlos a la base de datos.
	* tambien chequea la validez de cedula, 
	* y valizacion de clave de usuario en base de datos 
	* ej: usuario admin = codigo x
	* El codigo del usuario validado
	* por el sistema.}
	* @version 1.1
	*
	*
	* @return void
	* esta funcion no regresa nada.
	* se asume que die() sucede si algo esta mal
	* en las variables.
	*/
	protected function chequeaForma(){

		// se chequea el estatus del usuario:
		TablaPrimaria::chequeaUsuario();
		$clase = get_class($this);
		// se agarra al objeto ($this)
		// y por cada variable iniciada
		// hacemos la comprobacion generica
		foreach ($this as $campo => $valor) {
			
			if (!isset($campo)) {
				$togo = "Location: registro.php?".$campo."=false&clase=".$clase;
				die(header($togo));
			}else{
				if ($valor == "") {
					$togo = "Location: registro.php?".$campo."=vacio&clase=".$clase;
					die(header($togo));
				}
			}
		}

	}

	private function chequeame(){
		// si cedula es mayor a 8 digitos o menor o igual a 5 digitos
		// se devuelve a registro, cedula de 99999 <--- no existe
		// y si existe esta muerto o loco o fuera de la ley o 
		// ALGUN AGENTE DEL CEBIN!!!
		// de hecho 6 digitos tambien porque no creo
		// que exista alguien vivo con cedula menor de 1 millon,
		// pero como no tengo acceso a la onidex, lo dejo en 5.

		if ( !is_numeric($this->cedula) ) {
			die(header("Location: registro.php?cedulaNumeric=false"));
		}
		if ( strlen($this->cedula)>8 or strlen($this->cedula)<=6 ) {
				header( "Location: registro.php?cedulaError=1_largo_cedula___".strlen($this->cedula) );
		}

		if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_nombre) ) {
			die(header("Location: registro.php?p_nombreNumeric=true"));
		}

		if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_nombre) ) {
			die(header("Location: registro.php?s_nombreNumeric=true"));
		}

		if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_apellido) ) {
			die(header("Location: registro.php?p_apellidoNumeric=true"));
		}

		if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_apellido) ) {
			die(header("Location: registro.php?s_apellidoNumeric=true"));
		}

		if ( $this->nacionalidad <> 'v' and $this->nacionalidad <> 'e' ) {
			die(header("Location: registro.php?nacionalidad=notVorE"));
		}

		if ($this->telefono <> 'null') {
			if ( !is_numeric($this->telefono) ) {
			die(header("Location: registro.php?telefonoNumeric=false"));
			}
			if ( !preg_match( '/^\d{11}$/', $this->telefono) ) {
				die(header("Location: registro.php?telefonoLength=false"));
			}
		}

		if ($this->telefonoOtro <> 'null') {
			if ( !is_numeric($this->telefonoOtro) ) {
			die(header("Location: registro.php?telefonoOtroNumeric=false"));
			}
			if ( !preg_match( '/^\d{11}$/', $this->telefonoOtro) ) {
				die(header("Location: registro.php?telefonoOtroLength=false"));
			}
		}

		if ($this->fecNac <> 'current_timestamp') {
			if ( preg_match( "/[^0-9$^-]/", $this->fecNac) ) {
			die(header("Location: registro.php?fecNacNumeric=false"));
			}
		}

		if ($this->sexo <> '0' and $this->sexo <> '1') {
			if ( !is_numeric($this->telefonoOtro) ) {
			die(header("Location: registro.php?sexo=malDefinido"));
			}
		}

		if ( !is_numeric($this->codigoDireccion) ) {
			die(header("Location: registro.php?codigoDireccionNumeric=false"));
		}
	}



}

?>