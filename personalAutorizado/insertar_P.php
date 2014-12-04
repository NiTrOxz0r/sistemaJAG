<?php
/**
 * @author Andres Leotur
 *
 * agente autorizado del ministerio de sanidad:
 * @author Alejandro Granadillo
 *
 * @internal inserta personal autorizado.
 *
 * @see form_reg_P.php
 *
 * @version 1.2
 */
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

if (isset($_POST['cedula'])) {

  $status = 1;

  $validarPA = new ChequearPA(
    $_SESSION['codUsrMod'],
    $_POST['p_apellido'],
    $_POST['s_apellido'],
    $_POST['p_nombre'],
    $_POST['s_nombre'],
    $_POST['nacionalidad'],
    $_POST['cedula'],
    $_POST['telefono'],
    $_POST['telefono_otro'],
    $_POST['fec_nac'],
    $_POST['lugar_nac'],
    $_POST['email'],
    $_POST['sexo'],
    $_POST['relacion'],
    $_POST['vive_con_alumno'],
    $_POST['nivel_instruccion'],
    $_POST['profesion'],
    $_POST['telefono_trabajo'],
    $_POST['direccion_trabajo'],
    $_POST['lugar_trabajo']
  );

  $query = "INSERT INTO persona(
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
  VALUES('$cedula_r','$nacionalidad',
    '$p_nombre','$s_nombre',
    '$p_apellido',
    '$s_apellido','$sexo',
    '$fec_nac','$telefono',
    '$telefono_otro','$status',
    '$cod_usr_reg','$cod_usr_mod'
  );";
  // poner diferentes nombres de query es unutil y confuso:
  // al queryP y queryDirP se asume que hay un query y un queryDir aparte
  // de no ser asi, entonces hay redudancia.
  // si queryPA y queryP estarian siendo usados al mismo tiempo, te lo creo.
  // pero en este flujo, solo se usa un query a la vez.
  // para que crear 4 variables si con una sola se hace todo?
  // eficacia y eficiencia leotur por el amor a dios.
  $res = conexion($query,1);

  $query = "SELECT codigo from persona where cedula = '$cedula_r';";
  $resultado = conexion($query,1);
  $datos = mysqli_fetch_assoc($resultado);
  $cod_persona = $datos['codigo'];

  $query = "INSERT INTO direccion
    (
    cod_persona,
    cod_parroquia,
    direccion_exacta,
    status,
    cod_usr_reg,
    cod_usr_mod)
    VALUES('$cod_persona','$cod_parroquia','$direccion_exacta', '$status','$cod_usr_reg','$cod_usr_mod');";

  $res = conexion($query,1);

  $query = "INSERT INTO personal_autorizado(
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
  VALUES('$cod_persona','$lugar_nac','$email','$relacion','$vive_con_alumno', '$nivel_instruccion',
  '$profesion','$lugar_trabajo','$direccion_trabajo','$telefono_trabajo','$status','$cod_usr_reg','$cod_usr_mod');";

  $res = conexion($query,1);

  header("Location:../alumno/form_reg_A.php?cedula_r=$cedula_r");

}else{
  header('Location: form_reg_P.php?error=cedula&valor=notSet');
}

?>
