/*Table structure for table `realms` */
DROP TABLE IF EXISTS `realms`;

CREATE TABLE `realms` (
  `Id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `realmName` varchar(55) NOT NULL DEFAULT 'FlameCMS',
  `rate` varchar(20) NOT NULL DEFAULT 'x1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
