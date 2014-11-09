<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1);
if ( isset($_POST['cedula']) || isset($_POST['cedula_escolar'])) :
	//INICIACION DE VARIABLE CONEXION PARA
  //USAR mysqli_escape_string()
  $con = conexion();
	$codDir = 1;
	$codRepresentante = 1;
	$codPR = 1;
	//VALIDACION DE DATOS DE ALUMNO:
	$validarForma = new ChequearAlumno(
		$_SESSION['codUsrMod'],
		$_POST['p_apellido'],
		$_POST['s_apellido'],
		$_POST['p_nombre'],
		$_POST['s_nombre'],
		$_POST['nacionalidad'],
		$_POST['cedula'],
		$_POST['cedula_escolar'],
		$_POST['telefono'],
		$_POST['telefono_otro'],
		$_POST['fec_nac'],
		$_POST['lugar_nac'],
		$_POST['sexo'],
		$codDir,
		$_POST['acta_num_part_nac'],
		$_POST['acta_folio_num_part_nac'],
		$_POST['plantel_procedencia'],
		$_POST['repitiente'],
		$_POST['curso'],
		$_POST['altura'],
		$_POST['peso'],
		$_POST['camisa'],
		$_POST['pantalon'],
		$_POST['zapato'],
		$codRepresentante,
		$codPR
	);
	
	$_SESSION['direccion_exacta_a']		= mysqli_escape_string($con, $_POST['direcc']);
	$_SESSION['cod_parro_a']					= mysqli_escape_string($con, $_POST['cod_parro']);	
	$_SESSION['cedula_a'] 						= mysqli_escape_string($con, $_POST['cedula']);
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

	header("Location:../Personal_Autorizado/form_reg_P.php");

endif;
	echo "string";
?>
