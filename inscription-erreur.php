<?php

header("Location: index.php");
  if (empty($_POST[login]) || empty($_POST[passwd]) || $_POST[submit] != OK)
  {
    header("Location: inscription.php?err=Merci de remplir tous les champs.\n");
    exit();
  }
  $login = $_POST[login];
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE login = '$login'");
  if ($result->num_rows)
  {
    header("Location: inscription.php?err=Login déjà pris.\n");
    exit();
  }
  $passwd = hash(whirlpool, $_POST[passwd]);
  mysqli_query($mysqli, "INSERT INTO users (login, passwd) VALUES ('$login', '$passwd')");
  header("Location: connection.php?err=Votre compte a bien été crée.\n");

?>