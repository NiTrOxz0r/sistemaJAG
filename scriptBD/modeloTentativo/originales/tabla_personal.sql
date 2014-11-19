CREATE TABLE personal (
	codigo int unsigned auto_increment primary key,
	cod_persona int unsigned not null,
	celular varchar(11) default "SinRegistro",
	nivel_instruccion tinyint(1) unsigned not null,
	-- PARA ACTUALIZAR TITULO
	titulo varchar(80) default "Sin Registros",
	email varchar(50) unique default "Sin Registro",
	cod_usr int unsigned,
	cod_cargo tinyint unsigned not null default 1,
	tipo_personal tinyint(1) unsigned not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null DEFAULT 0,
	foreign key (cod_usr)
		references usuario(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_persona)
		references persona(codigo)
		on update cascade
		on delete restrict,
	foreign key (nivel_instruccion)
		references nivel_instruccion(codigo)
		on update cascade
		on delete restrict,
	foreign key (tipo_personal)
		references tipo_personal(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_cargo)
		references cargo(codigo)
		on update cascade
		on delete restrict
);

/*considerar: horas administrativas, tiempo de servicio, año de ingreso,
sumplente, asignacion especial?, capacidad tecnica especializada?, otros.*/
