<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
validarUsuario();
empezarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
<div id="contenido_estadistica">
  <div id="blancoAjax">
    <div class="container">
      <!-- info -->
      <div class="row">
        <div class="contenido col-md-12">
          <h1>Lorem ipsum dolor sit amet</h1>
          <p>
            <h2 class="text-justify">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              Excepteur sint occaecat cupidatat non proident, sunt in culpa
              qui officia deserunt mollit anim id est laborum.
            </h2>
          </p>
        </div>
      </div>
      <!-- personas -->
      <div class="row">
        <div class="col-md-12">
          <h2>Personas <small><a href="#">descargar informe</a></small></h2>
          <div class="row">
            <div class="col-sm-12">
              <!-- info -->
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </h4>
                </div>
              </div>
              <!-- personas en sistema -->
              <div class="row">
                <div class="col-sm-12">
                  <h4>
                    Personas en el sistema: <strong>algo</strong>
                  </h4>
                </div>
              </div>
              <!-- por sexo -->
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Personas de sexo Masculino: <strong>algo</strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Personas de sexo Femenino: <strong>algo</strong>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- alumnos -->
      <div class="row">
        <div class="col-md-12">
          <h2>Alumnos <small><a href="#">descargar informe</a></small></h2>
          <div class="row">
            <div class="col-sm-12">
              <!-- info -->
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </h4>
                </div>
              </div>
              <!-- en sistema -->
              <div class="row">
                <div class="col-sm-12">
                  <h4>
                    Alumnos en el sistema: <strong>algo</strong>
                  </h4>
                </div>
              </div>
              <!-- por sexo -->
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Alumnos de sexo Masculino: <strong>algo</strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Alumnos de sexo Femenino: <strong>algo</strong>
                  </h4>
                </div>
              </div>
              <!-- por peso min/max -->
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Mayor peso (kg):
                    <strong>algo</strong>
                    <a href="#">apellido, nombre</a>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Menor peso (kg):
                    <strong>algo</strong>
                    <a href="#">apellido, nombre</a>
                  </h4>
                </div>
              </div>
              <!-- por peso -->
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Media de peso en niños (kg): <strong>algo</strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Media de peso en niñas (kg): <strong>algo</strong>
                  </h4>
                </div>
              </div>
              <!-- por altura min/max -->
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Mayor altura (cm):
                    <strong>algo</strong>
                    <a href="#">apellido, nombre</a>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Menor altura (cm):
                    <strong>algo</strong>
                    <a href="#">apellido, nombre</a>
                  </h4>
                </div>
              </div>
              <!-- por altura -->
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Media de altura en niños (cm): <strong>algo</strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Media de altura en niñas (cm): <strong>algo</strong>
                  </h4>
                </div>
              </div>
              <!-- por repitiente -->
              <div class="row">
                <div class="col-sm-6">
                  <h4>
                    Alumnos repitientes: <strong>algo</strong>
                  </h4>
                </div>
                <div class="col-sm-6">
                  <h4>
                    Alumnos no repitientes: <strong>algo</strong>
                  </h4>
                </div>
              </div>
              <!-- por cursos -->
              <div class="row">
                <div class="col-sm-12">
                  <h4>
                    <strong>alumnos en cursos... 1,2,3,4,5,6</strong>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php finalizarPagina($_SESSION['cod_tipo_usr'], $_SESSION['cod_tipo_usr']); ?>
