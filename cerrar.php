<?php
  if(!isset($_SESSION)){
    session_start();
  }
  $enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
  require_once($enlace);
  session_destroy();
  session_unset();
  $enlace = enlaceDinamico();
  header('Location: '.$enlace);
?>
