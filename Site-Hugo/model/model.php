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

/*
function getPassword($pseudo)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT *
                            FROM utilisateurs
                            WHERE pseudo = ?");
    $req -> execute(array($pseudo));
    $db_content = $req -> fetch();
    $req -> closeCursor();
    
    return $db_content;
}
*/

function getPassword($mail)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT *
                            FROM utilisateurs
                            WHERE mail = ?");
    $req -> execute(array($mail));
    $db_content = $req -> fetch();
    $req -> closeCursor();
    
    return $db_content;
}

function getCgu()
{
    $db = dbConnect();
    $req = $db -> query("SELECT texte
                        FROM cgu");
    $cgu = $req -> fetch();
    $req -> closeCursor();
    
    return $cgu;
}

