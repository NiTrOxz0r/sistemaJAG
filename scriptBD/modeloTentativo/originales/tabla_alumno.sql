CREATE TABLE alumno (
	codigo int unsigned auto_increment primary key,
	cod_persona int unsigned not null,
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
	cod_discapacidad tinyint(3) not null default 0,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int unsigned not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int unsigned not null,
	fec_mod timestamp not null,
	foreign key (cod_persona)
		references persona(codigo)
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
	foreign key (cod_persona_retira)
		references personal_autorizado(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_discapacidad)
		references discapacidad(codigo)
		on update cascade
		on delete restrict
);
