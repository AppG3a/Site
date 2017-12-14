<?php $css = "design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
            <h1>Mes capteurs</h1>
            <?php 
            while ($sensor = $sensors -> fetch())
            {
            ?>
            	<p class="left_justify_2">
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
        			
            		<a href="index.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a>
            		
        			<?php 
            		if (!empty($sensor["valeur_cible"]))
            		{
            		?>
            			<a href="index.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Changer valeur cible</a>
            			<a href="index.php?action=remove_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Supprimer valeur cible</a><br/>
        			<?php 
            		}
            		else 
            		{
        		    ?>
        		    	<a href="index.php?action=see_sensor_target&id_sensor=<?= $sensor['id'] ?>" class="on_off_button">Définir valeur cible</a><br/>
            		<?php 
            		}
        			?>
            	</p>
            
            <?php 
            }
            $sensors -> closeCursor();
            ?>
        </div>
        
        <!-- <div class="back_button"> -->
        <div class="right_nav">
        	<a href="index.php?action=see_add_sensor">Ajouter un capteur</a>
            <a href="index.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>

