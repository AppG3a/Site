<?php ob_start(); ?>
<?php $css = "../../design/admin/home_view.css"; ?>
<?php $title = "Créer un capteur"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>
        
    <div class="content">

		<div class="sub_content">
		
			<p id="success_message">Le capteur a été créé avec succès. Les clients peuvent désormais utiliser ce type de capteur. </p>
            
            <form method="post" action="roter.php?action=sensor_creation">
            	<p class="left_justify">
            		Catégorie du capteur : <br/>
                	<input type="radio" name="category" value="simple" id="simple" checked="checked" /> <label for="simple">Simple</label>
					<input type="radio" name="category" value="object" id="object" /> <label for="object">Objet</label><br/><br/>
                	<label for="type">Type du capteur : </label><br/><input type="text" name="type" id="type" placeholder="Ex: Luminosité, Radiateur, ..." required><br/><br/>
                	<label for="unity">Unité des données récupérées :</label><br/><input type="text" name="unity" id="unity" placeholder="Ex: lux, °C, ..."><br/><br/>
        			Code affichage : <br/>
                	<input type="radio" name="display_code" value="1" id="1" checked="checked" /> <label for="1">1 (On/Off uniquement)</label>
					<input type="radio" name="display_code" value="2" id="2" /> <label for="2">2 (Programmable)</label><br/><br/>
                	<label for="default_value">Valeur par défaut :</label><br/><input type="number" name="default_value" id="default_value"><br/><br/>
                	Valeur programmable : 
                	<label for="min">minimale </label><input type="number" name="min" id="min"> - 
                	<label for="max">maximale </label><input type="number" name="max" id="max"><br/><br/>

					<label for="picture_link">URL de l'image (environ 70x70 px) : </label><br/><textarea name="picture_link" id="picture_link" rows="2" cols="70" required>../../design/picture/</textarea><br/>
                </p>
            	<p>
            		<input type="submit" value="Créer le capteur">
            	</p>
            </form>
            
        </div>

        <div class="right_nav">
        
        	<a href="roter.php">Revenir à la page d'accueil</a>
        	
    	</div>

    </div>   
    
</div>
 
<?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>


