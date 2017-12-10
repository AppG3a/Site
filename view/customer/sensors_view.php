<?php $css = "design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

        <h1>Mes capteurs</h1>
        <?php 
        while ($sensor = $sensors -> fetch())
        {
        ?>
        	<p class="left_justify_2">
        		<strong>Capteur :</strong> <?= $sensor["description"] ?><br/>
        		Etat : <?= $sensor["on_off"] ?><br/>
        		<?= $sensor["reference"] ?> : <?= $sensor["valeur"] ?><br/>
        		<a href="index.php?action=switch_sensor_status&id_sensor=<?= $sensor['id'] ?>&sensor_status=<?= $sensor['on_off'] ?>" class="on_off_button">ON/OFF</a><br/>
        	</p>
        
        <?php 
        }
        $sensors -> closeCursor();
        ?>
        
        <div class="back_button">
            <a href="index.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>