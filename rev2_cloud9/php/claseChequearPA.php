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
class ChequearPA extends ChequearGenerico{

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
		$fecNac = 'null',
		$lugNac = 'null',
		$sexo,
		$codigoDireccion,
		$relacion,
		$viveConAlumno,
		$nivelInstruccion,
		$profesion = 'null',
		$telefonoTrabajo = 'null',
		$direccionTrabajo = 'null',
		$lugarTrabajo = 'null'
		){

		$this->p_apellido = $p_apellido;
		
		if ($s_apellido == "") {
			$this->s_apellido = "null";
		}else{
			$this->s_apellido = $s_apellido;
		}

		$this->p_nombre = $p_nombre;

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

		if ($fecNac == "") {
			$this->fecNac = "null";
		}else{
			$this->fecNac = $fecNac;
		}

		if ($lugNac == "") {
			$this->lugNac = "null";
		}else{
			$this->lugNac = $lugNac;
		}
		
		$this->sexo = $sexo;

		if ($codigoDireccion == "") {
			$this->codigoDireccion = "null";
		}else{
			$this->codigoDireccion = $codigoDireccion;
		}

		if ($lugNac == "") {
			$this->lugNac = "null";
		}else{
			$this->lugNac = $lugNac;
		}

		$this->fecMod = "current_timestamp";
		
		$this->relacion = $relacion;
		$this->viveConAlumno = $viveConAlumno;
		$this->nivelInstruccion = $nivelInstruccion;

		if ($profesion == "") {
			$this->profesion = "null";
		}else{
			$this->profesion = $profesion;
		}
		
		if ($telefonoTrabajo == "") {
			$this->telefonoTrabajo = "null";
		}else{
			$this->telefonoTrabajo = $telefonoTrabajo;
		}

		if ($direccionTrabajo == "") {
			$this->direccionTrabajo = "null";
		}else{
			$this->direccionTrabajo = $direccionTrabajo;
		}

		if ($lugarTrabajo == "") {
			$this->lugarTrabajo = "null";
		}else{
			$this->lugarTrabajo = $lugarTrabajo;
		}

		self::chequeaForma();
		self::chequeame(); //heredado de ChequearGenerico
		
	}

	/**
	*
	* @internal {chequea que los datos 
	* existan antes de enviarlos a la base de datos.
	* tambien chequea la validez de cedula, 
	* y valizacion de clave de usuario en base de datos 
	* ej: nombre = juan1 < error}
	* @version 1.1
	*
	*
	* @return void
	* esta funcion no regresa nada.
	* se asume que die() sucede si algo esta mal
	* en las variables.
	*/
	private function chequeame(){


		// si cedula es mayor a 8 digitos o menor o igual a 5 digitos
		// se devuelve a registro, cedula de 99999 <--- no existe
		// y si existe esta muerto o loco o fuera de la ley o 
		// ALGUN AGENTE DEL CEBIN!!!
		// de hecho 6 digitos tambien porque no creo
		// que exista alguien vivo con cedula menor de 1 millon,
		// pero como no tengo acceso a la onidex, lo dejo en 5.

		if ( $this->nacionalidad <> 'v' and $this->nacionalidad <> 'e' ) {
			die(header("Location: registro.php?nacionalidad=notVorE"));
		}

		if ($this->telefono <> 'null') {
			if ( !is_numeric($this->telefono) ) {
			die(header("Location: registro.php?telefonoNumeric=false"));
			}
		}

		if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_nombre) ) {
			die(header("Location: registro.php?p_nombreNumeric=true"));
		}

		if ($this->s_nombre <> 'null') {
			if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_nombre) ) {
				die(header("Location: registro.php?s_nombreNumeric=true"));
			}
		}

		if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_apellido) ) {
			die(header("Location: registro.php?p_apellidoNumeric=true"));
		}

		if ( $this->s_apellido <> 'null' ) {
			if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_apellido) ) {
				die(header("Location: registro.php?s_apellidoNumeric=true"));
			}
		}

		if ( $this->nacionalidad <> 'v' and $this->nacionalidad <> 'e' ) {
			die(header("Location: registro.php?nacionalidad=notVorE"));
		}

		if ($this->cedula <> 'null') {
			if ( !is_numeric($this->cedula) ) {
			die(header("Location: registro.php?cedulaNumeric=false"));
			}
			if ( strlen($this->cedula) <>8 ) {
				header( "Location: registro.php?cedulaError=1_largo_cedula___".strlen($cedula) );
			}
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

		if ($this->fecNac <> 'null') {
			if ( preg_match( "/^0-9$^-$/", $this->fecNac) ) {
			die(header("Location: registro.php?fecNacNumeric=false"));
			}
		}

		if ($this->sexo <> '0' and $this->sexo <> '1') {
			if ( !is_numeric($this->sexo) ) {
			die(header("Location: registro.php?sexo=malDefinido"));
			}
		}

		if ( !is_numeric($this->codigoDireccion) ) {
			die(header("Location: registro.php?codigoDireccionNumeric=false"));
		}

		if ($this->lugNac <> 'null') {
			if ( strlen($this->lugNac) > 50 ) {
				header( "Location: registro.php?lugNacError=1_largo_lugNac___".strlen($lugNac) );
			}
		}

		if ( !is_numeric($this->relacion) ) {
			die(header("Location: registro.php?relacionNumeric=false"));
		}

		if ($this->viveConAlumno <> 's' and $this->viveConAlumno <> 'n') {
			die(header("Location: registro.php?viveConAlumno=malDefinido"));
		}

		if ( !is_numeric($this->nivelInstruccion) ) {
			die(header("Location: registro.php?nivelInstruccionNumeric=false"));
		}

		if ($this->profesion != 'null') {
			if ( !is_numeric($this->profesion) ) {
				die(header("Location: registro.php?profesionNumeric=false"));
			}
		}

		if ($this->telefonoTrabajo != 'null') {
			if ( !is_numeric($this->telefonoTrabajo) ) {
				die(header("Location: registro.php?telefonoTrabajoNumeric=false"));
			}
			if ( !preg_match( '/^\d{11}$/', $this->telefonoTrabajo) ) {
				die(header("Location: registro.php?telefonoTrabajoLength=false"));
			}
		}

		if ($this->direccionTrabajo <> 'null') {
			if ( strlen($this->direccionTrabajo) > 150 ) {
				header( "Location: registro.php?direccionTrabajoError=1_largo_direccionTrabajo___".strlen($direccionTrabajo) );
			}
		}

		if ($this->lugarTrabajo <> 'null') {
			if ( strlen($this->lugarTrabajo) > 50 ) {
				header( "Location: registro.php?lugarTrabajoError=1_largo_lugarTrabajo___".strlen($lugarTrabajo) );
			}
		}

	}



}

?>