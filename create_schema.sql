SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ndd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ndd` ;

-- -----------------------------------------------------
-- Table `ndd`.`ESTABELECIMENTO`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ndd`.`ESTABELECIMENTO` (
  `latitude` VARCHAR(45) NOT NULL ,
  `longitude` VARCHAR(45) NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`latitude`, `longitude`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ndd`.`NOVIDADE`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ndd`.`NOVIDADE` (
  `latitude` VARCHAR(45) NOT NULL ,
  `longitude` VARCHAR(45) NOT NULL ,
  `data_novidade` DATE NOT NULL ,
  `texto` VARCHAR(140) NOT NULL ,
  PRIMARY KEY (`latitude`, `longitude`, `data_novidade`) ,
  INDEX `FK_NOVIDADE_ESTABELECIMENTO_idx` (`latitude` ASC, `longitude` ASC) ,
  CONSTRAINT `FK_NOVIDADE_ESTABELECIMENTO`
    FOREIGN KEY (`latitude` , `longitude` )
    REFERENCES `ndd`.`ESTABELECIMENTO` (`latitude` , `longitude` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `ndd` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
