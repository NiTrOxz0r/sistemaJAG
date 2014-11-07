<?php
	session_start();
	require("php/conexion.php");
	//include('security.php');
	
		
?>

<html>
	<head>
		<title>Sistema de Inscripcion</title>
		<meta name="language" content="es" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		
		<div>
			<i>Bienvenido: </i>
			<strong>
				<?=$_SESSION['seudonimo']?>
			</strong>
			| <a href="cerrar.php">Salir</a>
		</div>
		<div>
			<center><h1>Sistema JAG.</h1></center>
			<center><h2>opciones</h2></center>

			<TABLE BORDER="1" align="center">
				<tr>
				<td>&nbsp;&nbsp;<A HREF="alumno/index.html"><h2> Gestionar Alumno. </h2></A>&nbsp;&nbsp;</td>
			</TABLE>
			<br>
			<TABLE BORDER="1" align="center">
				<tr>
				<td>&nbsp;&nbsp;<A HREF="padres_representante/index.html"> <h2>Gestionar Padres y Representante.</h2> </A>&nbsp;&nbsp;</td>
			</TABLE>
			<br>	
			<TABLE BORDER="1" align="center">
				<tr>
				<td>&nbsp;&nbsp;<A HREF="profesor/index.html"> <h2>Gestionar Profesor.</h2> </A>&nbsp;&nbsp;</td>
			</TABLE>
			<br>	
			<TABLE BORDER="1" align="center">
				<tr>
				<td>&nbsp;&nbsp;<A HREF="personal_autorizado/index.html"> <h2>Gestionar Personal Autorizado.</h2> </A>&nbsp;&nbsp;</td>
			</TABLE>
		</div>
	</body>
</html>			

<?php

?>