<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8">
  <link rel="stylesheet" href="">
  <title> Capteur </title>
</head>
<body>

<h1> Gestion équipements </h1>
<h3>Nouveau capteur </h3>

<form action="index.php?action=add_capteur" method="post">
    
      <p> <label for="nom"> Nom </label> : <input type="text" name="nom" id="nom_piece"> </p>
      <p> <label for="description"> Description </label> : <input type="text" name="description" id="description"> </p>
     
       <input type="submit" value="Valider" /> 
</form>
<h3>Suppresion capteur </h3>
<p>Choix capteur </p>
<form action="index.php?action=delete_capteur" method="post">

<select name="choix">
    <?php
    while ($capteurs = $capteurs -> fetch())
    {
    ?>
    	<option value="reference"> <?= $capteurs["reference"] ?> </option>
        
    <?php 
    }
    $capteurs -> closeCursor();
    ?>
</select>

<p><input type="submit" value="Supprimer" /> </p>
</form>




</body>
</html>
