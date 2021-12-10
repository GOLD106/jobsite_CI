ALTER TABLE `business_hours`
  ADD COLUMN `user_type` VARCHAR (20) NOT NULL AFTER `provider_id`;