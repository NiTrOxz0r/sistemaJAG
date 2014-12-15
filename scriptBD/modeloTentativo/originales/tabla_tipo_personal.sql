CREATE TABLE tipo_personal (
	codigo tinyint(3) unsigned primary key,
	descripcion varchar(20) not null,
	status tinyint(1) unsigned not null default 1,
	cod_usr_reg int unsigned not null,
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int unsigned not null,
	fec_mod timestamp not null DEFAULT 0,
  foreign key (cod_usr_reg)
    references usuario(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_usr_mod)
    references usuario(codigo)
    on update cascade
    on delete restrict
)
CHARACTER SET utf8
COLLATE utf8_general_ci;

INSERT INTO tipo_personal
(codigo, descripcion, cod_usr_reg, cod_usr_mod, fec_mod)
values
(0,'Otro', 1, 1, current_timestamp),
(1,'Administrativo', 1, 1, current_timestamp),
(2,'Directivo', 1, 1, current_timestamp),
(3,'Docente', 1, 1, current_timestamp),
(4,'Pasante', 1, 1, current_timestamp)
;
