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
(4,'menu-media','media','媒体','Media','Media','Medios','Médias','Μέσα','Media','자료실','Mídia','Материалы','媒體'),
(5,'menu-forums','forum','论坛','Foren','Forums','Foros','Forums','Φόρουμ','Forum','토론장','Fóruns','Форумы','討論區'),
(6,'menu-services','shop','服务','Shop','Shop','Tienda','Boutique','Μαγαζί','Negozio','구매','Loja','Магазин','購買');

UNLOCK TABLES;
