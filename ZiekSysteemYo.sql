-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ziekmeldingen
CREATE DATABASE IF NOT EXISTS `ziekmeldingen` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ziekmeldingen`;

-- Dumping structure for table ziekmeldingen.periode
CREATE TABLE IF NOT EXISTS `periode` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `SID` int(11) DEFAULT NULL,
  `DatumZMelding` date DEFAULT NULL,
  `DatumBMelding` date DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table ziekmeldingen.studenten
CREATE TABLE IF NOT EXISTS `studenten` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `VNaam` varchar(50) DEFAULT NULL,
  `ANaam` varchar(50) DEFAULT NULL,
  `Leeftijd` int(3) NOT NULL DEFAULT 0,
  `Klas` varchar(10) DEFAULT NULL,
  `StatusZB` varchar(50) DEFAULT 'Gezond',
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
