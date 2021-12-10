/* DB upgrade 2021-09-29 Vadim */


DROP TABLE IF EXISTS `invoice_ta`;

CREATE TABLE `invoice_ta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_code` varchar(30) DEFAULT NULL,
  `service_code` varchar(30) DEFAULT NULL,
  `buyer_code` varchar(30) DEFAULT NULL,
  `category_code` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `service_id` varchar(40) DEFAULT NULL,
  `qty` varchar(30) DEFAULT NULL,
  `subtotal` varchar(20) DEFAULT NULL,
  `commission` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `add_flag` varchar(5) DEFAULT NULL,
  `currency_code` varchar(30) DEFAULT NULL,
  `transaction_fee` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

