<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="">
    <title> Pièces </title>
</head>

<body>
<h1>Gestion des emplacements</h1>

<h3> Ajouter pièce </h3>

  <form action="index.php?action=add_piece" method="post">
    <p>
      <p> <label for="nom"> Nom </label> : <input type="text" name="nom" id="nom_piece"> </p>
     
       <input type="submit" value="Valider" /> 
  </form>
  	<h3> Liste des pièces</h3>

<p> Suppression pièce <p>
<form action="index.php?action=delete_piece" method="post">
<!--  //menu déroulant pour choix de picecx-->
<select name="choix">
    <?php
    while ($piece = $pieces -> fetch())
    {
    ?>
    	<option value="Pièces"> <?= $piece["nom"] ?> </option>
        
    <?php 
    }
    $pieces -> closeCursor();
    ?>
</select>
<input type="submit" value="Supprimer" />
</form>
  
  
</body>
  
</html>