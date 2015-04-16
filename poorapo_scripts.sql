
/*[11:44:33 AM][1461 ms]*/ ALTER TABLE `poraapo_db`.`tbl_categories` ADD COLUMN `category_type_id` INT(11) NULL AFTER `modified_at`;

CREATE TABLE `tbl_category_types` (
  `category_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_type_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`category_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
