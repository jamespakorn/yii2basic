/*
SQLyog Ultimate v8.8 
MySQL - 5.0.51b-community-nt-log : Database - health_me
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`health_me` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `alcohol` */

DROP TABLE IF EXISTS `alcohol`;

CREATE TABLE `alcohol` (
  `id` int(2) default NULL,
  `name` char(10) default NULL,
  `al` int(2) default NULL,
  `ml` int(3) default NULL,
  `standard` float(2,2) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `alcohol` */

/*Table structure for table `ask_character` */

DROP TABLE IF EXISTS `ask_character`;

CREATE TABLE `ask_character` (
  `id` int(2) NOT NULL auto_increment,
  `gen` text,
  `sweet` text,
  `salty` text,
  `fat` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `ask_character` */

/*Table structure for table `ask_emotions` */

DROP TABLE IF EXISTS `ask_emotions`;

CREATE TABLE `ask_emotions` (
  `id` int(2) NOT NULL auto_increment,
  `ask` char(2) default NULL,
  `askn` char(50) default NULL,
  `ans` char(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `ask_emotions` */

/*Table structure for table `ask_food` */

DROP TABLE IF EXISTS `ask_food`;

CREATE TABLE `ask_food` (
  `id` int(2) NOT NULL auto_increment,
  `ask` char(2) default NULL,
  `askn` char(50) default NULL,
  `forward` char(2) default NULL,
  `ans` char(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `ask_food` */

/*Table structure for table `ask_work` */

DROP TABLE IF EXISTS `ask_work`;

CREATE TABLE `ask_work` (
  `id` int(2) NOT NULL auto_increment,
  `ask` char(2) default NULL,
  `askn` char(50) default NULL,
  `forward` char(2) default NULL,
  `ans` char(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `ask_work` */

/*Table structure for table `bmi` */

DROP TABLE IF EXISTS `bmi`;

CREATE TABLE `bmi` (
  `id` int(1) NOT NULL auto_increment,
  `gi` char(9) default NULL,
  `gname` char(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `bmi` */

/*Table structure for table `bp` */

DROP TABLE IF EXISTS `bp`;

CREATE TABLE `bp` (
  `id` int(1) NOT NULL auto_increment,
  `gi` char(9) default NULL,
  `gname` char(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `bp` */

/*Table structure for table `disease` */

DROP TABLE IF EXISTS `disease`;

CREATE TABLE `disease` (
  `id` int(3) NOT NULL auto_increment,
  `did` char(2) default NULL,
  `dname` char(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `disease` */

/*Table structure for table `disease_brain` */

DROP TABLE IF EXISTS `disease_brain`;

CREATE TABLE `disease_brain` (
  `id` int(2) NOT NULL auto_increment,
  `name` char(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `disease_brain` */

/*Table structure for table `disease_dm` */

DROP TABLE IF EXISTS `disease_dm`;

CREATE TABLE `disease_dm` (
  `id` int(2) NOT NULL auto_increment,
  `dm_name` char(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `disease_dm` */

/*Table structure for table `disease_heart` */

DROP TABLE IF EXISTS `disease_heart`;

CREATE TABLE `disease_heart` (
  `id` int(2) NOT NULL auto_increment,
  `name` char(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `disease_heart` */

/*Table structure for table `exercise` */

DROP TABLE IF EXISTS `exercise`;

CREATE TABLE `exercise` (
  `id` int(3) NOT NULL auto_increment,
  `disease` char(2) default NULL,
  `type` char(100) default NULL,
  `strength` char(100) default NULL,
  `time` char(50) default NULL,
  `frequecy` char(100) default NULL,
  `care` char(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `exercise` */

/*Table structure for table `fat` */

DROP TABLE IF EXISTS `fat`;

CREATE TABLE `fat` (
  `id` int(2) NOT NULL auto_increment,
  `gg` char(10) default NULL,
  `gi` char(2) default NULL,
  `gn` char(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fat` */

/*Table structure for table `fbs` */

DROP TABLE IF EXISTS `fbs`;

CREATE TABLE `fbs` (
  `id` int(2) default NULL,
  `gi` char(9) default NULL,
  `gname` char(30) default NULL,
  `gg` char(1) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fbs` */

/*Table structure for table `food` */

DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `group` char(1) NOT NULL,
  `cal` int(4) default NULL,
  `rice` int(2) default NULL,
  `r1` int(1) default NULL,
  `r2` int(1) default NULL,
  `r3` int(1) default NULL,
  `r4` int(1) default NULL,
  `r5` int(1) default NULL,
  `veg` int(2) default NULL,
  `v1` int(1) default NULL,
  `v2` int(1) default NULL,
  `v3` int(1) default NULL,
  `v4` int(1) default NULL,
  `v5` int(1) default NULL,
  `fruit` int(2) default NULL,
  `f1` int(1) default NULL,
  `f2` int(1) default NULL,
  `f3` int(1) default NULL,
  `f4` int(1) default NULL,
  `f5` int(1) default NULL,
  `meet` int(2) default NULL,
  `me1` int(1) default NULL,
  `me2` int(1) default NULL,
  `me3` int(1) default NULL,
  `me4` int(1) default NULL,
  `me5` int(1) default NULL,
  `milk` int(2) default NULL,
  `m1` int(1) default NULL,
  `m2` int(1) default NULL,
  `m3` int(1) default NULL,
  `m4` int(1) default NULL,
  `m5` int(1) default NULL,
  PRIMARY KEY  (`group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `food` */

/*Table structure for table `main_stat_login` */

DROP TABLE IF EXISTS `main_stat_login`;

CREATE TABLE `main_stat_login` (
  `id` int(9) NOT NULL auto_increment,
  `offid` varchar(540) default NULL,
  `login_time` time default NULL,
  `login_date` date default NULL,
  `username` varchar(540) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=965 DEFAULT CHARSET=utf8;

/*Data for the table `main_stat_login` */

insert  into `main_stat_login`(`id`,`offid`,`login_time`,`login_date`,`username`) values (940,'','13:55:00','2016-01-22','admin'),(941,'','13:56:34','2016-01-22','onrampa'),(942,'','13:59:21','2016-01-22','admin'),(943,'','13:59:28','2016-01-22','onrampa'),(944,'','14:00:18','2016-01-22','onrampa'),(945,'','14:17:44','2016-01-22','onrampa'),(946,'','14:19:18','2016-01-22','onrampa'),(947,'','14:19:53','2016-01-22','onrampa'),(948,'','14:21:31','2016-01-22','onrampa'),(949,'','14:21:59','2016-01-22','onrampa'),(950,'','14:24:37','2016-01-22','onrampa'),(951,'','15:11:40','2016-01-22','onrampa'),(952,'','15:13:53','2016-01-22','onrampa'),(953,'','09:54:10','2016-01-25','onrampa'),(954,'อรรัมภา ศรีสง่า','12:03:53','2016-01-25','onrampa'),(955,'','09:24:39','2016-01-26','onrampa'),(956,'','09:25:20','2016-01-27','onrampa'),(957,'','08:49:50','2016-01-28','onrampa'),(958,'','09:12:09','2016-01-29','onrampa'),(959,'','09:13:11','2016-02-04','onrampa'),(960,'','15:18:03','2016-02-04','onrampa'),(961,'','11:37:24','2016-02-05','onrampa'),(962,'','10:22:23','2016-02-09','onrampa'),(963,'','13:29:07','2016-02-10','onrampa'),(964,'','08:57:37','2016-02-11','onrampa');

/*Table structure for table `occupation` */

DROP TABLE IF EXISTS `occupation`;

CREATE TABLE `occupation` (
  `name` varchar(50) default NULL,
  `occupation` varchar(4) NOT NULL default '',
  `nhso_code` char(4) default NULL,
  `code506` varchar(10) default NULL,
  `hos_guid` varchar(38) default NULL,
  `zip09_code` varchar(10) default NULL,
  `hos_guid_ext` varchar(64) default NULL,
  `nhso_eclaim_occupation_code` char(3) default NULL,
  PRIMARY KEY  (`occupation`),
  UNIQUE KEY `ix_name` (`name`),
  KEY `ix_hos_guid` (`hos_guid`),
  KEY `ix_hos_guid_ext` (`hos_guid_ext`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

/*Data for the table `occupation` */

insert  into `occupation`(`name`,`occupation`,`nhso_code`,`code506`,`hos_guid`,`zip09_code`,`hos_guid_ext`,`nhso_eclaim_occupation_code`) values ('ไม่มีอาชีพ','000','9999','11','','',NULL,NULL),('ไม่ระบุ','001','9999','11','','',NULL,NULL),('สถาปนิก','101','2161','03','','',NULL,NULL),('วิศวกร','102','9312','03','','',NULL,NULL),('นักสำรวจ','103','2165','03','','',NULL,NULL),('ช่างเทคนิควิศวกรรม','104','3113','03','','',NULL,NULL),('นักวิทยาศาสตร์','105','2111','02','','',NULL,NULL),('แพทย์','106','3212','02','','',NULL,NULL),('ศัลยแพทย์','107','2212','02','','',NULL,NULL),('ทันตแพทย์','108','2261','02','','',NULL,NULL),('สัตวแพทย์','109','3240','02','','',NULL,NULL),('อาจารย์มหาวิทยาลัย','110','2310','09','','',NULL,NULL),('อาจารย์โรงเรียน','111','2330','09','','',NULL,NULL),('พยาบาล','112','3221','02','','',NULL,NULL),('เภสัชกร','113','3213','02','','',NULL,NULL),('ผู้ปฏิบัติงานทางเทคนิคการแพทย์','114','3256','02','','',NULL,NULL),('พนักงานที่ทำงานช่วยเหลือด้านการแพทย์','115','2240','03','','',NULL,NULL),('ผู้พิพากษา','116','2612','02','','',NULL,NULL),('อัยการ','117','2611','02','','',NULL,NULL),('ประติมากร','118','2651','03','','',NULL,NULL),('จิตรกร','119','3435','03','','',NULL,NULL),('ช่างศิลป์','120','3435','03','','',NULL,NULL),('ช่างภาพ','121','3433','03','','',NULL,NULL),('นักประพันธ์','122','2641','03','','',NULL,NULL),('นักข่าว','123','2642','03','','',NULL,NULL),('นักหนังสือพิมพ์','124','2642','03','','',NULL,NULL),('นักแสดง','125','2655','03','','',NULL,NULL),('นางแบบ','126','5241','03','','',NULL,NULL),('นักร้อง','127','2652','03','','',NULL,NULL),('นักดนตรี','128','2652','03','','',NULL,NULL),('นักสังคมสงเคราะห์','129','2635','03','','',NULL,NULL),('นักสังคมวิทยา','130','2632','03','','',NULL,NULL),('นักสถิติ','131','2120','03','','',NULL,NULL),('นักเศรษฐศาสตร์','132','2631','03','','',NULL,NULL),('ผู้สอนศาสนา','133','3413','13','','',NULL,NULL),('อนุศาสนาจารย์','134','2310','13','','',NULL,NULL),('นักบัญชี','135','2411','03','','',NULL,NULL),('ผู้ปฏิบัติงานที่ใช้วิชาการอื่น ๆ','136','1439','02','','',NULL,NULL),('ทนายความ','137','2611','03','','',NULL,NULL),('หมอดู','138','5161','03','','',NULL,NULL),('รับราชการ (ข้าราชการพลเรือน)','201','1111','02','','',NULL,NULL),('ทหารบก','202','0310','07','','',NULL,NULL),('ทหารเรือ','203','0310','07','','',NULL,NULL),('ทหารอากาศ','204','0310','07','','',NULL,NULL),('ตำรวจ','205','5412','07','','',NULL,NULL),('ข้าราชการการเมือง','206','1111','10','','',NULL,NULL),('ผู้ปฏิบัติงานหน่วยงานของรัฐอื่น ๆ','207','1111','02','','',NULL,NULL),('ข้าราชการบำนาญ','208','9003','02','','',NULL,NULL),('ลูกจ้างชั่วคราว','209','9005','03','','',NULL,NULL),('ลูกจ้างประจำ','210','9004','03','','',NULL,NULL),('กำนัน','211','1113','10','','',NULL,NULL),('สารวัตรกำนัน','212','1113','10','','',NULL,NULL),('ผู้ใหญ่บ้าน','213','1113','10','','',NULL,NULL),('ผู้ช่วยผู้ใหญ่บ้าน','214','9629','10','','',NULL,NULL),('แพทย์ประจำตำบล','215','2211','10','','',NULL,NULL),('นักการ-ภารโรง','216','9629','02','','',NULL,NULL),('ผู้บริหารรัฐวิสาหกิจ','301','9629','10','','',NULL,NULL),('พนักงานรัฐวิสาหกิจ','302','9629','10','','',NULL,NULL),('ผู้ปฏิบัติงานหน่วยงานรัฐวิสาหกิจอื่น ๆ','303','9629','10','','',NULL,NULL),('เจ้าของกิจการ','401','5221','04','','',NULL,NULL),('พนักงานหน่วยงานเอกชน','402','9629','10','','',NULL,NULL),('รับจ้าง','403','9622','03','','',NULL,NULL),('กรรมกร','404','9622','03','','',NULL,NULL),('ผู้ปฏิบัติงานหน่วยงานเอกชนอื่น ๆ','405','9629','02','','',NULL,NULL),('เสมียน','406','5230','02','','',NULL,NULL),('กสิกรรม','501','6121','01','','',NULL,NULL),('เกษตรกรรม','502','6111','01','','',NULL,NULL),('ทำนา','503','6111','01','','',NULL,NULL),('ทำสวน','504','9214','01','','',NULL,NULL),('ทำไร่','505','9211','01','','',NULL,NULL),('ทำฟาร์ม','506','6129','12','','',NULL,NULL),('ประมง','507','9216','08','','',NULL,NULL),('ล่าสัตว์','508','6340','12','','',NULL,NULL),('ผู้ปฏิบัติงานด้านกสิกรรม เลี้ยงสัตว์อื่น ๆ','509','6121','12','','',NULL,NULL),('ค้าส่ง','601','1420','04','','',NULL,NULL),('ค้าปลีก','602','1420','04','','',NULL,NULL),('หาบเร่','603','9622','04','','',NULL,NULL),('ตัวแทนจำหน่าย','604','3339','04','','',NULL,NULL),('ผู้ปฏิบัติงานเกี่ยวกับการค้าอื่น ๆ','605','3339','04','','',NULL,NULL),('ค้าขาย','606','6129','04','','',NULL,NULL),('นายหน้า','701','3324','04','','',NULL,NULL),('พนักงานขาย','702','5244','04','','',NULL,NULL),('พนักงานโฆษณา','703','1222','04','','',NULL,NULL),('พนักงานประชาสัมพันธ์','704','1222','03','','',NULL,NULL),('พนักงานเสริฟ','705','5131','03','','',NULL,NULL),('พนักงานโรงแรม','706','9112','03','','',NULL,NULL),('พนักงานประจำสถานบริการ','707','4224','10','','',NULL,NULL),('พนักงานขับรถเมล์','708','8331','03','','',NULL,NULL),('คนขับรถรับจ้าง','709','9622','03','','',NULL,NULL),('คนขับรถที่ใช้สัตว์ลากเทียม','710','9622','03','','',NULL,NULL),('คนขับเรือ','711','9216','03','','',NULL,NULL),('คนปรุงอาหาร','712','5120','03','','',NULL,NULL),('คนเลี้ยงเด็ก','713','5311','05','','',NULL,NULL),('คนรับใช้','714','5162','05','','',NULL,NULL),('คนทำความสะอาด','715','9122','05','','',NULL,NULL),('คนซักรีด','716','9121','05','','',NULL,NULL),('ช่างตัดผม','717','5141','03','','',NULL,NULL),('ช่างเสริมสวย','718','5142','03','','',NULL,NULL),('ผู้ปฏิบัติงานด้านบริการอื่น ๆ','719','8219','03','','',NULL,NULL),('ผู้รักษาความปลอดภัย','720','5322','03','','',NULL,NULL),('ช่างตัดเย็บเสื้อผ้า','801','7531','03','','',NULL,NULL),('ช่างเย็บหนัง','802','7533','03','','',NULL,NULL),('ช่างซ่อมเครื่องไฟฟ้า','803','3113','03','','',NULL,NULL),('ช่างซ่อมวิทยุโทรทัศน์','804','3511','03','','',NULL,NULL),('ช่างซ่อมเครื่องยนต์','805','7231','03','','',NULL,NULL),('ช่างอีเลคโทรนิคส์','806','7421','03','','',NULL,NULL),('ช่างเคาะพ่นสีรถยนต์','807','7132','03','','',NULL,NULL),('ช่างซ่อมนาฬิกา','808','7421','04','','',NULL,NULL),('ช่างทอง','809','7313','03','','',NULL,NULL),('ช่างเพชรพบอย','810','7313','03','','',NULL,NULL),('ช่างเหล็ก','811','7221','03','','',NULL,NULL),('ช่างโลหะ','812','7213','03','','',NULL,NULL),('ช่างเชื่อมโลหะ','813','7212','03','','',NULL,NULL),('ช่างหลอมโลหะ','814','7213','03','','',NULL,NULL),('ช่างชุบโลหะ','815','7213','03','','',NULL,NULL),('ช่างไม้','816','7115','03','','',NULL,NULL),('ช่างเฟอร์นิเจอร์','817','7522','03','','',NULL,NULL),('ช่างปูน','818','7123','03','','',NULL,NULL),('ช่างทาสี','819','7131','03','','',NULL,NULL),('ช่างพิมพ์','820','7322','03','','',NULL,NULL),('ช่างทอ ปั่น จักสาน','821','7317','03','','',NULL,NULL),('ช่างถ่ายรูป','822','3431','03','','',NULL,NULL),('ช่างล้างอัดรูป','823','3431','03','','',NULL,NULL),('ผู้ปฏิบัติงานด้านช่างอื่น ๆ','824','3139','03','','',NULL,NULL),('นักศึกษา','900','9000','06','','',NULL,NULL),('นักบวช','901','2636','13','','',NULL,NULL),('ในความปกครอง','902','9002','11','','',NULL,NULL),('แม่บ้าน (ไม่ได้ทำงาน)','904','9001','06',NULL,NULL,NULL,NULL),('นักเรียน','906','9000','06',NULL,NULL,NULL,NULL);

/*Table structure for table `opduser` */

DROP TABLE IF EXISTS `opduser`;

CREATE TABLE `opduser` (
  `id` int(3) NOT NULL auto_increment,
  `loginname` char(20) NOT NULL,
  `password` char(50) default NULL,
  `code` char(4) default NULL,
  `name` char(100) default NULL,
  `status` char(1) default '1',
  PRIMARY KEY  (`id`,`loginname`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `opduser` */

insert  into `opduser`(`id`,`loginname`,`password`,`code`,`name`,`status`) values (1,'onrampa','onrampa','02','อรรัมภา ศรีสง่า','1');

/*Table structure for table `pt_ask` */

DROP TABLE IF EXISTS `pt_ask`;

CREATE TABLE `pt_ask` (
  `id` int(8) NOT NULL auto_increment,
  `pt_id` int(8) default NULL,
  `pt_cid` char(13) default NULL,
  `work` int(2) default NULL COMMENT 'กิจกรรมทางกาย',
  `food` int(2) default NULL COMMENT 'อาหาร',
  `emotion` int(2) default NULL COMMENT 'ความเครียด',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pt_ask` */

/*Table structure for table `pt_disease` */

DROP TABLE IF EXISTS `pt_disease`;

CREATE TABLE `pt_disease` (
  `id` int(8) NOT NULL auto_increment,
  `pt_id` int(8) default NULL,
  `pt_cid` char(13) default NULL,
  `d0` char(1) default NULL,
  `d1` char(1) default NULL,
  `d2` char(1) default NULL,
  `d2_1` char(1) default NULL,
  `d2_2` char(1) default NULL,
  `d2_3` char(1) default NULL,
  `d2_4` char(1) default NULL,
  `d2_5` char(1) default NULL,
  `d3` char(1) default NULL,
  `d4` char(1) default NULL,
  `d5` char(1) default NULL,
  `d6` char(1) default NULL,
  `d6_1` char(1) default NULL,
  `d6_2` char(1) default NULL,
  `d6_3` char(1) default NULL,
  `d6_4` char(1) default NULL,
  `d6_5` char(1) default NULL,
  `d7` char(1) default NULL,
  `d7_1` char(1) default NULL,
  `d7_2` char(1) default NULL,
  `d8` char(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pt_disease` */

insert  into `pt_disease`(`id`,`pt_id`,`pt_cid`,`d0`,`d1`,`d2`,`d2_1`,`d2_2`,`d2_3`,`d2_4`,`d2_5`,`d3`,`d4`,`d5`,`d6`,`d6_1`,`d6_2`,`d6_3`,`d6_4`,`d6_5`,`d7`,`d7_1`,`d7_2`,`d8`) values (1,1,'3341501653794','1','','','','','','','','','1','','','','','','','','','','','');

/*Table structure for table `pt_life` */

DROP TABLE IF EXISTS `pt_life`;

CREATE TABLE `pt_life` (
  `id` int(8) NOT NULL auto_increment,
  `pt_id` int(8) default NULL,
  `pt_cid` char(13) default NULL,
  `life_type` int(1) default NULL,
  `history_family` int(1) default NULL,
  `df1` int(1) default NULL,
  `df2` int(1) default NULL,
  `df3` int(1) default NULL,
  `df4` int(1) default NULL,
  `df5` int(1) default NULL,
  `df6` int(1) default NULL,
  `df7` int(1) default NULL,
  `df8` int(1) default NULL,
  `df9` int(1) default NULL,
  `df10` int(1) default NULL,
  `df11` int(1) default NULL,
  `sigar` int(1) default NULL,
  `s1` int(1) default NULL,
  `s2` int(1) default NULL,
  `s3` int(1) default NULL,
  `s1a` int(2) default NULL,
  `s3a` int(2) default NULL,
  `s3b` int(2) default NULL,
  `alcohol` int(1) default NULL,
  `a1` int(1) default NULL,
  `a1a` int(3) default NULL,
  `a2` int(1) default NULL,
  `a3` int(2) default NULL,
  `a3a` int(2) default NULL,
  `a3b1` int(2) default NULL,
  `a3c1` int(2) default NULL,
  `a3b2` int(2) default NULL,
  `a3c2` int(2) default NULL,
  `a3b3` int(2) default NULL,
  `a3c3` int(3) default NULL,
  `a3b4` int(3) default NULL,
  `a3c4` int(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pt_life` */

insert  into `pt_life`(`id`,`pt_id`,`pt_cid`,`life_type`,`history_family`,`df1`,`df2`,`df3`,`df4`,`df5`,`df6`,`df7`,`df8`,`df9`,`df10`,`df11`,`sigar`,`s1`,`s2`,`s3`,`s1a`,`s3a`,`s3b`,`alcohol`,`a1`,`a1a`,`a2`,`a3`,`a3a`,`a3b1`,`a3c1`,`a3b2`,`a3c2`,`a3b3`,`a3c3`,`a3b4`,`a3c4`) values (1,1,'3341501653794',2,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL,0,0,0,0,0,0,0,NULL,0,0,0,0,NULL,0,0,0,0,0,0,0,0);

/*Table structure for table `pt_precription` */

DROP TABLE IF EXISTS `pt_precription`;

CREATE TABLE `pt_precription` (
  `id` int(8) NOT NULL auto_increment,
  `pt_id` int(8) default NULL,
  `pt_cid` char(13) default NULL,
  `want_fit` int(1) default NULL COMMENT 'ลดน้ำหนัก',
  `want_dm` int(1) default NULL COMMENT 'เบาหวาน',
  `want_ht` int(1) default NULL COMMENT 'ความดัน',
  `want_ldl` int(1) default NULL COMMENT 'ไขมันไม่ดี',
  `want_hdl` int(1) default NULL COMMENT 'เพิ่มไขมันดี',
  `want_heart` int(1) default NULL COMMENT 'หัวใจ',
  `want_mas` int(1) default NULL COMMENT 'กล้ามเนื้อ',
  `want_oa` int(1) default NULL COMMENT 'กระดูก เข่า',
  `want_emotion` int(1) default NULL COMMENT 'ความเครียด',
  `fat` int(1) default NULL COMMENT 'ไขมัน',
  `sugar` int(1) default NULL COMMENT 'หวาน',
  `salt` int(1) default NULL COMMENT 'เค็ม',
  `calorie` int(3) default NULL COMMENT 'เลือก จาก BMI * นน',
  `cal_day` char(1) default NULL COMMENT 'ผลคำนวน cal ต่อวัน',
  `result` char(10) default NULL COMMENT 'ผลลัพธ์ สูตรออกกำลังกาย',
  `r_text` text,
  `date_pres` date default NULL COMMENT 'วันที่ประเมิน',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `pt_precription` */

insert  into `pt_precription`(`id`,`pt_id`,`pt_cid`,`want_fit`,`want_dm`,`want_ht`,`want_ldl`,`want_hdl`,`want_heart`,`want_mas`,`want_oa`,`want_emotion`,`fat`,`sugar`,`salt`,`calorie`,`cal_day`,`result`,`r_text`,`date_pres`) values (1,1,'3341501653794',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-01-27'),(2,1,'3341501653794',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-02-05'),(3,1,'3341501653794',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-02-05'),(4,1,'3341501653794',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-02-10'),(5,1,'3341501653794',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-02-10'),(6,1,'3341501653794',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-02-10'),(7,1,'3341501653794',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-02-10'),(8,1,'3341501653794',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-02-10');

/*Table structure for table `pt_screen` */

DROP TABLE IF EXISTS `pt_screen`;

CREATE TABLE `pt_screen` (
  `pt_id` int(8) NOT NULL auto_increment,
  `pt_cid` char(13) default NULL,
  `pt_hn` char(10) default NULL,
  `pt_name` char(100) default NULL,
  `pt_age` int(3) default NULL,
  `pt_sex` char(1) default NULL,
  `pt_address` text,
  `pt_weight` double(15,3) default NULL COMMENT 'น้ำหนักตัว',
  `pt_height` double(15,3) default NULL COMMENT 'ความสูง',
  `pt_bmi` double(15,3) default NULL COMMENT 'BMI',
  `pt_waist` double(15,3) default NULL COMMENT 'เส้นรอบเอว',
  `pt_pulse` double(15,3) default NULL COMMENT 'ชีพจร',
  `pt_occ` char(5) default NULL COMMENT 'รหัส อาชีพ',
  `p_tel` char(10) default NULL,
  `p_email` char(50) default NULL,
  `p_line` char(20) default NULL,
  `pt_bps` double(15,3) default NULL COMMENT 'ความดันบน',
  `pt_bpd` double(15,3) default NULL COMMENT 'ความดันล่าง',
  `pt_bloodgrp` char(1) default NULL COMMENT 'กรุ๊ปเลือด',
  `pt_fbs` double(15,3) default NULL,
  `pt_hba1c` double(15,3) default NULL,
  `pt_tg` double(15,3) default NULL,
  `pt_hdl` double(15,3) default NULL,
  `pt_cho` double(15,3) default NULL,
  `pt_ldl` double(15,3) default NULL,
  `pt_bun` double(15,3) default NULL,
  `pt_cr` double(15,3) default NULL,
  `pt_hct` double(15,3) default NULL,
  `pt_date_screen` date default NULL,
  PRIMARY KEY  (`pt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pt_screen` */

insert  into `pt_screen`(`pt_id`,`pt_cid`,`pt_hn`,`pt_name`,`pt_age`,`pt_sex`,`pt_address`,`pt_weight`,`pt_height`,`pt_bmi`,`pt_waist`,`pt_pulse`,`pt_occ`,`p_tel`,`p_email`,`p_line`,`pt_bps`,`pt_bpd`,`pt_bloodgrp`,`pt_fbs`,`pt_hba1c`,`pt_tg`,`pt_hdl`,`pt_cho`,`pt_ldl`,`pt_bun`,`pt_cr`,`pt_hct`,`pt_date_screen`) values (1,'3341501653794','000012554','นายวรวุฒิ สมดี',38,'1','45 ม.4\r\nบ้านบัว \r\n',62.300,168.000,22.073,83.000,93.000,'209','','','',126.000,80.000,'O',89.000,0.000,128.000,58.000,251.000,128.000,14.200,0.900,47.000,'2015-10-21');

/*Table structure for table `pt_work` */

DROP TABLE IF EXISTS `pt_work`;

CREATE TABLE `pt_work` (
  `id` int(13) NOT NULL auto_increment,
  `pt_id` int(13) default NULL,
  `pt_cid` int(13) default NULL,
  `p1` char(1) default NULL,
  `p2` int(1) default NULL,
  `p3` int(4) default NULL COMMENT 'ชม*60 + นาที',
  `p4` char(1) default NULL,
  `p5` int(1) default NULL,
  `p6` int(4) default NULL COMMENT 'ชม*60 + นาที',
  `p7` char(1) default NULL,
  `p8` int(1) default NULL,
  `p9` int(4) default NULL COMMENT 'ชม*60 + นาที',
  `p10` char(1) default NULL,
  `p11` int(1) default NULL,
  `p12` int(4) default NULL COMMENT 'ชม*60 + นาที',
  `p13` char(1) default NULL,
  `p14` int(1) default NULL,
  `p15` int(4) default NULL COMMENT 'ชม*60 + นาที',
  `p16` int(4) default NULL COMMENT 'ชม*60 + นาที',
  `psum` int(4) default NULL COMMENT 'ผลคำนวน',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pt_work` */

/*Table structure for table `v_screen` */

DROP TABLE IF EXISTS `v_screen`;

/*!50001 DROP VIEW IF EXISTS `v_screen` */;
/*!50001 DROP TABLE IF EXISTS `v_screen` */;

/*!50001 CREATE TABLE  `v_screen`(
 `pt_name` char(100) ,
 `pt_age` int(3) ,
 `pt_cid` char(13) ,
 `pt_id` int(8) ,
 `pt_bmi` double(15,3) ,
 `pt_sex` char(1) ,
 `pt_waist` double(15,3) ,
 `pt_fbs` double(15,3) ,
 `pt_hba1c` double(15,3) ,
 `pt_bps` double(15,3) ,
 `pt_bpd` double(15,3) ,
 `pt_tg` double(15,3) ,
 `pt_hdl` double(15,3) ,
 `pt_cho` double(15,3) ,
 `pt_ldl` double(15,3) ,
 `pt_cr` double(15,3) ,
 `d1` char(1) ,
 `d2` char(1) ,
 `d3` char(1) ,
 `d2_2` char(1) ,
 `d5` char(1) ,
 `d6` char(1) ,
 `d8` char(1) ,
 `p16` int(4) ,
 `psum` int(4) ,
 `emotion` int(2) ,
 `pt_date_screen` date ,
 `date_pres` date 
)*/;

/*View structure for view v_screen */

/*!50001 DROP TABLE IF EXISTS `v_screen` */;
/*!50001 DROP VIEW IF EXISTS `v_screen` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_screen` AS (select `sc`.`pt_name` AS `pt_name`,`sc`.`pt_age` AS `pt_age`,`sc`.`pt_cid` AS `pt_cid`,`sc`.`pt_id` AS `pt_id`,`sc`.`pt_bmi` AS `pt_bmi`,`sc`.`pt_sex` AS `pt_sex`,`sc`.`pt_waist` AS `pt_waist`,`sc`.`pt_fbs` AS `pt_fbs`,`sc`.`pt_hba1c` AS `pt_hba1c`,`sc`.`pt_bps` AS `pt_bps`,`sc`.`pt_bpd` AS `pt_bpd`,`sc`.`pt_tg` AS `pt_tg`,`sc`.`pt_hdl` AS `pt_hdl`,`sc`.`pt_cho` AS `pt_cho`,`sc`.`pt_ldl` AS `pt_ldl`,`sc`.`pt_cr` AS `pt_cr`,`d`.`d1` AS `d1`,`d`.`d2` AS `d2`,`d`.`d3` AS `d3`,`d`.`d2_2` AS `d2_2`,`d`.`d5` AS `d5`,`d`.`d6` AS `d6`,`d`.`d8` AS `d8`,`w`.`p16` AS `p16`,`w`.`psum` AS `psum`,`a`.`emotion` AS `emotion`,`sc`.`pt_date_screen` AS `pt_date_screen`,`p`.`date_pres` AS `date_pres` from ((((`pt_screen` `sc` left join `pt_disease` `d` on((`d`.`pt_id` = `sc`.`pt_id`))) left join `pt_work` `w` on((`w`.`pt_id` = `sc`.`pt_id`))) left join `pt_precription` `p` on((`p`.`pt_id` = `sc`.`pt_id`))) left join `pt_ask` `a` on((`a`.`pt_id` = `sc`.`pt_id`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
