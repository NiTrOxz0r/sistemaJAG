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
				<?php $inscripcion = enlaceDinamico('Personal_Autorizado/form_reg_P.php'); ?>
				<li><a href="<?php echo $inscripcion ?>">Proceso de inscripcion 2014-2015</a></li>
				<?php $alumno = enlaceDinamico('alumno/menucon.php'); ?>
				<li><a href="<?php echo $alumno ?>">Alumnos</a></li>
				<?php $pa = enlaceDinamico('Personal_Autorizado/menucon.php'); ?>
				<li><a href="<?php echo $pa ?>">Padres y Allegados</a></li>
				<?php $curso = enlaceDinamico('curso/menucon.php'); ?>
				<li><a href="<?php echo $curso ?>">Cursos</a></li>
				<?php $usuario = enlaceDinamico('usuario/menucon.php'); ?>
				<li><a href="<?php echo $usuario ?>">Usuarios</a></li>
			</ul>
		</div>
	<?php else : ?>
		<div>
			<i>Bienvenido! por favor Acceda al sistema.</i>
		</div>
	<?php endif; ?>
<?php endif; ?>
