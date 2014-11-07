<?php 

/**
* @author Granadillo Alejandro.
* @copyright MIT/GNU/Otro??? Octurbre 2014
* 
* @internal 
* 
* 
* @deprecated 
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
class conexion{

	protected $servidor;
	protected $usuario;
	protected $clave;
	protected $bd;

	function __construct(){
		$this->servidor  = 'localhost';
		$this->usuario   = 'php1';
		$this->clave 	   = 'clavephp';
		$this->bd 	   	 = 'JAG';
	}

	private function consultar($query){

		$conexion  = mysqli_connect(
			$this->servidor,$this->usuario,$this->clave,$this->bd) 
			or die( 'error de conexion: '.mysqli_connect_error() );

		$resultado = mysqli_query($conexion,$query) 
			or die('Error del query: '.$query.'<br />'.
			mysqli_errno($conexion).' <a href="index.php">volver</a>');

		mysqli_close($conexion);

		if ($resultado->num_rows == 0) {
			return null;
		}else{
			// $array = mysqli_fetch_array($resultado);
			// return $array;
			// var_dump($resultado);
			return $resultado;
		}
		
	}

	private function insertar($query){

		$conexion  = mysqli_connect(
			$this->servidor,$this->usuario,$this->clave,$this->bd) 
			or die( 'error de conexion: '.mysqli_connect_error() );

		$resultado = mysqli_query($conexion,$query) 
			or die('Error del query: '.$query.'<br />'.
			mysqli_errno($conexion).' <a href="index.php">volver</a>');

		mysqli_close($conexion);

		return true;
		
	}

	public function query($tipo = true, $tabla, $campos){
		//chequea si los campos existen
		if ( (is_array($campos)) or ($campos instanceof Traversable) ) {
			$arrayCampos = array();
			$arrayCampos = $campos;
			//convierte los campos a (campo1, campo2, campoN)
			$texto = "";
			$texto2 = "(";
			$texto3 = "(";
			foreach ( $arrayCampos as $campo => $valor) {
				$texto = $texto.$campo.', ';
				if ($valor) {
					$texto3 = $texto3.$campo.', ';
					$texto2 = $texto2.$valor.', ';
				}
				
			}
			$columnas = chop($texto, ", ");
			$columnasInsert = chop($texto3, ", ").")";
			$valores  = chop($texto2, ", ").")";
		}else{
			$columnas = $campos;
		}
		
		switch ($tipo) {
			case 'selectListado':
				$query = "SELECT * from $tabla where status = 1";
				break;

			case 'selectUnoFull':
				$query = "SELECT $columnas from $tabla where ";
				foreach ($arrayCampos as $campo => $valor) {
					$query = $query.$campo.' = '.$valor.' AND ';
				}
				$query = $query.'status = 1;';
				break;

			case 'debugSUF': //selectUnoFull
				$query = "SELECT $columnas from $tabla where ";
				foreach ($arrayCampos as $campo => $valor) {
					$query = $query.$campo.' = '.$valor.' AND ';
				}
				$query = $query.'status = 1;';
				echo $query;
				die();
				break;

			case 'selectUnoFullCampos':
				$query = "SELECT * from $tabla where ";
				foreach ($arrayCampos as $campo => $valor) {
					$query = $query.$campo.' = '.$valor.' AND ';
				}
				$query = $query.'status = 1;';
				break;

			case 'debugSUFC':
				$query = "SELECT * from $tabla where ";
				foreach ($arrayCampos as $campo => $valor) {
					$query = $query.$campo.' = '.$valor.' AND ';
				}
				$query = $query.'status = 1;';
				echo $query;
				die();
				break;

			case 'selectTodoFull':
				$query = "SELECT $columnas from $tabla where status = 1;";
				break;

			case 'debugSTF'://selectTodoFull
				$query = "SELECT $columnas from $tabla where status = 1;";
				echo $query;
				die();
				break;

			case 'selectTodoCondicion':
				$query = "SELECT $columnas from $tabla where ";
					foreach ($arrayCampos as $campo => $valor) {
						if ($valor === null) {
							//nada
						}else{
							$query = $query.$campo.' = '.$valor.' AND ';
						}
					}
					$query = $query.'status = 1 ORDER by codigo;';
					break;

			case 'debugSTC': //selectTodoCondicion
				$query = "SELECT $columnas from $tabla where ";
				foreach ($arrayCampos as $campo => $valor) {
					if ($valor === null) {
						//nada
					}else{
						$query = $query.$campo.' = '.$valor.' AND ';
					}
				}
				$query = $query.'status = 1;';
				echo $query;
				die();
				break;

			case 'insertFull':
				$query = "INSERT into $tabla $columnasInsert values (";
				foreach ($arrayCampos as $campo => $valor) {
					if ($valor === null) {
						//nada
					}else{
						$query = $query.$valor.', ';
					}
				}

				$query = chop($query, ", ").");";
				return $this->insertar($query);
				break;

			case 'debugIF':
				$query = "INSERT into $tabla ($columnas)
					values $valores;";
				echo $query;
				die();
				break;

			case 'updateUno':
				$query = "UPDATE $tabla SET ";
				foreach ($arrayCampos as $campo => $valor) {
					if ($valor === null) {
						// nada
					}else if ($campo == 'codigo'){
						$fin = " where codigo = $valor;";
						
					}else{
						$query = $query.$campo.' = '.$valor.', ';
					}
				}

				$query = chop($query, ", ");
				$query = $query.$fin;
				return $this->insertar($query);
				break;

			case 'debugU':
				$query = "UPDATE $tabla SET ";
				foreach ($arrayCampos as $campo => $valor) {
					if ($valor === null) {
						// nada
					}else if ($campo == 'codigo'){
						$fin = " where codigo = $valor;";
						
					}else{
						$query = $query.$campo.' = '.$valor.', ';
					}
				}

				$query = chop($query, ", ");
				$query = $query.$fin;
				echo $query;
				die();
				break;

			case true:
				$query = $campos;
				break;

			case 'debugT':
				$query = $campos;
				echo $query;
				die();
				break;

			default:
				echo "query error, sin tipo seleccionado";
				break;
		}
		//var_dump($this->consultar($query));
		return $this->consultar($query);

	}
}

?>