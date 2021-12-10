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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`developer_data_work` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `developer_data_work`;

/*Table structure for table `how_to_work` */

DROP TABLE IF EXISTS `how_to_work`;

CREATE TABLE `how_to_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `how_to_work` */

insert  into `how_to_work`(`id`,`category`,`title`,`content`,`image`,`created_at`,`updated_at`,`status`) values 
(1,1,'Book A Service','Click the book now button to make a booking on our preffered date and time','uploads/how_to_work_images/1627840715book.png','2021-08-01 23:28:35','2021-08-01 23:31:03',1),
(2,1,'Confirm Booking','We will confirm your booking along with your instructions via secure transaction','uploads/how_to_work_images/1627841417confirm.png','2021-08-01 23:40:17','2021-08-01 23:40:17',1),
(3,1,'We\'ll Clean it','Our trusted and experienced maid will come to your door-step on the time for a cleaning','uploads/how_to_work_images/1627841477clean.png','2021-08-01 23:41:17','2021-08-01 23:41:17',1);

/*Table structure for table `reason_to_love` */

DROP TABLE IF EXISTS `reason_to_love`;

CREATE TABLE `reason_to_love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `reason_to_love` */

insert  into `reason_to_love`(`id`,`category`,`title`,`content`,`image`,`created_at`,`updated_at`,`status`) values 
(1,1,'Trusted and Vetted Cleaners','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry','uploads/reason_to_love_images/1627841263trust.png','2021-08-01 23:37:43','2021-08-01 23:38:01',1),
(2,1,'Customer Recommended','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry','uploads/reason_to_love_images/1627841315recommend.png','2021-08-01 23:38:35','2021-08-01 23:38:35',1),
(3,1,'Commitment To Trust and Safety','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry','uploads/reason_to_love_images/1627841357commitment.png','2021-08-01 23:39:17','2021-08-01 23:39:17',1);

/*Table structure for table `why_choose` */

DROP TABLE IF EXISTS `why_choose`;

CREATE TABLE `why_choose` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `why_choose` */

insert  into `why_choose`(`id`,`category`,`title`,`content`,`image`,`created_at`,`updated_at`,`status`) values 
(1,1,'Why choose Tazzer to clean your home?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627844449welcome.png','2021-08-02 00:30:49','2021-08-02 00:31:16',1),
(3,13,'Why choose Tazzer?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627845536welcome6.png','2021-08-02 00:32:55','2021-08-02 00:49:15',1),
(4,5,'Why choose Tazzer?','HandyMan Services. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627844794welcome3.png','2021-08-02 00:36:34','2021-08-02 00:37:43',1),
(5,6,'Why choose Tazzer?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627845222banner6.png','2021-08-02 00:43:42','2021-08-02 00:43:42',1),
(6,3,'Why choose Tazzer?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627845298welcome8.jpg','2021-08-02 00:44:58','2021-08-02 00:44:58',1),
(7,2,'Why choose Tazzer?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627845363welcome2.png','2021-08-02 00:46:03','2021-08-02 00:46:03',1),
(8,14,'Why choose Tazzer?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627845388welcome7.jpg','2021-08-02 00:46:28','2021-08-02 00:46:28',1),
(9,4,'Why choose Tazzer?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627845431welcome9.jpg','2021-08-02 00:47:12','2021-08-02 00:47:12',1),
(10,15,'Why choose Tazzer?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627845446welcome10.png','2021-08-02 00:47:26','2021-08-02 00:47:26',1),
(11,12,'Why choose Tazzer?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when on unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages','uploads/why_choose_images/1627845481welcome4.png','2021-08-02 00:48:02','2021-08-02 00:48:02',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
