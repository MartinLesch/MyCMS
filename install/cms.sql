-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Exportiere Struktur von Tabelle cms.content
CREATE TABLE IF NOT EXISTS `content` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `PfadZurDatei` varchar(150) DEFAULT NULL,
  `SmID` int(11) DEFAULT NULL,
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`CID`),
  KEY `SmID` (`SmID`),
  CONSTRAINT `FK_content_submenu` FOREIGN KEY (`SmID`) REFERENCES `submenu` (`SmID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle cms.mainmenu
CREATE TABLE IF NOT EXISTS `mainmenu` (
  `MmID` int(11) NOT NULL AUTO_INCREMENT,
  `MmName` varchar(50) DEFAULT '0',
  `LastModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`MmID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle cms.submenu
CREATE TABLE IF NOT EXISTS `submenu` (
  `SmID` int(11) NOT NULL AUTO_INCREMENT,
  `MmID` int(11) DEFAULT NULL,
  `SmName` varchar(50) DEFAULT '0',
  `LastModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`SmID`),
  KEY `FK_submenu_mainmenu` (`MmID`),
  CONSTRAINT `FK_submenu_mainmenu` FOREIGN KEY (`MmID`) REFERENCES `mainmenu` (`MmID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle cms.template
CREATE TABLE IF NOT EXISTS `template` (
  `TemplateID` int(11) NOT NULL AUTO_INCREMENT,
  `TemplateBezeichnung` varchar(50) NOT NULL,
  `IsActive` tinyint(1) DEFAULT '1',
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`TemplateID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--Default Datensatz erzeugen
INSERT INTO `template` (`TemplateBezeichnung`) VALUES ('default');
INSERT INTO `template` (`TemplateBezeichnung`) VALUES ('Sommer');

-- Daten Export vom Benutzer nicht ausgewählt
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
