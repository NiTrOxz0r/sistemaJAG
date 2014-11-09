<?php
session_start();

if ( isset($_POST['cedula']) || isset($_POST['cedula_escolar'])) :
	
	require("../php/master.php");
	//INICIACION DE VARIABLE CONEXION PARA
  //USAR mysqli_escape_string()
  $con = conexion();
	
	$_SESSION['direccion_exacta_a']		= mysqli_escape_string($con, $_POST['direcc']);
	$_SESSION['cod_parro_a']					= mysqli_escape_string($con, $_POST['cod_parro']);	
	$_SESSION['$cedula_a'] 						= mysqli_escape_string($con, $_POST['cedula']);
	$_SESSION['cedula_escolar_a']			= mysqli_escape_string($con, $_POST['cedula_escolar']);
	$_SESSION['nacionalidad_a']				= mysqli_escape_string($con, $_POST['nacionalidad']);
	$_SESSION['p_nombre_a']						= mysqli_escape_string($con, $_POST['p_nombre']);
	$_SESSION['s_nombre_a'] 					= mysqli_escape_string($con, $_POST['s_nombre']);
	$_SESSION['p_apellido_a'] 				= mysqli_escape_string($con, $_POST['p_apellido']); 
	$_SESSION['s_apellido_a'] 				= mysqli_escape_string($con, $_POST['s_apellido']);
	$_SESSION['sexo_a']								= mysqli_escape_string($con, $_POST['sexo']);
	$_SESSION['telefono_a'] 					= mysqli_escape_string($con, $_POST['telefono']);
	$_SESSION['telefono_otro_a'] 			= mysqli_escape_string($con, $_POST['telefono_otro']);
	$_SESSION['lugar_nac_a'] 					= mysqli_escape_string($con, $_POST['lugar_nac']); 
	$_SESSION['fec_nac_a'] 						= mysqli_escape_string($con, $_POST['fec_nac']);
	$_SESSION['acta_num_part_nac_a']	= mysqli_escape_string($con, $_POST['acta_num_part_nac']);
	$_SESSION['acta_folio_num_part_nac_a']	= mysqli_escape_string($con, $_POST['acta_folio_num_part_nac']);
	$_SESSION['plantel_procedencia_a']			= mysqli_escape_string($con, $_POST['plantel_procedencia']); 
	$_SESSION['repitiente_a'] 		= mysqli_escape_string($con, $_POST['repitiente']);
	$_SESSION['altura_a'] 				= mysqli_escape_string($con, $_POST['altura']); 
	$_SESSION['peso_a'] 					= mysqli_escape_string($con, $_POST['peso']); 
	$_SESSION['camisa_a']					= mysqli_escape_string($con, $_POST['camisa']);
	$_SESSION['pantalon_a']		 		= mysqli_escape_string($con, $_POST['pantalon']);
	$_SESSION['zapato_a']					= mysqli_escape_string($con, $_POST['zapato']); 
	$_SESSION['cod_curso_a']   			= mysqli_escape_string($con, $_POST['curso']);

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
	echo "string";
?>
