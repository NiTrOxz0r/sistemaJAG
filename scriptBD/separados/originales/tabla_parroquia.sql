CREATE table parroquia (
	codigo smallint unsigned auto_increment primary key,
	cod_mun smallint unsigned,
	descripcion varchar(100) not null,
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp,
	foreign key (cod_mun)
		references municipio(codigo)
		on update cascade
		on delete restrict
);

INSERT INTO parroquia
	(codigo, cod_mun, descripcion, cod_usr_reg, cod_usr_mod)
	values
/*DISTRITO CAPITAL*/
	/*Libertador*/
	(1, 1, 'Altagracia'				, 1, 1),
	(2, 1, 'Antimano'					, 1, 1),
	(3, 1, 'Caricuao'					, 1, 1),
	(4, 1, 'Catedral'					, 1, 1),
	(5, 1, 'Coche'						, 1, 1),
	(6, 1, 'El Junquito'			, 1, 1),
	(7, 1, 'El paraiso'				, 1, 1),
	(8, 1, 'El Recreo'				, 1, 1),
	(9, 1, 'El Valle'					, 1, 1),
	(10, 1, 'La Candelaria'		, 1, 1),
	(11, 1, 'La Pastora'			, 1, 1),
	(12, 1, 'La Vega'					, 1, 1),
	(13, 1, 'Macarao'					, 1, 1),
	(14, 1, 'San Agustin'			, 1, 1),
	(15, 1, 'San Bernardino'	, 1, 1),
	(16, 1, 'San Jose'				, 1, 1),
	(17, 1, 'San Juan'				, 1, 1),
	(18, 1, 'Santa Rosalia'		, 1, 1),
	(19, 1, 'Santa Teresa'		, 1, 1),
	(20, 1, 'Sucre'						, 1, 1),
	(21, 1, '23 de enero'			, 1, 1),
	(22, 1, 'San Pedro'				, 1, 1),
	/*Baruta*/
	(23, 2, 'El Cafetal', 1, 1),
	(24, 2, 'Las minas de Baruta', 1, 1),
	(25, 2, 'Nuestra Senora del Rosario', 1, 1),
	/*chacao*/
	(26, 3, 'Chacao', 1, 1),
	/*Sucre*/
	(27, 4, 'Petare', 1, 1),
	(28, 4, 'Leoncio Martinez', 1, 1),
	(29, 4, 'La Dolorita', 1, 1),
	(30, 4, 'Caucaguita', 1, 1),
	(31, 4, 'Filas de Mariche', 1, 1),
	/*el Hatillo*/
	(215, 5, 'El Hatillo', 1, 1),
/*MIRANDA*/
	/*Acevedo*/
	(32, 6, 'Araguita', 1, 1),
	(33, 6, 'Arevalo Gonzalez', 1, 1),
	(34, 6, 'Capaya', 1, 1),
	(35, 6, 'Caucagua', 1, 1),
	(36, 6, 'El Cafe', 1, 1),
	(37, 6, 'Marizapa', 1, 1),
	(38, 6, 'Panaquire', 1, 1),
	(39, 6, 'Ribas', 1, 1),
	/*Andres bello*/
	(40, 7, 'Cumbo', 1, 1),
	(41, 7, 'San Jose Barlovento', 1, 1),
	/*Brion*/
	(42, 8, 'Curiepe', 1, 1),
	(43, 8, 'Higuerote', 1, 1),
	(44, 8, 'Tacarigua', 1, 1),
	/*Burzoz*/
	(45, 9, 'Mamporal', 1, 1),
	/*Carrizal*/
	(46, 10, 'Carrizal', 1, 1),
	/*Cristobal Rojas*/
	(47, 11, 'Charallave', 1, 1),
	(48, 11, 'Las Brisas', 1, 1),
	/*Guacaipuro*/
	(49, 12, 'Altagracia de la M', 1, 1),
	(50, 12, 'Cecilio Acosta', 1, 1),
	(51, 12, 'El Jarillo', 1, 1),
	(52, 12, 'Los Teques', 1, 1),
	(53, 12, 'Paracotos', 1, 1),
	(54, 12, 'San Pedro', 1, 1),
	(55, 12, 'Tacata', 1, 1),
	/*Independencia*/
	(56, 13, 'El Cartanal', 1, 1),
	(57, 13, 'Sta Teresa del Tuy', 1, 1),
	/*Lander*/
	(58, 14, 'La Democracia', 1, 1),
	(59, 14, 'Ocumare del Tuy', 1, 1),
	(60, 14, 'Santa Barbara', 1, 1),
	/*Los Salias*/
	(61, 15, 'San Antonio de los altos', 1, 1),
	/*Paez*/
	(62, 16, 'El Guapo', 1, 1),
	(63, 16, 'Paparo', 1, 1),
	(64, 16, 'Tacarigua de la laguna', 1, 1),
	(65, 16, 'Rio Chico', 1, 1),
	(66, 16, 'San Fernardo del Guapo', 1, 1),
	/*Paz Castillo*/
	(67, 17, 'Santa Lucia', 1, 1),
	/*Pedro Gual*/
	(68, 18, 'Cupira', 1, 1),
	(69, 18, 'Machurucuto', 1, 1),
	/*Plaza*/
	(70, 19, 'Guarenas', 1, 1),
	/*Simon Bolivar*/
	(71, 20, 'San Francisco de Yare', 1, 1),
	(72, 20, 'San Antonio de Yare', 1, 1),
	/*Urdaneta*/
	(73, 21, 'Cua', 1, 1),
	(74, 21, 'Nueva Cua', 1, 1),
	/*Zamora*/
	(75, 22, 'Bolivar', 1, 1),
	(76, 22, 'Guatire', 1, 1),
/*VARGAS*/
	/*Vargas*/
	(77, 23, 'Caraballeda', 1, 1),
	(78, 23, 'Carayaca', 1, 1),
	(79, 23, 'Carlos Soublette', 1, 1),
	(80, 23, 'Caruao', 1, 1),
	(81, 23, 'Catia la mar', 1, 1),
	(82, 23, 'El Junko', 1, 1),
	(83, 23, 'La Guaira', 1, 1),
	(84, 23, 'Macuto', 1, 1),
	(85, 23, 'Maiquetia', 1, 1),
	(86, 23, 'Naiguata', 1, 1),
	(87, 23, 'Urimare', 1, 1),
/*GUARICO*/
	/*Camaguan*/
	(88, 24, 'Camaguan', 1, 1),
	(89, 24, 'Puerto Miranda', 1, 1),
	(90, 24, 'Uverito', 1, 1),
	/*Chaguaramas*/
	(91, 25, 'Chaguaramas', 1, 1),
	/*El socorro*/
	(92, 26, 'El Socorro', 1, 1),
	/*Francisco de Miranda*/
	(93, 27, 'Calabozo', 1, 1),
	(94, 27, 'El Calvario', 1, 1),
	(95, 27, 'El rastro', 1, 1),
	(96, 27, 'Guardatinajas', 1, 1),
	/*Jose Felix Ribas*/
	(97, 28, 'San Rafael de Laya', 1, 1),
	(98, 28, 'Tucupido', 1, 1),
	/*San Tadeo de Monagas*/
	(99, 29, 'Altagracia de Orituco', 1, 1),
	(100, 29, 'Lezama', 1, 1),
	(101, 29, 'Libertad de Orituco', 1, 1),
	(102, 29, 'Paso real de Macaira', 1, 1),
	(103, 29, 'San Fco de Macaira', 1, 1),
	(104, 29, 'San Rafael de Orituco', 1, 1),
	(105, 29, 'Soublette', 1, 1),
	/*Juan German Rocio*/
	(106, 30, 'Cantagallo', 1, 1),
	(107, 30, 'Parapara', 1, 1),
	(108, 30, 'San Juan de los Morros', 1, 1),
	/*Julian Mellado*/
	(109, 31, 'El Sombrero', 1, 1),
	(110, 31, 'Sosa', 1, 1),
	/*Las Mercedes del Llano*/
	(111, 32, 'Cabruta', 1, 1),
	(112, 32, 'Las Mercedes', 1, 1),
	(113, 32, 'Santa Rita de Manapire', 1, 1),
	/*Leonardo Infante*/
	(114, 33, 'Espino', 1, 1),
	(115, 33, 'Valle de la Pascua', 1, 1),
	/*Ortiz*/
	(116, 34, 'Ortiz', 1, 1),
	(117, 34, 'Sn Fco de Tiznados', 1, 1),
	(118, 34, 'San Jose de Tiznados', 1, 1),
	(119, 34, 'Sn Lorenzo de tiznados', 1, 1),
	/*pedro Zaraza*/
	(120, 35, 'San Jose de Unare', 1, 1),
	(121, 35, 'Zaraza', 1, 1),
	/*San Geronimo de Guayabal*/
	(122, 36, 'Cazorla', 1, 1),
	(123, 36, 'Guayabal', 1, 1),
	/*San Jose de Guaribe*/
	(124, 37, 'San Jose de Guaribe', 1, 1),
	/*Santa Maria de Ipire*/
	(125, 38, 'Altamira', 1, 1),
	(126, 38, 'Santa Maria de Ipire', 1, 1),
/*ARAGUA*/
	/*Bolivar*/
	(127, 39, 'San Mateo', 1, 1),
	/*Camatagua*/
	(128, 41, 'Carmen de Cura', 1, 1),
	(129, 41, 'Camatagua', 1, 1),
	/*Francisco Linares*/
	(130, 42, 'Santa Rita', 1, 1),
	(131, 42, 'Francisco de Miranda', 1, 1),
	(132, 42, 'Mons Feliciano', 1, 1),
	/*Girardot*/
	(133, 43, 'Andres Eloy Blanco', 1, 1),
	(134, 43, 'Choroni', 1, 1),
	(135, 43, 'Joaquin Crespo', 1, 1),
	(136, 43, 'Jose Casanova Godoy', 1, 1),
	(137, 43, 'Las Delicias', 1, 1),
	(138, 43, 'Los Tacariguas', 1, 1),
	(139, 43, 'Madre Ma de San Jose', 1, 1),
	(140, 43, 'Pedro Jose Ovalies', 1, 1),
	/*Jose ANgel Lamas*/
	(141, 44, 'Santa Cruz', 1, 1),
	/*Jose Felix Ribas*/
	(142, 45, 'Castor Nieves Rios', 1, 1),
	(143, 45, 'La Victoria', 1, 1),
	(144, 45, 'Las Guacamayas', 1, 1),
	(145, 45, 'Pao de Zarate', 1, 1),
	(146, 45, 'Zuata', 1, 1),
	/*Jose Rafael Revenga*/
	(147, 46, 'El Consejo', 1, 1),
	/*Libertador*/
	(148, 47, 'Palo Negro', 1, 1),
	(149, 47, 'Martin de Porres', 1, 1),
	/*Mario Iragorry*/
	(150, 48, 'Ca de Azucar', 1, 1),
	(151, 48, 'El Limon', 1, 1),
	/*Ocumare de la costa*/
	(152, 49, 'Ocumare de la costa', 1, 1),
	/*San Casimiro*/
	(153, 50, 'San Casimiro', 1, 1),
	(154, 50, 'Guiripa', 1, 1),
	(155, 50, 'Ollas de Caramacate', 1, 1),
	(156, 50, 'Valle Morin', 1, 1),
	/*San Sebastian*/
	(157, 51, 'San Sebastian', 1, 1),
	/*Santiago Marino*/
	(158, 52, 'Alfredo Pacheco', 1, 1),
	(159, 52, 'Arevalo Aponte', 1, 1),
	(160, 52, 'Chuao', 1, 1),
	(161, 52, 'Turumero', 1, 1),
	(162, 52, 'Saman de Guere', 1, 1),
	/*Santos Michelena*/
	(163, 53, 'Las Tejerias', 1, 1),
	(164, 53, 'Tiara', 1, 1),
	/*Sucre*/
	(165, 54, 'Bella Vista', 1, 1),
	(166, 54, 'Cagua', 1, 1),
	/*tovar*/
	(167, 55, 'Colonia Tovar', 1, 1),
	/*Urdaneta*/
	(168, 56, 'Barbacoas', 1, 1),
	(169, 56, 'Las Penitas', 1, 1),
	(170, 56, 'San Francisco de Cara', 1, 1),
	(171, 56, 'Taguay', 1, 1),
	/*Zamora*/
	(172, 57, 'Augusto Mijares', 1, 1),
	(173, 57, 'Villa de cura', 1, 1),
	(174, 57, 'Magdaleno', 1, 1),
	(175, 57, 'Sam Francisco de Asis', 1, 1),
	(176, 57, 'Valles de Tucutunemo', 1, 1),
/*CARABOBO*/
	/*Bejuma*/
	(177, 58, 'Bejuma', 1, 1),
	(178, 58, 'Canoabo', 1, 1),
	(179, 58, 'Simon Bolivar', 1, 1),
	/*Carlos Arevalo*/
	(180, 59, 'Belen', 1, 1),
	(181, 59, 'Guigue', 1, 1),
	(182, 59, 'Tacarigua', 1, 1),
	/*Diego Ibarra*/
	(183, 60, 'Agua Caliente', 1, 1),
	(184, 60, 'Mariara', 1, 1),
	/*Guacara*/
	(185, 61, 'Ciudad Alianza', 1, 1),
	(186, 61, 'Guacara', 1, 1),
	(187, 61, 'Yagua', 1, 1),
	/*Juan Jose Mora*/
	(188, 62, 'Moron', 1, 1),
	(189, 62, 'Urama', 1, 1),
	/*Libertador*/
	(190, 63, 'Independencia', 1, 1),
	(191, 63, 'Tocuyito', 1, 1),
	/*Los Guayos*/
	(192, 64, 'Los Guayos', 1, 1),
	/*Miranda*/
	(193, 65, 'Miranda', 1, 1),
	/*Montalban*/
	(194, 66, 'Montalban', 1, 1),
	/*Naguanagua*/
	(195, 67, 'Naguanagua', 1, 1),
	/*Puerto Cabello*/
	(196, 68, 'Bartolome Salom', 1, 1),
	(197, 68, 'Borburata', 1, 1),
	(198, 68, 'Democracia', 1, 1),
	(199, 68, 'Fraternidad', 1, 1),
	(200, 68, 'Goaigoaza', 1, 1),
	(201, 68, 'Juan Jose Flores', 1, 1),
	(202, 68, 'Patanemo', 1, 1),
	(203, 68, 'Union', 1, 1),
	/*San Diego*/
	(204, 69, 'San Diego', 1, 1),
	/*San Joaquin*/
	(205, 70, 'San Joaquin', 1, 1),
	/*Valencia*/
	(206, 71, 'Candelaria', 1, 1),
	(207, 71, 'Catedral', 1, 1),
	(208, 71, 'El Socorro', 1, 1),
	(209, 71, 'Miguel Pena', 1, 1),
	(210, 71, 'Negro Primero', 1, 1),
	(211, 71, 'Rafael Urdaneta', 1, 1),
	(212, 71, 'San Bias', 1, 1),
	(213, 71, 'San Jose', 1, 1),
	(214, 71, 'Santa Rosa', 1, 1),
/*EL RESTO*/
	(216, 72, 'Anzoategui', 1, 1),
	(217, 73, 'Amazonas', 1, 1),
	(218, 74, 'Apure', 1, 1),
	(219, 75, 'Barinas', 1, 1),
	(220, 76, 'Bolivar', 1, 1),
	(221, 77, 'Cojedes', 1, 1),
	(222, 78, 'Delta Amacuro', 1, 1),
	(223, 79, 'Falcon', 1, 1),
	(224, 80, 'Lara', 1, 1),
	(225, 81, 'Merida', 1, 1),
	(226, 82, 'Monagas', 1, 1),
	(227, 83, 'Nueva Esparta', 1, 1),
	(228, 84, 'Portuguesa', 1, 1),
	(229, 85, 'Sucre', 1, 1),
	(230, 86, 'Tachira', 1, 1),
	(231, 87, 'Trujillo', 1, 1),
	(232, 88, 'Yaracuy', 1, 1),
	(233, 89, 'Zulia', 1, 1);
	
select 
	a.codigo, a.descripcion, b.descripcion, c.descripcion
from parroquia as a
	inner join municipio as b
		on cod_mun = b.codigo
	inner join estado as c
		on cod_edo = c.codigo
	where cod_edo = 1;