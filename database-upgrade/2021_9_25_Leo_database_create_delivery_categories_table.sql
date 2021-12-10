CREATE TABLE `delivery_categories` (
  `id` INT (11) NOT NULL AUTO_INCREMENT,
  `unique_id` VARCHAR (100) NOT NULL,
  `category_name` VARCHAR (255) NOT NULL,
  `description` VARCHAR (1000) NOT NULL,
  `card_image` VARCHAR (255) NOT NULL,
  `icon` VARCHAR (255) NOT NULL,
  `image` VARCHAR (500) NOT NULL,
  `thumb_image` VARCHAR (255) NOT NULL,
  `mobile_icon` VARCHAR (255) NOT NULL,
  `status` TINYINT (1) NOT NULL,
  `created_at` DATETIME,
  PRIMARY KEY (`id`)
);
