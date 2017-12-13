
/*
  * Script in SQL language
  * to create database for the shop
  * created by Daniil Belov (belod1)
  */
CREATE DATABASE IF NOT EXISTS webshopdb

CHARACTER SET = utf8
COLLATE = latin1_german1_ci;

USE webshopdb;

DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS orders;

DROP TABLE IF EXISTS products;

DROP TABLE IF EXISTS contains;

CREATE TABLE IF NOT EXISTS orders(
  ID INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  datetime DATETIME,
  firstName VARCHAR(50) NOT NULL ,
  lastName VARCHAR(50) NOT NULL ,
  shippingName VARCHAR(50) NOT NULL ,
  shippingAddress VARCHAR(50) NOT NULL,
  totalAmount FLOAT,
  status VARCHAR(10)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS users(
  ID INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  language VARCHAR(3),
  firstName VARCHAR(50),
  lastName VARCHAR(50),
  address VARCHAR(50),
  registrationDate DATETIME
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS products(
  ID INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  qtyInASet INT(2) NOT NULL,
  category VARCHAR(50) NOT NULL ,
  descriptionKey VARCHAR(50) NOT NULL ,
  price FLOAT NOT NULL,
  photo BLOB
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS contains(
  OID INT(10) NOT NULL PRIMARY KEY REFERENCES orders(ID),
  PID INT(10) NOT NULL PRIMARY KEY REFERENCES products(ID),
  quantity INT(3)
) ENGINE = InnoDB;

INSERT INTO `products` (`name`,`qtyInASet`,`category`, `descriptionKey`, `price`) VALUES
  ('Saki','6','SIMPLESUSHI','simple_saki_6','4.50'),
  ('Saki','10','SIMPLESUSHI','simple_saki_10','8.00'),
  ('Saki','18','SIMPLESUSHI','simple_saki_18','12.00'),
  ('Unagi','6','SIMPLESUSHI','simple_unagi_6','9.40'),
  ('Unagi','10','SIMPLESUSHI','simple_unagi_10','12.00'),
  ('Unagi','18','SIMPLESUSHI','simple_unagi_18','21.00'),
  ('Kani','6','SIMPLESUSHI','simple_kani_6','5.50'),
  ('Kani','10','SIMPLESUSHI','simple_kani_10','9.00'),
  ('Kani','18','SIMPLESUSHI','simple_kani_18','16.00'),
  ('California','6','SUSHIROLLS','california_6','13.50'),
  ('California','10','SUSHIROLLS','california_6','20.00'),
  ('California','18','SUSHIROLLS','california_6','28.00'),
  ('Philadelphia','6','SUSHIROLLS','philadelphia_6','8.50'),
  ('Philadelphia','10','SUSHIROLLS','philadelphia_10','11.00'),
  ('Philadelphia','18','SUSHIROLLS','philadelphia_18','19.00'),
  ('Montana','6','SUSHIROLLS','montana_6','15.40'),
  ('Montana','10','SUSHIROLLS','montana_10','21.00'),
  ('Montana','18','SUSHIROLLS','montana_18','32.00'),
  ('Kimchi','1','RAMEN','kimchi','8.00'),
  ('Maguro','1','RAMEN','maguro','9.00'),
  ('Soba','1','RAMEN','soba','6.00'),
  ('Modanyaki','1','OKONOMIYAKI','modanyaki','15.00'),
  ('Hiroshima-yaku','1','OKONOMIYAKI','hiroshima-yaku','21.00'),
  ('Soy','1','SAUCE','soy','0.40'),
  ('Teriyaki','1','SAUCE','teriyaki','0.50'),
  ('Sesam','1','SAUCE','sesam','1.00'),
  ('Oyster','1','SAUCE','oyster','2.00'),
  ('Baked','1','EXTRA','baked','1.20'),
  ('Roasted','1','EXTRA','roasted','2.00'),
  ('Katsuobushi','1','EXTRA','katsuobushi','4.00'),
  ('Ginger','1','EXTRA','ginger','2.00'),
  ('Tobiko','1','EXTRA','tobiko','2.50'),
  ('Wakame','1','EXTRA','wakame','3.50'),
  ('Wasabi','1','EXTRA','wasabi','1.20'),
  ('Thermal Package','1','EXTRA','thermal_packaging','3.00'),
  ('Bern','1','DELIVERY','delivery_bern','0.00'),
  ('Kanton Bern','1','DELIVERY','delivery_canton','10.00');

