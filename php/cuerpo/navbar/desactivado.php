<?php if ( isset($_SESSION['cod_tipo_usr']) ) : ?>
	<?php if ($_SESSION['cod_tipo_usr'] <> null) : ?>
		<div id="bienvenido">
			<i>Bienvenido: </i>
			<strong>
				<?=$_SESSION['seudonimo']?>
			</strong>
			<?php $cerar = enlaceDinamico('cerrar.php'); ?>
			| <a href="<?php echo $cerar ?>">Salir</a>
		</div>
		<div id="navbar">
			<ul>
				<?php $index = enlaceDinamico(); ?>
				<li><a href="<?php echo $index ?>">Inicio</a></li>
			</ul>
		</div>
	<?php else : ?>
		<div>
			<i>Bienvenido! por favor Acceda al sistema.</i>
		</div>
	<?php endif; ?>
<?php else: ?>
	<div id="navbar">
		<ul>
			<?php $index = enlaceDinamico(); ?>
			<li><a href="<?php echo $index ?>">Inicio</a></li>
		</ul>
	</div>
<?php endif; ?>
