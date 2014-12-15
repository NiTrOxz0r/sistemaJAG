<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr'], 'sistemaJAG | Registro de allegado');

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Proceso de Registro 2014-2015');

if ( isset($_GET['cedula']) and preg_match( "/[0-9]{8}/", $_GET['cedula']) ) :
  $conexion = conexion();
  $cedula = mysqli_escape_string( $conexion, trim($_GET['cedula']) );
  $query = "SELECT
    persona.p_nombre,
    persona.p_apellido,
    persona.cedula,
    alumno.cedula_escolar
    from persona
    inner join alumno
    on alumno.cod_persona = persona.codigo
    where persona.cedula = $cedula;";
  $resultado = conexion($query);
  if ($resultado->num_rows <> 0) :
    $datosAlumno = mysqli_fetch_assoc($resultado);
    $go = true;
  else :
    $go = false;
  endif;
  mysqli_close($conexion);
endif;
//CONTENIDO:
if($go):?>
  <div id="contenido_form_reg_P">
    <div id="blancoAjax">
      <div class="container">
        <div class="row">
          <!-- http://www.w3schools.com/html/html_forms.asp -->
          <form action="insertar_PA.php" method="POST" id="form" name="form" class="form-horizontal">
            <fieldset>
              <legend class="text-center">Datos del Alumno</legend>
              <!-- datos del alumno -->
              <div class="container">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="cedula_a" class="control-label">Cedula</label>
                          <input
                            class="form-control bloquear"
                            type="text"
                            maxlength="8"
                            name="cedula_a"
                            id="cedula_a"
                            required
                            value="<?php echo $datosAlumno['cedula'] ?>"
                            disabled>
                          <p class="help-block" id="cedula_a_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="cedula_a" class="control-label">Cedula Escolar</label>
                          <input
                            class="form-control bloquear"
                            type="text"
                            maxlength="8"
                            name="cedula_a"
                            id="cedula_a"
                            required
                            value="<?php echo $datosAlumno['cedula_escolar'] ?>"
                            disabled>
                          <p class="help-block" id="cedula_a_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="p_nombre_r" class="control-label">Nombre y Apellido</label>
                          <input
                            class="form-control bloquear"
                            type="text"
                            disabled
                            value="<?php echo $datosAlumno['p_nombre'].", ".$datosAlumno['p_apellido'] ?>"
                            name="p_nombre_r"
                            id="p_nombre_r"/>
                          <p class="help-block" id="p_nombre_r_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <legend class="text-center text-uppercase">
                <h1>Registro de familar o allegado</h1>
              </legend>
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
                  <div class="col-sm-5 col-sm-offset-1">
                    <!-- http://www.w3schools.com/tags/att_input_autocomplete.asp -->
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
                        required>
                      <p class="help-block" id="cedula_chequeo">
                      </p>
                      <p class="help-block" id="cedula_chequeo_adicional">
                      </p>
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
                <!-- lugar de nacimiento -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="lugar_nac" class="control-label">Lugar de nacimiento</label>
                      <input
                        class="form-control"
                        type="text"
                        name="lugar_nac"
                        id="lugar_nac"
                        maxlength="50">
                      <p class="help-block" id="lugar_nac_chequeo">
                      </p>
                    </div>
                  </div>
                </div>
                <!-- inicio de fecha de nac, sexo, nivel edc -->
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
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
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
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
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-12">
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
                  </div>
                </div>
                <!-- inicio de telefonos y email -->
                <div class="row">
                  <div class="col-sm-4">
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
                  <div class="col-sm-4">
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
                  <div class="col-sm-4">
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
                            maxlength="50">
                          </div>
                          <p class="help-block" id="email_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- inicio de parentesco y vive_con_alumno -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="relacion" class="control-label">Parentesco</label>
                          <?php $sql="SELECT codigo, descripcion from relacion where status = 1;";
                            $registros = conexion($sql);?>
                          <select class="form-control" name="relacion" required id="relacion">
                            <option value="">Seleccione una opci&oacute;n</option>
                            <?php while($fila = mysqli_fetch_array($registros)) :?>
                              <option value="<?php echo $fila['codigo']?>">
                              <?php echo $fila['descripcion']?></option>
                            <?php endwhile; ?>
                          </select>
                          <p class="help-block" id="relacion_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="vive_con_alumno" class="control-label">¿Vive con el alumno?</label>
                          <select class="form-control" name="vive_con_alumno" id="vive_con_alumno">
                            <option selected="selected" value="s">SI</option>
                            <option value="n">NO</option>
                          </select>
                          <p class="help-block" id="vive_con_alumno_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- direccion personal -->
                <fieldset>
                  <legend class="text-center">Direccion de habitacion</legend>
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
                  <!-- direccion exacta -->
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
                <!-- datos laborales -->
                <fieldset>
                  <legend class="text-center">Datos Laborales</legend>
                  <!-- inicio de profesion, lugar y telefono laboral -->
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="profesion" class="control-label">Profesion</label>
                            <?php $sql = "SELECT codigo, descripcion from profesion where status = 1;";
                              $registros = conexion($sql);?>
                            <select class="form-control" name="profesion" id="profesion">
                              <option value="">Seleccione</option>
                              <?php while($fila = mysqli_fetch_array($registros)) : ?>
                                <option value="<?php echo $fila['codigo']?>">
                                <?php echo $fila['descripcion']?></option>
                              <?php endwhile; ?>
                            </select>
                            <p class="help-block" id="profesion_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="lugar_trabajo" class="control-label">Lugar de trabajo</label>
                            <input
                              class="form-control"
                              type="text"
                              name="lugar_trabajo"
                              id="lugar_trabajo"
                              maxlength="50">
                            <p class="help-block" id="lugar_trabajo_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group">
                            <label for="telefono_trabajo" class="control-label">Telefono laboral</label>
                            <input
                              class="form-control"
                              type="text"
                              name="telefono_trabajo"
                              id="telefono_trabajo"
                              maxlength="11">
                            <p class="help-block" id="telefono_trabajo_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- inicio de dir de trabajo -->
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group">
                            <label for="direccion_trabajo" class="control-label">Direccion de trabajo (Av/Calle/Edf.)</label>
                            <input
                              class="form-control"
                              type="text"
                              name="direccion_trabajo"
                              id="direccion_trabajo"
                              maxlength="150">
                            <p class="help-block" id="direccion_trabajo_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
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
                          Una vez completado este registro, el sistema
                          continuara al registro del alumno asociado a esta persona.
                        </em>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
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
      <!-- esto es para ajax -->
      <?php $cargadorOnClick = enlaceDinamico("java/ajax/cargadorOnClick.js"); ?>
      <?php $validacionP = enlaceDinamico("java/validacionP.js"); ?>
      <script type="text/javascript" src="<?php echo $cargadorOnClick ?>"></script>
      <!-- validacion -->
      <script type="text/javascript" src="<?php echo $validacionP ?>"></script>
      <script type="text/javascript">
        $(function(){
          $('#form').on('change', function(){
            validacionPA();
          });
          $('#submit').on('click', function(){
            if (validacionPA()) {
              return true;
            }else{
              return false;
            }
          });
        });
      </script>
      <!-- ajax de edo/mun/parr -->
      <?php $estado = enlaceDinamico("java/edo.php"); ?>
      <?php $municipio = enlaceDinamico("java/mun.php"); ?>
      <?php $parroquia = enlaceDinamico("java/parro.php"); ?>
      <!-- ajax direccion -->
      <script type="text/javascript">
        /**
         * Andres Leutor.
         * Alejandro Granadillo.
         * ajax necesario para estados, municipios
         * y parroquias dinamico.
         */
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
      <?php $cssDatepick = enlaceDinamico("java/jqDatePicker/smoothness.datepick.css"); ?>
      <link href="<?php echo $cssDatepick ?>" rel="stylesheet">
      <?php $plugin = enlaceDinamico("java/jqDatePicker/jquery.plugin.js"); ?>
      <?php $datepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.js"); ?>
      <script type="text/javascript" src="<?php echo $plugin ?>"></script>
      <script type="text/javascript" src="<?php echo $datepick ?>"></script>
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
      <!-- cedula y validacionDireccion -->
      <script type="text/javascript">
        /**
         * hecho por slayerfat, dudas o sugerencias ya saben donde estoy.
         *
         * chequeo y operaciones relacionadas con ajax
         * para el campo cedula.
         */
        $(function(){
          // cedula
          $.ajax({
            url: '../java/ajax/cedula.js',
            type: 'POST',
            dataType: 'script'
          });
          // se trae la validacion de edo/mun/parro
          $.ajax({
            url: '../java/validacionDireccion.js',
            type: 'POST',
            dataType: 'script'
          });
        });
        // $(function(){
        //   $.ajax({
        //     url: '../java/validacionCedula.js',
        //     type: 'POST',
        //     dataType: 'script'
        //   });
        //   $('#cedula').on('change', function(){
        //     var cedula = $(this).val();
        //     if ( validacionCedula(cedula) ) {
        //       $("#cedula_chequeo").html('');
        //       $.ajax({
        //         url: '../java/cedula.php',
        //         type: 'POST',
        //         data: {cedula:cedula},
        //         success: function (datos){
        //           $('#cedula_chequeo').empty();
        //           //se comprueba si es valido o no por
        //           //medio del data-disponible
        //           //true si esta disponible, falso si no.
        //           var disponible = $(datos+'#disponible').data('disponible');
        //           if (disponible === true) {
        //             $('#cedula_chequeo_adicional').html('');
        //             $('#form input, #form select, #form textarea').each(function(){
        //               $(this).prop('disabled', false);
        //             });
        //           }else{
        //             $('#form input, #form select, #form textarea').each(function(){
        //               $(this).prop('disabled', true);
        //             });
        //             $('#cedula').prop('disabled', false);
        //             $('#cedula_chequeo').html(datos);
        //             $('#cedula_chequeo_adicional').html('para continuar con el registro especifique otra cedula o consulte la ya existente.');
        //           };
        //         },
        //       });
        //     }else{
        //       $("#cedula_chequeo").html('Favor introduzca cedula solo numeros sin caracteres especiales, EJ: 12345678');
        //       $("#cedula_titulo").css('color', 'red');
        //       $('#submitDos').prop('disabled', true);
        //     };
        //   });
        // });
      </script>
      <!-- email -->
      <script type="text/javascript">
        $(function(){
          $.ajax({
            url: '../java/ajax/ClaseChequearEmail.js',
            type: 'POST',
            dataType: 'script',
            success:function(){
              email = new ChequearEmail($('#email'), 'personal_autorizado');
              email.original();
              $('#email').on('change', function () {
                email.cambiar();
                email.chequear();
              });
            },
          });
        });
      </script>
      <!--  -->
      <!--  -->
      <!-- NO HAY TIEMPO PARA DESARROLLAR ESTO: -->
      <!-- mostrar y ocultar -->
      <!-- <script type="text/javascript">
        /**
         * hecho por slayerfat, ya saben donde estoy.
         */
        $(function (){
          $('.mostrar').show();
          $('.ocultar').hide();
          $('.iniciadorMostrar').on('click', function(){
            $('.mostrar').toggle();
            $('.ocultar').toggle();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
          });
        });
      </script> -->
    </div>
  </div>
<?php else: ?>
  <div id="contenido_form_reg_A">
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
            <!-- !importante -->
            <?php $enlace = encuentraCedula($_GET['cedula']) ?>
            <?php if ( $enlace ): ?>
              <!-- se quedaron locos verdad? -->
              <div class="bg-info">
                <h2>
                  Sin embargo:
                </h2>
                <p>
                  Esta cedula
                  <a href="<?php echo $enlace ?> ">existe en el sistema</a>
                </p>
              </div>
            <?php else: ?>
              <?php
              $enlace = "personalAutorizado/form_reg_P.php?cedula=$_GET[cedula]";
              $inscripcion = enlaceDinamico("$enlace"); ?>
              <p>
                La cedula <?php echo $_GET['cedula'] ?>, no esta registrada en el sistema.
                <em>Para registrar a un alumno, es necesario registrar primero al representante.</em>
                para ir al proceso de inscripcion <a href="<?php echo $inscripcion ?>">
                puede seguir este enlace.
                </a>
              </p>
              <!-- google hide me: slayerfat@gmail.com -->
            <?php endif ?>
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
<?php endif;
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
