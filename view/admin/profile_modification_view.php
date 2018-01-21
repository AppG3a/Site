<?php ob_start(); ?>
<?php $css = "../../design/admin/home_view.css"; ?>
<?php $title = "Modifier mon profil"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>
    
	<div class="content">

		<div class="sub_content">
		
            <form method="post" action="roter.php?action=profile_modification">
            	<fieldset>
            		<legend>Informations personnelles</legend>
            			<p class="left_justify">
            				<label for="nom">Nom</label> : <input type="text" name="nom" id="nom" value="<?= $profile["nom"] ?>" required><br/>
                        	<label for="prenom">Prénom</label> : <input type="text" name="prenom" id="prenom" value="<?= $profile["prenom"] ?>" required><br/>
                        	<label for="adresse">Adresse</label> :<br/><textarea name="adresse" id="adresse" required><?= $profile["adresse"] ?></textarea><br/>
                        	Mail : <?= $profile["mail"] ?><br/>
            			</p>
            	</fieldset>
            	<p>
            		<input type="submit" value="Valider les modifications">
            	</p>
            </form>
            
        	<form method="post" action="roter.php?action=password_change" id="password_form">
            	<fieldset>
            		<legend>Mot de passe</legend>
            			<p class="left_justify">
                            <label for="mot_de_passe">Ancien mot de passe</label> : <input type="password" name="mot_de_passe" id="mot_de_passe" required><br/>
                            <label for="new_password_1">Nouveau mot de passe</label> : <input type="password" name="new_password_1" id="new_password_1" required>
                            <span id="info_new_password_1"></span><br/>
                            <label for="new_password_2">Confirmer le mot de passe</label> : <input type="password" name="new_password_2" id="new_password_2" required>
                            <span id="info_new_password_2"></span>
            			</p>
            	</fieldset>
            	<div id="error"></div>
            	<p>
            		<input type="submit" value="Changer le mot de passe">
            	</p>
            </form>
            
        </div>
        
    	<div class="right_nav">
    	
        	<a href="roter.php?action=see_profile">Retour</a>
        	
    	</div>

    </div>    
    
</div>

<script src="../../view/admin/js/profile_modification_view.js"></script>
    
<?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>



