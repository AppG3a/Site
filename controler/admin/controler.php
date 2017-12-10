<?php

//On appelle le model
require("model/admin/model.php");

function seeProfile()
//Affiche la page de profil de l'utilisateur qui a l'id donné
{
    $profile = getProfile($_SESSION["id"]);
    require("view/admin/profile_view.php");
}

function seeHomePage()
{
    require("view/admin/home_view.php");
}

function seeProfileModification()
//Affiche la page de modification de profil de l'utilisateur qui a l'id donné
{
    $profile = getProfile($_SESSION["id"]);
    require("view/admin/profile_modification_view.php");
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
                echo "Votre mot de passe a été changé";
            }
            
            else
            {
                echo "L'ancien mot de passe n'est pas correct<br/>";
                echo "<a href='index.php?action=see_profile_modification'>Retour</a>";
            }
        }
        
        else
        {
            echo "La confirmation du nouveau mot de passe n'est pas correcte<br/>";
            echo "<a href='index.php?action=see_profile_modification'>Retour</a>";
        }
        
    }
    
    else
    {
        echo "Un des champs de modification du mot de passe n'a pas été rempli<br/>";
        echo "<a href='index.php?action=see_profile_modification'>Retour</a>";
    }
}

function seeCustomerProfileSelection()
//Affiche la page qui permet à l'administrateur de choisir une fiche client
{
    require("view/admin/customer_profile_selection_view.php");
}

function seeCustomerProfile()
//Affiche la page qui permet à l'administrateur de voir la fiche client qu'il a sélectionnée
{
    $customer_id = htmlspecialchars($_POST["customer_id"]);
    
    if (!empty($customer_id))
    {
        $profile = getProfile($customer_id);
        require("view/admin/customer_profile_view.php");
    }
    
    else 
    {
        require("view/admin/customer_profile_selection_view.php");
        echo "Aucun numéro client n'a été sélectionné";
    }
}

function seeCustomerProfileCreation()
{
    require("view/admin/customer_profile_creation_view.php");
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
        echo "Le compte a bien été créé<br/>";
    }
    
    else 
    {
        echo "Un des champs est vide<br/>";
    }

    echo "<a href='index.php?action=see_customer_profile_creation'>Retour</a>";
}

function seeBreakdownHistory()
{
    $breakdowns = getBreakdowns();
    require("view/admin/breakdown_history_view.php");
}

function seeContact()
{
    $phone_number = getPhoneNumber();
    require("view/admin/contact_view.php");
}

function seePhoneNumberModification()
{
    require("view/admin/phone_number_modification_view.php");
}

function phoneNumberModification()
{
    $new_phone_number = htmlspecialchars($_POST["phone_number"]);
    if (!empty($new_phone_number))
    {
        updatePhoneNumber($new_phone_number);
        $phone_number = getPhoneNumber();
        require("view/admin/phone_number_modification_success_view.php");
    }
    
    else
    {
        require("view/admin/phone_number_modification_fail_view.php");
    }
}

function seeCgu()
{
    $cgu = getCgu();
    require("view/admin/cgu_view.php");
}

function seeCguModification()
{
    $cgu = getCgu();
    require("view/admin/cgu_modification_view.php");
}

function cguModification()
{
    //$cgu = htmlspecialchars($_POST["cgu"]); //Si on fait un htmlspecialchars ça annule les retours à la ligne.
    $cgu = $_POST["cgu"];
    cguUpdate($cgu);
    $cgu = getCgu();
    require("view/admin/cgu_modification_success_view.php");
}

function deconnexion()
{
    session_destroy();
    require("view/authentication_view.php");
}

function openAdmin()
{
    require("view/admin/account_access_view.php");
}
