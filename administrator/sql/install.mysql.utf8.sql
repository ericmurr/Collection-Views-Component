CREATE TABLE IF NOT EXISTS `#__collectionviews_collectionitem` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`catid` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,
`file` VARCHAR(255)  NOT NULL ,
`note` TEXT NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__collectionviews_arrangement` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`catid` INT NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`password` VARCHAR(255)  NOT NULL ,
`items` VARCHAR(255)  NOT NULL ,
`item_ids` TEXT NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

