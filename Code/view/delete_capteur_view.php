<!DOCTYPE html>
<html>

                                                            <head>
  <meta charset="utf8">
  <link rel="stylesheet" href="">
  <title> Pièces </title>
                                                            </head>
                                                            <body>

<h1> Choix du capteur </h1>
<p> Choisir pièces </p>
  <form action="controler.php" method="post">
    <p>
  <!--  //menu déroulant pour choix de picecx-->
    <select name="choix">
<!--fonction array de toute les pièces et menu déroulant de toutes les pièces -->
    <option value="piece_1">Chambre Anika</option>
    <option value="piece_2">Salon</option>
    <option value="piece_3">Cuisine </option>
    <option value="piece_4">Salle de bain</option>
</select>

<!--fonction array de toute les capteurs de la pièce  et menu déroulant de toutes les pièces -->

<select name="choix">

<option value="detecteur 1">Détecteur présence </option>
<option value="detecteur 2">Détecteur luminosité</option>
<option value="detecteur 3">Lumière</option>
<option value="detecteur 4">Télé</option>

</select>

    <input type="submit" value="Supprimer" />
    //Suppression du capteur
    </p>
  </form>






                                                            </body>
</html>
