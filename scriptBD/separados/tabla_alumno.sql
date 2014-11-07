CREATE TABLE alumno (
	codigo int unsigned auto_increment primary key,
	p_apellido varchar(40) not null,
	s_apellido varchar(40) default "Sin Registro",
	p_nombre varchar(40) not null,
	s_nombre varchar(40) default "Sin Registro",
	cod_representante int unsigned not null,
	telefono varchar(11) default 'SinRegistro',
	telefono_otro varchar(11) default 'SinRegistro',
	lugar_nac varchar(50) default 'Sin Registro',
	fec_nac date,
	sexo tinyint(1) unsigned not null, 
	acta_num_part_nac int zerofill unique not null,
	acta_folio_num_part_nac int zerofill unique not null,
	/*TODO modificar a una sola cedula*/
	nacionalidad enum('v','e') not null,
	cedula varchar(8) unique,
	cedula_escolar varchar(10) unique,
	/*NUMERO DE HIJOS/AÑO DE NACIMIENTO/CEDULA REPRESENTANTE*/
	/*NACCCCCCCC*/
	cod_direccion int unsigned,
	plantel_procedencia varchar(50), 
	repitiente enum('s','n') not null, 
	cod_curso tinyint unsigned, 
	altura tinyint unsigned zerofill, 
	peso smallint(3) unsigned, camisa tinyint(1) unsigned, 
	pantalon tinyint(1) unsigned, 
	zapato tinyint(2) unsigned zerofill, 
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp,
	foreign key (sexo)
		references sexo(codigo)
		on update cascade
		on delete restrict,
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
	foreign key (cod_direccion)
		references direccion_alumno(codigo)
		on update cascade
		on delete restrict
);

INSERT INTO alumno
	(codigo, apellidos, nombres, 
	cod_representante, telefono, 
	telefono_otro, lugar_nac,
	fec_nac, sexo, acta_num_part_nac, 
	acta_folio_num_part_nac,
	cedula, direccion, plantel_procedencia, 
	repitiente, cod_curso, altura,
	peso, camisa, pantalon, zapato, 
	cod_usr_reg, cod_usr_mod)
	values
	(null, 'Gomez Sanches', 'Petra Juana', 2, '02124447788','04167771122',
	'Carabobo, hospital blabla', '1980-02-15', 1, 00043333, 1234555, '00000000',
	'avenida tal, calle el pito y la guacharaca, edificio blabla, piso blalbla apartamento blablablab',
	'escuela blablablalalala', 'n', null, null, null, 3, 3, 24, 1, 1),
	(null, 'Martinez Van Hellsing', 'Conchita Maria', 4, '02124447711','04165551122',
	'Caracas, la vega, blablb', '1989-11-02', 1, 000413, 1255, '35555444',
	'avenida x, calle el google.com, edificio xz',
	'escuela blablablalalala', 's', null, 130, 45, 3, 2, 16, 1, 1),
	(null, 'Gomez Gomez', 'Juan', 1, '02123334444','04129997788',
	'Caracas, algun sitio', '1992-12-01', 0, 98, 88774455, '19191991',
	'avenida hampa sadica, calle esconde el celular, edificio donde esta la policia, piso ayuda apartamento por favor',
	'escuela Que es salir a las 3am en el centro?', 'n', null, 169, 60, 4, 4, 29, 1, 1);