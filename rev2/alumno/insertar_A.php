<?php

	require("../php/conexion.php");
	
	$_SESSION['direccion_exacta']=$_POST['direcc'];
	$_SESSION['cod_parro']=$_POST['cod_parro'];

	
	$_SESSION['$cedula'] 				= $_POST['cedula'];
	$_SESSION['cedula_escolar']	= $_POST['cedula_escolar'];
	$_SESSION['nacionalidad']		= $_POST['nacionalidad'];
	$_SESSION['p_nombre']				= $_POST['p_nombre'];
	$_SESSION['s_nombre'] 			= $_POST['s_nombre'];
	$_SESSION['p_apellido'] 		= $_POST['p_apellido']; 
	$_SESSION['s_apellido'] 		= $_POST['s_apellido'];
	$_SESSION['sexo']						=	$_POST['sexo'];
	$_SESSION['telefono'] 			= $_POST['telefono'];
	$_SESSION['telefono_otro'] 	= $_POST['telefono_otro'];
	$_SESSION['lugar_nac'] 			= $_POST['lugar_nac']; 
	$_SESSION['fec_nac'] 				= $_POST['fec_nac'];
	$_SESSION['acta_num_part_nac']					= $_POST['acta_num_part_nac'];
 	$_SESSION['acta_folio_num_part_nac'] 		= $_POST['acta_folio_num_part_nac'];
	$_SESSION_['plantel_procedencia']	 			= $_POST['plantel_procedencia']; 
	$_SESSION['repitiente'] 			= $_POST['repitiente'];
	$_SESSION['altura'] 					= $_POST['altura']; 
	$_SESSION['peso'] 						= $_POST['peso']; 
	$_SESSION['camisa']						= $_POST['camisa'];
 	$_SESSION['pantalon']		 			= $_POST['pantalon'];
 	$_SESSION['zapato']						= $_POST['zapato']; 
	$_SESSION['cod_curso']   			= $_POST['curso'];
	
	
	$cod_persona_retira= 					null;
	$cod_repre 		= 							1; 
	$status         =  			1;
	$cod_pa_reg    	= 			1;
	$cod_pa_mod   	=   		1;
	$fec_mod = "current_timestamp";
	
	
	
	// $sql = "Insert Into alumno (
	// cedula,
	// cedula_escolar,
	// nacionalidad,
	// p_nombre,
	// s_nombre,
	// p_apellido,
	// s_apellido,
	// telefono,
	// telefono_otro,
	// sexo,
	// lugar_nac,
	// fec_nac,
	// cod_direccion,
	// acta_num_part_nac,
 //	acta_folio_num_part_nac,
	// plantel_procedencia,
	// repitiente,
	// altura,
	// peso,
	// camisa,
 //	pantalon,
 //	zapato,
	// cod_curso,
	// cod_persona_retira,
	// cod_repre,
	// status,
	// cod_pa_reg,
	// cod_pa_mod,
	// fec_mod
	// ) VALUES('$cedula', '$cedula_escolar','$nacionalidad', '$p_nombre', '$s_nombre',  '$p_apellido',
	// '$s_apellido','$telefono',' $telefono_otro','$sexo', '$lugar_nac','$fec_nac','$cod_direccion',
	// '$acta_num_part_nac','$acta_folio_num_part_nac','$plantel_procedencia','$repitiente',
	// '$altura','$peso','$camisa', '$pantalon','$zapato','$cod_curso','$cod_persona_retira',
	// '$cod_repre', '$status', '$cod_pa_reg',	'$cod_pa_mod', $fec_mod;);";
	//$rs = mysql_query($sql) or die ("ProblemaS ".mysql_error());
?>




