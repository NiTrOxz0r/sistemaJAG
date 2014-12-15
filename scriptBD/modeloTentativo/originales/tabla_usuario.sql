CREATE TABLE usuario (
	codigo int unsigned auto_increment primary key,
	seudonimo varchar(20) not null unique,
	clave varchar(60) not null,
	cod_tipo_usr tinyint(1) unsigned default 1,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int unsigned not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int unsigned not null,
	fec_mod timestamp not null DEFAULT 0,
	foreign key (cod_tipo_usr)
		references tipo_usuario(codigo)
		on update cascade
		on delete restrict
);

INSERT INTO usuario
values
(1, 'neo', 'matrix', 4, 1, 1, null, 1, current_timestamp);
