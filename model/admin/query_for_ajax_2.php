<?php

//On appelle le model
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