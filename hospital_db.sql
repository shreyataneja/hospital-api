

CREATE DATABASE hospital CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'shreya'@'localhost' identified by 'shreya';
ALTER USER 'shreya'@'localhost' IDENTIFIED WITH mysql_native_password BY 'shreya';
GRANT ALL on hospital.* to 'shreya'@'localhost';

use hospital;

CREATE TABLE IF NOT EXISTS `Patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `sex` varchar(256),
  `email` varchar(50),
  `contact_number` varchar(50),
  `age` int(11),
  `weight` int(11),
  `height` int(11),
  `InsuranceID`  varchar(50),
  `street_address` varchar(255),
    `city` varchar(255),
    `province` varchar(255),
   `postal` varchar(255),
 
  PRIMARY KEY (`id`)
);

INSERT INTO `Patient` (`id`, `first_name`, `last_name`, `sex`, `contact_number`, `email`, `age`, `weight`, `height`, `InsuranceID`,`street_address`, `city`, `province`, `postal`) VALUES 
(1, 'John', 'Doe', 'male',6139078907, 'johndoe@gmail.com', 32, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y' ),
(2, 'David', ' Costa', 'male',6139078907, 'sam.mraz1996@yahoo.com', 29, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y'),
(3, 'Todd', ' Martell', 'male',6139078907, 'liliane_hirt@gmail.com', 36, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y'),
(4, 'Adela', ' Marion', 'female',6139078907, 'michael2004@yahoo.com', 42, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y'),
(5, 'Matthew', ' Popp', 'male',6139078907, 'krystel_wol7@gmail.com', 48, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y'),
(6, 'Alan', ' Wallin', 'male',6139078907, 'neva_gutman10@hotmail.com', 37, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y'),
(7, 'Joyce', ' Hinze', 'male',6139078907, 'davonte.maye@yahoo.com', 44, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y'),
(8, 'Donna', ' Andrews', 'male',6139078907, 'joesph.quitz@yahoo.com', 49, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y'),
(9, 'Andrew', ' Best', 'male',6139078907, 'jeramie_roh@hotmail.com', 51, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y'),
(10, 'Joel', ' Ogle', 'male',6139078907, 'summer_shanah@hotmail.com', 45, 80, 170,'IN2020', '20, Cresent Ave.','Toronto', 'Ontario', 'K2C X1Y');


CREATE TABLE Appointment (
  AppointmentID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
Patient_id INTEGER,
  Patient_first_name  varchar(255),
  Patient_last_name  varchar(255),
  Patient_email  varchar(255),
   Patient_phone  varchar(255),
  PrepNurse  varchar(255),
  Physician  varchar(255) ,
  Start DATETIME NOT NULL,
  End DATETIME NOT NULL,
  ExaminationRoom varchar(255) NOT NULL
);
ALTER TABLE Appointment
ADD FOREIGN KEY (Patient_id) REFERENCES Patient(id);


INSERT INTO Appointment VALUES(13216584,1,'John','Doe','johndoe@gmail.com','9087896543','Adamant','Adamant','2008-04-24 10:00','2008-04-24 11:00','A');
INSERT INTO Appointment VALUES(26548913,1,'John','Doe','johndoe@gmail.com','9087896543','Adam','Adamant','2008-04-24 10:00','2008-04-24 11:00','B');
INSERT INTO Appointment VALUES(36549879,1,'John','Doe','johndoe@gmail.com','9087896543','Hinze','Adamant','2008-04-25 10:00','2008-04-25 11:00','A');
INSERT INTO Appointment VALUES(46846589,1,'John','Doe','johndoe@gmail.com','9087896543','Kitty','Adamant','2008-04-25 10:00','2008-04-25 11:00','B');
INSERT INTO Appointment VALUES(59871321,1,'John','Doe','johndoe@gmail.com','9087896543',NULL,'Adamant','2008-04-26 10:00','2008-04-26 11:00','C');
INSERT INTO Appointment VALUES(69879231,1,'John','Doe','johndoe@gmail.com','9087896543','Kitty','Adamant','2008-04-26 11:00','2008-04-26 12:00','C');
INSERT INTO Appointment VALUES(76983231,1,'John','Doe','johndoe@gmail.com','9087896543',NULL,'Adamant','2008-04-26 12:00','2008-04-26 13:00','C');
INSERT INTO Appointment VALUES(86213939,1,'John','Doe','johndoe@gmail.com','9087896543','Kim','Adamant','2008-04-27 10:00','2008-04-21 11:00','A');
INSERT INTO Appointment VALUES(93216548,1,'John','Doe','johndoe@gmail.com','9087896543','Henry','Adamant','2008-04-27 10:00','2008-04-27 11:00','B');