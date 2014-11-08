<div>
	
	<p>
		<?php var_dump($_SESSION) ?>
	</p>

	<p>
		<?php
			// PHP_SELF regresa el camino absoluto al archivo.
			// dividimos self en un array:
			$explotaDir = explode('/', $_SERVER['PHP_SELF']);
			// vemos la dimension del array:
			$dimension = count($explotaDir);
			//self (donde sea que este footer.php)
			// es el ultimo lugar del array:
			$enlace = $explotaDir[$dimension-1];
			// como queremos ir a index.php entonces:
			$enlace = "index.php";
			//se cambia el camino relativo:
			$puntoPunto = "../";
			for ($i=4; $i < $dimension; $i++) { 
				$enlace = $puntoPunto.$enlace;
			}
		?> 
		PARA IR A INDEX: <a href="<?php echo $enlace ?>">SALIR</a>
	</p>
</div>