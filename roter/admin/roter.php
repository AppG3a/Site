<?php 
session_start();

if ( (isset($_SESSION["user_type"])) && ($_SESSION["user_type"] == "admin") )
{
    // Appelle le contrôleur administrateur
    require("../../controler/admin/controler.php");
    
    // En fonction de la situation, on dit au controler de faire telle ou telle action
    
    if (isset($_GET["action"]))
    {
        $action = htmlspecialchars($_GET["action"]);
        
        switch($action)
        {
            // ----- Capteurs ----- //
            
            // Page qui permet de créer un capteur
            case "see_sensor_creation":
                seeSensorCreation(0);
                break;
            
            // Création d'un capteur
            case "sensor_creation":
                sensorCreation();
                break;
                
            
            // ----- Liste clients ----- //
            
            case "see_customer_profile_selection":
                seeCustomerProfileSelection();
                break;
                                
            
            // ----- Historique des pannes ----- //
            
            case "see_breakdown_history":
                seeBreakdownHistory();
                break;
                
            
            // ----- Contact Domisep ----- //
            
            // Moyens de contacter Domisep
            case "see_contact":
                seeContact();
                break;
                
            // Page qui permet de changer le numéro de téléphone de Domisep
            case "see_phone_number_modification":
                seePhoneNumberModification();
                break;
                
            // Changement du numéro de téléphone de Domisep
            case "phone_number_modification":
                phoneNumberModification();
                break;
                
            // Page qui permet de changer l'email de Domisep
            case "see_email_modification":
                seeEmailModification();
                break;
            
            // Changement de l'email de Domisep
            case "email_modification":
                emailModification();
                break;
                
            
            // ----- Création compte admin ----- //
            
            // Page qui permet de créer un compte administrateur
            case "see_admin_profile_creation":
                seeAdminProfileCreation();
                break;
                
            // Création d'un compte administrateur
            case "admin_profile_creation":
                adminProfileCreation();
                break;
                
            
            // ----- Carousel ----- //
            
            // Page qui permet de modifier le carousel
            case "see_carousel_modification":
                seeCarouselModification(0);
                break;
           
            // Modification du carousel
            case "carousel_modification":
                carouselModification();
                break;      
                
                        
            // ----- Profil ----- //    
            
            // Page qui permet de voir le profil
            case "see_profile":
                seeProfile();
                break;
                
            // Page qui permet de modifier le profil
            case "see_profile_modification":
                seeProfileModification(0);
                break;
                
            // Modification du profil
            case "profile_modification":
                profileModification();
                break;
                
            // Changement de mot de passe
            case "password_change":
                passwordChange();
                break;     
                
                      
            // ----- Autres ----- //
                
            // Page qui permet de voir les conditions générales d'utilisation
            case "see_cgu":        
                seeCgu();
                break;
            
            // Page qui permet de modifier les conditions générales d'utilisation
            case "see_cgu_modification":        
                seeCguModification();
                break;
            
            // Modification des conditions générales d'utilisation
            case "cgu_modification":        
                cguModification();
                break;
            
            case "deconnexion":        
                deconnexion();
                break;
            
            // Action inconnue
            default:
                echo "Erreur 404";
        }
    }
    else
    {
        seeCustomerProfileSelection();  // L'administrateur arrive directement sur la page qui montre la liste des clients
    }
}
else
{
    echo "Erreur 404";
}

?>