<?php

//On appelle le model
require("../../model/admin/model.php");

function seeProfile()
//Affiche la page de profil de l'utilisateur qui a l'id donné
{
    $profile = getProfile($_SESSION["id"]);
    require("../../view/admin/profile_view.php");
}

function seeHomePage()
{
    require("../../view/admin/home_view.php");
}

function seeProfileModification()
//Affiche la page de modification de profil de l'utilisateur qui a l'id donné
{
    $profile = getProfile($_SESSION["id"]);
    require("../../view/admin/profile_modification_view.php");
}

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

function passwordChange()
/*Gère le changement de mot de passe de l'utilisateur qui a l'id donné
 * Si l'utilisateur effectue correctement le changement, le mot de passe est changé et un mail de confirmation est envoyé
 */
{
    $former_password = htmlspecialchars($_POST["mot_de_passe"]);
    $new_password_1 = htmlspecialchars($_POST["new_password_1"]);
    $new_password_2 = htmlspecialchars($_POST["new_password_2"]);
    
    $db_password = getPassword();
    
    if ($former_password == $db_password["mot_de_passe"])
    {
        passwordUpdate($new_password_1);
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


function seeCustomerProfileSelection()
//Affiche la page qui permet à l'administrateur de choisir une fiche client
{
    require("../../view/admin/customer_profile_selection_view.php");
}

function seeCustomerProfileSelectionBis()
{    
    require("../../view/admin/customer_profile_selection_bis_view.php");
}

function seeCustomerProfile()
//Affiche la page qui permet à l'administrateur de voir la fiche client qu'il a sélectionnée
{
    $customer_id = htmlspecialchars($_POST["customer_id"]);
    
    if (!empty($customer_id))
    {
        $profile = getProfile($customer_id);
        require("../../view/admin/customer_profile_view.php");
    }
    
    else 
    {
        require("../../view/admin/customer_profile_selection_view.php");
        echo "Aucun numéro client n'a été sélectionné";
    }
}

function seeAdminProfileCreation()
{
    require("../../view/admin/admin_profile_creation_view.php");
}

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
        profileCreation($nom, $prenom, $adresse, $email, $mot_de_passe);
        require("../../view/admin/admin_profile_creation_success_view.php");
    }
    else
    {
        require("../../view/admin/admin_profile_creation_error_view.php");
    }
}

function seeBreakdownHistory()
{
    //$breakdowns = getBreakdowns();
    require("../../view/admin/breakdown_history_bis_view.php");
}

function seeContact()
{
    // 1 pour le numéro de téléphone, 2 pour l'adresse mail
    $phone_number = getContact(1);
    $email = getContact(2);
    require("../../view/admin/contact_view.php");
}

function seePhoneNumberModification()
{
    require("../../view/admin/phone_number_modification_view.php");
}

function phoneNumberModification()
{
    $new_phone_number = htmlspecialchars($_POST["phone_number"]);

    updatePhoneNumber($new_phone_number);
    $phone_number = getContact(1);
    $email = getContact(2);
    require("../../view/admin/contact_modification_success_view.php");
}

function seeEmailModification()
{
    require("../../view/admin/email_modification_view.php");
}

function emailModification()
{
    $new_email = htmlspecialchars($_POST["email"]);

    updateEmail($new_email);
    $phone_number = getContact(1);
    $email = getContact(2);
    require("../../view/admin/contact_modification_success_view.php");
}

function seeSensorCreation()
{
    require("../../view/admin/sensor_creation_view.php");
}

function sensorCreation()
{
    // Données obligatoires (required ou radio)
    $category = htmlspecialchars($_POST["category"]);
    $type = htmlspecialchars($_POST["type"]);
    $display_code = htmlspecialchars($_POST["display_code"]);
    $picture_link = htmlspecialchars($_POST["picture_link"]);
    
    // Données facultatives (unité, valeurs défaut/min/max)
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

function seeCarouselModification()
{
    $pictures = getPictures();
    require("../../view/admin/carousel_modification_view.php");
}

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

function seeCgu()
{
    $cgu = getCgu();
    require("../../view/admin/cgu_view.php");
}

function seeCguModification()
{
    $cgu = getCgu();
    require("../../view/admin/cgu_modification_view.php");
}

function cguModification()
{
    $cgu = $_POST["cgu"];
    cguUpdate($cgu);
    $cgu = getCgu();
    require("../../view/admin/cgu_modification_success_view.php");
}

function deconnexion()
{
    session_destroy();
    header("Location: ../../index.php");
}

function openAdmin()
{
    require("../../view/admin/account_access_view.php");
}
