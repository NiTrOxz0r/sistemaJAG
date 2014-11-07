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
class ChequearAlumno extends ChequearGenerico{

	function __construct(
		$codUsrMod,
		$p_apellido,
		$s_apellido = 'null',
		$p_nombre,
		$s_nombre = 'null',
		$nacionalidad,
		$cedula = 'null',
		$cedulaEscolar,
		$telefono = 'null',
		$telefonoOtro = 'null',
		$fecNac,
		$lugNac = 'null',
		$sexo,
		$codigoDireccion,
		$actaNumero,
		$actaFolio,
		$plantel_procedencia = 'null',
		$repitiente,
		$codCurso,
		$altura = 'null',
		$peso = 'null',
		$camisa = 'null',
		$pantalon = 'null',
		$zapato = 'null',
		$codRepresentante,
		$codPersonaRetira = 'null'

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

		$this->fecNac = $fecNac;

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
		$this->cedulaEscolar = $cedulaEscolar;
		$this->actaNumero = $actaNumero;
		$this->actaFolio = $actaFolio;
		
		if ($plantel_procedencia == "") {
			$this->plantel_procedencia = "null";
		}else{
			$this->plantel_procedencia = $plantel_procedencia;
		}
		$this->repitiente = $repitiente;
		$this->codCurso = $codCurso;

		if ($altura == "") {
			$this->altura = "null";
		}else{
			$this->altura = $altura;
		}


		if ($peso == "") {
			$this->peso = "null";
		}else{
			$this->peso = $peso;
		}
		
		if ($camisa == "") {
			$this->camisa = "null";
		}else{
			$this->camisa = $camisa;
		}
		
		if ($pantalon == "") {
			$this->pantalon = "null";
		}else{
			$this->pantalon = $pantalon;
		}
		
		if ($zapato == "") {
			$this->zapato = "null";
		}else{
			$this->zapato = $zapato;
		}

		$this->codRepresentante = $codRepresentante;

		if ($codPersonaRetira == "") {
			$this->codPersonaRetira = "null";
		}else{
			$this->codPersonaRetira = $codPersonaRetira;
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

		if ( !is_numeric($this->cedulaEscolar) ) {
			die(header("Location: registro.php?cedulaEscolarNumeric=false"));
		}
		if ( strlen($this->cedulaEscolar) <>10 ) {
				header( "Location: registro.php?cedulaEscolarError=1_largo_cedulaEscolar___".strlen($cedulaEscolar) );
		}

		if ( $this->nacionalidad <> 'v' and $this->nacionalidad <> 'e' ) {
			die(header("Location: registro.php?nacionalidad=notVorE"));
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

		if ($this->fecNac <> 'current_timestamp') {
			if ( preg_match( "/[^0-9$^-]/", $this->fecNac) ) {
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

		/**
		* @todo MODIFICAR 99 al numero exacto del acta y folio
		*/

		if ($this->actaNumero <> '') {
			if ( preg_match( "/[^0-9$^-]/", $this->actaNumero) ) {
			die(header("Location: registro.php?actaNumeroNumeric=false"));
			}
			if ( strlen($this->actaNumero) > 99 ) { // modificar al numero real
				header( "Location: registro.php?actaNumeroError=1_largo_actaNumero___".strlen($actaNumero) );
			}
		}

		if ($this->actaFolio <> '') {
			if ( preg_match( "/[^0-9$^-]/", $this->actaFolio) ) {
			die(header("Location: registro.php?actaFolioNumeric=false"));
			}
			if ( strlen($this->actaFolio) > 99 ) { // modificar al numero real
				header( "Location: registro.php?actaFolioError=1_largo_actaFolio___".strlen($actaFolio) );
			}
		}

		if ($this->plantel_procedencia <> 'null') {
			if ( strlen($this->plantel_procedencia) > 50 ) {
				header( "Location: registro.php?plantel_procedenciaError=1_largo_plantel_procedencia___".strlen($plantel_procedencia) );
			}
		}

		if ( $this->repitiente <> 's' and $this->repitiente <> 'n' ) {
			die(header("Location: registro.php?repitiente=notSorN"));
		}

		if ($this->altura <> 'null') {
			if ( !is_numeric($this->altura) ) {
			die(header("Location: registro.php?altura=notNumeric"));
			}
			if ( strlen($this->altura) > 3 ) {
				header( "Location: registro.php?alturaError=1_largo_altura___".strlen($altura) );
			}
		}

		if ($this->peso <> 'null') {
			if ( !is_numeric($this->peso) ) {
			die(header("Location: registro.php?peso=notNumeric"));
			}
			if ( strlen($this->peso) > 3 ) {
				header( "Location: registro.php?pesoError=1_largo_peso___".strlen($peso) );
			}
		}

		if ($this->camisa <> 'null') {
			if ( !is_numeric($this->camisa) ) {
			die(header("Location: registro.php?camisa=notNumeric"));
			}
			if ( strlen($this->camisa) > 1 ) {
				header( "Location: registro.php?camisaError=1_largo_camisa___".strlen($camisa) );
			}
		}

		if ($this->pantalon <> 'null') {
			if ( !is_numeric($this->pantalon) ) {
			die(header("Location: registro.php?pantalon=notNumeric"));
			}
			if ( strlen($this->pantalon) > 1 ) {
				header( "Location: registro.php?pantalonError=1_largo_pantalon___".strlen($pantalon) );
			}
		}

		if ($this->zapato <> 'null') {
			if ( !is_numeric($this->zapato) ) {
			die(header("Location: registro.php?zapato=notNumeric"));
			}
			if ( strlen($this->zapato) > 2 ) {
				header( "Location: registro.php?zapatoError=1_largo_zapato___".strlen($zapato) );
			}
		}
	}



}

?>