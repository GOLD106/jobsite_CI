DROP TABLE IF EXISTS `rfq_ta`;

CREATE TABLE `rfq_ta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `sub_category` varchar(50) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;