<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

if (isset($_POST['cedula'])) {

	$con = conexion();
	$status         =  			1;
	$cod_usr_reg    = 			$_SESSION['codUsrMod'];
	$cod_usr_mod   	=   		$_SESSION['codUsrMod'];


	$cedula_r =	mysqli_escape_string($con, $_POST['cedula']);
	$nacionalidad		=	mysqli_escape_string($con, $_POST['nacionalidad']);
	$p_nombre				=	mysqli_escape_string($con, $_POST['p_nombre']);
	$s_nombre				=	mysqli_escape_string($con, $_POST['s_nombre']);
	$p_apellido			=	mysqli_escape_string($con, $_POST['p_apellido']);
	$s_apellido			=	mysqli_escape_string($con, $_POST['s_apellido']);
	$sexo						=	mysqli_escape_string($con, $_POST['sexo']);
	$fec_nac				=	mysqli_escape_string($con, $_POST['fec_nac']);
	$telefono				=	mysqli_escape_string($con, $_POST['telefono']);
	$telefono_otro	=	mysqli_escape_string($con, $_POST['telefono_otro']);

 	$queryP = "INSERT INTO persona(
	cedula,
	nacionalidad,
	p_nombre,
	s_nombre,
	p_apellido,
	s_apellido,
	sexo,
	fec_nac,
	telefono,
	telefono_otro,
	status,
  cod_usr_reg,
  cod_usr_mod
	)
	VALUES('$cedula_r','$nacionalidad','$p_nombre','$s_nombre','$p_apellido',
	'$s_apellido','$sexo','$fec_nac','$telefono','$telefono_otro','$status',
	'$cod_usr_reg','$cod_usr_mod');";

	$res = conexion($queryP);

  $query = "SELECT codigo from persona where cedula = '$cedula_r';";
  $resultado = conexion($query);
	$datos = mysqli_fetch_assoc($resultado);
	$cod_persona = $datos['codigo'];

	//Creo una variable de Session para realizar la inscripcioón del alumno

	$cod_parroquia 		=	mysqli_escape_string($con, $_POST['cod_parro']);
	$direccion_exacta	= mysqli_escape_string($con, $_POST['direcc']);

	$queryDirP = "INSERT INTO direccion
		(
		cod_persona,
		cod_parroquia,
  	direccion_exacta,
  	status,
		cod_usr_reg,
		cod_usr_mod)
  	VALUES('$cod_persona','$cod_parroquia','$direccion_exacta', '$status','$cod_usr_reg','$cod_usr_mod');";

  $res = conexion($queryDirP);

  $lugar_nac				=	mysqli_escape_string($con, $_POST['lugar_nac']);
	$email						=	mysqli_escape_string($con, $_POST['email']);
 	$relacion					=	mysqli_escape_string($con, $_POST['relacion']);
 	$vive_con_alumno	=	mysqli_escape_string($con, $_POST['vive_con_alumno']);
 	$nivel_instruccion	=	mysqli_escape_string($con, $_POST['nivel_instruccion']);
 	$profesion					=	mysqli_escape_string($con, $_POST['profesion']);
 	$lugar_trabajo			=	mysqli_escape_string($con, $_POST['lugar_trabajo']);
 	$direccion_trabajo	=	mysqli_escape_string($con, $_POST['direccion_trabajo']);
 	$telefono_trabajo		=	mysqli_escape_string($con, $_POST['telefono_trabajo']);

  $queryPA = "INSERT INTO personal_autorizado(
	cod_persona,
	lugar_nac,
	email,
 	relacion,
 	vive_con_alumno,
 	nivel_instruccion,
 	profesion,
 	lugar_trabajo,
 	direccion_trabajo,
 	telefono_trabajo,
	status,
  cod_usr_reg,
  cod_usr_mod
	)
	VALUES('$cod_persona','$lugar_nac','$email','$relacion','$vive_con_alumno',	'$nivel_instruccion',
	'$profesion','$lugar_trabajo','$direccion_trabajo','$telefono_trabajo','$status','$cod_usr_reg','$cod_usr_mod');";

	$res = conexion($queryPA);

	header("Location:../alumno/form_reg_A.php?cedula_r=$cedula_r");

}else{
		header('Location: form_reg_P.php?error=cedula&valor=notSet');
}

?>
