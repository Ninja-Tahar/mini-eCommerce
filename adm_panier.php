<?php
  session_start();
  if ($_SESSION[Username] != "admin"){
    header("Location: index.php");
    exit();
  }
  include_once "header.php";
  $client = $_POST[nom];
  if ($_GET[err])
    echo "<p id=err>$_GET[err]</p>";
  session_start();

  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $tab = mysqli_query($mysqli, "SELECT * FROM panier WHERE login = '$client'");
  if (mysqli_num_rows($tab) > 0){
    echo "<h2>Ancien panier de $client</h2>";
    foreach ($tab as $key => $panier)
    {
      if ($panier)
      {
        foreach ($panier as $panier1 => $tab) {
          if ($panier1 === panier){
          $tab = unserialize($tab);
          echo "<table>";
          echo "<tr><th class=\"th_bar\">Produit</th><th class=\"th_bar\">Quantité</th></tr>";
          foreach ($tab as $key => $value) {
            if ($value > 0)
            {
              $name = mysqli_fetch_row(mysqli_query($mysqli, "SELECT name FROM products WHERE id = $key"));
              if (!empty($name[0]))
                echo "<tr><th>$name[0]</th><th>$value</th></tr>";
            }
          }
          echo "</table>";
          echo "<button id=button2 onclick='location.href = \"admin/adm_panremove.php?pan=$panier[id]\"' style=\"margin:5\">Supprimer le panier</button>";
        }
        }
      }
    }
  }
  else
    echo "Aucun panier trouvé.";

?>