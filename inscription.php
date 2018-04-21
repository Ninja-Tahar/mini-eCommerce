<?php
  include_once "header.php";
  if ($_GET[err])
  echo "<p id=err>$_GET[err]</p>";
?>
<html><body>
  <br/>
  <div class="box centerbox">
      <br/>
<form action="inscription-erreur.php" method="post">
  <center>Identifiant: </span><input type="text" name="login" value="" autofocus="autofocus" tabindex="1"/></center>
  <br/>
  <center>Mot de passe: <input type="password" name="passwd" value="" tabindex="2"/></center>
  <br/>
  <center><button type="submit" name="submit" value="OK" id="button2" tabindex="3">Inscription</button></center>
</form>
</div>
</body>
</html>