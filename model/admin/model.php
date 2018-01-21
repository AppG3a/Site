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


// -------------------- //
// ----- Capteurs ----- //
// -------------------- //

/**
 * Ajoute une ligne dans la table "types_capteurs" de la base de données
 * 
 * @param string $type
 * @param string $category
 * @param string $picture_link
 * @param string|NULL $unity
 * @param string|NULL $default_value
 * @param string|NULL $max
 * @param string|NULL $min
 * @param string $display_code
 */
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


// ------------------------- //
// ----- Liste clients ----- //
// ------------------------- //

/**
 * Récupère tous les champs concernant les utilisateurs de catégorie "customer"
 * 
 * @return PDOStatement
 */
function getCustomers()
{
    $db = dbConnect();
    $req = $db -> query("SELECT *
                        FROM utilisateurs
                        WHERE categorie_utilisateur = 'customer'");
    return $req;
}


// --------------------------------- //
// ----- Historique des pannes ----- //
// --------------------------------- //

/**
 * Récupère tous les champs de toutes les pannes enregistrées
 * 
 * @return PDOStatement
 */
function getBreakdowns()
{
    $db = dbConnect();
    $req = $db -> query("SELECT *
                            FROM pannes");
    
    return $req;
}


// --------------------------- //
// ----- Contact Domisep ----- //
// --------------------------- //

/**
 * Récupère le numéro de téléphone de Domisep (si $id_contact = 1) ou l'email de Domisep (si $id_contact = 2)
 * 
 * @param integer $id_contact
 * @return mixed
 */
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

/**
 * Change le numéro de téléphone permettant de contacter Domisep
 * 
 * @param string $phone_number
 */
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

/**
 * Change l'email permettant de contacter Domisep
 * 
 * @param string $email
 */
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


// --------------------------------- //
// ----- Création compte admin ----- //
// --------------------------------- //

/**
 * Compte le nombre d'occurrences d'une adresse mail donnée
 * 
 * @param string $email
 * @return mixed
 */
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

/**
 * Ajoute un nouvel utilisateur de catégorie "admin"
 * 
 * @param string $nom
 * @param string $prenom
 * @param string $adresse
 * @param string $mail
 * @param string $mot_de_passe
 */
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


// -------------------- //
// ----- Carousel ----- //
// -------------------- //

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

/**
 * Change le lien de l'image qui a l'id donné
 * 
 * @param string $id_picture
 * @param string $picture_link
 */
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


// ------------------ //
// ----- Profil ----- //
// ------------------ //

/**
 * Récupère nom, prénom, adresse et mail de l'utilisateur qui a l'id donné
 * 
 * @param string $id
 * @return mixed
 */
function getProfile($id)
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

/**
 * Change nom, prénom et adresse de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * 
 * @param string $name
 * @param string $first_name
 * @param string $address
 */
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

/**
 * Récupère le mot de passe de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * 
 * @return mixed
 */
function getPassword()
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

/**
 * Change le mot de passe de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * Le nouveau mot de passe est donné par $new_password_1
 * 
 * @param string $new_password_1
 */
function passwordUpdate($new_password_1)
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


// ------------------ //
// ----- Autres ----- //
// ------------------ //

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
 * Change les conditions générales d'utilisation
 * 
 * @param string $cgu
 */
function cguUpdate($cgu)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE cgu
                            SET texte = :texte");
    $req -> bindParam("texte", $cgu);
    $req -> execute();
    $req -> closeCursor();    
}

