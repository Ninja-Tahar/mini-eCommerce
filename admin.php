<?php

  session_start();
  if ($_SESSION[Username] != "admin"){
    header("Location: index.php");
    exit();
  }
  include_once "header.php";
  if ($_GET[err])
  echo "<p id=err>$_GET[err]</p><br/>";
  session_start();

?>
<html>
<form action="compte.php" method="get" class="formadmin">
  <button type="submit" name="submit" value="OK" class="button" style="top: 35px; ">Compte</button>
</form>
  <body>
    <br/>
    <div class="box" >
      <p id="mdp">Ajout d'un produit</p>
      <br/>
      <form action="admin/adm_productadd.php" method="post" class="formadmin">
        <center>Nom: </span><input type="text" name="nom" value=""/></center>
        <br/>
        <center>Prix: </span><input type="text" name="prix" value=""/></center>
        <br/>
        <center>Category1: </span><input type="text" name="cat1" value=""/></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
    <div class="box">
      <p id="mdp">Modification d'un produit</p>
      <br/>
      <form action="admin/adm_productedit.php" method="post" class="formadmin">
        <center>Nom: </span><input type="text" name="nom" value=""/></center>
        <br/>
        <center>Prix: </span><input type="text" name="prix" value=""/></center>
        <br/>
        <center>Catégorie 1: </span><input type="text" name="cat1" value=""/></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
    <div class="box">
      <p id="mdp">Suppression d'un produit</p>
      <br/>
      <form action="admin/adm_productdel.php" method="post" class="formadmin">
        <center>Nom: </span><input type="text" name="nom" value=""/></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
    <div class="box">
      <p id="mdp">Creer un utilisateur</p>
      <br/>
      <form action="admin/adm_inscription2.php" method="post" class="formadmin">
        <center>Identifiant: </span><input type="text" name="login" value=""/></center>
        <br/>
        <center>mot de passe: <input type="password" name="passwd" value="" /></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
    <div class="box">
      <p id="mdp">Modifier le mot de passe</p>
      <br/>
      <form action="admin/adm_compte2.php" method="post" class="formadmin">
        <center>Identifiant: </span><input type="text" name="login" value=""/></center>
        <br/>
        <center>Mot de passe: <input type="password" name="newpasswd" value="" /></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
    <div class="box">
      <p id="mdp">Suppression d'un utilisateur</p>
      <br/>
      <form action="admin/adm_desinscrire2.php" method="post" class="formadmin">
        <center>Identifiant: </span><input type="text" name="login" value=""/></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
    <div class="box">
      <p id="mdp">Ajout d'une catégorie</p>
      <br/>
      <form action="admin/adm_catadd.php" method="post" class="formadmin">
        <center>Nom: </span><input type="text" name="nom" value=""/></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
    <div class="box">
      <p id="mdp">Suppresion d'une catégorie</p>
      <br/>
      <form action="admin/adm_catdel.php" method="post" class="formadmin">
        <center>Nom: </span><input type="text" name="nom" value=""/></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
    <div class="box">
      <p id="mdp">Voir le panier d'un client</p>
      <br/>
      <form action="adm_panier.php" method="post" class="formadmin">
        <center>Nom du client: </span><input type="text" name="nom" value=""/></center>
        <br/>
        <center><button type="submit" name="submit" value="OK" id="button2">Valider</button></center>
      </form>
    </div>
  </body>
</html>