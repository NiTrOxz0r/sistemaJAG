<?php

	require("../php/conexion.php");


	print_r($_POST);

	$cedulan 		= $_POST['cedula'];
	$cedula_escolarn = $_POST['cedula_escolar'];
	$nacionalidadn	= $_POST['nacionalidad'];
	$p_nombren		= $_POST['p_nombre'];
	$s_nombren 		= $_POST['s_nombre'];
	$p_apellidon 	= $_POST['p_apellido'];
	$s_apellidon 	= $_POST['s_apellido'];
	$telefonon 		= $_POST['telefono'];
	$telefono_otron	= $_POST['telefono_otro'];
	$sexon 			= $_POST['sexo'];
	$lugar_nacn 		= $_POST['lugar_nac'];
	$fec_nacn 		= $_POST['fec_nac'];
	$cod_direccionn 	= $_POST['cod_parro'];
	$acta_num_part_nacn 		 = $_POST['acta_num_part_nac'];
 	$acta_folio_num_part_nacn = $_POST['acta_folio_num_part_nac'];
	$plantel_procedencian	 = $_POST['plantel_procedencia'];
	$repitienten 	= $_POST['repitiente'];
	$alturan 		= $_POST['altura'];
	$peson 			= $_POST['peso'];
	$camisan 		= $_POST['camisa'];
 	$pantalonn 		= $_POST['pantalon'];
 	$zapaton 		= $_POST['zapato'];

 	$sql = " update alumno set nacionalidad = '$nacionalidadn', p_nombre = '$p_nombren',
	s_nombre = '$s_nombren', p_apellido = '$p_apellidon', s_apellido = '$s_apellidon',
	telefono = '$telefonon', telefono_otro = '$telefono_otron', sexo = '$sexon', lugar_nac = '$lugar_nacn',
	fec_nac = '$fec_nacn', cod_direccionn = 'cod_parro', acta_num_part_nac = '$acta_num_part_nacn',
	acta_folio_num_part_nac = '$acta_folio_num_part_nacn', plantel_procedencia = '$plantel_procedencian',
 	repitiente = '$repitienten', altura = '$alturan', peso = '$peson', camisa = '$camisan', pantalon = '$pantalonn',
	zapato = '$zapaton' where cedula = '$cedulan'; ";

 	//echo $sql;
 	//$re = mysql_query($sql, $conn) or die ("Error al Conectar a la Base". mysql_error());
	$re = conexion($sql, 1);
	echo "<br>"."Actualizacion Exitosa";
	echo "<p align=center>"."<a href=menucon.html>Volver</a>"."</p>";

?>