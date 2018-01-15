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
//Fais les modifications du profil demandées puis affiche la page de profil de l'utilisateur qui a l'id donné
{
    profileUpdate();
    seeProfile();
}

function passwordChange()
/*Gère le changement de mot de passe de l'utilisateur qui a l'id donné
 * Si l'utilisateur effectue correctement le changement, le mot de passe est changé
 * Sinon l'utilisateur reçoit le message d'erreur approprié
 */
{
    $former_password = htmlspecialchars($_POST["mot_de_passe"]);
    $new_password_1 = htmlspecialchars($_POST["new_password_1"]);
    $new_password_2 = htmlspecialchars($_POST["new_password_2"]);
    
    if (!empty($former_password) && !empty($new_password_1) && !empty($new_password_2))
    {
        if ($new_password_1 == $new_password_2)
        {
            $db_password = getPassword();
            
            if ($former_password == $db_password["mot_de_passe"])
            {
                passwordUpdate($new_password_1);
                $profile = getProfile($_SESSION["id"]);
                require("../../view/admin/success_password_change_view.php");
            }
            
            else
            {
                $profile = getProfile($_SESSION["id"]);
                require("../../view/admin/profile_modification_error_password1_view.php");
            }
        }
        
        else
        {
            $profile = getProfile($_SESSION["id"]);
            require("../../view/admin/profile_modification_error_password2_view.php");
        }
        
    }
    
    else
    {
        $profile = getProfile($_SESSION["id"]);
        require("../../view/admin/profile_modification_error_password3_view.php");
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

function seeCustomerProfileCreation()
{
    require("../../view/admin/customer_profile_creation_view.php");
}

function customerProfileCreation()
{
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $adresse = htmlspecialchars($_POST["adresse"]);
    $mail = htmlspecialchars($_POST["mail"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mot_de_passe = htmlspecialchars($_POST["mot_de_passe"]);
    
    if (!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($mail) && !empty($pseudo) && !empty($mot_de_passe))
    {
        profileCreation($nom, $prenom, $adresse, $mail, $pseudo, $mot_de_passe);
        require("../../view/admin/customer_profile_creation_success_view.php");
    }
    
    else 
    {
        require("../../view/admin/customer_profile_creation_error_view.php");
    }
}

function seeBreakdownHistory()
{
    //$breakdowns = getBreakdowns();
    require("../../view/admin/breakdown_history_bis_view.php");
}

function seeContact()
{
    /*$contacts = getContacts();
    while ($contact = $contacts -> fetch())
    {
        $contactsTab []= $contact["numero"];
    }
    $numero = $contactsTab[0];
    $email = $contactsTab[1];
    //$phone_number = getPhoneNumber();*/
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
    if (!empty($new_phone_number))
    {
        updatePhoneNumber($new_phone_number);
        $phone_number = getContact(1);
        $email = getContact(2);
        require("../../view/admin/contact_modification_success_view.php");
    }
    
    else
    {
        require("../../view/admin/phone_number_modification_fail_view.php");
    }
}

function seeEmailModification()
{
    require("../../view/admin/email_modification_view.php");
}

function emailModification()
{
    $new_email = htmlspecialchars($_POST["email"]);
    if (!empty($new_email))
    {
        updateEmail($new_email);
        $phone_number = getContact(1);
        $email = getContact(2);
        require("../../view/admin/contact_modification_success_view.php");
    }
    
    else
    {
        require("../../view/admin/phone_number_modification_fail_view.php");
    }
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
    //$cgu = htmlspecialchars($_POST["cgu"]); //Si on fait un htmlspecialchars ça annule les retours à la ligne.
    $cgu = $_POST["cgu"];
    cguUpdate($cgu);
    $cgu = getCgu();
    require("../../view/admin/cgu_modification_success_view.php");
}

function deconnexion()
{
    session_destroy();
    //require("../../view/authentication_view.php");
    header("Location: ../../index.php");
}

function openAdmin()
{
    require("../../view/admin/account_access_view.php");
}
