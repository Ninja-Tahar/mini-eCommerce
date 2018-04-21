<?PHP
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 0);

include "install.php";
  install();
  include_once "header.php";

    session_start();
  if ($_GET[err])
    echo "<p id=err>$_GET[err]</p>";
  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');

  $result = mysqli_query($mysqli, "SELECT * FROM category WHERE name = '$_GET[c]'");
  if ($result->num_rows)
    $products = mysqli_query($mysqli, "SELECT * FROM products WHERE category1 = '$_GET[c]' OR category2 = '$_GET[c]' OR category3 = '$_GET[c]'");
  else
    $products = mysqli_query($mysqli, "SELECT * FROM products");

  if (!empty($products)){

    echo "<table>";
    echo "<tr><th class=\"th_bar\">Produit</th><th class=\"th_bar\">Prix</th><th class=\"th_bar th_button\" colspan=2></th></tr>";
    foreach ($products as $key2 => $tab) {
      echo "<tr>";
      foreach ($tab as $key => $value2) {
        if ($key == 'id')
          $id = $value2;
        if ($key == 'name')
          echo "<th>$value2</th>";
        else if ($key == 'price')
          echo "<th>$value2 €</th>";
      }
      echo "<th class=\"th_button\"><button class=\"button_prod\" onclick=\"location.href = 'addproduct.php?id=$id&red=index.php?c=$_GET[c]'\">+</button></th><th class=\"th_button\"><button class=\"button_prod\" onclick=\"location.href = 'remproduct.php?id=$id&red=index.php?c=$_GET[c]'\">-</button></th></tr>";
      ;
      $i++;
    }
    echo "</table>";
  }

  mysqli_close($mysqli);
?>