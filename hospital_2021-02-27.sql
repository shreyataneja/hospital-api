# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.23)
# Database: hospital
# Generation Time: 2021-02-27 20:16:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Appointment
# ------------------------------------------------------------
mysql -u root -p


CREATE DATABASE hospital CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'shreya'@'localhost' identified by 'shreya';
ALTER USER 'shreya'@'localhost' IDENTIFIED WITH mysql_native_password BY 'shreya';
GRANT ALL on hospital.* to 'shreya'@'localhost';

use hospital;


DROP TABLE IF EXISTS `Appointment`;

CREATE TABLE `Appointment` (
  `AppointmentID` int NOT NULL AUTO_INCREMENT,
  `Patient_id` int DEFAULT NULL,
  `Patient_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PrepNurse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Physician` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Start` datetime NOT NULL,
  `End` datetime NOT NULL,
  `ExaminationRoom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`AppointmentID`),
  KEY `Patient_id` (`Patient_id`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `Patient` (`id`)
) ;

LOCK TABLES `Appointment` WRITE;
/*!40000 ALTER TABLE `Appointment` DISABLE KEYS */;

INSERT INTO `Appointment` (`AppointmentID`, `Patient_id`, `Patient_first_name`, `Patient_last_name`, `Patient_email`, `Patient_phone`, `PrepNurse`, `Physician`, `Start`, `End`, `ExaminationRoom`)
VALUES
	(13216584,1,'John','Doe','johndoe@gmail.com','9087896543','Adamant','Adamant','2008-04-24 10:00:00','2008-04-24 11:00:00','A'),
	(26548913,1,'John','Doe','johndoe@gmail.com','9087896543','Adam','Adamant','2008-04-24 10:00:00','2008-04-24 11:00:00','B'),
	(36549879,2,'John','Doe','johndoe@gmail.com','9087896543','Hinze','Adamant','2008-04-25 10:00:00','2008-04-25 11:00:00','A'),
	(46846589,3,'John','Doe','johndoe@gmail.com','9087896543','Kitty','Adamant','2021-02-27 06:01:49','2021-02-27 06:01:49','B'),
	(59871321,4,'John','Doe','johndoe@gmail.com','9087896543',NULL,'Adamant','2008-04-26 10:00:00','2008-04-26 11:00:00','C'),
	(69879231,6,'John','Doe','johndoe@gmail.com','9087896543','Kitty','Adamant','2008-04-26 11:00:00','2008-04-26 12:00:00','C'),
	(76983231,7,'John','Doe','johndoe@gmail.com','9087896543',NULL,'Adamant','2008-04-26 12:00:00','2008-04-26 13:00:00','C'),
	(86213939,6,'John','Doe','johndoe@gmail.com','9087896543','Kim','Adamant','2008-04-27 10:00:00','2008-04-21 11:00:00','A'),
	(93216548,9,'John','Doe','johndoe@gmail.com','9087896543','Henry','Adamant','2008-04-27 10:00:00','2008-04-27 11:00:00','B'),
	(93216549,4,'Shreya','Taneja','shreyataneja0301@gmail.com','16138699464','Mike','Henry','2021-02-26 19:38:56','2021-02-26 19:38:56','C'),
	(93216550,12,'Shreya','Taneja','shreyataneja0301@gmail.com','16138699464','Mike','Henry','2021-02-26 19:39:33','2021-02-26 19:39:33','B'),
	

/*!40000 ALTER TABLE `Appointment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Patient
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Patient`;

CREATE TABLE `Patient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `height` int DEFAULT NULL,
  `InsuranceID` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

LOCK TABLES `Patient` WRITE;
/*!40000 ALTER TABLE `Patient` DISABLE KEYS */;

INSERT INTO `Patient` (`id`, `first_name`, `last_name`, `sex`, `email`, `contact_number`, `age`, `weight`, `height`, `InsuranceID`, `street_address`, `city`, `province`, `postal`)
VALUES
	(1,'John','Doe','male','johndoe@gmail.com','6139078907',32,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	(2,'David',' Costa','male','sam.mraz1996@yahoo.com','6139078907',29,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	(3,'Shreya','Taneja','female','shreya@email.com','0987909876',24,60,170,'IN67878','my address 1','Ottawa','Ontario','K2G 3R6'),
	(4,'Adela',' Marion','female','michael2004@yahoo.com','6139078907',42,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	(5,'Matthew',' Popp','male','krystel_wol7@gmail.com','6139078907',48,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	(6,'Alan',' Wallin','male','neva_gutman10@hotmail.com','6139078907',37,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	(7,'Joyce',' Hinze','male','davonte.maye@yahoo.com','6139078907',44,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	(8,'Donna',' Andrews','male','joesph.quitz@yahoo.com','6139078907',49,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	(9,'Andrew',' Best','male','jeramie_roh@hotmail.com','6139078907',51,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	(10,'Joel',' Ogle','','patient_id@hotmail.com','6139078907',45,80,170,'IN2020','20, Cresent Ave.','Toronto','Ontario','K2C X1Y'),
	
/*!40000 ALTER TABLE `Patient` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
