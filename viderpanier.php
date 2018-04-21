<?php

  header('Location: panier.php');
  session_start();
  foreach ($_SESSION[panier] as $key => $value)
    $_SESSION[panier][$key] = 0;
  $_SESSION[objets] = 0;
?>
