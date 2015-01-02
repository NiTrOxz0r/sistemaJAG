<?php
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$go = true;
if(preg_match('/Firefox/i',$u_agent)) :
  $go = false;
elseif(preg_match('/Chrome/i',$u_agent)) :
  $go = false;
elseif(preg_match('/Chromium/i',$u_agent)) :
  $go = false;
endif;
?>

<?php if ($go): ?>
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
<?php endif ?>
