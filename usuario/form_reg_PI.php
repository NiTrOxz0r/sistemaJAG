<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);

if ( (isset($_POST['seudonimo']) && isset($_POST['clave']) )
  || isset($_GET['cedula']) ):
  if ( isset($_POST['seudonimo']) && isset($_POST['clave']) ) :
    $seudonimo = $_POST['seudonimo'];
    $clave = array('simple' => $_POST['clave']);
    $validarForma = new ChequearUsuario($seudonimo, $clave);
    $hash = password_hash($clave['simple'], PASSWORD_BCRYPT, ['cost' => 12]);
    $_SESSION['seudonimo'] = $validarForma->seudonimo;
    $_SESSION['clave'] = $hash;
    $action = 'insertar_U.php';
    $disabled = false;
    $info = 1;
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['cod_tipo_usr_registro'] = 5;
    $_SESSION['seudonimo'] = $validarForma->seudonimo;
    $_SESSION['clave'] = $hash;
  endif;
  if ( isset($_GET['cedula']) && strlen($_GET['cedula']) === 8 ) :
    $cedula = $_GET['cedula'];
    $action = 'insertar_sinUsuario_PI.php';
    $disabled = true;
    $info = 2;
  else:
    $cedula = "";
  endif;
  //CONTENIDO:?>
  <div id="contenido_form_reg_PI">
    <div id="blancoAjax" class="container">
      <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
      <!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
      <div class="row">
        <?php if ($info == 1): ?>
          <div id="info" class="col-xs-12">
            <p class="bg-success">
              Seudonimo y clave validos!
            </p>
          </div>
        <?php elseif ($info == 2): ?>
          <div id="info" class="col-xs-12">
            <!-- <p>
              Por favor continue el proceso de registro introduciendo los datos basicos:
            </p> -->
          </div>
        <?php endif ?>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <form
          role="form"
          class="form-horizontal"
          name="form_PI"
          id="form_PI"
          method="POST"
          action="<?php echo $action; ?>">
            <fieldset>
              <legend class="text-center">Continue con el proceso de registro</legend>
              <div class="container">
                <!-- inicio de nacionalidad y cedula -->
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="nacionalidad" class="control-label">Nacionalidad</label>
                      <select
                        name="nacionalidad"
                        id="nacionalidad"
                        required
                        class="form-control">
                        <option selected="selected" value="v">Venezolano</option>
                        <option value="e">Extrangero</option>
                      </select>
                        <p class="help-block" id="nacionalidad_chequeo">
                        </p>
                    </div>
                  </div>
                  <div class="col-sm-3 col-sm-offset-1">
                    <div class="form-group">
                      <label for="cedula" class="control-label">Cedula</label>
                      <input
                        type="text"
                        maxlength="8"
                        name="cedula"
                        id="cedula"
                        class="form-control"
                        autofocus="autofocus"
                        placeholder="Introduzca cedula ej: 12345678"
                        value="<?php echo $cedula; ?>"
                        <?php echo ($disabled === (true) ? 'disabled' : null); ?>
                        required>
                      <p class="help-block" id="cedula_chequeo">
                      </p>
                    </div>
                  </div>
                  <div class="col-sm-5"></div>
                </div>
                <!-- inicio de nombres -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="p_nombre" class="control-label">Primer Nombre</label>
                          <input
                            class="form-control"
                            type="text"
                            name="p_nombre"
                            id="p_nombre"
                            required
                            maxlength="20">
                          <p class="help-block" id="p_nombre_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="s_nombre" class="control-label">Segundo Nombre</label>
                          <input
                            class="form-control"
                            type="text"
                            name="s_nombre"
                            id="s_nombre"
                            maxlength="20">
                          <p class="help-block" id="s_nombre_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- inicio de apellidos -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="p_apellido" class="control-label">Primer apellido</label>
                          <input
                            class="form-control"
                            type="text"
                            name="p_apellido"
                            id="p_apellido"
                            required
                            maxlength="20">
                          <p class="help-block" id="p_apellido_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="s_apellido" class="control-label">Segundo apellido</label>
                          <input
                            class="form-control"
                            type="text"
                            name="s_apellido"
                            id="s_apellido"
                            maxlength="20">
                          <p class="help-block" id="s_apellido_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- inicio de fecha de nac, sexo, nivel edc, titulo -->
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="fec_nac" class="control-label">Fecha de nacimiento</label>
                      <input
                        class="form-control"
                        type="text"
                        name="fec_nac"
                        id="fec_nac"
                        required>
                      <p class="help-block" id="fec_nac_chequeo">
                      </p>
                    </div>
                  </div>
                  <div class="col-sm-3 col-sm-offset-1">
                    <div class="form-group">
                      <label for="sexo" class="control-label">Sexo</label>
                      <?php $query = "SELECT codigo, descripcion
                        from sexo where status = 1;";
                        $registros = conexion($query);?>
                      <select class="form-control" name="sexo" id="sexo" required>
                        <option value="">Seleccione una opci&oacute;n </option>
                        <?php while($fila = mysqli_fetch_array($registros)) : ?>
                         <option value="<?php echo $fila['codigo']; ?>">
                           <?php echo $fila['descripcion']; ?>
                         </option>
                        <?php endwhile; ?>
                       </select>
                      <p class="help-block" id="sexo_chequeo">
                      </p>
                    </div>
                  </div>
                  <div class="col-sm-4 col-sm-offset-1">
                    <div class="form-group">
                      <label for="nivel_instruccion" class="control-label">Nivel Educativo</label>
                      <?php $sql="SELECT codigo, descripcion from nivel_instruccion where status = 1;";
                        $registros = conexion($sql);?>
                      <select class="form-control" name="nivel_instruccion" required id="nivel_instruccion">
                      <?php while($fila = mysqli_fetch_array($registros)) : ?>
                        <option value="<?php echo $fila['codigo']?>">
                        <?php echo $fila['descripcion']?></option>
                      <?php endwhile; ?>
                      </select>
                      <p class="help-block" id="nivel_instruccion_chequeo">
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="titulo" class="control-label">Titulos y/o Certificados</label>
                      <input
                        class="form-control"
                        type="text"
                        name="titulo"
                        id="titulo"
                        maxlength="80"
                        required>
                      <p class="help-block" id="titulo_chequeo">
                      </p>
                    </div>
                  </div>
                </div>
                <!-- inicio de telefonos y email -->
                <div class="row">
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label class="control-label" for="telefono">Telefono</label>
                          <input
                            class="form-control"
                            type="text"
                            maxlength="11"
                            name="telefono"
                            id="telefono">
                          <p class="help-block" id="telefono_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label class="control-label" for="telefono_otro">Telefono Adicional</label>
                          <input
                            class="form-control"
                            type="text"
                            maxlength="11"
                            name="telefono_otro"
                            id="telefono_otro">
                          <p class="help-block" id="telefono_otro_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label class="control-label" for="celular">Telefono Celular</label>
                          <input
                            class="form-control"
                            type="text"
                            maxlength="11"
                            name="celular"
                            id="celular">
                          <p class="help-block" id="celular_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label class="control-label" for="email">Correo Electronico</label>
                          <div class="input-group">
                            <div class="input-group-addon">@</div>
                            <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            maxlength="40"
                            required>
                          </div>
                          <p class="help-block" id="email_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- inicio de cargo, perfil y direccion exacta -->
                <div class="row">
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="cargo" class="control-label">Cargo</label>
                          <?php $sql="SELECT codigo, descripcion from cargo where status = 1;";
                            $registros = conexion($sql);?>
                          <select class="form-control" name="cod_cargo" required id="cargo">
                          <?php while($fila = mysqli_fetch_array($registros)) : ?>
                            <option value="<?php echo $fila['codigo']?>">
                            <?php echo $fila['descripcion']?></option>
                          <?php endwhile; ?>
                          </select>
                          <p class="help-block" id="cargo_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="tipo_personal" class="control-label">Perfil de usuario</label>
                          <?php $sql="SELECT codigo, descripcion from tipo_personal where status = 1;";
                            $registros = conexion($sql);?>
                          <select class="form-control" name="tipo_personal" required id="tipo_personal">
                            <option selected="selected" value="">--Seleccione--</option>
                            <?php while($fila = mysqli_fetch_array($registros)) : ?>
                                <option value="<?php echo $fila['codigo']?>">
                                <?php echo $fila['descripcion']?></option>
                            <?php endwhile; ?>
                          </select>
                          <p class="help-block" id="tipo_personal_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="direcc" class="control-label">Direccion (Av/Calle/Edf.)</label>
                          <textarea
                          class="form-control"
                          maxlenght="150"
                          rows="2"
                          name="direcc"
                          id="direcc"></textarea>
                          <p class="help-block" id="direcc_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- inicio de estado, municio y parroquia -->
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label class="control-label" for="cod_est">Estado</label>
                          <select class="form-control" name="cod_est" id="cod_est"></select>
                          <p class="help-block" id="cod_est_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label class="control-label" for="cod_mun">Municipio</label>
                          <select class="form-control" name="cod_mun" id="cod_mun" >
                            <option value="">--Seleccionar--</option>
                          </select>
                          <p class="help-block" id="cod_mun_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label class="control-label" for="cod_parro">Parroquia</label>
                          <select class="form-control" name="cod_parro" id="cod_parro">
                            <option value="">--Seleccionar--</option>
                          </select>
                          <p class="help-block" id="cod_parro_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2 bg-primary" style="border-radius: 4px;">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4>
                        Por favor, asegurese que sus datos son correctos antes de
                        continuar con el proceso de registro.
                      </h4>
                      <p>
                        <em>
                          Una vez completado este proceso, debera contactar a un
                          administrador del sistema.
                        </em>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
                  <input
                  role="button"
                  class="btn btn-default btn-block"
                  type="submit"
                  name="registrar"
                  value="Continuar">
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    <!-- calendario -->
    <?php $cssDatepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.css"); ?>
    <link href="<?php echo $cssDatepick ?>" rel="stylesheet">
    <?php $plugin = enlaceDinamico("java/jqDatePicker/jquery.plugin.js"); ?>
    <?php $datepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.js"); ?>
    <script type="text/javascript" src="<?php echo $plugin ?>"></script>
    <script type="text/javascript" src="<?php echo $datepick ?>"></script>
    <!-- validacion -->
    <?php $validacion = enlaceDinamico("java/validacionPI.js"); ?>
    <script type="text/javascript" src="<?php echo $validacion ?>"></script>
    <script type="text/javascript">
      $(function(){
        $('#form_PI').on('submit', function (evento){
          evento.preventDefault();
          if ( validacionPI() ) {
            var nacionalidad = $('#nacionalidad').val();
            var cedula = $('#cedula').val();
            var p_nombre = $('#p_nombre').val();
            var s_nombre = $('#s_nombre').val();
            var p_apellido = $('#p_apellido').val();
            var s_apellido = $('#s_apellido').val();
            var fec_nac = $('#fec_nac').val();
            var sexo = $('#sexo').val();
            var email = $('#email').val();
            var nivel_instruccion = $('#nivel_instruccion').val();
            var titulo = $('#titulo').val();
            var telefono = $('#telefono').val();
            var telefono_otro = $('#telefono_otro').val();
            var celular = $('#celular').val();
            var cargo = $('#cargo').val();
            var tipo_personal = $('#tipo_personal').val();
            var direcc = $('#direcc').val();
            var cod_est = $('#cod_est').val();
            var cod_mun = $('#cod_mun').val();
            var cod_parro = $('#cod_parro').val();
            $.ajax({
              url: "<?php echo $action ?>",
              type: 'POST',
              data: {
                nacionalidad:nacionalidad,
                cedula:cedula,
                p_nombre:p_nombre,
                s_nombre:s_nombre,
                p_apellido:p_apellido,
                s_apellido:s_apellido,
                fec_nac:fec_nac,
                sexo:sexo,
                email:email,
                nivel_instruccion:nivel_instruccion,
                titulo:titulo,
                telefono:telefono,
                telefono_otro:telefono_otro,
                celular:celular,
                cod_cargo:cargo,
                tipo_personal:tipo_personal,
                direcc:direcc,
                cod_parroquia:cod_parro
              },
              success: function (datos){
                $('#contenido').html('');
                $("#contenido").load().html(datos);
              },
            });
          };
        });
        $('#form_PI').on('change', function (){
          validacionPI()
        });
      });
    </script>
    <!-- ajax de estado -->
    <?php $estado = enlaceDinamico("java/edo.php"); ?>
    <?php $municipio = enlaceDinamico("java/mun.php"); ?>
    <?php $parroquia = enlaceDinamico("java/parro.php"); ?>
    <!-- ajax de estado/mun/par -->
    <script type="text/javascript">
      $("document").ready(function(){
        $("#cod_est").load("<?php echo $estado ?>");
        $("#cod_est").change(function(){
          var id = $("#cod_est").val();
          $.get("<?php echo $municipio ?>",{param_id:id})
          .done(function(data){
            $("#cod_mun").html(data);
            $("#cod_mun").change(function(){
              var id2 = $("#cod_mun").val();
              $.get("<?php echo $parroquia ?>",{param_id2:id2})
              .done(function(data){
                $("#cod_parro").html(data);
              });
            });
          });
        });
      });
    </script>
    <!-- calendario -->
    <script type="text/javascript">
      <?php $imagen = enlaceDinamico("java/jqDatePicker/calendar-blue.gif"); ?>
      $(function(){
        $('#fec_nac').datepick({
          maxDate:'-h',
          showOn: "button",
          buttonImage: "<?php echo $imagen ?>",
          buttonImageOnly: true,
          dateFormat: "yyyy-mm-dd"
        });
      });
    </script>
  </div>
</div>
<?php else: ?>
  <div id="blancoAjax container">
    <div class="row">
      <div class="col-xs-12">
        <h1>Error en el proceso de registro.</h1>
        <small>Ups! parece ser que trato de ingresar a esta pagina incorrectamente!</small>
      </div>
    </div>
  </div>
<?php endif; ?>
