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

function getProfile($id)
//Récupère nom, prénom, adresse, mail et pseudo de l'utilisateur qui a l'id donné
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT nom, prenom, adresse, mail, pseudo
                            FROM utilisateurs
                            WHERE id = ?");
    $req -> execute(array($id));
    $profile = $req -> fetch();
    $req -> closeCursor();
    
    return $profile;
}

function profileUpdate()
/*Met à jour les données de profil de l'utilisateur qui a l'id donné
 * On utilise pour cela les valeurs ($_POST) récupérées grâce à un formulaire
 */
{
    $db = dbConnect();
    foreach ($_POST as $key => $value)
    {
        if (!empty($value))
        {
            $req = $db -> prepare("UPDATE utilisateurs
                                SET $key = :value
                                WHERE id = :id");
            $req -> execute(array(
                "value" => htmlspecialchars($value),
                "id" => $_SESSION["id"]));
            $req -> closeCursor();
        }
    }
}

function getPassword()
//Donne le mot de passe de l'utilisateur qui a l'id donné
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT mot_de_passe
                                FROM utilisateurs
                                WHERE id = ?");
    $req -> execute(array($_SESSION["id"]));
    $db_password = $req -> fetch();
    $req -> closeCursor();
    
    return $db_password;
}

function passwordUpdate($new_password_1)
//Change le mot de passe de l'utilisateur qui a l'id donné par le nouveau mot de passe donné
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE utilisateurs
                            SET mot_de_passe = :mot_de_passe
                            WHERE id = :id");
    $req -> execute(array(
        "mot_de_passe" => $new_password_1,
        "id" => $_SESSION["id"]));
    $req -> closeCursor();
}

function profileCreation($nom, $prenom, $adresse, $mail, $pseudo, $mot_de_passe)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO utilisateurs(nom, prenom, adresse, mail, pseudo, mot_de_passe, categorie_utilisateur)
                            VALUES (:nom, :prenom, :adresse, :mail, :pseudo, :mot_de_passe, 'client_principal')");
    $req -> execute(array(
        "nom" => $nom,
        "prenom" => $prenom,
        "adresse" => $adresse,
        "mail" => $mail,
        "pseudo" => $pseudo,
        "mot_de_passe" => $mot_de_passe));
    
    $req -> closeCursor();
}

function getBreakdowns()
{
    $db = dbConnect();
    $req = $db -> query("SELECT description, date_panne, solution, date_solution, id_client
                            FROM pannes");
    
    return $req;
}

function getPhoneNumber()
{
    $db = dbConnect();
    $req = $db -> query("SELECT numero
                        FROM numeros_domisep");
    $phone_number = $req -> fetch();
    
    return $phone_number["numero"];
}

function updatePhoneNumber($phone_number)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE numeros_domisep
                            SET numero = ?");
    $req -> execute(array($phone_number));
    $req -> closeCursor();
}