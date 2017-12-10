<?php 

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=site_app;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getPieces()
{
    $db = dbConnect();
    $req = $db -> query("SELECT nom
                        FROM emplacements
                        WHERE id_maison = 1");
   /*$$pieces = $req -> fetch();
    $req -> closeCursor();
    
    return $pieces;*/
    return $req;
}

?>
