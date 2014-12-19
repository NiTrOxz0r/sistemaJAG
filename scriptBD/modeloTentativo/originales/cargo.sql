CREATE table cargo(
  codigo tinyint(3) unsigned auto_increment primary key,
  descripcion varchar(50) not null,
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

INSERT INTO cargo values
  (1, 'Sin cargo asociado', 1, 1, null, 1, current_timestamp),
  (2, 'Director(a)', 1, 1, null, 1, current_timestamp),
  (3, 'Sub-Director(a)', 1, 1, null, 1, current_timestamp),
  (4, 'Coordinador(a)', 1, 1, null, 1, current_timestamp),
  (5, 'Asistente', 1, 1, null, 1, current_timestamp),
  (6, 'Docente', 1, 1, null, 1, current_timestamp),
  (7, 'Especialista', 1, 1, null, 1, current_timestamp),
  (8, 'Auxiliar', 1, 1, null, 1, current_timestamp)
;
