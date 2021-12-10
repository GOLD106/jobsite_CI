/*Career Table Create
 2021-09-09 Vadim

  */

DROP TABLE IF EXISTS `job_post`;

CREATE TABLE `job_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `sub_category` varchar(30) DEFAULT NULL,
  `service` varchar(20) DEFAULT NULL,
  `job_type` varchar(10) DEFAULT NULL,
  `job_price` varchar(20) DEFAULT NULL,
  `job_upload_file` varchar(30) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;