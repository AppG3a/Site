<?php $css = "../../design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes pièces"; ?>


    
	<?php ob_start(); ?>
	<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>

	<div class="content">

		<div class="sub_content">
            <h1>Ajouter une pièce</h1>
            
			<form method="post" action="roter.php?action=add_room">
				<label for="name">Nom de la pièce</label> : <input type="text" name="name" id="name">
				<p>
					<input type="submit" value="Valider">
				</p>
			</form>
			
            <h1>Supprimer une pièce</h1>
            
			<form method="post" action="roter.php?action=remove_room">
				<label for="room">Pièce à supprimer :</label>
				<select name="room" id="room">
		            <?php 
                    while ($room = $rooms -> fetch())
                    {
                    ?>
                    	<option value="<?= $room["id"] ?>"><?= $room["nom"] ?></option>
                	<?php 
                    }
                    $rooms -> closeCursor();
                	?>    				
				</select>
				<p>
					<input type="submit" value="Valider">
				</p>
			</form>
            
        </div>
        
        <div class="right_nav">
            <a href="roter.php?action=see_rooms">Retour</a>
        </div>
</div>
    </div>    
    <?php include("bloc_footer_view.php")?>
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>