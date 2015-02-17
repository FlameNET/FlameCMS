/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `Id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(35) NOT NULL DEFAULT '',
  `last_name` VARCHAR(35) NOT NULL DEFAULT '',
  `email` VARCHAR(25) NOT NULL DEFAULT '' COMMENT 'example@example.com',
  `password` VARCHAR(44) NOT NULL DEFAULT '',
  `secret_question` VARCHAR(35) NOT NULL DEFAULT '',
  `answer_question` VARCHAR(35) NOT NULL DEFAULT '',
  `country` VARCHAR(15) NOT NULL DEFAULT '',
  `date_of_birth` VARCHAR(25) NOT NULL DEFAULT '',
  `roles_account` VARCHAR(1) NOT NULL DEFAULT '2',
  `activation_code` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;
8;

/*Data for the table `account` */

LOCK TABLES `account` WRITE;

UNLOCK TABLES;