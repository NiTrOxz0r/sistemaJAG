CREATE TABLE alumno (
  codigo int unsigned auto_increment primary key,
  cod_persona int unsigned not null,
  cedula_escolar varchar(10) unique not null,
  acta_num_part_nac varchar(20) COMMENT 'quite los unique porque no se como son las actas y folios.',
  acta_folio_num_part_nac varchar(20) COMMENT 'quite los unique porque no se como son las actas y folios.',
  lugar_nac varchar(50) not null default '-',
  plantel_procedencia varchar(50),
  repitiente enum('s','n') not null,
  cod_curso int unsigned not null,
  altura tinyint(3) unsigned zerofill not null COMMENT 'adaptado segun Prof Nelly en escuela',
  peso smallint(3) unsigned not null COMMENT 'adaptado segun Prof Nelly en escuela',
  camisa tinyint(1) unsigned not null COMMENT 'adaptado segun Prof Nelly en escuela',
  pantalon tinyint(1) unsigned not null COMMENT 'adaptado segun Prof Nelly en escuela',
  zapato tinyint(2) unsigned zerofill not null COMMENT 'adaptado segun Prof Nelly en escuela',
  cod_representante int unsigned not null,
  -- se elimino persona_retira: ver tabla obtiene
  certificado_vacuna enum ('s', 'n') not null,
  cod_discapacidad tinyint(3) unsigned not null default 0,
  comentarios varchar(500) not null default '-' COMMENT 'pedido por Prof. Nelly en escuela',
  canaima enum('s','n') not null default 's' COMMENT 'recurso canaima canaimitas',
  bicentenario enum('s','n') not null default 's' COMMENT 'coleccion bicentenario',
  partida_nac enum('s','n') not null default 's' COMMENT 'recaudo fisico',
  boleta enum('s','n') not null default 's' COMMENT 'recaudo fisico',
  constancia_nino_sano enum('s','n') not null default 's' COMMENT 'recaudo fisico',
  fotos_representante enum('s','n') not null default 's' COMMENT 'recaudo fisico',
  fotocopia_cedula_pa enum('s','n') not null default 's' COMMENT 'recaudo fisico personal autorizado',
  fotocopia_cedula_pr enum('s','n') not null default 's' COMMENT 'recaudo fisico persona que retira',
  status tinyint(1) unsigned not null default 1,
  cod_usr_reg int unsigned unsigned not null,
  fec_reg timestamp not null default current_timestamp,
  cod_usr_mod int unsigned unsigned not null,
  fec_mod timestamp not null DEFAULT 0,
  foreign key (cod_persona)
    references persona(codigo)
    on update cascade
    on delete cascade,
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
