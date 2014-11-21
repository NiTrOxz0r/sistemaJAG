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
  $cedulan	=	$_POST['cedula'];
	$sql="SELECT a.cod_direccion from personal_autorizado a, direccion_p_a b 
	where a.cod_direccion=b.codigo and a.cedula='$cedulan';";
	$resultado = conexion($sql);
  $datos = mysqli_fetch_assoc($resultado);
  $cod_direccion_P = $datos['cod_direccion'];


	if($resultado->num_rows== 1){

			$cod_parroquian 		=	mysqli_escape_string($con, $_POST['cod_parro']);
			$direccion_exactan	= mysqli_escape_string($con, $_POST['direcc']);

			$sqlDir = "UPDATE direccion_p_a set 
			cod_parroquia='$cod_parroquian', 
			direccion_exacta='$direccion_exactan',  
			cod_usr_mod='$cod_usr_modn' 
			WHERE codigo = '$cod_direccion_P';";

			$res = conexion($sqlDir);

			$nacionalidadn		=	mysqli_escape_string($con, $_POST['nacionalidad']);
			$p_nombren				=	mysqli_escape_string($con, $_POST['p_nombre']);
			$s_nombren				=	mysqli_escape_string($con, $_POST['s_nombre']);
			$p_apellidon			=	mysqli_escape_string($con, $_POST['p_apellido']);
			$s_apellidon			=	mysqli_escape_string($con, $_POST['s_apellido']);
			$sexon						=	mysqli_escape_string($con, $_POST['sexo']);
			$fec_nacn					=	mysqli_escape_string($con, $_POST['fec_nac']);
			$lugar_nacn				=	mysqli_escape_string($con, $_POST['lugar_nac']);
			$telefonon				=	mysqli_escape_string($con, $_POST['telefono']);
			$telefono_otron		=	mysqli_escape_string($con, $_POST['telefono_otro']);      
			$emailn						=	mysqli_escape_string($con, $_POST['email']);     
 			$relacion_n				=	mysqli_escape_string($con, $_POST['relacion']);     
 			$vive_con_alumnon	=	mysqli_escape_string($con, $_POST['vive_con_alumno']);  
 			$nivel_instruccion_n	=	mysqli_escape_string($con, $_POST['nivel_instruccion']);    
 			$profesion_n					=	mysqli_escape_string($con, $_POST['profesion']); ;  
 			$lugar_trabajon_n			=	mysqli_escape_string($con, $_POST['lugar_trabajo']);   
 			$direccion_trabajon		=	mysqli_escape_string($con, $_POST['direccion_trabajo']);   
 			$telefono_trabajon		=	mysqli_escape_string($con, $_POST['telefono_trabajo']);
 	

			$sql_P = "UPDATE personal_autorizado set
			nacionalidad 	= '$nacionalidadn',
			p_nombre 			= '$p_nombren',
			s_nombre 			= '$s_nombren' ,
			p_apellido 		='$p_apellidon',
			s_apellido 		='$s_apellidon',
			sexo 					= '$sexon',
			fec_nac 			= '$fec_nacn',
			lugar_nac 		='$lugar_nacn' ,
			telefono 			= '$telefonon',
			telefono_otro ='$telefono_otron',   
			email 				='$emailn',   
 			relacion 			='$relacion_n',    
 			vive_con_alumno 	='$vive_con_alumnon',   	  
 			nivel_instruccion ='$nivel_instruccion_n',   
 			profesion 				='$profesion_n', 
 			lugar_trabajo 		='$lugar_trabajon_n',
 			direccion_trabajo ='$direccion_trabajon',
 			telefono_trabajo 	='$telefono_trabajon',
 	 		cod_usr_mod 			='$cod_usr_modn'
			WHERE cedula='$cedulan';";

	//echo $sql;
	//$re = mysql_query($sql, $conn) or die ("Error al Conectar a la Base". mysql_error());

		$res = conexion($sql_P);

		echo "<br>"."Actualizacion Exitosa";
		echo "<p align=center>"."<a href=menucon.php>Volver</a>"."</p>";
	}else{

		echo "No existe Registro";

}

?>

	<?php
			finalizarPagina();

	?>