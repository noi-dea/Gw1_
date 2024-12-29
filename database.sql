-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema gw1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gw1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gw1` DEFAULT CHARACTER SET utf8mb3 ;
USE `gw1` ;

-- -----------------------------------------------------
-- Table `gw1`.`fotosets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`fotosets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `front` VARCHAR(150) NULL DEFAULT NULL,
  `back` VARCHAR(150) NULL DEFAULT NULL,
  `inner` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `gw1`.`colours`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`colours` (
    `id` INT NOT NULL AUTO_INCREMENT,
    colourName VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `colourName_UNIQUE` (`colourName` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `gw1`.`makes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`makes` (
    `id` INT AUTO_INCREMENT,
    makeName VARCHAR(100),
    PRIMARY KEY(`id`),
    UNIQUE INDEX `makeName_UNIQUE` (`makeName` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `gw1`.`colours`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`bodyworks` (
    `id` INT NOT NULL AUTO_INCREMENT,
    typeName VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `typeName_UNIQUE` (`typeName` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `gw1`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `district` VARCHAR(45) NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `postalcode` INT NOT NULL,
  `housenumber` SMALLINT NOT NULL,
  `bus` VARCHAR(1) NULL DEFAULT NULL,
  `isAdmin` TINYINT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `gw1`.`cars`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`cars` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `makes_id` INT NOT NULL,
  `model` VARCHAR(45) NOT NULL,
  `year` YEAR NOT NULL,
  `fueltype` VARCHAR(45) NOT NULL,
  `colours_id` INT NOT NULL,
  `doors` TINYINT NOT NULL,
  `transmission` VARCHAR(45) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `mileage` INT NOT NULL,
  `bodywork_id` INT NOT NULL,
  `fotoUrl` VARCHAR(150) NOT NULL,
  `fotosets_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`, `fotosets_id`, `users_id`),
  INDEX `fk_cars_fotosets1_idx` (`fotosets_id` ASC) VISIBLE,
  INDEX `fk_cars_users1_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_cars_fotosets1`
    FOREIGN KEY (`fotosets_id`)
    REFERENCES `gw1`.`fotosets` (`id`),
  CONSTRAINT `fk_cars_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `gw1`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `gw1`.`wishlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`wishlist` (
  `cars_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`cars_id`, `users_id`),
  INDEX `fk_cars_has_users_users1_idx` (`users_id` ASC) VISIBLE,
  INDEX `fk_cars_has_users_cars_idx` (`cars_id` ASC) VISIBLE,
  CONSTRAINT `fk_cars_has_users_cars`
    FOREIGN KEY (`cars_id`)
    REFERENCES `gw1`.`cars` (`id`),
  CONSTRAINT `fk_cars_has_users_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `gw1`.`users` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `gw1`.`appointments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`appointments` (
  `id` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `cars_id` INT NOT NULL,
  `cars_fotosets_id` INT NOT NULL,
  `cars_users_id` INT NOT NULL,
  PRIMARY KEY (`id`, `cars_id`, `cars_fotosets_id`, `cars_users_id`),
  INDEX `fk_appointments_cars1_idx` (`cars_id` ASC, `cars_fotosets_id` ASC, `cars_users_id` ASC) VISIBLE,
  CONSTRAINT `fk_appointments_cars1`
    FOREIGN KEY (`cars_id` , `cars_fotosets_id` , `cars_users_id`)
    REFERENCES `gw1`.`cars` (`id` , `fotosets_id` , `users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gw1`.`users_has_appointments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gw1`.`users_has_appointments` (
  `users_id` INT NOT NULL,
  `appointments_id` INT NOT NULL,
  `appointments_cars_id` INT NOT NULL,
  `appointments_cars_fotosets_id` INT NOT NULL,
  `appointments_cars_users_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `appointments_id`, `appointments_cars_id`, `appointments_cars_fotosets_id`, `appointments_cars_users_id`),
  INDEX `fk_users_has_appointments_appointments1_idx` (`appointments_id` ASC, `appointments_cars_id` ASC, `appointments_cars_fotosets_id` ASC, `appointments_cars_users_id` ASC) VISIBLE,
  INDEX `fk_users_has_appointments_users1_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_has_appointments_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `gw1`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_appointments_appointments1`
    FOREIGN KEY (`appointments_id` , `appointments_cars_id` , `appointments_cars_fotosets_id` , `appointments_cars_users_id`)
    REFERENCES `gw1`.`appointments` (`id` , `cars_id` , `cars_fotosets_id` , `cars_users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- -----------------------------------------------------
-- -----------------------------------------------------
-- DATA INSERTION
-- -----------------------------------------------------
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Common colours data insertion
-- -----------------------------------------------------
INSERT INTO colours (colourName) VALUES
('wit'),
('zwart'),
('zilver'),
('grijs'),
('blauw'),
('rood'),
('groen'),
('geel'),
('bruin'),
('oranje');


-- -----------------------------------------------------
-- Most common car makes data insertion
-- -----------------------------------------------------
INSERT INTO makes (makeName) VALUES
('Toyota'),
('Ford'),
('Honda'),
('Chevrolet'),
('BMW'),
('Mercedes-Benz'),
('Audi'),
('Nissan'),
('Hyundai'),
('Volkswagen'),
('Tesla'),
('Subaru'),
('Kia'),
('Jeep'),
('Chrysler');


-- -----------------------------------------------------
-- Most common car bodyworks data insertion
-- -----------------------------------------------------
INSERT INTO bodyworks (typeName) VALUES
('hatchback'),
('sedan'),
('SUV'),
('MUV'),
('coupe'),
('convertible'),
('pickup truck'),
('ander');