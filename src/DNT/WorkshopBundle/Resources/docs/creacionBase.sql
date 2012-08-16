SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `ferreteria` ;
CREATE SCHEMA IF NOT EXISTS `ferreteria` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci ;
USE `ferreteria` ;

-- -----------------------------------------------------
-- Table `ferreteria`.`articulo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ferreteria`.`articulo` ;

CREATE  TABLE IF NOT EXISTS `ferreteria`.`articulo` (
  `idElemento` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `cantidad` INT NOT NULL DEFAULT 0 ,
  `precio` INT NOT NULL DEFAULT 0 ,
  `tipo` VARCHAR(15) NULL ,
  PRIMARY KEY (`idElemento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ferreteria`.`proveedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ferreteria`.`proveedor` ;

CREATE  TABLE IF NOT EXISTS `ferreteria`.`proveedor` (
  `idProveedor` INT NOT NULL ,
  `nombre` VARCHAR(30) NOT NULL ,
  `direccion` VARCHAR(30) NOT NULL ,
  `telefono` VARCHAR(15) NULL ,
  PRIMARY KEY (`idProveedor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ferreteria`.`provee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ferreteria`.`provee` ;

CREATE  TABLE IF NOT EXISTS `ferreteria`.`provee` (
  `articulo_idElemento` INT NOT NULL ,
  `proveedor_idProveedor` INT NOT NULL ,
  PRIMARY KEY (`articulo_idElemento`, `proveedor_idProveedor`) ,
  INDEX `fk_articulo_has_proveedor_proveedor1` (`proveedor_idProveedor` ASC) ,
  INDEX `fk_articulo_has_proveedor_articulo` (`articulo_idElemento` ASC) )
ENGINE = InnoDB;


CREATE USER `root`;

CREATE USER `user`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
