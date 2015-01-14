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
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Actualizacion de alumno');

if (isset($_REQUEST['cedula'])) {
  if ($_REQUEST['cedula'] <> "" and strlen($_REQUEST['cedula']) == 8) {
    $con = conexion();
    $cedula = mysqli_escape_string($con, $_REQUEST['cedula']);
  }
}else{
  $enlace = enlaceDinamico("menucom.php?cedulaError=unset");
  header("Location:".$enlace);
}

$sql = "SELECT
  a.codigo,
  cedula,
  cedula_escolar,
  nacionalidad,
  p_nombre,
  s_nombre,
  p_apellido,
  s_apellido,
  sexo,
  fec_nac,
  lugar_nac,
  telefono,
  telefono_otro,
  cod_parroquia as cod_parro,
  cod_mun as cod_mun, cod_edo as cod_est,
  direccion_exacta as direccion,
  acta_num_part_nac,
  acta_folio_num_part_nac,
  plantel_procedencia,
  repitiente,
  altura,
  peso,
  camisa,
  pantalon,
  zapato,
  cod_curso,
  certificado_vacuna,
  cod_discapacidad,
  comentarios,
  canaima,
  bicentenario,
  partida_nac,
  boleta,
  constancia_nino_sano,
  fotos_representante,
  fotocopia_cedula_pa,
  fotocopia_cedula_pr
  FROM persona a
  inner join alumno b on (a.codigo=b.cod_persona)
  inner join direccion c on (a.codigo=c.cod_persona)
  inner join parroquia d on (c.cod_parroquia=d.codigo)
  inner join municipio e on (d.cod_mun=e.codigo)
  inner join estado f on (e.cod_edo=f.codigo) where cedula='$cedula';";
$re = conexion($sql);
if($reg = mysqli_fetch_array($re)) :
  $_SESSION['codigo_persona'] = $reg['codigo'];
  $query = "SELECT persona.cedula
    from persona
    inner join personal_autorizado
    on persona.codigo = personal_autorizado.cod_persona
    where personal_autorizado.codigo = (
      SELECT cod_representante
      from alumno
      inner join persona
      on alumno.cod_persona = persona.codigo
      where persona.cedula = '$cedula');";
  $resultado = conexion($query);
  $cedula_r = mysqli_fetch_array($resultado);
  $query = "SELECT asume.cod_curso
    from asume
    inner join alumno
    on asume.codigo = alumno.cod_curso
    inner join persona
    on alumno.cod_persona = persona.codigo
    where cedula = '$cedula'";
  $resultado = conexion($query);
  $codCurso = mysqli_fetch_array($resultado);
  ?>
  <div id="contenido_act_A">
    <div id="blancoAjax">
      <div class="container">
        <div class="row">
          <!-- botones de control -->
          <div class="margen">
            <div class="row margen">
              <div class="col-sm-4 col-sm-offset-4">
                <?php if ($_SESSION['cod_tipo_usr'] < 2): ?>
                  <button class="actualizar btn btn-primary btn-block disabled">Actualizar</button>
                <?php else: ?>
                  <button class="actualizar btn btn-primary btn-block">Actualizar</button>
                <?php endif ?>
              </div>
            </div>
            <div class="row margen">
              <div class="col-sm-4">
                <a href="reportes/constancia-inscripcion.php?cedula=<?php echo $cedula ?>" class="cons-ins btn btn-default btn-block">Constancia Inscrición</a>
              </div>
              <div class="col-sm-4">
                <a href="reportes/constancia-estudio.php?cedula=<?php echo $cedula ?>" class="cons-est btn btn-default btn-block">Constancia Estudios</a>
              </div>
              <div class="col-sm-4">
                <a href="reportes/detallado.php?cedula=<?php echo $cedula ?>" class="cons-est btn btn-default btn-block">Generar Reporte</a>
              </div>
            </div>
            <div class="row margen">
              <div class="col-sm-4">
                <a href="../personalAutorizado/form_act_P.php?cedula=<?php echo $cedula_r['cedula'] ?>" class="cons-ins btn btn-info btn-block">Consultar Representante</a>
              </div>
              <div class="col-sm-4">
                <a href="allegados_A.php?cedula=<?php echo $reg['cedula'] ?>" class="cons-est btn btn-info btn-block">Consultar Allegados</a>
              </div>
              <div class="col-sm-4">
                <a href="../curso/consultar_C.php?tipo=3&curso=<?php echo $codCurso['cod_curso'] ?>" class="cons-est btn btn-info btn-block">Consultar Curso</a>
              </div>
            </div>
          </div>
          <!-- http://www.w3schools.com/html/html_forms.asp -->
          <form action="actualizar_A.php" method="POST" id="form" name="form_alu" class="form-horizontal">
            <fieldset>
              <legend class="text-center text-uppercase">
                <h1>consulta de alumno</h1>
              </legend>
              <!-- formulario alumno -->
              <div class="container">
                <!-- inicio de nacionalidad y cedulas -->
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="nacionalidad" class="control-label">Nacionalidad</label>
                          <select
                            name="nacionalidad"
                            id="nacionalidad"
                            required
                            disabled
                            class="form-control">
                            <?php if ( $reg['nacionalidad'] == 'v' ): ?>
                              <option  value="v" selected="selected">Venezolano</option>
                              <option  value="e">Extranjero</option>
                            <?php else: ?>
                              <option  value="v">Venezolano</option>
                              <option  value="e" selected="selected">Extranjero</option>
                            <?php endif ?>
                          </select>
                            <p class="help-block" id="nacionalidad_chequeo">
                            </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="cedula" class="control-label">Cédula</label>
                          <input
                            type="text"
                            maxlength="8"
                            name="cedula"
                            id="cedula"
                            class="form-control"
                            autofocus="autofocus"
                            autocomplete="off"
                            disabled
                            placeholder="Introduzca cedula ej: 12345678"
                            value="<?php echo $reg['cedula'];?>"
                            required>
                          <p class="help-block" id="cedula_chequeo">
                          </p>
                          <p class="help-block" id="cedula_chequeo_adicional">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="cedula_escolar" class="control-label">Cédula Escolar</label>
                          <input
                            type="text"
                            maxlength="10"
                            name="cedula_escolar"
                            id="cedula_escolar"
                            class="form-control"
                            autofocus="autofocus"
                            autocomplete="off"
                            disabled
                            placeholder="Introduzca cedula escolar ej: 1234567890"
                            value="<?php echo $reg['cedula_escolar'];?>"
                            required>
                          <p class="help-block" id="cedula_escolar_chequeo">
                          </p>
                          <p class="help-block" id="cedula_escolar_chequeo_adicional">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- inicio de acta num y folio -->
                <fieldset>
                  <legend class="text-center">Partida de nacimiento</legend>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="acta_num_part_nac" class="control-label">Numero de acta</label>
                            <input
                              class="form-control"
                              type="number"
                              name="acta_num_part_nac"
                              id="acta_num_part_nac"
                              disabled
                              value="<?php echo $reg['acta_num_part_nac'];?>"
                              maxlength="20">
                            <p class="help-block" id="acta_num_part_nac_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group">
                            <label for="acta_folio_num_part_nac" class="control-label">Numero de folio</label>
                            <input
                              class="form-control"
                              type="number"
                              disabled
                              name="acta_folio_num_part_nac"
                              id="acta_folio_num_part_nac"
                              value="<?php echo $reg['acta_folio_num_part_nac'];?>"
                              maxlength="20">
                            <p class="help-block" id="acta_folio_num_part_nac_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <!-- nombres y apellidos -->
                <fieldset>
                  <legend class="text-center">Datos básicos</legend>
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
                              value="<?php echo $reg['p_nombre'];?>"
                              required
                              disabled
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
                              disabled
                              value="<?php echo $reg['s_nombre'];?>"
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
                              disabled
                              value="<?php echo $reg['p_apellido'];?>"
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
                              disabled
                              value="<?php echo $reg['s_apellido'];?>"
                              maxlength="20">
                            <p class="help-block" id="s_apellido_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
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
                        disabled
                        value="<?php echo $reg['lugar_nac'];?>"
                        maxlength="50">
                      <p class="help-block" id="lugar_nac_chequeo">
                      </p>
                    </div>
                  </div>
                </div>
                <!-- inicio de fecha de nac, sexo, telefonos -->
                <div class="row">
                  <div class="col-sm-3">
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
                              placeholder="dele click para mostrar calendario"
                              readonly="readonly"
                              value="<?php echo $reg['fec_nac'];?>"
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
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="sexo" class="control-label">Sexo</label>
                          <?php $query = "SELECT codigo, descripcion
                            from sexo where status = 1;";
                            $registros = conexion($query);?>
                          <select class="form-control" name="sexo" id="sexo" disabled required>
                            <?php while($fila = mysqli_fetch_array($registros)) : ?>
                              <?php if ( $reg['sexo'] == $fila['codigo']): ?>
                                <option
                                  selected="selected"
                                  value="<?php echo $fila['codigo']?>">
                                    <?php echo $fila['descripcion']?>
                                </option>
                              <?php else: ?>
                                <option value="<?php echo $fila['codigo']?>">
                                  <?php echo $fila['descripcion']?>
                                </option>
                              <?php endif ?>
                            <?php endwhile; ?>
                           </select>
                          <p class="help-block" id="sexo_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label class="control-label" for="telefono">Teléfono</label>
                          <input
                            class="form-control"
                            type="text"
                            maxlength="11"
                            name="telefono"
                            id="telefono"
                            disabled
                            value="<?php echo $reg['telefono'];?>">
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
                          <label class="control-label" for="telefono_otro">Teléfono Adicional</label>
                          <input
                            class="form-control"
                            type="text"
                            maxlength="11"
                            name="telefono_otro"
                            id="telefono_otro"
                            disabled
                            value="<?php echo $reg['telefono_otro'];?>">
                          <p class="help-block" id="telefono_otro_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Plantel de Procedencia -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="plantel_procedencia" class="control-label">Plantel de Procedencia</label>
                      <input
                        class="form-control"
                        type="text"
                        name="plantel_procedencia"
                        id="plantel_procedencia"
                        disabled
                        value="<?php echo $reg['plantel_procedencia'];?>"
                        maxlength="50">
                      <p class="help-block" id="plantel_procedencia_chequeo">
                      </p>
                    </div>
                  </div>
                </div>
                <!-- inicio de discapacidad, vacunas y repitiente -->
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="discapacidad" class="control-label">¿Posee alguna Discapacidad?</label>
                          <?php $query = "SELECT codigo, descripcion
                            from discapacidad WHERE status ='1';";
                            $res = conexion($query); ?>
                          <select class="form-control" required disabled name="discapacidad" id="discapacidad">
                            <? while($fila = mysqli_fetch_array($res)) : ?>
                              <?php if ($reg['cod_discapacidad'] == $fila['codigo']):?>
                                <option selected="selected" value="<?=$fila['codigo'];?>">
                                  <?=$fila['descripcion'];?>
                                </option>
                              <?php else:?>
                                <option value="<?=$fila['codigo'];?>">
                                  <?=$fila['descripcion'];?>
                                </option>
                              <? endif;?>
                            <?php endwhile;?>
                          </select>
                          <p class="help-block" id="discapacidad_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="vacuna" class="control-label">¿Certificado de vacunación?</label>
                          <select class="form-control" disabled name="vacuna" id="vacuna">
                            <?php if ( $reg['certificado_vacuna'] == 's' ): ?>
                              <option  value="s" selected="selected">SI</option>
                              <option  value="n">NO</option>
                            <?php else: ?>
                              <option  value="s">SI</option>
                              <option  value="n" selected="selected">NO</option>
                            <?php endif ?>
                          </select>
                          <p class="help-block" id="vacuna_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="repitiente" class="control-label">¿Es repitiente?</label>
                          <select class="form-control" disabled name="repitiente" id="repitiente">
                            <?php if ( $reg['repitiente'] == 'n' ): ?>
                              <option name="repitinte" value="n" selected="selected">NO</option>
                              <option name="repitiente" value="s">SI</option>
                            <?php else: ?>
                              <option name="repitiente" value="s" selected="selected">SI</option>
                              <option name="repitiente" value="n">NO</option>
                            <?php endif ?>
                          </select>
                          <p class="help-block" id="repitiente_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- direccion personal -->
                <fieldset>
                  <legend class="text-center">Dirección de habitación</legend>
                  <!-- inicio de estado, municio y parroquia -->
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label class="control-label" for="cod_est">Estado</label>
                            <select class="form-control" disabled name="cod_est" id="cod_est"></select>
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
                            <select class="form-control" disabled name="cod_mun" id="cod_mun" >
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
                            <select class="form-control" disabled name="cod_parro" id="cod_parro">
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
                        <label for="direcc" class="control-label">Información detallada (Av/Calle/Edf.)</label>
                        <textarea
                        class="form-control"
                        maxlenght="150"
                        rows="2"
                        name="direcc"
                        disabled
                        id="direcc"><?php echo $reg['direccion'];?></textarea>
                        <p class="help-block" id="direcc_chequeo">
                        </p>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <!-- datos de curso y fisico -->
                <fieldset>
                  <legend class="text-center">Datos Antropológicos y curso</legend>
                  <!-- inicio de Curso alutra y peso -->
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="curso" class="control-label">Curso a inscribirse</label>
                            <?php $query = "SELECT
                              curso.descripcion as descripcion,
                              asume.codigo as codigo
                              from asume
                              inner join curso
                              on asume.cod_curso = curso.codigo
                              where asume.status = 1;";
                              $registros = conexion($query); ?>
                            <select required disabled class="form-control" name="curso" id="curso">
                              <option selected="selected" value="">Seleccione una opci&oacute;n</option>
                              <?php while($fila = mysqli_fetch_array($registros)) : ?>
                                <?php if ($reg['cod_curso'] == $fila['codigo']): ?>
                                  <option selected="selected" value="<?php echo $fila['codigo']?>">
                                    <?php echo $fila['descripcion']?>
                                  </option>
                                <?php else: ?>
                                  <option value="<?php echo $fila['codigo']?>">
                                    <?php echo $fila['descripcion']?>
                                  </option>
                                <?php endif ?>
                              <?php endwhile; ?>
                            </select>
                            <p class="help-block" id="curso_chequeo">
                            </p>
                            <p class="help-block" id="curso_chequeo_adicional">
                              <!-- NO TOCAR -->
                              &nbsp;
                              <!-- NO TOCAR -->
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="altura" class="control-label">Altura</label>
                            <input
                              class="form-control"
                              type="text"
                              maxlength="3"
                              disabled
                              placeholder="en centimetros"
                              value="<?php echo $reg['altura'];?>"
                              name="altura"
                              id="altura"/>
                            <p class="help-block" id="altura_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group">
                            <label for="peso" class="control-label">Peso</label>
                            <input
                              class="form-control"
                              type="text"
                              maxlength="3"
                              disabled
                              placeholder="en kilogramos"
                              value="<?php echo $reg['peso'];?>"
                              name="peso"
                              id="peso"/>
                            <p class="help-block" id="peso_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="camisa" class="control-label">
                              Talla de camisa
                            </label>
                            <?php $query = "SELECT codigo, descripcion
                              from talla where status = 1 order by codigo;";
                              $registros = conexion($query); ?>
                            <select disabled class="form-control" name="camisa" id="camisa">
                              <?php while ( $camisa = mysqli_fetch_array($registros) ): ?>
                                <?php if ( $reg['camisa'] == $camisa['codigo'] ) : ?>
                                  <option value="<?=$camisa['codigo']?>" selected="selected">
                                    <?=$camisa['descripcion']?>
                                  </option>
                                <?php else: ?>
                                  <option value="<?=$camisa['codigo']?>">
                                    <?=$camisa['descripcion']?>
                                  </option>
                                <?php endif; ?>
                              <?php endwhile; ?>
                            </select>
                            <p class="help-block" id="camisa_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="pantalon" class="control-label">
                              Talla de pantalón
                            </label>
                            <?php $query = "SELECT codigo, descripcion
                              from talla where status = 1 order by codigo;";
                              $registros = conexion($query); ?>
                            <select disabled class="form-control" name="pantalon" id="pantalon">
                              <?php while ( $pantalon = mysqli_fetch_array($registros) ): ?>
                                <?php if ( $reg['pantalon'] == $pantalon['codigo'] ) : ?>
                                  <option value="<?=$pantalon['codigo']?>" selected="selected">
                                    <?=$pantalon['descripcion']?>
                                  </option>
                                <?php else: ?>
                                  <option value="<?=$pantalon['codigo']?>">
                                    <?=$pantalon['descripcion']?>
                                  </option>
                                <?php endif; ?>
                              <?php endwhile; ?>
                            </select>
                            <p class="help-block" id="pantalon_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group">
                            <label for="zapato" class="control-label">
                              Talla de calzado
                            </label>
                            <input
                              class="form-control"
                              type="text"
                              maxlength="2"
                              name="zapato"
                              disabled
                              id="zapato"
                              placeholder="en formato Frances/Europeo"
                              value="<?php echo $reg['zapato'];?>"/>
                            <p class="help-block" id="zapato_chequeo">
                            </p>
                            <p class="help-block" id="zapato_chequeo_adicional">
                             Guia para niños <a class="nueva_ventana" href="../imagenes/medida-calzado-a.jpg">de 15 a 39</a>
                             y a partir <a class="nueva_ventana" href="../imagenes/medida-calzado-b.png">de 36 a 52</a>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <!-- recaudos -->
                <fieldset class="margenAbajo">
                  <legend class="text-center">Recaudos en físico</legend>
                  <div class="col-xs-12">
                    <div class="checkbox">
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          disabled
                          <?php echo $reg['partida_nac'] === ('s') ? 'checked': null ?>
                          name="partida_nac">
                        Partida de nacimiento.
                      </label>
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          disabled
                          <?php echo $reg['constancia_nino_sano'] === ('s') ? 'checked': null ?>
                          name="constancia_nino_sano">
                        Constancia del niño sano.
                      </label>
                    </div>
                    <div class="checkbox">
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          disabled
                          <?php echo $reg['canaima'] === ('s') ? 'checked': null ?>
                          name="canaima">
                        Recurso Canaima.
                      </label>
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          disabled
                          <?php echo $reg['bicentenario'] === ('s') ? 'checked': null ?>
                          name="bicentenario">
                        Colección Bicentenario.
                      </label>
                    </div>
                    <div class="checkbox">
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          disabled
                          <?php echo $reg['boleta'] === ('s') ? 'checked': null ?>
                          name="boleta">
                        Boleta de estudios.
                      </label>
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          disabled
                          <?php echo $reg['fotos_representante'] === ('s') ? 'checked': null ?>
                          name="fotos_representante">
                        Fotos tipo carnet del representante.
                      </label>
                    </div>
                    <div class="checkbox">
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          disabled
                          <?php echo $reg['fotocopia_cedula_pa'] === ('s') ? 'checked': null ?>
                          name="fotocopia_cedula_pa">
                        Fotocopia Cédula de identidad del representante.
                      </label>
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          disabled
                          <?php echo $reg['fotocopia_cedula_pr'] === ('s') ? 'checked': null ?>
                          name="fotocopia_cedula_pr">
                        Fotocopia Cédula de identidad de los allegados (si aplica).
                      </label>
                    </div>
                  </div>
                </fieldset>
                <!-- comentarios -->
                <fieldset>
                  <legend class="text-center">Comentarios</legend>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <textarea
                        class="form-control"
                        disabled
                        maxlenght="500"
                        rows="2"
                        name="comentarios"
                        id="comentarios"><?php echo $reg['comentarios'] ?></textarea>
                        <p class="help-block" id="comentarios_chequeo">
                        </p>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
              <!-- info -->
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2 bg-default redondeado text-muted text-center">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4>
                        Por favor, asegúrese que los datos son correctos antes de
                        continuar con el proceso de registro.
                      </h4>
                      <p>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- boton -->
              <div class="row margen">
                <div class="col-sm-2 col-sm-offset-5">
                  <input
                  role="button"
                  id="submit"
                  class="btn btn-info btn-block"
                  type="submit"
                  disabled
                  name="registrar"
                  value="Continuar">
                </div>
              </div>
            </fieldset>
          </form>
          <!-- botones de control -->
          <div class="margen">
            <div class="row margen">
              <div class="col-sm-4 col-sm-offset-4">
                <?php if ($_SESSION['cod_tipo_usr'] < 2): ?>
                  <button class="actualizar btn btn-primary btn-block disabled">Actualizar</button>
                <?php else: ?>
                  <button class="actualizar btn btn-primary btn-block">Actualizar</button>
                <?php endif ?>
              </div>
            </div>
            <div class="row margen">
              <div class="col-sm-4">
                <a href="reportes/constancia-inscripcion.php?cedula=<?php echo $cedula ?>" class="cons-ins btn btn-default btn-block">Constancia Inscrición</a>
              </div>
              <div class="col-sm-4">
                <a href="reportes/constancia-estudio.php?cedula=<?php echo $cedula ?>" class="cons-est btn btn-default btn-block">Constancia Estudios</a>
              </div>
              <div class="col-sm-4">
                <a href="reportes/detallado.php?cedula=<?php echo $cedula ?>" class="cons-est btn btn-default btn-block">Generar Reporte</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- validacion -->
      <?php $validacion = enlaceDinamico("java/validacionAlumno.js"); ?>
      <script type="text/javascript" src="<?php echo $validacion ?>"></script>
      <script type="text/javascript">
        $(function(){
          $('#form').on('change', function(){
            validacionAlumno();
          });
          $('#form').on('submit', function(e){
            if (validacionAlumno()) {
              // $('#cedula_r').prop('disabled', false);
              return true;
            }else{
              return false;
            }
          });
        });
      </script>
      <!-- ajax de estado -->
      <?php $estado = enlaceDinamico("java/edo.php"); ?>
      <?php $municipio = enlaceDinamico("java/mun.php"); ?>
      <?php $parroquia = enlaceDinamico("java/parro.php"); ?>
      <!-- ajax de estado/mun/parr -->
      <?php $estadoEnlace = "java/edo.php?cod_est=".$reg['cod_est']; ?>
      <?php $estado = enlaceDinamico($estadoEnlace); ?>
      <?php $municipio = enlaceDinamico("java/mun.php"); ?>
      <?php $parroquia = enlaceDinamico("java/parro.php"); ?>
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
          $("#cod_est").ready(function(){
            var id = "<?php echo $reg['cod_est'] ?>";
            var cod_mun = "<?php echo $reg['cod_mun'] ?>";
            var id2 = "<?php echo $reg['cod_parro'] ?>";
            $.ajax({
              url:'../java/mun.php',
              data: {
                'param_id': id,
                'cod_mun': cod_mun
              },
              success: function(datos){
                $("#cod_mun").html(datos);
              }
            });
            $.ajax({
              url:'../java/parro.php',
              data: {
                'param_id2': cod_mun,
                'cod_parro': id2
              },
              success: function(datos){
                $("#cod_parro").html(datos);
              }
            });
          });
        });
      </script>
      <!-- validacion de direccion -->
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
            maxDate:'-3Y',
            minDate:'-18Y',
            dateFormat: "yyyy-mm-dd"
          });
        });
      </script>
      <!-- cedula -->
      <script type="text/javascript">
        $(function(){
          $.ajax({
            url: '../java/ajax/cedula.js',
            type: 'POST',
            dataType: 'script'
          });
          $.ajax({
            url: '../java/ajax/cedulaEscolar.js',
            type: 'POST',
            dataType: 'script'
          });
        });
      </script>
      <!-- ajax de curso -->
      <!-- http://api.jquery.com/jQuery.ajax/ -->
      <script type="text/javascript">
        $(function(){
          $.ajax({
            url: '../java/ajax/alumnosEnCurso.js',
            type: 'POST',
            dataType: 'script'
          });
        });
      </script>
      <!-- enlaces de calzado -->
      <script type="text/javascript">
        $(function(){
          $('a.nueva_ventana').click(function(){
            window.open( $(this).attr('href') );
            return false;
          });
        });
      </script>
      <!-- para cambiar de solo lectura a normal -->
      <script type="text/javascript" src="../java/otros/cambiarSoloLectura.js"></script>
      <script type="text/javascript">
        $(function() {
          $('.actualizar').on('click', function(evento) {
            cambiarSoloLectura($('#form'), 'alumno');
          });
        });
      </script>
    </div>
  </div>
<?php else : ?>
  <div id="contenido_act_A">
    <div id="blancoAjax">
      <div class="container">
        <div class="row">
          <div class="jumbotron">
            <h1>Ups!</h1>
            <p>
              Error en el proceso de actualización!
            </p>
            <h3>
              <small>
                Lamentablemente, la cédula solicitada no es un alumno.
              </small>
            </h3>
            <!-- !importante -->
            <?php $enlace = encuentraCedula($_REQUEST['cedula']) ?>
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
              <!-- google hire me: slayerfat@gmail.com -->
            <?php endif ?>
            <p>
              Si desea hacer una consulta por favor dele
              <a href="menucon.php">click a este enlace.</a>
            </p>
            <p>
              ¿O será que entro en esta pagina erróneamente?
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
