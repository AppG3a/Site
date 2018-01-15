<?php //$css = "design/customer/sensors_view.css?<?php echo time(); ?";
$css = "../../design/customer/sensors_view_3.css?<?php echo time(); ?";
?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">
		<div class="sub_content_2">
			<div id="modification_message"></div>

		<div class="sub_content">

            <?php 
            while ($sensor = $sensors -> fetch())
            {
                if ($sensor["categorie"] == "simple")
                {
            ?>
            	<div class="sensor">
                	<p>
                		<strong>Capteur :</strong> <?= $sensor["description"] ?><br/>
                		Catégorie : <?= $sensor["categorie"] ?><br/>
                		Pièce : <?= $sensor["nom"] ?><br/>
                		Etat : <?= $sensor["on_off"] ?><br/>
                		<?= $sensor["reference"] ?> : <?= $sensor["valeur"] ?><br/>
  
            			<br/>
                		<a href="roter.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
                	</p>
    			</div>
            
            <?php
                }
                else if ($sensor["categorie"] == "objet")
                {
            ?>
            	<div class="sensor">
                	<p>
                		<strong>Capteur :</strong> <?= $sensor["description"] ?><br/>
                		Catégorie : <?= $sensor["categorie"] ?><br/>
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
                		<a href="roter.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
                		
            			<?php 
                		if (!empty($sensor["valeur_cible"]))
                		{
                		?>
                			<a href="roter.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Changer valeur cible</a><br/>
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
    			</div>
			<?php
                }
            }
            $sensors -> closeCursor();
            ?>
        </div>
        </div>
        
        <!-- <div class="back_button"> -->
        <div class="right_nav">
        	<a href="roter.php?action=see_add_sensor">Ajouter un capteur</a>
        	<a href="roter.php?action=see_remove_sensor">Supprimer un capteur</a>
        	<a href="roter.php?action=see_add_favorite_sensors">Gérer les favoris</a>
            <a href="roter.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>

<script type="text/javascript">
<!--
	var sensorModification = <?= $_SESSION["sensor_modification"]; ?>;
//-->
</script>
<script src="../../js/customer/modification_sensor_success.js"></script>

<?php 
$_SESSION["sensor_modification"] = 0;
?>

