<?php
/**
 * @author Alejandro Granadillo. <[slayerfat@gmail.com]>
 * [debugSistema esto sirve para imprimir en pantalla
 * las variables existentes en sesion para ver variables
 * locales de sesion.]
 *
 * {@internal [Esto sirve para imprimir en
 * donde uds quieran datos basicos de sesion]}
 * @return [void] [no regresa nada, solo imprime en pantalla]
 *
 * @version 1.0
 */
function debugSistema(){
  echo "<h5>
          <strong>
            <i>SISTEMA DE DEBUG INTERNO:</i>
          </strong>
        </h5>";
  if (isset($_SESSION['pagina_origen'])) {
    echo "pagina de origen: ".$_SESSION['pagina_origen']."<br />";
  }
  if (isset($_SESSION['seudonimo'])) {
    echo "seudonimo: ".$_SESSION['seudonimo']."<br />";
  }
  if (isset($_SESSION['p_nombre'])) {
    echo "nombre de usuario: ".$_SESSION['p_nombre']."<br />";
  }
  if (isset($_SESSION['p_apellido'])) {
    echo "apellido de usuario: ".$_SESSION['p_apellido']."<br />";
  }
  if (isset($_SESSION['cod_tipo_usr'])) {
    echo "codigo tipo de usuario: ".$_SESSION['cod_tipo_usr']."<br />";
  }
  if (isset($_SESSION['codUsrMod'])) {
    echo "codigo usuario en BD: ".$_SESSION['codUsrMod']."<br />";
  }
  if (isset($_SESSION['inicio'])) {
    echo "head y navbar: ".$_SESSION['inicio']."<br />";
  }
}
?>
