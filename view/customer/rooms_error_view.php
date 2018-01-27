<?php ob_start(); ?>
<?php $css = "../../design/customer/home_view.css"; ?>
<?php $title = "Mes pièces"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>    

	<div class="content">

		<div class="sub_content">
		
			<p id="error_message">Un des champs du formulaire n'a pas été rempli correctement</p>

			<h1>Pièces référencées</h1>
			
			<ul>
            <?php 
            while ($room = $rooms -> fetch())
            {
            ?>
            	<li><?= $room["nom"] ?></li>
        	<?php 
            }
            $rooms -> closeCursor();
        	?>
        	</ul>
            
            <div class="sub_content_2">
            
    			<form method="post" action="roter.php?action=add_room">
    				<fieldset id="rooms_fieldset">
    					<legend>Ajouter une pièce</legend>
    					
        				<label for="name">Nom de la pièce</label> : <input type="text" name="name" id="name" required>
        				<p>
        					<input type="submit" value="Valider">
        				</p>
    				</fieldset>
    			</form>
    			
                
    			<form method="post" action="roter.php?action=remove_room">
    				<fieldset id="rooms_fieldset">
        				<legend>Supprimer une pièce</legend>
        				<label for="room">Pièce à supprimer :</label><br/>
        				<select name="room" id="room">
        		            <?php 
                            while ($delete_room = $delete_rooms -> fetch())
                            {
                            ?>
                            	<option value="<?= $delete_room["id"] ?>"><?= $delete_room["nom"] ?></option>
                        	<?php 
                            }
                            $delete_rooms -> closeCursor();
                        	?>    				
        				</select>
        				<p>
        					<input type="submit" value="Valider">
        				</p>
    				</fieldset>
    			</form>
    			
    			<form method="post" action="roter.php?action=modify_room">
    				<fieldset id="rooms_fieldset">
        				<legend>Modifier une pièce</legend>
        				<label for="modify_room">Pièce à modifier :</label><br/>
        				<select name="room" id="modify_room">
        		            <?php 
        		            while ($modify_room = $modify_rooms -> fetch())
                            {
                            ?>
                            	<option value="<?= $modify_room["id"] ?>"><?= $modify_room["nom"] ?></option>
                        	<?php 
                            }
                            $modify_rooms -> closeCursor();
                        	?>    				
        				</select><br/>
        				<label for="new_name">Nouveau nom de la pièce :</label><br/>
        				<input type="text" name="new_name" id="new_name" required>
        				<p>
        					<input type="submit" value="Valider">
        				</p>
    				</fieldset>
    			</form>
    			
            </div>
            
        </div>
        
        <div class="right_nav">
        
            <a href="roter.php">Revenir à la page d'accueil</a>
            
        </div>

    </div>    
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>

