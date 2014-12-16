CREATE TABLE personal (
  codigo int unsigned auto_increment primary key,
  cod_persona int unsigned not null,
  celular varchar(11) not null default "-",
  nivel_instruccion tinyint(1) unsigned not null,
  certificado_1 tinyint(3) unsigned not null default 1,
  descripcion_1 varchar(80) not null default "-",
  certificado_2 tinyint(3) unsigned not null default 1,
  descripcion_2 varchar(80) not null default "-",
  certificado_3 tinyint(3) unsigned not null default 1,
  descripcion_3 varchar(80) not null default "-",
  email varchar(50) unique not null,
  cod_usr int unsigned,
  cod_cargo tinyint unsigned not null default 1,
  tipo_personal tinyint(1) unsigned not null,
  status tinyint(1) unsigned not null default 1,
  cod_usr_reg int unsigned not null,
  fec_reg timestamp not null default current_timestamp,
  cod_usr_mod int unsigned not null,
  fec_mod timestamp not null DEFAULT 0,
  foreign key (cod_usr)
    references usuario(codigo)
    on update cascade
    on delete set null,
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
    on delete restrict,
  foreign key (cod_usr_reg)
    references usuario(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_usr_mod)
    references usuario(codigo)
    on update cascade
    on delete restrict,
  foreign key (certificado_1)
    references certificado(codigo)
    on update cascade
    on delete restrict,
  foreign key (certificado_2)
    references certificado(codigo)
    on update cascade
    on delete restrict,
  foreign key (certificado_3)
    references certificado(codigo)
    on update cascade
    on delete restrict
)
CHARACTER SET utf8
COLLATE utf8_general_ci;

/*considerar: horas administrativas, tiempo de servicio, año de ingreso,
sumplente, asignacion especial?, capacidad tecnica especializada?, otros.*/
