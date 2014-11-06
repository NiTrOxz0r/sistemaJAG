<?php

// ejemplo para la funcion conexion
// del archivo conexion.php

$cedula = '12345678';
$nombre = 'pedro';

// importamos la funcion conexion.
require "conexion.php";

// iniciamos el query:
$query = "-- INSERT INTO tabla_x (cedula, nombre) values ($cedula, $nombre);";
// llamamos a la funcion y le damos
// el argumento $query:
$resultado = conexion($query);

// con esta variable resultado
// podemos hacer operaciones varias como:
$lista = 0;
while ( $lista == 1 /*mysqli_fetch_array($resultado)*/ ) {
	// operaciones...
	// logica...
}

// para update algo:
$query = "-- UPDATE tabla_x set status = 0 where cedula = $cedula;";
$resultado = conexion($query);

// tambien se puede hacer directamente como:
$resultado = conexion("-- SELECT * from	tabla_x where cedula = $cedula and status = 1;");

// y hacer diferentes operaciones segun sea necesario:
$codigo_x = 1//mysqli_insert_id($resultado);

?>

<!-- ejemplo -->
<div>
	<span>
		el codigo x es : <?php echo $codigo_x; ?>
	</span>
</div>
