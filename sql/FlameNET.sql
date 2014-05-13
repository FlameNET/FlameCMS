/*
SQLyog Ultimate v8.82 
MySQL - 5.5.27 : Database - FlameNET
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `news` */

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

INSERT  INTO `news`(`id`,`author`,`date`,`content`,`contentlnk`,`title`,`comments`,`image`) VALUES 
(1,1,'2014-05-04 00:00:00','<p>In the recent <a href=\"http://us.battle.net/wow/en/blog/13942448/\" target=\"_blank\">Dev Watercooler: Raiding Azeroth Part 3—Warlords of Draenor</a>, we discussed some of the raid changes coming in the next WoW expansion. Before Warlords of Draenor launches, players will have a chance to experience the new raid structure firsthand in the Siege of Orgrimmar.</p>\r\n<p>In the upcoming Patch 6.0, the pre-expansion “systems” update planned to go live in the weeks leading up to Warlords of Draenor’s release, we’ll be converting Siege of Orgrimmar to use the new Normal, Heroic, and Mythic difficulties. Both Normal and Heroic difficulties will support flexible raid sizes and our cross-server Group Finder tool, while Mythic will be a fixed 20-player size. At the same time, “<a href=\"http://us.battle.net/wow/en/blog/13107743\" target=\"_blank\">stat squish</a>” will be in effect, the new class changes will be live, and Hit and Expertise will no longer be stats on items, so those will be replaced with more useful ones on all existing items. The raid as a whole will be retuned for the new numbers and scaling size—overall, it should prove no more difficult than it is currently, and will likely be easier in many places.</p>\r\n<p>With the end of an expansion and a raid tier, along with introduction of a new level cap, we’ll also be retiring a handful of rewards. We want to encourage everyone to enjoy one last hurrah in the Siege of Orgrimmar before your adventure on Draenor begins.</p>\r\n<p style=\"text-align: center;\"><img alt=\"5.4_roundup_dividerb_585x50.jpg\" data-id=\"10816346\" src=\"https://bnetcmsus-a.akamaihd.net/cms/content_folder_media/0F2XDN6DHRSP1377900398270.jpg\" /></p>\r\n<p><strong>In addition to the above changes, when Patch 6.0 arrives:</strong></p>\r\n<ul>\r\n<li>Flexible Raid difficulty will cease to exist as it does now, and will be removed from the raid queue interface. The new Normal difficulty of Siege of Orgrimmar will offer a similar experience to that of Flexible Raid.</li>\r\n<li>The new Group Finder tool will be available, designed to help players create and find groups for Normal and Heroic Siege of Orgrimmar and other cross-realm group content.</li>\r\n<li>Siege of Orgrimmar achievements will be relabeled according to the new difficulty structure (e.g. “Heroic: Malkorok” will now be “Mythic: Malkorok”). Credit for these will be retroactively awarded to players who earned them before Patch 6.0.</li>\r\n<li>The Garrosh Hellscream “<a href=\"http://www.wowhead.com/achievement=8399/ahead-of-the-curve-garrosh-hellscream-25-player\" target=\"_blank\">Ahead of the Curve</a>” and “<a href=\"http://www.wowhead.com/achievement=8400/cutting-edge-garrosh-hellscream-10-player\" target=\"_blank\">Cutting Edge</a>” Feats of Strength will cease to be obtainable.\r\n<ul style=\"list-style-type:circle;\">\r\n<li>This means that the Kor’kron War Wolf, awarded by the “Ahead of the Curve” Feat of Strength, will also cease to be obtainable upon release of the pre-expansion Patch 6.0.</li>\r\n</ul>\r\n</li>\r\n<li>With the release of Patch 6.0, the drop rate of the Heirloom weapons from Garrosh Hellscream on Normal, Heroic, and Mythic difficulties will be <u>significantly increased</u>.\r\n<ul style=\"list-style-type:circle;\">\r\n<li>Players who have yet to get any Heirlooms will have a <strong>100%</strong> (<em>guaranteed</em>) chance of getting a spec-appropriate Heirloom when defeating Garrosh on Normal difficulty or higher.</li>\r\n<li>The chance of receiving additional Heirlooms beyond the first will also be increased.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p style=\"text-align: center;\"><img alt=\"5.4_roundup_divider5_585x50.jpg\" data-id=\"10795152\" src=\"https://bnetcmsus-a.akamaihd.net/cms/gallery/HEW1QVB1484Q1377731386847.jpg\" /></p>\r\n<p><strong>When Warlords of Draenor is released and players are able to head to Draenor and level past 90:</strong></p>\r\n<ul>\r\n<li>Garrosh Hellscream will no longer drop Heirloom weapons.</li>\r\n<li>The <a href=\"http://us.battle.net/wow/en/item/104253\" target=\"_blank\">Kor’kron Juggernaut</a> mount will cease being a guaranteed drop from Mythic Garrosh Hellscream, and will instead become a rare drop (like <a href=\"http://us.battle.net/wow/en/item/50818\">Invincible’s Reins</a>, <a href=\"http://us.battle.net/wow/en/item/45693\">Mimiron’s Head</a>, etc.).</li>\r\n</ul>\r\n<p>All other loot, achievements, and cosmetic rewards (e.g. the Kor’kron Dark Shaman transmog set, rare battle pets, etc.) will remain unchanged.</p>','0','Siege of Orgrimmar Changes in Patch 6.0 and Warlords of Draenor',1,'siege');

/*Table structure for table `slideshows` */

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

INSERT  INTO `slideshows`(`id`,`title`,`description`,`image`,`link`,`duration`) VALUES
 (1,'Diablo','Digital Loot Awaits','XBMCY795QIMR1393316955771.jpg','#','7'),
 (2,'HearthStone','Heroes Of WarCraft','58NEEFYFHHW81390833342761.jpg','#','7'),
 (3,'New Mount','New Mount Available Now','584E4NWRVHUA1390557025404.jpg','#','7');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
