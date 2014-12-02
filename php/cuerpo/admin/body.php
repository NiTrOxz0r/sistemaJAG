<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
$version = enlaceDinamico('php/cuerpo/version.php');
validarUsuario(1, 3, $_SESSION['cod_tipo_usr']);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);

//CONTENIDO:?>
<div id="contenido_body">
  <div id="blancoAjax">
    <div class="navbar-contenido">
      <div class="container">
        <div class="row">
          <div class="col-ms-12 text-left">
            <h1>
              Sistema de Inscripcion
              <small>trabajo en progreso!</small>
            </h1>
            <h1>
              E.B.N.B. Jose Antonio Gonzalez
            </h1>
            <?php include_once($version); ?>
            <p>
            mensaje de bienvenida, info del sistema, informacion relevante de algun proceso.
            alguna otra cosa que sea necesario.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="sm-12">
          <div class="jumbotron">
            <h1>Inscripcion!</h1>
            <p>Proceso de Registro 2014-2015</p>
            <p>
              <h5>Recaudos necesarios:</h5>
              <ul>
                <li>...</li>
                <li>...</li>
                <li>...</li>
                <li>...</li>
                <li>...</li>
              </ul>
            </p>
            <p>
              <a
              class="btn btn-primary btn-lg"
              href="personalAutorizado/form_reg_P.php"
              role="button">
                Empezar nuevo registro
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row well well-lg">
        <div class="col-sm-6 text-center">
          <a
          href="curso/menucon.php"
          class="btn btn-default btn-lg btn-block"
          role="button">
            Gestionar Cursos
          </a>
          <a
          href="usuario/menucon.php"
          class="btn btn-default btn-lg btn-block"
          role="button">
            Gestionar Usuarios del sistema
          </a>
        </div>
        <div class="col-sm-6 text-center">
          <a
          href="alumno/menucon.php"
          class="btn btn-default btn-lg btn-block"
          role="button">
            Gestionar Alumno
          </a>
          <a
          href="personalAutorizado/menucon.php"
          class="btn btn-default btn-lg btn-block"
          role="button">
            Gestionar Padres y Representante
          </a>
        </div>
      </div>
    </div>
    <div class="navbar-contenido-limpio">
      <div class="container">
        <div class="row text-center">
          <div class="col-xs-12">
            <h1 class="margenAbajo">El sistemaJAG</h1>
            <p class="margenAbajo">
              Recomienda el uso de
            </p>
            <div class="col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
              <?php $firefox = enlaceDinamico('imagenes/firefox_logo-only_RGB.png') ?>
              <a href="https://www.mozilla.org/es-ES/firefox/new/">
                <img class="img-responsive" src="<?php echo $firefox ?>" alt="descargar firefox">
              </a>
              <div class="row">
                <div class="col-xs-12">
                  <p class="text-center"><small><em>Firefox</em></small></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xs-4">
              <?php $chrome = enlaceDinamico('imagenes/Google_Chrome_icon_(2011).svg.png') ?>
              <a href="https://www.google.com/intl/es/chrome/">
                <img class="img-responsive" src="<?php echo $chrome ?>" alt="descargar chrome">
              </a>
              <p class="text-center"><small><em>Chrome</em></small></p>
            </div>
            <div class="col-xs-12">
              <h3>
                Para navegar optimamente en esta pagina web.
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="java/ajax/cargadorOnClick.js"></script>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']);?>
