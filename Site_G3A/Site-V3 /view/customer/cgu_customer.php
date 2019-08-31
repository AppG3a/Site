<?php
function dbConnect()
//Permet de se connecter à la base de données
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=site_app;charset=utf8', 'root', '');
        return $db;
    }
    
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
function getCgu()
//Récupère les CGU
{
    $db = dbConnect();
    $req = $db -> query("SELECT texte
                            FROM cgu");
    $cgu = $req -> fetch();
    $req -> closeCursor();
    
    return $cgu;
}
$cgu = getCgu();
?>
<title>Conditions Générales d'Utilisation</title>	
<p><?= $cgu["texte"] ?></p>

