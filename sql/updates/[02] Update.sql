/*Table structure for table `news` */
DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `content` text,
  `contentlnk` text,
  `title` text,
  `comments` int(10) DEFAULT '0',
  `image` varchar(255) DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `news` */

LOCK TABLES `news` WRITE;

INSERT  INTO `news`(`id`,`author`,`date`,`content`,`contentlnk`,`title`,`comments`,`image`) VALUES
(1,1,'2014-05-04 00:00:00','In the recent Dev Watercooler: Raiding Azeroth Part 3 Warlords of Draenor, we discussed some of the raid changes coming in the next WoW expansion. Before Warlords of Draenor launches, players will have a chance to experience the new raid structure firsthand in the Siege of Orgrimmar.\\r\\n\\r\\nIn the upcoming Patch 6.0, the pre-expansion systems update planned to go live in the weeks leading up to Warlords of Draenors release, well be converting Siege of Orgrimmar to use the new Normal, Heroic, and Mythic difficulties. Both Normal and Heroic difficulties will support flexible raid sizes and our cross-server Group Finder tool, while Mythic will be a fixed 20-player size. At the same time, stat squish will be in effect, the new class changes will be live, and Hit and Expertise will no longer be stats on items, so those will be replaced with more useful ones on all existing items. The raid as a whole will be retuned for the new numbers and scaling sizeoverall, it should prove no more difficult than it is currently, and will likely be easier in many places.\\r\\n\\r\\nWith the end of an expansion and a raid tier, along with introduction of a new level cap, we\\\'ll also be retiring a handful of rewards. We want to encourage everyone to enjoy one last hurrah in the Siege of Orgrimmar before your adventure on Draenor begins.\\r\\n\\r\\n\\r\\nIn addition to the above changes, when Patch 6.0 arrives:\\r\\n\\r\\nFlexible Raid difficulty will cease to exist as it does now, and will be removed from the raid queue interface. The new Normal difficulty of Siege of Orgrimmar will offer a similar experience to that of Flexible Raid.\\r\\nThe new Group Finder tool will be available, designed to help players create and find groups for Normal and Heroic Siege of Orgrimmar and other cross-realm group content.\\r\\nSiege of Orgrimmar achievements will be relabeled according to the new difficulty structure (e.g. Heroic: Malkorok will now be Mythic: Malkorok). Credit for these will be retroactively awarded to players who earned them before Patch 6.0.\\r\\nThe Garrosh Hellscream Ahead of the Curve and Cutting Edge Feats of Strength will cease to be obtainable.\\r\\nThis means that the Korkron War Wolf, awarded by the head of the Curve Feat of Strength, will also cease to be obtainable upon release of the pre-expansion Patch 6.0.\\r\\nWith the release of Patch 6.0, the drop rate of the Heirloom weapons from Garrosh Hellscream on Normal, Heroic, and Mythic difficulties will be significantly increased.\\r\\nPlayers who have yet to get any Heirlooms will have a 100% (guaranteed) chance of getting a spec-appropriate Heirloom when defeating Garrosh on Normal difficulty or higher.\\r\\nThe chance of receiving additional Heirlooms beyond the first will also be increased.\\r\\n\\r\\nWhen Warlords of Draenor is released and players are able to head to Draenor and level past 90:\\r\\n\\r\\nGarrosh Hellscream will no longer drop Heirloom weapons.\\r\\nThe Korkron Juggernaut mount will cease being a guaranteed drop from Mythic Garrosh Hellscream, and will instead become a rare drop (like Invincibles Reins, Mimirons Head, etc.).\\r\\nAll other loot, achievements, and cosmetic rewards (e.g. the Korkron Dark Shaman transmog set, rare battle pets, etc.) will remain unchanged.','0','Siege of Orgrimmar Changes in Patch 6.0 and Warlords of Draenor',1,'siege');
