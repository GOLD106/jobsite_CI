/*Table structure for table `career_ta` */

DROP TABLE IF EXISTS `career_ta`;

CREATE TABLE `career_ta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `skill_name` varchar(50) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `appling_as` varchar(50) DEFAULT NULL,
  `upload_file` varchar(50) DEFAULT NULL,
  `service_id` varchar(20) DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;