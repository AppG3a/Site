<?php
/*index.php
 * quand on accède au site, on va automatiquement sur cette page
 *cette page n'affiche rien, elle permet juste de diriger l'utilisateur au bon endroit
 */

/*session_start();

$_SESSION["id"] = 1;
$_SESSION["user_type"] = "customr";*/
//session_start();

require("controler/controler.php");

if (isset($_GET["action"]))
{
    $action = htmlspecialchars($_GET["action"]);
    
    switch($action)
    {
        case "connexion":
            $db_content = checkAuthentication();
            
            session_start();
            
            $_SESSION["id"] = $db_content["id"];
            $_SESSION["user_type"] = $db_content["categorie_utilisateur"];
            $_SESSION["first_name"] = $db_content["prenom"];
            $_SESSION["email"] = $db_content["mail"];
            $_SESSION["welcome"] = 1;
            $_SESSION["sensor_modification"] = 0;
            
            if ($_SESSION["user_type"] == "admin")
            {
                openAdmin();
            }
            
            elseif ($_SESSION["user_type"] == "customer")
            {
                openCustomer();
            }
            
            else
            {
                //echo "Catégorie inconnue - index";
            }
            break;
            
        case "see_cgu":
            seeCgu();
            break;
            
        case "see_forgotten_password":
            seeForgottenPassword();
            break;
            
        default:
            seeAuthenticationPage();
            break;
    }
}
else
{
    seeAuthenticationPage();
}

/*
if (isset($_GET["action"]))
{
    if ($_GET["action"] == "connexion")
    {
        $db_content = checkAuthentication();     
        
        session_start();
        
        $_SESSION["id"] = $db_content["id"];
        $_SESSION["user_type"] = $db_content["categorie_utilisateur"];
        $_SESSION["first_name"] = $db_content["prenom"];
        $_SESSION["welcome"] = 1;
        
        if ($_SESSION["user_type"] == "admin")
        {
            openAdmin();
        }
        
        elseif ($_SESSION["user_type"] == "customer")
        {
            openCustomer();
        }
        
        else
        {
            //echo "Catégorie inconnue 2";
        }
        
    }
    
    else
    {
        seeAuthenticationPage();
    }
}

else
{
    seeAuthenticationPage();
}
*/

/*
if (isset($_SESSION["user_type"]))
{
    if ($_SESSION["user_type"] == "customer")
    {
        //On appelle le controler adapté
        require("controler/customer/controler.php");
        
        //En fonction de la situation, on dit au controler de faire telle ou telle action
        //TODO : htmlspecialchars sur le $_GET["action"]
        if (isset($_GET["action"]))
        {
            if ($_GET["action"] == "see_profile")
            {
                seeProfile();
            }
            
            elseif ($_GET["action"] == "see_profile_modification")
            {
                seeProfileModification();
            }
            
            elseif ($_GET["action"] == "profile_modification")
            {
                profileModification();
            }
            
            elseif ($_GET["action"] == "password_change")
            {
                passwordChange();
            }
            
            elseif ($_GET["action"] == "see_contact")
            {
                seeContact();
            }
            
            elseif ($_GET["action"] == "send_message")
            {
                sendMessage();
            }
            
            elseif ($_GET["action"] == "see_help")
            {
                seeHelp();
            }
            
            elseif ($_GET["action"] == "see_cgu")
            {
                seeCgu();
            }
            
            elseif ($_GET["action"] == "see_sensors")
            {
                seeSensors();
            }
            
            elseif ($_GET["action"] == "switch_sensor_status")
            {
                switchSensorStatus();
            }
            
            elseif ($_GET["action"] == "switch_favorite_sensor_status")
            {
                switchFavoriteSensorStatus();
            }
            
            elseif ($_GET["action"] == "deconnexion")
            {
                deconnexion();
            }
            
            elseif ($_GET["action"] == "see_sensor_target")
            {
                seeSensorTarget();
            }
            
            elseif ($_GET["action"] == "see_favorite_sensor_target")
            {
                seeFavoriteSensorTarget();
            }
            
            elseif ($_GET["action"] == "define_sensor_target")
            {
                defineSensorTarget();
            }
            
            elseif ($_GET["action"] == "define_favorite_sensor_target")
            {
                defineFavoriteSensorTarget();
            }
            
            elseif ($_GET["action"] == "remove_sensor_target")
            {
                removeSensorTarget();
            }
            
            elseif ($_GET["action"] == "remove_favorite_sensor_target")
            {
                removeFavoriteSensorTarget();
            }
            
            elseif ($_GET["action"] == "see_rooms")
            {
                seeRooms();
            }
            
            elseif ($_GET["action"] == "see_add_room")
            {
                seeAddRoom();
            }
            
            elseif ($_GET["action"] == "add_room")
            {
                addRoom();
            }
            
            elseif ($_GET["action"] == "remove_room")
            {
                removeRoom();
            }
            
            elseif ($_GET["action"] == "see_add_sensor")
            {
                seeAddSensor();
            }
            
            elseif ($_GET["action"] == "add_sensor")
            {
                addSensor();
            }
            
            elseif ($_GET["action"] == "remove_sensor")
            {
                removeSensor();
            }
            
            /*elseif ($_GET["action"] == "see_add_favorite_sensors")
            {
                seeAddFavoriteSensors();
            }
            
            elseif ($_GET["action"] == "add_favorite_sensors")
            {
                addFavoriteSensors();
            }
            
            else
            {
                openCustomer();
            }
        }
        
        else
        {
            seeHomePage();
        }
    }
    
    if ($_SESSION["user_type"] == "admin")
    { 
        //On appelle le controler adapté
        require("controler/admin/controler.php");
        
        //En fonction de la situation, on dit au controler de faire telle ou telle action
        if (isset($_GET["action"]))
        {
            if ($_GET["action"] == "see_profile")
            {
                seeProfile();
            }
            
            elseif ($_GET["action"] == "see_profile_modification")
            {
                seeProfileModification();
            }
            
            elseif ($_GET["action"] == "profile_modification")
            {
                profileModification();
            }
            
            elseif ($_GET["action"] == "password_change")
            {
                passwordChange();
            }
            
            elseif ($_GET["action"] == "see_customer_profile_selection")
            {
                seeCustomerProfileSelection();
            }
            
            elseif ($_GET["action"] == "see_customer_profile")
            {
                seeCustomerProfile();
            }
            
            elseif ($_GET["action"] == "see_customer_profile_creation")
            {
                seeCustomerProfileCreation();
            }
            
            elseif ($_GET["action"] == "customer_profile_creation")
            {
                customerProfileCreation();
            }
            
            elseif ($_GET["action"] == "see_breakdown_history")
            {
                seeBreakdownHistory();
            }
            
            elseif ($_GET["action"] == "see_contact")
            {
                seeContact();
            }
            
            elseif ($_GET["action"] == "see_phone_number_modification")
            {
                seePhoneNumberModification();
            }
            
            elseif ($_GET["action"] == "phone_number_modification")
            {
                phoneNumberModification();
            }
            
            elseif ($_GET["action"] == "see_cgu")
            {
                seeCgu();
            }
            
            elseif ($_GET["action"] == "see_cgu_modification")
            {
                seeCguModification();
            }
            
            elseif($_GET["action"] == "cgu_modification")
            {
                cguModification();
            }
            
            elseif ($_GET["action"] == "deconnexion")
            {
                deconnexion();
            }
            
            else
            {
                openAdmin();
            }
        }
        
        else
        {
            seeHomePage();
        }
    }
    
    else 
    {
        echo "Catégorie inconnue 1";
    }
}

else 
{ 

}*/


