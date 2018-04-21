<?php

  session_start();
  header("Location: $_GET[red]");
  $_SESSION[objets]++;
  $_SESSION[panier][$_GET[id]]++;

?>