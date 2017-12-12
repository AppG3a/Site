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
//Récupère le titre et texte des CGU
{
    $db = dbConnect();
    $req = $db -> query("SELECT titre, conditionsg
                            FROM conditionsgenerales");
    $conditionsgenerales = $req -> fetch();
    $req -> closeCursor();
    
    return $conditionsgenerales;
}
$conditionsgenerales = getCgu();
?>
<title>test penis</title>	
<p align="justify">
<center><h1><?= $conditionsgenerales["titre"] ?></h1></center><br/><br/>
	<?= $conditionsgenerales["conditionsg"] ?><br/><br/>
	<center><img src="cock.gif"></center>
	
</p>