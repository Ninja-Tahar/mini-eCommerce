<?php

  session_start();
  header("Location: $_GET[red]");
  if ($_SESSION[objets] < 0)
    $_SESSION[objets] = 0;
  if ($_SESSION[panier][$_GET[id]] > 0){
    $_SESSION[panier][$_GET[id]]--;
    $_SESSION[objets]--;
  }

?>