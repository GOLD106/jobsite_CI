

DROP TABLE IF EXISTS `user_permission`;

CREATE TABLE `user_permission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `active` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


insert  into `user_permission`(`id`,`name`,`description`,`created_date`,`active`) values 
(1,'Super  Admin','All access','2021-09-02 10:42:22',1),
(2,'Admin','Administrator permis','2021-09-02 10:42:52',1),
(3,'employer','general employer','2021-09-02 10:43:22',1),
(5,'Guest','Guest permission','2021-09-02 10:43:51',1);
