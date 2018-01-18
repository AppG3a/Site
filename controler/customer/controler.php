<?php
/*controler.php
 * c'est la partie "intelligente" du code
 * il reçoit juste une directive de l'index (la direction que l'utilisateur doit suivre) puis organise le reste
 * souvent, il va demander des informations au model (qui s'occupe de la bdd)
 * et ensuite il va amener l'utilisateur vers la bonne view (page que l'utilisateur voit) 
 */

//On appelle le model
require("../../model/customer/model.php");

function seeProfile()
//Affiche la page de profil de l'utilisateur qui a l'id donné
{
    $profile = getProfile();
    require("../../view/customer/profile_view.php");
}

function seeProfileModification()
//Affiche la page de modification de profil de l'utilisateur qui a l'id donné
{
    $profile = getProfile();
    require("../../view/customer/profile_modification_view.php");
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
        
        $profile = getProfile();
        require("../../view/customer/profile_modification_success_password_view.php");
    }
    
    else
    {
        $profile = getProfile();
        require("../../view/customer/profile_modification_error_password_view.php");
    }    
}

function seeHomePage()
{
    $sensors = getSensors();
    require("../../view/customer/home_view.php");
}

function seeContact()
{
    $messages = getMessages();
    $phone_number = getPhoneNumber();
    require("../../view/customer/contact_view.php");
}

function sendMessage()
{    
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    $mailclient = $_SESSION["email"];
    $destinataire = getDomisepEmail();
    
    //mail($destinataire, $subject, $message, $mailclient);
    
    messagingUpdate($subject, $message);
    
    $messages = getMessages();
    $phone_number = getPhoneNumber();
    require("../../view/customer/message_send_view.php");
}

function seeHelp()
{
    require("../../view/customer/help_view.php");
}

function seeCgu()
{
    $cgu = getCgu();
    require("../../view/customer/cgu_view.php");
}

function seeSensors()
{
    $sensors = getSensors();
    require("../../view/customer/sensors_view.php");
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

function switchFavoriteSensorStatus()
{
    if ($_GET["sensor_status"] == "OFF")
    {
        sensorStatusUpdate($_GET["id_sensor"], "ON");
    }
    
    else
    {
        sensorStatusUpdate($_GET["id_sensor"], "OFF");
    }
    
    seeHomePage();
}

function seeSensorTarget()
{
    $sensors = getSensors();
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    require("../../view/customer/sensor_target_view.php");
}

function seeFavoriteSensorTarget()
{
    $sensors = getSensors();
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    require("../../view/customer/favorite_sensor_target_view.php");
}

function defineSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    $new_target = htmlspecialchars($_POST["target"]);
    updateSensorTarget($id_sensor, $new_target);
    seeSensors();
}

function defineFavoriteSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    $new_target = htmlspecialchars($_POST["target"]);
    updateSensorTarget($id_sensor, $new_target);
    seeHomePage();
}

function removeSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    updateSensorTarget($id_sensor, NULL);
    seeSensors();
}

function removeFavoriteSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    updateSensorTarget($id_sensor, NULL);
    seeHomePage();
}

function deconnexion()
{
    session_destroy();
    header("Location: ../../index.php");
}

function openCustomer()
{
    require("view/customer/account_access_view.php");
}

function seeRooms()
{
    $id_house = getHouse();
    $rooms = getRooms($id_house);
    $delete_rooms = getRooms($id_house);
    $modify_rooms = getRooms($id_house);
    require("../../view/customer/rooms_view.php");
}

function seeAddRoom()
{
    $id_house = getHouse();
    $rooms = getRooms($id_house);
    require("../../view/customer/add_room_view.php");
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

function modifyRoom()
{
    $id_room = htmlspecialchars($_POST["room"]);
    $new_name = htmlspecialchars($_POST["new_name"]);
    updateRoom($id_room, $new_name);
    seeRooms();
}

function seeAddSensor()
{
    $id_house = getHouse();
    $rooms = getRooms($id_house);
    $sensors = getSensors();
    $favorites = getSensors();
    //require("../../view/customer/add_sensor_view.php");
    require("../../view/customer/add_sensor_bis_view.php");
}

function addSensor()
{
    $reference = htmlspecialchars($_POST["type"]);
    $room = htmlspecialchars($_POST["room"]);
    $id_house = getHouse();
    insertSensor($reference, $room, $id_house);
    $_SESSION["sensor_modification"] = 1;
    seeSensors();
}

function addSensorBis()
{
    $room = htmlspecialchars($_POST["room"]);
    $id_house = getHouse();
    $category = htmlspecialchars($_POST["category"]);
    $type = htmlspecialchars($_POST["type"]);
    $default_value = getDefaultValue($type);
    
    insertSensorBis($room, $id_house, $category, $type, $default_value);
    $_SESSION["sensor_modification"] = 1;
    seeSensors();
}

function seeRemoveSensor()
{
    $sensors = getSensors();
    require("../../view/customer/remove_sensor_view.php");
}

function removeSensor()
{
    $id_sensor = htmlspecialchars($_POST["sensor"]);
    deleteSensor($id_sensor);
    $_SESSION["sensor_modification"] = 1;
    seeSensors();
}

function seeAddFavoriteSensors()
{
    $favorites = getSensors();
    require("../../view/customer/add_favorite_sensors_view.php");
}

function addFavoriteSensors()
{
    $sensors = getSensors();
    while ($sensor = $sensors -> fetch())
    {
        if (isset($_POST[$sensor["id"]]))
        {
            updateFavorite($sensor["id"], 1);
        }
        
        else 
        {
            updateFavorite($sensor["id"], 0);
        }
    }
    $_SESSION["sensor_modification"] = 1;
    seeSensors();
}

function seeActivity()
{
    $id_sensor = 33; // Valeur temporaire
    $activity = getActivity($id_sensor);
    $x_data = [];
    $y_data = [];
    
    while ($measure = $activity -> fetch())
    {
        $x_data []= $measure["date_mesure"];
        $y_data []= $measure["valeur"];
    }
    
    $x_data = json_encode($x_data);
    $y_data = json_encode($y_data);
    require("../../view/customer/activity_view.php");
}









