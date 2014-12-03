<?php
/**
* @author Granadillo Alejandro.
*
* @internal chequea que los datos existan antes de
* enviarlos a la base de datos
*
* @deprecated
*
* @see chequearGenericoEjemplo.php
* @example chequearGenericoEjemplo.php
* @todo ampliar segun sea necesario segun
* los objetivos necesarios:
*
* @version 1.1
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
  protected $status = 1;
  protected $info = 'todo parece en orden.';

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
    $this->codUsrMod = $codUsrMod;
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
        self::verificar($togo);
      }else{
        if ($valor === "") {
          $togo = "Location: registro.php?".$campo."=vacio&clase=".$clase;
          self::verificar($togo);
        }
      }
    }

  }

  /**
   * sirve para comprobar las variables de la clase.
   * @return void se asume die cuando algo falla.
   */
  private function chequeame(){
    // si cedula es mayor a 8 digitos o menor o igual a 5 digitos
    // se devuelve a registro, cedula de 99999 <--- no existe
    // y si existe esta muerto o loco o fuera de la ley o
    // ALGUN AGENTE DEL CEBIN!!!
    // de hecho 6 digitos tambien porque no creo
    // que exista alguien vivo con cedula menor de 1 millon,
    // pero como no tengo acceso a la onidex, lo dejo en 5.

    if ( !is_numeric($this->cedula) ) {
      self::verificar("Location: registro.php?cedulaNumeric=false");
    }
    if ( strlen($this->cedula)>8 or strlen($this->cedula)<=6 ) {
        self::verificar( "Location: registro.php?cedulaError=1_largo_cedula___".strlen($this->cedula) );
    }

    if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_nombre) ) {
     self::verificar("Location: registro.php?p_nombreNumeric=true");
    }

    if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_nombre) ) {
      self::verificar("Location: registro.php?s_nombreNumeric=true");
    }

    if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->p_apellido) ) {
      self::verificar("Location: registro.php?p_apellidoNumeric=true");
    }

    if ( preg_match( "/^A-Za-z$^'$^áéíóú$^ÁÉÍÓÚ$/", $this->s_apellido) ) {
      self::verificar("Location: registro.php?s_apellidoNumeric=true");
    }

    if ( $this->nacionalidad <> 'v' and $this->nacionalidad <> 'e' ) {
      self::verificar("Location: registro.php?nacionalidad=notVorE");
    }

    if ($this->telefono <> 'null') {
      if ( !is_numeric($this->telefono) ) {
      self::verificar("Location: registro.php?telefonoNumeric=false");
      }
      if ( !preg_match( '/^\d{11}$/', $this->telefono) ) {
        self::verificar("Location: registro.php?telefonoLength=false");
      }
    }

    if ($this->telefonoOtro <> 'null') {
      if ( !is_numeric($this->telefonoOtro) ) {
      self::verificar("Location: registro.php?telefonoOtroNumeric=false");
      }
      if ( !preg_match( '/^\d{11}$/', $this->telefonoOtro) ) {
        self::verificar("Location: registro.php?telefonoOtroLength=false");
      }
    }

    if ($this->fecNac <> 'current_timestamp') {
      if ( preg_match( "/[^0-9$^-]/", $this->fecNac) ) {
      self::verificar("Location: registro.php?fecNacNumeric=false");
      }
    }

    if ($this->sexo <> '0' and $this->sexo <> '1') {
      if ( !is_numeric($this->telefonoOtro) ) {
      self::verificar("Location: registro.php?sexo=malDefinido");
      }
    }

    if ( !is_numeric($this->codigoDireccion) ) {
      self::verificar("Location: registro.php?codigoDireccionNumeric=false");
    }
  }

  /**
   * [verificar cambia la variable info a el texto de error que genera
   * el metodo de chequeame]
   * @param  string $info [el texto de error]
   * @return void
   */
  protected function verificar($info){
    $this->info = $info;
    $this->status = 0;
  }
  /**
   * [valido para hacer chequeos externos a la clase]
   * @return number 0 si algun chequeo falla
   */
  public function valido(){
    return $this->status;
  }
  /**
   * regresa la info del error
   * @return string los datos de error de function chequeame.
   */
  public function info(){
    return $this->info;
  }



}

?>
