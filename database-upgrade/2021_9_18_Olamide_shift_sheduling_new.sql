DROP TABLE IF EXISTS `shift_schedule`;

CREATE TABLE `shift_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `total_hours` float(50,0) NOT NULL,
  `shift_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_job` varchar(255) NOT NULL,
  `schedule_note` varchar(255) NOT NULL,
  `shift_start` varchar(255) NOT NULL,
  `shift_end` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4;