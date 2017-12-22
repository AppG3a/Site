<?php $css = "design/customer/sensors_view.css?<?php echo time(); ?"; ?>
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
                if ($sensor["favori"] != 0)
                {
                ?>
            	<div class="sensor">
                	<p>
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
            			<br/>
                		<a href="index.php?action=switch_favorite_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
                		
            			<?php 
                		if (!empty($sensor["valeur_cible"]))
                		{
                		?>
                			<a href="index.php?action=see_favorite_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Changer valeur cible</a><br/>
                			<a href="index.php?action=remove_favorite_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Supprimer valeur cible</a><br/>
            			<?php 
                		}
                		else 
                		{
            		    ?>
            		    	<a href="index.php?action=see_favorite_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Définir valeur cible</a><br/>
                		<?php 
                		}
            			?>
    
                	</p>
    			</div>
            
            <?php
                }
            }
            $sensors -> closeCursor();
            ?>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>