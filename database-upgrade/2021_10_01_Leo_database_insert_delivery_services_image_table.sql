CREATE TABLE `delivery_services_image` (
  `id` INT (11) NOT NULL AUTO_INCREMENT,
  `service_id` INT (11) NOT NULL,
  `service_image` TEXT NOT NULL,
  `service_details_image` TEXT NOT NULL,
  `thumb_image` TEXT NOT NULL,
  `mobile_image` TEXT NOT NULL,
  `status` TINYINT (1) NOT NULL DEFAULT 1,
  `is_url` TINYINT (1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
);