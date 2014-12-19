CREATE TABLE certificado (
  codigo tinyint(3) unsigned primary key,
  descripcion varchar(30) not null COMMENT 'a espera de mas datos',
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
COLLATE utf8_general_ci
COMMENT = 'titulos o certificados de personal';

insert into certificado values
  (1, '-', 1, 1, current_timestamp, 1, current_timestamp),
  (2, 'Taller', 1, 1, current_timestamp, 1, current_timestamp),
  (3, 'Curso', 1, 1, current_timestamp, 1, current_timestamp),
  (4, 'Capacitacion', 1, 1, current_timestamp, 1, current_timestamp),
  (5, 'Diplomado', 1, 1, current_timestamp, 1, current_timestamp),
  (6, 'Especializacion', 1, 1, current_timestamp, 1, current_timestamp),
  (7, 'Maestria', 1, 1, current_timestamp, 1, current_timestamp),
  (8, 'Doctorado', 1, 1, current_timestamp, 1, current_timestamp),
  (9, 'Otro', 1, 1, current_timestamp, 1, current_timestamp)
;
