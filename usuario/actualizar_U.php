<?php
/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 *
 * {@internal [si tienen dudas sobre este archivo
 * pregunten, no es tan dificil, solo sigan el flujo del
 * mismo, para actualizar a un personal (todos) junto a
 * sus datos personales y de usuario (seudonimo, tipo de usr):
 * este archivo fue actualizado para ajustarse a la
 * nueva base de datos propuesta.]}
 *
 *{@internal [se decidio hacer un query de tipo
 *transaccion para no estar con la ladilla de que si algo falla
 *entonces otros queries entran, ejemplo:
 *
 *  1. actualizar persona exitoso
 *  2. actualizar direccion fallo
 *  3. actualizar usuario fallo
 *
 *bajo esa hipotesis, hay un registro actualizado y
 *otros 2 que no fueron actualizados.
 *
 *bajo esta premisa, por medio de transacciones se permite
 *hacer todo como si fuera un solo query si algo falla, todo falla
 *asi no hay datos incompletos en BD.
 *
 *no tengo tiempo para hacerles el tuturial. lean y aprendan.
 *-slayerfat.]}
 *
 *
 * @version [1.7]
 */
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 3, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Actualizacion de usuario');

if (isset($_POST['tipo_personal'])  and isset($_POST['cedula']) ) :
  $con = conexion();
  // chequeamos seudonimo:
  $validarUsuario = new ChequearUsuario ($_POST['seudonimo']);
  // chequeamos datos de direccion:
  $validarDireccion = new ChequearDireccion (
    $_SESSION['codUsrMod'],
    $_SESSION['codigo_persona'],
    $_POST['cod_parro'],
    $_POST['direcc']
    );
  // chequeamos datos del formulario:
  $validarPI = new ChequearPI(
    $_SESSION['codUsrMod'],
    $_POST['p_apellido'],
    $_POST['s_apellido'],
    $_POST['p_nombre'],
    $_POST['s_nombre'],
    $_POST['nacionalidad'],
    $_POST['cedula'],
    $_POST['celular'],
    $_POST['telefono'],
    $_POST['telefono_otro'],
    $_POST['nivel_instruccion'],
    $_POST['titulo'],
    $_POST['fec_nac'],
    $_POST['sexo'],
    $_POST['email'],
    $_POST['cod_tipo_usr'],
    $_POST['cod_cargo'],
    $_POST['tipo_personal']
    );
  // update del personal:
  mysqli_autocommit($con, false);
  $query_ok = true;
  $query = "UPDATE direccion set
  cod_persona = $validarDireccion->codPersona,
  cod_parroquia = $validarDireccion->codParroquia,
  direccion_exacta = $validarDireccion->direccionExacta,
  cod_usr_mod = $validarPI->codUsrMod,
  fec_mod = current_timestamp
  where codigo = $_SESSION[codigo_direccion];";
  mysqli_query($con, $query) ? null : $query_ok=false;
  $query = "UPDATE persona
  set
  p_apellido = $validarPI->p_apellido,
  s_apellido = $validarPI->s_apellido,
  p_nombre = $validarPI->p_nombre,
  s_nombre = $validarPI->s_nombre,
  nacionalidad = $validarPI->nacionalidad,
  cedula = $validarPI->cedula,
  telefono = $validarPI->telefono,
  telefono_otro = $validarPI->telefonoOtro,
  fec_nac = $validarPI->fecNac,
  sexo = $validarPI->sexo,
  cod_usr_mod = $validarPI->codUsrMod,
  fec_mod = current_timestamp
  where
  codigo = $_SESSION[codigo_persona];";
  mysqli_query($con, $query) ? null : $query_ok=false;
  $query = "UPDATE personal
  set
  celular = $validarPI->celular,
  nivel_instruccion = $validarPI->nivel_instruccion,
  titulo = $validarPI->titulo,
  email = $validarPI->email,
  cod_cargo = $validarPI->codCargo,
  tipo_personal = $validarPI->tipoPersonal,
  cod_usr_mod = $validarPI->codUsrMod,
  fec_mod = current_timestamp
  where
  codigo = $_SESSION[codigo_personal];";
  mysqli_query($con, $query) ? null : $query_ok=false;
  //se chequea si esta variable existe
  //para saber si hay que updatear usuario o no:
  if (isset($_SESSION['codigo_usuario'])) :
    $query = "UPDATE usuario
    set
    seudonimo = $validarUsuario->seudonimo,
    cod_tipo_usr = $validarPI->codTipoUsr,
    cod_usr_mod = $validarPI->codUsrMod,
    fec_mod = current_timestamp
    where codigo = $_SESSION[codigo_usuario];";
    mysqli_query($con, $query) ? null : $query_ok=false;
  else:
    //por implementar
  endif;
  $query_ok ? mysqli_commit($con) : mysqli_rollback($con);
  mysqli_close($con);
  if ($query_ok) :?>
    <div id="contenido_actualizar_U">
      <div id="blancoAjax">
        <div class="container">
          <div class="row">
            <div class="jumbotron">
              <h1>Actualizacion exitosa!</h1>
              <h4>
                Los registros asociados con
                <strong>
                  <?php
                    /*esto fue implementado en insertar_U.php
                    especificamente en la clase ChequearUsuario.
                    // en pocas palabras hace que 'nombre' sea nombre.*/
                    // $apellido = $validarUsuario->clave($validarPI->p_apellido);
                    // $nombre = $validarUsuario->clave($validarPI->p_nombre);
                    echo $_POST['p_apellido'].", ".$_POST['p_nombre']; ?>
                </strong>
                fueron actualizados correctamente!
              </h4>
              <p>
                <small>
                  puede generar un pdf:
                </small>
              </p>
              <!-- botones de control -->
              <div class="margen">
                <div class="row margen">
                  <div class="col-sm-4">
                    <a href="reportes/detallado.php?cedula=<?php echo $_POST['cedula'] ?>" class="cons-est btn btn-default btn-block">Generar Reporte</a>
                  </div>
                </div>
              </div>
              <p>
                Si desea hacer otra actualizacion de un usuario por favor dele
                <a href="menucon.php">click a este enlace</a>
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
  <?php else: ?>
    <div id="contenido_actualizar_U">
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
                  Lamentablemente, es posible que los datos de actualizacion se perdieron.
                </small>
              </h3>
              <p>
                Si desea hacer otra actualizacion de un usuario por favor dele
                <a href="menucon.php">click a este enlace</a>
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
  <?php endif; ?>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
<?php else: ?>
  <?php header('Location: consultar_U.php?error=vacio'); ?>
<?php endif; ?>
