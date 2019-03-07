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


-- Exportiere Datenbank Struktur für cms
CREATE DATABASE IF NOT EXISTS `cms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cms`;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle cms.content: ~19 rows (ungefähr)
DELETE FROM `content`;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` (`CID`, `PfadZurDatei`, `SmID`, `LastModified`, `Delete`) VALUES
	(1, 'Test', 1, '2018-11-10 18:46:25', NULL),
	(2, 'Test', 1, '2019-02-07 18:43:26', 0),
	(3, 'Test', 1, '2019-02-07 18:43:37', 0),
	(4, 'Hallo', 4, '2019-02-07 18:44:12', 0),
	(5, 'DasBild', 3, '2019-02-07 18:46:02', 0),
	(6, 'DasBild', 3, '2019-02-07 19:03:22', 0),
	(7, 'DasBild', 3, '2019-02-07 19:05:54', 0),
	(8, 'DasBild', 3, '2019-02-07 19:05:55', 0),
	(9, 'DasBild', 3, '2019-02-07 19:06:15', 0),
	(10, 'DasBild', 3, '2019-02-07 19:06:43', 0),
	(11, 'DasBild', 3, '2019-02-07 19:07:42', 0),
	(12, 'Test', 1, '2019-02-07 19:09:35', 0),
	(13, 'MAIK', 5, '2019-02-07 19:47:06', 0),
	(14, 'Andree', 2, '2019-02-21 17:26:45', 0),
	(15, 'Andree', 2, '2019-02-21 17:27:02', 0),
	(16, 'Text123', 7, '2019-02-21 17:30:15', 0),
	(17, 'Test', 1, '2019-02-21 17:34:52', 0),
	(18, 'Test', 1, '2019-02-21 17:37:43', 0),
	(19, 'Test', 1, '2019-02-21 17:39:16', 0),
	(20, 'Text123', 7, '2019-02-21 17:39:25', 0),
	(21, 'Text123', 7, '2019-02-21 17:39:41', 0);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle cms.mainmenu
CREATE TABLE IF NOT EXISTS `mainmenu` (
  `MmID` int(11) NOT NULL AUTO_INCREMENT,
  `MmName` varchar(50) DEFAULT '0',
  `LastModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`MmID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle cms.mainmenu: ~3 rows (ungefähr)
DELETE FROM `mainmenu`;
/*!40000 ALTER TABLE `mainmenu` DISABLE KEYS */;
INSERT INTO `mainmenu` (`MmID`, `MmName`, `LastModified`, `Delete`) VALUES
	(1, 'Hauptmenue', '2018-11-10 18:26:17', NULL),
	(2, 'News', '2018-11-10 18:26:26', NULL),
	(3, 'Login', '2018-11-10 18:26:32', NULL),
	(4, 'Test123', '2019-02-21 17:29:11', NULL);
/*!40000 ALTER TABLE `mainmenu` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle cms.settingtemplatevalue
CREATE TABLE IF NOT EXISTS `settingtemplatevalue` (
  `TemplateID` int(11) DEFAULT NULL,
  `SettingID` int(11) DEFAULT NULL,
  `Value` varchar(50) DEFAULT NULL,
  `LastModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Delete` tinyint(1) DEFAULT '0',
  KEY `settingtemplatevalue_templatesetting` (`SettingID`),
  KEY `settingtemplatevalue_template` (`TemplateID`),
  CONSTRAINT `settingtemplatevalue_template` FOREIGN KEY (`TemplateID`) REFERENCES `template` (`TemplateID`),
  CONSTRAINT `settingtemplatevalue_templatesetting` FOREIGN KEY (`SettingID`) REFERENCES `templatesetting` (`SettingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle cms.settingtemplatevalue: ~5 rows (ungefähr)
DELETE FROM `settingtemplatevalue`;
/*!40000 ALTER TABLE `settingtemplatevalue` DISABLE KEYS */;
INSERT INTO `settingtemplatevalue` (`TemplateID`, `SettingID`, `Value`, `LastModified`, `Delete`) VALUES
	(1, 1, '800', '2018-11-10 18:29:27', NULL),
	(1, 2, '20', '2018-11-10 18:34:06', NULL),
	(1, 3, '100', '2018-11-10 18:34:47', NULL),
	(1, 4, '100', '2018-11-10 18:34:56', NULL),
	(1, 5, '100', '2018-11-10 18:47:10', NULL);
/*!40000 ALTER TABLE `settingtemplatevalue` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle cms.subcont
CREATE TABLE IF NOT EXISTS `subcont` (
  `SCID` int(11) NOT NULL AUTO_INCREMENT,
  `CID` int(11) DEFAULT NULL,
  `SmID` int(11) DEFAULT NULL,
  `Rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`SCID`),
  KEY `FK__content` (`CID`),
  KEY `FK__submenu` (`SmID`),
  CONSTRAINT `FK__content` FOREIGN KEY (`CID`) REFERENCES `content` (`CID`),
  CONSTRAINT `FK__submenu` FOREIGN KEY (`SmID`) REFERENCES `submenu` (`SmID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle cms.subcont: ~3 rows (ungefähr)
DELETE FROM `subcont`;
/*!40000 ALTER TABLE `subcont` DISABLE KEYS */;
INSERT INTO `subcont` (`SCID`, `CID`, `SmID`, `Rank`) VALUES
	(1, 1, 1, NULL),
	(2, 1, 4, NULL),
	(3, 1, 3, NULL);
/*!40000 ALTER TABLE `subcont` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle cms.submenu: ~6 rows (ungefähr)
DELETE FROM `submenu`;
/*!40000 ALTER TABLE `submenu` DISABLE KEYS */;
INSERT INTO `submenu` (`SmID`, `MmID`, `SmName`, `LastModified`, `Delete`) VALUES
	(1, 1, 'Fischerclub', '2018-11-10 18:29:51', NULL),
	(2, 3, 'Admin', '2018-11-10 18:49:59', NULL),
	(3, 2, 'World', '2018-11-10 18:50:09', NULL),
	(4, 2, 'LocalHost', '2018-11-10 18:50:18', NULL),
	(5, 1, 'Hundeclub', '2019-01-10 17:43:08', NULL),
	(6, 3, 'Host', '2019-01-10 17:43:37', NULL),
	(7, 4, 'SubMenu123', '2019-02-21 17:29:26', NULL);
/*!40000 ALTER TABLE `submenu` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle cms.template
CREATE TABLE IF NOT EXISTS `template` (
  `TemplateID` int(11) NOT NULL AUTO_INCREMENT,
  `TemplateBezeichnung` varchar(50) NOT NULL,
  `IsActive` tinyint(1) DEFAULT '1',
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`TemplateID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle cms.template: ~1 rows (ungefähr)
DELETE FROM `template`;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` (`TemplateID`, `TemplateBezeichnung`, `IsActive`, `LastModified`, `Delete`) VALUES
	(1, 'default', NULL, '2018-11-10 18:28:36', NULL);
/*!40000 ALTER TABLE `template` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle cms.templatesetting
CREATE TABLE IF NOT EXISTS `templatesetting` (
  `SettingID` int(11) NOT NULL AUTO_INCREMENT,
  `SettingLabel` varchar(50) DEFAULT NULL,
  `SettingEinheit` varchar(15) DEFAULT NULL,
  `LastModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`SettingID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle cms.templatesetting: ~5 rows (ungefähr)
DELETE FROM `templatesetting`;
/*!40000 ALTER TABLE `templatesetting` DISABLE KEYS */;
INSERT INTO `templatesetting` (`SettingID`, `SettingLabel`, `SettingEinheit`, `LastModified`, `Delete`) VALUES
	(1, 'tableWidth', 'px', '2018-11-10 18:28:53', NULL),
	(2, 'menuWidth', 'px', '2018-11-10 18:33:32', NULL),
	(3, 'headerHeight', 'px', '2018-11-10 18:33:42', NULL),
	(4, 'footerHeight', 'px', '2018-11-10 18:33:50', NULL),
	(5, 'submenu', 'px', '2018-11-10 18:42:59', NULL);
/*!40000 ALTER TABLE `templatesetting` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
