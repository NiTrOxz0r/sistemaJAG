CREATE table municipio (
	codigo smallint unsigned auto_increment primary key,
	cod_edo tinyint(2) unsigned,
	descripcion varchar(100) not null,
	status tinyint(1) unsigned not null default 1, 
	cod_usr_reg int not null, 
	fec_reg timestamp not null default current_timestamp,
	cod_usr_mod int not null, 
	fec_mod timestamp not null default current_timestamp,
	foreign key (cod_edo)
		references estado(codigo)
		on update cascade
		on delete restrict
);

INSERT INTO `municipio` (codigo, cod_edo, descripcion, status, cod_usr_reg, `fec_reg`, `cod_usr_mod`, `fec_mod`) VALUES
(1, 1, 'Libertador', 1, 1, null, 1, null),
(2, 15, 'Baruta', 1, 1, null, 1, null),
(3, 15, 'Chacao', 1, 1, null, 1, null),
(4, 15, 'Sucre', 1, 1, null, 1, null),
(5, 15, 'El Hatillo', 1, 1, null, 1, null),
(6, 15, 'Acevedo', 1, 1, null, 1, null),
(7, 15, 'Andres Bello', 1, 1, null, 1, null),
(8, 15, 'Brion', 1, 1, null, 1, null),
(9, 15, 'Buroz', 1, 1, null, 1, null),
(10, 15, 'Carrizal', 1, 1, null, 1, null),
(11, 15, 'Cristobal Rojas', 1, 1, null, 1, null),
(12, 15, 'Guacaipuro', 1, 1, null, 1, null),
(13, 15, 'Independencia', 1, 1, null, 1, null),
(14, 15, 'Lander', 1, 1, null, 1, null),
(15, 15, 'Los Salias', 1, 1, null, 1, null),
(16, 15, 'Paez', 1, 1, null, 1, null),
(17, 15, 'Paz Castillo', 1, 1, null, 1, null),
(18, 15, 'Pedro Gual', 1, 1, null, 1, null),
(19, 15, 'Plaza', 1, 1, null, 1, null),
(20, 15, 'Simon Bolivar', 1, 1, null, 1, null),
(21, 15, 'Urdaneta', 1, 1, null, 1, null),
(22, 15, 'Zamora', 1, 1, null, 1, null),
(23, 23, 'Vargas', 1, 1, null, 1, null),
(24, 12, 'Camaguan', 1, 1, null, 1, null),
(25, 12, 'Chaguaramas', 1, 1, null, 1, null),
(26, 12, 'El Socorro', 1, 1, null, 1, null),
(27, 12, 'Francisco de Miranda', 1, 1, null, 1, null),
(28, 12, 'Jose Felix Ribas', 1, 1, null, 1, null),
(29, 12, 'Jose Tadeo Monagas', 1, 1, null, 1, null),
(30, 12, 'Juan German Roscio', 1, 1, null, 1, null),
(31, 12, 'Julian Mellado', 1, 1, null, 1, null),
(32, 12, 'Las Mercedes del Llano', 1, 1, null, 1, null),
(33, 12, 'Leonardo Infante', 1, 1, null, 1, null),
(34, 12, 'Ortiz', 1, 1, null, 1, null),
(35, 12, 'Pedro Zaraza', 1, 1, null, 1, null),
(36, 12, 'San Geronimo de Guayabal', 1, 1, null, 1, null),
(37, 12, 'San Jose de Guaribe', 1, 1, null, 1, null),
(38, 12, 'Santa Maria de Ipire', 1, 1, null, 1, null),
(39, 5, 'Bolivar', 1, 1, null, 1, null),
(41, 5, 'Camatagua', 1, 1, null, 1, null),
(42, 5, 'Francisco Linares', 1, 1, null, 1, null),
(43, 5, 'Giradot', 1, 1, null, 1, null),
(44, 5, 'Jose Angel Lamas', 1, 1, null, 1, null),
(45, 5, 'Jose Felix Ribas', 1, 1, null, 1, null),
(46, 5, 'Jose Revenga', 1, 1, null, 1, null),
(47, 5, 'Libertador', 1, 1, null, 1, null),
(48, 5, 'Mario Iragorry', 1, 1, null, 1, null),
(49, 5, 'Ocumare de la costa', 1, 1, null, 1, null),
(50, 5, 'San Casimiro', 1, 1, null, 1, null),
(51, 5, 'San Sebastian', 1, 1, null, 1, null),
(52, 5, 'Santiago Mariño', 1, 1, null, 1, null),
(53, 5, 'Santos Michelena', 1, 1, null, 1, null),
(54, 5, 'Sucre', 1, 1, null, 1, null),
(55, 5, 'Tovar', 1, 1, null, 1, null),
(56, 5, 'Urdaneta', 1, 1, null, 1, null),
(57, 5, 'Zamora', 1, 1, null, 1, null),
(58, 8, 'Bejuma', 1, 1, null, 1, null),
(59, 8, 'Carlos Arevalo', 1, 1, null, 1, null),
(60, 8, 'Diego Ibarra', 1, 1, null, 1, null),
(61, 8, 'Guacara', 1, 1, null, 1, null),
(62, 8, 'Juan Jose Mora', 1, 1, null, 1, null),
(63, 8, 'Libertador', 1, 1, null, 1, null),
(64, 8, 'Los Guayos', 1, 1, null, 1, null),
(65, 8, 'Miranda', 1, 1, null, 1, null),
(66, 8, 'Montalban', 1, 1, null, 1, null),
(67, 8, 'Naguanagua', 1, 1, null, 1, null),
(68, 8, 'Puerto Cabello', 1, 1, null, 1, null),
(69, 8, 'San Diego', 1, 1, null, 1, null),
(70, 8, 'San Joaquin', 1, 1, null, 1, null),
(71, 8, 'Valencia', 1, 1, null, 1, null),
(72, 2, 'Anaco', 1, 1, null, 1, null),
(73, 2, 'Aragua', 1, 1, null, 1, null),
(74, 2, 'Bolivar', 1, 1, null, 1, null),
(75, 2, 'Bruzual', 1, 1, null, 1, null),
(76, 2, 'Cajigal', 1, 1, null, 1, null),
(77, 2, 'Carvajal', 1, 1, null, 1, null),
(78, 2, 'Diego Bautista Urbaneja', 1, 1, null, 1, null),
(79, 2, 'Freites', 1, 1, null, 1, null),
(80, 2, 'Guanipa', 1, 1, null, 1, null),
(81, 2, 'Guanta', 1, 1, null, 1, null),
(82, 2, 'Independencia', 1, 1, null, 1, null),
(83, 2, 'Libertad', 1, 1, null, 1, null),
(84, 2, 'Mcgregor', 1, 1, null, 1, null),
(85, 2, 'Miranda', 1, 1, null, 1, null),
(86, 2, 'Monagas', 1, 1, null, 1, null),
(87, 2, 'Peñalver', 1, 1, null, 1, null),
(88, 2, 'Piritu', 1, 1, null, 1, null),
(89, 2, 'San Juan de Capistrano', 1, 1, null, 1, null),
(90, 2, 'Santa Ana', 1, 1, null, 1, null),
(91, 2, 'Simón Rodriguez', 1, 1, null, 1, null),
(92, 2, 'Sotillo', 1, 1, null, 1, null),
(93, 3, 'Alto Orinoco', 1, 1, null, 1, null),
(94, 3, 'Atabapo', 1, 1, null, 1, null),
(95, 3, 'Atures', 1, 1, null, 1, null),
(96, 3, 'Autana', 1, 1, null, 1, null),
(97, 3, 'Manapiare', 1, 1, null, 1, null),
(98, 3, 'Maroa', 1, 1, null, 1, null),
(99, 3, 'Rio Negro', 1, 1, null, 1, null),
(100, 4, 'Achaguas', 1, 1, null, 1, null),
(101, 4, 'Biruaca', 1, 1, null, 1, null),
(102, 4, 'Muños', 1, 1, null, 1, null),
(103, 4, 'Paez', 1, 1, null, 1, null),
(104, 4, 'Pedro Camejo', 1, 1, null, 1, null),
(105, 4, 'Romulo Gallegos', 1, 1, null, 1, null),
(106, 4, 'San Fernando', 1, 1, null, 1, null),
(107, 6, 'Alberto Arvelo Torrealba', 1, 1, null, 1, null),
(108, 6, 'Andrés Eloy Blanco', 1, 1, null, 1, null),
(109, 6, 'Antonio José de Sucre', 1, 1, null, 1, null),
(110, 6, 'Arismendi', 1, 1, null, 1, null),
(111, 6, 'Barinas', 1, 1, null, 1, null),
(112, 6, 'Bolívar', 1, 1, null, 1, null),
(113, 6, 'Cruz Paredes', 1, 1, null, 1, null),
(114, 6, 'Ezequiel Zamora', 1, 1, null, 1, null),
(115, 6, 'Obispos', 1, 1, null, 1, null),
(116, 6, 'Pedraza', 1, 1, null, 1, null),
(117, 6, 'Rojas', 1, 1, null, 1, null),
(118, 6, 'Sosa', 1, 1, null, 1, null),
(119, 7, 'Caroní', 1, 1, null, 1, null),
(120, 7, 'Cedeño', 1, 1, null, 1, null),
(121, 7, 'El Callao', 1, 1, null, 1, null),
(122, 7, 'Gran Sabana', 1, 1, null, 1, null),
(123, 7, 'Heres', 1, 1, null, 1, null),
(124, 7, 'Piar', 1, 1, null, 1, null),
(125, 7, 'Raul Leoni', 1, 1, null, 1, null),
(126, 7, 'Roscio', 1, 1, null, 1, null),
(127, 7, 'Sifontes', 1, 1, null, 1, null),
(128, 7, 'Sucre', 1, 1, null, 1, null),
(129, 7, 'Padre Pedro Chen', 1, 1, null, 1, null),
(130, 9, 'Anzoategui', 1, 1, null, 1, null),
(131, 9, 'Falcon', 1, 1, null, 1, null),
(132, 9, 'Giraldot', 1, 1, null, 1, null),
(133, 9, 'Lima Blanco', 1, 1, null, 1, null),
(134, 9, 'Pao de San Juan Bautista', 1, 1, null, 1, null),
(135, 9, 'Ricaurte', 1, 1, null, 1, null),
(136, 9, 'Rómulo Gallegos', 1, 1, null, 1, null),
(137, 9, 'San Carlos', 1, 1, null, 1, null),
(138, 9, 'Tinaco', 1, 1, null, 1, null),
(139, 10, 'Antonio Díaz', 1, 1, null, 1, null),
(140, 10, 'Casacoima', 1, 1, null, 1, null),
(141, 10, 'Pedernales', 1, 1, null, 1, null),
(142, 10, 'Tucupita', 1, 1, null, 1, null),
(143, 11, 'Acosta', 1, 1, null, 1, null),
(144, 11, 'Bolívar', 1, 1, null, 1, null),
(145, 11, 'Buchivacoa', 1, 1, null, 1, null),
(146, 11, 'Cacique Manaure', 1, 1, null, 1, null),
(147, 11, 'Carirubana', 1, 1, null, 1, null),
(148, 11, 'Colina', 1, 1, null, 1, null),
(149, 11, 'Dabajuro', 1, 1, null, 1, null),
(150, 11, 'Democracia', 1, 1, null, 1, null),
(151, 11, 'Falcón', 1, 1, null, 1, null),
(152, 11, 'Federacion', 1, 1, null, 1, null),
(153, 11, 'Jacura', 1, 1, null, 1, null),
(154, 11, 'Los Taques', 1, 1, null, 1, null),
(155, 11, 'Mauroa', 1, 1, null, 1, null),
(156, 11, 'Miranda', 1, 1, null, 1, null),
(157, 11, 'Monseñor Iturriza', 1, 1, null, 1, null),
(158, 11, 'Palmasola', 1, 1, null, 1, null),
(159, 11, 'Petit', 1, 1, null, 1, null),
(160, 11, 'Piritu', 1, 1, null, 1, null),
(161, 11, 'San Francisco', 1, 1, null, 1, null),
(162, 11, 'Silva', 1, 1, null, 1, null),
(163, 11, 'Sucre', 1, 1, null, 1, null),
(164, 11, 'Tocopero', 1, 1, null, 1, null),
(165, 11, 'Union', 1, 1, null, 1, null),
(166, 11, 'Urumaco', 1, 1, null, 1, null),
(167, 11, 'Zamora', 1, 1, null, 1, null),
(168, 13, 'Andrés Eloy Blanco', 1, 1, null, 1, null),
(169, 13, 'Crespo', 1, 1, null, 1, null),
(170, 13, 'Iribarren', 1, 1, null, 1, null),
(171, 13, 'Jiménez', 1, 1, null, 1, null),
(172, 13, 'Morán', 1, 1, null, 1, null),
(173, 13, 'Palavecino', 1, 1, null, 1, null),
(174, 13, 'Simón Planas', 1, 1, null, 1, null),
(175, 13, 'Torres', 1, 1, null, 1, null),
(176, 13, 'Urdaneta', 1, 1, null, 1, null),
(177, 14, 'Alberto Adriani', 1, 1, null, 1, null),
(178, 14, 'Andrés Bello ', 1, 1, null, 1, null),
(179, 14, 'Antonio Pinto Salinas ', 1, 1, null, 1, null),
(180, 14, 'Acarigua', 1, 1, null, 1, null),
(181, 14, 'Arzobispo Chacón', 1, 1, null, 1, null),
(182, 14, 'Campo Elías', 1, 1, null, 1, null),
(183, 14, 'Caracciolo Parra Olmedo ', 1, 1, null, 1, null),
(184, 14, 'Cardenal Quintero', 1, 1, null, 1, null),
(185, 14, 'Guaraque', 1, 1, null, 1, null),
(186, 14, 'Julio César Salas ', 1, 1, null, 1, null),
(187, 14, 'Justo Briceño', 1, 1, null, 1, null),
(188, 14, 'Libertador', 1, 1, null, 1, null),
(189, 14, 'Miranda', 1, 1, null, 1, null),
(190, 14, 'Obispo Ramos de Lora ', 1, 1, null, 1, null),
(191, 14, 'Padre Norega', 1, 1, null, 1, null),
(192, 14, 'Pueblo Llano', 1, 1, null, 1, null),
(193, 14, 'Rangel', 1, 1, null, 1, null),
(194, 14, 'Rivas Dávila', 1, 1, null, 1, null),
(195, 14, 'Santos Marquina', 1, 1, null, 1, null),
(196, 14, 'Sucre', 1, 1, null, 1, null),
(197, 14, 'Tovar', 1, 1, null, 1, null),
(198, 14, 'Tulio Febres Cordero', 1, 1, null, 1, null),
(199, 14, 'Zea', 1, 1, null, 1, null),
(200, 16, 'Acosta', 1, 2, null, 2, null),
(201, 16, 'Aguasay', 1, 1, null, 1, null),
(202, 16, 'Bolívar', 1, 1, null, 1, null),
(203, 16, 'Caripe', 1, 1, null, 1, null),
(204, 16, 'Cedeño', 1, 1, null, 1, null),
(205, 16, 'Ezequiel Zamora', 1, 1, null, 1, null),
(206, 16, 'Libertador', 1, 1, null, 1, null),
(207, 16, 'Maturín', 1, 1, null, 1, null),
(208, 16, 'Piar', 1, 1, null, 1, null),
(209, 16, 'Punceres', 1, 1, null, 1, null),
(210, 16, 'Santa Bárbara', 1, 1, null, 1, null),
(211, 16, 'Sotillo', 1, 1, null, 1, null),
(212, 16, 'Uracoa', 1, 1, null, 1, null),
(213, 17, 'Antolín del Campo', 1, 1, null, 1, null),
(214, 17, 'Arismendi', 1, 1, null, 1, null),
(215, 17, 'Díaz', 1, 1, null, 1, null),
(216, 17, 'García', 1, 1, null, 1, null),
(217, 17, 'Gómez', 1, 1, null, 1, null),
(218, 17, 'Maneiro', 1, 1, null, 1, null),
(219, 17, 'Marcano', 1, 1, null, 1, null),
(220, 17, 'Mariño', 1, 1, null, 1, null),
(221, 17, 'Península de Macanao', 1, 1, null, 1, null),
(222, 17, 'Tubores', 1, 1, null, 1, null),
(223, 17, 'Villalba', 1, 1, null, 1, null),
(224, 18, 'Agua Blanca', 1, 1, null, 1, null),
(225, 18, 'Araure', 1, 1, null, 1, null),
(226, 18, 'Esteller', 1, 1, null, 1, null),
(227, 18, 'Guanare', 1, 1, null, 1, null),
(228, 18, 'Guanarito', 1, 1, null, 1, null),
(229, 18, 'Monseñor José Vicenti de Unda', 1, 1, null, 1, null),
(230, 18, 'Ospino', 1, 1, null, 1, null),
(231, 18, 'Páez', 1, 1, null, 1, null),
(232, 18, 'Papelón', 1, 1, null, 1, null),
(233, 18, 'San Genaro de Boconoíto', 1, 1, null, 1, null),
(234, 18, 'San Rafael de Onoto', 1, 1, null, 1, null),
(235, 18, 'Santa Rosalía', 1, 1, null, 1, null),
(236, 18, 'Sucre', 1, 1, null, 1, null),
(237, 18, 'Turén', 1, 1, null, 1, null),
(238, 19, 'Andrés Eloy Blanco19', 1, 1, null, 1, null),
(239, 19, 'Andrés Mata', 1, 1, null, 1, null),
(240, 19, 'Arismendi', 1, 1, null, 1, null),
(241, 19, 'Benítez', 1, 1, null, 1, null),
(242, 19, 'Beremúdez', 1, 1, null, 1, null),
(243, 19, 'Bolívar', 1, 1, null, 1, null),
(244, 19, 'Cagigal', 1, 1, null, 1, null),
(245, 19, 'Cruz Salmerón Acosta', 1, 1, null, 1, null),
(246, 19, 'Libertador', 1, 1, null, 1, null),
(247, 19, 'Mariño', 1, 1, null, 1, null),
(248, 19, 'Mejía', 1, 1, null, 1, null),
(249, 19, 'Montes', 1, 1, null, 1, null),
(250, 19, 'Ribero', 1, 1, null, 1, null),
(251, 19, 'Sucre', 1, 1, null, 1, null),
(252, 19, 'Valdez', 1, 1, null, 1, null),
(253, 20, 'Andrés Bello', 1, 1, null, 1, null),
(254, 20, 'Antonio Rómulo Costa', 1, 1, null, 1, null),
(255, 20, 'Ayacucho', 1, 1, null, 1, null),
(256, 20, 'Bolívar', 1, 1, null, 1, null),
(257, 20, 'Cárdenas', 1, 1, null, 1, null),
(258, 20, 'Córdova', 1, 1, null, 1, null),
(259, 20, 'Fernández Feo', 1, 1, null, 1, null),
(260, 20, 'Francisco de Miranda', 1, 1, null, 1, null),
(261, 20, 'García de Hevia', 1, 1, null, 1, null),
(262, 20, 'Guásimos', 1, 1, null, 1, null),
(263, 20, 'Independencia', 1, 1, null, 1, null),
(264, 20, 'Jáuregui', 1, 1, null, 1, null),
(265, 20, 'José María Vargas', 1, 1, null, 1, null),
(266, 20, 'Junín', 1, 1, null, 1, null),
(267, 20, 'Libertad', 1, 1, null, 1, null),
(268, 20, 'Libertador', 1, 1, null, 1, null),
(269, 20, 'Lobatera', 1, 1, null, 1, null),
(270, 20, 'Michelena', 1, 1, null, 1, null),
(271, 20, 'Panamericano', 1, 1, null, 1, null),
(272, 20, 'Pedro María Ureña', 1, 1, null, 1, null),
(273, 20, 'Rafael Urdaneta', 1, 1, null, 1, null),
(274, 20, 'Samuel Darío Maldonado', 1, 1, null, 1, null),
(275, 20, 'San Cristóbal', 1, 1, null, 1, null),
(276, 20, 'Seboruco', 1, 1, null, 1, null),
(277, 20, 'Simón Rodríguez', 1, 1, null, 1, null),
(278, 20, 'Sucre', 1, 1, null, 1, null),
(279, 20, 'Torbes', 1, 1, null, 1, null),
(280, 20, 'Uribante', 1, 1, null, 1, null),
(281, 20, 'San Judas Tadeo', 1, 1, null, 1, null),
(282, 21, 'Andrés Bello', 1, 1, null, 1, null),
(283, 21, 'Boconó', 1, 1, null, 1, null),
(284, 21, 'Bolívar', 1, 1, null, 1, null),
(285, 21, 'Candelaria', 1, 1, null, 1, null),
(286, 21, 'Carache', 1, 1, null, 1, null),
(287, 21, 'Escuque', 1, 1, null, 1, null),
(288, 21, 'José Felipe Márquez Cañizalez', 1, 1, null, 1, null),
(289, 21, 'Juan Vicente Campos Elías', 1, 1, null, 1, null),
(290, 21, 'La Ceiba', 1, 1, null, 1, null),
(291, 21, 'Miranda', 1, 1, null, 1, null),
(292, 21, 'Monte Carmelo', 1, 1, null, 1, null),
(293, 21, 'Motatán', 1, 1, null, 1, null),
(294, 21, 'Pampán', 1, 1, null, 1, null),
(295, 21, 'Pampanito', 1, 1, null, 1, null),
(296, 21, 'Rafael Rangel', 1, 1, null, 1, null),
(297, 21, 'San Rafael de Carvajal', 1, 1, null, 1, null),
(298, 21, 'Sucre', 1, 1, null, 1, null),
(299, 21, 'Trujillo', 1, 1, null, 1, null),
(300, 21, 'Urdaneta', 1, 1, null, 1, null),
(301, 21, 'Valera', 1, 1, null, 1, null),
(302, 22, 'Veroes', 1, 1, null, 1, null),
(303, 22, 'Arístides Bastidas', 1, 1, null, 1, null),
(304, 22, 'Bolívar', 1, 1, null, 1, null),
(305, 22, 'Bruzal', 1, 1, null, 1, null),
(306, 22, 'Cocorote', 1, 1, null, 1, null),
(307, 22, 'Independencia', 1, 1, null, 1, null),
(308, 22, 'José Antonio Páez', 1, 1, null, 1, null),
(309, 22, 'La Trinidad', 1, 1, null, 1, null),
(310, 22, 'Manuel Monge', 1, 1, null, 1, null),
(311, 22, 'Nirgua', 1, 1, null, 1, null),
(312, 22, 'Peña', 1, 1, null, 1, null),
(313, 22, 'San Felipe', 1, 1, null, 1, null),
(314, 22, 'Sucre', 1, 1, null, 1, null),
(315, 22, 'Urachiche', 1, 1, null, 1, null),
(316, 24, 'Almirante Padilla', 1, 1, null, 1, null),
(317, 24, 'Baralt', 1, 1, null, 1, null),
(318, 24, 'Cabimas', 1, 1, null, 1, null),
(319, 24, 'Catatumbo', 1, 1, null, 1, null),
(320, 24, 'Colón', 1, 1, null, 1, null),
(321, 24, 'Francisco Javier Pulgar', 1, 1, null, 1, null),
(322, 24, 'Jesús Enrique Losada', 1, 1, null, 1, null),
(323, 24, 'La Cañada de Urdaneta', 1, 1, null, 1, null),
(324, 24, 'Lagunillas', 1, 1, null, 1, null),
(325, 24, 'Machiques de Perijá', 1, 1, null, 1, null),
(326, 24, 'Mara', 1, 1, null, 1, null),
(327, 24, 'Maracaibo', 1, 1, null, 1, null),
(328, 24, 'Miranda', 1, 1, null, 1, null),
(329, 24, 'Páez', 1, 1, null, 1, null),
(330, 24, 'Rosario de Perijá', 1, 1, null, 1, null),
(331, 24, 'San Francisco', 1, 1, null, 1, null),
(332, 24, 'Santa Rita', 1, 1, null, 1, null),
(333, 24, 'Simón Bolívar', 1, 1, null, 1, null),
(334, 24, 'Sucre', 1, 1, null, 1, null),
(335, 24, 'Valmore Rodríguez', 1, 1, null, 1, null),
(336, 24, 'Jesús María Semprún', 1, 1, null, 1, null);