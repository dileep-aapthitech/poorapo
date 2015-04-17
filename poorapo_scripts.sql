
/*[11:44:33 AM][1461 ms]*/ ALTER TABLE `poraapo_db`.`tbl_categories` ADD COLUMN `category_type_id` INT(11) NULL AFTER `modified_at`;

CREATE TABLE `tbl_category_types` (
  `category_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_type_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`category_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


/*[2:11:04 PM][1249 ms]*/ ALTER TABLE `poraapo_db`.`tbl_issues` DROP COLUMN `issue_type`; 

/*[1:06:28 PM][1971 ms]*/ ALTER TABLE `poraapo_db`.`tbl_issues` ADD COLUMN `total_likes` INT(11) DEFAULT 0 NULL AFTER `modified_at`; 


/*[5:14:26 PM][3470 ms]*/ ALTER TABLE `poraapo_db`.`tbl_issues` ADD COLUMN `total_shares` INT(11) DEFAULT 0 NULL AFTER `total_likes`;

/*[11:47:22 AM][851 ms]*/ ALTER TABLE `poraapo_db`.`tbl_likes` ADD COLUMN `like_value` TINYINT(4) NULL AFTER `modified_at`; 
 
