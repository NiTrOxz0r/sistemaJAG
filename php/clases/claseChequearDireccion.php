<?php

/**
* @author Granadillo Alejandro.
*
* @internal actualizado: adaptado a nueva
* definicion de tabla direccion.
* esta clase chequea los campos del formulario
* y genera variables ya limpias para mysql.
*
* @todo ampliar segun sea necesario segun
* los objetivos necesarios
*
* @version 1.3
*
*/
class ChequearDireccion extends ChequearGenerico{

  function __construct(
    $codUsrMod,
    $codPersona,
    $codParroquia,
    $direccionExacta
    ){

    $con = conexion();//desde master.php > conexion.php
    $this->codUsrMod = mysqli_escape_string($con, trim($codUsrMod));
    $this->codPersona = mysqli_escape_string($con, trim($codPersona));
    $this->codParroquia = mysqli_escape_string($con, trim($codParroquia));
    $this->direccionExacta = mysqli_escape_string($con, trim($direccionExacta));
    //metodos internos:
    //para poner variables nulas si es necesario:
    self::setNull();
    //chequeaomos la forma (el objeto como tal):
    self::chequeaForma();
    self::chequeame(); //heredado de ChequearGenerico
    mysqli_close($con);
  }

  /**
  *
  * @internal {chequea que los datos
  * existan antes de enviarlos a la base de datos.
  * @version 1.2
  *
  *
  * @return void
  * esta funcion no regresa nada.
  * se asume que die() sucede si algo esta mal
  * en las variables.
  */
  private function chequeame(){
    if ( !is_numeric($this->codParroquia) ) {
      self::verificar("Error: se espera valor apropiado de estado, municipio y parroquia del formulario, datos: ".$this->codParroquia);
    }
    if ( !is_numeric($this->codPersona) ) {
      self::verificar("Error faltal, datos: ".$this->codPersona);
    }
    if (strlen($this->direccionExacta) > 150) {
      self::verificar("Error en: direccion detallada: datos excede limite maximo, datos: ".$this->direccionExacta.", largo: ".strlen($this->direccionExacta));
    }elseif (strlen($this->direccionExacta) < 4){
      $this->direccionExacta = "'Sin Registro, favor Actualizar-$this->codPersona-Registro Autogenerado por el sistema.'";
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
    if ($this->direccionExacta == "") {
      $this->direccionExacta = "'Sin Registro, favor Actualizar-$this->codPersona-Registro Autogenerado por el sistema.'";
    }elseif (strlen($this->direccionExacta) < 5){
      $this->direccionExacta = "'Sin Registro, favor Actualizar-$this->codPersona-Registro Autogenerado por el sistema.'";
    }else{
      $this->direccionExacta = "'$this->direccionExacta'";
    }
  }

}

?>
