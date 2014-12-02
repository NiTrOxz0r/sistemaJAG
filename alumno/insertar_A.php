<?php
/**
 * @author [Andres Leotur]
 * @author [Alejandro Granadillo]
 *
 * {@internal [esta funcion genera el registro de base de datos de alumno
 * solo requiere como condicion saber la cedula del representante.]}
 *
 * @todo VALIDAR ALUMNO!!!!!!!!
 *
 * @version 1.1
 */
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Registro de alumno');

  if (isset($_POST['cedula_r'])){


    $con = conexion();
    $status         =       1;
    $cod_usr_reg    =       $_SESSION['codUsrMod'];
    $cod_usr_mod    =       $_SESSION['codUsrMod'];


    $cedula         = mysqli_escape_string($con, $_POST['cedula']);
    $nacionalidad   = mysqli_escape_string($con, $_POST['nacionalidad']);
    $p_nombre       = mysqli_escape_string($con, $_POST['p_nombre']);
    $s_nombre       = mysqli_escape_string($con, $_POST['s_nombre']);
    $p_apellido     = mysqli_escape_string($con, $_POST['p_apellido']);
    $s_apellido     = mysqli_escape_string($con, $_POST['s_apellido']);
    $sexo           = mysqli_escape_string($con, $_POST['sexo']);
    $fec_nac        = mysqli_escape_string($con, $_POST['fec_nac']);
    $telefono       = mysqli_escape_string($con, $_POST['telefono']);
    $telefono_otro  = mysqli_escape_string($con, $_POST['telefono_otro']);

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
    VALUES('$cedula','$nacionalidad','$p_nombre','$s_nombre','$p_apellido',
    '$s_apellido','$sexo','$fec_nac','$telefono','$telefono_otro','$status',
    '$cod_usr_reg','$cod_usr_mod');";

    $res = conexion($queryP);

    $query = "SELECT codigo from persona where cedula = '$cedula';";
    $resultado = conexion($query);
    $datos = mysqli_fetch_assoc($resultado);

    $cod_persona = $datos['codigo'];
    $cod_parroquia    = mysqli_escape_string($con, $_POST['cod_parro']);
    $direccion_exacta = mysqli_escape_string($con, $_POST['direcc']);

    $queryDirA = "INSERT INTO direccion
      (
      cod_persona,
      cod_parroquia,
      direccion_exacta,
      status,
      cod_usr_reg,
      cod_usr_mod)
      VALUES('$cod_persona','$cod_parroquia','$direccion_exacta', '$status','$cod_usr_reg','$cod_usr_mod');";

    $res = conexion($queryDirA);

    $cedula_escolar = mysqli_escape_string($con, $_POST['cedula_escolar']);
    $lugar_nac      = mysqli_escape_string($con, $_POST['lugar_nac']);
    $fec_nac        = mysqli_escape_string($con, $_POST['fec_nac']);
    $acta_num_part_nac        = mysqli_escape_string($con, $_POST['acta_num_part_nac']);
    $acta_folio_num_part_nac = mysqli_escape_string($con, $_POST['acta_folio_num_part_nac']);
    $plantel_procedencia  = mysqli_escape_string($con, $_POST['plantel_procedencia']);
    $repitiente     = mysqli_escape_string($con, $_POST['repitiente']);
    $altura         = mysqli_escape_string($con, $_POST['altura']);
    $peso           = mysqli_escape_string($con, $_POST['peso']);
    $camisa         = mysqli_escape_string($con, $_POST['camisa']);
    $pantalon       = mysqli_escape_string($con, $_POST['pantalon']);
    $zapato         = mysqli_escape_string($con, $_POST['zapato']);
    $certificado_vacuna = mysqli_escape_string($con, $_POST['vacuna']);
    $cod_discapacidad   = mysqli_escape_string($con, $_POST['discapacidad']);
    $cod_curso          = mysqli_escape_string($con, $_POST['curso']);
    $cedula_r = mysqli_escape_string($con, $_POST['cedula_r']);
    $query_R="SELECT a.codigo from personal_autorizado a
    inner join persona b on (a.cod_persona=b.codigo) where b.cedula ='$cedula_r'";


    $resultado = conexion($query_R);
    $datos = mysqli_fetch_assoc($resultado);
    $cod_representante = $datos['codigo'];

    $queryA = "INSERT INTO alumno (
    cod_persona,
    cedula_escolar,
    lugar_nac,
    acta_num_part_nac,
    acta_folio_num_part_nac,
    plantel_procedencia,
    repitiente,
    altura,
    peso,
    camisa,
    pantalon,
    zapato,
    certificado_vacuna,
    cod_discapacidad,
    cod_curso,
    cod_representante,
    status,
    cod_usr_reg,
    cod_usr_mod
    ) VALUES ('$cod_persona','$cedula_escolar','$lugar_nac','$acta_num_part_nac',
    '$acta_folio_num_part_nac','$plantel_procedencia','$repitiente','$altura','$peso','$camisa',
    '$pantalon','$zapato','$certificado_vacuna','$cod_discapacidad','$cod_curso',
    '$cod_representante','$status','$cod_usr_reg','$cod_usr_mod');";

    $res = conexion($queryA);

    $query = "SELECT b.codigo from persona a, alumno b
    where a.codigo=b.cod_persona and cedula = '$cedula';";
    $resultado = conexion($query);
    $datos = mysqli_fetch_assoc($resultado);
    $codigo_alumno = $datos['codigo'];

    //INSERSION A LA TABLA OBTIENE:
    //RELACION ENTRE ALUMNO Y PA:
    //M > N
    $query_O= "INSERT INTO obtiene
    VALUES
    (null, $cod_representante, $codigo_alumno, $status, $cod_usr_reg, null, $cod_usr_mod, null);";

    $res = conexion($query_O);?>

    <div id="contenido_actualizar_C">
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Registro exitoso!</h1>
              <h4>
                Los registros asociados
                fueron guardados correctamente!
              </h4>
              <p>
                Si desea hacer un registro de una alumno asociado a la cedula:
                 <?php echo $cedula_r ?>, por favor dele
                <a href="<?php echo "form_reg_A.php?cedula_r=$cedula_r" ?>">
                  click a este enlace
                </a>
              </p>
              <p>
                <?php $index = enlaceDinamico(); ?>
                <a href="<?php echo $index ?>" class="btn btn-primary btn-lg">Regresar al sistema</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
  }else{

    // echo " Ingresar REPRSENTANTE";?>
    <div id="contenido_actualizar_C">
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Ups!</h1>
              <p>
                Error en el proceso de registro!
              </p>
              <h3>
                <small>
                  Lamentablemente, es posible que los datos de registro se perdieron.
                </small>
              </h3>
              <?php $index = enlaceDinamico(); ?>
              <p>
                para ir al proceso de inscripcion <a href="<?php echo $index ?>">
                puede seguir este enlace.
                </a>
              </p>
              <p>
                Si desea hacer una consulta por favor dele
                <a href="menucon.php">click a este enlace.</a>
              </p>
              <p>
                ¿O sera que entro en esta pagina erroneamente?
              </p>
              <p class="bg-warning">
                Si este es un problema recurrente, contacte a un administrador del sistema.
              </p>
              <p>
                <?php $index = enlaceDinamico(); ?>
                <a href="<?php echo $index ?>" class="btn btn-primary btn-lg">Regresar al sistema</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php

}

 //AGARRAMOS LAS VARIABLES DE VALIDACION QUE NOS INTERESAN:

    $codUsrMod = $_SESSION['codUsrMod'];
    $codTipoUsr = $_SESSION['cod_tipo_usr'];
    $seudonimo = $_SESSION['seudonimo'];
    $p_nombre = $_SESSION['p_nombre'];
    $p_apellido = $_SESSION['p_apellido'];

    // LA VARIABLE SE DES-CREA, DES-INICIA DESACTIVA
    unset($_SESSION);

    //REINICIAMOS LA VARIABLE:

    $_SESSION['codUsrMod'] = $codUsrMod;
    $_SESSION['cod_tipo_usr'] = $codTipoUsr;
    $_SESSION['seudonimo'] = $seudonimo;
    $_SESSION['p_nombre'] = $p_nombre;
    $_SESSION['p_apellido'] = $p_apellido;

  finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
?>
