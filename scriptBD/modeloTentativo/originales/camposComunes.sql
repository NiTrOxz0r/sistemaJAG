p_nombre varchar(40) not null,
s_nombre varchar(40) default "Sin Registro",
p_apellido varchar(40) not null,
s_apellido varchar(40) default "Sin Registro",
nacionalidad enum('v','e') default 'v' not null,
cedula varchar(8) default "sinDatos" not null,
fec_nac date not null,
telefono varchar(11) default 'SinRegistro',
telefono_otro varchar(11) default 'SinRegistro',
sexo tinyint(1) unsigned not null,

	foreign key (sexo)
		references sexo(codigo)
		on update cascade
		on delete restrict
