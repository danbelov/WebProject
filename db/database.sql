
/* Script in SQL language
  * to create database for the shop
  * created by Daniil Belov (belod1)
  */

DROP TABLE IF EXISTS orders;

DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS food;

DROP TABLE IF EXISTS drinks;

DROP TABLE IF EXISTS contents;

DROP TABLE IF EXISTS extras;

DROP TABLE IF EXISTS prices;

DROP TABLE IF EXISTS descriptions;

CREATE TABLE orders(
  id INT PRIMARY KEY,
  datetime DATETIME,
  shippingAddress VARCHAR(50),
  totalAmount FLOAT,
  status VARCHAR(10)
);

CREATE TABLE users(
  id INT PRIMARY KEY,
  language VARCHAR(3)
);

CREATE TABLE food(
  id INT PRIMARY KEY,
  description INT
);

CREATE TABLE drinks(
  id INT PRIMARY KEY,
  description INT
);

CREATE TABLE contents(
  id INT PRIMARY KEY,
  description INT
);

CREATE TABLE extras(
  id INT PRIMARY KEY,
  description INT
);

CREATE TABLE prices(
  id INT PRIMARY KEY,
  customer FLOAT,
  internal FLOAT
);

CREATE TABLE descriptions(
  id INT PRIMARY KEY
);
