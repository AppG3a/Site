<?php
/*
 * Ce fichier récupère toutes les données concernant les pannes
 * Ces données sont converties au format JSON
 * Elles seront récupérées par une requête AJAX puis traitées et utilisées avec JavaScript
 */

// Appelle le model
require("model.php");

$breakdowns = getBreakdowns();
while ($breakdown = $breakdowns -> fetch())
{
    $breakdowns_json[]= $breakdown;
    
}
$breakdowns -> closeCursor();
$encode = json_encode($breakdowns_json);

echo $encode;

?>