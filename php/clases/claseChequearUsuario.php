<?php

/**
* @author Granadillo Alejandro.
*
* {@internal [hecho con la intension de
* chequear los datos referentes a usuario del
* sistema (seudonimo y clave) apropiado
* al sistema de encriptamiento de clave
* BSCRYPT utilizado en nuestro sistema.]}
*
* @see chequearGenericoEjemplo.php
* @example chequearGenericoEjemplo.php
* @todo ampliar segun sea necesario segun
* los objetivos necesarios:
*
* @version 1.2
*
*
*/
class ChequearUsuario extends ChequearGenerico{

  public $seudonimo;
  public $clave = array('simple' => null, 'completo' => null);

  /**
   * [__construct crea las variables del objeto
   * con los metodos setNull y chequearForma]
   * @param [string] $seudonimo [cadena de texto del campo seudonimo]
   * @param [array]  $clave     [este arreglo acepta
   * claves tanto simples (no encriptadas) como claves
   * completas (encriptadas).]
   *
   * {@internal [el campo clave acepta clave como:
   * 'simple' => $_POST['clave'] o como
   * 'completo' => $_POST['clave']
   * eso es lo mismo que decir:
   * 'simple' => 'claveSecreta', etc.
   *
   * ahorita no tengo tiempo para
   * hacerles un tutorial, si no entiendes como usar areglos,
   * entonces estudien. -slayerfat.]}
   */
  function __construct(
    $seudonimo,
    $clave = null
  ){
    //variables del objerto:
    $conexion = conexion();//desde master.php > conexion.php
    $this->seudonimo = mysqli_escape_string($conexion, trim($seudonimo));
    if ( isset($clave['simple']) ) {
      $this->clave['simple'] = mysqli_escape_string( $conexion, trim($clave['simple']) );
    }else if ( isset($clave['completo']) ) {
      $this->clave['completo'] = mysqli_escape_string( $conexion, trim($clave['completo']) );
    }else{
      $this->clave = null;
    }
    self::setNull();
    self::chequeaForma();
    mysqli_close($conexion);
  }

  private function setNull(){
    preg_match("/[a-zA-Z0-9]{3,20}/", $this->seudonimo, $match);
    $this->seudonimo = "'$match[0]'";

    if ($this->clave <> null ) {

      if ( isset($this->clave['simple']) ) {
        preg_match("/[\$a-zA-Z0-9]{6,15}/", $this->clave['simple'], $match);
        $this->clave['simple'] = "'$match[0]'";
      }else {
        preg_match("/[\$a-zA-Z0-9\.\/-_*]{60}/", $this->clave['completo'], $match);
        $this->clave['completo'] = "'$match[0]'";
      }

    }else{
      $this->clave = null;
    }
  }

  /**
  *
  * @internal {chequea que los datos
  * existan antes de enviarlos a la base de datos.
  * esta implementacion es diferente ya que
  * es la iniciacion al sistema, esta pensado
  * para ser usado una sola vez.}
  * @version 1.1
  *
  * @return void
  * esta funcion no regresa nada.
  * se asume que die() sucede si algo esta mal
  * en las variables.
  */
  protected function chequeaForma(){

    $clase = get_class($this);
    $togo = "Location: registro.php?seudonimo=false&clase=".$clase;
    if ($this->seudonimo == "''") {
      die( header($togo) );
    }
    $togo = "Location: registro.php?seudonimo=$this->seudonimo&length=".strlen($this->seudonimo)."&clase=".$clase;
    if ( strlen($this->seudonimo) < 5 or strlen($this->seudonimo) > 22) {
      die( header($togo) );
    }
    if ($this->clave <> null) :
      $togo = "Location: registro.php?clave=false&clase=".$clase;
      if ($this->clave == "") {
        die( header($togo) );
      }
      if ( $this->clave['completo'] <> null ) {
        $togo = "Location: registro.php?completo=1&clave=length_is_".strlen($this->clave['completo'])."&contenido=".$this->clave['completo']."&clase=".$clase;
        if ( strlen($this->clave['completo']) <> 62) {
          die( header($togo) );
        }
      }elseif ( $this->clave['simple'] <> null ) {
        $togo = "Location: registro.php?simple=1&clave=length_is_".
        strlen($this->clave['simple'])."&clase=".$clase;
        if ( strlen($this->clave['simple']) < 7 or strlen($this->clave['simple']) > 16) {
          die( header($togo) );
        }
      }
    endif;
  }
  /**
   * [funcion creada para dar la clave sin las comillas]
   *
   * @internal [esto sirve para obtener la clave sin comillas,
   * util para el password_verify() entre otras cosas.]
   *
   * @param  [string] $clave [clave a limpiar con comillas ej: 'megaClaveSecreta']
   * @return [string] [devuelve el string dentro de comillas.]
   */
  public function clave($clave) {

    preg_match("/[\$a-zA-Z0-9\.\/-_*]{6,60}/", $clave, $match);
    return $match[0];
  }
}

?>
