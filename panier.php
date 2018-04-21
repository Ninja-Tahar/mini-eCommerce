<?php

include_once "header.php";
if ($_GET[err])
  echo "<p id=err>$_GET[err]</p>";
$mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
if ($_SESSION[panier])
  foreach ($_SESSION[panier] as $key => $value)
    $quantity += $value;
if ($_SESSION[panier] && $quantity > 0)
{
  echo "<br/>";
  echo "<table>";
  echo "<tr><th class=\"th_bar\">Produit</th><th class=\"th_bar\">Prix</th><th class=\"th_bar\">Quantité</th><th class=\"th_bar th_button\" colspan=2/th></tr>";
  foreach ($_SESSION[panier] as $key => $value)
  {
    echo "<tr>";
    if ($value > 0){
      $products = mysqli_query($mysqli, "SELECT * FROM products WHERE id = $key");
      foreach ($products as $key2 => $value2)
      {
        echo "<th>$value2[name]</th><th>$value2[price] €</th><th>$value</th>";
        echo "<th class=\"th_button\"><button class=\"button_prod\" onclick=\"location.href = 'addproduct.php?id=$key&red=panier.php'\">+</button></th><th class=\"th_button\"><button class=\"button_prod\" onclick=\"location.href = 'remproduct.php?id=$key&red=panier.php'\">-</button></th>";
        $price += $value2[price];
      }
    }
    echo "</tr>";
  }
  echo "<tr><th class=\"th_bar\">Total</th><th class=\"th_bar\">$price €</th><th class=\"th_bar\">$quantity</th><th class=\"th_bar th_button\" colspan=2</th></tr>";
  echo "</table>";
  echo "<button id='vider_panier' onclick=\"location.href = 'viderpanier.php'\">Vider panier</button>";
  echo "<button id='vider_panier' onclick=\"location.href = 'validerpanier.php'\">Valider panier</button>";
}
else if ($_GET[err] != "Votre panier a été enregistré.")
  echo "<p id=err>Votre panier est vide.</p>";
?>