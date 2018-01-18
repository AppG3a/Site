<?php

//On appelle le model
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