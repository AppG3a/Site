<?php

function dbConnect()
//Permet de se connecter à la base de données
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