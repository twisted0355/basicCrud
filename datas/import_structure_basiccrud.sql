-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema basiccrud
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema basiccrud
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `basiccrud` DEFAULT CHARACTER SET utf8 ;
USE `basiccrud` ;

-- -----------------------------------------------------
-- Table `basiccrud`.`perm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basiccrud`.`perm` (
  `idperm` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thename` VARCHAR(60) NOT NULL,
  `theperm` TINYINT UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`idperm`),
  UNIQUE INDEX `thename_UNIQUE` (`thename` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basiccrud`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basiccrud`.`users` (
  `idusers` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL COMMENT 'case sensitive',
  `thepwd` CHAR(64) NOT NULL COMMENT 'SHA-256',
  `thename` VARCHAR(160) NOT NULL,
  `themail` VARCHAR(200) NOT NULL,
  `perm_idperm` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`idusers`),
  UNIQUE INDEX `thelogin_UNIQUE` (`thelogin` ASC),
  INDEX `fk_users_perm_idx` (`perm_idperm` ASC),
  CONSTRAINT `fk_users_perm`
    FOREIGN KEY (`perm_idperm`)
    REFERENCES `basiccrud`.`perm` (`idperm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basiccrud`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basiccrud`.`article` (
  `idarticle` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(160) NOT NULL,
  `thetext` TEXT NOT NULL,
  `thedate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `thevisibility` TINYINT UNSIGNED NULL DEFAULT 0 COMMENT '0 => invisible\n1 => validé (donc visible)\n2 => refusé',
  `users_idusers` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticle`),
  INDEX `fk_article_users1_idx` (`users_idusers` ASC),
  CONSTRAINT `fk_article_users1`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `basiccrud`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basiccrud`.`rubrique`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basiccrud`.`rubrique` (
  `idrubrique` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `theintitule` VARCHAR(120) NOT NULL,
  `thedesc` VARCHAR(600) NULL,
  PRIMARY KEY (`idrubrique`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `basiccrud`.`article_has_rubrique`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `basiccrud`.`article_has_rubrique` (
  `article_idarticle` INT UNSIGNED NOT NULL,
  `rubrique_idrubrique` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`article_idarticle`, `rubrique_idrubrique`),
  INDEX `fk_article_has_rubrique_rubrique1_idx` (`rubrique_idrubrique` ASC),
  INDEX `fk_article_has_rubrique_article1_idx` (`article_idarticle` ASC),
  CONSTRAINT `fk_article_has_rubrique_article1`
    FOREIGN KEY (`article_idarticle`)
    REFERENCES `basiccrud`.`article` (`idarticle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_article_has_rubrique_rubrique1`
    FOREIGN KEY (`rubrique_idrubrique`)
    REFERENCES `basiccrud`.`rubrique` (`idrubrique`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
