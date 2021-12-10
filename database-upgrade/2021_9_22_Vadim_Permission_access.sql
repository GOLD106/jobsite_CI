DROP TABLE IF EXISTS `permission_access`;

CREATE TABLE `permission_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` varchar(10) DEFAULT NULL,
  `module_id` varchar(10) DEFAULT NULL,
  `access` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

