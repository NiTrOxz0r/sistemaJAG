CREATE TABLE curso (
  codigo tinyint(3) unsigned primary key,
  grado tinyint(3) unsigned NOT NULL,
  seccion tinyint(3) unsigned NOT NULL,
  descripcion varchar(50) NOT NULL,
  status tinyint(1) unsigned not null default 1,
  cod_usr_reg int unsigned not null,
  fec_reg timestamp not null default current_timestamp,
  cod_usr_mod int unsigned not null,
  fec_mod timestamp not null DEFAULT 0,
  foreign key (cod_usr_reg)
    references usuario(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_usr_mod)
    references usuario(codigo)
    on update cascade
    on delete restrict
)
CHARACTER SET utf8
COLLATE utf8_general_ci;

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
(31, 7, 1, 'Prescolar nivel 1', 1, 1, null, 1, current_timestamp),
(32, 8, 1, 'Prescolar nivel 2', 1, 1, null, 1, current_timestamp),
(33, 9, 1, 'Prescolar nivel 3', 1, 1, null, 1, current_timestamp),
(34, 10, 1, 'Sin Curso Asociado', 1, 1, null, 1, current_timestamp)
;
