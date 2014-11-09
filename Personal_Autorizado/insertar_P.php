
<?php

session_start();
include("../conexion/conex.php");

	
	$fec_nacA = $_SESSION['fec_nac']; // 'YYYY-MM-DD'
	$a = substr($fec_nacA, 0, 4); // 'YYYY'
	$b = substr($fec_nacA, 5, 2); // 'MM'
	$c = substr($fec_nacA, 8, 2); // 'DD'
	$query = "SELECT codigo from obtiene where cod_p_a = $codigoMama 
						and cod_a = $codigoAlumno;"; // << regresa N;
	// if( /*comprobar que el query traiga algo*/ ) :
	// 	$n = $resultado->num_rows
	// endif;
	// if (/* si cedula lumno existe */) {
	// 	 $cedula_escola = $n.$a.$cedulaAlumno;
	// }elseif (/* si cedula mama o papa existe */){
	// 	 $cedula_escola = $n.$a.$cedulaMadre;
	// }
 
 
  if ( isset($_SESSION['cedula']) || isset($_SESSION['cedula_escolar'])) {
  
  //HACER CONDICIONAL PARA SABER CUAL DE LOS 2 PADRES
  //ES EL REPRESENTANTE!
  
  // estas variables no cambian para la
  // insersion de datos en las diferentes tablas:
  	
  $status         =  			1;
	$cod_usr_reg    = 			1;
	$cod_usr_mod   	=   		1;
	$fec_mod 				= 			"current_timestamp";
  	
  //INSERTO LA DIRECCION DEL REPRESENTANTE
  //LA ENVIO A LA TABLA direccion_p_a
  
  $cod_parroquia 		=	$_POST['cod_parro'];
	$direccion_exacta	= $_POST['direcc'];
	
	$queryDirP="INSERT INTRO direccion_p_a(
  	cod_parroquia,
  	direccion_exacta,
  	status,
		cod_usr_reg,
		cod_usr_mod,
		fec_mod
  	 	)
  	VALUES('$cod_parroquia,'$direccion_exacta', '$status','$cod_usr_reg',
  	'$cod_usr_mod','$fec_mod')";
  	
  //$direccionP = conexion($queryDirP);
	$direccionP = conexion($queryDirP, 1);
	//TOMO EL CODIGO DEL REGISTRO DE LA DIRECCION
  //Y LO INSERTO EN QUERY P_A
  $cod_direccion = mysqli_insert_id($direccionP); 
	//representante:
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
 	

	$queryPA = "INSERT INTO personal_autorizado(
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
  cod_usr_mod,
  fec_mod
	)
	VALUES('$cedula','$nacionalidad','$p_nombre','$s_nombre','$p_apellido',
	'$s_apellido','$sexo','$fec_nac',	$lugar_nac','$telefono','$telefono_otro',
	'$email','$relacion','$vive_con_alumno','$cod_direccion',	'$nivel_instruccion', 
	'$profesion','$lugar_trabajo','$direccion_trabajo','$telefono_trabajo','$status',
	'$cod_usr_reg','$cod_usr_mod','$fec_mod');";

	//CREO UNA VARIABLE DE SESSION PARA TOMAR EL CODIGO ID 
	//DEL REPRESENTANTE E INSERTARLO EN ALUMNO
	//Y LA CREO QUE SESSION PORQUE NO SE SI SE 
	//DESTRUYE A LA HORA QUE HACE LA COMPROBACION A CONTINUACION
	
	// $rs = mysql_query($queryPA) or die ("Error ".mysql_error());
   $rs = conexion($queryPA, 1);
	
	$cod_representante = mysqli_insert_id($rs);
	
	//INSERTO DIRECCION ALUMNO EN LA TABLA DIRECCION_ALUMNO
	//CODIGO TRAIDA EN VARIABLES DE SESSIONES
	//DATOS TRAIDOS POR COMPLETO DESDE $_SESSION
	
  $queryAdir = "INSERT INTO direccion_alumno(
  	cod_parroquia,
  	direccion_exacta,
  	status,
		cod_usr_reg,
		cod_usr_mod,
		fec_mod
		)	VALUES
		('$_SESSION[cod_parro]','$_SESSION[direccion_exacta]', '$status',
		'$cod_usr_reg','$cod_usr_mod','$fec_mod');";
  	
  // $rs = mysql_query($queryPA) or die ("Error ".mysql_error());
  $rs = conexion($queryAdir, 1);
  
  $cod_direccion_a = mysqli_insert_id($rs);
  	
  $queryA = "INSERT INTO alumno (
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
	cod_repre,
	status,
	cod_usr_reg,
	cod_usr_mod,
	fec_mod
	) VALUES('$_SESSION[cedula]', '$_SESSION[cedula_escolar]','$_SESSION[nacionalidad]',
	'$_SESSION[p_nombre]', '$_SESSION[s_nombre]', '$_SESSION[p_apellido]', 
	'$_SESSION[s_apellido]','$_SESSION[telefono]','$_SESSION[telefono_otro]',
	'$_SESSION[sexo]', '$_SESSION[lugar_nac]','$_SESSION[fec_nac]',
	'$cod_direccion_a', '$_SESSION[acta_num_part_nac]',
	'$_SESSION[acta_folio_num_part_nac]',	'$_SESSION[plantel_procedencia]',
	'$_SESSION[repitiente]', '$_SESSION[altura]','$_SESSION[peso]',
	'$_SESSION[camisa]', 	'$_SESSION[zapato],'$_SESSION[cod_curso]', 
	'$cod_representante', '$status', '$cod_usr_reg',	'$cod_usr_mod', $fec_mod;);";
    	
	// $rs = mysql_query($queryPA) or die ("Error ".mysql_error());
  $rs = conexion($queryA, 1);
  
  
  //DEBIDO A QUE MUCHOS USUARIOS PUEDEN HACER MUCHAS
  //INSERSIONES DE ALUMNOS/PA/ETC
  //TENEMOS QUE DESACTIVAR LA VARIABLE SESSION PARA QUE
  //NO AFECTE OTROS REGISTROS SIMULTANEOS:
  //SOLUCION TEMPORAL:
  
  //AGARRAMOS LAS VARIABLES DE VALIDACION QUE NOS INTERESAN:
  
  $codUsrMod = $_SESSION['codUsrMod'];
  $codTipoUsr = $_SESSION['cod_tipo_usr'];
  $seudonimo = $_SESSION['seudonimo'];
  
  // LA VARIABLE SE DES-CREA, DES-INICIA DESACTIVA
  unset($_SESSION);
  
  //REINICIAMOS LA VARIABLE:
  
  $_SESSION['codUsrMod'] = $codUsrMod;
	$_SESSION['cod_tipo_usr'] = $codTipoUsr;
	$_SESSION['seudonimo'] = $seudonimo;
}else{
	
	echo " Ingresar Alumno";
	
}

?>

?>
