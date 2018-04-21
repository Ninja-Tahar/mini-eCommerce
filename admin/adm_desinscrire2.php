<?php
  session_start();
  if ($_SESSION[Username] != "admin"){
    header("Location: ../index.php");
    exit();
  }
  header("Location: ../admin.php");

  if (empty($_POST[login]) || $_POST[submit] != OK)
  {
    header("Location: ../admin.php?err=Merci de remplir tous les champs.\n");
    exit();
  }
  $login = $_POST[login];
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE login = '$login'");
  if (!$result->num_rows)
  {
    header("Location: ../admin.php?err=Le compte '$login' n'existe pas.\n");
    exit();
  }
  else {
      mysqli_query($mysqli, "DELETE FROM users WHERE login = '$login'");
      header("Location: ../admin.php?err=Le compte '$login' a été supprimé.\n");
      exit();
  }
?>