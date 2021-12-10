ALTER TABLE `users`
  ADD COLUMN `permission` INT (11) NULL AFTER `two_factor_auth`;