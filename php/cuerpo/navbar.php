<?php if ( isset($_SESSION['cod_tipo_usr']) ) : ?>
	<?php if ($_SESSION['cod_tipo_usr'] <> 0) : ?>
		<div>
			<i>Bienvenido: </i>
			<strong>
				<?=$_SESSION['seudonimo']?>
			</strong>
			| <a href="cerrar.php">Salir</a>
		</div>
	<?php else : ?>
		<i>Bienvenido! Acceda al sistema.</i>
	<?php endif; ?>
<?php endif; ?>
