<?php 

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=site_app;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getPieces()
{
    $db = dbConnect();
    $req = $db -> query("SELECT nom
                        FROM emplacements
                        WHERE id_maison = 1");
   /*$$pieces = $req -> fetch();
    $req -> closeCursor();
    
    return $pieces;*/
    return $req;
}
function addPieceDb($nom)
{
    
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO emplacements(nom) VALUES(:nom)');
    $req->execute(array(
        'nom' => $nom));
   
   }
function addCapteurDb($nom,$description)
   {
       
       $db = dbConnect();
       $req = $db->prepare('INSERT INTO capteurs(reference, description) VALUES(:reference,:description)');
       $req->execute(array(
           'reference' => $nom,
           'description'=>$description));
       
   }
function getCapteurs()
   {
       $db = dbConnect();
       $req = $db -> query("SELECT reference
                        FROM capteurs
                        WHERE id_emplacement = 1");
       
       return $req;
   } 
   

?>
