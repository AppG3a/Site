<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=site_app;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT nom FROM piece WHERE ID_maison="$..." ');

while ($donnees = $reponse->fetch())
{
    echo $donnees['nom'] . '<br />';
}

$reponse->closeCursor();

?>
