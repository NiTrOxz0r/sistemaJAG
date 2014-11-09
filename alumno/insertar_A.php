<?php
session_start();

if ( isset($_SESSION['cedula']) || isset($_SESSION['cedula_escolar'])) :
	
	require("../php/master.php");
	//INICIACION DE VARIABLE CONEXION PARA
  //USAR mysqli_escape_string()
  $con = conexion();
	
	$_SESSION['direccion_exacta']		=mysqli_escape_string($con, 'direcc']);
	$_SESSION['cod_parro']					=mysqli_escape_string($con, 'cod_parro']);	
	$_SESSION['$cedula'] 						= mysqli_escape_string($con, 'cedula']);
	$_SESSION['cedula_escolar']			= mysqli_escape_string($con, 'cedula_escolar']);
	$_SESSION['nacionalidad']				= mysqli_escape_string($con, 'nacionalidad']);
	$_SESSION['p_nombre']						= mysqli_escape_string($con, 'p_nombre']);
	$_SESSION['s_nombre'] 					= mysqli_escape_string($con, 's_nombre']);
	$_SESSION['p_apellido'] 				= mysqli_escape_string($con, 'p_apellido']); 
	$_SESSION['s_apellido'] 				= mysqli_escape_string($con, 's_apellido']);
	$_SESSION['sexo']								= mysqli_escape_string($con, 'sexo']);
	$_SESSION['telefono'] 					= mysqli_escape_string($con, 'telefono']);
	$_SESSION['telefono_otro'] 			= mysqli_escape_string($con, 'telefono_otro']);
	$_SESSION['lugar_nac'] 					= mysqli_escape_string($con, 'lugar_nac']); 
	$_SESSION['fec_nac'] 						= mysqli_escape_string($con, 'fec_nac']);
	$_SESSION['acta_num_part_nac']	= mysqli_escape_string($con, 'acta_num_part_nac']);
	$_SESSION['acta_folio_num_part_nac']	= mysqli_escape_string($con, 'acta_folio_num_part_nac']);
	$_SESSION['plantel_procedencia']			= mysqli_escape_string($con, 'plantel_procedencia']); 
	$_SESSION['repitiente'] 		= mysqli_escape_string($con, 'repitiente']);
	$_SESSION['altura'] 				= mysqli_escape_string($con, 'altura']); 
	$_SESSION['peso'] 					= mysqli_escape_string($con, 'peso']); 
	$_SESSION['camisa']					= mysqli_escape_string($con, 'camisa']);
	$_SESSION['pantalon']		 		= mysqli_escape_string($con, 'pantalon']);
	$_SESSION['zapato']					= mysqli_escape_string($con, 'zapato']); 
	$_SESSION['cod_curso']   			= mysqli_escape_string($con, 'curso']);

	//ESTO NO PUEDE SER ASI LEOTUR:
	// $cod_persona_retira = null;
	// $cod_repre 					= 1; 
	// $status 						= 1;
	// $cod_pa_reg 				= 1;
	// $cod_pa_mod 				= 1;
	// $fec_mod = "current_timestamp";

	//tiene que ser dinamicamente:
	$cod_persona_retira = null;
	$cod_repre 					= 1; 
	$status 						= 1;
	$cod_pa_reg 				= $_SESSION['codUsrMod'];
	$cod_pa_mod 				= $_SESSION['codUsrMod'];
	$fec_mod = "current_timestamp";

	header("Location:../Personal_Autorizado/form_reg_P.php");

endif;
	
?>
