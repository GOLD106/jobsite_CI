ALTER TABLE `partner_categories`
  ADD COLUMN `department_id` INT (11) NOT NULL AFTER `id`,
  CHANGE `subcategory_id` `subcategory_id` INT (11) DEFAULT 0 NOT NULL,
  CHANGE `status` `status` INT (1) DEFAULT 1 NOT NULL,
  CHANGE `created_at` `created_at` DATETIME NOT NULL;