<?php $css = "../../design/customer/favorite_sensors_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
			<div class="sub_content2">
            <?php 
            while ($sensor = $sensors -> fetch())
            {
            ?>
            	<div class="sensor">
                	<p>
                		<img src=<?= $sensor["lien_image"] ?> alt=<?= $sensor["type"] ?> title=<?= $sensor["type"] ?> class="imgcentre" /> <br />
                		<strong>Capteur :</strong> <?= $sensor["description"] ?><br/>
                		Pièce : <?= $sensor["nom"] ?><br/>
                		Etat : <?= $sensor["on_off"] ?><br/>
                		<?= $sensor["reference"] ?> : <?= $sensor["valeur"] ?><br/>
                		<?php 
                		if (!empty($sensor["valeur_cible"]))
                		{
                		?>
                			valeur cible : <?= $sensor["valeur_cible"] ?><br/>
            			<?php 
                		}
            			?>
            			
                		<a href="roter.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a>
                		
            			<?php 
                		if (!empty($sensor["valeur_cible"]))
                		{
                		?>
                			<a href="roter.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Changer valeur cible</a>
                			<a href="roter.php?action=remove_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Supprimer valeur cible</a><br/>
            			<?php 
                		}
                		else 
                		{
            		    ?>
            		    	<a href="roter.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Définir valeur cible</a><br/>
                		<?php 
                		}
            			?>
    
                	</p>
        			<form method="post" action="roter.php?action=add_favorite_sensors">
    					<input type="checkbox" name="<?= $sensor['id'] ?>" id="favorite" /> <label for="favorite">Favori</label>
        			</form>
    			</div>
            
            <?php 
            }
            $sensors -> closeCursor();
            ?>
            
			</div>
			<input type="submit" name="envoyer" value="Sauvegarder les favoris" class="submit_button">
        </div>
		
        
        <!-- <div class="back_button"> -->
        <div class="right_nav">
        	<a href="roter.php?action=see_sensors">Retour</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>