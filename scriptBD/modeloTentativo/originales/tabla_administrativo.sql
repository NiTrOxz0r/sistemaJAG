CREATE TABLE administrativo (
	codigo int unsigned auto_increment primary key,
	p_nombre varchar(20) not null,
	s_nombre varchar(20) default "Sin Registro",
	p_apellido varchar(20) not null,
	s_apellido varchar(20) default "Sin Registro",
	nacionalidad enum('v','e') default 'v' not null,
	cedula varchar(8) default "sinDatos" not null,
	celular varchar(11) default "SinRegistro",
	telefono varchar(11) default 'SinRegistro',
	telefono_otro varchar(11) default 'SinRegistro',
	nivel_instruccion tinyint(1) unsigned not null,
	-- PARA ACTUALIZAR TITULO
	titulo varchar(80) default "Sin Registros",
	fec_nac date not null,
	sexo tinyint(1) unsigned not null,
	email varchar(50) unique default	"Sin Registro",
	cod_direccion int unsigned not null,
	cod_usr int unsigned not null,
	cod_cargo tinyint unsigned not null default 1,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null,
	fec_mod timestamp not null default current_timestamp,
	foreign key (cod_usr)
		references usuario(codigo)
		on update cascade
		on delete restrict,
	foreign key (nivel_instruccion)
		references nivel_instruccion(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_cargo)
		references cargo(codigo)
		on update cascade
		on delete restrict,
	foreign key (sexo)
		references sexo(codigo)
		on update cascade
		on delete restrict,
	foreign key (cod_direccion)
		references direccion_administrativo(codigo)
		on update cascade
		on delete restrict
);

/*considerar: horas administrativas, tiempo de servicio, año de ingreso,
sumplente, asignacion especial?, capacidad tecnica especializada?, otros.*/