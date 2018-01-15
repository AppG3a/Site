<?php

//On appelle le model
require("../../model/admin/model.php");

$breakdowns = getBreakdowns();
while ($breakdown = $breakdowns -> fetch())
{
    $breakdowns_json[]= $breakdown;
    
}
$encode = json_encode($breakdowns_json);

echo $encode;

?>