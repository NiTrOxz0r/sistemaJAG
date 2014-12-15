CREATE TABLE asume (
  codigo int unsigned auto_increment primary key,
  cod_docente int unsigned,
  cod_curso tinyint(3) unsigned not null,
  periodo_academico tinyint(3) unsigned not null,
  comentarios varchar(200) default 'Sin Comentarios',
  status tinyint(1) unsigned not null default 1,
  cod_usr_reg int unsigned not null,
  fec_reg timestamp not null default current_timestamp,
  cod_usr_mod int unsigned not null,
  fec_mod timestamp not null DEFAULT 0,
  foreign key (cod_docente)
    references personal(codigo)
    on update cascade
    on delete restrict,
  foreign key (periodo_academico)
    references periodo_academico(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_curso)
    references curso(codigo)
    on update cascade
    on delete restrict,
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
COMMENT = 'relacion de docente y alumno con cursos';

/*considerar: horas administrativas, tiempo de servicio, año de ingreso,
sumplente, asignacion especial?, capacidad tecnica especializada?, otros.*/

INSERT INTO asume
(codigo, cod_docente, cod_curso, periodo_academico,
  comentarios, status, cod_usr_reg,
  fec_reg, cod_usr_mod, fec_mod)
VALUES
  (NULL, '1', '34', '0', 'Sin curso asociado favor actualizar', '1', '1',CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '1', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '2', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '3', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '4', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '5', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '6', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '7', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '8', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '9', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '10', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '11', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '12', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '13', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '14', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '15', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '16', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '17', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '18', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '19', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '20', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '21', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '22', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '23', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '24', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '25', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '26', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '27', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '28', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '29', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '30', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '31', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '32', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP),
  (NULL, NULL, '33', '0', NULL, '1', '1', CURRENT_TIMESTAMP, '1', CURRENT_TIMESTAMP);
