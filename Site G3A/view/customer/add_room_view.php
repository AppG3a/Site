<?php $css = "design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes pièces"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
            <h1>Ajouter une pièce</h1>
            
			<form method="post" action="index.php?action=add_room">
				<label for="name">Nom de la pièce</label> : <input type="text" name="name" id="name">
				<p>
					<input type="submit" value="Valider">
				</p>
			</form>
			
           <h1>Supprimer une pièce</h1>
            
			<form method="post" action="index.php?action=remove_room">
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
		<h1>Modifier une pièce</h1>
            
			<form method="post" action="index.php?action=change_room">
				<label for="room">Pièce  :</label>
				<select name="room" id="room">
		             <?php 
                    while ($room2 = $rooms2 -> fetch())
                    {
                    ?>
                    	<option value="<?= $room2["id"] ?>"><?= $room2["nom"] ?> </option>
                	<?php 
                    }
                    $rooms2 -> closeCursor();
                    ?>
				</select>
				<p>
				<label for="name">Nom de la pièce</label> : <input type="text" name="name" id="name">
				</p>
				<p>
					<input type="submit" value="Valider">
				</p>
			</form>
            
        </div>
        
        <div class="right_nav">
            <a href="index.php?action=see_rooms">Retour</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>