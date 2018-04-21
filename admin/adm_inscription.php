<?php
  session_start();
  if ($_SESSION[Username] != "admin"){
    header("Location: ../index.php");
    exit();
  }
  header("Location: ../admin.php");

  if (empty($_POST[login]) || empty($_POST[passwd]) || $_POST[submit] != OK)
  {
    header("Location: ../admin.php?err=Merci de remplir tous les champs.\n");
    exit();
  }
  $login = $_POST[login];
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE login = '$login'");
  if ($result->num_rows)
  {
    header("Location: ../admin.php?err=Login déjà pris.\n");
    exit();
  }
  $passwd = hash(whirlpool, $_POST[passwd]);
  mysqli_query($mysqli, "INSERT INTO users (login, passwd) VALUES ('$login', '$passwd')");
  header("Location: ../admin.php?err=Le compte '$login' a bien été crée.\n");

?>