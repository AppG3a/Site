<?php 

//on inclut le model
require('model.php');

function seeSensors()
//affiche les capteurs et leur descriptions
{
	$sensorData = GetSensorData($_SESSION["id"]);
	require("sensor_view.php");

}


function sensorsUpdate()
//active/desactive
{
	statusUpdate();
	require('sensor_view.php');
}



?>