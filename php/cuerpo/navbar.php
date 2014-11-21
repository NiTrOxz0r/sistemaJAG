<?php if ( isset($_SESSION['cod_tipo_usr']) ) : ?>
	<?php if ($_SESSION['cod_tipo_usr'] <> 0) : ?>
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
				<?php $alumno = enlaceDinamico('alumno/body.php'); ?>
				<li><a href="<?php echo $alumno ?>">Alumnos</a></li>
				<?php $pa = enlaceDinamico('Personal_Autorizado/menucon.php'); ?>
				<li><a href="<?php echo $pa ?>">Padres y Allegados</a></li>
				<?php $pa = enlaceDinamico('docente/menucon.php'); ?>
				<li><a href="<?php echo $docentes ?>">Docentes</a></li>
				<?php $pa = enlaceDinamico('usuario/menucon.php'); ?>
				<li><a href="<?php echo $usuarios ?>">Usuarios</a></li>
			</ul>
		</div>
	<?php else : ?>
		<div>
			<i>Bienvenido! por favor Acceda al sistema.</i>
		</div>
	<?php endif; ?>
<?php endif; ?>