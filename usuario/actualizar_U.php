<?php
if(!isset($_SESSION)){
  session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario.php desde master.php
validarUsuario(1);

//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
//DESDE empezarPagina.php
empezarPagina();

if (isset($_POST['tipo_personal'])	and isset($_POST['cedula']) ) :

	$validarDireccion = new ChequearDireccion (
		$_SESSION['codUsrMod'],
		$_POST['cod_parroquia'],
		$_POST['direcc'],
		$tabla,
		$_POST['cedula']
		);

	$validacionPI = new chequearPI(
		$_SESSION['codUsrMod'],
		$_POST['p_apellido'],
		$_POST['s_apellido'],
		$_POST['p_nombre'],
		$_POST['s_nombre'],
		$_POST['nacionalidad'],
		$_POST['cedula'],
		$_POST['celular'],
		$_POST['telefono'],
		$_POST['telefono_otro'],
		$_POST['nivel_instruccion'],
		$_POST['titulo'],
		$_POST['fec_nac'],
		$_POST['sexo'],
		$_POST['cod_direccion'],
		$_POST['email'],
		$_POST['cod_tipo_usr'],
		$_POST['cargo']
		);

//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
<?php else: ?>
	<?php header('Location: consultar_U.php?error=vacio'); ?>
<?php endif; ?>
