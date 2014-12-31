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
    validarUsuario();
    $_SESSION['cod_tipo_usr_registro'] = 5;
    $_SESSION['seudonimo'] = $validarForma->seudonimo;
    $_SESSION['clave'] = $hash;
    empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
  endif;
  if ( isset($_GET['cedula']) && preg_match( "/[0-9]{6,8}/", $_GET['cedula']) ) :
    validarUsuario(1, 3, $_SESSION['cod_tipo_usr']);
    $cedula = $_GET['cedula'];
    $action = 'insertar_sinUsuario_PI.php';
    $disabled = true;
    $info = 2;
    empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
  else:
    $cedula = "";
  endif;
  //CONTENIDO:?>
  <div id="contenido_form_reg_PI">
    <div id="blancoAjax">
      <div class="container">
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
            name="form"
            id="form"
            method="POST"
            action="<?php echo $action; ?>">
              <fieldset>
                <legend class="text-center">Continue con el proceso de registro</legend>
                <div class="container">
                  <!-- inicio de nacionalidad y cedula -->
                  <div class="row">
                    <div class="col-md-2 col-sm-3">
                      <div class="row">
                        <div class="col-sm-11">
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
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-md-9 col-sm-11">
                          <div class="form-group">
                            <label for="cedula" class="control-label">Cedula</label>
                            <input
                              type="text"
                              maxlength="8"
                              name="cedula"
                              id="cedula"
                              class="form-control"
                              autofocus="autofocus"
                              autocomplete="off"
                              placeholder="Introduzca cedula ej: 12345678"
                              value="<?php echo $cedula; ?>"
                              <?php echo ($disabled === (true) ? 'readonly' : null); ?>
                              required>
                            <p class="help-block" id="cedula_chequeo">
                            </p>
                            <p class="help-block" id="cedula_chequeo_adicional">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3"></div>
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
                  <!-- inicio de fecha de nac, sexo, nivel edc -->
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="fec_nac" class="control-label">Fecha de nacimiento</label>
                        <!-- readonly para que no puedan cambiar manualmente la fecha -->
                        <!-- style cursor pointer etc... para que no parezca desabilitado -->
                        <div class="input-group">
                          <input
                            class="form-control"
                            type="text"
                            name="fec_nac"
                            id="fec_nac"
                            placeholder="click para mostrar calendario"
                            readonly="readonly"
                            style="cursor:pointer; background-color: #FFFFFF"
                            required>
                          <span class="glyphicon glyphicon-calendar input-group-addon"></span>
                        </div>
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
                  <!-- titulos y/o certificados -->
                  <fieldset>
                    <legend class="text-center">Titulos y/o Certificados</legend>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="row">
                          <div class="col-sm-11">
                            <div class="form-group">
                              <label for="certificado_1" class="control-label">Tipo</label>
                              <?php $sql="SELECT codigo, descripcion from certificado where status = 1;";
                                $registros = conexion($sql);?>
                              <select class="form-control" name="certificado_1" required id="certificado_1">
                                <?php while($fila = mysqli_fetch_array($registros)) : ?>
                                  <option value="<?php echo $fila['codigo']?>">
                                  <?php echo $fila['descripcion']?></option>
                                <?php endwhile; ?>
                              </select>
                              <p class="help-block" id="certificado_1_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="descripcion_1" class="control-label">Descripcion</label>
                              <input
                                class="form-control"
                                type="text"
                                name="descripcion_1"
                                id="descripcion_1"
                                maxlength="80">
                              <p class="help-block" id="descripcion_1_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="row">
                          <div class="col-sm-11">
                            <div class="form-group">
                              <label for="certificado_2" class="control-label">Tipo</label>
                              <?php $sql="SELECT codigo, descripcion from certificado where status = 1;";
                                $registros = conexion($sql);?>
                              <select class="form-control" name="certificado_2" required id="certificado_2">
                                <?php while($fila = mysqli_fetch_array($registros)) : ?>
                                  <option value="<?php echo $fila['codigo']?>">
                                  <?php echo $fila['descripcion']?></option>
                                <?php endwhile; ?>
                              </select>
                              <p class="help-block" id="certificado_2_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="descripcion_2" class="control-label">Descripcion</label>
                              <input
                                class="form-control"
                                type="text"
                                name="descripcion_2"
                                id="descripcion_2"
                                maxlength="80">
                              <p class="help-block" id="descripcion_2_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="row">
                          <div class="col-sm-11">
                            <div class="form-group">
                              <label for="certificado_3" class="control-label">Tipo</label>
                              <?php $sql="SELECT codigo, descripcion from certificado where status = 1;";
                                $registros = conexion($sql);?>
                              <select class="form-control" name="certificado_3" required id="certificado_3">
                                <?php while($fila = mysqli_fetch_array($registros)) : ?>
                                  <option value="<?php echo $fila['codigo']?>">
                                  <?php echo $fila['descripcion']?></option>
                                <?php endwhile; ?>
                              </select>
                              <p class="help-block" id="certificado_3_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="descripcion_3" class="control-label">Descripcion</label>
                              <input
                                class="form-control"
                                type="text"
                                name="descripcion_3"
                                id="descripcion_3"
                                maxlength="80">
                              <p class="help-block" id="descripcion_3_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="row">
                          <div class="col-sm-11">
                            <div class="form-group">
                              <label for="certificado_4" class="control-label">Tipo</label>
                              <?php $sql="SELECT codigo, descripcion from certificado where status = 1;";
                                $registros = conexion($sql);?>
                              <select class="form-control" name="certificado_4" required id="certificado_4">
                                <?php while($fila = mysqli_fetch_array($registros)) : ?>
                                  <option value="<?php echo $fila['codigo']?>">
                                  <?php echo $fila['descripcion']?></option>
                                <?php endwhile; ?>
                              </select>
                              <p class="help-block" id="certificado_4_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="descripcion_4" class="control-label">Descripcion</label>
                              <input
                                class="form-control"
                                type="text"
                                name="descripcion_4"
                                id="descripcion_4"
                                maxlength="80">
                              <p class="help-block" id="descripcion_4_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <!-- inicio de telefonos y email -->
                  <fieldset>
                    <legend class="text-center">Informacion de contacto</legend>
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
                                maxlength="50"
                                required>
                              </div>
                              <p class="help-block" id="email_chequeo">
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <!-- inicio de cargo, perfil y direccion exacta -->
                  <fieldset>
                    <legend class="text-center">Cargo y perfil administrativo</legend>
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
                    </div>
                  </fieldset>
                  <!-- inicio de estado, municio y parroquia -->
                  <fieldset>
                    <legend class="text-center">Direccion de Habitacion</legend>
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
                          <div class="col-xs-12">
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
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="direcc" class="control-label">Informacion detallada (Av/Calle/Edf.)</label>
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
                  </fieldset>
                </div>
                <!-- info adicional -->
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2 bg-primary redondeado">
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
                <!-- boton -->
                <div class="row margenArriba">
                  <div class="col-sm-2 col-sm-offset-5">
                    <input
                    role="button"
                    id="submit"
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
        <?php $cssDatepick = enlaceDinamico("java/jqDatePicker/redmond.datepick.css"); ?>
        <?php $cssDatepick = enlaceDinamico("java/jqDatePicker/smoothness.datepick.css"); ?>
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
            $('#form').on('submit', function (evento){
              // DESHABILITADO POR FALTA DE TIEMPO
              // evento.preventDefault();
              // if ( validacionPI() ) {
              //   var nacionalidad = $('#nacionalidad').val();
              //   var cedula = $('#cedula').val();
              //   var p_nombre = $('#p_nombre').val();
              //   var s_nombre = $('#s_nombre').val();
              //   var p_apellido = $('#p_apellido').val();
              //   var s_apellido = $('#s_apellido').val();
              //   var fec_nac = $('#fec_nac').val();
              //   var sexo = $('#sexo').val();
              //   var email = $('#email').val();
              //   var nivel_instruccion = $('#nivel_instruccion').val();
              //   var titulo = $('#titulo').val();
              //   var telefono = $('#telefono').val();
              //   var telefono_otro = $('#telefono_otro').val();
              //   var celular = $('#celular').val();
              //   var cargo = $('#cargo').val();
              //   var tipo_personal = $('#tipo_personal').val();
              //   var direcc = $('#direcc').val();
              //   var cod_est = $('#cod_est').val();
              //   var cod_mun = $('#cod_mun').val();
              //   var cod_parro = $('#cod_parro').val();
              //   $.ajax({
              //     url: "<?php echo $action ?>",
              //     type: 'POST',
              //     data: {
              //       nacionalidad:nacionalidad,
              //       cedula:cedula,
              //       p_nombre:p_nombre,
              //       s_nombre:s_nombre,
              //       p_apellido:p_apellido,
              //       s_apellido:s_apellido,
              //       fec_nac:fec_nac,
              //       sexo:sexo,
              //       email:email,
              //       nivel_instruccion:nivel_instruccion,
              //       titulo:titulo,
              //       telefono:telefono,
              //       telefono_otro:telefono_otro,
              //       celular:celular,
              //       cod_cargo:cargo,
              //       tipo_personal:tipo_personal,
              //       direcc:direcc,
              //       cod_parroquia:cod_parro
              //     },
              //     success: function (datos){
              //       $("#contenido_form_reg_PI").empty().append($(datos).filter('#blancoAjax').html());
              //     },
              //   });
              // };
              if ( validacionPI() ) {
                return true;
              } else{
                return false;
              };
            });
            $('#form').on('change', function (){
              validacionPI();
            });
          });
        </script>
        <!-- cedula -->
        <script type="text/javascript">
          /**
           * hecho por slayerfat, dudas o sugerencias ya saben donde estoy.
           *
           * chequeo y operaciones relacionadas con ajax
           * para el campo cedula.
           */
          $(function(){
            $.ajax({
              url: '../java/validacionCedula.js',
              type: 'POST',
              dataType: 'script'
            });
            $('#cedula').on('change', function(){
              var cedula = $(this).val();
              if ( validacionCedula(cedula) ) {
                $("#cedula_chequeo").html('');
                $.ajax({
                  url: '../java/cedula.php',
                  type: 'POST',
                  data: {cedula:cedula},
                  success: function (datos){
                    $('#cedula_chequeo').empty();
                    //se comprueba si es valido o no por
                    //medio del data-disponible
                    //true si esta disponible, falso si no.
                    var disponible = $(datos+'#disponible').data('disponible');
                    if (disponible === true) {
                      $('#cedula_chequeo_adicional').html('');
                      $('#form input, #form select, #form textarea').each(function(){
                        $(this).parent().removeClass('has-error');
                        $(this).prop('disabled', false);
                      });
                    }else{
                      $('#form input, #form select, #form textarea').each(function(){
                        $(this).parent().addClass('has-error');
                        $(this).prop('disabled', true);
                      });
                      $('#cedula').prop('disabled', false);
                      $('#cedula_chequeo').html(datos);
                      $('#cedula_chequeo_adicional').html('para continuar con el registro especifique otra cedula o consulte la ya existente.');
                    };
                  },
                });
              }else{
                $('#submit').prop('disabled', true);
              };
            });
          });
        </script>
        <!-- email -->
        <script type="text/javascript">
          $(function(){
            $.ajax({
              url: '../java/ajax/ClaseChequearEmail.js',
              type: 'POST',
              dataType: 'script',
              success:function(){
                email = new ChequearEmail($('#email'), 'personal');
                email.original();
                $('#email').on('change', function () {
                  email.cambiar();
                  email.chequear();
                });
              },
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
        <!-- validacion de est, mun, parro -->
        <script type="text/javascript">
          $(function(){
            $.ajax({
              url: '../java/validacionDireccion.js',
              type: 'POST',
              dataType: 'script'
            });
          });
        </script>
        <!-- calendario -->
        <script type="text/javascript">
          $(function(){
            $('#fec_nac').datepick({
              maxDate:'-12Y',
              minDate:'-100Y',
              dateFormat: "yyyy-mm-dd"
            });
          });
        </script>
      </div>
    </div>
  </div>
<?php else: ?>
  <div id="blancoAjax">
    <div class="container">
      <div class="row">
        <div class="jumbotron">
          <h1>Ups!</h1>
          <p>
            Error en el proceso de registro!
          </p>
          <p>
            ¿O entro en esta pagina erroneamente?
          </p>
          <p class="bg-warning">
            Si este es un problema recurrente, contacte a un administrador del sistema.
          </p>
        </div>
      </div>
    </div>
  </div>
<?php endif;
// finalizarPagina(4, 4);
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
