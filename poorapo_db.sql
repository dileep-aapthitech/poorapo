/*
SQLyog Community v11.52 (32 bit)
MySQL - 5.6.17 : Database - poraapo_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`poraapo_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `poraapo_db`;

/*Table structure for table `tbl_categories` */

DROP TABLE IF EXISTS `tbl_categories`;

CREATE TABLE `tbl_categories` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_categories` */

/*Table structure for table `tbl_countries` */

DROP TABLE IF EXISTS `tbl_countries`;

CREATE TABLE `tbl_countries` (
  `id_countries` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`id_countries`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_countries` */

/*Table structure for table `tbl_districts` */

DROP TABLE IF EXISTS `tbl_districts`;

CREATE TABLE `tbl_districts` (
  `district_id` int(10) NOT NULL AUTO_INCREMENT,
  `state_id` int(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_districts` */

/*Table structure for table `tbl_entrance_exam` */

DROP TABLE IF EXISTS `tbl_entrance_exam`;

CREATE TABLE `tbl_entrance_exam` (
  `entrance_exam_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(150) DEFAULT NULL,
  `entrance_exam_name` varchar(150) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`entrance_exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_entrance_exam` */

/*Table structure for table `tbl_forget_tokens` */

DROP TABLE IF EXISTS `tbl_forget_tokens`;

CREATE TABLE `tbl_forget_tokens` (
  `forget_pwd_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `token_id` varchar(50) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`forget_pwd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_forget_tokens` */

/*Table structure for table `tbl_issues` */

DROP TABLE IF EXISTS `tbl_issues`;

CREATE TABLE `tbl_issues` (
  `issue_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(150) DEFAULT NULL,
  `issue_title` varchar(150) DEFAULT NULL,
  `issue_decription` text,
  `issue_type` varchar(60) DEFAULT NULL COMMENT 'Whether issue or cms page.',
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_issues` */

/*Table structure for table `tbl_likes` */

DROP TABLE IF EXISTS `tbl_likes`;

CREATE TABLE `tbl_likes` (
  `liked_id` int(10) NOT NULL AUTO_INCREMENT,
  `liked_from` int(25) DEFAULT NULL COMMENT 'logged user id',
  `issue_id` int(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`liked_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_likes` */

/*Table structure for table `tbl_shares` */

DROP TABLE IF EXISTS `tbl_shares`;

CREATE TABLE `tbl_shares` (
  `shared_id` int(15) NOT NULL AUTO_INCREMENT,
  `shared_from` int(150) DEFAULT NULL COMMENT 'Logged user id',
  `issue_id` int(150) DEFAULT NULL,
  `shared_to_email` varchar(150) DEFAULT NULL,
  `shared_message` text,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`shared_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_shares` */

/*Table structure for table `tbl_states` */

DROP TABLE IF EXISTS `tbl_states`;

CREATE TABLE `tbl_states` (
  `state_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) DEFAULT NULL,
  `id_countries` bigint(20) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  KEY `idx_ts_ci` (`id_countries`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_states` */

/*Table structure for table `tbl_user_education_info` */

DROP TABLE IF EXISTS `tbl_user_education_info`;

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
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`education_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_education_info` */

/*Table structure for table `tbl_user_personal_info` */

DROP TABLE IF EXISTS `tbl_user_personal_info`;

CREATE TABLE `tbl_user_personal_info` (
  `detailed_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `date_of_birth` varchar(150) DEFAULT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `id_countries` int(150) DEFAULT NULL,
  `state_id` int(150) DEFAULT NULL,
  `district_id` int(150) DEFAULT NULL,
  `parents _name` varchar(150) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_personal_info` */

/*Table structure for table `tbl_user_type` */

DROP TABLE IF EXISTS `tbl_user_type`;

CREATE TABLE `tbl_user_type` (
  `user_type_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User Type Id',
  `user_type_name` varchar(150) DEFAULT NULL COMMENT 'Types of users using this app.',
  `status` smallint(5) DEFAULT NULL COMMENT 'Status',
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_type` */

insert  into `tbl_user_type`(`user_type_id`,`user_type_name`,`status`) values (1,'student',1),(2,'employee',1);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User id',
  `user_type_id` int(10) DEFAULT NULL COMMENT 'User Type Id',
  `user_name` varchar(150) DEFAULT NULL COMMENT 'User name',
  `email_id` varchar(150) DEFAULT NULL COMMENT 'Email',
  `password` varchar(150) DEFAULT NULL COMMENT 'Password',
  `created_at` datetime DEFAULT NULL COMMENT 'Created date and time',
  `status` smallint(5) DEFAULT NULL COMMENT 'status',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
