# DROP DATABASE DBEJEMPLOUSER;
-- -----------------------------------------------------
-- ESTRUCTURA DBEJEMPLOUSER
-- -----------------------------------------------------
CREATE DATABASE DBEJEMPLOUSER DEFAULT CHARACTER SET utf8 ;
USE DBEJEMPLOUSER ;

-- -----------------------------------------------------
-- TABLA ROLES
-- -----------------------------------------------------
CREATE TABLE ROLES (
  rol_code INT NOT NULL AUTO_INCREMENT,
  rol_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (rol_code)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- TABLA USERS
-- -----------------------------------------------------
CREATE TABLE USERS (
  rol_code INT NOT NULL,
  user_code VARCHAR(100) NOT NULL,
  user_id VARCHAR(100) NOT NULL,
  user_name VARCHAR(50) NOT NULL,
  user_lastname VARCHAR(50) NOT NULL,
  user_email VARCHAR(100) NOT NULL,
  user_phone VARCHAR(100) NOT NULL,
  user_pass VARCHAR(150) NOT NULL,
  user_status TINYINT NOT NULL,
  PRIMARY KEY (user_code),
  INDEX ind_user_rol (rol_code ASC),
  CONSTRAINT fk_user_rol
    FOREIGN KEY (rol_code)
    REFERENCES ROLES (rol_code)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;
