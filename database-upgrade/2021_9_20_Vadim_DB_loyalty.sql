DROP TABLE IF EXISTS `loyalty`;

CREATE TABLE `loyalty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loyalty_type` varchar(255) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `discount` varchar(30) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;