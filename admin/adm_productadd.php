<?php
  session_start();
  if ($_SESSION[Username] != "admin"){
    header("Location: ../index.php");
    exit();
  }
  header("Location: ../admin.php");

  if (empty($_POST[nom]) || empty($_POST[prix]) || (empty($_POST[cat1]) && empty($_POST[cat2]) && empty($_POST[cat3])) || $_POST[submit] != OK)
  {
    header("Location: ../admin.php?err=Merci de remplir tous les champs avec au moins une catégorie.\n");
    exit();
  }
  $product = $_POST[nom];
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $result = mysqli_query($mysqli, "SELECT * FROM products WHERE name = '$product'");
  if ($result->num_rows)
  {
    header("Location: ../admin.php?err=Le produit '$product' existe déjà.\n");
    exit();
  }
  else{
  mysqli_query($mysqli, "INSERT INTO products (name, price, category1, category2, category3) VALUES ('$product', '$_POST[prix]', '$_POST[cat1]', '$_POST[cat2]', '$_POST[cat3]')");
  header("Location: ../admin.php?err=Le produit '$product' a bien été crée.\n");
  }

?>