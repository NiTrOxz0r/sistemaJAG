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
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Registro de alumno');

if ( isset($_GET['cedula_r']) and preg_match( "/[0-9]{6,8}/", $_GET['cedula_r']) ) :
  $conexion = conexion();
  $cedula_r = mysqli_escape_string( $conexion, trim($_GET['cedula_r']) );
  $query = "SELECT
    persona.p_nombre,
    persona.p_apellido,
    relacion.descripcion as relacion
    from persona
    inner join personal_autorizado
    on personal_autorizado.cod_persona = persona.codigo
    inner join relacion
    on personal_autorizado.relacion = relacion.codigo
    where persona.cedula = $cedula_r;";
  $resultado = conexion($query);
  if ($resultado->num_rows <> 0) :
    $datosRepresentante = mysqli_fetch_assoc($resultado);
    $go = true;
  else :
    $go = false;
  endif;
  if ( isset($_GET['cedula']) and preg_match( "/[0-9]{6,8}/", $_GET['cedula']) ) :
    $cedula = $_GET['cedula'];
  else:
    $cedula = null;
  endif;
  mysqli_close($conexion);
endif;

if (isset($_SESSION['requisitos'])) :
  if ( isset($_SESSION['requisitos']['partida_nac']) ) :
    $requisitos['partida_nac'] = 'checked';
  else :
    $requisitos['partida_nac'] = null;
  endif;
  if ( isset($_SESSION['requisitos']['constancia_nino_sano']) ) :
    $requisitos['constancia_nino_sano'] = 'checked';
  else :
    $requisitos['constancia_nino_sano'] = null;
  endif;
  if ( isset($_SESSION['requisitos']['canaima']) ) :
    $requisitos['canaima'] = 'checked';
  else :
    $requisitos['canaima'] = null;
  endif;
  if ( isset($_SESSION['requisitos']['bicentenario']) ) :
    $requisitos['bicentenario'] = 'checked';
  else :
    $requisitos['bicentenario'] = null;
  endif;
  if ( isset($_SESSION['requisitos']['boleta']) ) :
    $requisitos['boleta'] = 'checked';
  else :
    $requisitos['boleta'] = null;
  endif;
  if ( isset($_SESSION['requisitos']['fotos_representante']) ) :
    $requisitos['fotos_representante'] = 'checked';
  else :
    $requisitos['fotos_representante'] = null;
  endif;
  if ( isset($_SESSION['requisitos']['fotocopia_cedula_pa']) ) :
    $requisitos['fotocopia_cedula_pa'] = 'checked';
  else :
    $requisitos['fotocopia_cedula_pa'] = null;
  endif;
  if ( isset($_SESSION['requisitos']['fotocopia_cedula_pr']) ) :
    $requisitos['fotocopia_cedula_pr'] = 'checked';
  else :
    $requisitos['fotocopia_cedula_pr'] = null;
  endif;
endif;

//CONTENIDO:
if($go): ?>
  <div id="contenido_form_reg_A">
    <div id="blancoAjax">
      <div class="container">
        <div class="row">
          <!-- http://www.w3schools.com/html/html_forms.asp -->
          <form action="insertar_A.php" method="POST" id="form" name="form_A" class="form-horizontal">
            <fieldset>
              <legend class="text-center">Datos del Representante</legend>
              <!-- datos del Representante -->
              <div class="container">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="cedula_r" class="control-label">Cedula</label>
                          <input
                            class="form-control bloquear"
                            type="text"
                            maxlength="8"
                            name="cedula_r"
                            id="cedula_r"
                            required
                            value="<?php echo $cedula_r ?>"
                            disabled>
                          <p class="help-block" id="cedula_r_chequeo">
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
                            value="<?php echo $datosRepresentante['p_nombre'].", ".$datosRepresentante['p_apellido'] ?>"
                            name="p_nombre_r"
                            id="p_nombre_r"/>
                          <p class="help-block" id="p_nombre_r_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="form-group">
                          <label for="parentesco_r" class="control-label">Relacion o parentesco</label>
                          <input
                            class="form-control bloquear"
                            type="text"
                            maxlength="20"
                            disabled
                            value="<?php echo $datosRepresentante['relacion'] ?>"
                            name="parentesco_r"
                            id="parentesco_r"/>
                          <p class="help-block" id="parentesco_r_chequeo">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <legend class="text-center text-uppercase">
                <h1>Registro del alumno</h1>
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
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label
                            for="cedula"
                            class="control-label">
                            Cedula
                          </label>
                          <input
                            type="text"
                            maxlength="8"
                            name="cedula"
                            id="cedula"
                            class="form-control <?php echo $cedula === (null) ? '':'bloquear' ?>"
                            autofocus="autofocus"
                            autocomplete="off"
                            placeholder="Introduzca cedula ej: 12345678"
                            <?php echo $cedula === (null) ? null: "value='$cedula'" ?>
                            <?php echo $cedula === (null) ? null: "disabled='true'" ?>
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
                          <label for="cedula_escolar" class="control-label">Cedula Escolar</label>
                          <input
                            type="text"
                            maxlength="10"
                            name="cedula_escolar"
                            id="cedula_escolar"
                            class="form-control"
                            autofocus="autofocus"
                            autocomplete="off"
                            placeholder="Introduzca cedula escolar ej: 1234567890"
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
                              type="text"
                              name="acta_num_part_nac"
                              id="acta_num_part_nac"
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
                              type="text"
                              name="acta_folio_num_part_nac"
                              id="acta_folio_num_part_nac"
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
                  <legend class="text-center">Datos basicos</legend>
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
                  <div class="col-sm-3">
                    <div class="row">
                      <div class="col-xs-11">
                        <div class="form-group">
                          <label for="sexo" class="control-label">Sexo</label>
                          <?php $query = "SELECT codigo, descripcion
                            from sexo where status = 1;";
                            $registros = conexion($query);?>
                          <select class="form-control" name="sexo" id="sexo" required>
                            <option selected="selected" value="">Seleccione</option>
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
                          <select class="form-control" required name="discapacidad" id="discapacidad">
                            <option selected="selected" value="">Seleccione</option>
                            <? while($fila= mysqli_fetch_array($res)) : ?>
                              <option value="<?=$fila['codigo'];?>">
                                <?=$fila['descripcion'];?>
                              </option>
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
                          <label for="vacuna" class="control-label">¿Certificado de vacunacion?</label>
                          <select class="form-control" name="vacuna" id="vacuna">
                            <option  selected="selected" value="">Seleccione</option>
                            <option value="s">SI</option>
                            <option value="n">NO</option>
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
                          <select class="form-control" name="repitiente" id="repitiente">
                            <option  selected="selected" value="">Seleccione</option>
                            <option value="s">SI</option>
                            <option value="n">NO</option>
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
                <!-- datos de curso y fisico -->
                <fieldset>
                  <legend class="text-center">Datos Antropologicos y curso</legend>
                  <!-- inicio de Curso alutra y peso -->
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="curso" class="control-label">Curso a inscribirse</label>
                            <?php
                              $query = "SELECT
                              curso.descripcion as descripcion,
                              asume.codigo as codigo
                              from asume
                              inner join curso
                              on asume.cod_curso = curso.codigo
                              where asume.status = 1;";
                              // $query = "SELECT codigo, descripcion
                              // from curso where status = 1;";
                              $registros = conexion($query); ?>
                            <select required class="form-control" name="curso" id="curso">
                              <option selected="selected" value="">Seleccione una opci&oacute;n</option>
                              <?php while($fila = mysqli_fetch_array($registros)) : ?>
                                <option value="<?php echo $fila['codigo']; ?>">
                                  <?php echo $fila['descripcion']; ?>
                                </option>
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
                              placeholder="en centimetros"
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
                              type="number"
                              maxlength="3"
                              placeholder="en kilogramos"
                              name="peso"
                              id="peso"/>
                            <p class="help-block" id="peso_chequeo">
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- camisa, pantalon, zapato -->
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
                            <select class="form-control" name="camisa" id="camisa">
                              <option selected="selected" value="">
                                Seleccionar
                              </option>
                              <?php while ( $camisa = mysqli_fetch_array($registros) ): ?>
                                <option value="<?=$camisa['codigo']; ?>">
                                  <?=$camisa['descripcion']; ?>
                                </option>
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
                              Talla de pantalon
                            </label>
                            <?php $query = "SELECT codigo, descripcion
                              from talla where status = 1 order by codigo;";
                              $registros = conexion($query); ?>
                            <select class="form-control" name="pantalon" id="pantalon">
                              <option selected="selected" value="">
                                Seleccionar
                              </option>
                              <?php while ( $pantalon = mysqli_fetch_array($registros) ): ?>
                                <option value="<?=$pantalon['codigo']; ?>">
                                  <?=$pantalon['descripcion']; ?>
                                </option>
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
                        <div class="col-xs-11">
                          <div class="form-group">
                            <label for="zapato" class="control-label">
                              Talla de calzado
                            </label>
                            <input
                              class="form-control"
                              type="number"
                              maxlength="2"
                              placeholder="en formato Frances/Europeo"
                              name="zapato"
                              id="zapato"/>
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
                  <legend class="text-center">Recaudos en fisico</legend>
                  <div class="col-xs-12">
                    <div class="checkbox">
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          <?php echo $requisitos['partida_nac'] ?>
                          name="partida_nac">
                        Partida de nacimiento.
                      </label>
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          <?php echo $requisitos['constancia_nino_sano'] ?>
                          name="constancia_nino_sano">
                        Constancia del niño sano.
                      </label>
                    </div>
                    <div class="checkbox">
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          <?php echo $requisitos['canaima'] ?>
                          name="canaima">
                        Recurso Canaima.
                      </label>
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          <?php echo $requisitos['bicentenario'] ?>
                          name="bicentenario">
                        Coleccion Bicentenario.
                      </label>
                    </div>
                    <div class="checkbox">
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          <?php echo $requisitos['boleta'] ?>
                          name="boleta">
                        Boleta de estudios.
                      </label>
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          <?php echo $requisitos['fotos_representante'] ?>
                          name="fotos_representante">
                        Fotos tipo carnet del representante.
                      </label>
                    </div>
                    <div class="checkbox">
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          <?php echo $requisitos['fotocopia_cedula_pa'] ?>
                          name="fotocopia_cedula_pa">
                        Fotocopia Cedula de identidad del representante.
                      </label>
                      <label class="col-xs-6">
                        <input
                          type="checkbox"
                          value="s"
                          <?php echo $requisitos['fotocopia_cedula_pr'] ?>
                          name="fotocopia_cedula_pr">
                        Fotocopia Cedula de identidad de los allegados (si aplica).
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
                        maxlenght="500"
                        rows="2"
                        name="comentarios"
                        id="comentarios"></textarea>
                        <p class="help-block" id="comentarios_chequeo">
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
                        Por favor, asegurese que los datos son correctos antes de
                        continuar con el proceso de registro.
                      </h4>
                      <p>
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
      <?php $cssDatepick = enlaceDinamico("java/jqDatePicker/smoothness.datepick.css"); ?>
      <link href="<?php echo $cssDatepick ?>" rel="stylesheet">
      <?php $plugin = enlaceDinamico("java/jqDatePicker/jquery.plugin.js"); ?>
      <?php $datepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.js"); ?>
      <script type="text/javascript" src="<?php echo $plugin ?>"></script>
      <script type="text/javascript" src="<?php echo $datepick ?>"></script>
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
              $('#cedula_r').prop('disabled', false);
              $('#cedula').prop('disabled', false);
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
            <?php $enlace = encuentraCedula($_REQUEST['cedula_r']) ?>
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
              $enlace = "personalAutorizado/form_reg_P.php?cedula=$_GET[cedula_r]";
              $inscripcion = enlaceDinamico("$enlace"); ?>
              <p>
                La cedula <?php echo $_GET['cedula'] ?>, no esta registrada en el sistema.
                <em>Para registrar a un alumno, es necesario registrar primero al representante.</em>
                para ir al proceso de inscripcion <a href="<?php echo $inscripcion ?>">
                puede seguir este enlace.
                </a>
              </p>
              <!-- google hire me: slayerfat@gmail.com -->
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
