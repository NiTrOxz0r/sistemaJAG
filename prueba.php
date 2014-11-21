<?php
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);

/**
 * archivo creado con la idea
 * de hacer pruebas internas en php/mysql/javascript/html
 * este archivo es ignorado por git.
 */
$seudonimo = "prueba111";
$clave = array('completo' => '$2y$12$yRpjEi6GcwCrOvCinxuamem7p89BO4y/S1FlAusnNRX54YEY.OZD6');
$validar = new ChequearUsuario( $seudonimo, $clave );
echo "$validar->clave[completo]"."<br>";
$clave = $validar->clave;
$validar = new ChequearUsuario( $seudonimo, $clave );
echo $validar->clave['completo']."<br>";
$clave = $validar->clave;
$validar = new ChequearUsuario( $seudonimo, $clave );
echo $validar->clave['completo']."<br>";
?>
