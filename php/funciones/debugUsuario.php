<?php
/*referenciado en navbar.php y footer.php*/
/*esto sirve para imprimir en pantalla
las variables existentes en sesion para ver que 
locura estaba haciendo yo o la maquina:*/
// if (isset($_SESSION['valido'])) {
// 	echo "valido: ".$_SESSION['valido']."<br />";
// }else echo "sesion no iniciada";
if (isset($_SESSION['pagina_origen'])) {
	echo "pagina de origen: ".$_SESSION['pagina_origen']."<br />";
}
if (isset($_SESSION['seudonimo'])) {
	echo "seudonimo: ".$_SESSION['seudonimo']."<br />";
}
if (isset($_SESSION['nombre_usuario'])) {
	echo "nombre de usuario: ".$_SESSION['nombre_usuario']."<br />";
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
?>