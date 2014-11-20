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
/**
 * hecho por slayerfat, si tienen dudas
 * o sugerencias ya saben donde estoy.
 */
if (isset($_POST['tipo_personal'])	and isset($_POST['cedula']) ) :
	// chequeamos datos de direccion:
	$validarDireccion = new ChequearDireccion (
		$_SESSION['codUsrMod'],
		$_SESSION['codigo_persona'],
		$_POST['cod_parro'],
		$_POST['direcc']
		);
	// chequeamos datos del formulario:
	$validarPI = new ChequearPI(
		$_SESSION['codUsrMod'],
		// $_POST['p_apellido'],
		// $_POST['s_apellido'],
		// $_POST['p_nombre'],
		// $_POST['s_nombre'],
		// $_POST['nacionalidad'],
		// $_POST['cedula'],
		$_POST['celular'],
		// $_POST['telefono'],
		// $_POST['telefono_otro'],
		$_POST['nivel_instruccion'],
		$_POST['titulo'],
		// $_POST['fec_nac'],
		// $_POST['sexo'],
		$_POST['email'],
		$_POST['cod_tipo_usr'],
		$_POST['cod_cargo'],
		$_POST['tipo_personal']
		);
	//update de la direccion:
	$query = "UPDATE direccion set
	cod_persona = $validarDireccion->codPersona,
	cod_parroquia = $validarDireccion->codParroquia,
	direccion_exacta = $validarDireccion->direccionExacta
	where codigo = $_SESSION[codigo_direccion];";
	$resultado = conexion($query);

	// update del personal:
	$query = "BEGIN TRANSACTION ";
	$query = $query."UPDATE persona
	set
	p_apellido = $validarPI->p_apellido,
	s_apellido = $validarPI->s_apellido,
	p_nombre = $validarPI->p_nombre,
	s_nombre = $validarPI->s_nombre,
	nacionalidad = $validarPI->nacionalidad,
	cedula = $validarPI->cedula,
	telefono = $validarPI->telefono,
	telefono_otro = $validarPI->telefonoOtro,
	fec_nac = $validarPI->fecNac,
	sexo = $validarPI->sexo
	where
	codigo = $_SESSION['codigo_persona']
	";

//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
<?php else: ?>
	<?php header('Location: consultar_U.php?error=vacio'); ?>
<?php endif; ?>
