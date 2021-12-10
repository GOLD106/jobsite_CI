ALTER TABLE `categories`
  ADD COLUMN `card_image` VARCHAR (255) NOT NULL AFTER `description`,
  CHANGE `icon` `icon` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL,
  CHANGE `thumb_image` `thumb_image` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL,
  CHANGE `category_mobile_icon` `category_mobile_icon` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL;