DROP TABLE IF EXISTS `commission_ta`;

CREATE TABLE `commission_ta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(30) DEFAULT NULL,
  `subscription` varchar(30) DEFAULT NULL,
  `commission_fee` float DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

