<?php

/**
* @author Granadillo Alejandro.
*
* @internal para validar los formularios referentes
* al personal interno, (padres, madres, representantes)
*
* @see form_reg.P.php
* @see chequearGenericoEjemplo.php
* @example chequearGenericoEjemplo.php
*
* @version 1.1
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
    $email = 'null',
    $sexo,
    $relacion,
    $viveConAlumno,
    $nivelInstruccion,
    $profesion = 'null',
    $telefonoTrabajo = 'null',
    $direccionTrabajo = 'null',
    $lugarTrabajo = 'null'
  ){
    //variables de la clase:
    $conexion = conexion();//desde master.php > conexion.php
    $this->codUsrMod = mysqli_escape_string($conexion, trim($codUsrMod));
    $this->p_apellido = mysqli_escape_string($conexion, trim($p_apellido));
    $this->s_apellido = mysqli_escape_string($conexion, trim($s_apellido));
    $this->p_nombre = mysqli_escape_string($conexion, trim($p_nombre));
    $this->s_nombre = mysqli_escape_string($conexion, trim($s_nombre));
    $this->nacionalidad = mysqli_escape_string($conexion, trim($nacionalidad));
    $this->cedula = mysqli_escape_string($conexion, trim($cedula));
    $this->telefono = mysqli_escape_string($conexion, trim($telefono));
    $this->telefonoOtro = mysqli_escape_string($conexion, trim($telefonoOtro));
    $this->fecNac = mysqli_escape_string($conexion, trim($fecNac));
    $this->lugNac = mysqli_escape_string($conexion, trim($lugNac));
    $this->email = mysqli_escape_string($conexion, trim($email));
    $this->sexo = mysqli_escape_string($conexion, trim($sexo));
    $this->relacion = mysqli_escape_string($conexion, trim($relacion));
    $this->viveConAlumno = mysqli_escape_string($conexion, trim($viveConAlumno));
    $this->nivelInstruccion = mysqli_escape_string($conexion, trim($nivelInstruccion));
    $this->profesion = mysqli_escape_string($conexion, trim($profesion));
    $this->telefonoTrabajo = mysqli_escape_string($conexion, trim($telefonoTrabajo));
    $this->direccionTrabajo = mysqli_escape_string($conexion, trim($direccionTrabajo));
    $this->lugarTrabajo = mysqli_escape_string($conexion, trim($lugarTrabajo));
    //metodos internos:
    self::setNull();
    self::chequeaForma();
    self::chequeame();
  }

  /**
  *
  * @internal {chequea que los datos
  * existan antes de enviarlos a la base de datos.
  * tambien chequea la validez de cedula,
  * y valizacion de clave de usuario en base de datos
  * ej: nombre = juan1 < error}
  * @version 1.2
  *
  *
  * @return void llama a verificar si falla algo
  */
  private function chequeame(){
    if ( $this->nacionalidad <> "'v'" and $this->nacionalidad <> "'e'" ) {
      self::verificar("Error en: nacionalidad, se espera valor apropiado del formulario, datos: ".$this->nacionalidad);
    }

    if ($this->cedula <> 'null') {
      if ( !preg_match( '/^[\']\d{8}[\']$/', $this->cedula) ) {
        self::verificar("Error en: cedula: solo numeros, datos: ".$this->cedula);
      }
    }

    if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_nombre) ) {
      self::verificar("Error en: primer nombre: solo letas, datos: ".$this->p_nombre);
    }

    if ($this->s_nombre <> 'null') {
      if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_nombre) ) {
        self::verificar("Error en: segundo nombre: solo letas, datos: ".$this->s_nombre);
      }
    }

    if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_apellido) ) {
      self::verificar("Error en: primer apellido: solo letas, datos: ".$this->p_apellido);
    }

    if ( $this->s_apellido <> 'null' ) {
      if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_apellido) ) {
        self::verificar("Error en: segundo apellido: solo letas, datos: ".$this->s_apellido);
      }
    }

    if ($this->telefono <> 'null') {
      if ( !preg_match( '/^[\']\d{11}[\']$/', $this->telefono) ) {
        self::verificar("Error en: telefono: se espera solo numeros: 02125559911, datos: ".$this->telefono);
      }
    }

    if ($this->telefonoOtro <> 'null') {
      if ( !preg_match( '/^[\']\d{11}[\']$/', $this->telefonoOtro) ) {
        self::verificar("Error en: telefono: se espera solo numeros: 02125559911, datos: ".$this->telefonoOtro);
      }
    }


    if ($this->fecNac <> 'current_timestamp') {
      if ( preg_match( "/['][^0-9$^-][']/", $this->fecNac) ) {
        self::verificar("Error en: fecha de nacimiento se espera AAAA-MM-DD, datos: ".$this->fecNac);
      }
    }

    if ($this->sexo <> "'0'" and $this->sexo <> "'1'") {
      if ( !is_numeric($this->sexo) ) {
        self::verificar("Error en: sexo: se esperan un valor apropiados del formulario, datos: ".$this->sexo);
      }
    }

    if ($this->lugNac <> 'null') {
      if ( strlen($this->lugNac) > 50 ) {
       self::verificar("Error en: lugar de nacimiento: datos excede limite maximo, datos: ".$this->lugNac.", largo: ".strlen($this->lugNac));
      }
    }

    if ( preg_match( "/[^0-9]/", $this->relacion) ) {
      self::verificar("Error en: tipo de relacion: se espera un valor apropiado del formulario, datos: ".$this->relacion);
    }

    if ( $this->viveConAlumno <> "'s'" and $this->viveConAlumno <> "'n'" ) {
      self::verificar("Error en: vive con alumno: se espera un valor apropiado del formulario, datos: ".$this->viveConAlumno);
    }

    if ( preg_match( "/[^0-9]/", $this->nivelInstruccion) ) {
      self::verificar("Error en: nivel instruccion: se espera un valor apropiado del formulario, datos: ".$this->nivelInstruccion);
    }

    if ($this->email != 'null') {
      if ( !preg_match( "/^['][0-9a-zA-Z-_$#]{2,20}+\@[0-9a-zA-Z-_$#]{2,20}+\.[a-zA-Z]{2,5}[']/", $this->email) ) {
        self::verificar("Error en: email: se espera formato estandar: algo@algunsitio.com, datos: ".$this->email);
      }
    }
    if ($this->profesion != 'null') {
      if ( preg_match( "/[^0-9]/", $this->profesion) ) {
        self::verificar("Error en: tipo de profesion: se esperan un valor apropiados del formulario, datos: ".$this->profesion);
      }
    }

    if ($this->telefonoTrabajo <> 'null') {
      if ( !preg_match( '/^[\']\d{11}[\']$/', $this->telefonoTrabajo) ) {
        self::verificar("Error en: telefono de trabajo: se espera solo numeros: 02125559911, datos: ".$this->telefonoTrabajo);
      }
    }

    if ($this->direccionTrabajo <> 'null') {
      if ( strlen($this->direccionTrabajo) > 150 ) {
        self::verificar("Error en: dir. de trabajo: datos excede limite maximo, datos: ".$this->direccionTrabajo.", largo: ".strlen($this->lugNac));
      }
    }

    if ($this->lugarTrabajo <> 'null') {
      if ( strlen($this->lugarTrabajo) > 50 ) {
        self::verificar("Error en: lugar de trabajo: datos excede limite maximo, datos: ".$this->lugarTrabajo.", largo: ".strlen($this->lugNac));
      }
    }

  }
  /**
  *
  * {@internal esto es para autogenerar el null
  * para los campos que acepten null en la base de datos.}
  *
  * @return void [solo genera las variables internas de la clase]
  */
  private function setNull(){
    $this->p_apellido = "'$this->p_apellido'";

    if ($this->s_apellido == "") {
      $this->s_apellido = "null";
    }else{
      $this->s_apellido = "'$this->s_apellido'";
    }

    $this->p_nombre = "'$this->p_nombre'";

    if ($this->s_nombre == "") {
      $this->s_nombre = "null";
    }else{
      $this->s_nombre = "'$this->s_nombre'";
    }

    $this->nacionalidad = "'$this->nacionalidad'";
    $this->cedula = "'$this->cedula'";

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

    if ($this->fecNac == "") {
      $this->fecNac = "null";
    }else{
      $this->fecNac = "'$this->fecNac'";
    }

    if ($this->lugNac == "") {
      $this->lugNac = "null";
    }else{
      $this->lugNac = "'$this->lugNac'";
    }

    if ($this->email == "") {
      $this->email = "null";
    }else{
      $this->email = "'$this->email'";
    }

    $this->sexo = "'$this->sexo'";

    $this->fecMod = "current_timestamp";

    $this->relacion = $this->relacion;
    $this->viveConAlumno = "'$this->viveConAlumno'";
    $this->nivelInstruccion = $this->nivelInstruccion;

    if ($this->profesion == "") {
      $this->profesion = "null";
    }else{
      $this->profesion = $this->profesion;
    }

    if ($this->telefonoTrabajo == "") {
      $this->telefonoTrabajo = "null";
    }else{
      $this->telefonoTrabajo = "'$this->telefonoTrabajo'";
    }

    if ($this->direccionTrabajo == "") {
      $this->direccionTrabajo = "null";
    }else{
      $this->direccionTrabajo = "'$this->direccionTrabajo'";
    }

    if ($this->lugarTrabajo == "") {
      $this->lugarTrabajo = "null";
    }else{
      $this->lugarTrabajo = "'$this->lugarTrabajo'";
    }
  }

}
?>
