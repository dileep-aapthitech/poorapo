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

/*Table structure for table `session` */

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `id` char(32) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL,
  `modified` int(11) DEFAULT NULL,
  `lifetime` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `session` */

insert  into `session`(`id`,`name`,`modified`,`lifetime`,`data`) values ('b7q7dtnntr65p1ls550to69sg1','PHPSESSID',1429103357,1800,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429103356.9646239;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('g2kvrc9ds87hhl5ba8qtiebg65','PHPSESSID',1429193490,1800,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429193490.8451951;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}');

/*Table structure for table `tbl_bachelore_degrees` */

DROP TABLE IF EXISTS `tbl_bachelore_degrees`;

CREATE TABLE `tbl_bachelore_degrees` (
  `degree_id` int(10) NOT NULL AUTO_INCREMENT,
  `degree_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`degree_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bachelore_degrees` */

insert  into `tbl_bachelore_degrees`(`degree_id`,`degree_name`,`status`,`created_at`,`modified_at`) values (1,'Degree1',1,'2015-04-16 10:49:10','2015-04-16 10:49:14'),(2,'Degree2',1,'2015-04-16 10:49:24','2015-04-16 10:49:27'),(3,'Degree3',1,'2015-04-16 10:49:39','2015-04-16 10:49:41'),(4,'Degree4',1,'2015-04-16 10:50:00','2015-04-16 10:50:03'),(5,'Degree',1,'2015-04-16 10:50:15','2015-04-16 10:50:17');

/*Table structure for table `tbl_categories` */

DROP TABLE IF EXISTS `tbl_categories`;

CREATE TABLE `tbl_categories` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `category_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_categories` */

insert  into `tbl_categories`(`category_id`,`category_name`,`status`,`created_at`,`modified_at`,`category_type_id`) values (1,'Category1',1,'2015-04-16 10:50:53','2015-04-16 10:51:02',2),(2,'Category2',1,'2015-04-16 10:50:57','2015-04-16 10:51:04',2),(3,'Category3',1,'2015-04-16 10:50:55','2015-04-16 10:51:05',2),(4,'Category4',1,'2015-04-16 10:50:59',NULL,2);

/*Table structure for table `tbl_category_types` */

DROP TABLE IF EXISTS `tbl_category_types`;

CREATE TABLE `tbl_category_types` (
  `category_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_type_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`category_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_category_types` */

insert  into `tbl_category_types`(`category_type_id`,`category_type_name`,`created_at`,`modified_at`) values (1,'Page','2015-04-16 14:20:48','2015-04-16 14:20:50'),(2,'Menu','2015-04-16 14:20:56','2015-04-16 14:20:59');

/*Table structure for table `tbl_colleges` */

DROP TABLE IF EXISTS `tbl_colleges`;

CREATE TABLE `tbl_colleges` (
  `college_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) DEFAULT NULL,
  `state_id` int(10) DEFAULT NULL,
  `district_id` int(10) DEFAULT NULL,
  `college_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_colleges` */

insert  into `tbl_colleges`(`college_id`,`country_id`,`state_id`,`district_id`,`college_name`,`status`,`created_at`,`modified_at`) values (1,1,1,1,'CollegeName1',1,'2015-04-16 10:51:47','2015-04-16 10:51:50'),(2,1,1,1,'CollegeName2',1,'2015-04-16 10:52:04','2015-04-16 10:52:06'),(3,1,1,1,'CollegeName3',1,'2015-04-16 10:52:35','2015-04-16 10:52:38'),(4,1,1,1,NULL,NULL,NULL,NULL);

/*Table structure for table `tbl_countries` */

DROP TABLE IF EXISTS `tbl_countries`;

CREATE TABLE `tbl_countries` (
  `id_countries` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`id_countries`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_countries` */

insert  into `tbl_countries`(`id_countries`,`name`,`status`) values (1,'India',1),(2,'USA',1);

/*Table structure for table `tbl_districts` */

DROP TABLE IF EXISTS `tbl_districts`;

CREATE TABLE `tbl_districts` (
  `district_id` int(10) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(150) DEFAULT NULL,
  `state_id` int(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_districts` */

insert  into `tbl_districts`(`district_id`,`district_name`,`state_id`,`status`,`created_at`,`modified_at`) values (1,'DistrictName1',1,1,'2015-04-16 10:54:06','2015-04-16 10:54:09'),(2,'DistrictName2',1,1,'2015-04-16 10:54:23','2015-04-16 10:54:26'),(3,'DistrictName3',1,1,'2015-04-16 10:54:35','2015-04-16 10:54:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_entrance_exam` */

insert  into `tbl_entrance_exam`(`entrance_exam_id`,`country_id`,`entrance_exam_name`,`status`,`created_at`,`modified_at`) values (1,1,'Emacet',1,'2015-04-15 15:52:03','2015-04-15 15:52:12'),(2,2,'Tofil',1,'2015-04-16 11:32:09','2015-04-16 11:32:10');

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

/*Table structure for table `tbl_masters_degree` */

DROP TABLE IF EXISTS `tbl_masters_degree`;

CREATE TABLE `tbl_masters_degree` (
  `masters_degree_id` int(10) NOT NULL AUTO_INCREMENT,
  `mas_degree_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`masters_degree_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_masters_degree` */

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

/*Table structure for table `tbl_specialization` */

DROP TABLE IF EXISTS `tbl_specialization`;

CREATE TABLE `tbl_specialization` (
  `specialined_id` int(10) NOT NULL AUTO_INCREMENT,
  `specialined_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`specialined_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_specialization` */

insert  into `tbl_specialization`(`specialined_id`,`specialined_name`,`status`,`created_at`,`modified_at`) values (1,'SpecializationsName1',1,'2015-04-16 11:33:23','2015-04-16 11:33:35'),(2,'SpecializationsName2',1,'2015-04-16 11:33:24','2015-04-16 11:33:37'),(3,'SpecializationsName3',1,'2015-04-16 11:33:29','2015-04-16 11:33:39'),(4,'SpecializationsName4',1,'2015-04-16 11:33:27','2015-04-16 11:33:40'),(5,'SpecializationsName5',1,'2015-04-16 11:33:30','2015-04-16 11:33:42');

/*Table structure for table `tbl_states` */

DROP TABLE IF EXISTS `tbl_states`;

CREATE TABLE `tbl_states` (
  `state_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) DEFAULT NULL,
  `id_countries` bigint(20) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  KEY `idx_ts_ci` (`id_countries`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_states` */

insert  into `tbl_states`(`state_id`,`state_name`,`id_countries`,`status`) values (1,'AP',1,1),(2,'TS',1,1),(3,'KR',1,1);

/*Table structure for table `tbl_universities` */

DROP TABLE IF EXISTS `tbl_universities`;

CREATE TABLE `tbl_universities` (
  `unversity_id` int(10) NOT NULL AUTO_INCREMENT,
  `unversity_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`unversity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_universities` */

insert  into `tbl_universities`(`unversity_id`,`unversity_name`,`status`,`created_at`,`modified_at`) values (1,'UnvesityName1',1,'2015-04-16 11:34:55','2015-04-16 11:34:56'),(2,'UnvesityName2',1,'2015-04-16 11:35:19','2015-04-16 11:35:25'),(3,'UnvesityName3',1,'2015-04-16 11:35:20','2015-04-16 11:35:26'),(4,'UnvesityName4',1,'2015-04-16 11:35:22','2015-04-16 11:35:28'),(5,'UnvesityName5',1,'2015-04-16 11:35:23',NULL);

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
