<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario();

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);
  //CONTENIDO:?>
  <div id="contenido_formulario">
    <div id="blancoAjax" class="container">
      <div id="bienvenida" class="row">
        <div class="jumbotron">
          <h1>Bienvenid@!</h1>
          <h4>Sistema de Inscripcion de la E.B.N.B "Jose Antonio Gonzalez"</h4>
          <p>
            Para Utilizar este sistema debe estar registrado como usuario.
          </p>
          <p>
            <a href="usuario/form_reg_U.php" class="btn btn-primary btn-lg">
              Registrarse en el sistema
            </a>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 well">
          <!-- http://www.w3schools.com/tags/ref_eventattributes.asp -->
          <form
          role="form"
          action="usuario/validar_U.php"
          method="POST">
            <div class="form-group">
              <label for="seudonimo" class="control-label">Seudonimo</label>
              <input
                type="text"
                name="seudonimo"
                id="seudonimo"
                class="form-control"
                autofocus="autofocus"
                required="required"
                placeholder="Instroduzca Usuario">
                <p class="help-block" id="seudonimo_chequeo">
                  Instroduzca su seudonimo en el sistemaJAG
                </p>
            </div>
            <div class="form-group">
              <label for="clave" class="control-label">Contrase&ntilde;a:</label>
              <input
                class="form-control"
                type="password"
                name="clave"
                id="clave"
                required="required"
                maxlength="15"
                placeholder="Instroduzca Clave">
                <p class="help-block" id="clave_chequeo">
                  Especifique su contrase&ntilde;a
                </p>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <input
                  class="btn btn-default"
                  type="submit"
                  value="Entrar en el SistemaJAG"
                  name="enviar"
                  onsubmit"return validacionUsuario();"
                  onclick="return validacionUsuario();">
              </div>
            </div>
            <div id="error" class="help-block">
              <?php if (isset($_SESSION['error_login'])): ?>
                <p class="text-danger">
                  Los datos ingresados no concuerdan
                  en el sistema, por favor intente nuevamente.
                </p>
              <?php endif ?>
            </div>
          </form>
        </div>
      </div>
      <!-- validacion -->
      <script type="text/javascript" src="java/validacionUsuario.js"></script>
      <script type="text/javascript">
        $(function(){
          $("#seudonimo").change(function(){
            validacionUsuario();
            $('#error').html('');
          });

          $("#clave").change(function(){
            validacionUsuario();
            $('#error').html('');
          });

        });
      </script>
    </div>
  </div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
