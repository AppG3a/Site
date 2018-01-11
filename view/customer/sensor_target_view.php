<?php $css = "../../design/customer/sensors_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">

            <?php 
            while ($sensor = $sensors -> fetch())
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
            		    <form method="post" action="roter.php?action=define_sensor_target&id_sensor=<?= $sensor['id'] ?>">
            		    	<label for="target">Cible</label> : <input type="number" name="target" id="target">
            		    	<input type="submit" value="Valider">
            		    </form>
            		    
            		    <a href="roter.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
            			<a href="roter.php?action=see_sensors" class="on_off_button">Annuler</a>
        		    <?php
            		}
            		elseif (!empty($sensor["valeur_cible"]))
            		{
        		    ?>
        		    	<br/>
            		    <a href="roter.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
            			<a href="roter.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Changer valeur cible</a><br/>
        			<?php 
            		}
            		else 
            		{
        		    ?>
        		    	<br/>
        		    	<a href="roter.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
        		    	<a href="roter.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Définir valeur cible</a><br/>
            		<?php 
            		}
        			?>
            	</div>
            <?php 
            }
            $sensors -> closeCursor();
            ?>
        </div>
        
        <!-- <div class="back_button"> -->
        <div class="right_nav">
        	<a href="roter.php?action=see_add_sensor">Ajouter un capteur</a>
            <a href="roter.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>