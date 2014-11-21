<?php

function debugVariables(){ ?>
	<div style="border:2px solid black">
		<h5>
			<strong>
				<i>SISTEMA DE DEBUG INTERNO:</i>
			</strong>
		</h5>
		<p>
			<h6>session:</h6>
			<?php var_dump($_SESSION) ?>
		</p>

		<p>
			<h6>post:</h6>
			<?php var_dump( $_POST ? $_POST : null ); ?>
		</p>

		<p>
			<h6>get:</h6>
			<?php var_dump( $_GET ? $_POST : null ); ?>
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
<?php
}

?>
