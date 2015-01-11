-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.15-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table cms.cms_ver
DROP TABLE IF EXISTS `cms_ver`;
CREATE TABLE IF NOT EXISTS `cms_ver` (
  `id` int(11) DEFAULT NULL,
  `pack` text,
  `progress` text,
  `ddmmyyyy` date DEFAULT NULL,
  `hour` time DEFAULT NULL,
  `commit` text,
  `version` text,
  `last_update` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `cms_ver` (`id`, `pack`, `progress`, `ddmmyyyy`, `hour`, `commit`, `version`, `last_update`) VALUES (1, '1', '0.2', '2015-01-10', '23:27:29', '11', '0.0.1', '2015-01-10 22:10:39');

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
