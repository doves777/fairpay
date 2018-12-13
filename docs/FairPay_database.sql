-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema FairPay
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema FairPay
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `FairPay` DEFAULT CHARACTER SET utf8 ;
USE `FairPay` ;

-- -----------------------------------------------------
-- Table `FairPay`.`Employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FairPay`.`Employees` (
  `employee_id` INT(11) NOT NULL,
  `full_name` VARCHAR(45) NULL DEFAULT NULL,
  `currently_employed` VARCHAR(45) NULL DEFAULT NULL,
  `username` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`employee_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `FairPay`.`Type of Services`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FairPay`.`Type of Services` (
  `type_of_service_id` INT(11) NOT NULL,
  `type_of_service_name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`type_of_service_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `FairPay`.`Services`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FairPay`.`Services` (
  `service_id` INT(11) NOT NULL,
  `type_of_service_id` INT(11) NOT NULL,
  `service_name` VARCHAR(45) NULL DEFAULT NULL,
  `service_price` DECIMAL(13,2) NULL DEFAULT NULL,
  `available` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  INDEX `fk_Services_Type of Services_idx` (`type_of_service_id` ASC),
  CONSTRAINT `fk_Services_Type of Services`
    FOREIGN KEY (`type_of_service_id`)
    REFERENCES `FairPay`.`Type of Services` (`type_of_service_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `FairPay`.`Transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FairPay`.`Transactions` (
  `transaction_id` INT(11) NOT NULL,
  `employee_id` INT(11) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  INDEX `fk_Orders_Employees1_idx` (`employee_id` ASC),
  CONSTRAINT `fk_Orders_Employees1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `FairPay`.`Employees` (`employee_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `FairPay`.`Transaction Details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FairPay`.`Transaction Details` (
  `transaction_details_id` INT(11) NOT NULL,
  `transaction_id` INT(11) NOT NULL,
  `service_id` INT(11) NOT NULL,
  `employee_id` INT(11) NULL DEFAULT NULL,
  `service_quantity` INT(11) NULL DEFAULT NULL,
  `service_total` DECIMAL(13,2) NULL DEFAULT NULL,
  `transaction_date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`transaction_details_id`),
  INDEX `fk_Order Details_Orders1_idx` (`transaction_id` ASC),
  INDEX `fk_Order Details_Services1_idx` (`service_id` ASC),
  CONSTRAINT `fk_Order Details_Orders1`
    FOREIGN KEY (`transaction_id`)
    REFERENCES `FairPay`.`Transactions` (`transaction_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order Details_Services1`
    FOREIGN KEY (`service_id`)
    REFERENCES `FairPay`.`Services` (`service_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
