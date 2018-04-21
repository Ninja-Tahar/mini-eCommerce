<?php
  session_start();
  $_SESSION[Username] = "";
  header("Location: index.php");
?>