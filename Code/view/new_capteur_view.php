<!DOCTYPE html>
<html>

                                                            <head>
  <meta charset="utf8">
  <link rel="stylesheet" href="">
  <title> Pièces </title>
                                                            </head>
                                                            <body>

<h1> Nouvelle équipement </h1>




  <form action="controler.php" method="post">
    <!-- Prendre le id emplacement et implémenter un ID capteur-->


  <p> <label for="nom"> Nom </label> : <input type="text" name="nom" id="nom_equipement"> </p>
  <p> <label for="Fonctionalites"> Fonctionalité </label> :
    <select name="choix">

    <option value="detecteur 1">Détecteur présence </option>
    <option value="detecteur 2">Détecteur luminosité</option>
    <option value="detecteur 3">Lumière</option>
    <option value="detecteur 4">Télé</option>
    <option value="detecteur 4">Autre</option>


</select>


  <p> <label for="consommation_energetique"> Consommation energétique </label> : <input type="text" name="consommation_energetique" id="consommation_energetique"> </p>

    <input type="submit" value="Valider" />


  </form>





                                                            </body>
</html>
