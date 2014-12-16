CREATE TABLE personal_autorizado (
  codigo int unsigned auto_increment primary key,
  cod_persona int unsigned not null,
  lugar_nac varchar(50) not null default '-',
  email varchar(50) unique not null,
  relacion tinyint unsigned not null,
  vive_con_alumno enum('s','n') not null,
  nivel_instruccion tinyint(1) unsigned not null,
  profesion tinyint(3) unsigned not null default 255,
  telefono_trabajo varchar(11) not null default '-',
  direccion_trabajo varchar(150) not null default '-',
  lugar_trabajo varchar(50) default not null '-',
  status tinyint(1) unsigned not null default 1,
  cod_usr_reg int unsigned not null,
  fec_reg timestamp not null default current_timestamp,
  cod_usr_mod int unsigned not null,
  fec_mod timestamp not null DEFAULT 0,
  foreign key (cod_persona)
    references persona(codigo)
    on update cascade
    on delete restrict,
  foreign key (relacion)
    references relacion(codigo)
    on update cascade
    on delete restrict,
  foreign key (nivel_instruccion)
    references nivel_instruccion(codigo)
    on update cascade
    on delete restrict,
  foreign key (profesion)
    references profesion(codigo)
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

INSERT INTO personal_autorizado (
  `codigo`, `p_apellido`, `s_apellido`,
  `p_nombre`, `s_nombre`,
  `nacionalidad`, `cedula`,
  `telefono`, `telefono_otro`,
  `email`, `lugar_nac`,
  `fec_nac`, `relacion`,
  `vive_con_alumno`, `cod_direccion`,
  `nivel_instruccion`, `profesion`,
  `telefono_trabajo`, `direccion_trabajo`,
  `lugar_trabajo`, `status`,
  `cod_usr_reg`, `fec_reg`,
  `cod_usr_mod`, `fec_mod`)
VALUES
  (
    1, 'Orellana', 'Martinez',
    'Manuel', 'Carreño',
    'v', '11998526',
    '04122561155', '02124761155',
    'otromas@hotmail.com', 'Caracas',
    '2014-11-04', 1,
    's', 1,
    '1', '255',
    '02124411555', 'The White House',
    'La Casa Blanca', '1',
    '1', CURRENT_TIMESTAMP,
    '1', CURRENT_TIMESTAMP),
  (
    2, 'Orellana', 'Perez',
    'Maria', 'Gustava',
    'v', '12345678',
    '04122561155', '02124761155',
    'cantv@esuna.mierda', 'Caracas',
    '2014-11-04', 2,
    's', 2,
    '1', '255',
    '02124411555', 'The White House',
    'La Casa Blanca', '1',
    '1', CURRENT_TIMESTAMP,
    '1', CURRENT_TIMESTAMP),
  (
    3, 'Bustamante', 'Perez',
    'Luisa', 'Josefina',
    'v', '87654321',
    '04122561155', '02124761155',
    'cantv@esuna.mierda', 'Caracas',
    '2014-11-04', 3,
    's', 3,
    '1', '255',
    '02124411555', 'The White House',
    'La Casa Blanca', '1',
    '1', CURRENT_TIMESTAMP,
    '1', CURRENT_TIMESTAMP)
;

/*problema: mantener historial de registros.

solucion 1: quitar el valor unique de los campos para
que la tabla permita valores repetidos.
problema: validacion en codigo, posible redundancia, no se.

solucion 2: hacer tabla de historial donde se copie
la informacion almacenada antes de actualizar.
problema: muchos registros, posible redundancia, no se.

solucion 3: no hacer nada.
problema: no es una solucion.
*/

/*esta tabla es utilizada en el modulo como solucion:*/
CREATE TABLE personal_autorizado (
  codigo int unsigned auto_increment primary key,
  cod_persona int unsigned not null,
  lugar_nac varchar(50) default 'Sin Registro',
  email varchar(50) default 'Sin Registro',
  relacion tinyint unsigned not null,
  vive_con_alumno enum('s','n') not null,
  nivel_instruccion tinyint(1) unsigned not null,
  profesion tinyint(3) unsigned default 255,
  telefono_trabajo varchar(11) default 'SinRegistro',
  direccion_trabajo varchar(150) default 'Sin registro',
  lugar_trabajo varchar(50) default 'Sin registro',
  status tinyint(1) unsigned not null default 1,
  cod_usr_reg int not null,
  fec_reg timestamp not null default current_timestamp,
  cod_usr_mod int not null,
  fec_mod timestamp not null;
