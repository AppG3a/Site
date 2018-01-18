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
    $req = $db -> prepare("SELECT nom, prenom, adresse, mail
                            FROM utilisateurs
                            WHERE id = :id");
    $req -> bindParam("id", $id);
    $req -> execute();
    $profile = $req -> fetch();
    $req -> closeCursor();
    
    return $profile;
}

function profileUpdate($name, $first_name, $address)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE utilisateurs
                            SET nom = :nom, prenom = :prenom, adresse = :adresse
                            WHERE id = :id");
    $req -> bindParam("nom", $name);
    $req -> bindParam("prenom", $first_name);
    $req -> bindParam("adresse", $address);
    $req -> bindParam("id", $_SESSION["id"]);
    $req -> execute();
    $req -> closeCursor();
}

function getPassword()
//Donne le mot de passe de l'utilisateur qui a l'id donné
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT mot_de_passe
                                FROM utilisateurs
                                WHERE id = :id");
    $req -> bindParam("id", $_SESSION["id"]);
    $req -> execute();
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
    $req -> bindParam("mot_de_passe", $new_password_1);
    $req -> bindParam("id", $_SESSION["id"]);
    $req -> execute();
    $req -> closeCursor();
}

function profileCreation($nom, $prenom, $adresse, $mail, $mot_de_passe)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO utilisateurs(nom, prenom, adresse, mail, mot_de_passe, categorie_utilisateur)
                            VALUES (:nom, :prenom, :adresse, :mail, :mot_de_passe, 'admin')");
    $req -> bindParam("nom", $nom);
    $req -> bindParam("prenom", $prenom);
    $req -> bindParam("adresse", $adresse);
    $req -> bindParam("mail", $mail);
    $req -> bindParam("mot_de_passe", $mot_de_passe);
    $req -> execute();
    
    $req -> closeCursor();
}

function getBreakdowns()
{
    $db = dbConnect();
    $req = $db -> query("SELECT id, description, date_panne, solution, date_solution, id_client
                            FROM pannes");
    
    return $req;
}

function getContact($id_contact)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT numero
                            FROM numeros_domisep
                            WHERE id = :id_contact");
    $req -> bindParam("id_contact", $id_contact);
    $req -> execute();
    $contact = $req -> fetch();
    $req -> closeCursor();
    
    return $contact["numero"];
}

function updatePhoneNumber($phone_number)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE numeros_domisep
                            SET numero = :numero
                            WHERE id = 1");
    $req -> bindParam("numero", $phone_number);
    $req -> execute();
    $req -> closeCursor();
}

function updateEmail($email)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE numeros_domisep
                            SET numero = :numero
                            WHERE id = 2");
    $req -> bindParam("numero", $email);
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

function cguUpdate($cgu)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE cgu
                            SET texte = :texte");
    $req -> bindParam("texte", $cgu);
    $req -> execute();
    $req -> closeCursor();    
}

function getCustomers()
{
    $db = dbConnect();
    $req = $db -> query("SELECT *
                        FROM utilisateurs
                        WHERE categorie_utilisateur = 'customer'");
    return $req;
}

function insertSensor($type, $category, $picture_link, $unity, $default_value, $max, $min, $display_code)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO types_capteurs(type, categorie, lien_image, unite, valeur_defaut, max, min, code_affichage)
                            VALUES (:type, :categorie, :lien_image, :unite, :valeur_defaut, :max, :min, :code_affichage)");
    $req -> bindParam("type", $type);
    $req -> bindParam("categorie", $category);
    $req -> bindParam("lien_image", $picture_link);
    $req -> bindParam("unite", $unity);
    $req -> bindParam("valeur_defaut", $default_value);
    $req -> bindParam("max", $max);
    $req -> bindParam("min", $min);
    $req -> bindParam("code_affichage", $display_code);
    $req -> execute();
    
    $req -> closeCursor();
}

function getPictures()
{
    $db = dbConnect();
    $req = $db -> query("SELECT *
                        FROM images");
    return $req;
}

function updatePicture($id_picture, $picture_link)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE images
                            SET lien = :lien
                            WHERE id = :id");
    $req -> bindParam("lien", $picture_link);
    $req -> bindParam("id", $id_picture);
    $req -> execute();
    $req -> closeCursor();  
}

function countEmail($email)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT COUNT(mail) AS nb_email
                            FROM utilisateurs
                            WHERE mail = :mail");
    $req -> bindParam("mail", $email);
    $req -> execute();
    $nb_email = $req -> fetch();
    $req -> closeCursor();
    
    return $nb_email["nb_email"];
}
















