<?php 
if(!isset($_SESSION)){ 
    session_start(); 
}
$enlace = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/php/master.php";
require_once($enlace);
// invocamos validarUsuario desde master.php
validarUsuario();
	
if ( isset($_POST['seudonimo']) && isset($_POST['clave']) && isset($_POST['cedula']) ): 

	//la clave tiene que ser exactamente 60 caracteres:
	if ($_POST['clave'] <> 60) {
		header("Location: form_reg_U.php?clave=MalDefinido");
	}
	//ESTA FUNCION TRAE EL HEAD Y NAVBAR:
	//DESDE empezarPagina.php
	empezarPagina();
	//para el escape string:
	$con = conexion();
	$seudonimo = mysqli_escape_string($con, $_POST['seudonimo']);
	$clave = mysqli_escape_string($con, $_POST['clave']);
	//validamos datos basicos de usuario:
	$validarForma = new ChequearUsuario($seudonimo,	$clave);
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
	$fecNac = mysqli_escape_string($con, $_POST['fec_nac']);
	$sexo = mysqli_escape_string($con, $_POST['sexo']);
	$codigoDireccion = mysqli_escape_string($con, $_POST['cod_direccion']);
	$email = mysqli_escape_string($con, $_POST['email']);
	$codTipoUsr = mysqli_escape_string($con, $_POST['cod_tipo_usr']);
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
		$fecNac,
		$sexo,
		$codigoDireccion,
		$email,
		$codTipoUsr,
		$codCargo
		);
	//si todo sale bien:
	//chequeamos en que tabla quedara el usuario:
	if (isset($_POST['tipo'])) {
		if ($_POST['tipo'] === 1) {
			$tabla = "administrativo";
		} elseif ($_POST['tipo'] === 2) {
			$tabla = "docente";
		} elseif ($_POST['tipo'] === 3) {
			$tabla = "directivo";
		}else{
			header("Location: form_reg_PI?seudonimo=$seudonimo&tipo=MalDefinido");
		}
		
	} else {
		header("Location: form_reg_PI?seudonimo=$seudonimo&tipo=MalDefinido");
	}
	
	//cod_tipo_usr = 5 (por verificar)
	$query = "INSERT INTO usuario	
	(
		)
	VALUES
	(null, '$seudonimo', '$clave', 
		5, 1, 1, null, 1, null );";
	$resultado = conexion($query, 1);

	//insertamos datos en la tabla que es:
	$query = "INSERT INTO $tabla
	VALUES
	(
		);";
	//chequeamos la BD para ver el codigo:
	$query = "SELECT codigo, seudonimo, cod_tipo_usr 
	from usuario 
	where seudonimo = '$seudonimo'
	and clave = '$clave'";
	$resultado = conexion($query);
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
<?php endif ?>