CREATE TABLE direccion_alumno(
	codigo int unsigned auto_increment primary key,
	cod_parroquia smallint unsigned default null,
	direccion_exacta varchar(150) default 'Sin Registro, favor Actualizar',
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp,
	foreign key (cod_parroquia)
		references parroquia(codigo)
		on update cascade
		on delete restrict
);

INSERT INTO direccion_alumno
values 
	(50, 1, 'la calle tal apartamento tal', 
		1, 1, null, 1, null)
;
CREATE TABLE direccion_p_a(
	codigo int unsigned auto_increment primary key,
	cod_parroquia smallint unsigned default null,
	direccion_exacta varchar(150) default 'Sin Registro, favor Actualizar',
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp,
	foreign key (cod_parroquia)
		references parroquia(codigo)
		on update cascade
		on delete restrict
);

INSERT INTO direccion_p_a
values 
	(1, 1, 'la calle tal apartamento tal', 
		1, 1, null, 1, null),
	(2, 1, 'la calle tal apartamento tal', 
	1, 1, null, 1, null),
	(3, 2, 'la calle tal apartamento tal', 
	1, 1, null, 1, null)
;

CREATE TABLE direccion_docente(
	codigo int unsigned auto_increment primary key,
	cod_parroquia smallint unsigned default null,
	direccion_exacta varchar(150) default 'Sin Registro, favor Actualizar',
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp,
	foreign key (cod_parroquia)
		references parroquia(codigo)
		on update cascade
		on delete restrict
);
CREATE TABLE direccion_directivo(
	codigo int unsigned auto_increment primary key,
	cod_parroquia smallint unsigned default null,
	direccion_exacta varchar(150) default 'Sin Registro, favor Actualizar',
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp,
	foreign key (cod_parroquia)
		references parroquia(codigo)
		on update cascade
		on delete restrict
);
CREATE TABLE direccion_administrativo(
	codigo int unsigned auto_increment primary key,
	cod_parroquia smallint unsigned default null,
	direccion_exacta varchar(150) default 'Sin Registro, favor Actualizar',
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp,
	foreign key (cod_parroquia)
		references parroquia(codigo)
		on update cascade
		on delete restrict
);