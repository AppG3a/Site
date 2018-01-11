<?php

//On appelle le model
require("../../model/admin/model.php");

$customers = getCustomers();
while ($customer = $customers -> fetch())
{
    $customers_json[]= $customer;
    
}
$encode = json_encode($customers_json);

echo $encode;

?>