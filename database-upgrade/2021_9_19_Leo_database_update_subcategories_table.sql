ALTER TABLE `subcategories`
  ADD COLUMN `unique_id` VARCHAR (100) NOT NULL AFTER `id`;

UPDATE subcategories SET unique_id = CONCAT(CONV(RIGHT(UUID(),10), 16, 10)+id);