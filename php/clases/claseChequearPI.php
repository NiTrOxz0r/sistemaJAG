<?php

/**
* @author Granadillo Alejandro.
*
* @internal mejorada la logica dentro de la clase
* para estar adaptada a las definiciones
* de las tablas docente, administrativo, directivo.
*
* {@internal clase modificada para que
* de una vez haga un mysqli_escape_string}
*
* @see chequearGenericoEjemplo.php (viejo)
* @see usuario/insertar_U.php
* @example chequearGenericoEjemplo.php (viejo)
* @todo ampliar segun sea necesario segun
* los objetivos necesarios
*
* @version 1.6
*
*/
class ChequearPI extends ChequearGenerico{

  function __construct(
    $codUsrMod,
    $p_apellido,
    $s_apellido = 'default',
    $p_nombre,
    $s_nombre = 'default',
    $nacionalidad,
    $cedula,
    $celular = 'default',
    $telefono = 'default',
    $telefonoOtro = 'default',
    $nivelInstruccion,
    $certificado_1 = 'default',
    $descripcion_1 = 'default',
    $certificado_2 = 'default',
    $descripcion_2 = 'default',
    $certificado_3 = 'default',
    $descripcion_3 = 'default',
    $certificado_4 = 'default',
    $descripcion_4 = 'default',
    $fecNac,
    $sexo,
    $email = 'default',
    $codTipoUsr,
    $codCargo,
    $tipoPersonal
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
    $this->celular = mysqli_escape_string($conexion, trim($celular));
    $this->telefono = mysqli_escape_string($conexion, trim($telefono));
    $this->telefonoOtro = mysqli_escape_string($conexion, trim($telefonoOtro));
    $this->nivelInstruccion = mysqli_escape_string($conexion, trim($nivelInstruccion));
    $this->certificado_1 = mysqli_escape_string($conexion, trim($certificado_1));
    $this->certificado_2 = mysqli_escape_string($conexion, trim($certificado_2));
    $this->certificado_3 = mysqli_escape_string($conexion, trim($certificado_3));
    $this->certificado_4 = mysqli_escape_string($conexion, trim($certificado_4));
    $this->descripcion_1 = mysqli_escape_string($conexion, trim($descripcion_1));
    $this->descripcion_2 = mysqli_escape_string($conexion, trim($descripcion_2));
    $this->descripcion_3 = mysqli_escape_string($conexion, trim($descripcion_3));
    $this->descripcion_4 = mysqli_escape_string($conexion, trim($descripcion_4));
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
  *
  * @version 1.2
  *
  * @return void llama a verificar si falla algo
  */
  private function chequeame(){

    if ( $this->nacionalidad <> "'v'" and $this->nacionalidad <> "'e'" ) {
      self::verificar("Error en: nacionalidad, se espera valor apropiado del formulario, datos: ".$this->nacionalidad);
    }

    if ( !preg_match( '/^[\']\d{8}[\']$/', $this->cedula) ) {
      self::verificar("Error en: cedula: solo numeros, datos: ".$this->cedula);
    }

    if ( preg_match( "[^a-zA-Z-_áéíóúÁÉÍÓÚÑñ']", $this->p_nombre) ) {
      self::verificar("Error en: primer nombre: solo letas, datos: ".$this->p_nombre);
    }

    if ($this->s_nombre <> 'default') {
      if ( preg_match( "[^a-zA-Z-_áéíóúÁÉÍÓÚÑñ']", $this->s_nombre) ) {
        self::verificar("Error en: segundo nombre: solo letas, datos: ".$this->s_nombre);
      }
    }

    if ( preg_match( "[^a-zA-ZáéíóúÁÉÍÓÚÑñ']", $this->p_apellido) ) {
      self::verificar("Error en: primer apellido: solo letas, datos: ".$this->p_apellido);
    }

    if ( $this->s_apellido <> 'default' ) {
      if ( preg_match( "[^a-zA-Z-_áéíóúÁÉÍÓÚÑñ']", $this->s_apellido) ) {
        self::verificar("Error en: segundo apellido: solo letas, datos: ".$this->s_apellido);
      }
    }

    if ($this->celular <> "default") {
      if ( !preg_match( "/^'\d{11}'$/", $this->celular) ) {
        die(header("Location: registro.php?celularLength=false&value=$this->celular"));
      }
    }

    if ($this->celular <> 'default') {
      if ( !preg_match( '/^[\']\d{11}[\']$/', $this->celular) ) {
        self::verificar("Error en: celular: se espera solo numeros: 02125559911, datos: ".$this->celular);
      }
    }

    if ($this->telefono <> 'default') {
      if ( !preg_match( '/^[\']\d{11}[\']$/', $this->telefono) ) {
        self::verificar("Error en: telefono: se espera solo numeros: 02125559911, datos: ".$this->telefono);
      }
    }

    if ($this->telefonoOtro <> 'default') {
      if ( !preg_match( '/^[\']\d{11}[\']$/', $this->telefonoOtro) ) {
        self::verificar("Error en: telefono: se espera solo numeros: 02125559911, datos: ".$this->telefonoOtro);
      }
    }

    if ( preg_match( "/[^0-9]/", $this->nivelInstruccion) ) {
      self::verificar("Error en: nivel de instruccion: se espera un valor apropiado del formulario, datos: ".$this->nivelInstruccion);
    }

    if ($this->certificado_1 <> 'default') :
      if ( preg_match( "/[\'][^0-9][\']/", $this->certificado_1) ) {
        self::verificar("Error en: tipo de titulo y/o certificado 1: se espera un valor apropiado del formulario, datos: ".$this->certificado_1);
      }
    endif;
    if ($this->certificado_2 <> 'default') :
      if ( preg_match( "/[\'][^0-9][\']/", $this->certificado_2) ) {
        self::verificar("Error en: tipo de titulo y/o certificado 1: se espera un valor apropiado del formulario, datos: ".$this->certificado_2);
      }
    endif;
    if ($this->certificado_3 <> 'default') :
      if ( preg_match( "/[\'][^0-9][\']/", $this->certificado_3) ) {
        self::verificar("Error en: tipo de titulo y/o certificado 1: se espera un valor apropiado del formulario, datos: ".$this->certificado_3);
      }
    endif;
    if ($this->certificado_4 <> 'default') :
      if ( preg_match( "/[\'][^0-9][\']/", $this->certificado_4) ) {
        self::verificar("Error en: tipo de titulo y/o certificado 1: se espera un valor apropiado del formulario, datos: ".$this->certificado_4);
      }
    endif;

    if ($this->descripcion_1 <> 'default') :
      if ( preg_match( "/^[\'][^0-9a-zA-Z-_áéíóúÁÉÍÓÚÑñ][\']$/", $this->descripcion_1) ) {
        self::verificar("Error en: descripcion de titulo y/o certificado 1: se espera un valor apropiado del formulario, datos: ".$this->descripcion_1);
      }
    endif;

    if ($this->descripcion_2 <> 'default') :
      if ( preg_match( "/^[\'][^0-9a-zA-Z-_áéíóúÁÉÍÓÚÑñ][\']$/", $this->descripcion_2) ) {
        self::verificar("Error en: descripcion de titulo y/o certificado 2: se espera un valor apropiado del formulario, datos: ".$this->descripcion_2);
      }
    endif;

    if ($this->descripcion_3 <> 'default') :
      if ( preg_match( "/^[\'][^0-9a-zA-Z-_áéíóúÁÉÍÓÚÑñ][\']$/", $this->descripcion_3) ) {
        self::verificar("Error en: descripcion de titulo y/o certificado 3: se espera un valor apropiado del formulario, datos: ".$this->descripcion_3);
      }
    endif;

    if ($this->descripcion_4 <> 'default') :
      if ( preg_match( "/^[\'][^0-9a-zA-Z-_áéíóúÁÉÍÓÚÑñ][\']$/", $this->descripcion_4) ) {
        self::verificar("Error en: descripcion de titulo y/o certificado 4: se espera un valor apropiado del formulario, datos: ".$this->descripcion_4);
      }
    endif;


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
    if ($this->email != 'default') {
      if ( !preg_match( "/^['][0-9a-zA-Z-_$#]{2,20}+\@[0-9a-zA-Z-_$#]{2,20}+\.[a-zA-Z]{2,5}[']/", $this->email) ) {
        self::verificar("Error en: email: se espera formato estandar: algo@algunsitio.com, datos: ".$this->email);
      }
    }
    if ( preg_match( "/[^0-9]/", $this->tipoPersonal) ) {
      self::verificar("Error en: tipo de personal: se espera un valor apropiado del formulario, datos: ".$this->tipoPersonal);
    }
    if ( preg_match( "/[^0-9]/", $this->codCargo) ) {
      self::verificar("Error en: tipo de cargo: se espera un valor apropiado del formulario, datos: ".$this->codCargo);
    }

  }

  /**
  * @author [slayerfat]
  *
  * {@internal esto es para autogenerar el null
  * para los campos que acepten null en la base de datos.}
  *
  * @return void [solo genera las variables internas de la calse]
  */
  private function setNull(){
    if ($this->s_apellido == "") {
      $this->s_apellido = "default";
    }else{
      $this->s_apellido = "'$this->s_apellido'";
    }
    $this->p_apellido = "'$this->p_apellido'";
    $this->p_nombre = "'$this->p_nombre'";
    if ($this->s_nombre == "") {
      $this->s_nombre = "default";
    }else{
      $this->s_nombre = "'$this->s_nombre'";
    }

    $this->nacionalidad = "'$this->nacionalidad'";
    $this->cedula = "'$this->cedula'";

    if ($this->celular == "") {
      $this->celular = "default";
    }else{
      $this->celular = "'$this->celular'";
    }
    if ($this->telefono == "") {
      $this->telefono = "default";
    }else{
      $this->telefono = "'$this->telefono'";
    }
    if ($this->telefonoOtro == "") {
      $this->telefonoOtro = "default";
    }else{
      $this->telefonoOtro = "'$this->telefonoOtro'";
    }

    if ($this->certificado_1 == "") {
      $this->certificado_1 = "default";
    }else{
      $this->certificado_1 = "'$this->certificado_1'";
    }
    if ($this->certificado_2 == "") {
      $this->certificado_2 = "default";
    }else{
      $this->certificado_2 = "'$this->certificado_2'";
    }
    if ($this->certificado_3 == "") {
      $this->certificado_3 = "default";
    }else{
      $this->certificado_3 = "'$this->certificado_3'";
    }
    if ($this->certificado_4 == "") {
      $this->certificado_4 = "default";
    }else{
      $this->certificado_4 = "'$this->certificado_4'";
    }
    if ($this->descripcion_1 == "") {
      $this->descripcion_1 = "default";
    }else{
      $this->descripcion_1 = "'$this->descripcion_1'";
    }
    if ($this->descripcion_2 == "") {
      $this->descripcion_2 = "default";
    }else{
      $this->descripcion_2 = "'$this->descripcion_2'";
    }
    if ($this->descripcion_3 == "") {
      $this->descripcion_3 = "default";
    }else{
      $this->descripcion_3 = "'$this->descripcion_3'";
    }
    if ($this->descripcion_4 == "") {
      $this->descripcion_4 = "default";
    }else{
      $this->descripcion_4 = "'$this->descripcion_4'";
    }

    $this->fecNac = "'$this->fecNac'";
    $this->sexo = "'$this->sexo'";
    $this->email = "'$this->email'";
    $this->fecMod = "current_timestamp";
  }

}

?>
