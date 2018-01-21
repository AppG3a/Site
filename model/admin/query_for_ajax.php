<?php
/*
 * Ce fichier récupère toutes les données concernant les clients
 * Ces données sont converties au format JSON
 * Elles seront récupérées par une requête AJAX puis traitées et utilisées avec JavaScript
 */

// Appelle le model
require("model.php");

$customers = getCustomers();
while ($customer = $customers -> fetch())
{
    $customers_json[]= $customer;
    
}
$customers -> closeCursor();
$encode = json_encode($customers_json);

echo $encode;

?>