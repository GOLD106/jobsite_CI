ALTER TABLE `services`
  ADD COLUMN `user_type` VARCHAR (20) DEFAULT 'provider' NOT NULL AFTER `user_id`;