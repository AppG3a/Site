<?php 

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


function GetSensorData ()

{
    // recupere les donn?s des capteurs : id, id_emplacement, ref, description, on/off, valeur
    $db = dbConnect();
    $sensorData=[];
    $req = $db -> prepare("SELECT description, id_emplacement, reference, on_off, valeur FROM capteurs WHERE id_utilisateur = ?");
    $req -> execute(array($_SESSION["id"]));
    while ($data = $req -> fetch()){
    $sensorData[]=$data; 
}
    $req -> closeCursor();
    
    return $sensorData;
    
}
  


function statusUpdate()
//met à jour le statut du capteur on-->off ou off-->on
{
    $db = dbConnect();
    {
        if ($sensorData=='ON')
        {
        	$bdd->exec('UPDATE on_off SET on_off = "OFF",');
            $req -> closeCursor();
        }
        else
        {
        	$bdd->exec('UPDATE on_off SET on_off = "ON",');
            $req -> closeCursor();
        }
    }
}

?>