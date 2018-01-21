<?php
/*
 * Ce fichier récupère toutes les données concernant les types de capteurs
 * Ces données sont converties au format JSON
 * Elles seront récupérées par une requête AJAX puis traitées et utilisées avec JavaScript
 */

// Appelle le model
require("model.php");

$sensor_types = getSensorTypes();
while ($sensor_type = $sensor_types -> fetch())
{
    $sensor_types_json[]= $sensor_type;
    
}
$sensor_types -> closeCursor();
$encode = json_encode($sensor_types_json);

echo $encode;

?>