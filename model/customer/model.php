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
    $req = $db -> prepare("SELECT nom, prenom, adresse, mail, pseudo 
                            FROM utilisateurs 
                            WHERE id = ?");
    $req -> execute(array($_SESSION["id"]));
    $profile = $req -> fetch();
    $req -> closeCursor();
    
    return $profile;
}

function profileUpdate()
/*Met à jour les données de profil de l'utilisateur qui a l'id donné
 * On utilise pour cela les valeurs ($_POST) récupérées grâce à un formulaire
 */
{
    $db = dbConnect();
    foreach ($_POST as $key => $value)
    {
        if (!empty($value))
        {
            //Concerne uniquement le pseudo : on vérifie qu'un autre utilisateur n'ait pas le même pseudo avant de changer
            if ($key == "pseudo")
            {
                //On récupère le pseudo actuel de l'utilisateur
                $req = $db -> prepare("SELECT pseudo
                                        FROM utilisateurs
                                        WHERE id = ?");
                $req -> execute(array($_SESSION["id"]));
                $db_pseudo = $req -> fetch();
                $req -> closeCursor();
                
                //On regarde si le nouveau pseudo est différent de l'ancien
                if ($db_pseudo["pseudo"] != $value)
                {
                    //Si le nouveau pseudo est différent de l'ancien, on vérifie qu'un autre utilisateur n'a pas le même
                    $req = $db -> prepare("SELECT COUNT(pseudo) AS nb_pseudo
                                        FROM utilisateurs
                                        WHERE pseudo = ?");
                    $req -> execute(array(htmlspecialchars($value)));
                    $nb_pseudo = $req -> fetch();
                    $req -> closeCursor();

                    if ($nb_pseudo["nb_pseudo"] == 0)
                    {
                        $req = $db -> prepare("UPDATE utilisateurs
                                                SET $key = :value
                                                WHERE id = :id");
                        $req -> execute(array(
                            "value" => htmlspecialchars($value),
                            "id" => $_SESSION["id"]));
                        $req -> closeCursor();
                    }
                    
                    else
                    {
                        return 0;
                    }
                }      
            }
            
            else 
            {
                $req = $db -> prepare("UPDATE utilisateurs
                                SET $key = :value
                                WHERE id = :id");
                $req -> execute(array(
                    "value" => htmlspecialchars($value),
                    "id" => $_SESSION["id"]));
                $req -> closeCursor();
            }
        }
    }
    return 1;
}

function getPassword()
//Donne le mot de passe de l'utilisateur qui a l'id donné
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT mot_de_passe
                                FROM utilisateurs
                                WHERE id = ?");
    $req -> execute(array($_SESSION["id"]));
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
    $req -> execute(array(
        "mot_de_passe" => $new_password_1,
        "id" => $_SESSION["id"]));
    $req -> closeCursor();
}

function messagingUpdate($subject, $message)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO messages(id_customer, subject, message, sending_date)
                            VALUES (:id_customer, :subject, :message, NOW())");
    $req -> execute(array(
        "id_customer" => $_SESSION["id"],
        "subject" => $subject,
        "message" => $message));
    $req -> closeCursor();
}

function getMessages()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT subject, message, sending_date
                            FROM messages
                            WHERE id_customer = ?");
    $req -> execute(array($_SESSION["id"]));
    
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

/*function getSensors2()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT *
                            FROM capteurs
                            WHERE id_utilisateur = ?");
    $req -> execute(array($_SESSION["id"]));
    
    return $req;
}*/

function getSensors()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT capteurs.*, emplacements.nom
                            FROM capteurs, emplacements
                            WHERE (capteurs.id_utilisateur = ? AND emplacements.id = capteurs.id_emplacement)");
    $req -> execute(array($_SESSION["id"]));
    
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
    $req -> execute(array(
        "new_sensor_status" => $new_sensor_status,
        "id_sensor" => $id_sensor));
    $req -> closeCursor();
}

function updateSensorTarget($id_sensor, $target)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE capteurs
                            SET valeur_cible = :target
                            WHERE id = :id_sensor");
    $req -> execute(array(
        "target" => $target,
        "id_sensor" => $id_sensor));
    $req -> closeCursor();
}

function getHouse()
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT id
                            FROM maisons
                            WHERE id_utilisateur = ?");
    $req -> execute(array($_SESSION["id"]));
    $id_house = $req -> fetch();
    $req -> closeCursor();
    
    return $id_house["id"];
}

function getRooms($id_house)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT *
                            FROM emplacements
                            WHERE id_maison = ?");
    $req -> execute(array($id_house));
    
    return $req;
}

function insertRoom($room, $id_house)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO emplacements(id_maison, nom)
                            VALUES (:id_maison, :nom)");
    $req -> execute(array(
        "id_maison" => $id_house,
        "nom" => $room));
    $req -> closeCursor();
}

function deleteRoom($id_room)
{
    $db = dbConnect();
    
    // On supprime la pièce
    $req = $db -> prepare("DELETE FROM emplacements
                            WHERE id = ?");
    $req -> execute(array($id_room));
    
    // On supprime tous les capteurs liés à cette pièce
    $req = $db -> prepare("DELETE FROM capteurs
                            WHERE id_emplacement = ?");
    $req -> execute(array($id_room));
    $req -> closeCursor();
    
    
}

function insertSensor($reference, $room, $id_house)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO capteurs(id_utilisateur, id_emplacement, reference, description, on_off, valeur)
                        VALUES (:id_utilisateur, (SELECT id FROM emplacements WHERE nom = :nom AND id_maison = :id_maison), :reference, :description, 'OFF', 10)");
    $req -> execute(array(
        "id_utilisateur" => $_SESSION["id"],
        "nom" => $room,
        "id_maison" => $id_house,
        "reference" => $reference,
        "description" => $reference));
    
    $req -> closeCursor();
}

function insertSensorBis($room, $id_house, $category, $type)
{
    $db = dbConnect();
    $req = $db -> prepare("INSERT INTO capteurs(id_utilisateur, id_emplacement, reference, description, on_off, valeur, id_type, categorie)
                            VALUES (:id_utilisateur, 
                                    (SELECT id FROM emplacements WHERE nom = :nom AND id_maison = :id_maison),
                                    'reference',
                                    'description', 
                                    'OFF',
                                    10,
                                    (SELECT id FROM types_capteurs WHERE type = :type),
                                    :category)");
    $req -> execute(array(
        "id_utilisateur" => $_SESSION["id"],
        "nom" => $room,
        "id_maison" => $id_house,
        "type" => $type,
        "category" => $category));
    
    $req -> closeCursor();
}

function deleteSensor($id_sensor)
{
    $db = dbConnect();
    $req = $db -> prepare("DELETE FROM capteurs
                            WHERE id = ?");
    $req -> execute(array($id_sensor));
    $req -> closeCursor();
}

function updateFavorite($id_sensor, $favorite)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE capteurs
                            SET favori = :favorite
                            WHERE id = :id_sensor");
    $req -> execute(array(
        "favorite" => $favorite,
        "id_sensor" => $id_sensor));
    $req -> closeCursor();
}

function getActivity($id_sensor)
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT date_mesure, valeur
                            FROM activite
                            WHERE id_capteur = ?");
    $req -> execute(array($id_sensor));
    
    return $req;
}





















