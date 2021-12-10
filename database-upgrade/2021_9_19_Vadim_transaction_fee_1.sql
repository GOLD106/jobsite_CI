DROP TABLE IF EXISTS `transaction_fee_1`;

CREATE TABLE `transaction_fee_1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(30) DEFAULT NULL,
  `transaction_fee` float DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;