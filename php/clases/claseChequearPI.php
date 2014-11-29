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
* @version 1.5
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
    $email = 'null',
    $codTipoUsr,
    $codCargo,
    $tipoPersonal
    ){
    //variables del objerto:
    $conexion = conexion();//desde master.php > conexion.php
    $this->codUsrMod = mysqli_escape_string($conexion, trim($codUsrMod));
    $this->p_apellido = mysqli_escape_string($conexion, trim($p_apellido));
    $this->s_apellido = mysqli_escape_string($conexion, trim($s_apellido));
    $this->p_nombre = mysqli_escape_string($conexion, trim($p_nombre));
    $this->s_nombre = mysqli_escape_string($conexion, trim($s_nombre));
    $this->nacionalidad = mysqli_escape_string($conexion, trim($nacionalidad));
    $this->cedula = mysqli_escape_string($conexion, trim($cedula));
    $this->celular = mysqli_escape_string($conexion, trim($celular));
    $this->telefono = mysqli_escape_string($conexion, trim($telefono));
    $this->telefonoOtro = mysqli_escape_string($conexion, trim($telefonoOtro));
    $this->nivel_instruccion = mysqli_escape_string($conexion, trim($nivel_instruccion));
    $this->titulo = mysqli_escape_string($conexion, trim($titulo));
    $this->fecNac = mysqli_escape_string($conexion, trim($fecNac));
    $this->sexo = mysqli_escape_string($conexion, trim($sexo));
    $this->email = mysqli_escape_string($conexion, trim($email));
    $this->codTipoUsr = mysqli_escape_string($conexion, trim($codTipoUsr));
    $this->codCargo = mysqli_escape_string($conexion, trim($codCargo));
    $this->tipoPersonal = mysqli_escape_string($conexion, trim($tipoPersonal));
    //metodos internos:
    //para poner variables nulas si es necesario:
    self::setNull();
    //chequeaomos la forma (el objeto como tal):
    self::chequeaForma();
    self::chequeame(); //heredado de ChequearGenerico
    mysqli_close($conexion);
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
    if ( preg_match('/[a-zA-Z-*{\"}@!"#$%\/&)=_]/', $this->tipoPersonal) ) {
      die(header("Location: registro.php?tipoPersonalNumeric=false"));
    }

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
    if ($this->s_apellido == "") {
      $this->s_apellido = "null";
    }else{
      $this->s_apellido = "'$this->s_apellido'";
    }

    $this->p_apellido = "'$this->p_apellido'";

    $this->p_nombre = "'$this->p_nombre'";

    if ($this->s_nombre == "") {
      $this->s_nombre = "null";
    }else{
      $this->s_nombre = "'$this->s_nombre'";
    }

    $this->nacionalidad = "'$this->nacionalidad'";
    $this->cedula = "'$this->cedula'";

    $this->nivel_instruccion = "'$this->nivel_instruccion'";
    if ($this->titulo == "") {
      $this->titulo = "null";
    }else{
      $this->titulo = "'$this->titulo'";
    }
    if ($this->celular == "") {
      $this->celular = "null";
    }else{
      $this->celular = "'$this->celular'";
    }
    if ($this->telefono == "") {
      $this->telefono = "null";
    }else{
      $this->telefono = "'$this->telefono'";
    }
    if ($this->telefonoOtro == "") {
      $this->telefonoOtro = "null";
    }else{
      $this->telefonoOtro = "'$this->telefonoOtro'";
    }

    $this->fecNac = "'$this->fecNac'";
    $this->sexo = "'$this->sexo'";

    if ($this->email == "") {
      $this->email = "null";
    }else{
      $this->email = "'$this->email'";
    }
    $this->fecMod = "current_timestamp";
  }

}

?>
