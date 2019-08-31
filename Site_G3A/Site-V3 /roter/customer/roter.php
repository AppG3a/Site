<?php 
session_start();

//On appelle le controler adapté
require("../../controler/customer/controler.php");

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
            
        case "see_contact":
            seeContact();
            break;
            
        case "send_message":
            sendMessage();
            break;
            
        case "see_help":
            seeHelp();
            break;
            
        case "see_cgu":
            seeCgu();
            break;
            
        case "see_sensors":
            seeSensors();
            break;
        
        case "switch_sensor_status":
            switchSensorStatus();
            break;
            
        case "switch_favorite_sensor_status":
            switchFavoriteSensorStatus();
            break;
            
        case "deconnexion":
            deconnexion();
            break;
            
        case "see_sensor_target":
            seeSensorTarget();
            break;
            
        case "see_favorite_sensor_target":
            seeFavoriteSensorTarget();
            break;
            
        case "define_sensor_target":
            defineSensorTarget();
            break;
            
        case "define_favorite_sensor_target":
            defineFavoriteSensorTarget();
            break;
            
        case "remove_sensor_target":
            removeSensorTarget();
            break;
            
        case "remove_favorite_sensor_target":
            removeFavoriteSensorTarget();
            break;
            
        case "see_rooms":
            seeRooms();
            break;
        
        case "see_add_room":
            seeAddRoom();
            break;
        
        case "add_room":
            addRoom();
            break;
        
        case "remove_room":
            removeRoom();
            break;
        
        case "see_add_sensor":
            seeAddSensor();
            break;
        
        case "add_sensor":
            addSensor();
            break;
        
        case "remove_sensor":
            removeSensor();
            break;
        
        case "add_favorite_sensors":
            addFavoriteSensors();
            break;
            
        case "see_activity":
            seeActivity();
            break;
            
        default:
            echo "Action inconnue - Customer Roter";      
    }
}
else 
{
    seeHomePage();
}

?>