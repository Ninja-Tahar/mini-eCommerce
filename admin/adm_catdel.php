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
  $category = $_POST[nom];
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $result = mysqli_query($mysqli, "SELECT * FROM category WHERE name = '$category'");
  if (!$result->num_rows)
  {
    header("Location: ../admin.php?err=La catégorie '$category' n'existe pas.\n");
    exit();
  }
  else {
    mysqli_query($mysqli, "DELETE FROM category WHERE name = '$category'");
    header("Location: ../admin.php?err=La catégorie '$category' a été supprimé.\n");
    exit();
  }
?>
