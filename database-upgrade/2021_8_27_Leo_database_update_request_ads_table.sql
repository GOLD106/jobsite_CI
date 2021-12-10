ALTER TABLE `request_ads`
  CHANGE `user_id` `user_id` INT (11) DEFAULT 0 NOT NULL,
  CHANGE `subcategory_id` `subcategory_id` INT (11) DEFAULT 0 NOT NULL,
  CHANGE `description` `description` TEXT CHARSET utf8 COLLATE utf8_general_ci NOT NULL,
  ADD COLUMN `packages` TEXT NOT NULL AFTER `description`,
  CHANGE `status` `status` INT (1) DEFAULT 1 NOT NULL COMMENT '1:pending,2:inprogress,3:completed,4:rejected',
  CHANGE `created_at` `created_at` DATETIME NOT NULL;