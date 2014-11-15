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
	//datos para saber en que tabla quiere ir:
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
	//campos para el inject:
	$seudonimo = mysqli_escape_string($con, $_SESSION['seudonimo']);
	$clave = mysqli_escape_string($con, $_SESSION['clave']);
	//validamos datos basicos de usuario:
	$validarForma = new ChequearUsuario($seudonimo,	$clave);
	//chequeamos que el usuario ingrese como tal a la
	//tabla usuarios antes que todo:
	//cod_tipo_usr = 5 (por verificar)
	$query = "INSERT INTO usuario	
	VALUES
	(null, '$seudonimo', '$clave', 
		5, 1, 1, null, 1, null );";
	$resultado = conexion($query);
	//chequeamos la BD para ver el codigo:
	//del usuario:
	$query = "SELECT codigo
	from usuario 
	where seudonimo = '$seudonimo'
	and clave = '$clave';";
	$resultado = conexion($query);
	$datos = mysqli_fetch_assoc($resultado);
	$codigoUsuario = $datos['codigo'];
	//debido a que ya sabemos que el usuario
	//esta en la base de datos
	//chequeamos a que direccion pertenese el usuario:
	if ($tabla == "administrativo") {
		$tablaDir = "direccion_administrativo";
	} elseif($tabla == "directivo") {
		$tablaDir = "direccion_directivo";
	}elseif ($tabla == "docente") {
		$tablaDir = "direccion_docente";
	}else{
		header("Location: form_reg_PI?tipoTablaDir=$tabla&tipo=MalDefinido");
	}
	//iniciamos variables:
	$cod_parroquia = trim($_POST['cod_parro']);
	$cod_parroquia = mysqli_escape_string($con, $cod_parroquia);
	$direcc = trim($_POST['direcc']);
	if ($direcc == '') {
		$direcc = "null";
	}else{
		$direcc = mysqli_escape_string($con, $direcc);
		$direcc = "'$direcc'";
	}
	//insertamos datos en la tabla que es:
	$query = "INSERT INTO $tablaDir
	VALUES
	(null, $cod_parroquia, $direcc, 1, 1, null,	1, null);";
	$resultado = conexion($query);
	//buscamos el codigo de esa direccion que
	//acabamos de insertar:
	$query = "SELECT codigo from $tablaDir
	where cod_parroquia = $cod_parroquia and direccion_exacta = $direcc;";
	$resultado = conexion($query);
	$datos = mysqli_fetch_assoc($resultado);
	$codigoDireccion = $datos['codigo'];
	
	//iniciamos datos restantes del formulario:
	$codUsrMod = 1; // 1 porque nadie hace referencia a este registro
	$p_apellido = mysqli_escape_string($con, $_POST['p_apellido']);
	$s_apellido = mysqli_escape_string($con, $_POST['s_apellido']);
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
	$email = mysqli_escape_string($con, $_POST['email']);
	$codTipoUsr = '5'; //tipo: por verificar
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
	$resultado = conexion($query);

	//por ultimo:
	$query = "SELECT usuario.codigo as codigo, 
	usuario.seudonimo as seudonimo, 
	usuario.cod_tipo_usr as cod_tipo_usr,
	$tabla.p_nombre as p_nombre,
	$tabla.p_apellido as p_apellido
	from usuario
	inner join $tabla
	on usuario.codigo = $tabla.cod_usr
	where usuario.seudonimo = '$seudonimo';";
	$resultado = conexion($query);
	//si todo sale bien
	//se inicia la sesion de ese usuario:
	if ( $resultado->num_rows == 1 ) :
		$datos = mysqli_fetch_assoc($resultado);
		session_unset();
		session_destroy();
		session_start();
		$_SESSION['codUsrMod'] = $datos['codigo'];
		$_SESSION['codigo'] = $datos['codigo'];
		$_SESSION['seudonimo'] = $datos['seudonimo'];
		$_SESSION['p_nombre'] = $datos['p_nombre'];
		$_SESSION['p_apellido'] = $datos['p_apellido'];
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