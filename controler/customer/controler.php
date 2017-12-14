<?php
/*controler.php
 * c'est la partie "intelligente" du code
 * il reçoit juste une directive de l'index (la direction que l'utilisateur doit suivre) puis organise le reste
 * souvent, il va demander des informations au model (qui s'occupe de la bdd)
 * et ensuite il va amener l'utilisateur vers la bonne view (page que l'utilisateur voit) 
 */

//On appelle le model
require("model/customer/model.php");

function seeProfile()
//Affiche la page de profil de l'utilisateur qui a l'id donné
{
    $profile = getProfile();
    require("view/customer/profile_view.php");
}

function seeProfileModification()
//Affiche la page de modification de profil de l'utilisateur qui a l'id donné
{
    $profile = getProfile();
    require("view/customer/profile_modification_view.php");
}

function profileModification()
//Fais les modifications du profil demandées puis affiche la page de profil de l'utilisateur qui a l'id donné
//A REFAIRE : cette fonction est à refaire, elle est trop longue et peut facilement être améliorée
{
    $test = profileUpdate();
    if ($test == 1)
    {
        echo "Je suis toujours là";
        seeProfile();
    }
    
    else
    {
        $profile = getProfile();
        require("view/customer/profile_modification_error_pseudo_view.php");
    }
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
                $profile = getProfile();
                require("view/customer/success_password_change_view.php");
            }
            
            else
            {
                //echo "L'ancien mot de passe n'est pas correct<br/>";
                //echo "<a href='index.php?action=see_profile_modification'>Retour</a>";
                $profile = getProfile();
                require("view/customer/profile_modification_error_password1_view.php");
            }
        }
        
        else
        {
            //echo "La confirmation du nouveau mot de passe n'est pas correcte<br/>";
            //echo "<a href='index.php?action=see_profile_modification'>Retour</a>";
            $profile = getProfile();
            require("view/customer/profile_modification_error_password2_view.php");
        }
        
    }
    
    else 
    {
        //echo "Un des champs de modification du mot de passe n'a pas été rempli<br/>";
        //echo "<a href='index.php?action=see_profile_modification'>Retour</a>";
        $profile = getProfile();
        require("view/customer/profile_modification_error_password3_view.php");
    }
}

function seeHomePage()
{
    require("view/customer/home_view.php");
}

function seeContact()
{
    $messages = getMessages();
    $phone_number = getPhoneNumber();
    require("view/customer/contact_view.php");
}

function sendMessage()
{
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    
    messagingUpdate($subject, $message);
    
    $messages = getMessages();
    $phone_number = getPhoneNumber();
    require("view/customer/message_send_view.php");
}

function seeHelp()
{
    require("view/customer/help_view.php");
}

function seeCgu()
{
    $cgu = getCgu();
    require("view/customer/cgu_view.php");
}

function seeSensors()
{
    $sensors = getSensors();
    require("view/customer/sensors_view.php");
}

function switchSensorStatus()
{
    if ($_GET["sensor_status"] == "OFF")
    {
        sensorStatusUpdate($_GET["id_sensor"], "ON");
    }
    
    else
    {
        sensorStatusUpdate($_GET["id_sensor"], "OFF");
    }
    
    seeSensors();   
}

function seeSensorTarget()
{
    $sensors = getSensors();
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    require("view/customer/sensor_target_view.php");
}

function defineSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    $new_target = htmlspecialchars($_POST["target"]);
    updateSensorTarget($id_sensor, $new_target);
    seeSensors();
}

function removeSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    updateSensorTarget($id_sensor, NULL);
    seeSensors();
}

function deconnexion()
{
    session_destroy();
    require("view/authentication_view.php");
}

function openCustomer()
{
    require("view/customer/account_access_view.php");
}

function seeRooms()
{
    $id_house = getHouse();
    $rooms = getRooms($id_house);
    require("view/customer/rooms_view.php");
}

function seeAddRoom()
{
    $id_house = getHouse();
    $rooms = getRooms($id_house);
    require("view/customer/add_room_view.php");
}

function addRoom()
{
    $room = htmlspecialchars($_POST["name"]);
    $id_house = getHouse();
    insertRoom($room, $id_house);
    seeRooms();
}

function removeRoom()
{
    $id_room = htmlspecialchars($_POST["room"]);
    deleteRoom($id_room);
    seeRooms();
}

function seeAddSensor()
{
    $id_house = getHouse();
    $rooms = getRooms($id_house);
    $sensors = getSensors();
    require("view/customer/add_sensor_view.php");
}

function addSensor()
{
    $reference = htmlspecialchars($_POST["type"]);
    $room = htmlspecialchars($_POST["room"]);
    $id_house = getHouse();
    insertSensor($reference, $room, $id_house);
    seeSensors();
}

function removeSensor()
{
    $id_sensor = htmlspecialchars($_POST["sensor"]);
    deleteSensor($id_sensor);
    seeSensors();
}