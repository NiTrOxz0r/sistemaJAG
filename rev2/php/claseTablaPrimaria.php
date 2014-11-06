<?php 
	
/**
* @author Granadillo Alejandro.
* @copyright MIT/GNU/Otro??? Octurbre 2014
* 
* @internal clase que define todas las tablas
* primarias, es decir, todas las no referenciales
* (tabla_sexo). esta en esta clase impletado
* consultar, modificar, registrar para
* todas las tablas del sistema
* 
* 
* @deprecated considerado el archivo
* o libreria principal que todas las paginas
* y archivos o librerias adicionales, hagan referencia de.
*
* @see .php
* @example .php
* @todo ampliar segun sea necesario segun
* los objetivos necesarios:
* 
* @version 0.2
* 
* 
*/
class TablaPrimaria{

	public $datos = array();
	private $codigo;
	private $status;
	private $codUsrReg;
	private $codUsrMod;
	private $fecReg;
	private $fecMod;



	function consultar($tabla, $array){

		/*
		* si el array es de 1 solo campo entonces
		* hace un query completo con ese campo
		* si no, hace un query segun el tamaño del arreglo.
		*/

		if ( count($array) === 1 ) {
			$campos = $array;
			$start = new conexion();
			// $resultado = $start->query('debugSUFC' , $tabla, $campos);
			if ( $resultado = $start->query('selectUnoFullCampos' , $tabla, $campos) ) {
				//si hay alguin registro
				if ( $resultado->num_rows == 1 ) {
					//si el registro es solo uno
					$this->datos[0] = mysqli_fetch_assoc($resultado);
					mysqli_free_result($resultado);
					return true;
				}else if ( $resultado->num_rows > 1 ) {
					$i = 0;
					while ($datos = mysqli_fetch_array($resultado)) {
						foreach ($datos as $campo => $valor) {
							$this->datos[$i][$campo] = $datos[$campo];

						}
						$i++;
					}
					mysqli_free_result($resultado);
					return true;
				}

			}else{
				// si el registro no existe
				$this->datos[0] = $array;
				return false;
			}

		}else{
			$campos = $array;
			$start = new conexion();
			$resultado = $start->query('selectTodoCondicion' , $tabla, $campos);
			// $resultado = $start->query('debugSTC' , $tabla, $campos);
			if ( $resultado ) {
				$i = 0;
				while ($datos = mysqli_fetch_array($resultado)) {
					foreach ($campos as $campo => $valor) {
						$this->datos[$i][$campo] = $datos[$campo];

					}
					$i++;
				}
				
				mysqli_free_result($resultado);
				return true;
			}else{
				$this->datos[0] = $array;
				return false;
			}
		}

	}

	function consultarListado($tabla, $columnas){
		$start = new conexion();
		// $resultado = $start->query('debugSTF' , $tabla, $columnas);
		$resultado = $start->query('selectTodoFull' , $tabla, $columnas);
		if ( $resultado ) {
			$i = 0;
			while ($datos = mysqli_fetch_array($resultado)) {
				foreach ($datos as $campo => $valor) {
					$this->datos[$i][$campo] = $datos[$campo];

				}
				$i++;
			}
			
			mysqli_free_result($resultado);
			return true;
		}else{
			$this->datos[0] = $array;
			return false;
		}
	}

	function insertar($tabla, $array){
		$this->insertInto($tabla, $array);
	}

	function actualizar($tabla, $array){
		if ( isset($array['cod_usr_reg'] ) ) {
			$array['cod_usr_reg'] = null;
		}
		if ( isset($array['fec_reg'] ) ) {
			$array['fec_reg'] = null;
		}
		if ($this->updateSet($tabla, $array)) {
			return true;
		}else{
			return false;
		}
	}

	private function insertInto($tabla, $array){


		if ( count($array) > 0 ) {

			$start = new conexion();
			$resultado = $start->query('insertFull' , $tabla, $array);
			// $resultado = $start->query('debugIF' , $tabla, $array);
			if ($resultado) {
				$this->consultar($tabla, $array);
				return true;
				}
			}else{
				$this->datos[0] = $array;
				return false;
			}


	}

	private function updateSet($tabla, $array){

		if ( count($array) > 0 ) {
			$start = new conexion();
			$resultado = $start->query('updateUno' , $tabla, $array);
			return true;
		}else{
			$this->datos = $array;
			return null;
		}

	}

	public function chequeaUsuario(){
		// codigo del usuario que esta haciendo 
		// la actualizacion del registro
		// ya validado por el sistema.
		if ( isset($_SESSION['codUsrMod']) ) {
			$this->codUsrMod = $_SESSION['codUsrMod'];
		}else{
			die(header("Location: ingreso.php?codUsrMod=false"));
			echo "string";
		}
	}

}

?>