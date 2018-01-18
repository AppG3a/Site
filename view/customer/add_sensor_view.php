<?php $css = "../../design/customer/home_view.css"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
            <h1>Ajouter un capteur</h1>
            
			<form method="post" action="roter.php?action=add_sensor">
				<label for="type">Type de capteur</label><br/><input type="text" name="type" id="type"><br/>
				<label for="room">Pièce de la maison</label><br/>
				<select name="room" id="room">
		            <?php 
                    while ($room = $rooms -> fetch())
                    {
                    ?>
                    	<option value="<?= $room["nom"] ?>"><?= $room["nom"] ?></option>
                	<?php 
                    }
                    $rooms -> closeCursor();
                	?>    				
				</select>
				<p>
					<input type="submit" value="Valider">
				</p>
			</form>
			
            <h1>Supprimer un capteur</h1>
            
			<form method="post" action="roter.php?action=remove_sensor">
				<label for="sensor">Capteur à supprimer :</label>
				<select name="sensor" id="sensor">
		            <?php 
                    while ($sensor = $sensors -> fetch())
                    {
                    ?>
                    	<option value="<?= $sensor["id"] ?>"><?= $sensor["reference"] ?> - <?= $sensor["nom"] ?></option>
                	<?php 
                    }
                    $sensors -> closeCursor();
                	?>    				
				</select>
				<p>
					<input type="submit" value="Valider">
				</p>
			</form>
            
            <h1>Favoris</h1>
            <p>Les capteurs favoris apparaissent sur la page d'accueil</p>
            
			<form method="post" action="roter.php?action=add_favorite_sensors">
		            <?php 
		            while ($favorite = $favorites -> fetch())
                    {
                        if ($favorite["favori"] != 0)
                        {
                        ?>
                    		<input type="checkbox" name="<?= $favorite['id'] ?>" checked="checked" id="favorite" /> <label for="favorite"><?= $favorite["reference"] ?> - <?= $favorite["nom"] ?></label><br/>
                		<?php 
                        }
                        else 
                        {
                		?>
                			<input type="checkbox" name="<?= $favorite['id'] ?>" id="favorite" /> <label for="favorite"><?= $favorite["reference"] ?> - <?= $favorite["nom"] ?></label><br/>
            		<?php 
                        }
                    }
                    $favorites -> closeCursor();
                	?>    				
				<p>
					<input type="submit" value="Valider">
				</p>
			</form>
            
        </div>
        
        <div class="right_nav">
            <a href="roter.php?action=see_sensors">Retour</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>