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

function getPassword($mail)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT *
                            FROM utilisateurs
                            WHERE mail = :mail");
    $req -> bindParam("mail", $mail);
    $req -> execute();
    $db_content = $req -> fetch();
    $req -> closeCursor();
    
    return $db_content;
}

function updatePassword($id, $new_password)
//Change le mot de passe de l'utilisateur qui a l'id donné par le nouveau mot de passe donné
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE utilisateurs
                        SET mot_de_passe = :mot_de_passe
                        WHERE id = :id");
    $req -> bindParam("mot_de_passe", $new_password);
    $req -> bindParam("id", $id);
    $req -> execute();
    $req -> closeCursor();
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

function getPictures()
{
    $db = dbConnect();
    $req = $db -> query("SELECT *
                        FROM images");    
    return $req;
}

























