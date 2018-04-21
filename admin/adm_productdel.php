<?php
  session_start();
  if ($_SESSION[Username] != "admin"){
    header("Location: ../index.php");
    exit();
  }
  header("Location: ../admin.php");

  if (empty($_POST[nom]) || $_POST[submit] != OK)
  {
    header("Location: ../admin.php?err=Merci de remplir tous les champs.\n");
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
      mysqli_query($mysqli, "DELETE FROM products WHERE name = '$product'");
      header("Location: ../admin.php?err=Le produit '$product' a été supprimé.\n");
      exit();
  }
?>