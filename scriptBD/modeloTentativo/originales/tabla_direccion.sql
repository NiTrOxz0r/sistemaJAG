CREATE TABLE direccion(
	codigo int unsigned auto_increment primary key,
	cod_persona int unsigned not null,
	cod_parroquia smallint unsigned default null,
	direccion_exacta varchar(150) default 'Sin Registro, favor Actualizar',
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null,
	foreign key (cod_parroquia)
		references parroquia(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_persona)
		references persona(codigo)
		on update cascade
		on delete restrict
);
