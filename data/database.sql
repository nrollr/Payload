DROP TABLE IF EXISTS `Data`;
CREATE TABLE `Data` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`sensor_id` varchar(30) DEFAULT NULL,
	`time` int(100) NOT NULL,
	`volume` int(10) NOT NULL,
	PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Data` WRITE;
INSERT INTO `Data` (`id`, `sensor_id`, `time`, `volume`)
VALUES
	(20,'CA98D6D47381EC4E915555AF1F8F8',1434483074,1111),
	(21,'CA98D6D47381EC4E915555AF1F8F8',1434483135,2222),
	(22,'A9B15494A7FC2EAB1C87353987868',1444524677,3333);
UNLOCK TABLES;

DROP TABLE IF EXISTS `Inventory`;
CREATE TABLE `Inventory` (
	`sensor_id` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
	`id_tap` int(11) NOT NULL,
	`id_beer` text CHARACTER SET utf8 NOT NULL,
	`id_brewery` text CHARACTER SET utf8 NOT NULL,
	PRIMARY KEY (`sensor_id`),
	UNIQUE KEY `sensor_id` (`sensor_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `Inventory` WRITE;
INSERT INTO `Inventory` (`sensor_id`, `id_tap`, `id_beer`, `id_brewery`)
VALUES
	('64E9CDD6CB6834943A55AF473E862',4,'Oude Geuze','\"3 Fonteinen\"'),
	('A9B15494A7FC2EAB1C87353987868',3,'Black Albert','\"De Struise Brouwers\"'),
	('AA6B7FE9DD97B596D8B55168599FF',4,'Cuvee Delphine','\"De Struise Brouwers\"'),
	('CA98D6D47381EC4E915555AF1F8F8',5,'Oude Kriek','\"3 Fonteinen\"');
UNLOCK TABLES;

DROP TABLE IF EXISTS `Sensors`;
CREATE TABLE `Sensors` (
	`client_id` int(11) NOT NULL AUTO_INCREMENT,
	`client_name` text CHARACTER SET utf8 NOT NULL,
	`client_address` text CHARACTER SET utf8 NOT NULL,
	`sensor_id` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
	`tap_id` int(11) DEFAULT NULL,
	PRIMARY KEY (`client_id`),
	UNIQUE KEY `sensor_id` (`sensor_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `Sensors` WRITE;
INSERT INTO `Sensors` (`client_id`, `client_name`, `client_address`, `sensor_id`, `tap_id`)
VALUES
	(1,'Moeder Lambic','Rue de Savoie 68, 1060 Brussel','64E9CDD6CB6834943A55AF473E862',4),
	(2,'Moeder Lambic','Rue de Savoie 68, 1060 Brussel','CA98D6D47381EC4E915555AF1F8F8',5),
	(3,'De Struise Brouwers','Kasteelstraat 50, 8640 Oostvleteren','A9B15494A7FC2EAB1C87353987868',3),
	(4,'De Struise Brouwers','Kasteelstraat 50, 8640 Oostvleteren','AA6B7FE9DD97B596D8B55168599FF',4);
UNLOCK TABLES;