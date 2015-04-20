/*
SQLyog Community v11.52 (32 bit)
MySQL - 5.5.36-34.2-log : Database - poraapo7_poraapo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`poraapo7_poraapo` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `poraapo7_poraapo`;

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

insert  into `session`(`id`,`name`,`modified`,`lifetime`,`data`) values ('v7b4gb8heqie4o11n68j33naa0','PHPSESSID',1429524111,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429524111.1753470897674560546875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('ogsn16e4p1m074u5kos9m32n43','PHPSESSID',1429522390,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429522390.931262969970703125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('8dp5a39fcrh4siqd76ghgud9q5','PHPSESSID',1429525579,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429525579.475204944610595703125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('saq2ed4218b1jfs47rjul4m4h4','PHPSESSID',1429522390,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429522390.0948688983917236328125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('8e4pvn766h7nbeh77qulpjjm73','PHPSESSID',1429523917,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429523917.4172270298004150390625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}user|C:23:\"Zend\\Stdlib\\ArrayObject\":238:{a:4:{s:7:\"storage\";a:4:{s:8:\"username\";s:12:\"Venkata Siva\";s:5:\"email\";s:24:\"sivareddybtech@gmail.com\";s:7:\"user_id\";s:2:\"21\";s:9:\"user_type\";s:1:\"2\";}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('kt2ojcumfjsr45oaif90cptcd3','PHPSESSID',1429523599,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429523599.6841099262237548828125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('to72fghb2rrvm7ti1c46lfelv7','PHPSESSID',1429521899,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429521899.5653650760650634765625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('r2c3pa3n41elm3a3t0gf7srr55','PHPSESSID',1429521898,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429521898.5537159442901611328125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('qsmmg875rut4acq4544pl7ukv7','PHPSESSID',1429518630,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429518630.9002730846405029296875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('hmjvb47e83i3nstiinn84c6635','PHPSESSID',1429517964,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429517964.3617489337921142578125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('5lgmpv9o6qrcsm00bfeki5s8t1','PHPSESSID',1429518620,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429518620.5531580448150634765625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('nhgbr40sag640ft65c0hjghq40','PHPSESSID',1429517956,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429517956.1235659122467041015625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('qqqnvhovd3lcdbkp2fi4r7c402','PHPSESSID',1429525337,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429525337.545291900634765625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('r4j37jefmt52gl0t485mtk40u2','PHPSESSID',1429521422,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429521422.423760890960693359375;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('tdsablhvn289e3mh040bcargq2','PHPSESSID',1429517955,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429517955.15835094451904296875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('hsi1ov2614dtfargkgph5q8ot3','PHPSESSID',1429519267,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429519267.5116460323333740234375;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('ojr7kgfj40m5n5hi244l7nqfp5','PHPSESSID',1429521442,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429521442.930880069732666015625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}user|C:23:\"Zend\\Stdlib\\ArrayObject\":224:{a:4:{s:7:\"storage\";a:4:{s:8:\"username\";N;s:5:\"email\";s:28:\"bjp.murali.krishna@gmail.com\";s:7:\"user_id\";s:2:\"19\";s:9:\"user_type\";s:1:\"2\";}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('mn09co3292er657bdf9p33t5p7','PHPSESSID',1429521578,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429521578.6604940891265869140625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('u76ojc8l7ggr0v2l18d4e67gd1','PHPSESSID',1429514662,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514662.093041896820068359375;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('aqr3ol01m1441cj96oi34a8626','PHPSESSID',1429514661,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514661.9092400074005126953125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('p7nsoi5dqihrub88n9r42aqf45','PHPSESSID',1429514661,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514661.7501070499420166015625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('3o6rflnovp3mn6hfetqi3n0ne4','PHPSESSID',1429514661,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514661.5858180522918701171875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('naei1gptlasft70epbph3e78v6','PHPSESSID',1429514661,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514661.4419689178466796875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('d48tv3j19tj9nqlps94v7csv31','PHPSESSID',1429514661,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514661.2608280181884765625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('khlnbv4a0a0dc43mptd3uj5b63','PHPSESSID',1429514661,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514661.092133045196533203125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('nir3uj5jr5juk61p90sou20a15','PHPSESSID',1429514660,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514660.9110190868377685546875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('8i9so5stig2kgagkh61emivs76','PHPSESSID',1429514660,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514660.738874912261962890625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('e7jol5tihv5hdbsa5o39e7khq1','PHPSESSID',1429514660,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514660.5283119678497314453125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('c30s3c20s2lcr1gn7cciigp511','PHPSESSID',1429514660,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514660.3388049602508544921875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('1td36luj8cquv6srgbh0p07230','PHPSESSID',1429514660,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514660.1372430324554443359375;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('sr15nlqfv82ta5e0pgph0jho26','PHPSESSID',1429514659,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514659.94130611419677734375;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('ok90a6dtgktdhod6208ihvrkj7','PHPSESSID',1429520863,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429520863.0935308933258056640625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('k717a0pmk1ol2817o2mresmj35','PHPSESSID',1429514659,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514659.4822089672088623046875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('6ktqj9gkohpgu3ls0kv1rdecp4','PHPSESSID',1429523356,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429523356.5795600414276123046875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('d7cq2had9ppq7kra0rtkbf3103','PHPSESSID',1429514904,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514904.07363605499267578125;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('ba2lk35nuc8rj1ihe39gt5e9l2','PHPSESSID',1429514659,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514659.7522299289703369140625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('r49esf2i8drici403meqro0ie7','PHPSESSID',1429514707,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514707.51673793792724609375;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('cnn42hkq1r4nh7caegm3pl42g7','PHPSESSID',1429514581,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429514581.4464490413665771484375;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('67n0cnaufqte2e3ald237ssv01','PHPSESSID',1429515724,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429515724.723536968231201171875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":220:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";a:4:{i:0;s:7:\"storage\";i:1;s:4:\"flag\";i:2;s:13:\"iteratorClass\";i:3;s:19:\"protectedProperties\";}}}'),('red33hscauvdmkd1vria1ok7s1','PHPSESSID',1429513715,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429513715.06346988677978515625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('omqfr5t8lfuqj22opucu61g9r3','PHPSESSID',1429523527,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429523527.07303905487060546875;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}user|C:23:\"Zend\\Stdlib\\ArrayObject\":238:{a:4:{s:7:\"storage\";a:4:{s:8:\"username\";s:12:\"Venkata Siva\";s:5:\"email\";s:24:\"sivareddybtech@gmail.com\";s:7:\"user_id\";s:2:\"21\";s:9:\"user_type\";s:1:\"2\";}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}'),('a1go0iim7pfn9ssbl1vo2arch0','PHPSESSID',1429515520,1440,'__ZF|a:1:{s:20:\"_REQUEST_ACCESS_TIME\";d:1429515520.882450103759765625;}initialized|C:23:\"Zend\\Stdlib\\ArrayObject\":127:{a:4:{s:7:\"storage\";a:1:{s:4:\"init\";i:1;}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}user|C:23:\"Zend\\Stdlib\\ArrayObject\":234:{a:4:{s:7:\"storage\";a:4:{s:8:\"username\";s:8:\"Bhargava\";s:5:\"email\";s:25:\"bhargava.aapthi@gmail.com\";s:7:\"user_id\";s:2:\"17\";s:9:\"user_type\";s:1:\"1\";}s:4:\"flag\";i:2;s:13:\"iteratorClass\";s:13:\"ArrayIterator\";s:19:\"protectedProperties\";N;}}');

/*Table structure for table `tbl_bachelore_degrees` */

DROP TABLE IF EXISTS `tbl_bachelore_degrees`;

CREATE TABLE `tbl_bachelore_degrees` (
  `degree_id` int(10) NOT NULL AUTO_INCREMENT,
  `degree_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`degree_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bachelore_degrees` */

insert  into `tbl_bachelore_degrees`(`degree_id`,`degree_name`,`status`,`created_at`,`modified_at`) values (1,'BTECH',1,'2015-04-17 19:45:36','2015-04-17 19:45:38'),(2,'BSC',1,'2015-04-17 19:45:48','2015-04-17 19:45:50'),(3,'BCOM',1,'2015-04-17 19:46:00','2015-04-17 19:46:02'),(4,'BE',1,'2015-04-17 19:46:17','2015-04-17 19:46:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_categories` */

insert  into `tbl_categories`(`category_id`,`category_name`,`status`,`created_at`,`modified_at`,`category_type_id`) values (1,'Education',1,'2015-04-16 11:15:09','2015-04-18 01:37:36',2),(2,'Sports',1,'2015-04-16 11:15:44','2015-04-16 11:15:47',2),(3,'Movies',1,'2015-04-16 11:16:02','2015-04-18 02:56:05',2),(4,'News',1,'2015-04-16 12:45:06','2015-04-16 12:45:09',2),(5,'Pages',1,'2015-04-16 15:46:52','2015-04-16 15:46:55',1),(8,'is hyphenated category name working',1,'2015-04-18 21:37:50','2015-04-19 09:52:10',2),(9,'Health',1,'2015-04-19 09:50:41','2015-04-19 09:50:41',2);

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

insert  into `tbl_category_types`(`category_type_id`,`category_type_name`,`created_at`,`modified_at`) values (1,'Page','2015-04-16 11:27:50','2015-04-16 11:27:55'),(2,'Menu','2015-04-16 11:28:02','2015-04-16 11:28:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_colleges` */

insert  into `tbl_colleges`(`college_id`,`country_id`,`state_id`,`district_id`,`college_name`,`status`,`created_at`,`modified_at`) values (1,1,1,4,'CHSK',1,'2015-04-17 19:43:04','2015-04-17 19:43:06'),(2,1,1,5,'MUM',1,'2015-04-17 19:43:28','2015-04-17 19:43:30'),(3,1,2,6,'SRH',1,'2015-04-17 19:43:56','2015-04-17 19:43:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_districts` */

insert  into `tbl_districts`(`district_id`,`district_name`,`state_id`,`status`,`created_at`,`modified_at`) values (4,'GUNTUR',1,1,'2015-04-17 19:41:50','2015-04-17 19:41:52'),(5,'KRISHNA',1,1,'2015-04-17 19:42:06','2015-04-17 19:42:09'),(6,'RR',2,1,'2015-04-17 19:42:19','2015-04-17 19:42:21'),(7,'SEC',2,1,'2015-04-17 19:42:35','2015-04-17 19:42:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_entrance_exam` */

insert  into `tbl_entrance_exam`(`entrance_exam_id`,`country_id`,`entrance_exam_name`,`status`,`created_at`,`modified_at`) values (1,1,'Emacet',1,'2015-04-15 15:52:03','2015-04-15 15:52:12'),(2,2,'Tofil',1,'2015-04-17 19:44:54','2015-04-17 19:44:56'),(3,2,'Mfil',1,'2015-04-17 19:45:05','2015-04-17 19:45:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_forget_tokens` */

insert  into `tbl_forget_tokens`(`forget_pwd_id`,`user_id`,`email`,`token_id`,`status`,`created_at`) values (3,NULL,'bhargava.aapthi@gmail.com','d05de94854',1,'2015-04-18 04:23:28'),(4,13,'admin@gmail.com','e19e422c8c',1,'2015-04-19 00:31:04');

/*Table structure for table `tbl_issues` */

DROP TABLE IF EXISTS `tbl_issues`;

CREATE TABLE `tbl_issues` (
  `issue_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(150) DEFAULT NULL,
  `issue_title` varchar(150) DEFAULT NULL,
  `issue_decription` text,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `total_likes` int(11) DEFAULT '0',
  `total_shares` int(11) DEFAULT '0',
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_issues` */

insert  into `tbl_issues`(`issue_id`,`category_id`,`issue_title`,`issue_decription`,`status`,`created_at`,`modified_at`,`total_likes`,`total_shares`) values (1,1,'Rote Learning','The education system encourages a lot of rote learning. The education system encourages a lot of rote learning.The education system encourages a lot of rote learning.The education system encourages a lot of rote learning.The education system encourages a lot of rote learning.The education system encourages a lot of rote learning.',1,'2015-04-16 13:55:24','2015-04-18 00:00:00',2,0),(2,2,'Lack of Awareness','Sports is not paid proper attention in India. Sports is not paid proper attention in India. Sports is not paid proper attention in India.',1,'2015-04-16 14:20:06','2015-04-18 00:00:00',2,0),(3,1,'Physical Fitness','Sports not proper part of cirriculum , so physiclal fitness of students not ',1,'2015-04-16 14:28:27','2015-04-18 00:00:00',1,0),(4,3,'Imitation','People in India imitate movie heros a lot...People in India imitate movie heros a lot...People in India imitate movie heros a lot...People in India imitate movie heros a lot...People in India imitate movie heros a lot...People in India imitate movie heros a lot...People in India imitate movie heros a lot...',1,'2015-04-16 14:28:43','2015-04-19 00:00:00',10,1),(5,3,'Uniqueness','Indian movies have a unique story line and feel. Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.Indian movies have a unique story line and feel.',1,'2015-04-16 15:47:45','2015-04-18 00:00:00',2,2),(6,5,'CMSPage1Iss','	<div class=\"mar_t page-header pad_0\">\r\n		<h1 id=\"forms\">Privacy Policy</h1>\r\n	</div>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading1</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading2</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading3</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading4</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',1,'2015-04-16 15:47:50','2015-04-16 15:47:52',0,0),(8,5,'Footer','<div class=\"row\">\r\n<div class=\"col-md-3\">\r\n<h2>Navigation</h2>\r\n<ul class=\"list-unstyled\">\r\n<li><a href=\"/cms/Home-11\">Home</a></li>\r\n<li><a href=\"/cms/About-Us-12\">About us</a></li>\r\n<li><a href=\"/cms/Refunds-Payments-13\">Payments &amp; Refunds</a></li>\r\n<li><a href=\"http://poraapo.com/users/contact-us\">Contact</a></li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-md-3\">\r\n<h2>Other Links</h2>\r\n<ul class=\"list-unstyled\">\r\n<li><a href=\"/cms/Terms-&amp;-Conditions-9\">Terms &amp; Conditions</a></li>\r\n<li><a href=\"/cms/Disclaimers-10\">Disclaimers</a></li>\r\n<li><a href=\"/cms/Privacy-&amp;-Policies-6\">Privacy &amp; Policies</a></li>\r\n<li><a href=\"/cms/Complaints-&amp;-Grievance-Redressal-15\">Complaints &amp; Grievance Redressal</a></li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-md-3\">\r\n<h2>Address</h2>\r\n\r\n<p>Join Poraapo Movement<br />\r\nTiananmen Square<br />\r\nDongcheng, Beijing,&nbsp;China<br />\r\nEmail: <a href=\"mailto:poraapo@poraapo.org\">poraapo@poraapo.org</a><br />\r\nPhone: 9999999999</p>\r\n</div>\r\n\r\n<div class=\"col-md-3\">\r\n<h2>Follow us</h2>\r\n<span class=\"social_icons\"><a href=\"#\"><img alt=\"facebook\" src=\"http://poraapo.com/public/img/facebook.png\" title=\"Facebook\" /></a> <a href=\"#\"><img alt=\"twitter\" src=\"http://poraapo.com/public/img/twitter.png\" title=\"Twitter\" /></a> <a href=\"#\"><img alt=\"google+\" src=\"http://poraapo.com/public/img/google+.png\" title=\"Google+\" /></a></span>\r\n</div>\r\n</div>\r\n',1,'2015-04-17 00:00:00','2015-04-20 00:00:00',0,0),(9,5,'Terms & Conditions','	<div class=\"mar_t page-header pad_0\">\r\n		<h1 id=\"forms\">Terms & Conditions</h1>\r\n	</div>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading1</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading2</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading3</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading4</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',1,'2015-04-17 00:00:00','2015-04-17 00:00:00',0,0),(10,5,'Disclaimers','	<div class=\"mar_t page-header pad_0\">\r\n		<h1 id=\"forms\">Disclaimers</h1>\r\n	</div>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading1</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading2</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading3</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading4</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',1,'2015-04-17 00:00:00','2015-04-17 00:00:00',0,0),(11,5,'Home','	<div class=\"mar_t page-header pad_0\">\r\n		<h1 id=\"forms\">Home Page</h1>\r\n	</div>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading1</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading2</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading3</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading4</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',1,'2015-04-17 00:00:00','2015-04-17 00:00:00',0,0),(12,5,'About Us','	<div class=\"mar_t page-header pad_0\">\r\n		<h1 id=\"forms\">About Us</h1>\r\n	</div>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading1</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading2</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading3</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading4</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',1,'2015-04-17 00:00:00','2015-04-17 00:00:00',0,0),(13,5,'Payments','	<div class=\"mar_t page-header pad_0\">\r\n		<h1 id=\"forms\">Payments & Refunds</h1>\r\n	</div>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading1</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading2</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading3</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading4</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',1,'2015-04-17 00:00:00','2015-04-17 00:00:00',0,0),(14,5,'Contact','	<div class=\"mar_t page-header pad_0\">\r\n		<h1 id=\"forms\">Contact</h1>\r\n	</div>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading1</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading2</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading3</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n	<h2>Heading4</h2>\r\n	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n',1,'2015-04-17 00:00:00','2015-04-17 00:00:00',0,0),(15,5,'Complaints & Grievance Redressal','<div class=\"mar_t page-header pad_0\">\r\n<h1>Complaints &amp; Grievances</h1>\r\n</div>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Heading1</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Heading2</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Heading3</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Heading4</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n',1,'2015-04-17 00:00:00','2015-04-18 00:00:00',0,0),(16,4,'News channels','<p>Over last decade, 24X7 news channels have become common in india. They have to show a lot content all the time and are in the race for TRPs.</p>\r\n',1,'2015-04-18 00:00:00','2015-04-18 00:00:00',2,0),(17,7,'abcd','<p><strong>Lorem Ipsum</strong><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans; font-size:11px\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum <u>has been the</u> industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</span></p>\r\n',1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1,1),(18,8,'is hyphenated working?','<p>testing hyphenated url</p>\r\n',1,'2015-04-18 00:00:00','2015-04-20 00:00:00',0,0),(19,9,'Health issue','<p>hkjhkhj</p>\r\n',1,'2015-04-19 00:00:00','2015-04-20 00:00:00',1,0);

/*Table structure for table `tbl_likes` */

DROP TABLE IF EXISTS `tbl_likes`;

CREATE TABLE `tbl_likes` (
  `liked_id` int(10) NOT NULL AUTO_INCREMENT,
  `liked_from` int(25) DEFAULT NULL COMMENT 'logged user id',
  `issue_id` int(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `like_value` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`liked_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_likes` */

insert  into `tbl_likes`(`liked_id`,`liked_from`,`issue_id`,`status`,`created_at`,`modified_at`,`like_value`) values (1,17,4,1,'2015-04-17 00:00:00','2015-04-17 00:00:00',1),(2,17,3,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(3,17,2,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(4,13,17,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(5,17,1,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(6,17,16,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(7,17,5,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(8,13,16,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(9,13,5,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(10,13,2,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',0),(11,13,4,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(12,13,3,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',0),(13,13,1,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',1),(14,13,18,1,'2015-04-18 00:00:00','2015-04-18 00:00:00',0),(15,17,18,1,'2015-04-19 00:00:00','2015-04-19 00:00:00',0),(16,19,19,1,'2015-04-20 00:00:00','2015-04-20 00:00:00',1);

/*Table structure for table `tbl_masters_degree` */

DROP TABLE IF EXISTS `tbl_masters_degree`;

CREATE TABLE `tbl_masters_degree` (
  `masters_degree_id` int(10) NOT NULL AUTO_INCREMENT,
  `mas_degree_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`masters_degree_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_masters_degree` */

insert  into `tbl_masters_degree`(`masters_degree_id`,`mas_degree_name`,`status`,`created_at`,`modified_at`) values (1,'MCA',1,'2015-04-17 19:40:06','2015-04-17 19:40:10'),(2,'MTECH',1,'2015-04-17 19:40:21','2015-04-17 19:40:23'),(3,'MPhil',1,'2015-04-17 19:40:39','2015-04-17 19:40:42'),(4,'MSC',1,'2015-04-17 19:40:55','2015-04-17 19:40:57'),(5,'MBA',1,'2015-04-17 19:41:06','2015-04-17 19:41:08');

/*Table structure for table `tbl_shares` */

DROP TABLE IF EXISTS `tbl_shares`;

CREATE TABLE `tbl_shares` (
  `shared_id` int(15) NOT NULL AUTO_INCREMENT,
  `shared_from_email` text COMMENT 'Logged user id',
  `issue_id` int(13) DEFAULT NULL,
  `shared_to_email` text,
  `shared_message` text,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`shared_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_shares` */

insert  into `tbl_shares`(`shared_id`,`shared_from_email`,`issue_id`,`shared_to_email`,`shared_message`,`status`,`created_at`,`modified_at`) values (16,'bhargava.aapthi@gmail.com',4,'dileepkumarkonda@gmail.com','my message',1,'2015-04-17 00:00:00','2015-04-17 00:00:00'),(17,'bhargava.aapthi@gmail.com',5,'gsreedhara@gmail.com','my testing message',1,'2015-04-17 00:00:00','2015-04-17 00:00:00'),(18,NULL,NULL,NULL,NULL,1,'2015-04-18 00:00:00','2015-04-18 00:00:00'),(19,'bhargava.aapthi@gmail.com',5,'dileepkumarkonda@gmail.com','movies category testing',1,'2015-04-18 00:00:00','2015-04-18 00:00:00'),(20,'admin@gmail.com',17,'bjp.murali.krishna@gmail.com','It is okay',1,'2015-04-18 00:00:00','2015-04-18 00:00:00'),(21,NULL,NULL,NULL,NULL,1,'2015-04-19 00:00:00','2015-04-19 00:00:00');

/*Table structure for table `tbl_specialization` */

DROP TABLE IF EXISTS `tbl_specialization`;

CREATE TABLE `tbl_specialization` (
  `specialined_id` int(10) NOT NULL AUTO_INCREMENT,
  `specialined_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`specialined_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_specialization` */

insert  into `tbl_specialization`(`specialined_id`,`specialined_name`,`status`,`created_at`,`modified_at`) values (1,'Spec1',1,'2015-04-17 19:38:51','2015-04-17 19:38:53'),(2,'Spec2',1,'2015-04-17 19:38:56','2015-04-17 19:38:58'),(3,'Spec3',1,'2015-04-17 19:39:14','2015-04-17 19:39:16'),(4,'Spec4',1,'2015-04-17 19:39:26','2015-04-17 19:39:28');

/*Table structure for table `tbl_states` */

DROP TABLE IF EXISTS `tbl_states`;

CREATE TABLE `tbl_states` (
  `state_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) DEFAULT NULL,
  `id_countries` bigint(20) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  KEY `idx_ts_ci` (`id_countries`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_states` */

insert  into `tbl_states`(`state_id`,`state_name`,`id_countries`,`status`) values (1,'Ap',1,1),(2,'TS',1,1),(3,'KR',1,1),(4,'US1',2,1),(5,'US2',2,1);

/*Table structure for table `tbl_universities` */

DROP TABLE IF EXISTS `tbl_universities`;

CREATE TABLE `tbl_universities` (
  `unversity_id` int(10) NOT NULL AUTO_INCREMENT,
  `unversity_name` varchar(150) DEFAULT NULL,
  `status` smallint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`unversity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_universities` */

insert  into `tbl_universities`(`unversity_id`,`unversity_name`,`status`,`created_at`,`modified_at`) values (1,'Andhara',1,'2015-04-17 19:37:23','2015-04-17 19:37:26'),(2,'OU',1,'2015-04-17 19:37:37','2015-04-17 19:37:39'),(3,'JNTU',1,'2015-04-17 19:37:54','2015-04-17 19:37:57'),(4,'Kakatiya',NULL,NULL,NULL);

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
  `entrance_exam_1` varchar(150) DEFAULT NULL,
  `which_year_1` varchar(150) DEFAULT NULL,
  `entrance_rank_1` varchar(150) DEFAULT NULL,
  `entrance_exam_2` varchar(150) DEFAULT NULL,
  `which_year_2` varchar(150) DEFAULT NULL,
  `entrance_rank_2` varchar(150) DEFAULT NULL,
  `entrance_exam_3` varchar(150) DEFAULT NULL,
  `which_year_3` varchar(150) DEFAULT NULL,
  `entrance_rank_3` varchar(150) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_education_info` */

insert  into `tbl_user_education_info`(`education_info_id`,`user_id`,`college_name`,`principal_name`,`principal_phone_num`,`principal_email_id`,`entrance_exam`,`which_year`,`entrance_rank`,`entrance_exam_1`,`which_year_1`,`entrance_rank_1`,`entrance_exam_2`,`which_year_2`,`entrance_rank_2`,`entrance_exam_3`,`which_year_3`,`entrance_rank_3`,`bachelors_degree_name`,`bachelors_university_name`,`bachelors_college`,`bachelors_specialization`,`bachelors_year_admission`,`masters_degree`,`masters_university`,`masters_college`,`masters_specialization`,`masters_year_admission`,`doctorate_name`,`doctorate_college`,`doctorate_university`,`doctorate_specialization`,`doctorate_year`,`modified_at`) values (10,14,'1','Principal Name','85800222765','dkonda@gmail.com','1','1960','1520',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','1','1','1976','1','1','1','1','1961','PHD','1','1','1','1978','2015-04-17 09:21:05'),(11,15,'1','Principal Name','858888888','princpal@gmail.com','1','1960','150',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2','2','1','1976','1','1','1','1','1977','phd','1','1','1','1978','2015-04-17 09:30:23'),(12,16,'1','Principal Name','8555555','princiapal@gmail.com','1','1960','15000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2','1','1','1','1977','1','1','1','1','1976','PHD','2','1','2','1977','2015-04-17 10:06:50'),(13,17,'1','Prin1','96582145','prin1@gmail.com','1','2014','114',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3','1','2','2','1995','1','3','3','4','2006','PHD','2','3','3','2011','2015-04-17 10:15:11'),(14,18,'1','Ghakja','8500222765','dkonda@gmail.com','1','1960','1500',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','1','1','1976','1','1','1','1','1976','PHD','1','1','1','1976','2015-04-17 10:16:22'),(15,19,'','','','','1','1963','88','','','','','','',NULL,NULL,NULL,'','','','','','','','','','','','','','','','2015-04-20 02:48:28'),(16,21,'1','','','','1','1962','455466','','','','','','',NULL,NULL,NULL,'1','3','1','1','2014','2','3','3','1','2014','','','','','','2015-04-20 04:45:04'),(17,22,'1','princiapl','850222765','d@gmail.com','1','1988','858585','1','1982','855515','','','',NULL,NULL,NULL,'1','1','1','2','1977','1','1','1','2','1977','PhD','1','1','2','1962','2015-04-20 04:59:05'),(18,23,'1','naga','99999999999999','55555555','1','1990','45632','','','','','','',NULL,NULL,NULL,'2','1','1','1','1978','1','1','1','1','1978','','','','','','2015-04-20 05:12:10');

/*Table structure for table `tbl_user_personal_info` */

DROP TABLE IF EXISTS `tbl_user_personal_info`;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_personal_info` */

insert  into `tbl_user_personal_info`(`detailed_id`,`user_id`,`first_name`,`last_name`,`gender`,`date_of_birth`,`mobile_number`,`id_countries`,`state_id`,`district_id`,`parents_name`,`user_parent_lastname`,`p_phone_number`,`p_email_id`,`p_address`,`p_pincode`,`permanent_address`,`permant_pincode`,`annual_family_income`,`family_net_worth`,`employee_ctc`,`modified_at`) values (12,14,'First Name','Last Name','Male','5/10/1987','8500222765',1,1,4,'Parent First Name','Parent Last Name','8500222765','dkonda@aapthitech.com',NULL,'500045',NULL,'500048','1575000','1545451','','2015-04-17 09:21:05'),(13,15,'First Name','Last NAme','Male','5/10/1987','8500222765',1,1,4,'Parent First Name','Parent Last Name','8500222765','email@gmail.com',NULL,'855555',NULL,'5225626','5465654','3252152136','','2015-04-17 09:30:23'),(14,16,'First Name','Last Name','Male','','8500222765',1,1,4,'Parent First Name','Parent Last Name','8500222465','dkonda@aapthitech.com',NULL,'888888',NULL,'888888','588484444','48848484','','2015-04-17 10:06:50'),(15,17,'Bhargava','S','Male','7/3/1975','9390031881',1,1,4,'Gopala','S','9390036527','gsreedhara@gmail.com',NULL,'560047',NULL,'560047','100000','200000','','2015-04-17 10:15:11'),(16,18,'First Namr','Last Name','Male','18/9/1977','8500222765',1,1,4,'Parent First naem','Parent Last Name','850022765','d@gmail.com',NULL,'540005',NULL,'8855555','88748444','485564546','','2015-04-17 10:16:22'),(17,19,'Murali','Krishna','Male','17/2/1977','99',1,0,0,'','','','',NULL,'',NULL,'','','','77','2015-04-20 02:48:28'),(18,21,'Venkata Siva','Reddy','Male','1/5/1991','8686151775',1,1,4,'','','','',NULL,'',NULL,'','','','sfsdg','2015-04-20 04:45:04'),(19,22,'First Name','Last Name','Male','5/10/1987','8500222765',1,1,4,'Parent First Name','Last Name','8500222765','email@gmail.com',NULL,'8555555',NULL,'8502227','87985181','74457447','','2015-04-20 04:59:05'),(20,23,'nagaraju','Nizampatnam','Male','10/8/1988','9908085650',1,1,4,'venkateswarlu','nizampatnam','9908085654','venki@gmail.com',NULL,'522329',NULL,'522329','30000','5','','2015-04-20 05:12:10');

/*Table structure for table `tbl_user_type` */

DROP TABLE IF EXISTS `tbl_user_type`;

CREATE TABLE `tbl_user_type` (
  `user_type_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User Type Id',
  `user_type_name` varchar(150) DEFAULT NULL COMMENT 'Types of users using this app.',
  `status` smallint(5) DEFAULT NULL COMMENT 'Status',
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_type` */

insert  into `tbl_user_type`(`user_type_id`,`user_type_name`,`status`) values (1,'12th Class Student',1),(2,'employee',1),(3,'UG/PG/PhD Student',1),(4,'admin',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`user_type_id`,`user_name`,`email_id`,`password`,`created_at`,`status`) values (13,4,'Admin','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','2015-04-17 17:51:10',1),(15,1,NULL,'dileepkumarkonda@gmail.com','ea452f3b31ac158c119a0b295740d63e','2015-04-17 09:30:23',1),(16,1,NULL,'dkonda@aaapthitech.com','ceb79d629eeae8276ebbc618e67719e1','2015-04-17 10:06:50',1),(17,1,'Bhargava','bhargava.aapthi@gmail.com','934b535800b1cba8f96a5d72f72f1611','2015-04-17 10:15:11',1),(18,1,NULL,'dileep@gmail.com','0152720d790e53a35c18fce36c0c6ba0','2015-04-17 10:15:33',1),(19,2,NULL,'bjp.murali.krishna@gmail.com','f93af8eac597a0cff5426a4d7601b7bc','2015-04-20 02:48:28',1),(21,2,NULL,'sivareddybtech@gmail.com','1955b38f13116a57e4de2134a139d139','2015-04-20 04:37:30',1),(22,1,NULL,'dkonda@aapthitech.com','81395dbb86d84c109e3c400fafaf92d1','2015-04-20 04:59:05',1),(23,1,NULL,'nnnagaraju740@gmail.com','3df9b5ff18db0be438a43eae2f975821','2015-04-20 05:12:10',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
