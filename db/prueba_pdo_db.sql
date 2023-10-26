-- Creación Base de datos --
CREATE DATABASE prueba_pdo DEFAULT CHARACTER SET utf8 ;
USE prueba_pdo; -- Usando la base de datos --

-- Tabla Productos --
CREATE TABLE PRODUCTS(
    idProduct INT NOT NULL AUTO_INCREMENT,
    nameProduct VARCHAR(50) NOT NULL,
    -- priceProduct DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY(idProduct)
) ENGINE = InnoDB;