-- 
-- version 2.1
-- ESTE TUTORIAL ES COMO REFERENCIA, no para ser
-- usado y ejecutado como tal.

-- 
-- primero que todo se mete la direccion de
-- los padres y representantes seguido del alumno
-- porque alumno y padres hacen referencia primero
-- 

INSERT INTO direccion_p_a
values 
	(1, 1, 'la calle tal apartamento tal', 
		1, 1, current_timestamp, 1, current_timestamp),
	(2, 1, 'la calle tal apartamento tal', 
	1, 1, current_timestamp, 1, current_timestamp),
	(3, 2, 'la calle tal apartamento tal', 
	1, 1, current_timestamp, 1, current_timestamp)
;

INSERT INTO direccion_alumno
values 
	(50, 1, 'la calle tal apartamento tal', 
		1, 1, current_timestamp, 1, current_timestamp)
;

-- 
-- luego se introduce al personal autorizado primero
-- porque alumno le hace referencia a ellos
-- 

INSERT INTO personal_autorizado (
	`codigo`, `p_apellido`, `s_apellido`, 
	`p_nombre`, `s_nombre`, 
	`nacionalidad`, `cedula`, 
	`telefono`, `telefono_otro`, 
	`email`, `lugar_nac`, 
	`fec_nac`, `relacion`, 
	`vive_con_alumno`, `cod_direccion`, 
	`nivel_instruccion`, `profesion`, 
	`telefono_trabajo`, `direccion_trabajo`, 
	`lugar_trabajo`, `status`, 
	`cod_usr_reg`, `fec_reg`, 
	`cod_usr_mod`, `fec_mod`) 
VALUES 
	(
		1, 'Orellana', 'Martinez', 
		'Manuel', 'Carreño', 
		'v', '11998526', 
		'04122561155', '02124761155', 
		'otromas@hotmail.com', 'Caracas', 
		'2014-11-04', 1, 
		's', 1, 
		'1', '255', 
		'02124411555', 'The White House', 
		'La Casa Blanca', '1', 
		'1', CURRENT_TIMESTAMP, 
		'1', CURRENT_TIMESTAMP),
	(
		2, 'Orellana', 'Perez', 
		'Maria', 'Gustava', 
		'v', '12345678', 
		'04122561155', '02124761155', 
		'cantv@esuna.mierda', 'Caracas', 
		'2014-11-04', 2, 
		's', 2, 
		'1', '255', 
		'02124411555', 'The White House', 
		'La Casa Blanca', '1', 
		'1', CURRENT_TIMESTAMP, 
		'1', CURRENT_TIMESTAMP),
	(
		3, 'Bustamante', 'Perez', 
		'Luisa', 'Josefina', 
		'v', '87654321', 
		'04122561155', '02124761155', 
		'cantv@esuna.mierda', 'Caracas', 
		'2014-11-04', 3, 
		's', 3, 
		'1', '255', 
		'02124411555', 'The White House', 
		'La Casa Blanca', '1', 
		'1', CURRENT_TIMESTAMP, 
		'1', CURRENT_TIMESTAMP)
;

-- 
-- luego de eso es que por fin se introduce al alumno
-- ya que todos los campos que necesita ya existen en
-- la base de datos
-- 

INSERT INTO alumno
(codigo, p_apellido, s_apellido, 
p_nombre, s_nombre, cod_representante, 
cod_persona_retira, telefono,
telefono_otro, lugar_nac, fec_nac,
sexo, acta_num_part_nac, acta_folio_num_part_nac,
nacionalidad, cedula, cedula_escolar,
cod_direccion, plantel_procedencia, repitiente,
cod_curso, altura, peso,
camisa, pantalon, zapato, 
status, cod_usr_reg, fec_reg, cod_usr_mod, fec_mod)
values 
	(
		1, 'Orellana', 'Perez',
		'Luisa', 'Chiquinquira',
		2, null, null, null, null,
		'2014-06-14', 1, 
		'123123123', '123456789',
		'v', '12345678', '1012345678',
		50, 'Escuela Tal', 'n',
		6, 75, 43, 3, 3, 28, 
		1, 1, current_timestamp, 1, current_timestamp)
;

-- 
-- y por ultimo se crea la relacion
-- que cada personal_autorizado
-- tiene con el alumno
-- 

INSERT INTO obtiene
values
	(1,1,1,1, 1, current_timestamp, 1, current_timestamp),
	(2,2,1,1, 1, current_timestamp, 1, current_timestamp),
	(3,3,1,1, 1, current_timestamp, 1, current_timestamp)
;


--
-- FIN DE QUERY 1
--



-- 
-- suponte que ahora hay que meter 
-- como actualizacion a una persona
-- que lo pueda retirar
-- 

-- 
-- antes que todo se empieza
-- con la direccion de esa persona.
-- detalla el numero diferente de parroquia
-- 

INSERT INTO direccion_p_a
values 
	(4, 15, 'la calle tal apartamento tal', 
		1, 1, current_timestamp, 1, current_timestamp);

-- 
-- luego se introducen los datos de la
-- persona que lo va a retirar
-- 

INSERT INTO personal_autorizado (
	`codigo`, `p_apellido`, `s_apellido`, 
	`p_nombre`, `s_nombre`, 
	`nacionalidad`, `cedula`, 
	`telefono`, `telefono_otro`, 
	`email`, `lugar_nac`, 
	`fec_nac`, `relacion`, 
	`vive_con_alumno`, `cod_direccion`, 
	`nivel_instruccion`, `profesion`, 
	`telefono_trabajo`, `direccion_trabajo`, 
	`lugar_trabajo`, `status`, 
	`cod_usr_reg`, `fec_reg`, 
	`cod_usr_mod`, `fec_mod`) 
VALUES 
	(
		4, 'Chavez', 'Frias', 
		'Hugo', 'Rafael', 
		'v', '11122233', 
		'04122561155', '02124761155', 
		'cantves@unagran.mierda', 'bien lejos', 
		'2014-11-04', 7, 
		'n', 4,
		'1', '255', 
		'02124411555', 'Algun lugar', 
		'Miraflores', '1', 
		'1', CURRENT_TIMESTAMP, 
		'1', CURRENT_TIMESTAMP);

-- 
-- se crea la relacion que esa persona
-- tiene con el alumno
-- 

INSERT INTO obtiene
values
	(4,4,1,1, 1, current_timestamp, 1, current_timestamp);

-- 
-- y por ultimo se actualiza al alumno
-- 

UPDATE alumno SET
cod_persona_retira = 4, 
cod_usr_mod = 1,
fec_mod = CURRENT_TIMESTAMP
where codigo = 1 and status = 1;

-- 
-- FIN DE QUERY 2
-- 





-- 
-- inicio de 
-- ejemplo 2
-- 







-- 
-- ok y ahora: por ultimo
-- para PHP va ser algo diferente
-- porque tienes que meter los datos
-- y despues hacer un query para 
-- saber el codigo que tienen
-- EJEMPLO 2:
-- 

-- detalla que los codigos son null
-- porque se supone que no se saben donde
-- van a terminar en la base de datos


INSERT INTO direccion_p_a
values 
	(null, 1, 'la calle tal apartamento tal', 
		1, 1, current_timestamp, 1, current_timestamp)
;

INSERT INTO direccion_alumno
values 
	(null, 1, 'la calle tal apartamento tal', 
		1, 1, current_timestamp, 1, current_timestamp)
;

select codigo from direccion_p_a
where cod_parroquia = 1 and
direccion_exacta = 'la calle tal apartamento tal';

$codigo_direccion_p_a = ese query;

select codigo from direccion_alumno
where cod_parroquia = 1 and
direccion_exacta = 'la calle tal apartamento tal';

$codigo_direccion_alumno = el otro query;

INSERT INTO personal_autorizado (
	`codigo`, `p_apellido`, `s_apellido`, 
	`p_nombre`, `s_nombre`, 
	`nacionalidad`, `cedula`, 
	`telefono`, `telefono_otro`, 
	`email`, `lugar_nac`, 
	`fec_nac`, `relacion`, 
	`vive_con_alumno`, `cod_direccion`, 
	`nivel_instruccion`, `profesion`, 
	`telefono_trabajo`, `direccion_trabajo`, 
	`lugar_trabajo`, `status`, 
	`cod_usr_reg`, `fec_reg`, 
	`cod_usr_mod`, `fec_mod`) 
VALUES 
	(
		null, 'Orellana', 'Martinez', 
		'Manuel', 'Carreño', 
		'v', '11998526', 
		'04122561155', '02124761155', 
		'otromas@hotmail.com', 'Caracas', 
		'2014-11-04', 1, 
		's', $codigo_direccion_p_a, 
		'1', '255', 
		'02124411555', 'The White House', 
		'La Casa Blanca', '1', 
		'1', CURRENT_TIMESTAMP, 
		'1', CURRENT_TIMESTAMP)
;

-- 
-- luego que este introducido
-- la persona (padre/madre/otro)
-- se procede a ver su codigo
-- 



select codigo from personal_autorizado
where cedula = '11998526';

$codigo_p_a = ese query;

INSERT INTO alumno
(codigo, p_apellido, s_apellido, 
p_nombre, s_nombre, cod_representante, 
cod_persona_retira, telefono,
telefono_otro, lugar_nac, fec_nac,
sexo, acta_num_part_nac, acta_folio_num_part_nac,
nacionalidad, cedula, cedula_escolar,
cod_direccion, plantel_procedencia, repitiente,
cod_curso, altura, peso,
camisa, pantalon, zapato, 
status, cod_usr_reg, fec_reg, cod_usr_mod, fec_mod)
values 
	(
		null, 'Orellana', 'Perez',
		'Luisa', 'Chiquinquira',
		$codigo_p_a, null, null, null, null,
		'2014-06-14', 1, 
		'123123123', '123456789',
		'v', '12345678', '1012345678',
		50, 'Escuela Tal', 'n',
		6, 75, 43, 3, 3, 28, 
		1, 1, current_timestamp, 1, current_timestamp)
;

-- 
-- ahora lo que queda es ver
-- el codigo de alumno
-- que seria el mismo procedimiento
-- 

select codigo from alumno
where cedula = '123123123'
and cedula_escolar = '123456789';

$codigo_alumno = ese otro query;

INSERT INTO obtiene
values
	(null,$codigo_p_a,$codigo_alumno,1, 1, current_timestamp, 1, current_timestamp)
;


--
-- FIN DE QUERY
--


-- 
-- ejemplo de query considerando
-- las variables que se manejan por PHP
-- ejemplo de personal_autorizado
-- 
-- EJEMPO 3
-- 
<?php 

include "registro.php";
//registro
if ($representante_mama <> $representante_papa) {

	$datos_mama = $_POST['datos'];

	$queryMama = "INSERT INTO personal_autorizado
	values (
		null, '$datos_mama', 'etc'

		);";

	$datos_papa = $_POST['datos'];

	$queryPapa = "INSERT INTO personal_autorizado
	values (
		null, '$datos_papa', 'etc'

		);";

	$resultado = mysqli_query($conex, $queryMama);
	$codigo_mama = mysqli_insert_id();
	$resultado = mysqli_query($conex, $queryPapa);
	$codigo_papa = mysqli_insert_id();
	
	if ($representante_mama == 1) {

		$queryAlumno = "INSERT INTO alumno
		values (null, 'descripcion', $codigo_mama);";
		$resultado = mysqli_query($conex, $query);
		$codigo_alumno = mysqli_insert_id();

	}else if ($representante_papa == 1) {

		$query = "INSERT INTO alumno
		values (null, 'descripcion', $codigo_papa);";
		$resultado = mysqli_query($conex, $query);
		$codigo_alumno = mysqli_insert_id();
	}

	$query = "INSERT INTO obtiene
	values (null, $codigo_mama, $codigo_alumno);";
	$resultado = mysqli_query($conex, $query);

	$query = "INSERT INTO obtiene
	values (null, $codigo_papa, $codigo_alumno);";
	$resultado = mysqli_query($conex, $query);
}else{
	echo "error representante solo puede ser uno";
}



// actualizar
$query = "SELECT * alumno where cedula = $cedula"
$resultado = mysqli_query($conex, $query);
$codigo_alumno = mysqli_insert_id();

$datos_persona = $_POST['datos'];

	$querypersona = "INSERT INTO personal_autorizado
	values (
		null, '$datos_persona', 'etc'

		);";
$resultado = mysqli_query($conex, $querypersona);
$codigo_persona = mysqli_insert_id();

$query = "UPDATE alumno set cod_persona_retira = $codigo_persona where cedula = $cedula"
$resultado = mysqli_query($conex, $querypersona);

$query = "INSERT INTO obtiene
	values (null, $codigo_persona, $codigo_alumno);";
	$resultado = mysqli_query($conex, $query);
?>


-- 
-- ejemplo de formulario por HTML
-- en donde se establece la relacion
-- representante con el alumno
-- entre madre padre u otro....

-- CONSIDERAR
-- IMPLEMENTAR FORMULARIOS DINAMICOS
-- POR MEDIO DE JQUERY
-- PARA EJECTUAR UN SOLO QUERY
-- A LA BASE DE DATOS
-- SEGUN EL NUMERO DE PERSONAS
-- INSTRODUCIDAS

-- MAMA, PAPA, TIO, ABUELO, SOBRINO,
-- ALLEGO X, ALLEGADO X+1, ALLEGADO .... ALLEGADO X+N
-- 

-- 
-- cualquier cosa me llamas
-- HECHO POR EL DIOS SUPREMO
-- E INDISCUTIBLE - SLAYERFAT
-- 