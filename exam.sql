/*
SQLyog Professional v12.08 (64 bit)
MySQL - 10.4.10-MariaDB : Database - exam
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`exam` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `exam`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `user` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admins` */

insert  into `admins`(`id`,`user`,`pass`) values (1,'admin','admin');

/*Table structure for table `item_pool` */

DROP TABLE IF EXISTS `item_pool`;

CREATE TABLE `item_pool` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `titles` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '题目',
  `types` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '题型',
  `A` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `B` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `C` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `D` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `rights` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '正确答案',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `item_pool` */

insert  into `item_pool`(`id`,`titles`,`types`,`A`,`B`,`C`,`D`,`rights`) values (1,'山区上坡路段跟车过程中遇前车停车时怎么办？','单选','A、从前车两侧超越','B、紧跟前车后停车','C、保持大距离停车','D、连续鸣喇叭提示','B'),(2,'驾驶机动车在山区道路怎样跟车行驶？','单选','A、紧随前车之后','B、加大安全距离','C、减小纵向间距','D、尽快超越前车','B'),(3,'下长坡连续使用行车制动会造成什么不良后果？','单选','A、缩短发动机使用寿命','B、驾驶人容易疲劳','C、容易造成机动车倾翻','D、制动器制动效果下降','B'),(4,'山区上坡路段跟车过程中遇前车停车时怎么办？','单选','A、从前车两侧超越','B、紧跟前车后停车','C、保持大距离停车','D、连续鸣喇叭提示','B'),(5,'驾驶机动车在山区道路怎样跟车行驶？','单选','A、紧随前车之后','B、加大安全距离','C、减小纵向间距','D、尽快超越前车','B'),(6,'下长坡连续使用行车制动会造成什么不良后果？','单选','A、缩短发动机使用寿命','B、驾驶人容易疲劳','C、容易造成机动车倾翻','D、制动器制动效果下降','B');

/*Table structure for table `systems` */

DROP TABLE IF EXISTS `systems`;

CREATE TABLE `systems` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `max_num` int(3) NOT NULL COMMENT '随机考试个数',
  `total_score` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `systems` */

insert  into `systems`(`id`,`max_num`,`total_score`) values (1,6,100);

/*Table structure for table `times` */

DROP TABLE IF EXISTS `times`;

CREATE TABLE `times` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `h` int(3) NOT NULL,
  `i` int(3) NOT NULL,
  `s` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `times` */

insert  into `times`(`id`,`h`,`i`,`s`) values (1,2,29,59);

/*Table structure for table `user_pool` */

DROP TABLE IF EXISTS `user_pool`;

CREATE TABLE `user_pool` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `names` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '用户名',
  `codes` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '身份证号',
  `title_num_self` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '自己题号',
  `title_num` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '题库的题号',
  `results` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '自己答案',
  `grades` float DEFAULT NULL COMMENT '得分',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_pool` */

insert  into `user_pool`(`id`,`names`,`codes`,`title_num_self`,`title_num`,`results`,`grades`) values (1,'睿智1','142729200103260012','1','2','B',16.6667),(2,'睿智1','142729200103260012','2','4','D',0),(3,'睿智1','142729200103260012','3','5','D',0),(4,'睿智1','142729200103260012','4','6','B',16.6667),(5,'睿智1','142729200103260012','5','1','C',0),(6,'睿智1','142729200103260012','6','3','C',0);

/*Table structure for table `user_times` */

DROP TABLE IF EXISTS `user_times`;

CREATE TABLE `user_times` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `names` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `codes` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '身份证号',
  `times` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_times` */

insert  into `user_times`(`id`,`names`,`codes`,`times`) values (1,'睿智1','142729200103260012','1609143837');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `names` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `pass` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '密码',
  `codes` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '身份证号',
  `grades` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '总成绩',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`names`,`pass`,`codes`,`grades`) values (1,'睿智1','e10adc3949ba59abbe56e057f20f883e','142729200103260012','33.3334');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
