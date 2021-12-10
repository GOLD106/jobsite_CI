ALTER TABLE `users`
  ADD COLUMN `two_factor_auth` TINYINT (1) NOT NULL AFTER `fill_up_profile`;