ALTER TABLE `users`
  ADD COLUMN `fill_up_form` TINYINT (1) NOT NULL AFTER `site_link`,
  ADD COLUMN `fill_up_profile` TINYINT (1) NOT NULL AFTER `fill_up_form`;