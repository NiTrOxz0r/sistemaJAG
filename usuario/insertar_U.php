<?php 
if(!isset($_SESSION)){ 
    session_start(); 
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario desde master.php
validarUsuario();
	
if ( isset($_SESSION['seudonimo']) && isset($_SESSION['clave']) && isset($_POST['cedula']) ): 

	//la clave tiene que ser exactamente 60 caracteres:
	if (strlen($_SESSION['clave']) <> 60) {
		header("Location: form_reg_U.php?clave=MalDefinido");
	}
	//si todo sale bien:
	//chequeamos en que tabla quedara el usuario:
	if (isset($_POST['tipo'])) {
		if ($_POST['tipo'] === '1') {
			$tabla = "administrativo";
		} elseif ($_POST['tipo'] === '2') {
			$tabla = "docente";
		} elseif ($_POST['tipo'] === '3') {
			$tabla = "directivo";
		}else{
			header("Location: form_reg_PI?seudonimo=$seudonimo&tipo=MalDefinido");
		}
		
	}else {
		header("Location: form_reg_PI?seudonimo=$seudonimo&tipo=MalDefinido");
	}

	//para el escape string:
	$con = conexion();
	$seudonimo = mysqli_escape_string($con, $_SESSION['seudonimo']);
	$clave = mysqli_escape_string($con, $_SESSION['clave']);
	//validamos datos basicos de usuario:
	$validarForma = new ChequearUsuario($seudonimo,	$clave);
	
	//cod_tipo_usr = 5 (por verificar)
	$query = "INSERT INTO usuario	
	VALUES
	(null, '$seudonimo', '$clave', 
		5, 1, 1, null, 1, null );";
	$resultado = conexion($query, 1);

	if ($tabla == "administrativo") {
		$tablaDir = "direccion_administrativo";
	} elseif($tabla == "directivo") {
		$tablaDir = "direccion_directivo";
	}elseif ($tabla == "docente") {
		$tablaDir = "direccion_docente";
	}else{
		header("Location: form_reg_PI?tipoTablaDir=$tabla&tipo=MalDefinido");
	}
	$cod_parroquia = trim($_POST['cod_parro']);
	$cod_parroquia = mysqli_escape_string($con, $cod_parroquia);
	$direcc = trim($_POST['direcc']);
	$direcc = mysqli_escape_string($con, $direcc);
	//insertamos datos en la tabla que es:
	$query = "INSERT INTO $tablaDir
	VALUES
	(null, $cod_parroquia, $direcc, 1, 1, null,	1, null);";
	$resultado = conexion($query, 1);
	$codigoDireccion = 1;
	//chequeamos la BD para ver el codigo:
	$query = "SELECT codigo, seudonimo, cod_tipo_usr 
	from usuario 
	where seudonimo = '$seudonimo'
	and clave = '$clave'";
	$resultado = conexion($query, 1);
	$codigoUsuario = 1;
	//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
	//DESDE empezarPagina.php
	empezarPagina();
	
	//iniciamos datos restantes del formulario:
	$codUsrMod = 1;
	$p_apellido = mysqli_escape_string($con, $_POST['p_apellido']);
	$s_apellido = mysqli_escape_string($con, $_POST['p_apellido']);
	$p_nombre = mysqli_escape_string($con, $_POST['p_nombre']);
	$s_nombre = mysqli_escape_string($con, $_POST['s_nombre']);
	$nacionalidad = mysqli_escape_string($con, $_POST['nacionalidad']);
	$cedula = mysqli_escape_string($con, $_POST['cedula']);
	$celular = mysqli_escape_string($con, $_POST['celular']);
	$telefono = mysqli_escape_string($con, $_POST['telefono']);
	$telefonoOtro = mysqli_escape_string($con, $_POST['telefono_otro']);
	$nivel_instruccion = mysqli_escape_string($con, $_POST['nivel_instruccion']);
	$titulo = mysqli_escape_string($con, $_POST['titulo']);
	$fecNac = mysqli_escape_string($con, $_POST['fec_nac']);
	$sexo = mysqli_escape_string($con, $_POST['sexo']);
	$codigoDireccion = 1;
	$email = mysqli_escape_string($con, $_POST['email']);
	$codTipoUsr = '0';
	$codCargo = mysqli_escape_string($con, $_POST['cod_cargo']);
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
		$codigoDireccion,
		$email,
		$codTipoUsr,
		$codCargo
		);

	$query = "INSERT INTO $tabla
	values
	(null, $validarPI->p_nombre, $validarPI->s_nombre, $validarPI->p_apellido,
		$validarPI->s_apellido,	$validarPI->nacionalidad, $validarPI->cedula, 
		$validarPI->celular, $validarPI->telefono, $validarPI->telefonoOtro,
		$validarPI->nivel_instruccion, $validarPI->titulo, $validarPI->fecNac,
		$validarPI->sexo, $validarPI->email,
		$validarPI->codigoDireccion, $codigoUsuario, $validarPI->codCargo,
		1, 1, null, 1, null);";
	$resultado = conexion($query, 1);
	//si todo sale bien
	//se inicia la sesion de ese usuario:
	if ( $resultado->num_rows == 1 ) :
		$datos = mysqli_fetch_assoc($resultado);
		$_SESSION['codUsrMod'] = $datos['codigo'];
		$_SESSION['codigo'] = $datos['codigo'];
		$_SESSION['seudonimo'] = $datos['seudonimo'];
		$_SESSION['cod_tipo_usr'] = $datos['cod_tipo_usr'];?>
		<div id="blancoAjax">
			<h3>
				Bienvenido al sistema <?php echo $seudonimo ?>!
			</h3>
			<p>
				Ud. ya es miembro de este sistema, por favor contacte a un administrador para empezar a usar las diferentes actividades.
			</p>
			<p>
				<a href="../index.php">Regresar al sistema</a>
			</p>
		</div>
	<?php else: ?>
		<div id="blancoAjax">
			<p>
				Error en la base de datos!
			</p>
		</div>
	<?php endif;?>

<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
	
<?php else: ?>
	<div id="blancoAjax">
		<p>
			Problemas en registro de usuario, por favor contacte a un administrador del sistema.
		</p>
	</div>
<?php
//FINALIZAMOS LA PAGINA:
//trae footer.php y cola.php
finalizarPagina();?>
<?php endif ?>