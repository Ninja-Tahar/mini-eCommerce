<?php

  session_start();
  if ($_SESSION[Username] && !empty($_SESSION[Username])){
    include_once "header-connecte.php";
    echo "<p id=user>Bonjour <i>$_SESSION[Username]</i></p>";}
  else
    include_once "header-non-connecte.php";
  echo "<p id=panier>$_SESSION[objets]</p>";//nombre de produis dans le panier
  if ($_SESSION[Username] == "admin")
    echo '<button type="submit" name="submit" value="OK" class="button" style="top: 35px;" onclick="location.href = \'admin.php\'">Panel Admin</button>';
  else if ($_SESSION[Username])
    echo '<button type="submit" name="submit" value="OK" class="button" style="top: 35px;" onclick="location.href = \'compte.php\'">Compte</button>';
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $tab = mysqli_query($mysqli, "SELECT name FROM category");
 
  //construire le menu
  echo "<ul>";
  echo "<li><a href='index.php'>Tout</a></li>";
  foreach ($tab as $variable) {
    foreach ($variable as $key => $value) {
      if ($key === "name")
        echo "<li><a href='index.php?c=$value'>$value</a></li>";
    }
  }
  echo "</ul>";
?>