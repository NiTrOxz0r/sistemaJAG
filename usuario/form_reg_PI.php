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
          <div id="info">
            <p>
              Seudonimo y clave validos!
            </p>
            <p>
              Por favor continue el proceso de registro introduciendo sus datos basicos:
            </p>
          </div>
        <?php elseif ($info == 2): ?>
          <div id="info">
            <p>
              Por favor continue el proceso de registro introduciendo los datos basicos:
            </p>
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
              <legend>Continue con el proceso de registro</legend>
              <div class="container">
                <!-- inicio de nacionalidad y cedula -->
                <div class="row">
                  <div class="form-group col-sm-3">
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
                  <div class="col-sm-1"></div>
                  <div class="form-group col-sm-4">
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
                  <div class="col-sm-4"></div>
                </div>
                <!-- inicio de nombres -->
                <div class="row">
                  <div class="col-sm-5 form-group">
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
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5 form-group">
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
                  <div class="col-sm-1"></div>
                </div>
                <!-- inicio de apellidos -->
                <div class="row">
                  <div class="col-sm-5 form-group">
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
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5 form-group">
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
                  <div class="col-sm-1"></div>
                </div>
                <!-- inicio de fecha de nac, sexo, nivel edc, titulo -->
                <div class="row">
                  <div class="col-sm-3 form-group">
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
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3 form-group">
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
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3 form-group">
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
                  <div class="col-sm-1"></div>
                </div>
                <div class="row">
                  <div class="col-sm-12 form-group">
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
            </fieldset>
          </form>
        </div>
                <td>

                </td>
                <td>
                  <input
                    type="text"
                    name="email"
                    id="email"
                    maxlength="40">
                </td>
                <td>
                  <input
                    type="text"
                    name="titulo"
                    id="titulo"
                    maxlength="80">
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td class="chequeo" id="email_chequeo">

                </td>
                <td class="chequeo" id="titulo_chequeo">

                </td>
              </tr>
            </tbody>
            <thead>
              <th id="nivel_instruccion_titulo">Nivel Educativo</th>
              <th id="telefono_titulo">Telefono</th>
              <th id="telefono_otro_titulo">Telefono Adicional</th>
              <th id="celular_titulo">Telefono Celular</th>
            </thead>
            <tbody>
              <tr>
                <td>

                </td>
                <td>
                  <input
                    type="text"
                    maxlength="11"
                    name="telefono"
                    id="telefono">
                </td>
                <td>
                  <input
                    type="text"
                    maxlength="11"
                    name="telefono_otro"
                    id="telefono_otro">
                </td>
                <td>
                  <input
                    type="text"
                    maxlength="11"
                    name="celular"
                    id="celular">
                </td>
              </tr>
              <tr>
                <td></td>
                <td class="chequeo" id="telefono_chequeo">

                </td>
                <td class="chequeo" id="telefono_otro_chequeo">

                </td>
                <td class="chequeo" id="celular_chequeo">

                </td>
              </tr>
            </tbody>
            <thead>
              <th id="cargo_titulo">Cargo</th>
              <th id="tipo_titulo">Perfil de Usuario</th>
              <th id="direcc_titulo">Direccion (Av/Calle/Edf.)</th>
            </thead>
            <tbody>
              <tr>
                <td>
                  <?php $sql="SELECT codigo, descripcion from cargo where status = 1;";
                    $registros = conexion($sql);?>
                  <select name="cod_cargo" required id="cargo">
                  <?php while($fila = mysqli_fetch_array($registros)) : ?>
                    <option value="<?php echo $fila['codigo']?>">
                    <?php echo $fila['descripcion']?></option>
                  <?php endwhile; ?>
                  </select>
                </td>
                <td>
                  <?php $sql="SELECT codigo, descripcion from tipo_personal where status = 1;";
                    $registros = conexion($sql);?>
                  <select name="tipo_personal" required id="tipo_personal">
                    <option selected="selected" value="">--Seleccione--</option>
                    <?php while($fila = mysqli_fetch_array($registros)) : ?>
                        <option value="<?php echo $fila['codigo']?>">
                        <?php echo $fila['descripcion']?></option>
                    <?php endwhile; ?>
                  </select>
                </td>
                <td colspan="3">
                  <textarea
                      maxlenght="150"
                      cols="70"
                      rows="3"
                      name="direcc"
                      id="direcc"></textarea>
                </td>
              </tr>
              <tr>
                <td></td>
              </tr>
            </tbody>
            <thead>
              <th id="estado_titulo">Estado</th>
              <th id="municipio_titulo">Municipio</th>
              <th id="parroquia_titulo">Parroquia</th>
            </thead>
            <tbody>
              <tr>
                <td>
                  <select name="cod_est" id="cod_est"></select>
                </td>
                <td>
                  <select name="cod_mun" id="cod_mun" >
                  <option value="">--Seleccionar--</option></select>
                </td>
                <td>
                  <select name="cod_parro" id="cod_parro">
                  <option value="">--Seleccionar--</option></select>
                </td>
                <td>
                  <input type="submit" name="registrar" value="Continuar">
                </td>
              </tr>
            </tbody>
          </table>
        </form>
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
  <div id="blancoAjax">
    Error en el proceso de registro.
    </br>
    Ups! parece ser que trato de ingresar a esta pagina incorrectamente!
  </div>
<?php endif; ?>
