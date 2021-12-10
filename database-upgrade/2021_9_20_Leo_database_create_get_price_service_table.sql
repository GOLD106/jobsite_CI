CREATE TABLE `get_price_service` (
  `id` INT (11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR (255) NOT NULL,
  `email` VARCHAR (255) NOT NULL,
  `address` VARCHAR (255) NOT NULL,
  `latitude` FLOAT NOT NULL,
  `longitude` FLOAT NOT NULL,
  `phonenumber` VARCHAR (255) NOT NULL,
  `subcategory_id` INT (11) NOT NULL,
  `service_id` INT (11) NOT NULL,
  `booking_date` DATE NOT NULL,
  `booking_time` TIME NOT NULL,
  `booking_description` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
);