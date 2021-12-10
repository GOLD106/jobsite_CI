/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.8-MariaDB : Database - developer_data_work
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`developer_data_work` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `developer_data_work`;

/*Table structure for table `bidding_ta` */

DROP TABLE IF EXISTS `bidding_ta`;

CREATE TABLE `bidding_ta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `job_id` int(10) DEFAULT NULL,
  `proposal` varchar(200) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `work_time` varchar(20) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bidding_ta` */

insert  into `bidding_ta`(`id`,`job_id`,`proposal`,`amount`,`work_time`,`user_id`,`created_date`) values 
(1,NULL,'sdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsf','100','10','10','2021-11-01'),
(2,NULL,'sdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsf','100','10','10','2021-11-01'),
(3,NULL,'sdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsfsdfsdfsdfsfsfsfsdfsdfsdfsdfs\r\nsdfsdfsdfsdfsfsf','100','10','10','2021-11-01'),
(4,NULL,'','','','10','2021-11-01'),
(5,NULL,'sdfsdfsfsfsfsdfsfsf','100','3434','10','2021-11-01'),
(6,NULL,'sdfsdfsfsfsfsdfsfsf','100','3434','10','2021-11-01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
