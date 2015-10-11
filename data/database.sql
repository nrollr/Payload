/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Data`;

CREATE TABLE `Data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sensor_id` varchar(30) DEFAULT NULL,
  `time` int(100) NOT NULL,
  `volume` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Data` WRITE;
/*!40000 ALTER TABLE `Data` DISABLE KEYS */;

INSERT INTO `Data` (`id`, `sensor_id`, `time`, `volume`)
VALUES
	(20,'CA98D6D47381EC4E915555AF1F8F8',1434483074,1111),
	(21,'CA98D6D47381EC4E915555AF1F8F8',1434483135,2222),
	(22,'A9B15494A7FC2EAB1C87353987868',1444524677,3333);

/*!40000 ALTER TABLE `Data` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Inventory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Inventory`;

CREATE TABLE `Inventory` (
  `sensor_id` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `id_tap` int(11) NOT NULL,
  `id_beer` text CHARACTER SET utf8 NOT NULL,
  `id_brewery` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`sensor_id`),
  UNIQUE KEY `sensor_id` (`sensor_id`),
  CONSTRAINT `sensorMapping` FOREIGN KEY (`sensor_id`) REFERENCES `Sensors` (`sensor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `Inventory` WRITE;
/*!40000 ALTER TABLE `Inventory` DISABLE KEYS */;

INSERT INTO `Inventory` (`sensor_id`, `id_tap`, `id_beer`, `id_brewery`)
VALUES
	('64E9CDD6CB6834943A55AF473E862',4,'Oude Geuze','\"3 Fonteinen\"'),
	('A9B15494A7FC2EAB1C87353987868',3,'Black Albert','\"De Struise Brouwers\"'),
	('AA6B7FE9DD97B596D8B55168599FF',4,'Cuvee Delphine','\"De Struise Brouwers\"'),
	('CA98D6D47381EC4E915555AF1F8F8',5,'Oude Kriek','\"3 Fonteinen\"');

/*!40000 ALTER TABLE `Inventory` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Sensors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Sensors`;

CREATE TABLE `Sensors` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` text CHARACTER SET utf8 NOT NULL,
  `client_address` text CHARACTER SET utf8 NOT NULL,
  `sensor_id` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `tap_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `sensor_id` (`sensor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `Sensors` WRITE;
/*!40000 ALTER TABLE `Sensors` DISABLE KEYS */;

INSERT INTO `Sensors` (`client_id`, `client_name`, `client_address`, `sensor_id`, `tap_id`)
VALUES
	(1,'Moeder Lambic','Rue de Savoie 68, 1060 Brussel','64E9CDD6CB6834943A55AF473E862',4),
	(2,'Moeder Lambic','Rue de Savoie 68, 1060 Brussel','CA98D6D47381EC4E915555AF1F8F8',5),
	(3,'De Struise Brouwers','Kasteelstraat 50, 8640 Oostvleteren','A9B15494A7FC2EAB1C87353987868',3),
	(4,'De Struise Brouwers','Kasteelstraat 50, 8640 Oostvleteren','AA6B7FE9DD97B596D8B55168599FF',4);

/*!40000 ALTER TABLE `Sensors` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
