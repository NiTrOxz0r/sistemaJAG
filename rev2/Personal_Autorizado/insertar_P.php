<?php

include("../conexion/conex.php");

	$cod_parroquia =$_POST['cod_parro'];
	$direccion_extaca= $_POST[''];

	$querypdir="Insert into direccion_alumno(
  	cod_parroquia,
  	direccion_exanta,
  	status,
		cod_pa_reg,
		cod_pa_mod,
		fec_mod
  	 	)
  	VALUES('$_SESSION['cod_parro']','$_SESSION['direccion_exacta']', '1','1','1',current_timestamp')";


	$cedula					=	$_POST['cedula'];
	$nacionalidad		=	$_POST['nacionalidad'];
	$p_nombre				=	$_POST['p_nombre'];
	$s_nombre				=	$_POST['s_nombre'];
	$p_apellido			=	$_POST['p_apellido'];
	$s_apellido			=	$_POST['s_apellido'];
	$sexo						=	$_POST['sexo'];
	$fec_nac				=	$_POST['fec_nac'];
	$lugar_nac			=	$_POST['lugar_nac'];
	$telefono				=	$_POST['telefono'];
	$telefono_otro	=	$_POST['telefono_otro'];      
	$email					=	$_POST['email'];     
 	$relacion				=	$_POST['relacion'];     
 	$vive_con_alumno	=	$_POST['vive_con_alumno'];   
 	$cod_direccion		=	$_POST['direcc'];       
 	$nivel_instruccion	=	$_POST['nivel_instruccion'];    
 	$profesion					=	$_POST['profesion'];      
 	$lugar_trabajo			=	$_POST['lugar_trabajo'];   
 	$direccion_trabajo	=	$_POST['direccion_trabajo'];   
 	$telefono_trabajo		=	$_POST['telefono_trabajo'];
	$status							=  		1;
 	$cod_usr_reg				=   	1;
	$cod_usr_mod				=   	1;
	
	
  	
  	
		$queryPA = "INSERT INTO padres_representante(
	cedula,
	nacionalidad,
	p_nombre,
	s_nombre,
	p_apellido,
	s_apellido,
	sexo
	fec_nac,
	lugar_nac,
	telefono,
	telefono_otro,   
	email,   
 	relacion,    
 	vive_con_alumno,  
 	cod_direccion,      
 	nivel_instruccion,   
 	profesion, 
 	lugar_tra,
 	direccion_trabajo,
 	telefono_trabajo,
	status,
   	cod_usr_reg,
  	cod_usr_mod			
	)
	VALUES('$cedula','$nacionalidad','$p_nombre','$s_nombre','$p_apellido','$s_apellido','$sexo','$fec_nac',
	$lugar_nac','$telefono','$telefono_otro','$email','$relacion','$vive_con_alumno','$cod_direccion',
	'$nivel_instruccion', '$profesion','$lugar_trabajo','$direccion_trabajo','$telefono_trabajo','$status',
	'$cod_usr_reg','$cod_usr_mod');";

	echo "<br>".$sql;
	
   // $rs = mysql_query($insertar) or die ("Error ".mysql_error());
   
	
	$fec_nacA = $_SESSION['fec_nac']; // 'YYYY-MM-DD'
	$a = substr($fec_nacA, 0, 4); // 'YYYY'
	$b = substr($fec_nacA, 5, 2); // 'MM'
	$c = substr($fec_nacA, 8, 2); // 'DD'
	$query = "SELECT codigo from obtiene where cod_p_a = $codigoMama and cod_a = $codigoAlumno;" // << regresa N
	if ( /*comprobar que el query traiga algo*/ ) :
		$n = $resultado->num_rows
	endif;
	if (/* si cedula lumno existe */) {
		 $cedula_escola = $n.$a.$cedulaAlumno;
	}elseif (/* si cedula mama o papa existe */){
		 $cedula_escola = $n.$a.$cedulaMadre;
	}
 
 
  
  if ( isset($_SESSION['cedula']) || isset($_SESSION['cedula_escolar'])) {

	
  $cod_persona_retira= 		null;
	$cod_repre 		= 				1; 
	$status         =  			1;
	$cod_pa_reg    	= 			1;
	$cod_pa_mod   	=   		1;
	$fec_mod = "current_timestamp";
	
	
  $queryAdir="Insert into direccion_alumno(
  	cod_parroquia,
  	direccion_exanta,
  	status,
		cod_pa_reg,
		cod_pa_mod,
		fec_mod
  	 	)
  	VALUES('$_SESSION['cod_parro']','$_SESSION['direccion_exacta']', '1','1','1',current_timestamp')";
  	
  $queryA = "Insert Into alumno (
	cedula,
	cedula_escolar,
	nacionalidad,
	p_nombre,
	s_nombre,
	p_apellido,
	s_apellido,
	telefono,
	telefono_otro,
	sexo,
	lugar_nac,
	fec_nac,
	cod_direccion,
	acta_num_part_nac,
 	acta_folio_num_part_nac,
	plantel_procedencia,
	repitiente,
	altura,
	peso,
	camisa,
 	pantalon,
 	zapato,
	cod_curso,
	cod_persona_retira,
	cod_repre,
	status,
	cod_pa_reg,
	cod_pa_mod,
	fec_mod
	) VALUES(' $_SESSION['$cedula']', '$_SESSION['cedula_escolar']','$_SESSION['nacionalidad']','$_SESSION['p_nombre']', '$$_SESSION['s_nombre']',  
	'$$_SESSION['p_apellido']', '$$_SESSION['s_apellido']','$_SESSION['telefono']','$_SESSION['telefono_otro']','$_SESSION['sexo']', 
	'$_SESSION['lugar_nac']','$_SESSION['fec_nac']','$cod_direccion', '$_SESSION['acta_num_part_nac']','$_SESSION['acta_folio_num_part_nac']',
	'$_SESSION['plantel_procedencia']','$$_SESSION['repitiente']', '$_SESSION['altura']','$_SESSION['peso']','$_SESSION['camisa']', 
	'$_SESSION['zapato'],'$_SESSION['cod_curso']',
	'$cod_curso','$cod_persona_retira',
	'$cod_repre', '$status', '$cod_pa_reg',	'$cod_pa_mod', $fec_mod;);";
    	

}else{
	
	
	
}

?>
