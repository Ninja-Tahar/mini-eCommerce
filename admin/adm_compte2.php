<?php
  session_start();
  if ($_SESSION[Username] != "admin"){
    header("Location: ../index.php");
    exit();
  }
  header("Location: ../admin.php");

  if (empty($_POST[login]) || empty($_POST[newpasswd]) || $_POST[submit] != OK)
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
    $newpasswd = hash(whirlpool, $_POST[newpasswd]);
    mysqli_query($mysqli, "UPDATE users SET passwd = '$newpasswd' WHERE login = '$login'");
    header("Location: ../admin.php?err=Le mot de passe de '$login' a été modifié.\n");
    exit();
  }
?>