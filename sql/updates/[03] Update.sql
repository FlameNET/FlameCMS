/*Table structure for table `roles_account_permissions` */

DROP TABLE IF EXISTS `roles_account_permissions`;

CREATE TABLE `roles_account_permissions` (
  `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permissions` INT(1) UNSIGNED NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`,`permissions`),
  UNIQUE KEY `id` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

/*Data for the table `roles_account_permissions` */

LOCK TABLES `roles_account_permissions` WRITE;

UNLOCK TABLES;

/*Table structure for table `roles_permissions` */

DROP TABLE IF EXISTS `roles_permissions`;

CREATE TABLE `roles_permissions` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `roles` VARCHAR(25) NOT NULL DEFAULT '',
  `permissions` VARCHAR(1) NOT NULL DEFAULT '',
  UNIQUE KEY `id` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `roles_permissions` */

LOCK TABLES `roles_permissions` WRITE;

INSERT  INTO `roles_permissions`(`id`,`roles`,`permissions`) VALUES
(1,'Player','2'),
(2,'Moderator','3'),
(3,'Game Master','4'),
(4,'Administrator','5'),
(5,'Owner','6');

UNLOCK TABLES;

/*Table structure for table `slideshows` */