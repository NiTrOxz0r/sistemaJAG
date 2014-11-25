<?php
/**
 * @author [slayerfat] <[slayerfat@gmail.com]>
 *
 * {@internal [si tienen dudas sobre este archivo
 * pregunten, no es tan dificil, solo sigan el flujo del
 * mismo, para registrar a un personal interno que no es usuario:
 *
 * 1. se inserta persona.
 * 2. se inserta personal.
 * 3. se inserta direccion.
 *
 * y listo.
 *
 * este archivo fue cambiado para ajustarse a la nueva base de datos.]}
 *
 * @version [1.0]
 */

if(!isset($_SESSION)){
	session_start();
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario desde master.php
validarUsuario(1);

if ( isset($_POST['cedula']) && strlen($_POST['cedula']) == 8 ) :
	//datos para saber si es docente o no:
	if (isset($_POST['tipo_personal'])) {
		if ($_POST['tipo_personal'] === '1') {
			$asume = false;
		} elseif ($_POST['tipo_personal'] === '2') {
			$asume = true;
		} elseif ($_POST['tipo_personal'] === '3') {
			$asume = false;
		}else{
			header("Location: form_reg_PI.php?tipo_personal=MalDefinido");
		}
	}else {
		header("Location: form_reg_PI.php?tipo_personal=MalDefinido");
	}
	//iniciamos datos restantes del formulario:
	$codUsrMod = $_SESSION['codUsrMod'];
	$p_apellido = $_POST['p_apellido'];
	$s_apellido = $_POST['s_apellido'];
	$p_nombre = $_POST['p_nombre'];
	$s_nombre = $_POST['s_nombre'];
	$nacionalidad = $_POST['nacionalidad'];
	$cedula = $_POST['cedula'];
	$celular = $_POST['celular'];
	$telefono = $_POST['telefono'];
	$telefonoOtro = $_POST['telefono_otro'];
	$nivel_instruccion = $_POST['nivel_instruccion'];
	$titulo = $_POST['titulo'];
	$fecNac = $_POST['fec_nac'];
	$sexo = $_POST['sexo'];
	$email = $_POST['email'];
	$codCargo = $_POST['cod_cargo'];
	$tipo_personal = $_POST['tipo_personal'];
	$codTipoUsr = 'null';
	$codigoUsuario = 'null';
	//validamos los datos restantes:
	$validarPI = new ChequearPI(
		$codUsrMod,
		$p_apellido,
		$s_apellido,
		$p_nombre,
		$s_nombre,
		$nacionalidad,
		$cedula,
		$celular,
		$telefono,
		$telefonoOtro,
		$nivel_instruccion,
		$titulo,
		$fecNac,
		$sexo,
		$email,
		$codTipoUsr,
		$codCargo,
		$tipo_personal
		);

	//se inserta en persona
	//los datos comunes o basicos:
	$query = "INSERT INTO persona
	values
	(null, $validarPI->p_nombre, $validarPI->s_nombre, $validarPI->p_apellido,
		$validarPI->s_apellido,	$validarPI->nacionalidad, $validarPI->cedula,
		$validarPI->fecNac,	$validarPI->telefono, $validarPI->telefonoOtro,
		$validarPI->sexo, 1, $codUsrMod, null, $codUsrMod, current_timestamp);";
	$resultado = conexion($query);
	//averiguamos codigo (y de una vez el resto de campos):
	$query = "SELECT * from persona where cedula = $validarPI->cedula;";
	$resultado = conexion($query);
	if ($resultado->num_rows == 1) :
		$datosDePersona = mysqli_fetch_assoc($resultado);
	endif;

	//se inserta en personal
	//los datos no comunes o especificos:
	$query = "INSERT INTO personal
	values
	(null, $datosDePersona[codigo], $validarPI->celular,
		$validarPI->nivel_instruccion, $validarPI->titulo, $validarPI->email,
		$codigoUsuario, $validarPI->codCargo, $validarPI->tipoPersonal,
		1, $codUsrMod, null, $codUsrMod, current_timestamp);";
	$resultado = conexion($query);

	$query = "SELECT codigo
	from personal
	where cod_persona = $datosDePersona[codigo];";
	$resultado = conexion($query);
	$codigoPersonal = mysqli_fetch_assoc($resultado);

	//validamos campos de direccion:
	$direccion = new ChequearDireccion(
		$codUsrMod,
		$datosDePersona['codigo'],
		$_POST['cod_parroquia'],
		$_POST['direcc']
		);
	//insertamos datos:
	$query = "INSERT INTO direccion
	VALUES
	(null, $direccion->codPersona,
		$direccion->codParroquia,
		$direccion->direccionExacta,
		1, $codUsrMod, null,	$codUsrMod, current_timestamp);";
	$resultado = conexion($query);
	if ($asume) :
		$query = "INSERT INTO asume values
		(null, $codigoPersonal, 34, 0,
			'Autogenerado en registro, por sistema.',
			1, $codUsrMod, null, $codUsrMod, current_timestamp);";
		$resultado = conexion($query);
	endif; ?>

	<div id="blancoAjax">
		<h3>
			El registro de <?php echo $p_apellido.", ".$p_nombre ?>
		</h3>
		<p>
			fue realizado exitosamente!
		</p>
		<p>
			<a href="menucon.php">Hacer otro Registro</a>
		</p>
		<p>
			<a href="../index.php">Regresar al sistema</a>
		</p>
	</div>
	<?php finalizarPagina(); ?>
<?php else : ?>
	<div id="blancoAjax">
		<p>
			Problemas en registro de personal Interno,
			la cedula: <?php echo $_POST['cedula'] ?> es incorrecta.
			Por favor contacte a un administrador del sistema.
		</p>
	</div>
<?php endif; ?>
