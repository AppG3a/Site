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
    $req = $db -> query("SELECT titre, conditionsg
                            FROM conditionsgenerales");
    $conditionsgenerales = $req -> fetch();
    $req -> closeCursor();
    
    return $conditionsgenerales;
}

$conditionsgenerales = getCgu();
?>

<?php $title = "Conditions Générales"; ?>

<?php ob_start(); ?>

<h1>Conditions Générales D'Utilisation</h1>
<p>
	Titre : <?= $conditionsgenerales["titre"] ?><br/><br/>
	Prénom : <?= $conditionsgenerales["conditionsg"] ?><br/><br/>
</p>

<a href="../../index.php?action=see_cgu_modification">Modifier les conditions générales</a>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>