ALTER TABLE `users`
  CHANGE `house_name` `house_name` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL,
  CHANGE `house_number` `house_number` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL,
  CHANGE `street_address` `street_address` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL,
  CHANGE `city` `city` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL,
  CHANGE `province` `province` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL,
  CHANGE `postal_code2` `postal_code2` VARCHAR (255) CHARSET latin1 COLLATE latin1_swedish_ci NOT NULL;