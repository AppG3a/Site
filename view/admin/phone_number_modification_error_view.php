<?php ob_start(); ?>
<?php $css = "../../design/admin/home_view.css"; ?>
<?php $title = "Contact"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>
        
    <div class="content">

		<div class="sub_content">
		
			<p id="error_message">Le champ du formulaire n'a pas été rempli correctement</p>
		
            <h1>Numéro Domisep</h1>
            
            <form method="post" action="roter.php?action=phone_number_modification">
            	<p>
            		<label for="phone_number">Numéro</label> : <input type="text" name="phone_number" id="phone_number" required>
            	</p>
        		<p>
            		<input type="submit" value="Changer le numéro">
            	</p>
            </form>
            
        </div>
        
        <div class="right_nav">
        
        	<a href="roter.php?action=see_contact">Retour</a>
        	
        </div>

    </div>    
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>

