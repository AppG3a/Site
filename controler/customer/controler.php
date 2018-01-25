<?php

// Appelle le modèle client
require("../../model/customer/model.php");

// -------------------- //
// ----- Sécurité ----- //
// -------------------- //

function fieldSecurity($field)
{
    if (!empty($field))
    {
        return true;
    }
    else
    {
        return false;
    }
}


// -------------------- //
// ----- Capteurs ----- //
// -------------------- //

/**
 * Affiche la page qui permet de voir les capteurs
 */
function seeSensors()
{
    $sensors = getSensors();
    require("../../view/customer/sensors_view.php");
}

/**
 * Affiche la page qui permet d'ajouter un capteur
 */
function seeAddSensor()
{
    $id_house = getHouse();
    $rooms = getRooms($id_house);
    $sensors = getSensors();
    $favorites = getSensors();
    
    require("../../view/customer/add_sensor_view.php");
}

/**
 * Ajoute un capteur dont les caractéristiques sont récupérées avec un formulaire
 */
function addSensor()
{
    $room = htmlspecialchars($_POST["room"]);
    $id_house = getHouse();
    $category = htmlspecialchars($_POST["category"]);
    $type = htmlspecialchars($_POST["type"]);
    $default_value = getDefaultValue($type);
    
    insertSensor($room, $id_house, $category, $type, $default_value);
    
    $_SESSION["sensor_modification"] = 1;
    seeSensors();
}

/**
 * Affiche la page qui permet d'ajouter un capteur aux capteurs favoris
 */
function seeAddFavoriteSensors()
{
    $favorites = getSensors();
    require("../../view/customer/add_favorite_sensors_view.php");
}

/**
 * Ajoute un capteur aux capteurs favoris
 */
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

/**
 * Change le statut d'un capteur : s'il est sur ON il passe sur OFF, et inversement
 */
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

/**
 * Change le statut d'un capteur favori : s'il est sur ON il passe sur OFF, et inversement
 */
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

/**
 * Affiche la page qui permet à l'utilisateur de définir la valeur cible d'un objet
 * La valeur cible d'un objet est la valeur programmée que l'objet doit atteindre
 */
function seeSensorTarget()
{
    $sensors = getSensors();
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    require("../../view/customer/sensor_target_view.php");
}

/**
 * Affiche la page qui permet à l'utilisateur de définir la valeur cible d'un objet favori
 * La valeur cible d'un objet est la valeur programmée que l'objet doit atteindre
 */
function seeFavoriteSensorTarget()
{
    $sensors = getSensors();
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    require("../../view/customer/favorite_sensor_target_view.php");
}

/**
 * Défini la valeur cible d'un objet
 * La valeur cible d'un objet est la valeur programmée que l'objet doit atteindre
 */
function defineSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    $new_target = htmlspecialchars($_POST["target"]);
    updateSensorTarget($id_sensor, $new_target);
    
    seeSensors();
}

/**
 * Défini la valeur cible d'un objet favori
 * La valeur cible d'un objet est la valeur programmée que l'objet doit atteindre
 */
function defineFavoriteSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    $new_target = htmlspecialchars($_POST["target"]);
    updateSensorTarget($id_sensor, $new_target);
    
    
    seeHomePage();
}

/**
 * Supprime la valeur cible d'un objet
 * La valeur cible d'un objet est la valeur programmée que l'objet doit atteindre
 */
function removeSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    updateSensorTarget($id_sensor, NULL);
    
    seeSensors();
}

/**
 * Supprime la valeur cible d'un objet favori
 * La valeur cible d'un objet est la valeur programmée que l'objet doit atteindre
 */
function removeFavoriteSensorTarget()
{
    $id_sensor = htmlspecialchars($_GET["id_sensor"]);
    updateSensorTarget($id_sensor, NULL);
    
    seeHomePage();
}

/**
 * Affiche la page qui permet de supprimer un capteur
 */
function seeRemoveSensor()
{
    $sensors = getSensors();
    require("../../view/customer/remove_sensor_view.php");
}

/**
 * Supprime un capteur
 */
function removeSensor()
{
    $id_sensor = htmlspecialchars($_POST["sensor"]);
    deleteSensor($id_sensor);
    
    $_SESSION["sensor_modification"] = 1;
    seeSensors();
}


// ----------------- //
// ----- Pièces -----//
// ----------------- //

/**
 * Affiche la page qui permet de voir les pièces d'une maison
 */
function seeRooms()
{
    $id_house = getHouse();
    $rooms = getRooms($id_house);
    $delete_rooms = getRooms($id_house);
    $modify_rooms = getRooms($id_house);
    
    require("../../view/customer/rooms_view.php");
}

/**
 * Ajoute une pièce à une maison
 */
function addRoom()
{
    $room = htmlspecialchars($_POST["name"]);
    $id_house = getHouse();
    
    insertRoom($room, $id_house);
    
    seeRooms();
}

/**
 * Supprime une pièce
 */
function removeRoom()
{
    $id_room = htmlspecialchars($_POST["room"]);
    
    deleteRoom($id_room);
    
    seeRooms();
}

/**
 * Change le nom d'une pièce
 */
function modifyRoom()
{
    $id_room = htmlspecialchars($_POST["room"]);
    $new_name = htmlspecialchars($_POST["new_name"]);
    
    updateRoom($id_room, $new_name);
    
    seeRooms();
}


// ------------------------------ //
// ----- Rapport d'activité ----- //
// ------------------------------ //

/**
 * Affiche le rapport d'activité d'un capteur
 * Ce rapport d'activité se présente sous la forme d'un graphique avec :
 * - en ordonnées : les mesures faites par le capteur
 * - en abscisses : les dates auxquelles ces mesures ont été effectées
 */
function seeActivity()
{
    $id_sensor = 33; // Valeur temporaire (à terme, cette valeur sera dynamique)
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


// ------------------ //
// ----- Profil ----- //
// ------------------ //

/**
 * Affiche la page de profil de l'utilisateur qui est connecté (celui dont l'id est $_SESSION["id"])
 */
function seeProfile()
{
    $profile = getProfile();
    require("../../view/customer/profile_view.php");
}

/**
 * Affiche la page de modification de profil de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 */
function seeProfileModification()
{
    $profile = getProfile();
    require("../../view/customer/profile_modification_view.php");
}

/**
 * Modifie le profil de l'utilisateur connecté (celui dont l'id est $_SESSION["id"]) à partir de données récupérées d'un formulaire
 *
 * Certaines données sont traitées avant d'être enregistrées dans la base de données :
 * - le nom ($name) est mis en majuscules avec la fonction PHP strtoupper($string)
 * - le prénom ($first_name) est mis en minuscule avec la fonction PHP strtolower($string)
 * et la première lettre est mise en majuscule avec la fonction PHP ucfirst($string)
 */
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

/**
 * Modifie le mot de passe de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * Si l'utilisateur remplit correctement le formulaire, le mot de passe est changé et un mail de confirmation est envoyé
 * 
 * sha1($string) est une fonction PHP de hachage
 */
function passwordChange()
{
    $former_password = htmlspecialchars($_POST["mot_de_passe"]);
    $new_password_1 = htmlspecialchars($_POST["new_password_1"]);
    $new_password_2 = htmlspecialchars($_POST["new_password_2"]);
    
    $db_password = getPassword();
    
    if (sha1($former_password) == $db_password["mot_de_passe"])
    {
        passwordUpdate(sha1($new_password_1));
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


// --------------------------- //
// ----- Contact Domisep ----- //
// --------------------------- //

/**
 * Affiche la page qui montre les moyens de contacter Domisep
 */
function seeContact()
{
    $phone_number = getPhoneNumber();
    require("../../view/customer/contact_view.php");
}

/**
 * Envoie un message à Domisep
 */
function sendMessage()
{
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    $mailclient = $_SESSION["email"];
    $destinataire = getDomisepEmail();
    
    //mail($destinataire, $subject, $message, $mailclient);
    
    $phone_number = getPhoneNumber();
    require("../../view/customer/message_send_view.php");
}


// ------------------ //
// ----- Autres ----- //
// ------------------ //

/**
 * Affiche la page d'accueil
 * La page d'accueil montre tous les capteurs favoris
 */
function seeHomePage()
{
    $sensors = getSensors();
    require("../../view/customer/home_view.php");
}

/**
 * Affiche la page qui montre l'aide 
 * L'aide explique rapidement les différentes fonctionnalités d'Harvey
 */
function seeHelp()
{
    require("../../view/customer/help_view.php");
}

/**
 * Affiche la page qui montre les conditions générales d'utilisation
 */
function seeCgu()
{
    $cgu = getCgu();
    require("../../view/customer/cgu_view.php");
}

/**
 * Déconnecte l'utilisateur : la session est détruite et l'utilisateur renvoyé sur la page d'authentification
 */
function deconnexion()
{
    session_destroy();
    header("Location: ../../index.php");
}


