DROP TABLE IF EXISTS `book_meeting`;

CREATE TABLE `book_meeting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `meeting_time` varchar(30) DEFAULT NULL,
  `meeting_duration` varchar(20) DEFAULT NULL,
  `time_zone` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `website_url` varchar(30) DEFAULT NULL,
  `job_title` varchar(40) DEFAULT NULL,
  `verification_volume` varchar(30) DEFAULT NULL,
  `industry` varchar(30) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `book_email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;