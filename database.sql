-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`fotosets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`fotosets` (
  `id` INT NOT NULL,
  `front` VARCHAR(45) NULL,
  `back` VARCHAR(45) NULL,
  `inner` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cars`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cars` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(45) NOT NULL,
  `model` VARCHAR(45) NOT NULL,
  `year` YEAR NOT NULL,
  `fueltype` ENUM("benzine", "diesel", "hybride", "elektrisch") NOT NULL,
  `colour` VARCHAR(45) NOT NULL,
  `doors` TINYINT NOT NULL,
  `transmission` ENUM("handmatig", "automatisch") NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `mileage` INT NOT NULL,
  `bodywork` VARCHAR(45) NOT NULL,
  `fotoUrl` VARCHAR(45) NOT NULL,
  `fotosets_id` INT NOT NULL,
  PRIMARY KEY (`id`, `fotosets_id`),
  INDEX `fk_cars_fotosets1_idx` (`fotosets_id` ASC) VISIBLE,
  CONSTRAINT `fk_cars_fotosets1`
    FOREIGN KEY (`fotosets_id`)
    REFERENCES `mydb`.`fotosets` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `district` VARCHAR(45) NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `postalcode` INT NOT NULL,
  `housenumber` SMALLINT NOT NULL,
  `isAdmin` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`wishlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`wishlist` (
  `cars_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`cars_id`, `users_id`),
  INDEX `fk_cars_has_users_users1_idx` (`users_id` ASC) VISIBLE,
  INDEX `fk_cars_has_users_cars_idx` (`cars_id` ASC) VISIBLE,
  CONSTRAINT `fk_cars_has_users_cars`
    FOREIGN KEY (`cars_id`)
    REFERENCES `mydb`.`cars` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cars_has_users_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
