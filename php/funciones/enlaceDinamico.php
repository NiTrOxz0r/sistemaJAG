<?php
	function enlaceDinamico($archivo='index.php'){
		// PHP_SELF regresa el camino absoluto al archivo.
		// dividimos self en un array:
		$explotaDir = explode('/', $_SERVER['PHP_SELF']);
		// vemos la dimension del array:
		$dimension = count($explotaDir);
		//self (donde sea que este footer.php)
		// es el ultimo lugar del array:
		$valor = $explotaDir[$dimension-1];
		// como queremos ir a index.php entonces:
		// $index = "index.php";
		//se cambia el camino relativo:
		$puntoPunto = "../";
		for ($i=4; $i < $dimension; $i++) { 
			$archivo = $puntoPunto.$archivo;
		}

		return $archivo;
	}
?>