CREATE TABLE persona (
	codigo int unsigned auto_increment primary key,
	p_nombre varchar(40) not null,
	s_nombre varchar(40) default "Sin Registro",
	p_apellido varchar(40) not null,
	s_apellido varchar(40) default "Sin Registro",
	nacionalidad enum('v','e') default 'v' not null,
	cedula varchar(8) default "sinDatos" not null unique,
	fec_nac date not null,
	telefono varchar(11) default 'SinRegistro',
	telefono_otro varchar(11) default 'SinRegistro',
	sexo tinyint(1) unsigned not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int unsigned not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int unsigned not null,
	fec_mod timestamp not null DEFAULT 0,
	foreign key (sexo)
		references sexo(codigo)
		on update cascade
		on delete restrict
);
