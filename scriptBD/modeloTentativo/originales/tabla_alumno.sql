CREATE TABLE alumno (
	codigo int unsigned auto_increment primary key,
	cedula_escolar varchar(10) unique not null,
	acta_num_part_nac int zerofill unique,
	acta_folio_num_part_nac int zerofill unique,
	lugar_nac varchar(50) default 'Sin Registro',
	plantel_procedencia varchar(50),
	repitiente enum('s','n') not null,
	cod_curso tinyint(3) unsigned not null,
	altura tinyint(3) unsigned zerofill,
	peso smallint(3) unsigned,
	camisa tinyint(1) unsigned,
	pantalon tinyint(1) unsigned,
	zapato tinyint(2) unsigned zerofill,
	cod_representante int unsigned not null,
	cod_persona_retira int unsigned,
	certificado_vacuna enum ('s', 'n') not null,
	discapacidad tinyint(3) not null default 0,
	cod_persona int unsigned not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int unsigned not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int unsigned not null,
	fec_mod timestamp not null default current_timestamp,
	foreign key (camisa)
		references talla(codigo)
		on update cascade
		on delete restrict,
	foreign key (pantalon)
		references talla(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_curso)
		references curso(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_representante)
		references personal_autorizado(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_persona_retira)
		references personal_autorizado(codigo)
		on update cascade
		on delete restrict,
	foreign key (discapacidad)
		references discapacidad(codigo)
		on update cascade
		on delete restrict,
);

INSERT INTO `alumno`
(`codigo`,
	`p_apellido`, `s_apellido`,
	`p_nombre`, `s_nombre`,
	`nacionalidad`, `cedula`,
	`cedula_escolar`, `acta_num_part_nac`,
	`acta_folio_num_part_nac`, `telefono`,
	`telefono_otro`, `fec_nac`, `lugar_nac`,
	`sexo`, `cod_direccion`, `plantel_procedencia`,
	`repitiente`, `cod_curso`, `altura`, `peso`,
	`camisa`, `pantalon`, `zapato`, `cod_representante`,
	`cod_persona_retira`, `status`, `cod_usr_reg`,
	`fec_reg`, `cod_usr_mod`, `fec_mod`)
VALUES ('1', 'Orellana', 'Martinez',
	'Pepita', 'Fanca', 'v', '12345678',
	'0012345678', '123456789', '987654321',
	'SinRegistro', 'SinRegistro', '2014-11-05',
	'Sin Registro', '1', '50', 'Escuela tal',
	'n', '3', '75', '45', '3', '2', '24',
	'1', '3', '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP), ('2', 'Orellana', 'Martinez', 'Juan', 'Luis', 'v', '99955511', '0099955511', '999999999', '999999991', 'SinRegistro', 'SinRegistro', '2014-11-05', 'Sin Registro', '0', '50', 'Plantel tal', 'n', '1', '78', '65', '4', '4', '28', '1', '2', '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP);

-- INSERT INTO alumno
-- 	(codigo, apellidos, nombres,
-- 	cod_representante, telefono,
-- 	telefono_otro, lugar_nac,
-- 	fec_nac, sexo, acta_num_part_nac,
-- 	acta_folio_num_part_nac,
-- 	cedula, direccion, plantel_procedencia,
-- 	repitiente, cod_curso, altura,
-- 	peso, camisa, pantalon, zapato,
-- 	cod_usr_reg, cod_usr_mod)
-- 	values
-- 	(null, 'Gomez Sanches', 'Petra Juana', 2, '02124447788','04167771122',
-- 	'Carabobo, hospital blabla', '1980-02-15', 1, 00043333, 1234555, '00000000',
-- 	'avenida tal, calle el pito y la guacharaca, edificio blabla, piso blalbla apartamento blablablab',
-- 	'escuela blablablalalala', 'n', null, null, null, 3, 3, 24, 1, 1),
-- 	(null, 'Martinez Van Hellsing', 'Conchita Maria', 4, '02124447711','04165551122',
-- 	'Caracas, la vega, blablb', '1989-11-02', 1, 000413, 1255, '35555444',
-- 	'avenida x, calle el google.com, edificio xz',
-- 	'escuela blablablalalala', 's', null, 130, 45, 3, 2, 16, 1, 1),
-- 	(null, 'Gomez Gomez', 'Juan', 1, '02123334444','04129997788',
-- 	'Caracas, algun sitio', '1992-12-01', 0, 98, 88774455, '19191991',
-- 	'avenida hampa sadica, calle esconde el celular, edificio donde esta la policia, piso ayuda apartamento por favor',
-- 	'escuela Que es salir a las 3am en el centro?', 'n', null, 169, 60, 4, 4, 29, 1, 1);
