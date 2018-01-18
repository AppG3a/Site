<?php $css = "../../design/customer/sensors_view.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
			<?php 
            while ($sensor = $sensors -> fetch())
            {
                if (($sensor["code_affichage"] == 1) && ($sensor["favori"] != 0))
                {
            ?>
            	<div class="sensor">
                	<!-- <p> -->
                		<strong><?= $sensor["type"] ?> . <?= $sensor["valeur"] ?> <?= $sensor["unite"] ?></strong><br/>
                		Pièce : <?= $sensor["nom"] ?><br/>
                		Etat : <?= $sensor["on_off"] ?><br/>

                		<a href="roter.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
                		<img src=<?= $sensor["lien_image"] ?> alt=<?= $sensor["type"] ?> title=<?= $sensor["type"] ?> />
                		<?php 
                		if ($sensor["favori"] == 1)
                		{
                		?>
                			<img src="http://localhost/site_app/Site/design/picture/favori_on_2.png" alt="Favori" title="Favori" />
            			<?php 
                		}
                		else 
                		{
            			?>
            				<img src="http://localhost/site_app/Site/design/picture/favori_off_2.png" alt="Non favori" title="Non favori" />
        				<?php 
                		}
        				?>
                	<!-- </p> -->
    			</div>
            
            <?php
                }
                elseif (($sensor["code_affichage"] == 2) && ($sensor["favori"] != 0))
                {
            ?>
            	<div class="sensor">
                	
            		<strong><?= $sensor["type"] ?> . <?= $sensor["valeur"] ?> <?= $sensor["unite"] ?></strong><br/>
            		Pièce : <?= $sensor["nom"] ?><br/>
            		Etat : <?= $sensor["on_off"] ?>
 					<?php 
            		if (!empty($sensor["valeur_cible"]))
            		{
            		?>
            			valeur cible : <?= $sensor["valeur_cible"] ?><br/>
        			<?php 
            		}
            		if ($sensor["id"] == $id_sensor)
            		{
        		    ?>
        		    	<br/>
            		    <form method="post" action="roter.php?action=define_favorite_sensor_target&id_sensor=<?= $sensor['id'] ?>">
            		    	<label for="target">Cible</label> : <input type="number" name="target" id="target">
            		    	<input type="submit" value="Valider">
            		    </form>
            		    
            		    <a href="roter.php?action=switch_favorite_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
            			<a href="roter.php" class="on_off_button">Annuler</a>
        		    <?php
            		}
            		elseif (!empty($sensor["valeur_cible"]))
            		{
        		    ?>
        		    	<br/>
            		    <a href="roter.php?action=switch_favorite_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
            			<a href="roter.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Changer valeur cible</a><br/>
        			<?php 
            		}
            		else 
            		{
        		    ?>
        		    	<br/>
        		    	<a href="roter.php?action=switch_favorite_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
        		    	<a href="roter.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Définir valeur cible</a><br/>
            		<?php 
            		}
        			?>
            			<br/>
                		<img src=<?= $sensor["lien_image"] ?> alt=<?= $sensor["type"] ?> title=<?= $sensor["type"] ?> />
                		<?php 
                		if ($sensor["favori"] == 1)
                		{
                		?>
                			<img src="http://localhost/site_app/Site/design/picture/favori_on_2.png" alt="Favori" title="Favori" />
            			<?php 
                		}
                		else 
                		{
            			?>
            				<img src="http://localhost/site_app/Site/design/picture/favori_off_2.png" alt="Non favori" title="Non favori" />
        				<?php 
                		}
        				?>
    
                		<!-- Il y a un start tag -->
    			</div>
			<?php
                }
            }
            $sensors -> closeCursor();
            ?>
            
            <!-- <?php 
            while ($sensor = $sensors -> fetch())
            {
                if ($sensor["favori"] != 0)
                {
                ?>
            	<div class="sensor">      	
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
            		if ($sensor["id"] == $id_sensor)
            		{
        		    ?>
        		    	<br/>
            		    <form method="post" action="roter.php?action=define_favorite_sensor_target&id_sensor=<?= $sensor['id'] ?>">
            		    	<label for="target">Cible</label> : <input type="number" name="target" id="target">
            		    	<input type="submit" value="Valider">
            		    </form>
            		    
            		    <a href="roter.php?action=switch_favorite_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
            			<a href="roter.php" class="on_off_button">Annuler</a>
        		    <?php
            		}
            		elseif (!empty($sensor["valeur_cible"]))
            		{
        		    ?>
        		    	<br/>
            		    <a href="roter.php?action=switch_favorite_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
            			<a href="roter.php?action=see_favorite_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Changer valeur cible</a><br/>
        			<?php 
            		}
            		else 
            		{
        		    ?>
        		    	<br/>
        		    	<a href="roter.php?action=switch_favorite_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
        		    	<a href="roter.php?action=see_favorite_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Définir valeur cible</a><br/>
            		<?php 
            		}
        			?>
            	</div>
            <?php
                }
            }
            $sensors -> closeCursor();
            ?> -->
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>