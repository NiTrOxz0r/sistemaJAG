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
			// PHP_SELF regresa el camino absoluto al archivo.
			// dividimos self en un array:
			$explotaDir = explode('/', $_SERVER['PHP_SELF']);
			// vemos la dimension del array:
			$dimension = count($explotaDir);
			//self (donde sea que este footer.php)
			// es el ultimo lugar del array:
			$cerrar = $explotaDir[$dimension-1];
			// como queremos ir a index.php entonces:
			$cerrar = "cerrar.php";
			//se cambia el camino relativo:
			$puntoPunto = "../";
			for ($i=4; $i < $dimension; $i++) { 
				$cerrar = $puntoPunto.$cerrar;
			}
		?> 
		PARA IR A INDEX: <a href="<?php echo $enlace ?>">SALIR</a>
		PARA ELIMINAR SESION: <a href="<?php echo $cerrar ?>">SALIR</a>
	</p>
</div>