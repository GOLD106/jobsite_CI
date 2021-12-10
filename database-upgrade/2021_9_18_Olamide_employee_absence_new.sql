DROP TABLE IF EXISTS `employee_absence`;

CREATE TABLE `employee_absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `absence_from` date DEFAULT NULL,
  `absence_to` date DEFAULT NULL,
  `absence_type` varchar(255) DEFAULT NULL,
  `absence_note` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;