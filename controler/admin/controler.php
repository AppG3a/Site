<?php

// Appelle le modèle administrateur
require("../../model/admin/model.php");


// -------------------- //
// ----- Capteurs ----- //
// -------------------- //

/**
 * Affiche la page qui permet de créer un nouveau capteur
 */
function seeSensorCreation()
{
    require("../../view/admin/sensor_creation_view.php");
}

/**
 * Crée un nouveau capteur à partir de données récupérées d'un formulaire
 * Certaines données sont obligatoires, d'autres facultatives
 */
function sensorCreation()
{
    // Données obligatoires (catégorie, type, code d'affichage, lien de l'image)
    $category = htmlspecialchars($_POST["category"]);
    $type = htmlspecialchars($_POST["type"]);
    $display_code = htmlspecialchars($_POST["display_code"]);
    $picture_link = htmlspecialchars($_POST["picture_link"]);
    
    // Données facultatives (unité, valeurs défaut/min/max)
    /**
     * Permet de donner des valeurs par défaut ($value) à des champs optionnels du formulaire ($data_name)
     * 
     * @param string $data_name
     * @param string|NULL $value
     * @return string|NULL
     */
    function optionalData($data_name, $value)
    {
        if (!empty($_POST[$data_name]))
        {
            $data = htmlspecialchars($_POST[$data_name]);
        }
        else
        {
            $data = $value;
        }
        
        return $data;
    }
    
    $unity = optionalData("unity", "");
    $default_value = optionalData("default_value", null);
    $min = optionalData("min", null);
    $max = optionalData("max", null);
    
    insertSensor($type, $category, $picture_link, $unity, $default_value, $max, $min, $display_code);
    
    seeSensorCreation();
}

// ------------------------- //
// ----- Liste clients ----- //
// ------------------------- //

/**
 * Affiche la page qui permet à l'administrateur de voir la liste des clients
 */
function seeCustomerProfileSelection()
{
    require("../../view/admin/customer_profile_selection_view.php");
}

// --------------------------------- //
// ----- Historique des pannes ----- //
// --------------------------------- //

/**
 * Affiche la page qui permet à l'administrateur de voir l'historique des pannes
 */
function seeBreakdownHistory()
{
    require("../../view/admin/breakdown_history_view.php");
}

// --------------------------- //
// ----- Contact Domisep ----- //
// --------------------------- //

/**
 * Affiche la page qui montre les moyens de contacter Domisep
 */
function seeContact()
{
    $phone_number = getContact(1);
    $email = getContact(2);
    
    require("../../view/admin/contact_view.php");
}

/**
 * Affiche la page qui permet à l'administrateur de modifier le numéro de téléphone permettant de contacter Domisep
 */
function seePhoneNumberModification()
{
    require("../../view/admin/phone_number_modification_view.php");
}

/**
 * Modifie le numéro de téléphone permettant de contacter Domisep 
 * La nouvelle valeur est récupérée grâce à un formulaire
 */
function phoneNumberModification()
{
    $new_phone_number = htmlspecialchars($_POST["phone_number"]);
    
    updatePhoneNumber($new_phone_number);
    $phone_number = getContact(1);
    $email = getContact(2);
    
    require("../../view/admin/contact_modification_success_view.php");
}

/**
 * Affiche la page qui permet à l'administrateur de modifier l'email permettant de contacter Domisep
 */
function seeEmailModification()
{
    require("../../view/admin/email_modification_view.php");
}

/**
 * Modifie l'email permettant de contacter Domisep 
 * La nouvelle valeur est récupérée grâce à un formulaire
 */
function emailModification()
{
    $new_email = htmlspecialchars($_POST["email"]);
    
    updateEmail($new_email);
    $phone_number = getContact(1);
    $email = getContact(2);
    
    require("../../view/admin/contact_modification_success_view.php");
}

// --------------------------------- //
// ----- Création compte admin ----- //
// --------------------------------- //

/**
 * Affiche la page qui permet à l'administrateur de créer un nouveau compte administrateur
 */
function seeAdminProfileCreation()
{
    require("../../view/admin/admin_profile_creation_view.php");
}

/**
 * Crée un nouveau compte administrateur à partir de données récupérées d'un formulaire
 * Si les données sont valides (c'est-à-dire que l'email donné n'est pas déjà utilisé), 
 * le mot de passe est envoyé par mail au nouvel administrateur
 * 
 * Le mot de passe est généré aléatoirement avec la fonction PHP uniquid()
 * 
 * Certaines données sont traitées avant d'être enregistrées dans la base de données :
 * - le nom ($name) est mis en majuscules avec la fonction PHP strtoupper($string)
 * - le prénom ($first_name) est mis en minuscule avec la fonction PHP strtolower($string) 
 * et la première lettre est mise en majuscule avec la fonction PHP ucfirst($string)
 * - le mot de passe : sha1($string) est une fonction PHP de hachage
 */
function adminProfileCreation()
{
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $adresse = htmlspecialchars($_POST["adresse"]);
    $email = htmlspecialchars($_POST["mail"]);
    
    $nb_email = countEmail($email);
    
    if ($nb_email == 0)
    {
        $mot_de_passe = uniqid();
        profileCreation(strtoupper($nom), ucfirst(strtolower($prenom)), $adresse, $email, sha1($mot_de_passe));
        
        $destinataire = $email;
        $subject = "Harvey - Votre compte administrateur a été créé";
        $message = "Vous pouvez désormais vous connecter à l'aide du mot de passe suivant : " . $mot_de_passe;
        //mail($destinataire, $subject, $message);
        
        require("../../view/admin/admin_profile_creation_success_view.php");
    }
    else
    {
        require("../../view/admin/admin_profile_creation_error_view.php");
    }
}

// -------------------- //
// ----- Carousel ----- //
// -------------------- //

/**
 * Affiche la page qui permet à l'administrateur de gérer le carousel
 */
function seeCarouselModification()
{
    $pictures = getPictures();
    require("../../view/admin/carousel_modification_view.php");
}

/**
 * Modifie les images du carousel qui ont été sélectionnées dans un formulaire
 */
function carouselModification()
{
    $picture_link = htmlspecialchars($_POST["picture_link"]);
    $id_pictures = $_POST["id_pictures"];
    
    foreach($id_pictures as $id_picture)
    {
        updatePicture($id_picture, $picture_link);
    }
    
    seeCarouselModification();
}

// ------------------ //
// ----- Profil ----- //
// ------------------ //

/**
 * Affiche la page de profil de l'utilisateur qui est connecté (celui dont l'id est $_SESSION["id"])
 */
function seeProfile()
{
    $profile = getProfile($_SESSION["id"]);
    require("../../view/admin/profile_view.php");
}

/**
 * Affiche la page de modification de profil de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 */
function seeProfileModification()
{
    $profile = getProfile($_SESSION["id"]);
    require("../../view/admin/profile_modification_view.php");
}

/**
 * Modifie le profil de l'utilisateur connecté (celui dont l'id est $_SESSION["id"]) à partir de données récupérées d'un formulaire
 * 
 * Certaines données sont traitées avant d'être enregistrées dans la base de données :
 * - le nom ($name) est mis en majuscules avec la fonction PHP strtoupper($string)
 * - le prénom ($first_name) est mis en minuscule avec la fonction PHP strtolower($string) 
 * et la première lettre est mise en majuscule avec la fonction PHP ucfirst($string)
 */
function profileModification()
{
    $name = htmlspecialchars($_POST["nom"]);
    $first_name = htmlspecialchars($_POST["prenom"]);
    $address = htmlspecialchars($_POST["adresse"]);

    // Traitement des données
    $name = strtoupper($name);
    $first_name = ucfirst(strtolower($first_name));
    
    profileUpdate($name, $first_name, $address);
    
    seeProfile();
}

/**
 * Modifie le mot de passe de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * Si l'utilisateur remplit correctement le formulaire, le mot de passe est changé et un mail de confirmation est envoyé
 * 
 * sha1($string) est une fonction PHP de hachage
 */
function passwordChange()
{
    $former_password = htmlspecialchars($_POST["mot_de_passe"]);
    $new_password_1 = htmlspecialchars($_POST["new_password_1"]);
    $new_password_2 = htmlspecialchars($_POST["new_password_2"]);
    
    $db_password = getPassword();
    
    if (sha1($former_password) == $db_password["mot_de_passe"])
    {
        passwordUpdate(sha1($new_password_1));
        $destinataire = $_SESSION["email"];
        $subject = "Harvey - Votre mot de passe a été modifié";
        $message = "Nous vous informons que votre mot de passe Harvey a été correctement modifié";
        //mail($destinataire, $subject, $message);
        
        $profile = getProfile($_SESSION["id"]);
        require("../../view/admin/profile_modification_success_password_view.php");
    }
    
    else
    {
        $profile = getProfile($_SESSION["id"]);
        require("../../view/admin/profile_modification_error_password_view.php");
    }
}

// ------------------ //
// ----- Autres ----- //
// ------------------ //

/**
 * Affiche la page qui montre les conditions générales d'utilisation
 */
function seeCgu()
{
    $cgu = getCgu();
    require("../../view/admin/cgu_view.php");
}

/**
 * Affiche la page qui permet à l'administrateur de modifier les conditions générales d'utilisation
 */
function seeCguModification()
{
    $cgu = getCgu();
    require("../../view/admin/cgu_modification_view.php");
}

/**
 * Modifie les conditions générales d'utilisation 
 * Les nouvelles conditions générales d'utilisation sont récupérées avec un formulaire
 */
function cguModification()
{
    $cgu = $_POST["cgu"];
    cguUpdate($cgu);
    
    $cgu = getCgu();    
    require("../../view/admin/cgu_modification_success_view.php");
}

/**
 * Déconnecte l'utilisateur : la session est détruite et l'utilisateur renvoyé sur la page d'authentification
 */
function deconnexion()
{
    session_destroy();
    header("Location: ../../index.php");
}

