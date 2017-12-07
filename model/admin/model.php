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

function getCgu()
//Récupère le titre et texte des CGU
{
    $db = dbConnect();
    $req = $db -> prepare("SELECT titre, conditionsg
                            FROM conditionsgenerales");
    $conditionsgenerales = $req -> fetch();
    $req -> closeCursor();
    
    return $conditionsgenerales;
}

function CguUpdate()
/*Met à jour les données des CGU
 * On utilise pour cela les valeurs ($_POST) récupérées grâce à un formulaire
 */
{
    $db = dbConnect();
    foreach ($_POST as $key => $value)
    {
        if (!empty($value))
        {
            $req = $db -> prepare("UPDATE conditionsgenerales
                                SET $key = :value");
            $req -> execute(array("value" => htmlspecialchars($value)));
            $req -> closeCursor();
        }
    }
}