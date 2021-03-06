<div class="container-fluid">
  <div class="row">
    <div class="sm-12">
      <div class="jumbotron">
        <h1>Inscripción!</h1>
        <?php
          if ( intval(date('m')) > 7 ) :
            $n = date('Y');
            $n1 = intval(date('Y')) + 1;
          else :
            $n1 = date('Y');
            $n  = intval(date('Y')) - 1;
          endif; ?>
        <p>Proceso de Registro <?php echo $n ?>-<?php echo $n1 ?></p>
        <form role="form" action="personalAutorizado/form_reg_P.php" method="POST" id="form">
          <p>
            <h4>Para agilizar el proceso de Inscripción, es necesario tener en mano los documentos necesarios.</h4>
            <ul>
              <li>Partida de Nacimiento.</li>
              <li>Boleta de notas.</li>
              <li>Cédula Laminada y fotocopia.</li>
              <li>Constancia de estudios (si aplica).</li>
            </ul>
            <h4>También es recomendable destacar los documentos en mano requeridos para el proceso de Inscripción.</h4>
            <h5>Recaudos necesarios, favor seleccione:</h5>
            <div class="col-xs-12">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="s" name="partida_nac">
                  Partida de nacimiento.
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="s" name="constancia_nino_sano">
                  Constancia del niño sano.
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="s" name="canaima">
                  Recurso Canaima.
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="s" name="bicentenario">
                  Colección Bicentenario.
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="s" name="boleta">
                  Boleta de estudios.
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="s" name="fotos_representante">
                  Fotos tipo carnet del representante.
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="s" name="fotocopia_cedula_pa">
                  Fotocopia Cédula de identidad del representante.
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="s" name="fotocopia_cedula_pr">
                  Fotocopia Cédula de identidad de los allegados (si aplica).
                </label>
              </div>
            </div>
          </p>
          <p>
            <button
              class="btn btn-primary btn-lg margen"
              role="button">
              Empezar nuevo registro
            </button>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
