CREATE TABLE discapacidad (
  codigo tinyint(3) unsigned primary key,
  descripcion varchar(30) not null,
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

INSERT INTO discapacidad
(codigo, descripcion, cod_usr_reg, cod_usr_mod, fec_mod)
values
(0,'No posee', 1, 1, current_timestamp),
(1,'Fisico-motora', 1, 1, current_timestamp),
(2,'Cognitiva o intelectual', 1, 1, current_timestamp),
(3,'Sensorial', 1, 1, current_timestamp),
(4,'Enfermedad organica', 1, 1, current_timestamp),
(5,'Multiple', 1, 1, current_timestamp)
;
