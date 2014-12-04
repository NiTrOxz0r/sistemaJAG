<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1, 1, $_SESSION['cod_tipo_usr']);

if ( isset($_GET['cedula']) and preg_match( "/[0-9]{8}/", $_GET['cedula']) ) :
  $con = conexion();
  $cedula = mysqli_escape_string($con, trim($_GET['cedula']));
else:
  $enlace = enlaceDinamico("personalAutorizado/menucon.php?error=1&tipo=cedula&valor=$_GET[cedula_r]");
  header("Location:".$enlace);
endif;

$sql = "SELECT a.codigo, a.cedula, a.nacionalidad, a.p_nombre , a.s_nombre, a.p_apellido, a.s_apellido, a.fec_nac,
a.sexo, a.telefono, a.telefono_otro , cod_parroquia as cod_parro, cod_mun as cod_mun, cod_edo as cod_est,
  direccion_exacta as direccion, b.lugar_nac, b.email , b.relacion as cod_relacion, b.vive_con_alumno,
b.nivel_instruccion as cod_instruccion, b.profesion as cod_profesion, b.lugar_trabajo, b.direccion_trabajo,
b.telefono_trabajo FROM persona a
inner join personal_autorizado b on (a.codigo=b.cod_persona)
inner join direccion c on (a.codigo=c.cod_persona)
inner join parroquia d on (c.cod_parroquia=d.codigo)
inner join municipio e on (d.cod_mun=e.codigo)
inner join estado f on (e.cod_edo=f.codigo)
inner join sexo g on (a.sexo=g.codigo)
inner join relacion h on (b.relacion=h.codigo)
inner join profesion j on (b.profesion=j.codigo) WHERE cedula ='$cedula';";

$re = conexion($sql);

empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr'], 'sistemaJAG | Actualizar alumno');
if($reg = mysqli_fetch_array($re)) :?>
<div id="contenido_act_P">
  <div id="blancoAjax">
    <div class="container">
      <div class="row">
        <!-- http://www.w3schools.com/html/html_forms.asp -->
        <form action="actualizar_P.php" method="POST" id="form" name="form_repre" class="form-horizontal">
          <fieldset>
            <legend class="text-center text-uppercase"><h1>Registro del representante</h1></legend>
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
                      <?php if ( $reg['nacionalidad'] == 'v' ): ?>
                        <option value="v" selected="selected">Venezolano</option>
                        <option value="e">Extrangero</option>
                      <?php else: ?>
                        <option value="v">Venezolano</option>
                        <option value="e" selected="selected">Extrangero</option>
                      <?php endif ?>
                    </select>
                      <p class="help-block" id="nacionalidad_chequeo">
                      </p>
                  </div>
                </div>
                <div class="col-sm-5 col-sm-offset-1">
                  <div class="form-group">
                    <label for="cedula" class="control-label">Cedula</label>
                    <input
                      type="text"
                      maxlength="8"
                      name="cedula"
                      id="cedula"
                      autocomplete="off"
                      class="form-control"
                      autofocus="autofocus"
                      placeholder="Introduzca cedula ej: 12345678"
                      <?php if (isset($_GET['cedula'])): ?>
                        value="<?php echo $_GET['cedula'] ?>"
                      <?php else: ?>
                        value="<?php echo $reg['cedula'];?>">
                      <?php endif ?>
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
                          value="<?php echo $reg['p_nombre'];?>"
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
                          required
                          value="<?php echo $reg['p_apellido'];?>"
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
                          value="<?php echo $reg['s_apellido'];?>"
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
                      value="<?php echo $reg['lugar_nac'];?>"
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
                        <input
                          class="form-control"
                          type="text"
                          name="fec_nac"
                          id="fec_nac"
                          placeholder="dele click para mostrar calendario"
                          value="<?php echo $reg['fec_nac'];?>"
                          readonly="readonly"
                          style="cursor:pointer; background-color: #FFFFFF"
                          required>
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
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="nivel_instruccion" class="control-label">Nivel Educativo</label>
                        <?php $sql="SELECT codigo, descripcion from nivel_instruccion where status = 1;";
                          $registros = conexion($sql);?>
                        <select class="form-control" name="nivel_instruccion" required id="nivel_instruccion">
                        <?php while($fila = mysqli_fetch_array($registros)) : ?>
                          <?php if ($reg['cod_instruccion']==$fila['codigo']) :?>
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
                          value="<?php echo $reg['telefono'];?>"
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
                          value="<?php echo $reg['telefono_otro'];?>"
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
                          value="<?php echo $reg['email'];?>"
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
                          <?php while($fila = mysqli_fetch_array($registros)) :?>
                            <?php if ($reg['cod_relacion']==$fila['codigo']) :?>
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
                          <?php if ( $reg['vive_con_alumno'] == 's' ): ?>
                            <option value="s" selected="selected">Si</option>
                            <option value="n">No</option>
                          <?php else: ?>
                            <option value="s">Si </option>
                            <option value="e" selected="selected">No</option>
                          <?php endif ?>
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
                      id="direcc"><?php echo $reg['direccion'];?></textarea>
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
                            <?php while($fila = mysqli_fetch_array($registros)) : ?>
                              <?php if ($reg['cod_profesion']==$fila['codigo']) :?>
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
                            value="<?php echo $reg['lugar_trabajo'];?>"
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
                            value="<?php echo $reg['telefono_trabajo'];?>"
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
                            value="<?php echo $reg['direccion_trabajo'];?>"
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
    <div align="center">
      <!-- http://www.w3schools.com/html/html_forms.asp -->
      <!-- <form method="POST" action="actualizar_P.php" name="form_repre" id="form">

          <h1>ACTUALIZACION DE PADRES/REPRESENTANTE</h1>
            <table>
              <tr>
                <th>C&eacute;dula</th>
              </tr>
              <tr>
                <td align="left">
                  <select name="nacionalidad" id="nacionalidad">
                  <?php if ( $reg['nacionalidad'] == 'v' ): ?>
                    <option value="v" selected="selected">V</option>
                    <option value="e">E</option>
                  <?php else: ?>
                    <option value="v">V </option>
                    <option value="e" selected="selected">E</option>
                  <?php endif ?>
                </select>
                  <input
                    id="cedula"
                    type="text"
                    maxlength="8"
                    size="12"
                    name="cedula"
                    value="<?php echo $reg['cedula'];?>">
                </td>
                <td colspan="2" class="chequeo" id="cedula_chequeo"></td>
              </tr>
              <tr>
                <td colspan="3" class="chequeo" id="cedula_chequeo_adicional"></td>
              </tr>
              <tr>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
              </tr>
              <tr>
                <td>
                  <input type="text"
                    maxlength="20"
                    name="p_nombre"
                    id="p_nombre"
                    value="<?php echo $reg['p_nombre'];?>"/>
                </td>
                <td>
                  <input type="text"
                    maxlength="20"
                    name="s_nombre"
                    id="s_nombre"
                    value="<?php echo $reg['s_nombre'];?>"/>
                </td>
              </tr>
              <tr>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
              </tr>
              <tr>
                <td>
                  <input type="text"
                    maxlength="20"
                    name="p_apellido"
                    id="p_apellido"
                    value="<?php echo $reg['p_apellido'];?>"/>
                </td>
                <td>
                  <input type="text"
                    maxlength="20"
                    name="s_apellido"
                    id="s_apellido"
                    value="<?php echo $reg['s_apellido'];?>"/>
                </td>
              </tr>
              <tr>
                <th>Sexo</th>
                <th>Fecha de Nacimiento</th>
              </tr>
              <tr>
                <td>
                  <?php
                  $sql="select codigo, descripcion from sexo where status = 1;";
                  $registros = conexion($sql); ?>
                <select name="sexo" id="sexo" required="required">
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
                </select><font color="#ff0000">*</font>
                </td>
                <td>
                  <input
                  type="date"
                  name="fec_nac"
                  id="fec_nac"
                  required="required"
                  value="<?php echo $reg['fec_nac'];?>"/>
                </td>
              </tr>
              <tr colspan="2">
                <th>Lugar de Nacimiento</th>
              </tr>
              <tr>
                <td colspan="2">
                  <textarea
                    cols="65"
                    rows="2"
                    name="lugar_nac"
                    id="lugar_nac"
                    required="required"
                    maxlength="50"
                    ><?php echo $reg['lugar_nac'];?></textarea>
                </td>
              </tr>
              <tr>
                <th>Tel&eacute;fono</th>
                <th>Tel&eacute;fono Celular/Otro</th>
                <th>E-mail</th>
              </tr>
              <tr>
                <td>
                  <input
                    type="text"
                    maxlength="11"
                    name="telefono"
                    id="telefono"
                    value="<?php echo $reg['telefono'];?>"/>
                </td>
                <td>
                  <input
                    type="text"
                    maxlength="11"
                    name="telefono_otro"
                    id="telefono_otro"
                    value="<?php echo $reg['telefono_otro'];?>"/>
                </td>
                <td>
                  <input type="text"
                    maxlength="20"
                    name="email"
                    id="email"
                  value="<?php echo $reg['email'];?>">
                </td>
              </tr>
              <tr>
                <th>Parentesco</th><th>Vive con el Alumno?</th>
              </tr>
              <tr>
                <td>
                  <?php $sql="SELECT codigo, descripcion from relacion where status = 1;";
                    $registros = conexion($sql);?>
                  <select name="relacion" required id="relacion">
                    <?php while($fila = mysqli_fetch_array($registros)) :?>
                    <?php if ($reg['cod_relacion']==$fila['codigo']) :?>
                      <option selected="selected" value="<?php echo $fila['codigo']?>">
                      <?php echo $fila['descripcion']?></option>
                      <?php else: ?>
                      <option value="<?php echo $fila['codigo']?>">
                        <?php echo $fila['descripcion']?>
                      </option>
                    <?php endif ?>
                    <?php endwhile; ?>
                  </select><font color="#ff0000">*</font>
                </td>
                <td>
                  <select name="vive_con_alumno" required id="vive_con_alumno">
                    <?php if ( $reg['vive_con_alumno'] == 's' ): ?>
                    <option value="s" selected="selected">Si</option>
                    <option value="n">No</option>
                  <?php else: ?>
                    <option value="s">Si </option>
                    <option value="e" selected="selected">No</option>
                  <?php endif ?>
                  </select><font color="#ff0000">*</font>
                </td>
              </tr>
              <tr>
                <th>Estado</th><th>Municipio</th><th>Parroquia</th>
              </tr>
              <tr>
                <td>
                  <select name="cod_est" id="cod_est">
                  </select><font color="#ff0000">*</font>
                </td>
                <td>
                  <select name="cod_mun" id="cod_mun" >
                  </select><font color="#ff0000">*</font>
                </td>
                <td>
                  <select name="cod_parro" id="cod_parro">
                  </select><font color="#ff0000">*</font>
                </td>
              </tr>
              <tr>
                <th>Direcci&oacute;n</th>
              </tr>
              <tr>
                <td colspan="2">
                  <textarea
                    maxlenght="150"
                    cols="50"
                    rows="4"
                    name="direcc"
                    id="direcc"><?php echo $reg['direccion'];?></textarea>
                  <font color="#ff0000">*</font>
                </td>
              </tr>
              <tr>
                <th>Nivel Educativo</th><th>Profesi&oacute;n </th>
              </tr>
              <tr>
                <td>
                <?php $sql="SELECT codigo, descripcion from nivel_instruccion where status = 1;";
                    $registros = conexion($sql);?>
                  <select name="nivel_instruccion" required id="nivel_instruccion">
                  <?php while($fila = mysqli_fetch_array($registros)) : ?>
                  <?php if ($reg['cod_instruccion']==$fila['codigo']) :?>
                    <option selected="selected" value="<?php echo $fila['codigo']?>">
                    <?php echo $fila['descripcion']?></option>
                    <?php else: ?>
                      <option value="<?php echo $fila['codigo']?>">
                        <?php echo $fila['descripcion']?>
                      </option>
                    <?php endif ?>
                  <?php endwhile; ?>
                  </select><font color="#ff0000">*</font>
                </td>
                <td>
                  <?php $sql="SELECT codigo, descripcion from profesion where status = 1;";
                    $registros = conexion($sql);?>
                  <select name="profesion" id="profesion">
                    <?php while($fila = mysqli_fetch_array($registros)) : ?>
                    <?php if ($reg['cod_profesion']==$fila['codigo']) :?>
                    <option selected="selected" value="<?php echo $fila['codigo']?>">
                    <?php echo $fila['descripcion']?></option>
                    <?php else: ?>
                      <option value="<?php echo $fila['codigo']?>">
                        <?php echo $fila['descripcion']?>
                      </option>
                    <?php endif ?>
                  <?php endwhile; ?>
                </td>
              </tr>
              <tr>
                <th>Lugar de Trabajo</th><th>Direcci&oacute;n de Trabajo</th>
                <th>Tel&eacute;fono Laboral</th>
              </tr>
              <tr>
                <td>
                  <input type="text"
                    maxlength="50"
                    name="lugar_trabajo"
                    id="lugar_trabajo"
                    value="<?php echo $reg['lugar_trabajo'];?>">
                </td>
                <td>
                  <input type="text"
                    maxlength="150"
                    name="direccion_trabajo"
                    id="direccion_trabajo"
                    value="<?php echo $reg['direccion_trabajo'];?>">
                </td>
                <td>
                  <input type="text"
                    maxlength="11"
                    name="telefono_trabajo"
                    id="telefono_trabajo"
                    value="<?php echo $reg['telefono_trabajo'];?>">
                </td>
              </tr>
              <tr>
                <td align="center">
                  <input type="button" name="registrar" value="insertar">
                </td>
                <td align="center">
                  <input type="button" name="limpiar" id="limpiar" value="reset">
                </td>
                <tr colspan="3">
                  <td>
                    <a class="" href="menucon.php">Volver</a>
                  </td>
                </tr>
            </table>
      </form> -->
    </div>
  <!-- validacion -->
  <?php $validacion = enlaceDinamico("java/validacionP.js"); ?>
  <script type="text/javascript" src="<?php echo $validacion ?>"></script>
  <!-- ajax de estado/mun/parr -->
  <?php $estadoenlace = "java/edo.php?cod_est=".$reg['cod_est']; ?>
  <?php $estado = enlaceDinamico($estadoenlace); ?>
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
  <!-- calendario -->
  <?php $cssDatepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.css"); ?>
  <link href="<?php echo $cssDatepick ?>" rel="stylesheet">
  <?php $plugin = enlaceDinamico("java/jqDatePicker/jquery.plugin.js"); ?>
  <?php $datepick = enlaceDinamico("java/jqDatePicker/jquery.datepick.js"); ?>
  <script type="text/javascript" src="<?php echo $plugin ?>"></script>
  <script type="text/javascript" src="<?php echo $datepick ?>"></script>
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
      // se trae la validacion de edo/mun/parr
      $.ajax({
        url: '../java/validacionDireccion.js',
        type: 'POST',
        dataType: 'script'
      });
    });
  </script>
</div>
<?php else : ?>
  <div id="contenido_act_P">
    <div id="blancoAjax">
      <div class="container">
        <div class="row">
          <div class="jumbotron">
            <h1>Ups!</h1>
            <p>
              Error en el proceso de actualizacion!
            </p>
            <h3>
              <small>
                Lamentablemente, la cedula solicitada no es un representante
                o allegado de algun alumno en el sistema.
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
<?php endif ; ?>

<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
