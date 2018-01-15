<?php $css = "../../design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">

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