<?php

/**
 * Connexion à la base de données "site_app"
 * 
 * @return PDO
 */
function dbConnect()
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

/**
 * Récupère tous les champs de la table "utilisateurs" où l'email correspond à l'email donné ($mail)
 * 
 * @param string $mail
 * @return mixed
 */
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

/**
 * Change le mot de passe de l'utilisateur qui a l'id donné ($id)
 * La valeur du nouveau mot de passe est donnée par $new_password
 * 
 * @param string $id
 * @param string $new_password
 */
function updatePassword($id, $new_password)
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

/**
 * Récupère les conditions générales d'utilisation
 * 
 * @return mixed
 */
function getCgu()
{
    $db = dbConnect();
    $req = $db -> query("SELECT texte
                        FROM cgu");
    $cgu = $req -> fetch();
    $req -> closeCursor();
    
    return $cgu;
}

/**
 * Récupère tous les champs de la table "images" (et notamment les liens des images)
 * 
 * @return PDOStatement
 */
function getPictures()
{
    $db = dbConnect();
    $req = $db -> query("SELECT *
                        FROM images");    
    return $req;
}

























