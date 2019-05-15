-- MySQL Script generated by MySQL Workbench
-- Mon May 13 10:42:54 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Product
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Product
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Product` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema assignment
-- -----------------------------------------------------
USE `Product` ;

-- -----------------------------------------------------
-- Table `Product`.`Product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Product`.`Product` ;

CREATE TABLE IF NOT EXISTS `Product`(
  `product_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `product_name` VARCHAR(45) NOT NULL,
  `long_description` TEXT NOT NULL,
  `short_description` VARCHAR(255) NOT NULL,
  `availability` TINYINT NOT NULL,
  `country_of_origin` VARCHAR(45) NOT NULL,
  `weight` DECIMAL NOT NULL,
  `price` FLOAT NOT NULL,
  `delivery_cost` FLOAT NOT NULL,
  `roast` VARCHAR(45) NOT NULL,
  `grind` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Product`.`Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Product`.`Customer` ;

/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `is_admin` varchar(15) NOT NULL DEFAULT 'regular',
  `age` int(11) DEFAULT NULL,
  `street` varchar(55) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `conf_passw` varchar(12) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP)
   ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


-- -----------------------------------------------------
-- Table `Product`.`Orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Product`.`Orders` ;

CREATE TABLE IF NOT EXISTS `order`(
  `order_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cost` FLOAT NOT NULL,
  `sub_total` FLOAT NULL,
  `quantity` INT NOT NULL,
  `gst` INT NOT NULL,
  `pst` FLOAT NULL,
  `total` FLOAT NULL,
  `customer_id` INT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Product`.`Order/Product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Product`.`Order/Product` ;

CREATE TABLE IF NOT EXISTS `order/product`(
  `order_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `product_name` VARCHAR(45) NOT NULL,
  `price` FLOAT NOT NULL,
  `quantity` DECIMAL NOT NULL,
  `subtotal` FLOAT NOT NULL,
  `delivery_cost` FLOAT NOT NULL,
  `total` DECIMAL NOT NULL)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;