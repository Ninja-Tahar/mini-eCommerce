<?php
  session_start();
  if (empty($_SESSION[Username])){
    header("Location: connection.php");
    exit();
  }
  include_once "header.php";
  if ($_GET[err])
  echo "<p id=err>$_GET[err]</p>";

  $mysqli = mysqli_connect('localhost', 'root', '123456', 'data');
  $tab = mysqli_query($mysqli, "SELECT panier FROM panier WHERE login = '$_SESSION[Username]'");
  if (mysqli_num_rows($tab) > 0){
    echo "<h2>Ancien panier</h2>";
    foreach ($tab as $key => $panier)
    {
      if ($panier)
      {
        foreach ($panier as $key => $tab) {
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
        }
      }
    }
  }
?>
<html><body>
  <div class="box" style="width: 350px; top:40;">
    <p id="mdp">Modifier son mot de passe</p>
      <br/>
<form action="compte2.php" method="post">
  <center>Identifiant: </span><input type="text" name="login" value="" autofocus="autofocus" tabindex="1"/></center>
  <br/>
  <center>Ancien mot de passe: <input type="password" name="passwd" value="" tabindex="2"/></center>
  <br/>
  <center>Nouveau mot de passe: <input type="password" name="newpasswd" value="" tabindex="3"/></center>
  <br/>
  <center><button type="submit" name="submit" value="OK" id="button2" tabindex="4">Valider</button></center>
</form>
</div>
</body>
  </html>