<?php if ( isset($_SESSION['cod_tipo_usr']) ) : ?>
	<?php if ($_SESSION['cod_tipo_usr'] <> 0) : ?>
		<div>
			<i>Bienvenido: </i>
			<strong>
				<?=$_SESSION['seudonimo']?>
			</strong>
			<?php $cerar = enlaceDinamico('cerrar.php'); ?>
			| <a href="<?php echo $cerar ?>">Salir</a>
		</div>
	<?php else : ?>
		<div>
			<i>Bienvenido! Acceda al sistema.</i>
		</div>
	<?php endif; ?>
<?php endif; ?>
