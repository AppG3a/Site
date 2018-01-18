<?php
/*model.php
 * c'est la partie du code qui gère la base de données
 * il va essentiellement s'occuper d'effectuer les bonnes requêtes SQL
 * pour récupérer les informations que le model lui demande 
 */

function dbConnect()
//Permet de se connecter à la base de données
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

function getProfile()
//Récupère nom, prénom, adresse, mail et pseudo de l'utilisateur qui a l'id donné
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


function getPassword()
//Donne le mot de passe de l'utilisateur qui a l'id donné
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

function messagingUpdate($subject, $message)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO messages(id_customer, subject, message, sending_date)
                            VALUES (:id_customer, :subject, :message, NOW())");
    $req -> bindParam("id_customer", $_SESSION["id"]);
    $req -> bindParam("subject", $subject);
    $req -> bindParam("message", $message);
    $req -> execute();
    $req -> closeCursor();
}

function getMessages()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT subject, message, sending_date
                            FROM messages
                            WHERE id_customer = :id_customer");
    $req -> bindParam("id_customer", $_SESSION["id"]);
    $req -> execute();
    
    return $req;
}

function getPhoneNumber()
{
    $db = dbConnect();
    $req = $db -> query("SELECT numero
                        FROM numeros_domisep");
    $phone_number = $req -> fetch();
    
    return $phone_number["numero"];
}

function getCgu()
{
    $db = dbConnect();
    $req = $db -> query("SELECT texte
                        FROM cgu");
    $cgu = $req -> fetch();
    $req -> closeCursor();
    
    return $cgu;
}

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

function getSensorTypes()
{
    $db = dbConnect();
    $req = $db -> query("SELECT *
                        FROM types_capteurs");
    return $req;
}

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

function insertSensor($reference, $room, $id_house)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO capteurs(id_utilisateur, id_emplacement, reference, description, on_off, valeur)
                        VALUES (:id_utilisateur, (SELECT id FROM emplacements WHERE nom = :nom AND id_maison = :id_maison), :reference, :description, 'OFF', 10)");
    $req -> bindParam("id_utilisateur", $_SESSION["id"]);
    $req -> bindParam("nom", $room);
    $req -> bindParam("id_maison", $id_house);
    $req -> bindParam("reference", $reference);
    $req -> bindParam("description", $reference);
    $req -> execute();
    
    $req -> closeCursor();
}

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

function insertSensorBis($room, $id_house, $category, $type, $default_value)
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

function deleteSensor($id_sensor)
{
    $db = dbConnect();
    $req = $db -> prepare("DELETE FROM capteurs
                            WHERE id = :id");
    $req -> bindParam("id", $id_sensor);
    $req -> execute();
    $req -> closeCursor();
}

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





















