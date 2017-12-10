<!DOCTYPE html>
<html>

                                                            <head>
  <meta charset="utf8">
  <link rel="stylesheet" href="">
  <title> Pièces </title>
                                                            </head>
                                                            <body>

<h1> Liste des pièces</h1>

<p> Suppression pièce <p>
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
<input type="submit" value="Supprimer" />



<p> Ajouter pièce <p>

  <form action="inndex.php?action=add_piece" method="post">
    <p>
      <p> <label for="nom"> Nom </label> : <input type="text" name="nom" id="nom_piece"> </p>
      <p> <label for="taille">Taille (m²) </label> : <input type="int" name="nom" id="taille_piece"> </p>
      <input type="text" name="prenom" /> <input type="submit" value="Valider" />
    </p>
  </form>






                                                            </body>
</html>
