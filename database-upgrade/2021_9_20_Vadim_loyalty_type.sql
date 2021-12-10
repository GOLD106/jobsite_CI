DROP TABLE IF EXISTS `loyalty_type`;

CREATE TABLE `loyalty_type` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `loyalty_type` */

insert  into `loyalty_type`(`id`,`name`) values 
(1,'T-priority for 1-3 months'),
(2,'T-priority for 3-6 months'),
(3,'T-priority for 6-9 months'),
(4,'Discount on Subscription'),
(5,'Free Service'),
(6,'Send gift and thank you cards'),
(7,'Invitation for meals with the top executives'),
(8,'All will depend on their performance');