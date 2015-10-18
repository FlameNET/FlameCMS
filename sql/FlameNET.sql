/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
  `avatar` VARCHAR(55) NOT NULL DEFAULT 'avatar.jpg' COMMENT 'User Avatar',
  `rol` INT(1) NOT NULL DEFAULT '1',
  `activation_code` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_account` (`rol`),
  CONSTRAINT `FK_account` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `account` */

LOCK TABLES `account` WRITE;

UNLOCK TABLES;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_ver` */

LOCK TABLES `cms_ver` WRITE;

INSERT  INTO `cms_ver`(`id`,`pack`,`progress`,`ddmmyyyy`,`hour`,`commit`,`version`,`last_update`) VALUES
(1,'1','0.2','2015-01-10','23:27:29','11','0.0.1','2015-01-10 22:10:39');

UNLOCK TABLES;

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE IF NOT EXISTS `countries` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `countryName` VARCHAR(255) COLLATE utf8_bin NOT NULL,
  `isoAlpha2` VARCHAR(2) COLLATE utf8_bin NOT NULL,
  `isoAlpha3` VARCHAR(3) COLLATE utf8_bin NOT NULL,
  `numeric_code` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=250;

/*Data for the table `countries` */

LOCK TABLES `countries` WRITE;

INSERT INTO `countries` (`id`, `countryName`, `isoAlpha2`, `isoAlpha3`, `numeric_code`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 4),
(2, '&#197;land Islands', 'AX', 'ALA', 248),
(3, 'Albania', 'AL', 'ALB', 8),
(4, 'Algeria', 'DZ', 'DZA', 12),
(5, 'American Samoa', 'AS', 'ASM', 16),
(6, 'Andorra', 'AD', 'AND', 20),
(7, 'Angola', 'AO', 'AGO', 24),
(8, 'Anguilla', 'AI', 'AIA', 660),
(9, 'Antarctica', 'AQ', 'ATA', 10),
(10, 'Antigua and Barbuda', 'AG', 'ATG', 28),
(11, 'Argentina', 'AR', 'ARG', 32),
(12, 'Armenia', 'AM', 'ARM', 51),
(13, 'Aruba', 'AW', 'ABW', 533),
(14, 'Australia', 'AU', 'AUS', 36),
(15, 'Austria', 'AT', 'AUT', 40),
(16, 'Azerbaijan', 'AZ', 'AZE', 31),
(17, 'Bahamas', 'BS', 'BHS', 44),
(18, 'Bahrain', 'BH', 'BHR', 48),
(19, 'Bangladesh', 'BD', 'BGD', 50),
(20, 'Barbados', 'BB', 'BRB', 52),
(21, 'Belarus', 'BY', 'BLR', 112),
(22, 'Belgium', 'BE', 'BEL', 56),
(23, 'Belize', 'BZ', 'BLZ', 84),
(24, 'Benin', 'BJ', 'BEN', 204),
(25, 'Bermuda', 'BM', 'BMU', 60),
(26, 'Bhutan', 'BT', 'BTN', 64),
(27, 'Bolivia, Plurinational State of', 'BO', 'BOL', 68),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', 535),
(29, 'Bosnia and Herzegovina', 'BA', 'BIH', 70),
(30, 'Botswana', 'BW', 'BWA', 72),
(31, 'Bouvet Island', 'BV', 'BVT', 74),
(32, 'Brazil', 'BR', 'BRA', 76),
(33, 'British Indian Ocean Territory', 'IO', 'IOT', 86),
(34, 'Brunei Darussalam', 'BN', 'BRN', 96),
(35, 'Bulgaria', 'BG', 'BGR', 100),
(36, 'Burkina Faso', 'BF', 'BFA', 854),
(37, 'Burundi', 'BI', 'BDI', 108),
(38, 'Cambodia', 'KH', 'KHM', 116),
(39, 'Cameroon', 'CM', 'CMR', 120),
(40, 'Canada', 'CA', 'CAN', 124),
(41, 'Cape Verde', 'CV', 'CPV', 132),
(42, 'Cayman Islands', 'KY', 'CYM', 136),
(43, 'Central African Republic', 'CF', 'CAF', 140),
(44, 'Chad', 'TD', 'TCD', 148),
(45, 'Chile', 'CL', 'CHL', 152),
(46, 'China', 'CN', 'CHN', 156),
(47, 'Christmas Island', 'CX', 'CXR', 162),
(48, 'Cocos (Keeling) Islands', 'CC', 'CCK', 166),
(49, 'Colombia', 'CO', 'COL', 170),
(50, 'Comoros', 'KM', 'COM', 174),
(51, 'Congo', 'CG', 'COG', 178),
(52, 'Congo, the Democratic Republic of the', 'CD', 'COD', 180),
(53, 'Cook Islands', 'CK', 'COK', 184),
(54, 'Costa Rica', 'CR', 'CRI', 188),
(55, 'C&#244;te d''Ivoire', 'CI', 'CIV', 384),
(56, 'Croatia', 'HR', 'HRV', 191),
(57, 'Cuba', 'CU', 'CUB', 192),
(58, 'Cura', 'CW', 'CUW', 531),
(59, 'Cyprus', 'CY', 'CYP', 196),
(60, 'Czech Republic', 'CZ', 'CZE', 203),
(61, 'Denmark', 'DK', 'DNK', 208),
(62, 'Djibouti', 'DJ', 'DJI', 262),
(63, 'Dominica', 'DM', 'DMA', 212),
(64, 'Dominican Republic', 'DO', 'DOM', 214),
(65, 'Ecuador', 'EC', 'ECU', 218),
(66, 'Egypt', 'EG', 'EGY', 818),
(67, 'El Salvador', 'SV', 'SLV', 222),
(68, 'Equatorial Guinea', 'GQ', 'GNQ', 226),
(69, 'Eritrea', 'ER', 'ERI', 232),
(70, 'Estonia', 'EE', 'EST', 233),
(71, 'Ethiopia', 'ET', 'ETH', 231),
(72, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 238),
(73, 'Faroe Islands', 'FO', 'FRO', 234),
(74, 'Fiji', 'FJ', 'FJI', 242),
(75, 'Finland', 'FI', 'FIN', 246),
(76, 'France', 'FR', 'FRA', 250),
(77, 'French Guiana', 'GF', 'GUF', 254),
(78, 'French Polynesia', 'PF', 'PYF', 258),
(79, 'French Southern Territories', 'TF', 'ATF', 260),
(80, 'Gabon', 'GA', 'GAB', 266),
(81, 'Gambia', 'GM', 'GMB', 270),
(82, 'Georgia', 'GE', 'GEO', 268),
(83, 'Germany', 'DE', 'DEU', 276),
(84, 'Ghana', 'GH', 'GHA', 288),
(85, 'Gibraltar', 'GI', 'GIB', 292),
(86, 'Greece', 'GR', 'GRC', 300),
(87, 'Greenland', 'GL', 'GRL', 304),
(88, 'Grenada', 'GD', 'GRD', 308),
(89, 'Guadeloupe', 'GP', 'GLP', 312),
(90, 'Guam', 'GU', 'GUM', 316),
(91, 'Guatemala', 'GT', 'GTM', 320),
(92, 'Guernsey', 'GG', 'GGY', 831),
(93, 'Guinea', 'GN', 'GIN', 324),
(94, 'Guinea-Bissau', 'GW', 'GNB', 624),
(95, 'Guyana', 'GY', 'GUY', 328),
(96, 'Haiti', 'HT', 'HTI', 332),
(97, 'Heard Island and McDonald Islands', 'HM', 'HMD', 334),
(98, 'Holy See (Vatican City State)', 'VA', 'VAT', 336),
(99, 'Honduras', 'HN', 'HND', 340),
(100, 'Hong Kong', 'HK', 'HKG', 344),
(101, 'Hungary', 'HU', 'HUN', 348),
(102, 'Iceland', 'IS', 'ISL', 352),
(103, 'India', 'IN', 'IND', 356),
(104, 'Indonesia', 'ID', 'IDN', 360),
(105, 'Iran, Islamic Republic of', 'IR', 'IRN', 364),
(106, 'Iraq', 'IQ', 'IRQ', 368),
(107, 'Ireland', 'IE', 'IRL', 372),
(108, 'Isle of Man', 'IM', 'IMN', 833),
(109, 'Israel', 'IL', 'ISR', 376),
(110, 'Italy', 'IT', 'ITA', 380),
(111, 'Jamaica', 'JM', 'JAM', 388),
(112, 'Japan', 'JP', 'JPN', 392),
(113, 'Jersey', 'JE', 'JEY', 832),
(114, 'Jordan', 'JO', 'JOR', 400),
(115, 'Kazakhstan', 'KZ', 'KAZ', 398),
(116, 'Kenya', 'KE', 'KEN', 404),
(117, 'Kiribati', 'KI', 'KIR', 296),
(118, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 408),
(119, 'Korea, Republic of', 'KR', 'KOR', 410),
(120, 'Kuwait', 'KW', 'KWT', 414),
(121, 'Kyrgyzstan', 'KG', 'KGZ', 417),
(122, 'Lao People''s Democratic Republic', 'LA', 'LAO', 418),
(123, 'Latvia', 'LV', 'LVA', 428),
(124, 'Lebanon', 'LB', 'LBN', 422),
(125, 'Lesotho', 'LS', 'LSO', 426),
(126, 'Liberia', 'LR', 'LBR', 430),
(127, 'Libya', 'LY', 'LBY', 434),
(128, 'Liechtenstein', 'LI', 'LIE', 438),
(129, 'Lithuania', 'LT', 'LTU', 440),
(130, 'Luxembourg', 'LU', 'LUX', 442),
(131, 'Macao', 'MO', 'MAC', 446),
(132, 'Macedonia, the former Yugoslav Republic of', 'MK', 'MKD', 807),
(133, 'Madagascar', 'MG', 'MDG', 450),
(134, 'Malawi', 'MW', 'MWI', 454),
(135, 'Malaysia', 'MY', 'MYS', 458),
(136, 'Maldives', 'MV', 'MDV', 462),
(137, 'Mali', 'ML', 'MLI', 466),
(138, 'Malta', 'MT', 'MLT', 470),
(139, 'Marshall Islands', 'MH', 'MHL', 584),
(140, 'Martinique', 'MQ', 'MTQ', 474),
(141, 'Mauritania', 'MR', 'MRT', 478),
(142, 'Mauritius', 'MU', 'MUS', 480),
(143, 'Mayotte', 'YT', 'MYT', 175),
(144, 'Mexico', 'MX', 'MEX', 484),
(145, 'Micronesia, Federated States of', 'FM', 'FSM', 583),
(146, 'Moldova, Republic of', 'MD', 'MDA', 498),
(147, 'Monaco', 'MC', 'MCO', 492),
(148, 'Mongolia', 'MN', 'MNG', 496),
(149, 'Montenegro', 'ME', 'MNE', 499),
(150, 'Montserrat', 'MS', 'MSR', 500),
(151, 'Morocco', 'MA', 'MAR', 504),
(152, 'Mozambique', 'MZ', 'MOZ', 508),
(153, 'Myanmar', 'MM', 'MMR', 104),
(154, 'Namibia', 'NA', 'NAM', 516),
(155, 'Nauru', 'NR', 'NRU', 520),
(156, 'Nepal', 'NP', 'NPL', 524),
(157, 'Netherlands', 'NL', 'NLD', 528),
(158, 'New Caledonia', 'NC', 'NCL', 540),
(159, 'New Zealand', 'NZ', 'NZL', 554),
(160, 'Nicaragua', 'NI', 'NIC', 558),
(161, 'Niger', 'NE', 'NER', 562),
(162, 'Nigeria', 'NG', 'NGA', 566),
(163, 'Niue', 'NU', 'NIU', 570),
(164, 'Norfolk Island', 'NF', 'NFK', 574),
(165, 'Northern Mariana Islands', 'MP', 'MNP', 580),
(166, 'Norway', 'NO', 'NOR', 578),
(167, 'Oman', 'OM', 'OMN', 512),
(168, 'Pakistan', 'PK', 'PAK', 586),
(169, 'Palau', 'PW', 'PLW', 585),
(170, 'Palestine, State of', 'PS', 'PSE', 275),
(171, 'Panama', 'PA', 'PAN', 591),
(172, 'Papua New Guinea', 'PG', 'PNG', 598),
(173, 'Paraguay', 'PY', 'PRY', 600),
(174, 'Peru', 'PE', 'PER', 604),
(175, 'Philippines', 'PH', 'PHL', 608),
(176, 'Pitcairn', 'PN', 'PCN', 612),
(177, 'Poland', 'PL', 'POL', 616),
(178, 'Portugal', 'PT', 'PRT', 620),
(179, 'Puerto Rico', 'PR', 'PRI', 630),
(180, 'Qatar', 'QA', 'QAT', 634),
(181, 'R&#233;union', 'RE', 'REU', 638),
(182, 'Romania', 'RO', 'ROU', 642),
(183, 'Russian Federation', 'RU', 'RUS', 643),
(184, 'Rwanda', 'RW', 'RWA', 646),
(185, 'Saint Barthélemy', 'BL', 'BLM', 652),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', 654),
(187, 'Saint Kitts and Nevis', 'KN', 'KNA', 659),
(188, 'Saint Lucia', 'LC', 'LCA', 662),
(189, 'Saint Martin (French part)', 'MF', 'MAF', 663),
(190, 'Saint Pierre and Miquelon', 'PM', 'SPM', 666),
(191, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 670),
(192, 'Samoa', 'WS', 'WSM', 882),
(193, 'San Marino', 'SM', 'SMR', 674),
(194, 'Sao Tome and Principe', 'ST', 'STP', 678),
(195, 'Saudi Arabia', 'SA', 'SAU', 682),
(196, 'Senegal', 'SN', 'SEN', 686),
(197, 'Serbia', 'RS', 'SRB', 688),
(198, 'Seychelles', 'SC', 'SYC', 690),
(199, 'Sierra Leone', 'SL', 'SLE', 694),
(200, 'Singapore', 'SG', 'SGP', 702),
(201, 'Sint Maarten (Dutch part)', 'SX', 'SXM', 534),
(202, 'Slovakia', 'SK', 'SVK', 703),
(203, 'Slovenia', 'SI', 'SVN', 705),
(204, 'Solomon Islands', 'SB', 'SLB', 90),
(205, 'Somalia', 'SO', 'SOM', 706),
(206, 'South Africa', 'ZA', 'ZAF', 710),
(207, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 239),
(208, 'South Sudan', 'SS', 'SSD', 728),
(209, 'Spain', 'ES', 'ESP', 724),
(210, 'Sri Lanka', 'LK', 'LKA', 144),
(211, 'Sudan', 'SD', 'SDN', 729),
(212, 'Suriname', 'SR', 'SUR', 740),
(213, 'Svalbard and Jan Mayen', 'SJ', 'SJM', 744),
(214, 'Swaziland', 'SZ', 'SWZ', 748),
(215, 'Sweden', 'SE', 'SWE', 752),
(216, 'Switzerland', 'CH', 'CHE', 756),
(217, 'Syrian Arab Republic', 'SY', 'SYR', 760),
(218, 'Taiwan, Province of China', 'TW', 'TWN', 158),
(219, 'Tajikistan', 'TJ', 'TJK', 762),
(220, 'Tanzania, United Republic of', 'TZ', 'TZA', 834),
(221, 'Thailand', 'TH', 'THA', 764),
(222, 'Timor-Leste', 'TL', 'TLS', 626),
(223, 'Togo', 'TG', 'TGO', 768),
(224, 'Tokelau', 'TK', 'TKL', 772),
(225, 'Tonga', 'TO', 'TON', 776),
(226, 'Trinidad and Tobago', 'TT', 'TTO', 780),
(227, 'Tunisia', 'TN', 'TUN', 788),
(228, 'Turkey', 'TR', 'TUR', 792),
(229, 'Turkmenistan', 'TM', 'TKM', 795),
(230, 'Turks and Caicos Islands', 'TC', 'TCA', 796),
(231, 'Tuvalu', 'TV', 'TUV', 798),
(232, 'Uganda', 'UG', 'UGA', 800),
(233, 'Ukraine', 'UA', 'UKR', 804),
(234, 'United Arab Emirates', 'AE', 'ARE', 784),
(235, 'United Kingdom', 'GB', 'GBR', 826),
(236, 'United States', 'US', 'USA', 840),
(237, 'United States Minor Outlying Islands', 'UM', 'UMI', 581),
(238, 'Uruguay', 'UY', 'URY', 858),
(239, 'Uzbekistan', 'UZ', 'UZB', 860),
(240, 'Vanuatu', 'VU', 'VUT', 548),
(241, 'Venezuela, Bolivarian Republic of', 'VE', 'VEN', 862),
(242, 'Viet Nam', 'VN', 'VNM', 704),
(243, 'Virgin Islands, British', 'VG', 'VGB', 92),
(244, 'Virgin Islands, U.S.', 'VI', 'VIR', 850),
(245, 'Wallis and Futuna', 'WF', 'WLF', 876),
(246, 'Western Sahara', 'EH', 'ESH', 732),
(247, 'Yemen', 'YE', 'YEM', 887),
(248, 'Zambia', 'ZM', 'ZMB', 894),
(249, 'Zimbabwe', 'ZW', 'ZWE', 716);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

LOCK TABLES `menu` WRITE;

INSERT  INTO `menu`(`Id`,`menu_class`,`menu_url`,`menu_cn`,`menu_de`,`menu_en`,`menu_es`,`menu_fr`,`menu_gr`,`menu_it`,`menu_ko`,`menu_pt`,`menu_ru`,`menu_tw`) VALUES 
(1,'menu-home','','主页','Hauptseite','Home','Principal','Accueil','Αρχική','Home','홈페이지','In&iacute;cio','Главная','購買'),
(2,'menu-game','game','游戏指南','Spiel','Game Guide','Juego','Jeu','Οδηγός','Gioco','게임 가이드','Jogo','Игра','遊戲'),
(3,'menu-community','community','社区','Community','Community','Comunidad','Communauté','Κοινότητα','Comunità','커뮤니티','Comunidade','Сообщество','社群'),
(4,'menu-media','media','媒体','Media','Media','Medios','Médias','Μέσα','Media','자료실','M&eacute;dia','Материалы','媒體'),
(5,'menu-forums','forum','论坛','Foren','Forums','Foros','Forums','Φόρουμ','Forum','토론장','F&oacute;runs','Форумы','討論區'),
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

/*Table structure for table `realms` */
DROP TABLE IF EXISTS `realms`;

CREATE TABLE `realms` (
  `Id` INT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `realmName` VARCHAR(55) NOT NULL DEFAULT 'FlameCMS',
  `rate` VARCHAR(20) NOT NULL DEFAULT 'x1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `realms` */

LOCK TABLES `realms` WRITE;

UNLOCK TABLES;

/*Table structure for table `roles_permissions` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` INT(2) NOT NULL,
  `roles` VARCHAR(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

LOCK TABLES `roles` WRITE;

INSERT  INTO `roles`(`id`,`roles`) VALUES
(0,'Banned'),
(1,'Player'),
(2,'Moderator'),
(3,'Game Master'),
(4,'Administrator'),
(5,'Owner');

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

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
