<?php 
session_start();

if ( (isset($_SESSION["user_type"])) && ($_SESSION["user_type"] == "customer") )
{
    // Appelle le contrôleur client
    require("../../controler/customer/controler.php");
    
    //En fonction de la situation, on dit au controler de faire telle ou telle action
    
    if (isset($_GET["action"]))
    {
        $action = htmlspecialchars($_GET["action"]);
        
        switch($action)
        {                
            // ----- Capteurs ----- //
                
            // Page qui montre les capteurs
            case "see_sensors":
                seeSensors();
                break;
                
            // Page qui permet d'ajouter un capteur
            case "see_add_sensor":
                seeAddSensor();
                break;
                
            // Ajout d'un capteur
            case "add_sensor":
                addSensor();
                break;
                
            // Page qui permet d'ajouter un capteur aux favoris
            case "see_add_favorite_sensors":
                seeAddFavoriteSensors();
                break;
                
            // Ajout d'un capteur aux favoris
            case "add_favorite_sensors":
                addFavoriteSensors();
                break;
            
            // Changement de statut (ON/OFF) d'un capteur
            case "switch_sensor_status":
                switchSensorStatus();
                break;
                
            // Changement de statut (ON/OFF) d'un capteur favori
            case "switch_favorite_sensor_status":
                switchFavoriteSensorStatus();
                break;           
                
            // Page qui permet de programmer une valeur cible à atteindre pour un objet
            case "see_sensor_target":
                seeSensorTarget();
                break;
                
            // Page qui permet de programmer une valeur cible à atteindre pour un objet favori
            case "see_favorite_sensor_target":
                seeFavoriteSensorTarget();
                break;
                
            // Ajout d'une valeur cible à atteindre pour un objet
            case "define_sensor_target":
                defineSensorTarget();
                break;
                
            // Ajout d'une valeur cible à atteindre pour un objet favori
            case "define_favorite_sensor_target":
                defineFavoriteSensorTarget();
                break;
                
            // Retrait d'une valeur cible pour un objet
            case "remove_sensor_target":
                removeSensorTarget();
                break;
                
            // Retrait d'une valeur cible pour un objet favori
            case "remove_favorite_sensor_target":
                removeFavoriteSensorTarget();
                break;
                
            // Page qui permet de supprimer un capteur               
            case "see_remove_sensor":
                seeRemoveSensor();
                break;
                
            // Suppression d'un capteur
            case "remove_sensor":
                removeSensor();
                break;       
                
                
            // ----- Pièces ----- //
                
            // Page qui permet de voir les pièces d'une maison
            case "see_rooms":
                seeRooms(false);
                break;
            
            // Ajout d'une pièce
            case "add_room":
                addRoom();
                break;
            
            // Suppression d'une pièce
            case "remove_room":
                removeRoom();
                break;
                
            // Modification du nom d'une pièce
            case "modify_room":
                modifyRoom();
                break;            

                
            // ----- Rapport d'activité ----- //
                
            case "see_activity":
                seeActivity();
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
                
                
            // ----- Contact Domisep ----- //
                
            case "see_contact":
                seeContact(0);
                break;
                
            case "send_message":
                sendMessage();
                break;
                           
                
            // ----- Autres ----- //
                
            // Page qui permet de voir l'aide
            case "see_help":
                seeHelp();
                break;
                
            // Page qui permet de voir les conditions générales d'utilisation
            case "see_cgu":
                seeCgu();
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
        seeHomePage();
    }
}
else
{
    echo "Erreur 404";
}

?>