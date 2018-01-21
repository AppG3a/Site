<?php ob_start(); ?>
<?php $css = "../../design/customer/home_view.css"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>    

	<div class="content">

		<div class="sub_content">

            <h1>Supprimer un capteur</h1>
            
			<form method="post" action="roter.php?action=remove_sensor">
				<label for="sensor">Capteur à supprimer :</label>
				<select name="sensor" id="sensor">
		            <?php 
                    while ($sensor = $sensors -> fetch())
                    {
                    ?>
                    	<option value="<?= $sensor["id"] ?>"><?= $sensor["type"] ?> - <?= $sensor["nom"] ?></option>
                	<?php 
                    }
                    $sensors -> closeCursor();
                	?>    				
				</select>
				<p>
					<input type="submit" value="Valider">
				</p>
			</form>
            
        </div>
        
        <div class="right_nav">
        
            <a href="roter.php?action=see_sensors">Retour</a>
            
        </div>

    </div>    
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>

