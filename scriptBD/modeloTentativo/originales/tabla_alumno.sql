CREATE TABLE alumno (
  codigo int unsigned auto_increment primary key,
  cod_persona int unsigned not null,
  cedula_escolar varchar(10) unique not null,
  -- quite los unique porque no se como son las actas y folios.
  acta_num_part_nac varchar(20),
  acta_folio_num_part_nac varchar(20),
  lugar_nac varchar(50) default 'Sin Registro',
  plantel_procedencia varchar(50),
  repitiente enum('s','n') not null,
  cod_curso int unsigned not null,
  altura tinyint(3) unsigned zerofill,
  peso smallint(3) unsigned,
  camisa tinyint(1) unsigned,
  pantalon tinyint(1) unsigned,
  zapato tinyint(2) unsigned zerofill,
  cod_representante int unsigned not null,
  cod_persona_retira int unsigned,
  certificado_vacuna enum ('s', 'n') not null,
  cod_discapacidad tinyint(3) unsigned not null default 0,
  status tinyint(1) unsigned not null default 1,
  cod_usr_reg int unsigned unsigned not null,
  fec_reg timestamp not null default current_timestamp,
  cod_usr_mod int unsigned unsigned not null,
  fec_mod timestamp not null DEFAULT 0,
  foreign key (cod_persona)
    references persona(codigo)
    on update cascade
    on delete restrict,
  foreign key (camisa)
    references talla(codigo)
    on update cascade
    on delete restrict,
  foreign key (pantalon)
    references talla(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_curso)
    references curso(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_representante)
    references personal_autorizado(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_persona_retira)
    references personal_autorizado(codigo)
    on update cascade
    on delete restrict,
  foreign key (cod_discapacidad)
    references discapacidad(codigo)
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
COLLATE utf8_general_ci;
