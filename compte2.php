<?php
  session_start();
  if (empty($_SESSION[Username])){
    header("Location: index.php");
    exit();
  }
  header("Location: compte.php");

  if (empty($_POST[login]) || empty($_POST[passwd]) || empty($_POST[newpasswd]) || $_POST[submit] != OK)
  {
    header("Location: compte.php?err=Merci de remplir tous les champs.\n");
    exit();
  }
  $login = $_POST[login];
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE login = '$login'");
  if (!$result->num_rows)
  {
    header("Location: compte.php?err=Le compte n'existe pas.\n");
    exit();
  }
  else {
    $passwd = hash(whirlpool, $_POST[passwd]);
    $result = mysqli_fetch_row(mysqli_query($mysqli, "SELECT passwd FROM users WHERE login = '$login'"));
    $newpasswd = hash(whirlpool, $_POST[newpasswd]);
    if ($result[0] == $passwd){
      mysqli_query($mysqli, "UPDATE users SET passwd = '$newpasswd 'WHERE login = '$login'");
      header("Location: compte.php?err=Votre mot de passe a été modifié.\n");
      exit();
    }
    else
    {
      header("Location: compte.php?err=Mauvais mot de passe.\n");
      exit();
    }
  }
?>