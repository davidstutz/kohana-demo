-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(255) NOT NULL ,
  `first_name` VARCHAR(255) NOT NULL ,
  `last_name` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(65) NOT NULL ,
  `salt` VARCHAR(255) DEFAULT NULL ,
  -- Additional fields can be added ...
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uniq_email` (`email` ASC))
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `user_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) NULL ,
  -- Additional fields can be added ...
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uniq_name` (`name` ASC));

-- -----------------------------------------------------
-- Table `users_user_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users_user_roles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) UNSIGNED NOT NULL ,
  `user_role_id` INT(11) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_user_roles_user_id` (`user_id` ASC) ,
  INDEX `fk_users_user_roles_user_role_id` (`user_role_id` ASC) ,
  CONSTRAINT `fk_users_user_roles_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_user_roles_user_role_id`
    FOREIGN KEY (`user_role_id`)
    REFERENCES `user_roles` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `user_logins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_logins` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `ip` VARCHAR(65) NOT NULL ,
  `agent` VARCHAR(65) NOT NULL ,
  `login` VARCHAR(255) NOT NULL ,
  `created` INT(11) UNSIGNED NOT NULL ,
  `user_id` INT(11) DEFAULT NULL ,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `user_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `token` VARCHAR(40) NOT NULL ,
  `user_id` INT(11) UNSIGNED NOT NULL ,
  `user_agent` VARCHAR(64) NOT NULL ,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL ,
  `expires` INT(11) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uniq_token` (`token`) ,
  INDEX `fk_user_tokens_user_id` (`user_id` ASC) ,
  CONSTRAINT `fk_user_tokens_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

-- -----------------------------------------------------
-- Table `rules`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rules` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(255) NOT NULL ,
  `key` VARCHAR(255) NOT NULL ,
  `rule` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8;

INSERT INTO `rules` (`type`, `key`,`rule`) VALUES ('controller', 'user_management', 'role:admin');
INSERT INTO `rules` (`type`, `key`,`rule`) VALUES ('controller', 'user_logs', 'role:admin');
INSERT INTO `rules` (`type`, `key`,`rule`) VALUES ('controller', 'user_config', 'role:admin');
INSERT INTO `rules` (`type`, `key`,`rule`) VALUES ('controller', 'user_logs', 'role:user');
INSERT INTO `rules` (`type`, `key`,`rule`) VALUES ('controller', 'user_config', 'role:user');

-- -----------------------------------------------------
-- Table `user_config`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_config` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) UNSIGNED NOT NULL ,
  `group` VARCHAR(255) NOT NULL ,
  `key` VARCHAR(255) NOT NULL ,
  `value` TEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_user_config_user_id` (`user_id` ASC) ,
  CONSTRAINT `fk_user_config_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `log_models`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `log_models` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `model` VARCHAR(255) NOT NULL ,
  `model_id` INT(11) UNSIGNED NOT NULL ,
  `user_id` INT(11) UNSIGNED NOT NULL ,
  `method` VARCHAR(255) NOT NULL ,
  `data` TEXT NOT NULL ,
  `created` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_log_models_user_id` (`user_id` ASC) ,
  CONSTRAINT `fk_log_models_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `log_controllers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `log_controllers` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `controller` VARCHAR(255) NOT NULL ,
  `uri` VARCHAR(255) NOT NULL , -- Assuming uri will not need more than 255 characters.
  `user_id` INT(11) UNSIGNED NOT NULL ,
  `created` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_log_controllers_user_id` (`user_id` ASC) ,
  CONSTRAINT `fk_log_controllers_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `sessions`
-- -----------------------------------------------------
CREATE TABLE  `sessions` (
  `session_id` VARCHAR(24) NOT NULL,
  `last_active` INT UNSIGNED NOT NULL,
  `contents` TEXT NOT NULL,
  PRIMARY KEY (`session_id`),
  INDEX (`last_active`))
ENGINE = MYISAM;