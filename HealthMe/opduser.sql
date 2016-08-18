/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.1.73-community : Database - audit
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `main_stat_login` */

CREATE TABLE `main_stat_login` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `offid` varchar(540) DEFAULT NULL,
  `login_time` time DEFAULT NULL,
  `login_date` date DEFAULT NULL,
  `username` varchar(540) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=940 DEFAULT CHARSET=utf8;

/*Table structure for table `opduser` */

CREATE TABLE `opduser` (
  `loginname` char(20) NOT NULL,
  `password` char(50) DEFAULT NULL,
  `code` char(4) DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`loginname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
