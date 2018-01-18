<?php

//On appelle le model
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