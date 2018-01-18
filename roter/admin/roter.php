<?php 
session_start();

if ( (isset($_SESSION["user_type"])) && ($_SESSION["user_type"] == "admin") )
{
    //On appelle le controler adapté
    require("../../controler/admin/controler.php");
    
    //En fonction de la situation, on dit au controler de faire telle ou telle action
    
    if (isset($_GET["action"]))
    {
        $action = htmlspecialchars($_GET["action"]);
        
        switch($action)
        {
            case "see_profile":
                seeProfile();
                break;
            
            case "see_profile_modification":
                seeProfileModification();
                break;
            
            case "profile_modification":        
                profileModification();
                break;        
            
            case "password_change":        
                passwordChange();
                break;        
            
            case "see_customer_profile_selection":        
                seeCustomerProfileSelection();
                break;
                
            case "see_customer_profile_selection_bis":
                seeCustomerProfileSelectionBis();
                break;
            
            case "see_customer_profile":        
                seeCustomerProfile();
                break;
            
            case "see_admin_profile_creation":        
                seeAdminProfileCreation();
                break;
            
            case "admin_profile_creation":        
                adminProfileCreation();
                break;
            
            case "see_breakdown_history":        
                seeBreakdownHistory();
                break;
            
            case "see_contact":        
                seeContact();
                break;
            
            case "see_phone_number_modification":        
                seePhoneNumberModification();
                break;
                      
            case "phone_number_modification":        
                phoneNumberModification();
                break;
                            
            case "see_email_modification":
                seeEmailModification();
                break;
            
            case "email_modification":
                emailModification();
                break;
                
            case "see_sensor_creation":
                seeSensorCreation();
                break;
                
            case "sensor_creation":
                sensorCreation();
                break;
                
            case "see_carousel_modification":
                seeCarouselModification();
                break;
                
            case "carousel_modification":
                carouselModification();
                break;
                
            case "see_cgu":        
                seeCgu();
                break;
            
            case "see_cgu_modification":        
                seeCguModification();
                break;
            
            case "cgu_modification":        
                cguModification();
                break;
            
            case "deconnexion":        
                deconnexion();
                break;
            
            default:
                echo "Action inconnue - Admin Roter";
        }
    }
    else
    {
        seeCustomerProfileSelectionBis();
    }
}
else
{
    echo "Vous n'avez pas accès à cette page";
}

?>