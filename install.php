<?php

function install() {
  $mysqli = mysqli_connect('localhost', 'root', '123456');
  if (!$mysqli){
    die("Connection failed: ".mysqli_connect_error());
  }
  mysqli_query($mysqli, "CREATE DATABASE data");
  mysqli_close($mysqli);

  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS users (id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY, login VARCHAR(255) NOT NULL, passwd VARCHAR(255) NOT NULL)");
  mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS products (id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, price FLOAT(9) UNSIGNED, category1 VARCHAR(255) NOT NULL, category2 VARCHAR(255), category3 VARCHAR(255))");
  mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS panier (id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY, login VARCHAR(255) NOT NULL, panier VARCHAR(4096))");
  mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS category (id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL)");
  $login = admin;
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE login LIKE '$login'");
  if (!$result->num_rows)
  {
    $adminpasswd = hash(whirlpool, "password");
    mysqli_query($mysqli, "INSERT INTO users (login, passwd) VALUES ('$login', '$adminpasswd')");
  }
  $result = mysqli_query($mysqli, "SELECT * FROM products");
  if (!$result->num_rows)
  {
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Samsung Galaxy S5', '189.00', 'Telephone')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Samsung Galaxy S6', '205.80', 'Telephone')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Samsung Galaxy S7', '300.00', 'Telephone')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Samsung Galaxy S8', '499.00', 'Telephone')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('SAMSUNG TV', '759.00', 'Television')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('LG TV', '449.00', 'Television')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Sony TV', '669.90', 'Television')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Panasonic TV', '549.00', 'Television')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Dell', '500.00', 'Ordinateur')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('ASUS', '600.0', 'Ordinateur')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Lenovo', '400.00', 'Ordinateur')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Miele Lave-vaisselle', '800.00', 'Electromenager')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Refrigerateur BOSCH', '900.00', 'Electromenager')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('Four encastrable Neff', '1499.90', 'Electromenager')");
    mysqli_query($mysqli, "INSERT INTO products (name, price, category1) VALUES ('chambre a coucher', '200.90', 'Autre')");
  }
  $result = mysqli_query($mysqli, "SELECT * FROM category");
  if (!$result->num_rows)
  {
    mysqli_query($mysqli, "INSERT INTO category (name) VALUES ('Telephone')");
    mysqli_query($mysqli, "INSERT INTO category (name) VALUES ('Television')");
    mysqli_query($mysqli, "INSERT INTO category (name) VALUES ('Electromenager')");
    mysqli_query($mysqli, "INSERT INTO category (name) VALUES ('Ordinateur')");
    mysqli_query($mysqli, "INSERT INTO category (name) VALUES ('Autre')");
  }
  mysqli_close($mysqli);
}

?>
