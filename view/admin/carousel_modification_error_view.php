<?php ob_start(); ?>
<?php $css = "../../design/admin/carousel_modification_view.css"; ?>
<?php $title = "Gérer le carousel"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>
        
    <div class="content">

		<div class="sub_content">
		
			<p id="error_message">Le champ du formulaire n'a pas été rempli correctement</p>
            
            <form method="post" action="roter.php?action=carousel_modification">
            	<div class="pictures">			
					<?php 
            		while ($picture = $pictures -> fetch())
            		{
            		?>
            		<div class="item">
            			<!-- <input type="checkbox" name="<?= $picture["id"]; ?>" id="<?= $picture["id"]; ?>" /> <label for="<?= $picture["id"]; ?>">N° <?= $picture["id"]; ?> : <br/><img src="<?= $picture["lien"]; ?>" alt="<?= $picture["id"]; ?>"></label> -->
            			<input type="checkbox" name="id_pictures[]" value="<?= $picture["id"]; ?>" id="<?= $picture["id"]; ?>" /> <label for="<?= $picture["id"]; ?>">N° <?= $picture["id"]; ?> : <br/><img src="<?= $picture["lien"]; ?>" alt="<?= $picture["id"]; ?>"></label>
            		</div>
            		<?php 
            		}
            		$pictures -> closeCursor();
            		?>
                </div>
                <label for="picture_link">Image(s) cochée(s) à remplacer par (URL de la nouvelle image) : </label><br/><textarea name="picture_link" id="picture_link" rows="2" cols="70" required></textarea><br/>
            	<p>
            		<input type="submit" value="Modifier le carousel"> <span id="error"></span>
            	</p>
            </form>
            
        </div>

        <div class="right_nav">
        
        	<a href="roter.php">Revenir à la page d'accueil</a>
        	
    	</div>

    </div>    
    
</div>

<script src="../../view/admin/js/carousel_modification_view.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>





