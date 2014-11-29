<?php

  if(!isset($_SESSION)){
    session_start();
  }
  $enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
  require_once($enlace);
// invocamos validarUsuario.php desde master.php
  validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
  empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

  $con = conexion();

  $status         =       1;
  $cod_usr_reg    =       $_SESSION['codUsrMod'];
  $cod_usr_modn   =       $_SESSION['codUsrMod'];

  //ACTUALIZO LA DIRECCION DEL REPRESENTANTE
  //LA ENVIO A LA TABLA direccion_p_a
  $cedulan  = $_POST['cedula'];
  $sql="SELECT a.codigo as cod_direccion from direccion a
   inner join persona b on (a.cod_persona=b.codigo) where cedula = '$cedulan';";
  $resultado = conexion($sql);
  $datos = mysqli_fetch_assoc($resultado);
  $cod_direccion_P = $datos['cod_direccion'];


  if($resultado->num_rows== 1){

    $con = conexion();
    $status         =       1;
    $cod_usr_reg    =       $_SESSION['codUsrMod'];
    $cod_usr_mod    =       $_SESSION['codUsrMod'];


    $cedulan          = mysqli_escape_string($con, $_POST['cedula']);
    $nacionalidadn    = mysqli_escape_string($con, $_POST['nacionalidad']);
    $p_nombren        = mysqli_escape_string($con, $_POST['p_nombre']);
    $s_nombren        = mysqli_escape_string($con, $_POST['s_nombre']);
    $p_apellidon      = mysqli_escape_string($con, $_POST['p_apellido']);
    $s_apellidon      = mysqli_escape_string($con, $_POST['s_apellido']);
    $sexon            = mysqli_escape_string($con, $_POST['sexo']);
    $fec_nacn       = mysqli_escape_string($con, $_POST['fec_nac']);
    $telefonon        = mysqli_escape_string($con, $_POST['telefono']);
    $telefono_otron = mysqli_escape_string($con, $_POST['telefono_otro']);

    $queryPA = "UPDATE persona SET
    cedula       = '$cedulan',
    nacionalidad = '$nacionalidadn',
    p_nombre     = '$p_nombren',
    s_nombre     = '$s_nombren',
    p_apellido   = '$p_apellidon',
    s_apellido   = '$s_apellidon',
    sexo         = '$sexon',
    fec_nac      = '$fec_nacn',
    telefono     = '$telefonon',
    telefono_otro = '$telefono_otron',
    cod_usr_mod  = '$cod_usr_modn'
    WHERE cedula  = '$cedulan'; ";

    $res = conexion($queryPA);

    $cod_parroquian     = mysqli_escape_string($con, $_POST['cod_parro']);
    $direccion_exactan  = mysqli_escape_string($con, $_POST['direcc']);

    $queryDirP = "UPDATE direccion SET
    cod_parroquia    = '$cod_parroquian',
    direccion_exacta = '$direccion_exactan',
    cod_usr_mod      = '$cod_usr_modn'
    WHERE codigo     ='$cod_direccion_P';";

    $res = conexion($queryDirP);

    $lugar_nacn       = mysqli_escape_string($con, $_POST['lugar_nac']);
    $emailn           = mysqli_escape_string($con, $_POST['email']);
    $relacionn          = mysqli_escape_string($con, $_POST['relacion']);
    $vive_con_alumnon = mysqli_escape_string($con, $_POST['vive_con_alumno']);
    $nivel_instruccionn = mysqli_escape_string($con, $_POST['nivel_instruccion']);
    $profesionn         = mysqli_escape_string($con, $_POST['profesion']);
    $lugar_trabajon     = mysqli_escape_string($con, $_POST['lugar_trabajo']);
    $direccion_trabajon = mysqli_escape_string($con, $_POST['direccion_trabajo']);
    $telefono_trabajon    = mysqli_escape_string($con, $_POST['telefono_trabajo']);

    $query_R="SELECT cod_persona  FROM personal_autorizado a
    inner join persona b on (cod_persona=b.codigo) WHERE cedula ='$cedulan'";
    $resultado = conexion($query_R);
    $datos = mysqli_fetch_assoc($resultado);
    $cod_persona = $datos['cod_persona'];

    $queryPA = "UPDATE personal_autorizado SET
    lugar_nac     = '$lugar_nacn',
    email         = '$emailn',
    relacion      = '$relacionn',
    vive_con_alumno   = '$vive_con_alumnon',
    nivel_instruccion = '$nivel_instruccionn',
    profesion         ='$profesionn',
    lugar_trabajo     = '$lugar_trabajon',
    direccion_trabajo = '$direccion_trabajon',
    telefono_trabajo  = '$telefono_trabajon',
    cod_usr_mod       = '$cod_usr_modn'
    WHERE cod_persona = '$cod_persona'";

    $res = conexion($queryPA);

    echo "DATOS INGRESADOS EXITOSAMENTE";

  }else{

    echo "No existe Registro";

}

  finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

?>
