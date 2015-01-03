<?php

/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 *
 * {@internal [si tienen dudas sobre este archivo
 * pregunten, no es tan dificil, solo sigan el flujo del
 * mismo, para registrar a un personal que desee ser usuario:
 *
 * 1. se inserta usuario.
 * 2. se inserta persona.
 * 3. se inserta personal.
 * 4. se inserta direccion.
 *
 * y listo.
 *
 * este archivo fue cambiado para ajustarse a la nueva base de datos.]}
 *
 * @version [1.7]
 */

if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario desde master.php
validarUsuario();

if ( isset($_SESSION['seudonimo']) && isset($_SESSION['clave']) && isset($_POST['cedula']) ):

  //la clave tiene que ser exactamente 60 caracteres:
  if (strlen($_SESSION['clave']) <> 60) :
    header("Location: form_reg_U.php?clave=MalDefinido");
  endif;
  //datos para saber si es docente o no:
  if (isset($_POST['tipo_personal'])) :
    if ($_POST['tipo_personal'] === '3' || $_POST['tipo_personal'] === '4') :
      $asume = true;
    else:
      $asume = false;
    endif;
  else:
    header("Location: form_reg_PI.php?tipo_personal=MalDefinido");
  endif;
  //iniciamos variables:
  //para el escape string:
  $correcto = true;
  $con = conexion();
  //validamos datos basicos de usuario:
  $validarForma = new ChequearUsuario(
    $_SESSION['seudonimo'],
    array('completo' => $_SESSION['clave']) );
  if ( $validarForma->valido() ) :
    //chequeamos que el usuario ingrese como tal a la
    //tabla usuarios antes que todo:
    //cod_tipo_usr = 5 (por verificar)
    $query = "INSERT INTO usuario
    VALUES
    (null, $validarForma->seudonimo, ".$validarForma->clave['completo'].",
      5, 1, 1, null, 1, current_timestamp );";
    $resultado = conexion($query);
    //MUCHO CUIDADO CON MYSQLI_INSERT_ID
    //ESTA FUNCION TRAE EL  ULTIMO ID AUTOINCREMENTADO.
    //EN POCAS PALABRAS NO ES BUENA IDEA USARLO.
    //
    //chequeamos la BD para ver el codigo:
    //del usuario:
    $query = "SELECT codigo
    from usuario
    where seudonimo = $validarForma->seudonimo
    and clave = ".$validarForma->clave['completo'].";";
    $resultado = conexion($query);
    $datos = mysqli_fetch_assoc($resultado);
    $codigoUsuario = $datos['codigo'];
    $codUsrMod = 1; // 1 porque nadie hace referencia a este registro
  else :
    $codUsrMod = 'invalido';
    $correcto = 'usuario';
  endif;
  if ($correcto === true) :
    //iniciamos datos restantes del formulario:
    $p_apellido = $_POST['p_apellido'];
    $s_apellido = $_POST['s_apellido'];
    $p_nombre = $_POST['p_nombre'];
    $s_nombre = $_POST['s_nombre'];
    $nacionalidad = $_POST['nacionalidad'];
    $cedula = $_POST['cedula'];
    $celular = $_POST['celular'];
    $telefono = $_POST['telefono'];
    $telefonoOtro = $_POST['telefono_otro'];
    $nivel_instruccion = $_POST['nivel_instruccion'];
    $certificado_1 = $_POST['certificado_1'];
    $descripcion_1 = $_POST['descripcion_1'];
    $certificado_2 = $_POST['certificado_2'];
    $descripcion_2 = $_POST['descripcion_2'];
    $certificado_3 = $_POST['certificado_3'];
    $descripcion_3 = $_POST['descripcion_3'];
    $certificado_4 = $_POST['certificado_4'];
    $descripcion_4 = $_POST['descripcion_4'];
    $fecNac = $_POST['fec_nac'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $codTipoUsr = '5'; //tipo: por verificar
    $codCargo = $_POST['cod_cargo'];
    $tipo_personal = $_POST['tipo_personal'];
    //validamos los datos restantes:
    $validarPI = new ChequearPI(
      $codUsrMod,
      $p_apellido,
      $s_apellido,
      $p_nombre,
      $s_nombre,
      $nacionalidad,
      $cedula,
      $celular,
      $telefono,
      $telefonoOtro,
      $nivel_instruccion,
      $certificado_1,
      $descripcion_1,
      $certificado_2,
      $descripcion_2,
      $certificado_3,
      $descripcion_3,
      $certificado_4,
      $descripcion_4,
      $fecNac,
      $sexo,
      $email,
      $codTipoUsr,
      $codCargo,
      $tipo_personal
      );
    if ( $validarPI->valido() ) :
      //se inserta en persona
      //los datos comunes o basicos:
      $query = "INSERT INTO persona
      values
      (null, $validarPI->p_nombre, $validarPI->s_nombre, $validarPI->p_apellido,
        $validarPI->s_apellido, $validarPI->nacionalidad, $validarPI->cedula,
        $validarPI->fecNac, $validarPI->telefono, $validarPI->telefonoOtro,
        $validarPI->sexo, 1, 1, null, 1, current_timestamp);";
      $resultado = conexion($query);

      //averiguamos codigo (y de una vez el resto de campos):
      $query = "SELECT * from persona where cedula = $validarPI->cedula;";
      $resultado = conexion($query);
      if ($resultado->num_rows == 1) :
        $datosDePersona = mysqli_fetch_assoc($resultado);
      endif;

      //se inserta en personal
      //los datos no comunes o especificos:
      $query = "INSERT INTO personal
      values
      (null, $datosDePersona[codigo],
        $validarPI->celular,
        $validarPI->nivelInstruccion,
        $validarPI->certificado_1,
        $validarPI->descripcion_1,
        $validarPI->certificado_2,
        $validarPI->descripcion_2,
        $validarPI->certificado_3,
        $validarPI->descripcion_3,
        $validarPI->certificado_4,
        $validarPI->descripcion_4,
        $validarPI->email, $codigoUsuario,
        $validarPI->codCargo, $validarPI->tipoPersonal,
        1, 1, null, 1, current_timestamp);";
      $resultado = conexion($query);
    else :
      $correcto = 'PI';
    endif;
  endif;
  if ($correcto === true) :
    //validamos campos de direccion:
    $direccion = new ChequearDireccion(
      $codUsrMod,
      $datosDePersona['codigo'],
      $_POST['cod_parro'],
      $_POST['direcc']
      );
    if ($direccion->valido()) :
      //insertamos datos:
      $query = "INSERT INTO direccion
      VALUES
      (null, $direccion->codPersona, $direccion->codParroquia,
        $direccion->direccionExacta,  1, 1, null, 1, current_timestamp);";
      $resultado = conexion($query);
    else :
      $correcto = 'direccion';
    endif;
  endif;
  if ($correcto === true) :
    //por ultimo:
    $query = "SELECT
      usuario.codigo as codigo,
      usuario.seudonimo as seudonimo,
      personal.codigo as cod_docente,
      persona.p_nombre as p_nombre,
      persona.p_apellido as p_apellido,
      usuario.cod_tipo_usr as cod_tipo_usr
      from persona
      inner join personal
      on persona.codigo = personal.cod_persona
      inner join usuario
      on personal.cod_usr = usuario.codigo
      where persona.cedula = $validarPI->cedula;";
    $resultado = conexion($query);
    //si todo sale bien
    //se inicia la sesion de ese usuario:
    if ( $resultado->num_rows == 1 ) :
      $datos = mysqli_fetch_assoc($resultado);

      if ($asume) :
        $query = "INSERT INTO asume values
        (null, $datos[cod_docente], 34, 0,
          'Autogenerado en registro, por sistema.',
          1, 1, null, 1, current_timestamp);";
        $resultado = conexion($query);
      endif;
      session_unset();
      session_destroy();
      session_start();
      $_SESSION['codUsrMod'] = $datos['codigo'];
      $_SESSION['codigo'] = $datos['codigo'];
      $_SESSION['seudonimo'] = $datos['seudonimo'];
      $_SESSION['p_nombre'] = $datos['p_nombre'];
      $_SESSION['p_apellido'] = $datos['p_apellido'];
      $_SESSION['cod_tipo_usr'] = $datos['cod_tipo_usr'];
      empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Registro de usuario');?>
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Registro completo!</h1>
              <h4>
                Bienvenido al sistema <?php echo $_SESSION['seudonimo'] ?>!
              </h4>
              <p class="bg-primary">
                Ud. ya es miembro de este sistema, por favor contacte a un administrador para empezar a usar las diferentes actividades.
              </p>
              <p class="bg-info">
                Ud. tendrá acceso limitado al sistemaJAG mientras su cuenta es validada por un administrador.
              </p>
              <p>
                <?php $index = enlaceDinamico(); ?>
                <a href="<?php echo $index ?>" class="btn btn-primary btn-lg">Regresar al sistema</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php else:
      empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Registro de usuario'); ?>
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Ups!</h1>
              <p>
                Error en la base de datos!
              </p>
              <p class="bg-danger">
                Algo inesperado ocurrió, contacte a un administrador del sistema.
              </p>
              <p>
                <?php $cerrar = enlaceDinamico('cerrar.php'); ?>
                <a class="btn btn-warning btn-lg" href="<?php echo $cerrar ?>">
                  Intente nuevamente
                </a>
              </p>
              <h3>
                <small>
                  Lamentablemente, es posible que los datos ingresados se perdieron.
                </small>
              </h3>
              <p>
                ¿O será que entro en esta pagina erróneamente?
              </p>
              <p class="bg-warning">
                Si este es un problema recurrente, contacte a un administrador del sistema.
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php endif;
  endif;
  if ($correcto !== true) :
    switch ($correcto) :
      case 'usuario':
        $info = $validarForma->info();
        break;
      case 'PI':
        $info = $validarPI->info();
        break;
      case 'direccion':
        $info = $direccion->info();
        break;
      default:
        $info = 'error desconocido!';
        break;
    endswitch;
    $query = "DELETE from usuario where seudonimo = $validarForma->seudonimo;";
    $resultado = conexion($query);
    empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Registro de usuario');?>
    <div id="contenido_insertar_U">
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Ups!</h1>
              <p>
                Error en el proceso de registro!
              </p>
              <h3>
                Los datos suministrados al sistema parecen ser inválidos!
              </h3>
              <div class="bg-danger">
                <p>
                  <em>Específicamente el sistema declara:</em>
                </p>
                <p>
                   <strong>
                     <em>
                        <?php echo $info ?>
                     </em>
                   </strong>
                </p>
              </div>
              <p>
                ¿O será que entro en esta pagina erróneamente?
              </p>
              <p class="bg-warning">
                Si este es un problema recurrente, contacte a un administrador del sistema.
              </p>
              <p>
                <?php $cerrar = enlaceDinamico('cerrar.php'); ?>
                <a class="btn btn-warning btn-lg" href="<?php echo $cerrar ?>">
                  Intente nuevamente
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif;
  //cerramos $con:
  mysqli_close($con);
  //FINALIZAMOS LA PAGINA:
  //trae footer.php y cola.php
  finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
<?php else:
  empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Registro de usuario'); ?>
  <div id="blancoAjax">
    <div class="container">
      <div class="row">
        <div class="jumbotron">
          <h1>Ups!</h1>
          <p>
            Error en el proceso de registro!
          </p>
          <p>
            <?php $cerrar = enlaceDinamico('cerrar.php'); ?>
            <a class="btn btn-warning btn-lg" href="<?php echo $cerrar ?>">
              Intente nuevamente
            </a>
          </p>
          <h3>
            <small>
              Lamentablemente, es posible que los datos ingresados se perdieron.
            </small>
          </h3>
          <p>
            ¿O será que entro en esta pagina erróneamente?
          </p>
          <p class="bg-warning">
            Si este es un problema recurrente, contacte a un administrador del sistema.
          </p>
        </div>
      </div>
    </div>
  </div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
// finalizarPagina(4, 4);?>
<?php endif ?>
