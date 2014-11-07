<?php //if ( isset($_SESSION['cod_tipo_usr']) ): ?>

	<?php //if ($_SESSION['cod_tipo_usr'] <> 0): ?>
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
					<a href="form_reg_A.php"> Registar un Alumno </a>
					&nbsp;&nbsp;
				</td>
				<td>
					&nbsp;&nbsp;
					<a href="menucon.html"> Consultar un Alumno </a>
					&nbsp;&nbsp;
				</td>
			</table>
		</div>
	<?php //else: ?>
	<?php	//header("location: ../index.php"); ?>
	<?php //endif ?>
	
<?php //else: ?>
	<?php //$_SESSION['cod_tipo_usr'] = 0; ?>
	<?php	//header("location: ../index.php"); ?>
<?php //endif ?>