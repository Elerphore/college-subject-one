-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	8.0.24


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema salon
--

CREATE DATABASE IF NOT EXISTS salon;
USE salon;

--
-- Definition of table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Surname` varchar(40) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `patronymic` varchar(40) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Service` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `client`
--

/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`,`Surname`,`Name`,`patronymic`,`Phone`,`Address`,`Service`) VALUES 
 (1,'Сарова','Ксения','Дмитриевна','89546784356','Ленина,56','Маникюр'),
 (2,'Кларон','Милена','Александровна','89545679345','Грязнова,24','Прическа'),
 (3,'Самойлова','Мария','Алексеевна','89674563289','Гагарина,57','Маникюр'),
 (4,'Евграфова','Наталья','Владимировна','89915673476','Ленина, 87','Макияж'),
 (5,'Малерова','Анаставия','Викторовна','89549846782','Ангарская,123','Прическа'),
 (6,'Сандрова','Дарья','Ирогевна','89436785692','Советская,97','Макияж'),
 (7,'Ланина','Владислава','Васильевна','89512376435','Мира,345','Маникюр');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


--
-- Definition of table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Code` int DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `id_staff` bigint unsigned NOT NULL,
  `id_service` bigint unsigned NOT NULL,
  `id_client` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_staff` (`id_staff`),
  KEY `id_service` (`id_service`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `record_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `record_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `record_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `record`
--

/*!40000 ALTER TABLE `record` DISABLE KEYS */;
/*!40000 ALTER TABLE `record` ENABLE KEYS */;


--
-- Definition of table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `schedule`
--

/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;


--
-- Definition of table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(40) DEFAULT NULL,
  `Cost` decimal(8,2) DEFAULT NULL,
  `Сode` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `service`
--

/*!40000 ALTER TABLE `service` DISABLE KEYS */;
/*!40000 ALTER TABLE `service` ENABLE KEYS */;


--
-- Definition of table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
CREATE TABLE `specialties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Code` int DEFAULT NULL,
  `Title` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `specialties`
--

/*!40000 ALTER TABLE `specialties` DISABLE KEYS */;
/*!40000 ALTER TABLE `specialties` ENABLE KEYS */;


--
-- Definition of table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Surname` varchar(40) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Patronymic` varchar(40) DEFAULT NULL,
  `Phone` int DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Experience` int DEFAULT NULL,
  `id_schedule` bigint unsigned NOT NULL,
  `id_specialties` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_schedule` (`id_schedule`),
  KEY `id_specialties` (`id_specialties`),
  CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_schedule`) REFERENCES `schedule` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`id_specialties`) REFERENCES `specialties` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `staff`
--

/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
