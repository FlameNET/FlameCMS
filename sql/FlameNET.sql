/*
SQLyog Ultimate v8.82 
MySQL - 5.6.21 : Database - FlameNET
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `cms_ver` */

DROP TABLE IF EXISTS `cms_ver`;

CREATE TABLE `cms_ver` (
  `id` INT(11) DEFAULT NULL,
  `pack` TEXT,
  `progress` TEXT,
  `ddmmyyyy` DATE DEFAULT NULL,
  `hour` TIME DEFAULT NULL,
  `commit` TEXT,
  `version` TEXT,
  `last_update` DATETIME DEFAULT NULL
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

/*Data for the table `cms_ver` */

LOCK TABLES `cms_ver` WRITE;

INSERT  INTO `cms_ver`(`id`,`pack`,`progress`,`ddmmyyyy`,`hour`,`commit`,`version`,`last_update`) VALUES
(1,'1','0.2','2015-01-10','23:27:29','11','0.0.1','2015-01-10 22:10:39');

UNLOCK TABLES;

/*Table structure for table `menu` */
DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `Id` INT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_class` VARCHAR(25) NOT NULL DEFAULT '',
  `menu_url` VARCHAR(15) NOT NULL DEFAULT '',
  `menu_cn` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_de` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_en` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_es` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_fr` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_gr` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_it` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_ko` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_pt` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_ru` VARCHAR(20) NOT NULL DEFAULT '',
  `menu_tw` VARCHAR(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=INNODB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

LOCK TABLES `menu` WRITE;

INSERT  INTO `menu`(`Id`,`menu_class`,`menu_url`,`menu_cn`,`menu_de`,`menu_en`,`menu_es`,`menu_fr`,`menu_gr`,`menu_it`,`menu_ko`,`menu_pt`,`menu_ru`,`menu_tw`) VALUES 
(1,'menu-home','','主页','Hauptseite','Home','Principal','Accueil','Αρχική','Home','홈페이지','Início','Главная','購買'),
(2,'menu-game','game','游戏指南','Spiel','Game Guide','Juego','Jeu','Οδηγός','Gioco','게임 가이드','Jogo','Игра','遊戲'),
(3,'menu-community','community','社区','Community','Community','Comunidad','Communauté','Κοινότητα','Comunità','커뮤니티','Comunidade','Сообщество','社群'),
(4,'menu-media','media','媒体','Media','Media','Medios','Médias','μεσα','Media','자료실','Mídia','Материалы','媒體'),
(5,'menu-forums','forum','论坛','Foren','Forums','Foros','Forums','Φόρουμ','Forum','토론장','Fóruns','Форумы','討論區'),
(6,'menu-services','shop','服务','Shop','Shop','Tienda','Boutique','Μαγαζί','Negozio','구매','Loja','Магазин','購買');

UNLOCK TABLES;

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `author` INT(10) NOT NULL DEFAULT '0',
  `date` DATETIME NOT NULL,
  `content` TEXT,
  `contentlnk` TEXT,
  `title` TEXT,
  `comments` INT(10) DEFAULT '0',
  `image` VARCHAR(255) DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `news` */

LOCK TABLES `news` WRITE;

INSERT  INTO `news`(`id`,`author`,`date`,`content`,`contentlnk`,`title`,`comments`,`image`) VALUES
(1,1,'2014-05-04 00:00:00','In the recent Dev Watercooler: Raiding Azeroth Part 3 Warlords of Draenor, we discussed some of the raid changes coming in the next WoW expansion. Before Warlords of Draenor launches, players will have a chance to experience the new raid structure firsthand in the Siege of Orgrimmar.\\r\\n\\r\\nIn the upcoming Patch 6.0, the pre-expansion systems update planned to go live in the weeks leading up to Warlords of Draenors release, well be converting Siege of Orgrimmar to use the new Normal, Heroic, and Mythic difficulties. Both Normal and Heroic difficulties will support flexible raid sizes and our cross-server Group Finder tool, while Mythic will be a fixed 20-player size. At the same time, stat squish will be in effect, the new class changes will be live, and Hit and Expertise will no longer be stats on items, so those will be replaced with more useful ones on all existing items. The raid as a whole will be retuned for the new numbers and scaling sizeoverall, it should prove no more difficult than it is currently, and will likely be easier in many places.\\r\\n\\r\\nWith the end of an expansion and a raid tier, along with introduction of a new level cap, we\\\'ll also be retiring a handful of rewards. We want to encourage everyone to enjoy one last hurrah in the Siege of Orgrimmar before your adventure on Draenor begins.\\r\\n\\r\\n\\r\\nIn addition to the above changes, when Patch 6.0 arrives:\\r\\n\\r\\nFlexible Raid difficulty will cease to exist as it does now, and will be removed from the raid queue interface. The new Normal difficulty of Siege of Orgrimmar will offer a similar experience to that of Flexible Raid.\\r\\nThe new Group Finder tool will be available, designed to help players create and find groups for Normal and Heroic Siege of Orgrimmar and other cross-realm group content.\\r\\nSiege of Orgrimmar achievements will be relabeled according to the new difficulty structure (e.g. Heroic: Malkorok will now be Mythic: Malkorok). Credit for these will be retroactively awarded to players who earned them before Patch 6.0.\\r\\nThe Garrosh Hellscream Ahead of the Curve and Cutting Edge Feats of Strength will cease to be obtainable.\\r\\nThis means that the Korkron War Wolf, awarded by the head of the Curve Feat of Strength, will also cease to be obtainable upon release of the pre-expansion Patch 6.0.\\r\\nWith the release of Patch 6.0, the drop rate of the Heirloom weapons from Garrosh Hellscream on Normal, Heroic, and Mythic difficulties will be significantly increased.\\r\\nPlayers who have yet to get any Heirlooms will have a 100% (guaranteed) chance of getting a spec-appropriate Heirloom when defeating Garrosh on Normal difficulty or higher.\\r\\nThe chance of receiving additional Heirlooms beyond the first will also be increased.\\r\\n\\r\\nWhen Warlords of Draenor is released and players are able to head to Draenor and level past 90:\\r\\n\\r\\nGarrosh Hellscream will no longer drop Heirloom weapons.\\r\\nThe Korkron Juggernaut mount will cease being a guaranteed drop from Mythic Garrosh Hellscream, and will instead become a rare drop (like Invincibles Reins, Mimirons Head, etc.).\\r\\nAll other loot, achievements, and cosmetic rewards (e.g. the Korkron Dark Shaman transmog set, rare battle pets, etc.) will remain unchanged.','0','Siege of Orgrimmar Changes in Patch 6.0 and Warlords of Draenor',1,'siege');

UNLOCK TABLES;

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

DROP TABLE IF EXISTS `slideshows`;

CREATE TABLE `slideshows` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `description` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `image` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `link` VARCHAR(255) CHARACTER SET utf8 DEFAULT '#',
  `duration` VARCHAR(2) CHARACTER SET utf8 NOT NULL DEFAULT '7',
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `slideshows` */

LOCK TABLES `slideshows` WRITE;

INSERT  INTO `slideshows`(`id`,`title`,`description`,`image`,`link`,`duration`) VALUES
(1,'Diablo','Digital Loot Awaits','XBMCY795QIMR1393316955771.jpg','#','7'),
(2,'HearthStone','Heroes Of WarCraft','58NEEFYFHHW81390833342761.jpg','#','7'),
(3,'New Mount','New Mount Available Now','584E4NWRVHUA1390557025404.jpg','#','7');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
