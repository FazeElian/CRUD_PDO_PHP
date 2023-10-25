-- IF EXISTS DROP DATABASE CRUD_PDO_PHP;
-- -----------------------------------------------------
-- ESTRUCTURA CRUD_PDO_PHP
-- -----------------------------------------------------
CREATE DATABASE CRUD_PDO_PHP DEFAULT CHARACTER SET utf8 ;
USE CRUD_PDO_PHP;

-- -----------------------------------------------------
-- TABLA USERS
-- -----------------------------------------------------
CREATE TABLE USERS (
  idUser INT NOT NULL AUTO_INCREMENT,
  userName VARCHAR(50) NOT NULL,
  userEmail VARCHAR(100) NOT NULL,
  password VARCHAR(30) NOT NULL,
  PRIMARY KEY (idUser)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- TABLA PRODUCTS_CATEGORIES
-- -----------------------------------------------------
CREATE TABLE PRODUCTS_CATEGORIES (
  idCategory INT NOT NULL AUTO_INCREMENT,
  nameCategory VARCHAR(50) NOT NULL,
  PRIMARY KEY (idCategory)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- TABLA PRODUCTS
-- -----------------------------------------------------
CREATE TABLE PRODUCTS (
  idProduct INT NOT NULL AUTO_INCREMENT,
  idCategory INT NOT NULL,
  productName VARCHAR(50) NOT NULL,
  productDescription VARCHAR(100) NOT NULL,
  productPrice DECIMAL (10, 2) NOT NULL,
  PRIMARY KEY (idProduct),
  INDEX ind_products_categorie (idCategory ASC),
  CONSTRAINT fk_products_categorie
    FOREIGN KEY (idCategory)
    REFERENCES PRODUCTS_CATEGORIES (idCategory)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;