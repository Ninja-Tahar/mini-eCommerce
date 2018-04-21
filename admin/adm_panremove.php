<?php

  session_start();
  if ($_SESSION[Username] != "admin"){
    header("Location: ../index.php");
    exit();
  }
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  mysqli_query($mysqli, "DELETE FROM panier WHERE id = '$_GET[pan]'");
  header("Location: ../admin.php?err=Le panier '$_GET[pan]' a été supprimé.\n");
  exit();
?>
