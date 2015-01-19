/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `Id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `fist_name` varchar(35) NOT NULL DEFAULT '',
  `last_name` varchar(35) NOT NULL DEFAULT '',
  `mail` varchar(25) NOT NULL DEFAULT '' COMMENT 'example@example.com',
  `password` varchar(65) NOT NULL DEFAULT '',
  `secret_question` varchar(35) NOT NULL DEFAULT '',
  `answer_question` varchar(35) NOT NULL DEFAULT '',
  `country` varchar(15) NOT NULL DEFAULT '',
  `date_of_birth` varchar(25) NOT NULL DEFAULT '',
  `roles_account` varchar(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `account` */

LOCK TABLES `account` WRITE;

UNLOCK TABLES;