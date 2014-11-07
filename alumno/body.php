<?php session_start(); ?>
<?php if ( isset($_SESSION['cod_tipo_usr']) ): ?>

	<?php if ($_SESSION['cod_tipo_usr'] <> 0): ?>
		<div>
			<center>
				<h1>Sistema JAG.</h1>
				<h2>opciones</h2>
				<h2>Alumno.</h2>
			</center>

			<table border="1" align="center">
				<tr>
				<td>
					&nbsp;&nbsp;
					<a class="click" href="alumno/form_reg_A.php"> Registar un Alumno </a>
					&nbsp;&nbsp;
				</td>
				<td>
					&nbsp;&nbsp;
					<a class="click" href="alumno/menucon.php"> Consultar un Alumno </a>
					&nbsp;&nbsp;
				</td>
			</table>
		</div>
		<div>
			<p>
				<center>
					<a class="click" href="javascript:history.go(-1)">Volver al menu</a>
				</center>
			</p>
		</div>
		<script type="text/javascript" src="java/ajax/cargadorOnClick.js"></script>
	<?php else: ?>
	<?php	header("location: ../index.php"); ?>
	<?php endif ?>
	
<?php else: ?>
	<?php $_SESSION['cod_tipo_usr'] = 0; ?>
	<?php	header("location: ../index.php"); ?>
<?php endif ?>