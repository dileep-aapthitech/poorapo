
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

/* Please drop old  tbl_user_education_info */ 


CREATE TABLE `tbl_user_education_info` (
  `education_info_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(150) DEFAULT NULL,
  `college_name` varchar(150) DEFAULT NULL,
  `principal_name` varchar(150) DEFAULT NULL,
  `principal_phone_num` varchar(150) DEFAULT NULL,
  `principal_email_id` varchar(150) DEFAULT NULL,
  `entrance_exam` varchar(150) DEFAULT NULL,
  `which_year` varchar(150) DEFAULT NULL,
  `entrance_rank` varchar(150) DEFAULT NULL,
  `bachelors_degree_name` varchar(150) DEFAULT NULL,
  `bachelors_university_name` varchar(150) DEFAULT NULL,
  `bachelors_college` varchar(150) DEFAULT NULL,
  `bachelors_specialization` varchar(150) DEFAULT NULL,
  `bachelors_year_admission` varchar(150) DEFAULT NULL,
  `masters_degree` varchar(150) DEFAULT NULL,
  `masters_university` varchar(150) DEFAULT NULL,
  `masters_college` varchar(150) DEFAULT NULL,
  `masters_specialization` varchar(150) DEFAULT NULL,
  `masters_year_admission` varchar(150) DEFAULT NULL,
  `doctorate_name` varchar(150) DEFAULT NULL,
  `doctorate_college` varchar(150) DEFAULT NULL,
  `doctorate_university` varchar(150) DEFAULT NULL,
  `doctorate_specialization` varchar(150) DEFAULT NULL,
  `doctorate_year` varchar(150) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`education_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1


/* Please drop old  tbl_user_personal_info */ 

CREATE TABLE `tbl_user_personal_info` (
  `detailed_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `gender` varchar(150) DEFAULT NULL,
  `date_of_birth` varchar(150) DEFAULT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `id_countries` int(150) DEFAULT NULL,
  `state_id` int(150) DEFAULT NULL,
  `district_id` int(150) DEFAULT NULL,
  `parents_name` varchar(150) DEFAULT NULL,
  `user_parent_lastname` varchar(150) DEFAULT NULL,
  `p_phone_number` varchar(150) DEFAULT NULL,
  `p_email_id` varchar(150) DEFAULT NULL,
  `p_address` text,
  `p_pincode` varchar(25) DEFAULT NULL,
  `permanent_address` text,
  `permant_pincode` varchar(25) DEFAULT NULL,
  `annual_family_income` varchar(150) DEFAULT NULL,
  `family_net_worth` varchar(150) DEFAULT NULL,
  `employee_ctc` varchar(150) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`detailed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1

/* Please drop old  tbl_users */ 

CREATE TABLE `tbl_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User id',
  `user_type_id` int(10) DEFAULT NULL COMMENT 'User Type Id',
  `user_name` varchar(150) DEFAULT NULL COMMENT 'User name',
  `email_id` varchar(150) DEFAULT NULL COMMENT 'Email',
  `password` varchar(150) DEFAULT NULL COMMENT 'Password',
  `created_at` datetime DEFAULT NULL COMMENT 'Created date and time',
  `status` smallint(5) DEFAULT NULL COMMENT 'status',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1

/* Please drop old  tbl_districts */ 

CREATE TABLE `tbl_districts` (
  `district_id` int(10) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(150) DEFAULT NULL,
  `state_id` int(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1


