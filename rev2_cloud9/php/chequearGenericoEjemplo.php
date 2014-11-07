<?php 

/**
* @author slayerfat
*
* DOCUMENTACION SOBRE COMO USAR LAS VALIDACIONES:
* aqui se podra ver como usar las VALIDACIONES
* segun el tipo de formulario (alumno, usuario, personalautorizado, etc)
*
*/


session_start();
require "master.php";

echo "<h1> EJEMPLOS PARA VALIDAR FORMULARIOS:</h1>";

// $talCosa = $_GET['delFormularioTalCosa'];
// $talCosa = 'datos';

$_SESSION['codUsrMod'] = 1;
$codUsrMod = $_SESSION['codUsrMod'];
// $codUsrMod = 1;
$p_apellido = "L'";
$s_apellido = 'Troso';
$p_nombre = 'Rosa';
$s_nombre = 'Me';
$nacionalidad = 'e';
$cedula = '12345678';
$telefono = '12345678912';
$telefonoOtro = '12345678912';
$fec_nac = '2014-01-01';
$sexo = '1';
$codigoDireccion = '1';

// se chequea los datos genericos nada mas:
// p_apellido
// s_apellido
// p_nombre
// s_nombre
// nacionalidad
// cedula
// teléfono
// telefonoOtro
// fecNac
// sexo
// codDir


// CASO 1: generico

$validarForma = new ChequearGenerico(
	$codUsrMod,
	$p_apellido,
	$s_apellido,
	$p_nombre,
	$s_nombre,
	$nacionalidad,
	$cedula,
	$telefono,
	$telefonoOtro,
	$fec_nac,
	$sexo,
	$codigoDireccion
);
// si todo sale bien se puede seguir las 
// operaciones de select, insert o update
// segun sean necesarias:

$query = "-- INSERT INTO tablaX values (datos) where campo = condicion;";
$resultado = conexion($query);?>

<div>
	<p>
		la persona 
		<strong>
			<?php echo $validarForma->p_nombre ?> 
			<?php echo ($validarForma->s_nombre == 'null' ? "" : $validarForma->s_nombre) ?>,
			<?php echo $validarForma->p_apellido ?> 
			<?php echo ($validarForma->s_apellido == 'null' ? "" : $validarForma->s_apellido) ?>.
		</strong>
	</p>
	<p>
		ha sido registrada correctamente.
	</p>
</div>
<div> 
	<h3>
		datos dentro del objeto de clase: 
		<?php echo get_class($validarForma); ?>
	</h3>
	<p>
		<?php var_dump($validarForma); ?>
	</p>
</div>
<?php
// CASO 2: alumno

// comprobacion de datos del formulario alumno:
// datos que vienen desde el formulario alumno:
$p_apellido = "L'";
$s_apellido = 'Troso';
$p_nombre = 'Devorah';
$s_nombre = 'Me';
$nacionalidad = 'v';
$cedula = '12345678';
$telefono = '12345678912';
$telefonoOtro = '12345678912';
$fec_nac = '2014-01-01';
$sexo = '1';
$codigoDireccion = '1';
$lug_nac = 'tal  hospital de tal estado';
$cedulaEscolar = '0012345678';
$actaNumero = '123456789';
$actaFolio = '123456789';
$plantel_procedencia = 'escuela tal';
$repitiente = 's';
$codCurso = '2';
$altura = '75';
$peso = '45';
$camisa = '3';
$pantalon = '2';
$zapato = '24';
$codRepresentante = '1';
$codPersonaRetira = '1';

$validarForma = new ChequearAlumno(
	$codUsrMod,
	$p_apellido,
	$s_apellido,
	$p_nombre,
	$s_nombre,
	$nacionalidad,
	$cedula,
	$cedulaEscolar,
	$telefono,
	$telefonoOtro,
	$fec_nac,
	$lug_nac,
	$sexo,
	$codigoDireccion,
	$actaNumero,
	$actaFolio,
	$plantel_procedencia,
	$repitiente,
	$codCurso,
	$altura,
	$peso,
	$camisa,
	$pantalon,
	$zapato,
	$codRepresentante,
	$codPersonaRetira

);

// si todo sale bien se puede seguir las 
// operaciones de select, insert o update
// segun sean necesarias:

$query = "-- UPDATE tablaX set campos = datos where campo = condicion;";
$resultado = conexion($query);?>

<div>
	<p>
		la persona 
		<strong>
			<?php echo $validarForma->p_nombre ?> 
			<?php echo ($validarForma->s_nombre == 'null' ? "" : $validarForma->s_nombre) ?>,
			<?php echo $validarForma->p_apellido ?> 
			<?php echo ($validarForma->s_apellido == 'null' ? "" : $validarForma->s_apellido) ?>.
		</strong>
	</p>
	<p>
		ha sido registrada correctamente.
	</p>
</div>
<div> 
	<h3>
		datos dentro del objeto de clase: 
		<?php echo get_class($validarForma); ?>
	</h3>
	<p>
		<?php var_dump($validarForma); ?>
	</p>
</div>

<?php

// CASO 3: padres o personal autorizado

// ahora con el caso de personal_autorizado:
$p_apellido = "Meraz'";
$s_apellido = '';
$p_nombre = 'Lola';
$s_nombre = '';
$nacionalidad = 'e';
$cedula = '87654321';
$telefono = '12345678912';
$telefonoOtro = '12345678912';
$fec_nac = '2014-01-01';
$sexo = '1';
$codigoDireccion = '1';
$lug_nac = 'tal  hospital de tal estado';
$relacion = '2';
$viveConAlumno = 's';
$nivelInstruccion = '4';
$profesion = "";
$telefonoTrabajo = "";
$direccionTrabajo = "";
$lugarTrabajo = "";


$validarForma = new ChequearPA(
	$codUsrMod,
	$p_apellido,
	$s_apellido,
	$p_nombre,
	$s_nombre,
	$nacionalidad,
	$cedula,
	$telefono,
	$telefonoOtro,
	$fec_nac,
	$lug_nac,
	$sexo,
	$codigoDireccion,
	$relacion,
	$viveConAlumno,
	$nivelInstruccion,
	$profesion,
	$telefonoTrabajo,
	$direccionTrabajo,
	$lugarTrabajo

);

// se hace x operacion:
$query = "-- select * from tablaX where campo = condicion;";
$resultado = conexion($query);?>

<div>
	<p>
		la persona 
		<strong>
			<?php echo $validarForma->p_nombre ?> 
			<?php echo ($validarForma->s_nombre == 'null' ? "" : $validarForma->s_nombre) ?>,
			<?php echo $validarForma->p_apellido ?> 
			<?php echo ($validarForma->s_apellido == 'null' ? "" : $validarForma->s_apellido) ?>.
		</strong>
	</p>
	<p>
		ha sido registrada correctamente.
	</p>
</div>
<div> 
	<h3>
		datos dentro del objeto de clase: 
		<?php echo get_class($validarForma); ?>
	</h3>
	<p>
		<?php var_dump($validarForma); ?>
	</p>
</div>

<?php

// CASO 4: maestra, directora, etc:

// ahora con el caso de un docente o directora:
$p_apellido = "Labara'";
$s_apellido = '';
$p_nombre = 'Mohammed';
$s_nombre = '';
$nacionalidad = 'e';
$cedula = '99988777';
$telefono = '12345678912';
$telefonoOtro = '12345678912';
$fec_nac = '2014-01-01';
$sexo = '0';
$codigoDireccion = '1';
$email = 'cantv@esuna.mierda';
$codTipoUsr = '2';
$codCargo = '1';

$validarForma = new ChequearPI(
	$codUsrMod,
	$p_apellido,
	$s_apellido,
	$p_nombre,
	$s_nombre,
	$nacionalidad,
	$cedula,
	$telefono,
	$telefonoOtro,
	$fec_nac,
	$sexo,
	$codigoDireccion,
	$email,
	$codTipoUsr,
	$codCargo

);

// se hace x operacion:
$query = "-- insert into tablaX values(datos) where campo = condicion;";
$resultado = conexion($query);?>

<div>
	<p>
		la persona 
		<strong>
			<?php echo $validarForma->p_nombre ?> 
			<?php echo ($validarForma->s_nombre == 'null' ? "" : $validarForma->s_nombre) ?>,
			<?php echo $validarForma->p_apellido ?> 
			<?php echo ($validarForma->s_apellido == 'null' ? "" : $validarForma->s_apellido) ?>.
		</strong>
	</p>
	<p>
		ha sido registrada correctamente.
	</p>
</div>

<div> 
	<h3>
		datos dentro del objeto de clase: 
		<?php echo get_class($validarForma); ?>
	</h3>
	<p>
		<?php var_dump($validarForma); ?>
	</p>
</div>

<?php

// CASO 5: usuario:

// ahora con el caso de un docente o directora:
$seudonimo = "morpheo'";
$clave = 'nebuchadnezzar';

$validarForma = new ChequearUsuario($seudonimo,	$clave);

// se hace x operacion:
$query = "-- select codigo from usuario where seudonimo = seudonimo and clave = $clave;";
//es lo mismo que:
$query = "-- select codigo from usuario where seudonimo = svalidarForma->seudonimo and clave = $validarForma->clave;";
$resultado = conexion($query);

// esta comentado para que no de error:

// $codigoDeUsuario = mysql_insert_id($resultado);
// // se supone que con codigo de usuario se puede hacer:
// $query = "-- select p_nombre, p_apellido, s_nombre, s_apellido from docente where codigo = $codigoDeUsuario ;"
// $resultado = conexion($query);
// $datos = mysqli_fetch_assoc($resultado);
// etc....

// esas operaciones generaran entre otros
// resultados, el siguiente:
$validarForma->p_nombre = 'Laurence';
$validarForma->p_apellido = 'Fishburne';
$validarForma->s_nombre = 'null';
$validarForma->s_apellido = 'null';

?>



<div>
	<p>
		la persona 
		<strong>
			<?php echo $validarForma->p_nombre ?> 
			<?php echo ($validarForma->s_nombre == 'null' ? "" : $validarForma->s_nombre) ?>,
			<?php echo $validarForma->p_apellido ?> 
			<?php echo ($validarForma->s_apellido == 'null' ? "" : $validarForma->s_apellido) ?>.
		</strong>
	</p>
	<p>
		ha sido validada correctamente.
	</p>
	<p>
		<strong>
			Bienvenido: 
			<i>
				<u>
					<?php echo $validarForma->p_nombre ?>!! (<strong><?php echo $validarForma->seudonimo; ?></strong>)
				</u>
			</i>
		</strong>
	</p>
</div>

<div> 
	<h3>
		datos dentro del objeto de clase: 
		<?php echo get_class($validarForma); ?>
	</h3>
	<p>
		<?php var_dump($validarForma); ?>
	</p>
</div>

<?php

// CASO 6: usuario:

// ahora con el caso de un docente o directora:
$seudonimo = "trinity'";
$clave = 'patadakunfu';

// estos son seudonimos
// de la misma clase
// lo que quiere decir que lo pueden
// usar como les de la gana:
$validarForma1 = new ChequearLogin($seudonimo,	$clave);
$validarForma2 = new ChequearLogeo($seudonimo,	$clave);
$validarForma3 = new ChequearValidarUsuario($seudonimo,$clave);

?>


<h2>pueden usar diferentes nombres para la misma validacion:</h2>
<div>
	<h3>chequearLogin:</h3>
	<?php var_dump($validarForma1); ?>
</div>
<div>
	<h3>chequearLogeo:</h3>
	<?php var_dump($validarForma2); ?>
</div>
<div>
	<h3>ChequearValidarUsuario:</h3>
	<?php var_dump($validarForma3); ?>
</div>

<?php


session_destroy();

/*
si tienen alguna dura escribanme o llamenme
- slayerfat 2014
*/

?>