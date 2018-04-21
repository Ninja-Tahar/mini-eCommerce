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
  if (!$result->num_rows)
  {
    header("Location: ../admin.php?err=Le produit '$product' n'existe pas.\n");
    exit();
  }
  else {
    mysqli_query($mysqli, "UPDATE products SET name = '$product', price = '$_POST[prix]', category1 = '$_POST[cat1]', category2 = '$_POST[cat2]', category3 = '$_POST[cat3]' WHERE name = '$product'");
    header("Location: ../admin.php?err=Le produit '$product' a été modifié.\n");
    exit();
  }
?>