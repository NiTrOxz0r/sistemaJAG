CREATE TABLE curso (
	codigo tinyint(3) unsigned primary key,
  grado tinyint(3) NOT NULL,
  seccion tinyint(3) NOT NULL,
  descripcion varchar(50) NOT NULL,
  status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null
);

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO curso VALUES
(1, 1, 1, 'Primer Grado Seccion:"A"', 1, 1, null, 1, current_timestamp),
(2, 1, 2, 'Primer Grado Seccion:"B"', 1, 1, null, 1, current_timestamp),
(3, 1, 3, 'Primer Grado Seccion:"C"', 1, 1, null, 1, current_timestamp),
(4, 1, 4, 'Primer Grado Seccion:"D"', 1, 1, null, 1, current_timestamp),
(5, 1, 5, 'Primer Grado Seccion:"E"', 1, 1, null, 1, current_timestamp),
(6, 2, 1, 'Segundo Grado Seccion:"A"', 1, 1, null, 1, current_timestamp),
(7, 2, 2, 'Segundo Grado Seccion:"B"', 1, 1, null, 1, current_timestamp),
(8, 2, 3, 'Segundo Grado Seccion:"C"', 1, 1, null, 1, current_timestamp),
(9, 2, 4, 'Segundo Grado Seccion:"D"', 1, 1, null, 1, current_timestamp),
(10, 2, 5, 'Segundo Grado Seccion:"E"', 1, 1, null, 1, current_timestamp),
(11, 3, 1, 'Tercer Grado Seccion:"A"', 1, 1, null, 1, current_timestamp),
(12, 3, 2, 'Tercer Grado Seccion:"B"', 1, 1, null, 1, current_timestamp),
(13, 3, 3, 'Tercer Grado Seccion:"C"', 1, 1, null, 1, current_timestamp),
(14, 3, 4, 'Tercer Grado Seccion:"D"', 1, 1, null, 1, current_timestamp),
(15, 3, 5, 'Tercer Grado Seccion:"E"', 1, 1, null, 1, current_timestamp),
(16, 4, 1, 'Cuarto Grado Seccion:"A"', 1, 1, null, 1, current_timestamp),
(17, 4, 2, 'Cuarto Grado Seccion:"B"', 1, 1, null, 1, current_timestamp),
(18, 4, 3, 'Cuarto Grado Seccion:"C"', 1, 1, null, 1, current_timestamp),
(19, 4, 4, 'Cuarto Grado Seccion:"D"', 1, 1, null, 1, current_timestamp),
(20, 4, 5, 'Cuarto Grado Seccion:"E"', 1, 1, null, 1, current_timestamp),
(21, 5, 1, 'Quinto Grado Seccion:"A"', 1, 1, null, 1, current_timestamp),
(22, 5, 2, 'Quinto Grado Seccion:"B"', 1, 1, null, 1, current_timestamp),
(23, 5, 3, 'Quinto Grado Seccion:"C"', 1, 1, null, 1, current_timestamp),
(24, 5, 4, 'Quinto Grado Seccion:"D"', 1, 1, null, 1, current_timestamp),
(25, 5, 5, 'Quinto Grado Seccion:"E"', 1, 1, null, 1, current_timestamp),
(26, 6, 1, 'Sexto Grado Seccion:"A"', 1, 1, null, 1, current_timestamp),
(27, 6, 2, 'Sexto Grado Seccion:"B"', 1, 1, null, 1, current_timestamp),
(28, 6, 3, 'Sexto Grado Seccion:"C"', 1, 1, null, 1, current_timestamp),
(29, 6, 4, 'Sexto Grado Seccion:"D"', 1, 1, null, 1, current_timestamp),
(30, 6, 5, 'Sexto Grado Seccion:"E"', 1, 1, null, 1, current_timestamp),
(31, -1, 1, 'Prescolar nivel 1', 1, 1, null, 1, current_timestamp),
(32, -2, 1, 'Prescolar nivel 2', 1, 1, null, 1, current_timestamp),
(33, -3, 1, 'Prescolar nivel 3', 1, 1, null, 1, current_timestamp),
(34, 7, 1, 'Sin Curso Asociado', 1, 1, null, 1, current_timestamp)
;

-- CREATE TABLE curso (
-- 	codigo tinyint unsigned auto_increment primary key,
-- 	grado tinyint(2) not null, seccion tinyint(2) not null,
-- 	cod_prof int unsigned default null, turno enum('m','t') not null,
-- 	status tinyint(1) unsigned not null default 1,
-- 	cod_usr_reg int not null, fec_reg timestamp not null default current_timestamp,
-- 	cod_usr_mod int not null, fec_mod timestamp not null default current_timestamp,
-- 	foreign key (cod_prof)
-- 		references profesor(codigo)
-- 		on update cascade
-- 		on delete restrict
-- );


-- /*insertar todos los posibles cursos a mano da ladilla:*/
-- <?php
-- $i = 1; $j = 1;
-- 	echo "INSERT INTO curso<br>
-- 			(grado, seccion, cod_prof, turno, cod_usr_reg, cod_usr_mod)<br>
-- 			values<br>";
-- 	for ($i=1; $i <= 9 ; $i++) {
-- 		while ($j <= 5) {
-- 			if ($i == 9 and $j == 5) {
-- 				echo "($i, $j, null, 'm', 1, 1);<br>";
-- 				break;
-- 			}else{
-- 				echo "($i, $j, null, 'm', 1, 1),<br>";
-- 				$j++;
-- 			}
-- 		}
-- 		$j = 1;
-- 	}
-- ?>
-- /*eso genera esta bonita lista*/
-- INSERT INTO curso
-- (grado, seccion, cod_prof, turno, cod_usr_reg, cod_usr_mod)
-- values
-- (1, 1, null, 'm', 1, 1),
-- (1, 2, null, 'm', 1, 1),
-- (1, 3, null, 'm', 1, 1),
-- (1, 4, null, 'm', 1, 1),
-- (1, 5, null, 'm', 1, 1),
-- (2, 1, null, 'm', 1, 1),
-- (2, 2, null, 'm', 1, 1),
-- (2, 3, null, 'm', 1, 1),
-- (2, 4, null, 'm', 1, 1),
-- (2, 5, null, 'm', 1, 1),
-- (3, 1, null, 'm', 1, 1),
-- (3, 2, null, 'm', 1, 1),
-- (3, 3, null, 'm', 1, 1),
-- (3, 4, null, 'm', 1, 1),
-- (3, 5, null, 'm', 1, 1),
-- (4, 1, null, 'm', 1, 1),
-- (4, 2, null, 'm', 1, 1),
-- (4, 3, null, 'm', 1, 1),
-- (4, 4, null, 'm', 1, 1),
-- (4, 5, null, 'm', 1, 1),
-- (5, 1, null, 'm', 1, 1),
-- (5, 2, null, 'm', 1, 1),
-- (5, 3, null, 'm', 1, 1),
-- (5, 4, null, 'm', 1, 1),
-- (5, 5, null, 'm', 1, 1),
-- (6, 1, null, 'm', 1, 1),
-- (6, 2, null, 'm', 1, 1),
-- (6, 3, null, 'm', 1, 1),
-- (6, 4, null, 'm', 1, 1),
-- (6, 5, null, 'm', 1, 1),
-- (7, 1, null, 'm', 1, 1),
-- (7, 2, null, 'm', 1, 1),
-- (7, 3, null, 'm', 1, 1),
-- (7, 4, null, 'm', 1, 1),
-- (7, 5, null, 'm', 1, 1),
-- (8, 1, null, 'm', 1, 1),
-- (8, 2, null, 'm', 1, 1),
-- (8, 3, null, 'm', 1, 1),
-- (8, 4, null, 'm', 1, 1),
-- (8, 5, null, 'm', 1, 1),
-- (9, 1, null, 'm', 1, 1),
-- (9, 2, null, 'm', 1, 1),
-- (9, 3, null, 'm', 1, 1),
-- (9, 4, null, 'm', 1, 1),
-- (9, 5, null, 'm', 1, 1);
