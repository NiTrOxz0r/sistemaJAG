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
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CONTENIDO:?>
<div id="contenido_curso_menucon">
  <div id="blancoAjax">
    <!-- CONTENIDO EMPIEZA DEBAJO DE ESTO: -->
    <!-- DETALLESE QUE NO ES UN ID SINO UNA CLASE. -->
    <div class="container">
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2 bg-primary redondeado margenAbajo">
          <div class="row">
            <div class="col-xs-12">
              <h3>
                Para hacer una consulta por favor seleccione el
                tipo que Usted desea realizar:
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form
            role="form"
            id="consulta_singular_U"
            name="consulta_singular_U"
            action="consultar_C.php"
            method="POST">
            <div class="form-group">
              <label
              for="tipo"
              id="tipo_titulo"
              class="control-label">Tipo de consulta:</label>
              <select
                class="form-control"
                name="tipo"
                id="tipo"
                autofocus="autofocus"
                required>
                <option selected="selected" value="0">Por favor seleccione:</option>
                <option value="1">Cursos Existentes con docentes</option>
                <option value="2">Cursos Existentes sin docentes</option>
                <option value="3">Alumnos Existentes por curso</option>
                <option value="4">Total de Alumnos por curso</option>
              </select>
              <p class="help-block" id="tipo_chequeo">
              </p>
            </div>
            <div class="form-group">
              <label
              for="curso"
              id="curso_titulo"
              class="control-label">Seleccione:</label>
              <select
                class="form-control"
                name="curso"
                id="curso"
                autofocus="autofocus"
                required>
                <?php
                  // $query = "SELECT
                  // asume.codigo, curso.descripcion
                  // from asume
                  // inner join curso
                  // on asume.cod_curso = curso.codigo
                  // where asume.status = 1;";
                  $query = "SELECT
                  asume.codigo, curso.descripcion
                  from asume
                  inner join curso
                  on asume.cod_curso = curso.codigo
                  where curso.status = 1;";
                  $resultado = conexion($query);?>
                  <option value="" selected="selected">--Seleccione--</option>
                  <?php while ( $datos = mysqli_fetch_array($resultado) ) : ?>
                    <option value="<?php echo $datos['codigo']; ?>">
                      <?php echo $datos['descripcion']; ?>
                    </option>
                  <?php endwhile; ?>
              </select>
              <p class="help-block" id="curso_chequeo">
              </p>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input
                type="submit"
                id="submit"
                value="Consultar"
                class="btn btn-primary btn-block">
              </div>
            </div>
            <div class="row">
              <div id="error" class="chequeo">
                <!-- chequeo por medio de ajax: -->
                <span class="error" id="error">

                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2 bg-info redondeado margenAbajo">
          <div class="row">
            <div class="col-xs-12">
              <h3>
                O si prefiere puede registrar un nuevo curso en el sistema:
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <a href="form_reg_C.php" class="btn btn-primary btn-lg btn-block">Registrar un nuevo curso</a>
        </div>
      </div>
    </div>
    <!-- validacion -->
    <script type="text/javascript">
      /*hecho por slayerfat, consultas o sugerencias, saben donde estoy.*/
      //iniciamos jQuery:
      $(function(){
        //cambiamos de una vez
        //estructura del formulario:
        $('#curso').prop('disabled', true);
        $('#submit').prop('disabled', true);
        //se cambia la estructura del formulario
        //dependiendo de lo que el usuario escoja en el primer select
        //(tipo) = por cedula, por cargo, etc.
        $('#tipo').on('change', function(){
          var tipo = $(this).val();
          if (tipo === '0') {
            $('#curso').prop('disabled', true);
            $('#submit').prop('disabled', true);
          }else if (tipo === '1' || tipo === '2'){
            $('#curso').prop('disabled', true);
            $('#curso').prop('value', '');
            $('#submit').prop('disabled', false);
          }else if (tipo === '3'|| tipo === '4'){
            $('#curso').prop('disabled', false);
            $('#submit').prop('disabled', true);
          }else{
            $('#curso').prop('disabled', false);
          };
        });
        //comprobacion del select de curso:
        $('#curso').on('change', function(){
          var campo = $(this).val();
          if (campo === '') {
            $('#submit').prop('disabled', true);
          }else{
            $('#submit').prop('disabled', false);
          };
        });
      });
    </script>
    <!-- CONTENIDO TERMINA ARRIBA DE ESTO: -->
  </div>
</div>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
