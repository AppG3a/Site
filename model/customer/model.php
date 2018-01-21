<?php

/**
 * Connexion à la base de données "site_app"
 * 
 * @return PDO
 */
function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=site_app;charset=utf8', 'root', '');
        return $db;
    }
    
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

// -------------------- //
// ----- Capteurs ----- //
// -------------------- //

/**
 * Ajoute une ligne dans la table "capteurs" de la base de données 
 *
 * @param string $room
 * @param string $id_house
 * @param string $category
 * @param string $type
 * @param string $default_value
 */
function insertSensor($room, $id_house, $category, $type, $default_value)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO capteurs(id_utilisateur, id_emplacement, reference, description, on_off, valeur, id_type, categorie)
                            VALUES (:id_utilisateur,
                                    (SELECT id FROM emplacements WHERE nom = :nom AND id_maison = :id_maison),
                                    'reference',
                                    'description',
                                    'OFF',
                                    :default_value,
                                    (SELECT id_type FROM types_capteurs WHERE type = :type),
                                    :category)");
    $req -> bindParam("id_utilisateur", $_SESSION["id"]);
    $req -> bindParam("nom", $room);
    $req -> bindParam("id_maison", $id_house);
    $req -> bindParam("default_value", $default_value);
    $req -> bindParam("type", $type);
    $req -> bindParam("category", $category);
    $req -> execute();
    
    $req -> closeCursor();
}

/**
 * Récupère tous les champs concernant les capteurs, leur type, et leur emplacement
 * 
 * @return PDOStatement
 */
function getSensors()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT capteurs.*, emplacements.nom, types_capteurs.*
                            FROM capteurs, emplacements, types_capteurs
                            WHERE (capteurs.id_utilisateur = :id_utilisateur
                                AND emplacements.id = capteurs.id_emplacement
                                AND capteurs.id_type = types_capteurs.id_type)");
    $req -> bindParam("id_utilisateur", $_SESSION["id"]);
    $req -> execute();
    
    return $req;
}

/**
 * Récupère tous les champs concernant les types de capteurs
 * 
 * @return PDOStatement
 */
function getSensorTypes()
{
    $db = dbConnect();
    $req = $db -> query("SELECT *
                        FROM types_capteurs");
    return $req;
}

/**
 * Récupère la valeur par défaut dont le type de capteur ($type) est donné
 * 
 * @param string $type
 * @return mixed
 */
function getDefaultValue($type)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT valeur_defaut
                            FROM types_capteurs
                            WHERE type = :type");
    $req -> bindParam("type", $type);
    $req -> execute();
    $default_value = $req -> fetch();
    $req -> closeCursor();
    
    return $default_value["valeur_defaut"];
}

/**
 * Change le statut (ON/OFF) du capteur dont l'id ($id_sensor) est donné
 * La valeur du nouveau statut est donnée par $new_sensor_status
 * 
 * @param string $id_sensor
 * @param string $new_sensor_status
 */
function sensorStatusUpdate($id_sensor, $new_sensor_status)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE capteurs
                            SET on_off = :new_sensor_status
                            WHERE id = :id_sensor");
    $req -> bindParam("new_sensor_status", $new_sensor_status);
    $req -> bindParam("id_sensor", $id_sensor);
    $req -> execute();
    $req -> closeCursor();
}

/**
 * Change la valeur cible (la valeur programmée que l'objet doit atteindre) de l'objet dont l'id ($id_sensor) est donné
 * La nouvelle valeur cible est donnée par $target
 * 
 * @param string $id_sensor
 * @param string|NULL $target
 */
function updateSensorTarget($id_sensor, $target)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE capteurs
                            SET valeur_cible = :target
                            WHERE id = :id_sensor");
    $req -> bindParam("target", $target);
    $req -> bindParam("id_sensor", $id_sensor);
    $req -> execute();
    $req -> closeCursor();
}

/**
 * Change le statut de favori (Favori/Non-Favori) du capteur dont l'id ($id_sensor) est donné
 * Si $favorite vaut 1, le capteur passe en favori, et si $favorite vaut 0, il passe en non-favori
 * 
 * @param string $id_sensor
 * @param integer $favorite
 */
function updateFavorite($id_sensor, $favorite)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE capteurs
                            SET favori = :favorite
                            WHERE id = :id_sensor");
    $req -> bindParam("favorite", $favorite);
    $req -> bindParam("id_sensor", $id_sensor);
    $req -> execute();
    $req -> closeCursor();
}

/**
 * Supprime le capteur dont l'id ($id_sensor) est donné
 * 
 * @param string $id_sensor
 */
function deleteSensor($id_sensor)
{
    $db = dbConnect();
    $req = $db -> prepare("DELETE FROM capteurs
                            WHERE id = :id");
    $req -> bindParam("id", $id_sensor);
    $req -> execute();
    $req -> closeCursor();
}


// ----------------- //
// ----- Pièces -----//
// ----------------- //

/**
 * Récupère l'id de la maison de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * 
 * @return mixed
 */
function getHouse()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT id
                            FROM maisons
                            WHERE id_utilisateur = :id_utilisateur");
    $req -> bindParam("id_utilisateur", $_SESSION["id"]);
    $req -> execute();
    $id_house = $req -> fetch();
    $req -> closeCursor();
    
    return $id_house["id"];
}

/**
 * Récupère tous les champs des pièces dont l'id de la maison ($id_house) est donné
 * 
 * @param string $id_house
 * @return PDOStatement
 */
function getRooms($id_house)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT *
                            FROM emplacements
                            WHERE id_maison = id_maison");
    $req -> bindParam("id_maison", $id_house);
    $req -> execute();
    
    return $req;
}

/**
 * Ajoute une pièce ($room) dans la maison dont l'id ($id_house) est donné
 * 
 * @param string $room
 * @param string $id_house
 */
function insertRoom($room, $id_house)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO emplacements(id_maison, nom)
                            VALUES (:id_maison, :nom)");
    $req -> bindParam("id_maison", $id_house);
    $req -> bindParam("room", $room);
    $req -> execute();
    $req -> closeCursor();
}

/**
 * Change le nom de la pièce dont l'id ($id_room) est donné
 * Le nouveau nom de la pièce est donné par $new_name
 *
 * @param string $id_room
 * @param string $new_name
 */
function updateRoom($id_room, $new_name)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE emplacements
                            SET nom = :new_name
                            WHERE id = :id_room");
    $req -> bindParam("new_name", $new_name);
    $req -> bindParam("id_room", $id_room);
    $req -> execute();
    $req -> closeCursor();
}

/**
 * Supprime la pièce dont l'id ($id_room) est donné
 * Tous les capteurs liés à cette pièce sont également supprimés
 * 
 * @param string $id_room
 */
function deleteRoom($id_room)
{
    $db = dbConnect();
    
    // On supprime la pièce
    $req = $db -> prepare("DELETE FROM emplacements
                            WHERE id = :id");
    $req -> bindParam("id", $id_room);
    $req -> execute();
    
    // On supprime tous les capteurs liés à cette pièce
    $req = $db -> prepare("DELETE FROM capteurs
                            WHERE id_emplacement = :id_emplacement");
    $req -> bindParam("id_emplacement", $id_room);
    $req -> execute();
    $req -> closeCursor();
}


// ------------------------------ //
// ----- Rapport d'activité ----- //
// ------------------------------ //

/**
 * Récupère toutes les mesures correspondant au capteur dont l'id ($id_sensor) est donné
 * 
 * @param string $id_sensor
 * @return PDOStatement
 */
function getActivity($id_sensor)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT date_mesure, valeur
                            FROM activite
                            WHERE id_capteur = :id_sensor");
    $req -> bindParam("id_sensor", $id_sensor);
    $req -> execute();
    
    return $req;
}


// ------------------ //
// ----- Profil ----- //
// ------------------ //

/**
 * Récupère nom, prénom, adresse et mail de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * 
 * @return mixed
 */
function getProfile()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT nom, prenom, adresse, mail
                            FROM utilisateurs
                            WHERE id = :id");
    $req -> bindParam("id", $_SESSION["id"]);
    $req -> execute();
    $profile = $req -> fetch();
    $req -> closeCursor();
    
    return $profile;
}

/**
 * Change nom, prénom et adresse de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * 
 * @param string $name
 * @param string $first_name
 * @param string $address
 */
function profileUpdate($name, $first_name, $address)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE utilisateurs
                            SET nom = :nom, prenom = :prenom, adresse = :adresse
                            WHERE id = :id");
    $req -> bindParam("nom", $name);
    $req -> bindParam("prenom", $first_name);
    $req -> bindParam("adresse", $address);
    $req -> bindParam("id", $_SESSION["id"]);
    $req -> execute();
    $req -> closeCursor();
}

/**
 * Récupère le mot de passe de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * 
 * @return mixed
 */
function getPassword()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT mot_de_passe
                                FROM utilisateurs
                                WHERE id = :id");
    $req -> bindParam("id", $_SESSION["id"]);
    $req -> execute();
    $db_password = $req -> fetch();
    $req -> closeCursor();
    
    return $db_password;
}

/**
 * Change le mot de passe de l'utilisateur connecté (celui dont l'id est $_SESSION["id"])
 * Le nouveau mot de passe est donné par $new_password_1
 * 
 * @param string $new_password_1
 */
function passwordUpdate($new_password_1)
//Change le mot de passe de l'utilisateur qui a l'id donné par le nouveau mot de passe donné
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE utilisateurs
                            SET mot_de_passe = :mot_de_passe
                            WHERE id = :id");
    $req -> bindParam("mot_de_passe", $new_password_1);
    $req -> bindParam("id", $_SESSION["id"]);
    $req -> execute();
    $req -> closeCursor();
}


// --------------------------- //
// ----- Contact Domisep ----- //
// --------------------------- //

/**
 * Récupère le numéro de téléphone permettant de contacter Domisep
 * 
 * @return mixed
 */
function getPhoneNumber()
{
    $db = dbConnect();
    $req = $db -> query("SELECT numero
                        FROM numeros_domisep");
    $phone_number = $req -> fetch();
    
    return $phone_number["numero"];
}

/**
 * Récupère l'email permettant de contacter Domisep
 * 
 * @return mixed
 */
function getDomisepEmail()
{
    $db = dbConnect();
    $req = $db -> query("SELECT numero
                            FROM numeros_domisep
                            WHERE id = 2");
    $email = $req -> fetch();
    $req -> closeCursor();
    
    return $email["numero"];
}


// ------------------ //
// ----- Autres ----- //
// ------------------ //

/**
 * Récupère les conditions générales d'utilisation
 * 
 * @return mixed
 */
function getCgu()
{
    $db = dbConnect();
    $req = $db -> query("SELECT texte
                        FROM cgu");
    $cgu = $req -> fetch();
    $req -> closeCursor();
    
    return $cgu;
}



