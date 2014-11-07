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
CREATE TABLE direccion_p_a(
	codigo int unsigned auto_increment primary key,
	cod_parroquia smallint unsigned default null,
	direccion_exacta varchar(150) unique default null,
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