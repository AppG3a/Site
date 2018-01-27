<?php ob_start(); ?>
<?php $css = "../../design/customer/sensors_view_2.css"; ?>
<?php $title = "Harvey"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>    

	<div class="content">

		<div class="sub_content">
		
			<p id="error_message">Un des champs du formulaire n'a pas été rempli correctement</p>
		
			<?php 
            while ($sensor = $sensors -> fetch())
            {
                if (($sensor["code_affichage"] == 1) && ($sensor["favori"] != 0))
                {
            ?>
            	<div class="sensor">
  
                		<img src=<?= $sensor["lien_image"] ?> alt=<?= $sensor["type"] ?> title=<?= $sensor["type"] ?> class="imgcentre" /> <br />
                		<strong><?= $sensor["type"] ?> . <?= $sensor["valeur"] ?> <?= $sensor["unite"] ?></strong><br/>
                		Pièce : <?= $sensor["nom"] ?><br/>
                		Etat : <?= $sensor["on_off"] ?><br/>

                		<a href="roter.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
                		<br />
                		<?php 
                		if ($sensor["favori"] == 1)
                		{
                		?>
                			<img src="../../design/picture/favori_on_2.png" alt="Favori" title="Favori" />
            			<?php 
                		}
                		else 
                		{
            			?>
            				<img src="../../design/picture/favori_off_2.png" alt="Non favori" title="Non favori" />
        				<?php 
                		}
        				?>

    			</div>
            
            <?php
                }
                elseif (($sensor["code_affichage"] == 2) && ($sensor["favori"] != 0))
                {
            ?>
            	<div class="sensor">
                	
            		<img src=<?= $sensor["lien_image"] ?> alt=<?= $sensor["type"] ?> title=<?= $sensor["type"] ?> class="imgcentre" /> <br />
            		<strong><?= $sensor["type"] ?> . <?= $sensor["valeur"] ?> <?= $sensor["unite"] ?></strong><br/>
            		Pièce : <?= $sensor["nom"] ?><br/>
            		Etat : <?= $sensor["on_off"] ?>
 					<?php 
            		if (!empty($sensor["valeur_cible"]))
            		{
            		?>
            			- Valeur cible : <?= $sensor["valeur_cible"] ?><br/>
        			<?php 
            		}
            		if ($sensor["id"] == $id_sensor)
            		{
        		    ?>
        		    	<br/>
            		    <form method="post" action="roter.php?action=define_favorite_sensor_target&id_sensor=<?= $sensor['id'] ?>">
            		    	<label for="target">Cible</label> : <input type="number" name="target" id="target" min=<?= $sensor['min'] ?> max=<?= $sensor['max'] ?> required>
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
        			<?php 
            		if ($sensor["favori"] == 1)
            		{
            		?>
            			<img src="../../design/picture/favori_on_2.png" alt="Favori" title="Favori" />
        			<?php 
            		}
            		else 
            		{
        			?>
        				<img src="../../design/picture/favori_off_2.png" alt="Non favori" title="Non favori" />
    				<?php 
            		}
    				?>
    
    			</div>
			<?php
                }
            }
            $sensors -> closeCursor();
            ?>
            
        </div>

    </div>
        
</div>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>



