-----------------------
-- Alter roles account
-- --------------------
ALTER TABLE `roles_permissions` DROP COLUMN `permissions`;
INSERT INTO `roles_permissions`(`id`,`roles`,`permissions`) VALUES ( '0','Banned');
ALTER TABLE `roles_permissions`  ENGINE=INNODB AUTO_INCREMENT=0 COMMENT='' ROW_FORMAT=DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ;
DROP TABLE `roles_account_permissions`;
ALTER TABLE `account` CHANGE `roles_account` `roles_account` INT(1) DEFAULT '1' NOT NULL;
ALTER TABLE `account` CHANGE `roles_account` `rol` INT(1) DEFAULT '1' NOT NULL;
ALTER TABLE `account` CHANGE `Id` `Id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '' FIRST, CHANGE `first_name` `first_name` VARCHAR(35) NOT NULL COLLATE utf8_general_ci DEFAULT '' COMMENT '' AFTER `Id`, CHANGE `last_name` `last_name` VARCHAR(35) NOT NULL COLLATE utf8_general_ci DEFAULT '' COMMENT '' AFTER `first_name`, CHANGE `email` `email` VARCHAR(25) NOT NULL COLLATE utf8_general_ci DEFAULT '' COMMENT 'example@example.com' AFTER `last_name`, CHANGE `password` `password` VARCHAR(44) NOT NULL COLLATE utf8_general_ci DEFAULT '' COMMENT '' AFTER `email`, CHANGE `secret_question` `secret_question` VARCHAR(35) NOT NULL COLLATE utf8_general_ci DEFAULT '' COMMENT '' AFTER `password`, CHANGE `answer_question` `answer_question` VARCHAR(35) NOT NULL COLLATE utf8_general_ci DEFAULT '' COMMENT '' AFTER `secret_question`, CHANGE `country` `country` VARCHAR(15) NOT NULL COLLATE utf8_general_ci DEFAULT '' COMMENT '' AFTER `answer_question`, CHANGE `date_of_birth` `date_of_birth` VARCHAR(25) NOT NULL COLLATE utf8_general_ci DEFAULT '' COMMENT '' AFTER `country`, CHANGE `avatar` `avatar` VARCHAR(55) NOT NULL COLLATE utf8_general_ci DEFAULT 'avatar.jpg' COMMENT 'User Avatar' AFTER `date_of_birth`, CHANGE `rol` `rol` INT(1) NOT NULL DEFAULT '1' COMMENT '' AFTER `avatar`, CHANGE `activation_code` `activation_code` VARCHAR(255) NULL COLLATE utf8_general_ci COMMENT '' AFTER `rol`;
RENAME TABLE `roles_permissions` TO `roles`;
ALTER TABLE `roles` CHANGE `id` `id` INT(2) NOT NULL,    ADD PRIMARY KEY(`id`);
ALTER TABLE `account` ADD CONSTRAINT `FK_account` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON UPDATE CASCADE ;
