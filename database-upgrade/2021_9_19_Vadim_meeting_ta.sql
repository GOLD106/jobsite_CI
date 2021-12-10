DROP TABLE IF EXISTS `meeting_ta`;

CREATE TABLE `meeting_ta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(20) DEFAULT NULL,
  `employee` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `your_email` varchar(50) DEFAULT NULL,
  `meeting_type` varchar(20) DEFAULT NULL,
  `meeting_title` varchar(30) DEFAULT NULL,
  `meeting_duration` varchar(30) DEFAULT NULL,
  `time_zone` varchar(20) DEFAULT NULL,
  `meeting_time` varchar(30) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;