<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mes Capteurs</title>
	</head>
	
	<body>
		<h1>Mes Capteurs</h1>
		<?php 
		foreach ($sensorData as $data): {
		 	 ?>

					Capteur: <?= $data['description'] ?> <br/>
					Etat : <?= $data['on_off']?>
					<br/>
					<a href="index.php?action=sensor_update">ON/OFF</a><br/>


<?php
} endforeach ?>


		
	</body>

</html>
