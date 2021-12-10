DROP TABLE IF EXISTS `user_permission`;

CREATE TABLE `user_permission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(70) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `active` int(8) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_permission` */

insert  into `user_permission`(`id`,`name`,`description`,`created_date`,`active`,`user_type`) values 
(1,'Super  Admin','All access No','2021-09-21 18:06:11',1,'\r\n											12'),
(2,'Admin','Administrator permis','2021-09-02 10:42:52',1,'1'),
(3,'employer','general employer','2021-09-02 10:43:22',1,'2'),
(5,'Guest','Guest permission','2021-09-02 10:43:51',1,'3'),
(9,'21312312','new permission','2021-09-21 17:57:44',1,'7');