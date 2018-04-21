<?php

  session_start();
  if (empty($_SESSION[Username]))
  {
    header('Location: connection.php?err=Connectez vous pour valider votre panier.');
    exit();
  }
  if ($_SESSION[objets]){
    $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
    $panier = serialize($_SESSION[panier]);
    mysqli_query($mysqli, "INSERT INTO panier (login, panier) VALUES ('$_SESSION[Username]', '$panier')");
    header('Location: panier.php?err=Votre panier a été enregistré.');
    foreach ($_SESSION[panier] as $key => $value)
      $_SESSION[panier][$key] = 0;
    $_SESSION[objets] = 0;
  }
  else
    header('Location: panier.php?err=Votre panier est vide.');
?>
