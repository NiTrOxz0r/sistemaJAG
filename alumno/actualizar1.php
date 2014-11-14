<?php

	if(!isset($_SESSION)){ 
  	session_start(); 
	}
	$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
	require_once($enlace);
// invocamos validarUsuario.php desde master.php
	validarUsuario(1);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
	empezarPagina();

	$con = conexion();

 	$status         =  			1;
	$cod_usr_reg    = 			$_SESSION['codUsrMod'];
	$cod_usr_modn  	=   		$_SESSION['codUsrMod'];
  	
  //ACTUALIZO LA DIRECCION DEL REPRESENTANTE
  //LA ENVIO A LA TABLA direccion_p_a
  
  $cod_parroquian 		=	mysqli_escape_string($con, $_POST['cod_parro']);
	$direccion_exactan	= mysqli_escape_string($con, $_POST['direcc']);
	
	$sqlDir = "UPDATE direccion_alumno set 
	cod_parroquia='$cod_parroquian', 
	direccion_exacta='$direccion_exactan',  
	cod_usr_mod='$cod_usr_modn' 
	WHERE direccion_alumno.codigo = alumno.cod_direccion;";

	$re = conexion($sqlDir, 1);

	$cedulan 					= mysqli_escape_string($con, $_POST['cedula']);
	$cedula_escolarn 	= mysqli_escape_string($con, $_POST['cedula_escolar']);
	$nacionalidadn		= mysqli_escape_string($con, $_POST['nacionalidad']);
	$p_nombren				= mysqli_escape_string($con, $_POST['p_nombre']);
	$s_nombren 				= mysqli_escape_string($con, $_POST['s_nombre']);
	$p_apellidon 			= mysqli_escape_string($con, $_POST['p_apellido']);
	$s_apellidon 			= mysqli_escape_string($con, $_POST['s_apellido']);
	$telefonon 				= mysqli_escape_string($con, $_POST['telefono']);
	$telefono_otron		= mysqli_escape_string($con, $_POST['telefono_otro']);
	$sexon 						= mysqli_escape_string($con, $_POST['sexo']);
	$lugar_nacn 			= mysqli_escape_string($con, $_POST['lugar_nac']);
	$fec_nacn 				= mysqli_escape_string($con, $_POST['fec_nac']);
	$acta_num_part_nacn 			 = mysqli_escape_string($con, $_POST['acta_num_part_nac']);
	$acta_folio_num_part_nacn	 = mysqli_escape_string($con, $_POST['acta_folio_num_part_nac']);
	$plantel_procedencian	 			= mysqli_escape_string($con, $_POST['plantel_procedencia']);
	$repitienten 			= mysqli_escape_string($con, $_POST['repitiente']);
	$alturan 					= mysqli_escape_string($con, $_POST['altura']);
	$peson 						= mysqli_escape_string($con, $_POST['peso']);
	$camisan 					= mysqli_escape_string($con, $_POST['camisa']);
	$pantalonn 				= mysqli_escape_string($con, $_POST['pantalon']);
	$zapaton 					= mysqli_escape_string($con, $_POST['zapato']);

	$sql_A = "UPDATE alumno SET 
	nacionalidad = '$nacionalidadn', 
	p_nombre 			= '$p_nombren',
	s_nombre 			= '$s_nombren', 
	p_apellido 		= '$p_apellidon', 
	s_apellido 		= '$s_apellidon',
	telefono 			= '$telefonon', 
	telefono_otro = '$telefono_otron', 
	sexo 					= '$sexon', 
	lugar_nac 		= '$lugar_nacn',
	fec_nac 			= '$fec_nacn', 
	cod_direccionn 					= 'cod_parro', 
	acta_num_part_nac 			= '$acta_num_part_nacn',
	acta_folio_num_part_nac = '$acta_folio_num_part_nacn', 
	plantel_procedencia 		= '$plantel_procedencian',
	repitiente 		= '$repitienten', 
	altura 				= '$alturan', 
	peso 					= '$peson', 
	camisa 				= '$camisan', 
	pantalon 			= '$pantalonn',
	zapato 				= '$zapaton' 
	WHERE cedula 	= '$cedulan'; ";

	//echo $sql;
	//$re = mysql_query($sql, $conn) or die ("Error al Conectar a la Base". mysql_error());

	$re = conexion($sql_A, 1);

	echo "<br>"."Actualizacion Exitosa";
	echo "<p align=center>"."<a href=menucon.php>Volver</a>"."</p>";

?>