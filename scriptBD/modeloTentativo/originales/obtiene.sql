CREATE TABLE obtiene (
  codigo int unsigned auto_increment primary key,
  cod_p_a int unsigned not null COMMENT 'padres allegados',
  cod_alu int unsigned not null,
  puede_retirar enum('s','n') not null default 's' COMMENT 'movido de alumno por ser N a M',
  comentarios varchar(500) not null default '-' COMMENT 'pedido por Prof. Nelly en escuela',
  status tinyint(1) unsigned not null default 1,
  cod_usr_reg int unsigned not null,
  fec_reg timestamp not null default current_timestamp,
  cod_usr_mod int unsigned not null,
  fec_mod timestamp not null DEFAULT 0,
  foreign key (cod_alu)
    references alumno(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_p_a)
    references personal_autorizado(codigo)
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
COMMENT = 'relacion de padres, representantes, allegados y alumno';

INSERT INTO obtiene
values
  (1,1,1,1, 1, null,1,current_timestamp),
  (2,2,1,1, 1, null,1,current_timestamp),
  (3,3,1,1, 1, null,1,current_timestamp),
  (4,1,2,1, 1, null,1,current_timestamp),
  (5,2,2,1, 1, null,1,current_timestamp),
  (6,3,2,1, 1, null,1,current_timestamp)
;
