<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1);

	// 'YYYY-MM-DD' $fec_nacA = $_SESSION['fec_nac'];
	// 'YYYY'				$a = substr($fec_nacA, 0, 4);
	// 'MM'					$b = substr($fec_nacA, 5, 2);
	// 'DD'					$c = substr($fec_nacA, 8, 2); 
	// regresa N >>	$query = "SELECT codigo from obtiene where cod_p_a = $codigoMama 
							//  and cod_a = $codigoAlumno;";
	// if( /*comprobar que el query traiga algo*/ ) :
	// 	$n = $resultado->num_rows
	// endif;
	// if (/* si cedula lumno existe */) {
	// 	 $cedula_escola = $n.$a.$cedulaAlumno;
	// }elseif (/* si cedula mama o papa existe */){
	// 	 $cedula_escola = $n.$a.$cedulaMadre;
	// }
 
 
if ( isset($_SESSION['cedula_a']) || isset($_SESSION['cedula_escolar_a'])) {
  

  //INICIACION DE VARIABLE CONEXION PARA
  //USAR mysqli_escape_string()
  $con = conexion();

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
  
  $cod_parroquia 		=	mysqli_escape_string($con, $_POST['cod_parro']);
	$direccion_exacta	= mysqli_escape_string($con, $_POST['direcc']);
	
	$queryDirP = "INSERT INTO direccion_p_a
		(cod_parroquia,
  	direccion_exacta,
  	status,
		cod_usr_reg,
		cod_usr_mod,
		fec_mod)
  	VALUES('$cod_parroquia,'$direccion_exacta', '$status','$cod_usr_reg',
  	'$cod_usr_mod','$fec_mod')";
  	
  //$direccionP = conexion($queryDirP);
	$direccionP = conexion($queryDirP, 1);
	//TOMO EL CODIGO DEL REGISTRO DE LA DIRECCION
  //Y LO INSERTO EN QUERY P_A
  $cod_direccion = mysqli_insert_id($direccionP); 
	//representante:
	$cedula					=	mysqli_escape_string($con, $_POST['cedula']);
	$nacionalidad		=	mysqli_escape_string($con, $_POST['nacionalidad']);
	$p_nombre				=	mysqli_escape_string($con, $_POST['p_nombre']);
	$s_nombre				=	mysqli_escape_string($con, $_POST['s_nombre']);
	$p_apellido			=	mysqli_escape_string($con, $_POST['p_apellido']);
	$s_apellido			=	mysqli_escape_string($con, $_POST['s_apellido']);
	$sexo						=	mysqli_escape_string($con, $_POST['sexo']);
	$fec_nac				=	mysqli_escape_string($con, $_POST['fec_nac']);
	$lugar_nac			=	mysqli_escape_string($con, $_POST['lugar_nac']);
	$telefono				=	mysqli_escape_string($con, $_POST['telefono']);
	$telefono_otro	=	mysqli_escape_string($con, $_POST['telefono_otro']);      
	$email					=	mysqli_escape_string($con, $_POST['email']);     
 	$relacion				=	mysqli_escape_string($con, $_POST['relacion']);     
 	$vive_con_alumno	=	mysqli_escape_string($con, $_POST['vive_con_alumno']);   
 	$cod_direccion		=	mysqli_escape_string($con, $_POST['direcc']);       
 	$nivel_instruccion	=	mysqli_escape_string($con, $_POST['nivel_instruccion']);    
 	$profesion					=	mysqli_escape_string($con, $_POST['profesion']);      
 	$lugar_trabajo			=	mysqli_escape_string($con, $_POST['lugar_trabajo']);   
 	$direccion_trabajo	=	mysqli_escape_string($con, $_POST['direccion_trabajo']);   
 	$telefono_trabajo		=	mysqli_escape_string($con, $_POST['telefono_trabajo']);
 	

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
		('$_SESSION[cod_parro]','$_SESSION[direccion_exacta_a]', '$status',
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
	) VALUES('$_SESSION[cedula_a]', '$_SESSION[cedula_escolar_a]','$_SESSION[nacionalidad_a]',
	'$_SESSION[p_nombre_a]', '$_SESSION[s_nombre_a]', '$_SESSION[p_apellido_a]', 
	'$_SESSION[s_apellido_a]','$_SESSION[telefono_a]','$_SESSION[telefono_otro_a]',
	'$_SESSION[sexo_a]', '$_SESSION[lugar_nac_a]','$_SESSION[fec_nac_a]',
	'$cod_direccion_a', '$_SESSION[acta_num_part_nac]',
	'$_SESSION[acta_folio_num_part_nac]',	'$_SESSION[plantel_procedencia_a]',
	'$_SESSION[repitiente_a]', '$_SESSION[altura_a]','$_SESSION[peso_a]',
	'$_SESSION[camisa_a]', 	'$_SESSION[zapato_a],'$_SESSION[cod_curso_a]', 
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
