<?php 

/**
* @author Granadillo Alejandro.
* @copyright MIT/GNU/Otro??? Octurbre 2014
* 
* @internal mejorada la logica dentro de la clase
* para estar adaptada a las definiciones
* de las tablas docente, administrativo, directivo.
* 
* @see chequearGenericoEjemplo.php
* @example chequearGenericoEjemplo.php
* @todo ampliar segun sea necesario segun
* los objetivos necesarios:
* 
* @version 1.3
* 
* 
*/
class ChequearPI extends ChequearGenerico{

	function __construct(
		$codUsrMod,
		$p_apellido,
		$s_apellido = 'null',
		$p_nombre,
		$s_nombre = 'null',
		$nacionalidad,
		$cedula = 'null',
		$celular = 'null',
		$telefono = 'null',
		$telefonoOtro = 'null',
		$nivel_instruccion,
		$titulo = 'null',
		$fecNac,
		$sexo,
		$codigoDireccion = 'null',
		$email = 'null',
		$codTipoUsr,
		$codCargo

		){

		$this->codUsrMod = trim($codUsrMod);
		$this->p_apellido = trim($p_apellido);
		$this->s_apellido = trim($s_apellido);
		$this->p_nombre = trim($p_nombre);
		$this->s_nombre = trim($s_nombre);
		$this->nacionalidad = trim($nacionalidad);
		$this->celular = trim($celular);
		$this->telefono = trim($telefono);
		$this->telefonoOtro = trim($telefonoOtro);
		$this->nivel_instruccion = trim($nivel_instruccion);
		$this->titulo = trim($titulo);
		$this->fecNac = trim($fecNac);
		$this->sexo = trim($sexo);
		$this->codigoDireccion = trim($codigoDireccion);
		$this->email = trim($email);
		$this->codTipoUsr = trim($codTipoUsr);
		$this->codCargo = trim($codCargo);
		
		if ($s_apellido == "") {
			$this->s_apellido = "null";
		}else{
			$this->s_apellido = "'$s_apellido'";
		}

		$this->p_apellido = "'$p_apellido'";

		$this->p_nombre = "'$p_nombre'";

		if ($s_nombre == "") {
			$this->s_nombre = "null";
		}else{
			$this->s_nombre = "'$s_nombre'";
		}

		$this->nacionalidad = "'$nacionalidad'";
		$this->cedula = "'$cedula'";

		$this->nivel_instruccion = "'$nivel_instruccion'";
		if ($titulo == "") {
			$this->titulo = "null";
		}else{
			$this->titulo = "'$titulo'";
		}
		if ($celular == "") {
			$this->celular = "null";
		}else{
			$this->celular = "'$celular'";
		}
		if ($telefono == "") {
			$this->telefono = "null";
		}else{
			$this->telefono = "'$telefono'";
		}
		if ($telefonoOtro == "") {
			$this->telefonoOtro = "null";
		}else{
			$this->telefonoOtro = "'$telefonoOtro'";
		}

		$this->fecNac = "'$fecNac'";

		$this->sexo = "'$sexo'";

		$this->codigoDireccion = $codigoDireccion;
		

		if ($email == "") {
			$this->email = "null";
		}else{
			$this->email = "'$email'";
		}

		$this->codTipoUsr = $codTipoUsr;
		$this->codCargo = $codCargo;

		$this->fecMod = "current_timestamp";
		
		
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

		if ($this->cedula <> "null") {
			if ( !preg_match( "/^'\d{8}'$/", $this->cedula) ) {
				die( header( "Location: registro.php?cedulaError=1_largo_cedula___".strlen($this->cedula) ) );
			}
		}

		if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_nombre) ) {
			die(header("Location: registro.php?p_nombreNumeric=true"));
		}

		if ($this->s_nombre <> "null") {
			if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_nombre) ) {
				die(header("Location: registro.php?s_nombreNumeric=true"));
			}
		}

		if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_apellido) ) {
			die(header("Location: registro.php?p_apellidoNumeric=true"));
		}

		if ( $this->s_apellido <> "null" ) {
			if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_apellido) ) {
				die(header("Location: registro.php?s_apellidoNumeric=true"));
			}
		}

		if ( $this->nacionalidad <> "'v'" and $this->nacionalidad <> "'e'" ) {
			die(header("Location: registro.php?nacionalidad=notVorE"));
		}

		if ($this->celular <> "null") {
			if ( !preg_match( "/^'\d{11}'$/", $this->celular) ) {
				die(header("Location: registro.php?celularLength=false&value=$this->celular"));
			}
		}

		if ($this->telefono <> "null") {
			if ( !preg_match( "/^'\d{11}'$/", $this->telefono) ) {
				die(header("Location: registro.php?telefonoLength=false&value=$this->telefono"));
			}
		}

		if ($this->telefonoOtro <> "null") {
			if ( !preg_match( "/^'\d{11}'$/", $this->telefonoOtro) ) {
				die(header("Location: registro.php?telefonoOtroLength=false&value=$this->telefonoOtro"));
			}
		}

		if ($this->fecNac <> 'current_timestamp') {
			if ( preg_match( "/^[\d]{4}[-]{1}[\d]{2}[-]{1}[\d]{2}$/", $this->fecNac) ) {
			die(header("Location: registro.php?fecNacNumeric=false&value=$this->fecNac"));
			}
		}

		if ($this->sexo <> "'0'" and $this->sexo <> "'1'") {
			if ( !is_numeric($this->sexo) ) {
			die(header("Location: registro.php?sexo=malDefinido"));
			}
		}

		if ($this->codigoDireccion <> "") {
			if ( !is_numeric($this->codigoDireccion) ) {
				die(header("Location: registro.php?codigoDireccionNumeric=false"));
			}
		}

	}

}

?>